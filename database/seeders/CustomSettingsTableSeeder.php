<?php

namespace Database\Seeders;

use TCG\Voyager\Models\Setting;
use Illuminate\Database\Seeder;

class CustomSettingsTableSeeder extends Seeder
{


    private function toAdd()
    {
        return [
            [
                'key' => 'admin.processos-licitarios-em-andamento',
                'value' => 'Processos Licitários em Andamento',
                'display_name' => 'Título de sessão da página de processos licitários',
                'type' => 'text',
                'group' => 'Admin',
                'order' => 10,
            ],
            [
                'key' => 'admin.processos-licitarios-em-concluidos',
                'value' => 'Processos Licitários em concluidos',
                'display_name' => 'Título da sessão da página de processos licitários Concluidos',
                'type' => 'text',
                'group' => 'Admin',
                'order' => 12,
            ],
            [
                'key' => 'admin.link-externo-processos-licitarios-em-andamento',
                'value' => 'http://app3.cna.org.br/transparencia/?gestaoLicitacaoAndamento-RS',
                'display_name' => 'Link Externo Processos Licitários em Andamento',
                'type' => 'text',
                'group' => 'Admin',
                'order' => 14,
            ],
        ];
    }

    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $newSettings = $this->toAdd();

        foreach ($newSettings as $setting) {
            $toSave = $this->findSetting($setting['key']);
            if (!$toSave->exists) {
                $toSave->fill($setting)->save();
            }
        }
    }

    protected function findSetting($key)
    {
        return Setting::firstOrNew(['key' => $key]);
    }
}
