@extends('admin.master.master')

@section('content')
<section class="dash_content_app">

    <header class="dash_content_app_header">
        <h2 class="icon-user-plus">Novo Animal</h2>

        <div class="dash_content_app_header_actions">
            <nav class="dash_content_app_breadcrumb">
                <ul>
                    <li><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="{{ route('animal.index') }}">Animais</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="{{ route('animal.create') }}" class="text-orange">Novo Animal</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="dash_content_app_box">
        <div class="nav">

            @if($errors->all())
                @foreach($errors->all() as $error)
                    <div class="message message-orange">
                        <p class="icon-asterisk">{{ $error }}</p>
                    </div>
                @endforeach
            @endif

            <ul class="nav_tabs">
                <li class="nav_tabs_item">
                    <a href="#animal" class="nav_tabs_item_link active">Dados do Animal</a>
                </li>

            </ul>

            <form class="app_form" action="{{ route('animal.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="nav_tabs_content">
                    <div id="animal">

                        <input type="hidden" name="tutor" value="{{$tutor}}">

                        <label class="label">
                            <span class="legend">*Nome:</span>
                            <input type="text" name="nome_animal" placeholder="Nome do Animal"
                                   value="{{ old('nome_animal') }}"/>
                        </label>

                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">*Sexo:</span>
                                <select name="sexo">
                                    <option value="macho" {{ (old('sexo') == 'macho' ? 'selected' : '') }}>Macho</option>
                                    <option value="fêmea" {{ (old('sexo') == 'fêmea' ? 'selected' : '') }}>Fêmea</option>
                                </select>
                            </label>

                            <label class="label">
                                <span class="legend">*Espécie:</span>
                                <select name="especie">
                                    <option value="canino" {{ (old('especie') == 'canino' ? 'selected' : '') }}>Canino</option>
                                    <option value="felino" {{ (old('especie') == 'felino' ? 'selected' : '') }}>Felino</option>
                                </select>
                            </label>
                        </div>

                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">*Raça:</span>
                                <select name="raca">
                                    @foreach($racas as $raca)
                                        <option value="{{$raca->raca}}" {{ (old('raca') == $raca->raca ? 'selected' : '') }}>{{$raca->raca}}</option>
                                    @endforeach
                                </select>
                            </label>

                            <label class="label">
                                <span class="legend">*Data de Nascimento:</span>
                                <input type="text" name="idade" placeholder="Data" class="mask-date" value="{{ old('idade') }}"/>
                            </label>
                        </div>

                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">*Castrado:</span>
                                <select name="castrado">
                                    <option value="sim" {{ (old('castrado') == 'sim' ? 'selected' : '') }}>Sim</option>
                                    <option value="não" {{ (old('castrado') == 'não' ? 'selected' : '') }}>Não</option>
                                </select>
                            </label>

                        </div>

                    </div>


                </div>

                <div class="text-right mt-2">
                    <button class="btn btn-large btn-green icon-check-square-o" type="submit">Salvar Alterações
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
