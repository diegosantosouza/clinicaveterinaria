@extends('admin.master.master')
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
@section('css')
    <link href='{{asset('backend/assets/fullcalendar/lib/main.css')}}' rel='stylesheet' />
    <link href='{{asset('backend/assets/bootstrap/css/bootstrap.css')}}' rel='stylesheet' />
    <link href='{{asset('backend/assets/fullcalendar/css/style.css')}}' rel='stylesheet' />

@endsection


@section('content')

@include('admin.fullcalendar.modais.events')
@include('admin.fullcalendar.modais.fastEvents')
<div class="row" id='wrap'>

    <div id='external-events'>
        <h4>Eventos</h4>

        <div id='external-events-list'>
            @isset($fastEvents)
                @forelse($fastEvents as $fastEvent)
                    <div id="boxFastEvent{{ $fastEvent->id }}"
                         style="padding: 4px; border: 1px solid {{ $fastEvent->color }}; background-color: {{ $fastEvent->color }}"
                         class='fc-event event text-center'
                         data-event='{"id":"{{ $fastEvent->id }}","title":"{{ $fastEvent->title }}","color":"{{ $fastEvent->color }}","start":"{{ $fastEvent->start }}","end":"{{ $fastEvent->end }}"}'>
                        {{ $fastEvent->title }}
                    </div>
                @empty
                    <p>Não há eventos rápidos a serem visualizados</p>
                @endforelse
            @endisset
        </div>

        <p>
            <input type='checkbox' id='drop-remove' />
            <label for='drop-remove'>remover após arrastar</label>
            <button class="btn btn-sm btn-success" id="newFastEvent" style="font-size: 1em; width: 100%;">Criar novo evento</button>
        </p>
    </div>

    <div id='calendar-wrap'>
        <div id='calendar'
             data-route-load-events="{{ route('routeLoadEvents') }}"
             data-route-event-update="{{ route('routeEventUpdate') }}"
             data-route-event-store="{{ route('routeEventStore') }}"
             data-route-event-delete="{{ route('routeEventDelete') }}"

             data-route-fast-event-delete="{{ route('routeFastEventDelete') }}"
             data-route-fast-event-update="{{ route('routeFastEventUpdate') }}"
             data-route-fast-event-store="{{ route('routeFastEventStore') }}">

        </div>
    </div>

</div>
@endsection

@section('js')
    <script src='{{asset('backend/assets/fullcalendar/lib/main.js')}}'></script>
    <script src='{{asset('backend/assets/fullcalendar/lib/locales-all.js')}}'></script>

    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>-->

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
    <script src='{{asset('backend/assets/fullcalendar/js/script.js')}}'></script>
    <script src='{{asset('backend/assets/fullcalendar/js/calendar.js')}}'></script>
@endsection

