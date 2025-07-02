@extends('adminlte::page')

{{-- Título de la página (aparece en la pestaña del navegador) --}}
@section('title', 'Dashboard de Administración')

{{-- Encabezado de contenido (aparece dentro del panel de AdminLTE, debajo de la navbar) --}}
@section('content_header')
    <h1 class="m-0 text-dark">Principal</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {{ __('You are logged in!') }}
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card-footer-->
    </div>

@stop

{{-- Create a common footer --}}


{{-- Add common Javascript/Jquery code --}}

@push('js')
    <script>
        document.addEventListener('livewire:initialized', () => {
            // alert("wwe eee" + $.fn.jquery);
        });

    </script>
@endpush

{{-- Add common CSS customizations --}}

@push('css')
    <style type="text/css">

        {{-- You can add AdminLTE customizations here --}}
/*
    .card-header {
        border-bottom: none;
    }
    .card-title {
        font-weight: 600;
    }
    */

    </style>
@endpush
