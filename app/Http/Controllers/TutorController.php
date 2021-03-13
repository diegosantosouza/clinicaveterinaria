<?php

namespace App\Http\Controllers;

use App\Anamnese;
use App\Animal;
use App\Http\Requests\Admin\Tutor as TutorRequest;
use App\Tutor;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tutors = Tutor::select('id', 'nome', 'bairro', 'celular', 'email')->get();
        return view('admin.tutor.index', ['tutors' => $tutors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tutor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TutorRequest $request)
    {
        $tutor = new Tutor();
        $tutor->fill($request->all());

        if(!$tutor->save()){
            return redirect()->back()->withInput()->withErrors();
        }

        return redirect()->route('animal.novoAnimal',['tutor'=> $tutor->id]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($tutor)
    {
//        $tutorShow = Tutor::where('id', $tutor)->first();
//        $animals = Animal::where('tutor_n', $tutor)->get();
//        $anamneses= $tutorShow->anamnesesTutor()->get();
//
//        return view('admin.tutor.show', ['tutorShow'=>$tutorShow, 'animals'=>$animals, 'anamneses'=>$anamneses]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($tutor)
    {
        $tutorShow = Tutor::where('id', $tutor)->first();
        $animals = Animal::where('tutor_n', $tutor)->get();
        $anamneses= $tutorShow->anamnesesTutor()->get();

        return view('admin.tutor.edit', ['tutorShow'=>$tutorShow, 'animals'=>$animals, 'anamneses'=>$anamneses]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TutorRequest $request, $tutor)
    {
        $tutorUpdate = Tutor::where('id', $tutor)->first();
        $tutorUpdate->setCpfAttribute($request->cpf);
        $tutorUpdate->setTelefoneAttribute($request->telefone);
        $tutorUpdate->setCelularAttribute($request->celular);
        $tutorUpdate->fill($request->all());
        $tutorUpdate->save();

        if ($tutorUpdate->save()) {

            return redirect()->route('tutor.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($tutor)
    {
        Tutor::find($tutor)->delete();
        return redirect()->route('tutor.index');
    }
}
