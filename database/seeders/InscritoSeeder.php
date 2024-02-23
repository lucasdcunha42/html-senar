<?php

namespace Database\Seeders;

use App\Evento;
use App\Inscrito;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class InscritoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('pt_BR');
        $eventos = Evento::pluck('id')->toArray();

    for ($i = 0; $i < 100; $i++) {
        $inscrito = Inscrito::create([
            'nome' => $faker->name,
            'cpf' => $faker->cpf(false),
            'email' => $faker->email,
            'cidade' => $faker->city,
            'atividade' => $faker->optional()->sentence,
            'telefone' => $faker->cellphone
        ]);

        // Selecionar aleatoriamente um evento existente
        $eventoId = $faker->randomElement($eventos);
        $evento = Evento::find($eventoId);

        // Adicionar entrada na tabela pivot "eventos_Inscritos"
        $evento->inscritos()->attach($inscrito, ['presenca' => $faker->randomElement([0, 1])]);
        }
    }
}
