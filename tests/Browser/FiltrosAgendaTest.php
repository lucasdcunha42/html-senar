<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class FiltrosAgenda extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_filtro_de_cidade_update()
    {
        $this->browse(function (Browser $browser) {

            // Habilite o modo de depuração
            $browser->driver->manage()->window()->maximize();
            // Acesse a página inicial
            $browser->visit('/')

            // Clique no link para a página de Agendas
            ->clickLink('Agenda')

            // Verifique se a página de Agendas foi carregada
            ->assertPathIs('/agenda');
            //$browser->pause(3000);

            // Selecione uma cidade no dropdown
            $browser->select('cidade', 'ALEGRETE');
           // $browser->pause(3000);

            // Clique no botão de aplicar filtro
            $browser->press('Pesquisar');
           // $browser->pause(3000);

            // Verifique se a página foi atualizada e se a cidade selecionada está presente
            $browser->assertSee('ALEGRETE');
            $browser->pause(3000);

        });
    }
}
