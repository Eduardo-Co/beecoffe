

@extends('auth.layout.dashboard_layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Atendimento</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('atendimentos.update', $atendimento) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="medico_id">ID do Médico:</label>
                            <input type="text" class="form-control" id="medico_id" name="medico_id" value="{{ $atendimento->medico->crm }}" >
                        </div>

                        <div class="form-group">
                            <label for="paciente_id">CPF do Paciente:</label>
                            <input type="text" class="form-control" id="paciente_id" name="paciente_id" value="{{ $atendimento->paciente->cpf }}" >
                        </div>

                        <div class="form-group">
                            <label for="data_atendimento">Data do Atendimento:</label>
                            <input type="date" class="form-control @error('data_atendimento') is-invalid @enderror" id="data_atendimento" name="data_atendimento" value="{{ $atendimento->data_atendimento }}" required>
                            @error('data_atendimento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    button{
        margin-top: 10px;
    }
</style>
@endsection
