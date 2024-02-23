<?php

namespace App\Console\Commands;

use App\Evento;
use Illuminate\Console\Command;
use App\Inscrito;
use Faker\Factory as Faker;

class CriarInscritos extends Command
{
    protected $signature = 'inscritos:criar {quantidade}';
    protected $description = 'Cria o número especificado de inscritos';

    public function handle()
    {
        $quantidade = $this->argument('quantidade');
        $faker = Faker::create('pt_BR');
        $eventos = Evento::pluck('id')->toArray();
        $cidades = Evento::cidades();


        for ($i = 0; $i < $quantidade; $i++) {
            $inscrito = Inscrito::create([
                'nome' => $faker->name,
                'cpf' => $faker->cpf(false),
                'email' => $faker->email,
                'cidade' => $faker->randomElement($cidades),
                'atividade' => $faker->optional()->sentence,
                'telefone' => $faker->cellphone
            ]);

            $eventoId = $faker->randomElement($eventos);
            $evento = Evento::find($eventoId);

            // Adicionar entrada na tabela pivot "eventos_Inscritos"
            $evento->inscritos()->attach($inscrito, ['presenca' => $faker->randomElement([0, 1])]);

            $this->info("Inscritos criado com sucesso.");
        }

        $this->info("Processo de criação de inscritos concluído.");
    }
}
