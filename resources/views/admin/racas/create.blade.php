@extends('admin.master.master')

@section('content')
<section class="dash_content_app">

    <header class="dash_content_app_header">
        <h2 class="icon-user-plus">Nova Raça</h2>

        <div class="dash_content_app_header_actions">
            <nav class="dash_content_app_breadcrumb">
                <ul>
                    <li><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="{{ route('animal.index') }}">Raças</a></li>
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
                    <a href="#tutor" class="nav_tabs_item_link active">Dados</a>
                </li>
            </ul>

            <form class="app_form" action="{{ route('racas.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="nav_tabs_content">
                    <div id="tutor">

                        <label class="label">
                            <span class="legend">*Espécie:</span>
                            <select name="especie">
                                <option value="canino" {{ (old('especie') == 'canino' ? 'selected' : '') }}>Canino</option>
                                <option value="felino" {{ (old('especie') == 'felino' ? 'selected' : '') }}>Felino</option>
                            </select>
                        </label>


                        <div class="label_g2">

                            <label class="label">
                                <span class="legend">*Raça:</span>
                                <input type="text" name="raca" placeholder="Raça" value="{{ old('raca')  }}"/>
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
