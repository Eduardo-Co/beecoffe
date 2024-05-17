<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\AtendimentoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['auth'])->group(function () {
    //dashboard
    Route::get('/dashboard/medicos', [DashboardController::class, 'medicosDashboard'])->name('medicos.dashboard');
    Route::get('/dashboard/pacientes', [DashboardController::class, 'pacientesDashboard'])->name('pacientes.dashboard');
    Route::get('/dashboard/atendimentos', [DashboardController::class, 'atendimentosDashboard'])->name('atendimentos.dashboard');
    //pesquisa
    Route::get('/dashboard/medicos/search', [MedicoController::class, 'search'])->name('medico.search');
    Route::get('/dashboard/paciente/search', [PacienteController::class, 'search'])->name('paciente.search');
    Route::get('/dashboard/atendimento/search', [AtendimentoController::class, 'search'])->name('atendimento.search');

    //Adicionar
    Route::get('/dashboard/medicos/adicionar', [MedicoController::class, 'create'])->name('medicos.create');
    Route::post('/dashboard/medicos/adicionar', [MedicoController::class, 'store'])->name('medicos.store');
    Route::get('/dashboard/pacientes/adicionar', [PacienteController::class, 'create'])->name('pacientes.create');
    Route::post('/dashboard/pacientes/adicionar', [PacienteController::class, 'store'])->name('pacientes.store');
    Route::get('/dashboard/atendimentos/adicionar', [AtendimentoController::class, 'create'])->name('atendimentos.create');
    Route::post('/dashboard/atendimentos/adicionar', [AtendimentoController::class, 'store'])->name('atendimentos.store');
    
    //edição
    Route::get('/dashboard/atendimentos/{atendimento}/edit', [AtendimentoController::class, 'edit'])->name('atendimentos.edit');
    Route::put('/dashboard/atendimentos/{atendimento}', [AtendimentoController::class, 'update'])->name('atendimentos.update');
    Route::get('/dashboard/pacientes/{paciente}/edit', [PacienteController::class, 'edit'])->name('pacientes.edit');
    Route::put('/dashboard/pacientes/{paciente}', [PacienteController::class, 'update'])->name('pacientes.update');
    Route::get('/dashboard/medicos/{medico}/edit', [MedicoController::class, 'edit'])->name('medicos.edit');
    Route::put('/dashboard/medicos/{medico}', [MedicoController::class, 'update'])->name('medicos.update');

    // Exclusão
    Route::delete('/dashboard/atendimentos/{atendimento}', [AtendimentoController::class, 'destroy'])->name('atendimentos.destroy');
    Route::delete('/dashboard/pacientes/{atendimento}', [PacienteController::class, 'destroy'])->name('pacientes.destroy');
    Route::delete('/dashboard/medicos/{atendimento}', [MedicoController::class, 'destroy'])->name('medicos.destroy');
    
});
