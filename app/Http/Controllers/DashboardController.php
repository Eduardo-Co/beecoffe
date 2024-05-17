<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Atendimento;
use App\Medico;
use App\Paciente;

class DashboardController extends Controller
{
    public function medicosDashboard()
    {
        $medicos = Medico::all();
        return view("auth.dashboard.medicos_dashboard", ['medicos' => $medicos]);
    }

    public function pacientesDashboard()
    {
        $pacientes = Paciente::all();
        return view("auth.dashboard.pacientes_dashboard", ['pacientes' => $pacientes]);
    }

    public function atendimentosDashboard()
    {
        $atendimentos = Atendimento::all();
        return view("auth.dashboard.atendimentos_dashboard", ['atendimentos' => $atendimentos]);
    }
}
