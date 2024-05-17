@extends('auth.layout.dashboard_layout')

@section('title', 'Dashboard de Médicos')

@section('content')
<div class="container">
    <h1>Dashboard de Médicos</h1>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action={{route("medico.search")}} class="d-flex justify-space-between my-2" style="align-items:center; justify-content: space-between; width: 100%;" method="GET">
        @method("GET")
        @csrf
        <div>
            <input  type="text" name="query"  placeholder="Pesquisar médicos">
            <button type="submit">Pesquisar</button>
        </div>
            <a href="{{ route('medicos.dashboard') }}" class="btn btn-secondary ml-2">Limpar Pesquisa</a>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>CRM</th>
                <th>Especialidade</th>
            </tr>
        </thead>
        <tbody>
            @foreach($medicos as $medico)          
            <tr>
                <td>{{ $medico->nome }}</td>
                <td>{{ $medico->crm}}</td>
                <td>{{ $medico->especialidade }}</td>
                <td>
                    <a href="{{ route('medicos.edit', $medico->id) }}"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('medicos.destroy', $medico->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este médico?')"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
    }

    .container {
        max-width: 960px;
        margin: 0 auto;
        padding: 20px;
        background: #f8f9fa;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    h1, h2 {
        color: #333;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        background-color: #fff;
        border-collapse: collapse;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
    }

    th, td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f8f9fa;
        color: #333;
        font-weight: 600;
        text-transform: uppercase;
    }

    tbody tr:hover {
        background-color: #f2f2f2;
    }

    .table-responsive {
        overflow-x: auto;
    }
</style>
@endsection
    