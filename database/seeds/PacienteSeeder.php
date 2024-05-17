<?php

use Illuminate\Database\Seeder;
use App\Paciente;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Crie exemplos de pacientes
        foreach (range(1, 10) as $index) {
            Paciente::create([
                'nome' => $faker->name,
                'cpf' => $faker->numerify('###########'),
                'data_nascimento' => $faker->date,
                'email' => $faker->email,
            ]);
        }
    }
}
