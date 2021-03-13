@extends('admin.master.master')

@section('content')
<section class="dash_content_app">

    <header class="dash_content_app_header">
        <h2 class="icon-user">Tutor : {{ $tutorShow->nome }} <a href="{{ route('animal.novoAnimal', ['tutor'=> $tutorShow->id]) }}" class="btn btn-orange icon-file-text ml-1">Novo animal</a></h2>

        <div class="dash_content_app_header_actions">
            <nav class="dash_content_app_breadcrumb">
                <ul>
                    <li><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="{{ route('tutor.index') }}" class="text-orange">Tutor</a></li>

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
                    <a href="#tutor" class="nav_tabs_item_link active">Dados do Tutor</a>
                </li>
                <li class="nav_tabs_item">
                    <a href="#animal" class="nav_tabs_item_link">Dados do Animal</a>
                </li>

            </ul>

            <form class="app_form" action="{{ route('tutor.update', ['tutor'=> $tutorShow->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="nav_tabs_content">
                    <div id="tutor">

                        <label class="label">
                            <span class="legend">*Nome:</span>
                            <input type="text" name="nome" value="{{ old('nome') ?? $tutorShow->nome }}" />
                        </label>



                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">*Genero:</span>
                                <select name="genero">
                                    <option value="Masculino" {{ (old('genero') == 'Masculino' ? 'selected' : ($tutorShow->genero == 'Masculino' ? 'selected' : '')) }}>Masculino</option>
                                    <option value="Feminino" {{ (old('genero') == 'Feminino' ? 'selected' : ($tutorShow->genero == 'Feminino' ? 'selected' : '')) }}>Feminino</option>
                                    <option value="Outros" {{ (old('genero') == 'Outros' ? 'selected' : ($tutorShow->genero == 'Outros' ? 'selected' : '')) }}>Outros</option>
                                </select>
                            </label>

                            <label class="label">
                                <span class="legend">*CPF:</span>
                                <input type="tel" class="mask-doc" name="cpf" value="{{ old('cpf') ?? $tutorShow->cpf }}" />
                            </label>
                        </div>

                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">*RG:</span>
                                <input type="text" name="rg" value="{{ old('rg') ?? $tutorShow->rg }}" />
                            </label>

                            <label class="label">
                                <span class="legend">Órgão Expedidor:</span>
                                <input type="text" name="orgao_expedidor" value="{{ old('orgao_expeditor') ?? $tutorShow->orgao_expedidor }}" />
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
                                    <input type="text" name="rua" class="street" value="{{ old('rua') ?? $tutorShow->rua }}" />
                                </label>

                                <div class="label_g2">
                                    <label class="label">
                                        <span class="legend">*Número:</span>
                                        <input type="text" name="numero" value="{{ old('numero') ?? $tutorShow->numero }}" />
                                    </label>

                                    <label class="label">
                                        <span class="legend">Complemento:</span>
                                        <input type="text" name="complemento" value="{{ old('complemento') ?? $tutorShow->complemento }}" />
                                    </label>
                                </div>

                                <label class="label">
                                    <span class="legend">*Bairro:</span>
                                    <input type="text" name="bairro" class="neighborhood" value="{{ old('bairro') ?? $tutorShow->bairro }}" />
                                </label>

                                <div class="label_g2">
                                    <label class="label">
                                        <span class="legend">*Estado:</span>
                                        <input type="text" name="estado" class="state" value="{{ old('estado') ?? $tutorShow->estado }}" />
                                    </label>

                                    <label class="label">
                                        <span class="legend">*Cidade:</span>
                                        <input type="text" name="cidade" class="city" value="{{ old('cidade') ?? $tutorShow->cidade }}" />
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
                                        <input type="tel" name="telefone" class="mask-phone" value="{{ old('telefone') ?? $tutorShow->telefone }}" />
                                    </label>

                                    <label class="label">
                                        <span class="legend">*Celular:</span>
                                        <input type="tel" name="celular" class="mask-cell" value="{{ old('celular') ?? $tutorShow->celular }}" />
                                    </label>
                                </div>

                                <div class="label_g2">
                                    <label class="label">
                                        <span class="legend">*E-mail:</span>
                                        <input type="email" name="email" value="{{ old('email') ?? $tutorShow->email }}" />
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div id="animal" class="d-none">
                        <fieldset disabled>
                        @foreach($animals as $animal)
                        <div class="app_collapse">

                            <div class="app_collapse_header collapse">
                                <h3>{{ $animal->nome_animal }}</h3>

                                <span class="icon-plus-circle icon-notext"></span>
                            </div>

                            <div class="app_collapse_content d-none ">

                                <label class="label">
                                    <span class="legend">Nome:</span>
                                    <input type="text" name="nome_animal" value="{{ old('nome_animal') ?? $animal->nome_animal }}" />
                                </label>

                                <div class="label_g2">
                                    <label class="label">
                                        <span class="legend">Sexo:</span>
                                        <input type="text" name="sexo" value="{{ old('sexo') ?? $animal->sexo }}" />
                                    </label>

                                    <label class="label">
                                        <span class="legend">Espécie:</span>
                                        <input type="text" name="sexo" value="{{ old('especie') ?? $animal->especie }}" />
                                    </label>
                                </div>

                                <div class="label_g2">
                                    <label class="label">
                                        <span class="legend">Raça:</span>
                                        <input type="text" name="raca" value="{{ old('raca') ?? $animal->raca }}" />
                                    </label>

                                    <label class="label">
                                        <span class="legend">Data de Nascimento:</span>
                                        <input type="text" name="idade" value="{{ old('idade') ?? $animal->idade }}" />
                                    </label>
                                </div>

                                <div class="label_g2">
                                    <label class="label">
                                        <span class="legend">Castrado:</span>
                                        <input type="text" name="idade" value="{{ old('castrado') ?? $animal->castrado }}" />
                                    </label>

                                </div>

                                @foreach($anamneses as $anamnese)
                                    @if($anamnese->id_animal == $animal->id)
                                <div class="app_collapse">
                                    <div class="app_collapse_header collapse">
                                        <h5>Anamnese Data:{{ $anamnese->getAnamneseDataAttribute() }}</h5>
                                        <span class="icon-plus-circle icon-notext"></span>
                                    </div>

                                    <div class="app_collapse_content">

                                        <div class="label_g2">
                                            <label class="label">
                                                <span class="legend">Estado geral:</span>
                                                <input type="text" name="estado_geral" value="{{ old('estado_geral') ?? $anamnese->estado_geral }}" />
                                            </label>

                                            <label class="label">
                                                <span class="legend">Peso:</span>
                                                <input type="text" name="peso" value="{{ old('peso') ?? $anamnese->peso }}" />
                                            </label>
                                        </div>

                                        <div class="label_g2">
                                            <label class="label">
                                                <span class="legend">Temperatura:</span>
                                                <input type="text" name="temperatura" value="{{ old('temperatura') ?? $anamnese->temperatura }}" />
                                            </label>

                                            <label class="label">
                                                <span class="legend">Freq. cardíaca:</span>
                                                <input type="text" name="frequencia_cardiaca" value="{{ old('frequencia_cardiaca') ?? $anamnese->frequencia_cardiaca }}" />
                                            </label>
                                        </div>

                                        <div class="label_g2">
                                            <label class="label">
                                                <span class="legend">Freq. respiratória:</span>
                                                <input type="text" name="frequencia_respiratoria" value="{{ old('frequencia_respiratoria') ?? $anamnese->frequencia_respiratoria }}" />
                                            </label>

                                            <label class="label">
                                                <span class="legend">Mucosas:</span>
                                                <input type="text" name="mucosas" value="{{ old('mucosas') ?? $anamnese->mucosas }}" />
                                            </label>

                                        </div>

                                        <div class="label_g2">
                                            <label class="label">
                                                <span class="legend">T. P. capilar:</span>
                                                <input type="text" name="t_p_capilar" value="{{ old('t_p_capilar') ?? $anamnese->t_p_capilar }}" />
                                            </label>
                                            <label class="label">
                                                <span class="legend">Hidratação:</span>
                                                <input type="text" name="hidratacao" value="{{ old('hidratacao') ?? $anamnese->hidratacao }}" />
                                            </label>

                                        </div>

                                        <div class="label_g2">
                                            <label class="label">
                                                <span class="legend">Linfonodos:</span>
                                                <input type="text" name="linfonodos" value="{{ old('linfonodos') ?? $anamnese->linfonodos }}" />
                                            </label>

                                            <label class="label">
                                                <span class="legend">Tegumentos:</span>
                                                <input type="text" name="tegumentos" value="{{ old('tegumentos') ?? $anamnese->tegumentos }}" />
                                            </label>

                                        </div>

                                        <div class="label_g2">
                                            <label class="label">
                                                <span class="legend">Sis. digestório:</span>
                                                <input type="text" name="sis_digestorio" value="{{ old('sis_digestorio') ?? $anamnese->sis_digestorio }}" />
                                            </label>

                                            <label class="label">
                                                <span class="legend">Sis. geni. urinário:</span>
                                                <input type="text" name="sis_genito_urinario" value="{{ old('sis_genito_urinario') ?? $anamnese->sis_genito_urinario }}" />
                                            </label>

                                        </div>

                                        <div class="label_g2">
                                            <label class="label">
                                                <span class="legend">Sis. neurológico:</span>
                                                <input type="text" name="sis_neurologico" value="{{ old('sis_neurologico') ?? $anamnese->sis_neurologico }}" />
                                            </label>

                                            <label class="label">
                                                <span class="legend">Sis. cardiológico:</span>
                                                <input type="text" name="sis_cardiologico" value="{{ old('sis_cardiologico') ?? $anamnese->sis_cardiologico }}" />
                                            </label>

                                        </div>

                                        <div class="label_g2">
                                            <label class="label">
                                                <span class="legend">Ectoparasitos:</span>
                                                <input type="text" name="ectoparasitos" value="{{ old('ectoparasitos') ?? $anamnese->ectoparasitos }}" />
                                            </label>

                                            <label class="label">
                                                <span class="legend">Vermifugação:</span>
                                                <input type="text" name="vermifugacao" value="{{ old('vermifugacao') ?? $anamnese->vermifugacao }}" />
                                            </label>

                                        </div>

                                        <div class="label_g2">
                                            <label class="label">
                                                <span class="legend">Banhos:</span>
                                                <input type="text" name="banhos" value="{{ old('banhos') ?? $anamnese->banhos }}" />
                                            </label>

                                            <label class="label">
                                                <span class="legend">Alimentacao:</span>
                                                <input type="text" name="alimentacao" value="{{ old('alimentacao') ?? $anamnese->alimentacao }}" />
                                            </label>

                                        </div>

                                        <div class="label_g2">
                                            <label class="label">
                                                <span class="legend">Queixa:</span>
                                                <textarea class="label" rows="4" id="queixa" name="queixa" >{{ old('queixa') ?? $anamnese->queixa }}</textarea>
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
                                                        <textarea class="label" rows="4" id="suspeita_diagnostica" name="suspeita_diagnostica" >{{ old('suspeita_diagnostica') ?? $anamnese->suspeita_diagnostica }}</textarea>
                                                    </label>

                                                    <label class="label">
                                                        <span class="legend">Solicitação de exames:</span>
                                                        <textarea class="label" rows="4" id="solicitacao_exames" name="solicitacao_exames" >{{ old('solicitacao_exames') ?? $anamnese->solicitacao_exames }}</textarea>
                                                    </label>

                                                </div>

                                                <div class="label_g2">
                                                    <label class="label">
                                                        <span class="legend">Tratamento:</span>
                                                        <textarea class="label" rows="4" id="tratamento" name="tratamento" >{{ old('tratamento') ?? $anamnese->tratamento }}</textarea>
                                                    </label>

                                                    <label class="label">
                                                        <span class="legend">Arquivos:</span>
                                                        <input type="text" name="arquivos" placeholder="Arquivos" value="{{ old('arquivos') ?? $anamnese->arquivos }}" />
                                                    </label>

                                                </div>

                                                <div class="label_g2">

                                                    @foreach($anamnese->arquivos()->get() as $arquivos)
                                                        <div class="arquivo">
                                                            <div>
                                                            <img src="{{asset('backend/assets/images/file.png')}}" alt="Arquivo">
                                                            </div>
                                                            <a target="_blank" href="{{asset('storage/'.$arquivos->path)}}" class="text-orange">{{\Illuminate\Support\Str::afterLast($arquivos->path, '/')}}</a>
                                                        </div>
                                                    @endforeach

                                                </div>

                                                <div class="label_g2">
                                                    <label class="label">
                                                        <span class="legend">Valor:</span>
                                                        <input type="text" name="valor" class="mask-money" value="{{ old('valor') ?? $anamnese->valor }}" />
                                                    </label>
                                                    
                                                    <label class="label">
                                                        <span class="legend">*Local de Atendimento:</span>
                                                        <input type="text" name="local" value="{{ old('local') ?? $anamnese->local }}" />
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
                    </fieldset>
                    </div>

                </div>

                <div class="text-right mt-2">
                    <button class="btn btn-large btn-green icon-check-square-o" type="submit">Editar</button>
                </div>

            </form>

                <form action="{{route('tutor.destroy', ['tutor'=>$tutorShow->id])}}" method="post" class="app_form text-right mt-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-large btn-red icon-trash">Deletar</button>

                </form>
        </div>
    </div>
</section>
@endsection
