<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AgendaTest extends TestCase
{
    public function test_pagina_agenda_existe()
    {
        $response = $this->get('/agenda');

        $response->assertStatus(200);
    }

    public function test_pagina_agenda_contem_agenda()
    {
        $response = $this->get('/agenda');

        $response->assertStatus(200);
    }

    public function testPaginaAgendaContemTitulo()
    {
        $response = $this->get('/agenda');

        $response->assertStatus(200)
                 ->assertSee('Agenda'); // Substitua 'Título da Página' pelo texto esperado no h3 com a classe 'page-title'
    }

    public function testPaginaAgendaContemVerMais()
    {
        $response = $this->get('/agenda');

        $response->assertStatus(200)
                 ->assertSee('Ver mais'); // Substitua 'Ver mais' pelo texto esperado no link com a classe 'see-more'
    }

    public function testPaginaAgendaContemItem()
    {
        $response = $this->get('/agenda');

        $response->assertStatus(200)
                 ->assertSee('agendas-item');
    }

    public function testPaginaAgendaContemagendaContainer()
    {
        $response = $this->get('/agenda');

        $response->assertStatus(200)
                 ->assertSee('agendas-container');
    }
}
