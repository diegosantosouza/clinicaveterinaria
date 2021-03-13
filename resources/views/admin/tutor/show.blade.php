@extends('admin.master.master')

@section('content')
<section class="dash_content_app">

    <header class="dash_content_app_header">
        <h2 class="icon-user">Tutor : {{ $tutorShow->nome }}</h2>

        <div class="dash_content_app_header_actions">
            <nav class="dash_content_app_breadcrumb">
                <ul>
                    <li><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="{{ route('tutor.index') }}">Tutor</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="{{ route('tutor.create') }}" class="text-orange">Novo Tutor</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="dash_content_app_box">
        <div class="nav">

            <ul class="nav_tabs">
                <li class="nav_tabs_item">
                    <a href="#tutor" class="nav_tabs_item_link active">Dados do Tutor</a>
                </li>
                <li class="nav_tabs_item">
                    <a href="#animal" class="nav_tabs_item_link">Dados do Animal</a>
                </li>

            </ul>

            <form class="app_form" action="{{ route('tutor.edit', ['tutor'=> $tutorShow->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="nav_tabs_content">
                    <div id="tutor">

                        <label class="label">
                            <span class="legend">*Nome:</span>
                            <input type="text" name="nome" value="{{ $tutorShow->nome }}" />
                        </label>



                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">*Genero:</span>
                                <input type="text" name="genero" value="{{ $tutorShow->genero }}" />
                            </label>

                            <label class="label">
                                <span class="legend">*CPF:</span>
                                <input type="tel" class="mask-doc" name="cpf" value="{{ $tutorShow->cpf }}" />
                            </label>
                        </div>

                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">*RG:</span>
                                <input type="text" name="rg" value="{{ $tutorShow->rg }}" />
                            </label>

                            <label class="label">
                                <span class="legend">Órgão Expedidor:</span>
                                <input type="text" name="orgao_expedidor" value="{{ $tutorShow->orgao_expedidor }}" />
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
                                    <input type="text" name="rua" class="street" value="{{ $tutorShow->rua }}" />
                                </label>

                                <div class="label_g2">
                                    <label class="label">
                                        <span class="legend">*Número:</span>
                                        <input type="text" name="numero" value="{{ $tutorShow->numero }}" />
                                    </label>

                                    <label class="label">
                                        <span class="legend">Complemento:</span>
                                        <input type="text" name="complemento" value="{{ $tutorShow->complemento }}" />
                                    </label>
                                </div>

                                <label class="label">
                                    <span class="legend">*Bairro:</span>
                                    <input type="text" name="bairro" class="neighborhood" value="{{ $tutorShow->bairro }}" />
                                </label>

                                <div class="label_g2">
                                    <label class="label">
                                        <span class="legend">*Estado:</span>
                                        <input type="text" name="estado" class="state" value="{{ $tutorShow->estado }}" />
                                    </label>

                                    <label class="label">
                                        <span class="legend">*Cidade:</span>
                                        <input type="text" name="cidade" class="city" value="{{ $tutorShow->cidade }}" />
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
                                        <input type="tel" name="telefone" class="mask-phone" value="{{ $tutorShow->telefone }}" />
                                    </label>

                                    <label class="label">
                                        <span class="legend">*Celular:</span>
                                        <input type="tel" name="celular" class="mask-cell" value="{{ $tutorShow->celular }}" />
                                    </label>
                                </div>

                                <div class="label_g2">
                                    <label class="label">
                                        <span class="legend">*E-mail:</span>
                                        <input type="email" name="email" value="{{ $tutorShow->email }}" />
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div id="animal" class="d-none">
                        @foreach($animals as $animal)
                        <div class="app_collapse">
                            <div class="app_collapse_header collapse">
                                <h3>{{ $animal->nome_animal }}</h3>
                                <span class="icon-plus-circle icon-notext"></span>
                            </div>

                            <div class="app_collapse_content d-none ">

                                <label class="label">
                                    <span class="legend">Nome:</span>
                                    <input type="text" name="nome_animal" value="{{ $animal->nome_animal }}" />
                                </label>

                                <div class="label_g2">
                                    <label class="label">
                                        <span class="legend">Sexo:</span>
                                        <input type="text" name="sexo" value="{{ $animal->sexo }}" />
                                    </label>

                                    <label class="label">
                                        <span class="legend">Espécie:</span>
                                        <input type="text" name="sexo" value="{{ $animal->especie }}" />
                                    </label>
                                </div>

                                <div class="label_g2">
                                    <label class="label">
                                        <span class="legend">Raça:</span>
                                        <input type="text" name="raca" value="{{ $animal->raca }}" />
                                    </label>

                                    <label class="label">
                                        <span class="legend">Idade:</span>
                                        <input type="text" name="idade" value="{{ $animal->idade }}" />
                                    </label>
                                </div>

                                <div class="label_g2">
                                    <label class="label">
                                        <span class="legend">Castrado:</span>
                                        <input type="text" name="idade" value="{{ $animal->castrado }}" />
                                    </label>

                                </div>

                                @foreach($anamneses as $anamnese)
                                    @if($anamnese->id_animal == $animal->id)
                                <div class="app_collapse">
                                    <div class="app_collapse_header collapse">
                                        <h3>Anamnese/Exame físico Data:{{ $anamnese->created_at }}</h3>
                                        <span class="icon-plus-circle icon-notext"></span>
                                    </div>

                                    <div class="app_collapse_content">

                                        <div class="label_g2">
                                            <label class="label">
                                                <span class="legend">Estado geral:</span>
                                                <input type="text" name="estado_geral" value="{{ $anamnese->estado_geral }}" />
                                            </label>

                                            <label class="label">
                                                <span class="legend">Peso:</span>
                                                <input type="text" name="peso" value="{{ $anamnese->peso }}" />
                                            </label>
                                        </div>

                                        <div class="label_g2">
                                            <label class="label">
                                                <span class="legend">Temperatura:</span>
                                                <input type="text" name="temperatura" value="{{ $anamnese->temperatura }}" />
                                            </label>

                                            <label class="label">
                                                <span class="legend">Freq. cardíaca:</span>
                                                <input type="text" name="frequencia_cardiaca" value="{{ $anamnese->frequencia_cardiaca }}" />
                                            </label>
                                        </div>

                                        <div class="label_g2">
                                            <label class="label">
                                                <span class="legend">Freq. respiratória:</span>
                                                <input type="text" name="frequencia_respiratoria" value="{{ $anamnese->frequencia_respiratoria }}" />
                                            </label>

                                            <label class="label">
                                                <span class="legend">Mucosas:</span>
                                                <input type="text" name="mucosas" value="{{ $anamnese->mucosas }}" />
                                            </label>

                                        </div>

                                        <div class="label_g2">
                                            <label class="label">
                                                <span class="legend">T. P. capilar:</span>
                                                <input type="text" name="t_p_capilar" value="{{ $anamnese->t_p_capilar }}" />
                                            </label>
                                            <label class="label">
                                                <span class="legend">Hidratação:</span>
                                                <input type="text" name="hidratacao" value="{{ $anamnese->hidratacao }}" />
                                            </label>

                                        </div>

                                        <div class="label_g2">
                                            <label class="label">
                                                <span class="legend">Linfonodos:</span>
                                                <input type="text" name="linfonodos" value="{{ $anamnese->linfonodos }}" />
                                            </label>

                                            <label class="label">
                                                <span class="legend">Tegumentos:</span>
                                                <input type="text" name="tegumentos" value="{{ $anamnese->tegumentos }}" />
                                            </label>

                                        </div>

                                        <div class="label_g2">
                                            <label class="label">
                                                <span class="legend">Sis. digestório:</span>
                                                <input type="text" name="sis_digestorio" value="{{ $anamnese->sis_digestorio }}" />
                                            </label>

                                            <label class="label">
                                                <span class="legend">Sis. geni. urinário:</span>
                                                <input type="text" name="sis_genito_urinario" value="{{ $anamnese->sis_genito_urinario }}" />
                                            </label>

                                        </div>

                                        <div class="label_g2">
                                            <label class="label">
                                                <span class="legend">Sis. neurológico:</span>
                                                <input type="text" name="sis_neurologico" value="{{ $anamnese->sis_neurologico }}" />
                                            </label>

                                            <label class="label">
                                                <span class="legend">Sis. cardiológico:</span>
                                                <input type="text" name="sis_cardiologico" value="{{ $anamnese->sis_cardiologico }}" />
                                            </label>

                                        </div>

                                        <div class="label_g2">
                                            <label class="label">
                                                <span class="legend">Ectoparasitos:</span>
                                                <input type="text" name="ectoparasitos" value="{{ $anamnese->ectoparasitos }}" />
                                            </label>

                                            <label class="label">
                                                <span class="legend">Vermifugação:</span>
                                                <input type="text" name="vermifugacao" value="{{ $anamnese->vermifugacao }}" />
                                            </label>

                                        </div>

                                        <div class="label_g2">
                                            <label class="label">
                                                <span class="legend">Banhos:</span>
                                                <input type="text" name="banhos" value="{{ $anamnese->banhos }}" />
                                            </label>

                                            <label class="label">
                                                <span class="legend">Alimentacao:</span>
                                                <input type="text" name="alimentacao" value="{{ $anamnese->alimentacao }}" />
                                            </label>

                                        </div>

                                        <div class="label_g2">
                                            <label class="label">
                                                <span class="legend">Queixa:</span>
                                                <textarea class="label" rows="4" id="queixa" name="queixa" >{{ $anamnese->queixa }}</textarea>
                                            </label>

                                        </div>
                                        <div class="app_collapse">
                                            <div class="app_collapse_header collapse">
                                                <h3>Consulta</h3>
                                                <span class="icon-plus-circle icon-notext"></span>
                                            </div>
                                            <div class="app_collapse_content">

                                                <div class="label_g2">
                                                    <label class="label">
                                                        <span class="legend">Suspeita diagnóstica:</span>
                                                        <textarea class="label" rows="4" id="suspeita_diagnostica" name="suspeita_diagnostica" >{{ $anamnese->suspeita_diagnostica }}</textarea>
                                                    </label>

                                                    <label class="label">
                                                        <span class="legend">Solicitação de exames:</span>
                                                        <textarea class="label" rows="4" id="solicitacao_exames" name="solicitacao_exames" >{{ $anamnese->solicitacao_exames }}</textarea>
                                                    </label>

                                                </div>

                                                <div class="label_g2">
                                                    <label class="label">
                                                        <span class="legend">Tratamento:</span>
                                                        <textarea class="label" rows="4" id="tratamento" name="tratamento" >{{ $anamnese->tratamento }}</textarea>
                                                    </label>

                                                    <label class="label">
                                                        <span class="legend">Arquivos:</span>
                                                        <input type="text" name="arquivos" placeholder="Arquivos" value="{{ $anamnese->arquivos }}" />
                                                    </label>

                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                                    @endif
                                @endforeach


                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>


                <div class="text-right mt-2">
                    <button class="btn btn-large btn-green icon-check-square-o" type="submit">Editar</button>
                </div>

            </form>
        </div>
    </div>
</section>
@endsection
