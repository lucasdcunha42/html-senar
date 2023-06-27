<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use XML;

class RegioesController extends Controller
{

    use XMLTrait;

    public function update()
    {
        try {
            $path = $this->getXmlPathBySettings('xml.regiao');
        } catch (\Exception $e) {
            return redirect('/admin/regioes')->with('error', $e->getMessage());
        }

        $xmlRegioes = XML::import($path)->get()->toArray();

        $deParaRegioes = [];

        if(isset($xmlRegioes['Regiao'])) {

            foreach($xmlRegioes['Regiao'] as $regiao){
                foreach ($regiao->Municipios as $municipios) {
                    foreach ($municipios as $municipio) {

                        $xmlArray['created_at'] = now()->format('Y-m-d');
                        $xmlArray['updated_at'] = now()->format('Y-m-d');
                        $xmlArray['regiao'] = (String)$regiao['Nome'];
                        $xmlArray['cidade'] = (String)$municipio['Nome'];
                        $xmlArray['supervisor_nome'] = (String)$regiao->Supervisor['Nome'];
                        $xmlArray['supervisor_email'] = "-";
                        if ($regiao->Supervisor['EMailDisponivelPublicamente'] == "Sim") {
                            $xmlArray['supervisor_email'] = (String)$regiao->Supervisor['EMail'];
                        }
                        $deParaRegioes[] = $xmlArray;
                    }

                }

            }


            DB::beginTransaction();
            try {
                foreach($deParaRegioes as $item) {
                    DB::table('regioes')->updateOrInsert(
                        ['cidade' => $item['cidade']],
                        $item,
                    );
                }
                DB::commit();
                return redirect('/admin/regioes')->with('success', 'Regiões Atualizadas!');
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
                return redirect('/admin/regioes')->with('error', 'Falha ao salvar registros no Banco de Dados.');
            }
        }
        return redirect('/admin/regioes')->with('error', 'Falha ao atualizar Regiões.');
    }
}
