@extends('auth.layout.dashboard_layout')

@section('title', 'Dashboard de Pacientes')

@section('content')
<div class="container">
    <h1>Dashboard de Pacientes</h1>

    <form action={{route("paciente.search")}} class="d-flex justify-space-between my-2" style="align-items:center; justify-content: space-between; width: 100%;" method="GET">
        @method("GET")
        @csrf
        <div>
            <input  type="text" name="query"  placeholder="Pesquisar médicos">
            <button type="submit">Pesquisar</button>
        </div>
            <a href="{{ route('pacientes.dashboard') }}" class="btn btn-secondary ml-2">Limpar Pesquisa</a>
    </form>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Data de Nascimento</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pacientes as $paciente)
            <tr>
                <td>{{ $paciente->nome }}</td>
                <td>{{ $paciente->cpf }}</td>
                <td>{{ $paciente->data_nascimento }}</td>
                <td>{{ $paciente->email }}</td>
                <td>
                    <a href="{{ route('pacientes.edit', $paciente->id) }}"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este paciente?')"><i class="fas fa-trash-alt"></i></button>
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
