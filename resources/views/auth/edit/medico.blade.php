@extends('auth.layout.dashboard_layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Médico</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('medicos.update', $medico->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="{{ $medico->nome }}" required>
                        </div>

                        <div class="form-group">
                            <label for="crm">CRM:</label>
                            <input type="text" class="form-control" id="crm" name="crm" value="{{ $medico->crm }}" required>
                        </div>

                        <div class="form-group">
                            <label for="especialidade">Especialidade:</label>
                            <input type="text" class="form-control" id="especialidade" name="especialidade" value="{{ $medico->especialidade }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Atualizar Médico</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
