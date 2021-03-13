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
                        <li><a href="{{ route('anamnese.index') }}" class="text-orange">Anamneses</a></li>
                    </ul>
                </nav>

                <button class="btn btn-green icon-search icon-notext ml-1 search_open"></button>
            </div>
        </header>

        @include('admin.animal.filter')


        @if(!empty($anamneses))

        <div class="dash_content_app_box">
            <div class="dash_content_app_box_stage">
                <table id="dataTable" class="nowrap stripe" width="100" style="width: 100% !important;">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Tutor</th>
                        <th>Valor</th>
                        <th>Celular</th>
                        <th>E-mail</th>
                        <th>Local</th>
                        <th>Data</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($anamneses as $anamnese)
                        <tr>
                            <td>{{$anamnese->id}}</td>
                            <td><a href="{{ route('anamnese.edit', ['anamnese'=>$anamnese->id]) }}" class="text-orange">{{$anamnese->animalAnamnese->nome_animal}}</a></td>
                            <td>{{$anamnese->tutorAnamnese->nome}}</td>
                            <td class="mask-money">{{$anamnese->valor}}</td>
                            <td>{{$anamnese->tutorAnamnese->celular}}</td>
                            <td><a href="mailto:{{$anamnese->tutorAnamnese->email}}" class="text-orange">{{$anamnese->tutorAnamnese->email}}</a></td>
                            <td>{{$anamnese->local}}</td>
                            <td>{{$anamnese->getAnamneseDataAttribute()}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </section>
@endsection
