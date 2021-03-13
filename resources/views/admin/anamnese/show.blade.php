@extends('admin.master.master')

@section('content')
<section class="dash_content_app">

    <header class="dash_content_app_header">
        <h2 class="icon-user-plus">Animal</h2>

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
                    @message(['color' => 'orange'])
                    <p class="icon-asterisk">{{ $error }}</p>
                    @endmessage
                @endforeach
            @endif

            <ul class="nav_tabs">
                <li class="nav_tabs_item">
                    <a href="#tutor" class="nav_tabs_item_link active">Dados do Tutor</a>
                </li>
                <li class="nav_tabs_item">
                    <a href="#animal" class="nav_tabs_item_link">Dados do Animal</a>
                </li>

            </ul>

            <form class="app_form" action="{{ route('animal.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="nav_tabs_content">
                    <div id="tutor">

                        <label class="label">
                            <span class="legend">*Nome:</span>
                            <input type="text" name="nome" placeholder="Nome Completo" value="{{ old('nome') }}"/>
                        </label>

                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">*Genero:</span>
                                <select name="genero">
                                    <option value="Masculino" {{ (old('genero') == 'Masculino' ? 'selected' : '') }}>Masculino</option>
                                    <option value="Feminino" {{ (old('genero') == 'Feminino' ? 'selected' : '') }}>Feminino</option>
                                    <option value="Outros" {{ (old('genero') == 'Outros' ? 'selected' : '') }}>Outros</option>
                                </select>
                            </label>

                            <label class="label">
                                <span class="legend">*CPF:</span>
                                <input type="tel" class="mask-doc" name="cpf" placeholder="CPF do Cliente"
                                       value="{{ old('cpf') }}"/>
                            </label>
                        </div>

                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">*RG:</span>
                                <input type="text" name="rg" placeholder="RG do Cliente"
                                       value="{{ old('rg') }}"/>
                            </label>

                            <label class="label">
                                <span class="legend">Órgão Expedidor:</span>
                                <input type="text" name="orgao_expedidor" placeholder="Expedição"
                                       value="{{ old('orgao_expedidor') }}"/>
                            </label>
                        </div>

                        <div class="app_collapse mt-2">
                            <div class="app_collapse_header collapse">
                                <h3>Endereço</h3>
                                <span class="icon-plus-circle icon-notext"></span>
                            </div>

                            <div class="app_collapse_content d-none">

                                <label class="label">
                                    <span class="legend">*Rua:</span>
                                    <input type="text" name="rua" class="street"
                                           placeholder="Endereço Completo" value="{{ old('rua') }}"/>
                                </label>

                                <div class="label_g2">
                                    <label class="label">
                                        <span class="legend">*Número:</span>
                                        <input type="text" name="numero" placeholder="Número do Endereço"
                                               value="{{ old('numero') }}"/>
                                    </label>

                                    <label class="label">
                                        <span class="legend">Complemento:</span>
                                        <input type="text" name="complemento" placeholder="Completo (Opcional)"
                                               value="{{ old('complemento') }}"/>
                                    </label>
                                </div>

                                <label class="label">
                                    <span class="legend">*Bairro:</span>
                                    <input type="text" name="bairro" class="neighborhood"
                                           placeholder="Bairro" value="{{ old('bairro') }}"/>
                                </label>

                                <div class="label_g2">
                                    <label class="label">
                                        <span class="legend">*Estado:</span>
                                        <input type="text" name="estado" class="state" placeholder="estado"
                                               value="{{ old('estado') }}"/>
                                    </label>

                                    <label class="label">
                                        <span class="legend">*Cidade:</span>
                                        <input type="text" name="cidade" class="city" placeholder="Cidade"
                                               value="{{ old('cidade') }}"/>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="app_collapse mt-2">
                            <div class="app_collapse_header collapse">
                                <h3>Contato</h3>
                                <span class="icon-plus-circle icon-notext"></span>
                            </div>

                            <div class="app_collapse_content d-none">
                                <div class="label_g2">
                                    <label class="label">
                                        <span class="legend">Residencial:</span>
                                        <input type="tel" name="telefone" class="mask-phone"
                                               placeholder="Número do Telefonce com DDD" value="{{ old('telefone') }}"/>
                                    </label>

                                    <label class="label">
                                        <span class="legend">*Celular:</span>
                                        <input type="tel" name="celular" class="mask-cell"
                                               placeholder="Número do Telefonce com DDD" value="{{ old('celular') }}"/>
                                    </label>
                                </div>

                                <div class="label_g2">
                                    <label class="label">
                                        <span class="legend">*E-mail:</span>
                                        <input type="email" name="email" placeholder="Melhor e-mail"
                                               value="{{ old('email') }}"/>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div id="animal" class="d-none">
                        <div class="app_collapse">
                            <div class="app_collapse_header collapse">
                                <h3>Animal</h3>
                                <span class="icon-plus-circle icon-notext"></span>
                            </div>

                            <div class="app_collapse_content d-none ">

                                <label class="label">
                                    <span class="legend">Nome:</span>
                                    <input type="text" name="nome_animal" placeholder="Nome do Animal"
                                           value="{{ old('nome_animal') }}"/>
                                </label>

                                <div class="label_g2">
                                    <label class="label">
                                        <span class="legend">Sexo:</span>
                                        <select name="sexo">
                                            <option value="macho" {{ (old('sexo') == 'macho' ? 'selected' : '') }}>Macho</option>
                                            <option value="fêmea" {{ (old('sexo') == 'fêmea' ? 'selected' : '') }}>Fêmea</option>
                                        </select>
                                    </label>

                                    <label class="label">
                                        <span class="legend">Espécie:</span>
                                        <select name="especie">
                                            <option value="canino" {{ (old('especie') == 'canino' ? 'selected' : '') }}>Canino</option>
                                            <option value="felino" {{ (old('especie') == 'felino' ? 'selected' : '') }}>Felino</option>
                                        </select>
                                    </label>
                                </div>

                                <div class="label_g2">
                                    <label class="label">
                                        <span class="legend">Raça:</span>
                                        <input type="text" name="raca"
                                               placeholder="Raça" value="{{ old('raca') }}"/>
                                    </label>

                                    <label class="label">
                                        <span class="legend">Idade:</span>
                                        <input type="text" name="idade"
                                               placeholder="Idade" value="{{ old('idade') }}"/>
                                    </label>
                                </div>

                                <div class="label_g2">
                                    <label class="label">
                                        <span class="legend">Castrado:</span>
                                        <select name="castrado">
                                            <option value="sim" {{ (old('castrado') == 'sim' ? 'selected' : '') }}>Sim</option>
                                            <option value="não" {{ (old('castrado') == 'não' ? 'selected' : '') }}>Não</option>
                                        </select>
                                    </label>

                                </div>

                            </div>
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
