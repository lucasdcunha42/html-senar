<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use XML;
set_time_limit(300);
class CursosController extends Controller
{
    use XMLTrait;

    public function update()
    {
        // \DB::table('cursos')->truncate();
        // \DB::table('cursos_requisitos')->truncate();

        try {
            $pathCursos = $this->getXmlPathBySettings('xml.curso');
        } catch (\Exception $e) {
            return redirect('/admin/cursos')->with('error', $e->getMessage());
        }

        try {
            $xmlCursos =  XML::import($pathCursos)->get()->toArray();
        } catch (\Exception $e) {
             return redirect('/admin/cursos')->with('error', 'XML de CURSOS inválido, verifique e tente novamente.');
        }

        if(isset($xmlCursos['Curso'])) {
            $deParaRequisitos = [];

            foreach($xmlCursos['Curso'] as $_curso)
            {
                foreach($_curso->attributes() as $k => $v) {
                    $curso[$k] = (string)$v;
                }

                    $xmlArray = [];

                    $xmlArray['codigo'] = intval($curso['Codigo']);
                    $xmlArray['nome'] = $curso['Nome'];
                    $xmlArray['modalidade'] = $curso['Modalidade'];
                    $xmlArray['descricao'] = $curso['Nota'];
                    $xmlArray['areadeinteresse'] = $curso['AreaDeInteresse'];
                    $xmlArray['situacao'] = $curso['Situacao'];
                    $xmlArray['cargahorariatotal'] = $curso['CargaHorariaTotal'];
                    $xmlArray['escolaridade'] = $curso['Escolaridade'];
                    $xmlArray['minimodeparticipantes'] = $curso['MinimoDeParticipantes'];
                    $xmlArray['maximodeparticipantes'] = $curso['MaximoDeParticipantes'];
                    $xmlArray['conteudoprogramatico'] = $curso['ConteudoProgramatico'];
                    $xmlArray['idade'] = $curso['Idade'];
                    $xmlArray['created_at'] = now();
                    $xmlArray['updated_at'] = now();

                    array_push($deParaRequisitos, $xmlArray);
            }


            $xmlArray = C

            /*
            DB::beginTransaction();
            try {
                foreach($xmlArray as $key => $item) {
                    $item['slug'] = \Str::slug($item['nome'] . ' ' . $item['codigo']);

                    /* Verificação de Update
                    if (DB::table('cursos')
                    ->where('slug', $item['slug'])
                    ->where('cidade', $item['cidade'])
                    ->first()) {
                        continue;
                    }

                    DB::table('cursos')->updateOrInsert(
                        ['agenda_num_evento' => $item['agenda_num_evento']],
                        $item
                    );
                    if(
                        array_key_exists('outros_requisitos', $deParaRequisitos[$key]) &&
                        $deParaRequisitos[$key]['outros_requisitos'] !== []) {
                            $curso = DB::table('cursos')->where('agenda_num_evento', $item['agenda_num_evento'])->first();
                            $insertRequisito = [];
                            $insertRequisito['curso_id'] = $curso->id;
                            foreach($deParaRequisitos[$key]['outros_requisitos'] as $value => $requisito) {
                                $insertRequisito['texto'] = $requisito;
                                $insertRequisito['requisito_numero'] = $value;
                                DB::table('cursos_requisitos')->updateOrInsert(
                                    ['curso_id' => $curso->id, 'requisito_numero' => $value],
                                    $insertRequisito
                                );
                            }
                    }
                }
                DB::commit();

                return redirect('/admin/cursos')->with('success', 'Cursos e Requisitos Atualizados!');
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
                return redirect('/admin/cursos')->with('error', 'Falha ao salvar registros no Banco de Dados.');
            }*/
        }
        return redirect('/admin/cursos')->with('error', 'Falha ao atualizar cursos e requisitos');
    }
}
