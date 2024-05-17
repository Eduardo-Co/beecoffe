@extends('auth.layout.dashboard_layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Adicionar Novo Atendimento</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('atendimentos.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="medico_id">Médico:</label>
                            <input type="text" class="form-control @error('medico_id') is-invalid @enderror" id="medico_id" name="medico_id" value="{{ old('medico_id') }}" required>
                            @error('medico_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="paciente_id">CPF do Paciente:</label>
                            <input type="text" class="form-control @error('paciente_id') is-invalid @enderror" id="paciente_id" name="paciente_id" value="{{ old('paciente_id') }}" required>
                            @error('paciente_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="data_atendimento">Data do Atendimento:</label>
                            <input type="date" class="form-control @error('data_atendimento') is-invalid @enderror" id="data_atendimento" name="data_atendimento" value="{{ old('data_atendimento') }}" required>
                            @error('data_atendimento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Adicionar Atendimento</button>
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

