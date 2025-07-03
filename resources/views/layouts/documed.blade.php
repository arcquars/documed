@extends('adminlte::page')

@section('title', env('APP_NAME'))

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible mt-3">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> ¡Error de Validación!</h5>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible mt-3">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Error</h5>
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success alert-dismissible mt-3">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Éxito</h5>
            {{ session('success') }}
        </div>
    @endif
    <div x-data="{ show: false, type: 'info', message: 'dsdsds' }"
         @show_alert.window="
         console.log('ddd', $event.detail.type);
        show = true;
        type = $event.detail.type;
        message = $event.detail.message;
        setTimeout(() => { show = false; }, 5000);
    "
         x-show="show"
         x-transition
         style="display: none;"
         class="mb-3"
    >
        <div :class="`alert alert-${type} alert-dismissible fade show`" role="alert">
            <span x-text="message"></span>
            <button type="button" class="btn-close" @click="show = false" aria-label="Close"></button>
        </div>
    </div>
    @yield('content-documed')
@stop

@section('css')

@stop

@section('js')

@stop
