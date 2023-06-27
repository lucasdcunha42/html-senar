<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use XML;

class SindicatosController extends Controller
{
    use XMLTrait;

    public function update()
    {

        set_time_limit(5 * 60);

        try {
            $path = $this->getXmlPathBySettings('xml.sindicato');
        } catch (\Exception $e) {
            return redirect('/admin/sindicatos')->with('error', $e->getMessage());
        }

        $xmlSindicatos = XML::import($path)->get()->toArray();

        if(isset($xmlSindicatos['Sindicato'])) {

            foreach($xmlSindicatos['Sindicato'] as $sindicato){

                $xmlArraySindicato['nome'] = (String)$sindicato['Nome'];
                $xmlArraySindicato['sistema'] = 'farsul';

                if((string)$sindicato['Tipo'] == 'T') {
                    $xmlArraySindicato['sistema'] = 'fetag';
                }

                $xmlArraySindicato['telefones'] = " - ";
                foreach ($sindicato->Telefones as $telefone){
                    $telefone = $telefone->Telefone;

                    if ($telefone['DisponivelPublicamente'] == "Sim") {
                        if ($xmlArraySindicato['telefones'] == " - ") {
                            $xmlArraySindicato['telefones'] = "(".$telefone['DDD'].") ".trim($telefone['Numero']);
                        }else{
                            $xmlArraySindicato['telefones'] = $xmlArraySindicato['telefones']. " | (".$telefone['DDD'].") ".$telefone['Numero'];
                        }
                    }
                }


                $xmlArraySindicato['email'] = ' - ';
                if($sindicato['EMailDisponivelPublicamente'] == "Sim"){
                    $xmlArraySindicato['email'] = (String) $sindicato['EMail'];
                }

                // $xmlArraySindicato['sistema'] = ' - ';
                $xmlArraySindicato['created_at'] =  now()->format('Y-m-d');
                $xmlArraySindicato['updated_at'] =  now()->format('Y-m-d');
                $xmlArraySindicato['codigo'] = (String) $sindicato['Codigo'];

                try
                {
                    DB::beginTransaction();
                    $sindicatoCriado = DB::table('sindicatos')->updateOrInsert(
                                            ['codigo' => $xmlArraySindicato['codigo']],
                                            $xmlArraySindicato,
                                        );
                    DB::commit();

                    if ($sindicatoCriado) {
                        $sindicatoCriado =  DB::table('sindicatos')->where(['codigo' => $xmlArraySindicato['codigo']])->first();


                        foreach($sindicato->Abrangencia as $cidades){
                            foreach ($cidades as $cidade) {

                                $xmlArraySindicatoCidade['sindicato_id'] = $sindicatoCriado->id;
                                $xmlArraySindicatoCidade['municipio'] = $cidade['Nome'];
                                $xmlArraySindicatoCidade['created_at'] =  now()->format('Y-m-d');
                                $xmlArraySindicatoCidade['updated_at'] =  now()->format('Y-m-d');
                                $xmlArraySindicatoCidade['index_sindicato_cidade_importacao'] = Str::slug(((String)$sindicato['Codigo']).'-'.$cidade['Nome'], '-');

                                DB::beginTransaction();
                                DB::table('sindicatos_municipios')->updateOrInsert(
                                    ['index_sindicato_cidade_importacao' => $xmlArraySindicatoCidade['index_sindicato_cidade_importacao']],
                                    $xmlArraySindicatoCidade,
                                );
                                DB::commit();
                            }
                        }
                    }

                } catch (\Exception $e) {

                    DB::rollBack();
                    throw $e;
                    return redirect('/admin/sindicatos')->with('error', 'Falha ao salvar registros no Banco de Dados.');

                }

            }
            // die();
            return redirect('/admin/sindicatos')->with('success', 'Regiões Atualizadas!');


        }

        return redirect('/admin/sindicatos')->with('error', 'Falha ao atualizar Regiões.');
    }
}
