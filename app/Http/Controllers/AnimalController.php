<?php

namespace App\Http\Controllers;

use App\Anamnese;
use App\Animal;
use App\Racas;
use App\Tutor;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Echo_;
use App\Http\Requests\Admin\Animal as AnimalRequest;

class AnimalController extends Controller
{


    public function forceDelete($animal)
    {
        Animal::onlyTrashed()->where(['id'=> $animal])->forceDelete();

        return redirect()->route('animal.trashed');

    }


    public function restore($animal)
    {
        $animal = Animal::onlyTrashed()->where(['id'=> $animal])->first();

        if ($animal->trashed()){
            $animal->restore();
        }
        return redirect()->route('animal.trashed');
    }
    public function trashed()
    {
        $animal=Animal::onlyTrashed()->get();
        return view('animal.trashed', ['animals' => $animal]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animals = Animal::select('id', 'nome_animal', 'raca', 'sexo', 'castrado', 'tutor_n')->with(['tutorAnimal'])->get();
        return view('admin.animal.index', ['animals' => $animals]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function novoAnimal($tutor)
    {
        $racas = Racas::all();
        return view('admin.animal.create', ['tutor'=>$tutor , 'racas'=>$racas]);
    }

    public function create()
    {

//        return view('admin.tutor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnimalRequest $request)
    {

        $animal = new Animal();
        $animal->tutor_n= $request->tutor;
        $animal->fill($request->all());
        $animal->setIdadeAttribute($request->idade);
        $animal->save();
        return redirect()->route('anamnese.novaconsulta', ['consulta'=> $animal->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  Animal $animal
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        $animalAnam = $animal->anamnesesAnimal()->get();

        return view('animal.show', ['animal' => $animal,'animalAnam'=> $animalAnam]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($animal)
    {
        $animals = Animal::where('id', $animal)->first();
        $racas = Racas::select('raca')->get();
        $anamneses= $animals->anamnesesAnimal()->get();

        return view('admin.animal.edit', ['animals'=>$animals, 'anamneses'=>$anamneses, 'racas'=>$racas]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnimalRequest $request, $animal)
    {
        
        $animals = Animal::where('id', $animal)->first();
        $animals->fill($request->all());
        $animals->save();

        return redirect()->route('animal.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($animal)
    {
        Animal::find($animal)->delete();
        return redirect()->route('animal.index');
    }
}
