<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Paciente;
use Illuminate\Database\QueryException;

class PacienteController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $pacientes = Paciente::where('nome', 'LIKE', "%".$query."%")
                        ->orWhere('cpf', 'LIKE', "%".$query."%")
                        ->orWhere('data_nascimento', 'LIKE', "%".$query."%")
                        ->orWhere('email', 'LIKE', "%".$query."%")
                        ->get();

        return view('auth.dashboard.pacientes_dashboard', compact('pacientes'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|size:11|unique:pacientes,cpf',
            'data_nascimento' => 'required|date',
            'email' => 'required|email|unique:pacientes,email',
        ]);

        Paciente::create($request->all());

        return redirect()->route('pacientes.dashboard')
                        ->with('success', 'Paciente criado com sucesso.');
    }
    public function create()
    {
        return view('auth.create.paciente');
    }
    public function update(Request $request, $id)
    {
        $paciente = Paciente::findOrFail($id);
        
        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|unique:pacientes,cpf,'.$paciente->id,
            'data_nascimento' => 'required|date',
            'email' => 'required|email',
        ]);
        
        $paciente->update($request->all());
        
        return redirect()->route('pacientes.dashboard')
        ->with('success', 'Paciente atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->delete();

        return redirect()->route('pacientes.dashboard')
        ->with('success', 'Paciente excluído com sucesso.');
    }
    public function edit($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('auth.edit.paciente', compact('paciente'));
    }
}
