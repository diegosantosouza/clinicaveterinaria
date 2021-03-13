@extends('admin.master.master')

@section('content')
    <div style="flex-basis: 100%;">
        <section class="dash_content_app">
            <header class="dash_content_app_header">
                <h2 class="icon-tachometer">Dashboard</h2>
            </header>

            <div class="dash_content_app_box">
                <section class="app_dash_home_stats">
                    <article class="control radius">
                        <h4 class="icon-users">Animais</h4>
                        <p><b>Caninos:</b>{{$animal->where('especie', 'canino')->count()}}&nbsp;&nbsp;&nbsp;&nbsp;<b>Fêmeas:</b>{{$animal->where('especie', 'canino')->where('sexo', 'fêmea')->count()}}&nbsp;&nbsp;&nbsp;&nbsp;<b>Machos:</b>{{$animal->where('especie', 'canino')->where('sexo', 'macho')->count()}}</p>
                        <p><b>Felinos:</b>{{$animal->where('especie', 'felino')->count()}}&nbsp;&nbsp;&nbsp;&nbsp;<b>Fêmeas:</b>{{$animal->where('especie', 'felino')->where('sexo', 'fêmea')->count()}}&nbsp;&nbsp;&nbsp;&nbsp;<b>Machos:</b>{{$animal->where('especie', 'felino')->where('sexo', 'macho')->count()}}</p>

                        <p><b>Total:</b> {{$animal->count()}}</p>
                    </article>

                    <article class="blog radius">
                        <h4 class="icon-home">Anamneses</h4>
                        <p><b>Total:</b>{{$anamneses->count()}}</p>

                    </article>

                    <article class="users radius">
                        <h4 class="icon-file-text">Exames</h4>
                        <p><b>Pendentes:</b></p>
                        <p><b>Ativos:</b></p>
                        <p><b>Cancelados:</b></p>
                        <p><b>Total:</b></p>
                    </article>
                </section>
            </div>
        </section>

        <section class="dash_content_app" style="margin-top: 40px;">
            <header class="dash_content_app_header">
                <h2 class="icon-tachometer">Últimas consultas</h2>
            </header>
            @if(!empty($anamneses))

            <div class="dash_content_app_box">
                <div class="dash_content_app_box_stage">
                    <table id="dataTable" class="nowrap hover stripe" width="100" style="width: 100% !important;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Animal</th>
                            <th>Tutor</th>
                            <th>Valor</th>
                            <th>Celular</th>
                            <th>Local</th>
                            <th>Data</th>
                        </tr>
                        </thead>
                        <tbody>
                    @foreach($anamneses as $anamnese)

                            <tr>
                                <td><a href="" class="text-orange"></a>{{ $anamnese->id }}</td>
                                <td><a href="{{ route('animal.edit', ['animal'=> $anamnese->animalAnamnese->id]) }}" class="text-orange">{{ $anamnese->animalAnamnese->nome_animal }}</a></td>
                                <td><a href="{{ route('tutor.edit', ['tutor'=>$anamnese->tutorAnamnese->id]) }}" class="text-orange">{{ $anamnese->tutorAnamnese->nome }}</a></td>
                                <td class="mask-money">{{ $anamnese->valor }}</td>
                                <td class="mask-cell">{{ $anamnese->tutorAnamnese->celular }}</td>
                                <td>{{ $anamnese->local }}</td>
                                <td>{{ $anamnese->getAnamneseDataAttribute() }}</td>

                            </tr>
                    @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
        </section>


    </div>
@endsection
