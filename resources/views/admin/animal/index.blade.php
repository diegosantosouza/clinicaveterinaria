@extends('admin.master.master')

@section('content')
    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-search">Filtro</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="" class="text-orange">Animais</a></li>
                    </ul>
                </nav>


                <button class="btn btn-green icon-search icon-notext ml-1 search_open"></button>
            </div>
        </header>

        @include('admin.animal.filter')


        @if(!empty($animals))

        <div class="dash_content_app_box">
            <div class="dash_content_app_box_stage">
                <table id="dataTable" class="nowrap stripe" width="100" style="width: 100% !important;">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Animal</th>
                        <th>Tutor</th>
                        <th>Raça</th>
                        <th>Sexo</th>
                        <th>Castrado</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($animals as $animal)
                        <tr>
                            <td>{{$animal->id}}</td>
                            <td><a href="{{ route('animal.edit', ['animal'=> $animal->id]) }}" class="text-orange">{{$animal->nome_animal}}</a></td>
                            <td><a href="{{ route('tutor.edit', ['tutor'=>$animal->tutorAnimal->id]) }}" class="text-orange">{{$animal->tutorAnimal->nome}}</a></td>
                            <td>{{$animal->raca}}</td>
                            <td>{{$animal->sexo}}</td>
                            <td>{{$animal->castrado}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </section>
@endsection
