<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class RelatorioInscritosEventos extends AbstractAction
{
    public function getTitle()
    {
        return 'Exportar';
    }

    public function getIcon()
    {
        return 'glyphicon glyphicon-list-alt';
    }

    public function getPolicy()
    {
        return 'read';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-info pull-left',
            'style' => 'margin-left: 5px; background-color:green',
        ];
    }

    public function getDefaultRoute()
    {
        return route('eventos.inscritos.relatorio', ['evento' => $this->data->{$this->data->getKeyName()}]);
    }

    public function shouldActionDisplayOnDataType()
    {
        return $this->dataType->slug == 'eventos';
    }
}
