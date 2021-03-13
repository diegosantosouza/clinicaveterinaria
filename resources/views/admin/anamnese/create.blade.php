@extends('admin.master.master')

@section('content')
<section class="dash_content_app">

    <header class="dash_content_app_header">
        <h2 class="icon-user">Nova anamnese</h2>

        <div class="dash_content_app_header_actions">
            <nav class="dash_content_app_breadcrumb">
                <ul>
                    <li><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="{{ route('tutor.index') }}" class="text-orange">Anamnese</a></li>

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
                    <a href="#anamnese" class="nav_tabs_item_link active">Anamnese</a>
                </li>


            </ul>

            <form class="app_form" action="{{ route('anamnese.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="nav_tabs_content">
                    <div id="anamnese">

                        <input type="hidden" name="consulta" value="{{$consulta}}">


                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">Estado geral:</span>
                                    <input type="text" name="estado_geral" value="{{ old('estado_geral') }}" />
                                </label>

                                <label class="label">
                                    <span class="legend">Peso:</span>
                                    <input type="text" name="peso" value="{{ old('peso')}}" />
                                </label>
                            </div>

                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">Temperatura:</span>
                                    <input type="text" name="temperatura" value="{{ old('temperatura')}}" />
                                </label>

                                <label class="label">
                                    <span class="legend">Freq. cardíaca:</span>
                                    <input type="text" name="frequencia_cardiaca" value="{{ old('frequencia_cardiaca')}}" />
                                </label>
                            </div>

                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">Freq. respiratória:</span>
                                    <input type="text" name="frequencia_respiratoria" value="{{ old('frequencia_respiratoria')}}" />
                                </label>

                                <label class="label">
                                    <span class="legend">Mucosas:</span>
                                    <input type="text" name="mucosas" value="{{ old('mucosas')}}" />
                                </label>

                            </div>

                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">T. P. capilar:</span>
                                    <input type="text" name="t_p_capilar" value="{{ old('t_p_capilar')}}" />
                                </label>
                                <label class="label">
                                    <span class="legend">Hidratação:</span>
                                    <input type="text" name="hidratacao" value="{{ old('hidratacao')}}" />
                                </label>

                            </div>

                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">Linfonodos:</span>
                                    <input type="text" name="linfonodos" value="{{ old('linfonodos')}}" />
                                </label>

                                <label class="label">
                                    <span class="legend">Tegumentos:</span>
                                    <input type="text" name="tegumentos" value="{{ old('tegumentos')}}" />
                                </label>

                            </div>

                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">Sis. digestório:</span>
                                    <input type="text" name="sis_digestorio" value="{{ old('sis_digestorio')}}" />
                                </label>

                                <label class="label">
                                    <span class="legend">Sis. geni. urinário:</span>
                                    <input type="text" name="sis_genito_urinario" value="{{ old('sis_genito_urinario')}}" />
                                </label>

                            </div>

                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">Sis. neurológico:</span>
                                    <input type="text" name="sis_neurologico" value="{{ old('sis_neurologico')}}" />
                                </label>

                                <label class="label">
                                    <span class="legend">Sis. cardiológico:</span>
                                    <input type="text" name="sis_cardiologico" value="{{ old('sis_cardiologico')}}" />
                                </label>

                            </div>

                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">Ectoparasitos:</span>
                                    <input type="text" name="ectoparasitos" value="{{ old('ectoparasitos')}}" />
                                </label>

                                <label class="label">
                                    <span class="legend">Vermifugação:</span>
                                    <input type="text" name="vermifugacao" value="{{ old('vermifugacao')}}" />
                                </label>

                            </div>

                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">Banhos:</span>
                                    <input type="text" name="banhos" value="{{ old('banhos')}}" />
                                </label>

                                <label class="label">
                                    <span class="legend">Alimentacao:</span>
                                    <input type="text" name="alimentacao" value="{{ old('alimentacao')}}" />
                                </label>

                            </div>

                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">Queixa:</span>
                                    <textarea class="label" rows="4" id="queixa" name="queixa" >{{ old('queixa')}}</textarea>
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
                                                <textarea class="label" rows="4" id="suspeita_diagnostica" name="suspeita_diagnostica" >{{ old('suspeita_diagnostica')}}</textarea>
                                            </label>

                                            <label class="label">
                                                <span class="legend">Solicitação de exames:</span>
                                                <textarea class="label" rows="4" id="solicitacao_exames" name="solicitacao_exames" >{{ old('solicitacao_exames')}}</textarea>
                                            </label>

                                        </div>

                                        <div class="label_g2">
                                            <label class="label">
                                                <span class="legend">Tratamento:</span>
                                                <textarea class="label" rows="4" id="tratamento" name="tratamento" >{{ old('tratamento')}}</textarea>
                                            </label>

                                           <label class="label">
                                                <span class="legend">Arquivos:</span>
                                                <input type="file" name="arquivos[]" multiple placeholder="Arquivos" value="{{ old('arquivos'?? $anamnese->arquivos)}}" />
                                            </label>
                                        </div>

                                        <div class="label_g2">

                                            <label class="label">
                                                <span class="legend">Valor:</span>
                                                <input type="text" name="valor" class="mask-money" value="{{ old('valor')}}" />
                                            </label>
                                            
                                            <label class="label">
                                                <span class="legend">*Local de Atendimento:</span>
                                                <select name="local">
                                                    @foreach($locais as $local)
                                                        <option value="{{$local->local}}" {{ (old('local') == $local->local ? 'selected' : '') }}>{{$local->local}}</option>
                                                    @endforeach
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                            </div>

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
