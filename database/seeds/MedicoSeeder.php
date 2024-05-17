<?php

use Illuminate\Database\Seeder;
use App\Medico;
use Faker\Factory as Faker;

class MedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 5) as $index) {
            Medico::create([
                'nome' => $faker->name,
                'crm' => $faker->randomNumber(5) . '-' . $faker->stateAbbr,
                'especialidade' => $faker->jobTitle,
            ]);
        }
    }
}
