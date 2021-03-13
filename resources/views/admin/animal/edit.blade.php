@extends('admin.master.master')

@section('content')
    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-user">Animal : {{ $animals->nome_animal }} <a href="{{ route('anamnese.novaconsulta', ['consulta'=> $animals->id]) }}" class="btn btn-orange icon-file-text ml-1">Nova consulta</a></h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('animal.index') }}" class="text-orange">Animal</a></li>

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

                <form class="app_form" action="{{ route('animal.update', ['animal'=> $animals->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="nav_tabs_content">
                    <div id="animal">


                        @if(!empty($animals))
                            <div class="app_collapse">

                                <div class="app_collapse_header collapse">
                                    <h3>{{ $animals->nome_animal }}</h3>

                                    <span class="icon-plus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content d-none ">

                                    <label class="label">
                                        <span class="legend">Nome:</span>
                                        <input type="text" name="nome_animal" value="{{ old('nome_animal') ?? $animals->nome_animal }}" />
                                    </label>

                                    <div class="label_g2">

                                        <label class="label">
                                            <span class="legend">*Sexo:</span>
                                            <select name="sexo">
                                                <option value="macho" {{ (old('sexo') == 'macho' ? 'selected' : ($animals->sexo == 'macho' ? 'selected' : '')) }}>Macho</option>
                                                <option value="fêmea" {{ (old('sexo') == 'fêmea' ? 'selected' : ($animals->sexo == 'fêmea' ? 'selected' : '')) }}>Fêmea</option>
                                            </select>
                                        </label>

                                        <label class="label">
                                            <span class="legend">*Espécie:</span>
                                                <select name="especie">
                                                    <option value="canino" {{ (old('especie') == 'canino' ? 'selected' : ($animals->especie == 'canino' ? 'selected' : '')) }}>Canino</option>
                                                    <option value="felino" {{ (old('especie') == 'felino' ? 'selected' : ($animals->especie == 'felino' ? 'selected' : '')) }}>Felino</option>
                                                </select>
                                        </label>
                                    </div>

                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">Raça:</span>
                                            <select name="raca">
                                                @foreach($racas as $raca)
                                                    <option value="{{$raca->raca}}" {{ (old('raca') == $raca->raca ? 'selected' : ($animals->raca == $raca->raca ? 'selected' : '')) }}>{{$raca->raca}}</option>
                                                @endforeach
                                             
                                            </select>
                                    
                                        </label>

                                        <label class="label">
                                            <span class="legend">Data de Nascimento:</span>
                                            <input type="text" name="idade" value="{{ old('idade') ?? $animals ->idade }}" />
                                        </label>
                                    </div>

                                    <div class="label_g2">

                                        <label class="label">
                                            <span class="legend">*Castrado:</span>
                                            <select name="castrado">
                                                <option value="sim" {{ (old('castrado') == 'sim' ? 'selected' : ($animals->castrado == 'sim' ? 'selected' : '')) }}>Sim</option>
                                                <option value="nao" {{ (old('castrado') == 'nao' ? 'selected' : ($animals->castrado == 'nao' ? 'selected' : '')) }}>Não</option>
                                            </select>
                                        </label>


                                    </div>

                                    @foreach($anamneses as $anamnese)
                                        @if($anamnese->id_animal == $animals->id)
                                            <div class="app_collapse">
                                                <div class="app_collapse_header collapse">
                                                    <h5>Anamnese Data:{{ $anamnese->getAnamneseDataAttribute() }}</h5>
                                                    <span class="icon-plus-circle icon-notext"></span>
                                                </div>

                                                <div class="app_collapse_content ">
                                                    <fieldset disabled>

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
                                                                        <input type="file" name="arquivos" placeholder="Arquivos" value="{{ old('arquivos') ?? $anamnese->arquivos }}" />
                                                                    </label>

                                                                </div>

                                                                <div class="label_g2">

                                                                    @foreach($anamnese->arquivos()->get() as $arquivos)
                                                                        <div class="arquivo">

                                                                            <img src="{{asset('backend/assets/images/file.png')}}" alt="Arquivo">

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
                                                    </fieldset>
                                                </div>
                                            </div>

                                        @endif
                                    @endforeach


                                </div>


                            </div>
                        @endif

                    </div>
                    </div>

                    <div class="text-right mt-2">
                        <button class="btn btn-large btn-green icon-check-square-o" type="submit">Editar</button>
                    </div>

                </form>

                    <form action="{{route('animal.destroy', ['animal'=>$animals->id])}}" method="post" class="app_form text-right mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-large btn-red icon-trash">Deletar</button>
                    </form>
            </div>
        </div>
    </section>
@endsection
