@extends('admin.master.master')

@section('content')
    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-search">Filtro<a href="{{ route('racas.create') }}" class="btn btn-orange icon-file-text ml-1">Nova Raça</a></h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('tutor.index') }}" class="text-orange">Raças</a></li>
                    </ul>
                </nav>

                <button class="btn btn-green icon-search icon-notext ml-1 search_open"></button>
            </div>
        </header>

        @include('admin.racas.filter')


        @if(!empty($racas))

        <div class="dash_content_app_box">
            <div class="dash_content_app_box_stage">
                <table id="dataTable" class="nowrap stripe" width="100" style="width: 100% !important;">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Raça</th>
                        <th>Espécie</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($racas as $raca)
                        <tr>
                            <td>{{$raca->id}}</td>
                            <td>{{$raca->raca}}</td>
                            <td>{{$raca->especie}}</td>
                            <td>
                                <form action="{{route('racas.destroy', ['raca'=>$raca->id])}}" method="post" class="text-right mt-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-red icon-trash">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </section>
@endsection
