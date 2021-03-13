<?php

namespace App\Http\Controllers;

use App\Anamnese;
use App\AnamnesesArquivos;
use App\Animal;
use App\Local;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Anamnese as AnamneseRequest;
use Illuminate\Support\Facades\Storage;


class AnamneseController extends Controller
{

    public function deleteArquivo($arquivo)
    {
        $delete = AnamnesesArquivos::where('id',$arquivo)->first();
        Storage::delete($delete->path);
        $delete->delete();
        $json = [
          'success' => true
        ];
        return response()->json($json);
    }

    public function novaconsulta($consulta)
    {
        $locais = Local::all();
        return view('admin.anamnese.create', ['consulta' => $consulta, 'locais'=>$locais]);

    }



    public function index()
    {
        $anamneses = Anamnese::select('id', 'valor', 'created_at', 'id_animal', 'local')->with(['animalAnamnese', 'tutorAnamnese'])->get();


        return view('admin.anamnese.index', ['anamneses'=>$anamneses]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($anamnese)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnamneseRequest $request)
    {

        $anamneses = new Anamnese();
        $anamneses->id_animal= $request->consulta;
        $anamneses->fill($request->all());
        $anamneses->save();

        if ($request->allFiles()) {
            foreach ($request->allFiles()['arquivos'] as $arquivos) {
                $arquivosanamneses= new AnamnesesArquivos();
                $arquivosanamneses->anamnese_id = $anamneses->id;
                $arquivosanamneses->path = $arquivos->storeAs('anamnese/'. $anamneses->id, $arquivos->getClientOriginalName());
                $arquivosanamneses->save();
                unset($arquivosanamneses);
            }
        }
       

        return redirect()->route('animal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Anamnese $anamnese)

    {
        $animalconsulta = $anamnese->animalId()->first();



        return view('anamnese.show', ['anamnese' => $anamnese, 'animalconsulta'=>$animalconsulta]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Anamnese $anamnese)
    {
        $locais = Local::all();
        return view('admin.anamnese.edit', ['anamnese' => $anamnese, 'locais'=>$locais]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnamneseRequest $request, $anamnese)
    {
        $anamneseNew = Anamnese::where('id', $anamnese)->first();

        $anamneseNew->fill($request->all());
        $anamneseNew->save();

        if ($request->allFiles()) {
            foreach ($request->allFiles()['arquivos'] as $arquivos) {
                $arquivosanamneses= new AnamnesesArquivos();
                $arquivosanamneses->anamnese_id = $anamneseNew->id;
                $arquivosanamneses->path = $arquivos->storeAs('anamnese/'. $anamneseNew->id, $arquivos->getClientOriginalName());
                $arquivosanamneses->save();
                unset($arquivosanamneses);
            }
        }

        return redirect()->route('anamnese.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($anamnese)
    {
        Anamnese::find($anamnese)->delete();
        Storage::deleteDirectory('anamnese/'. $anamnese);
        return redirect()->route('anamnese.index');
    }
}
