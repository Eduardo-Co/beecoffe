<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtendimentoMedicoPacienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atendimento_medico_paciente', function (Blueprint $table) {
            $table->id();
            $table->string('medico_id');
            $table->string('paciente_id', 11);
            $table->dateTime('data_atendimento');
            $table->timestamps();

            // Chaves estrangeiras
            $table->foreign('medico_id')->references('crm')->on('medicos')->onDelete('cascade');
            $table->foreign('paciente_id')->references('cpf')->on('pacientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atendimento_medico_paciente');
    }
}
