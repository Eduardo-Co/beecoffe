@extends('auth.layout.dashboard_layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Adicionar Novo Médico</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('medicos.store') }}" onsubmit="return validarCRM()">
                        @csrf

                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control" id="nome" name="nome" required>
                        </div>

                        <div class="form-group">
                            <label for="crm">CRM:</label>
                            <input type="text" class="form-control" id="crm" name="crm" required>
                            <small class="text-muted">Formato esperado: CRM/SP 123456</small>
                        </div>

                        <div class="form-group">
                            <label for="especialidade">Especialidade:</label>
                            <input type="text" class="form-control" id="especialidade" name="especialidade" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Adicionar Médico</button>
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

<script>
    function validarCRM() {
        var crmInput = document.getElementById('crm').value;
        var regex = /^CRM\/[A-Za-z]{2} \d{6}$/;

        if (!regex.test(crmInput)) {
            alert('O CRM deve seguir o formato "CRM/SP 123456".');
            return false;
        }
        return true;
    }
</script>
@endsection
