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
                        <li><a href="{{ route('tutor.index') }}" class="text-orange">Tutor</a></li>
                    </ul>
                </nav>

                <a href="{{ route('tutor.create') }}" class="btn btn-orange icon-user ml-1">Criar novo</a>
                <button class="btn btn-green icon-search icon-notext ml-1 search_open"></button>
            </div>
        </header>

        @include('admin.animal.filter')


        @if(!empty($tutors))

        <div class="dash_content_app_box">
            <div class="dash_content_app_box_stage">
                <table id="dataTable" class="nowrap stripe" width="100" style="width: 100% !important;">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Bairro</th>
                        <th>Celular</th>
                        <th>E-mail</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($tutors as $tutor)
                        <tr>
                            <td>{{$tutor->id}}</td>
                            <td><a href="{{ route('tutor.edit', ['tutor'=>$tutor->id]) }}" class="text-orange">{{$tutor->nome}}</a></td>
                            <td>{{$tutor->bairro}}</td>
                            <td class="mask-cell">{{$tutor->celular}}</td>
                            <td><a href="mailto:{{$tutor->email}}" class="text-orange">{{$tutor->email}}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </section>
@endsection
