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
    public function testFiltrosAgenda()
    {
        $this->browse(function (Browser $browser) {

            $browser->visit('/agenda')
                    ->assertVisible('#agendas-cidade-select')
                    ->select('cidade')
                    ->typeSlowly('titulo_agenda', 'ARTESANATO')
                    ->press('Pesquisar')
                    ->pause(6000)
                    ->assertSee('AGENDA');
        });
    }

    public function testLimparFiltros()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/agenda')
                    ->select('cidade')
                    ->typeSlowly('titulo_agenda', 'ARTESANATO')
                    ->press('Pesquisar')
                    ->pause(6000)
                    ->press('Limpar');
        });
    }


}
