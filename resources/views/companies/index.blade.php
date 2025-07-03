{{-- resources/views/companies/index.blade.php --}}
@extends('adminlte::page')

@section('title', 'Listado de Compañías')

@section('content')
    <h1>Empresas</h1>
    <a href="{{ route('companies.create') }}" class="btn btn-primary btn-sm mb-3">Crear Nueva empresas</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Representante legal</th>
            <th>Titular</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($companies as $company)
            <tr>
                <td>{{ $company->id }}</td>
                <td>{{ $company->legal_representative_dni }}</td>
                <td>{{ $company->rn_owner }}</td>
                <td>{{ $company->status }}</td>
                <td class="text-right">
                    <a href="{{ route('companies.show', $company) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('companies.edit', $company) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('companies.destroy', $company) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta compañía?');">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No hay compañías registradas.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
