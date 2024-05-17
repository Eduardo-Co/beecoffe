<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Atendimento;
use App\Medico;
use App\Paciente;

class AtendimentoController extends Controller
{
    public function edit($id)
    {
        $atendimento = Atendimento::findOrFail($id);
     
        return view('auth.edit.atendimento', compact('atendimento'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'medico_id' => 'required|exists:medicos,crm',
            'paciente_id' => 'required|exists:pacientes,cpf',
            'data_atendimento' => 'required|date',
        ]);
        $medico = Medico::where('crm', $request->medico_id)->firstOrFail();
        $paciente = Paciente::where('cpf', $request->paciente_id)->firstOrFail();

        $atendimento = new Atendimento([
            'medico_id' => $medico->id,
            'paciente_id' => $paciente->id,
            'data_atendimento' => $request->data_atendimento,
        ]);
        
        $atendimento->save();
        
        return redirect()->route('atendimentos.dashboard') 
        ->with('success', 'Atendimento criado com sucesso.');
    }
    public function create()
    {
        return view('auth.create.atendimento');
    }
    public function update(Request $request, Atendimento $atendimento)
    {
        $request->validate([
            'medico_id' => 'required|exists:medicos,crm',
            'paciente_id' => 'required|exists:pacientes,cpf',
            'data_atendimento' => 'required|date',
        ]);
        $medico = Medico::where('crm', $request->medico_id)->firstOrFail();
        $paciente = Paciente::where('cpf', $request->paciente_id)->firstOrFail();

        $atendimento->update([
            'medico_id' => $medico->id,
            'paciente_id' => $paciente->id,
            'data_atendimento' => $request->data_atendimento,
        ]);
        
        return redirect()->route('atendimentos.dashboard')->with('success', 'Atendimento atualizado com sucesso.');
    }
    
    public function destroy($id)
    {
        $atendimento = Atendimento::findOrFail($id);
        $atendimento->delete();
        
        return redirect()->route('atendimentos.dashboard')
        ->with('success', 'Atendimento excluído com sucesso.');
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $searchTerm = $query;
        $atendimentos = Atendimento::select('atendimentos.*')
                        ->join('medicos', 'medicos.id', '=', 'atendimentos.medico_id')
                        ->join('pacientes', 'pacientes.id', '=', 'atendimentos.paciente_id')
                        ->where(function($query) use ($searchTerm) {
                            $query->where('medicos.nome', 'LIKE', "%$searchTerm%")
                                ->orWhere('pacientes.nome', 'LIKE', "%$searchTerm%")
                                ->orWhere('data_atendimento', 'LIKE', "%$searchTerm%")
                                ->orWhere('atendimentos.id', 'LIKE', "%$searchTerm%");
                        })
                        ->get();
    
        return view('auth.dashboard.atendimentos_dashboard', compact('atendimentos'));
    }
}
