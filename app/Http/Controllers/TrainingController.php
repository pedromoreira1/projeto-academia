<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Training;
use App\Models\User;

class TrainingController extends Controller
{
    
    public function index() {

        $search = request('search');

        if($search) {

            $trainings = Training::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();

        } else {
            $trainings = Training::all();
        }        
    
        return view('welcome',['trainings' => $trainings, 'search' => $search]);

    }

    public function create() {
        return view('trainings.create');
    }


    public function store(Request $request) {

        $training = new Training;

        $training->title = $request->title;
        $training->date = $request->date;
        $training->private = $request->private;
        $training->treino = $request->treino;
        $training->segunda = $request->segunda;
        $training->terca = $request->terca;
        $training->quarta = $request->quarta;
        $training->quinta = $request->quinta;
        $training->sexta = $request->sexta;
        $training->sabado = $request->sabado;
        $training->items = $request->items;

        // Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/trainings'), $imageName);

            $training->image = $imageName;

        }

        $user = auth()->user();
        $training->user_id = $user->id;

        $training->save();

        return redirect('/')->with('msg', 'Treino criado com sucesso!');

    }

    public function show($id) {

        $training = Training::findOrFail($id);

        $user = auth()->user();
        $hasUserJoined = false;

        if($user) {

            $userTrainings = $user->TrainingsAsParticipant->toArray();

            foreach($userTrainings as $userTraining) {
                if($userTraining['id'] == $id) {
                    $hasUserJoined = true;
                }
            }

        }

        $trainingOwner = User::where('id', $training->user_id)->first()->toArray();

        return view('trainings.show', ['training' => $training, 'trainingOwner' => $trainingOwner, 'hasUserJoined' => $hasUserJoined]);
        
    }

    public function dashboard() {

        $user = auth()->user();

        $trainings = $user->trainings;

        $trainingsAsParticipant = $user->trainingsAsParticipant;

        return view('trainings.dashboard', 
            ['trainings' => $trainings, 'trainingsasparticipant' => $trainingsAsParticipant]
        );

    }

    public function destroy($id) {

        Training::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Treino excluído com sucesso!');

    }

    public function edit($id) {

        $user = auth()->user();

        $training = Training::findOrFail($id);

        if($user->id != $training->user_id) {
            return redirect('/dashboard');
        }

        return view('trainings.edit', ['training' => $training]);

    }

    public function update(Request $request) {

        $data = $request->all();

        // Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/trainings'), $imageName);

            $data['image'] = $imageName;

        }

        Training::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Treino editado com sucesso!');

    }

    public function joinTraining($id) {

        $user = auth()->user();

        $user->trainingsAsParticipant()->attach($id);

        $training = Training::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Sua presença está confirmada no treino ' . $training->title);

    }

    public function leaveTraining($id) {

        $user = auth()->user();

        $user->trainingsAsParticipant()->detach($id);

        $training = Training::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Você saiu com sucesso do treino: ' . $training->title);

    }

}
