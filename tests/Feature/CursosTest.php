<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CursosTest extends TestCase
{
    public function test_pagina_cursos_existe()
    {
        $response = $this->get('/cursos');

        $response->assertStatus(200);
    }

    public function test_pagina_cursos_contem_curso()
    {
        $response = $this->get('/cursos');

        $response->assertStatus(200);
    }

    public function testPaginaCursosContemTitulo()
    {
        $response = $this->get('/cursos');

        $response->assertStatus(200)
                 ->assertSee('Cursos'); // Substitua 'Título da Página' pelo texto esperado no h3 com a classe 'page-title'
    }

    public function testPaginaCursosContemVerMais()
    {
        $response = $this->get('/cursos');

        $response->assertStatus(200)
                 ->assertSee('Ver mais'); // Substitua 'Ver mais' pelo texto esperado no link com a classe 'see-more'
    }

    public function testPaginaCursosContemItem()
    {
        $response = $this->get('/cursos');

        $response->assertStatus(200)
                 ->assertSee('curso-item');
    }

    public function testPaginaCursosContemCursosContainer()
    {
        $response = $this->get('/cursos');

        $response->assertStatus(200)
                 ->assertSee('cursos-container');
    }
}
