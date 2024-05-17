<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Medico;

class MedicoController extends Controller
{
    
    
    public function search(Request $request)
    {
        $query = $request->input('query');
        $medicos = Medico::where('nome', 'LIKE', "%".$query."%")
        ->orWhere('crm', 'LIKE', "%".$query."%")
        ->orWhere('especialidade', 'LIKE', "%".$query."%")
        ->get();
        
        return view('auth.dashboard.medicos_dashboard', compact('medicos'));
    }
    public function create()
    {
        return view('auth.create.medico');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:225',
            'crm' => 'required|unique:medicos,crm',
            'especialidade' => 'required|string|max:225',
        ]);

        Medico::create($request->all());
        
        return redirect()->route('medicos.dashboard')
        ->with('success', 'Médico criado com sucesso.');
    }
    public function update(Request $request, $id)
    {
        $medico = Medico::findOrFail($id);
        
        $request->validate([
            'nome' => 'required|string|max:225',
            'crm' => 'required|unique:medicos,crm,'.$medico->id,
            'especialidade' => 'required|string|max:225',
        ]);
        
        $medico->update($request->all());
        
        return redirect()->route('medicos.dashboard')
        ->with('success', 'Médico atualizado com sucesso.');
    }
    public function destroy($id)
    {
        $medico = Medico::findOrFail($id);
        $medico->delete();

        return redirect()->route('medicos.dashboard')
        ->with('success', 'Médico excluído com sucesso.');
    }
    public function edit($id)
    {
        $medico = Medico::findOrFail($id);
        return view('auth.edit.medico', compact('medico'));
    }
}


