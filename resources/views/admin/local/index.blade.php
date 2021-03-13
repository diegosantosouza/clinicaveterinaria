@extends('admin.master.master')

@section('content')
    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-search">Filtro<a href="{{ route('local.create') }}" class="btn btn-orange icon-file-text ml-1">Nova Local</a></h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('local.index') }}" class="text-orange">Local</a></li>
                    </ul>
                </nav>

                <button class="btn btn-green icon-search icon-notext ml-1 search_open"></button>
            </div>
        </header>

        @include('admin.local.filter')


        @if(!empty($locais))

        <div class="dash_content_app_box">
            <div class="dash_content_app_box_stage">
                <table id="dataTable" class="nowrap stripe" width="100" style="width: 100% !important;">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Local</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($locais as $local)
                        <tr>
                            <td>{{$local->id}}</td>
                            <td>{{$local->local}}</td>
                            <td>
                                <form action="{{route('local.destroy', ['local'=>$local->id])}}" method="post" class="text-right mt-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-red icon-exclamation">Deletar</button>
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
