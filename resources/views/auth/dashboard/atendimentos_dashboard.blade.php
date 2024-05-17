@extends('auth.layout.dashboard_layout')

@section('title', 'Dashboard de Atendimentos')

@section('content')
<div class="container">
    <h1>Dashboard de Atendimentos</h1>

    <form action={{route("atendimento.search")}} class="d-flex justify-space-between my-2" style="align-itens:center; justify-content: space-between; width: 100%;" method="GET">
        @method("GET")
        @csrf
        <div>
            <input  type="text" name="query"  placeholder="Pesquisar médicos">
            <button type="submit">Pesquisar</button>
        </div>
            <a href="{{ route('atendimentos.dashboard') }}" class="btn btn-secondary ml-2">Limpar Pesquisa</a>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Data do Atendimento</th>
                <th>Médico</th>
                <th>CRM</th>
                <th>Paciente</th>
                <th>CPF</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($atendimentos as $atendimento)
            <tr>
                <td>{{ $atendimento->id }}</td>
                <td>{{ $atendimento->data_atendimento }}</td>
                <td>{{ $atendimento->medico->nome }}</td>
                <td>{{ $atendimento->medico->crm }}</td>
                <td>{{ $atendimento->paciente->nome }}</td>
                <td>{{ $atendimento->paciente->cpf }}</td>
                <td>
                    <a href="{{ route('atendimentos.edit', $atendimento) }}"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('atendimentos.destroy', $atendimento) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este atendimento?')">
                            <i class="fas fa-trash-alt"></i>
                        </button>
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
        margin-top: 5% !important;
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
