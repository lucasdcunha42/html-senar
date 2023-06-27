<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use XML;

class CursosController extends Controller
{
    use XMLTrait;

    public function update()
    {
        // \DB::table('cursos')->truncate();
        // \DB::table('cursos_requisitos')->truncate();

        try {
            $pathCursos = $this->getXmlPathBySettings('xml.curso');
            $pathAgenda = $this->getXmlPathBySettings('xml.agenda');
        } catch (\Exception $e) {
            return redirect('/admin/cursos')->with('error', $e->getMessage());
        }

        try {
            $xmlCursos = XML::import($pathCursos)->get()->toArray();
        } catch (\Exception $e) {
             return redirect('/admin/cursos')->with('error', 'XML de CURSOS inválido, verifique e tente novamente.');
        }

        try {
            $xmlAgendas = XML::import($pathAgenda)->get()->toArray();            
        } catch (\Exception $e) {
             return redirect('/admin/cursos')->with('error', 'XML de Agendas inválido, verifique e tente novamente.');
        }


        if(isset($xmlCursos['Curso']) && isset($xmlAgendas['Evento'])) {
            $deParaAgenda = [];
            $deParaRequisitos = [];

            foreach($xmlAgendas['Evento'] as $_evento) {

                foreach($_evento->attributes() as $k => $v) {
                    $evento[$k] = (string)$v;
                }

                // if ($evento['DESC_FASE_EVENTO'] == 'Aprovado') {

                    foreach($xmlCursos['Curso'] as $_curso)
                    {
                        foreach($_curso->attributes() as $k => $v) {
                            $curso[$k] = (string)$v;
                        }

                        if($evento['COD_CURSO'] == $curso['Codigo'])
                        {
                            $xmlArray = [];


                            $xmlArray['cod_curso'] = $evento['COD_CURSO'];
                            $data = new \DateTime(str_replace('/', '-', $evento['DATA_INICIO']));
                            $dataFormatada = $data->format('Y-m-d');
                            $xmlArray['data_inicio'] = $dataFormatada;
                            $data = new \DateTime(str_replace('/', '-', $evento['DATA_FIM']));
                            $dataFormatada = $data->format('Y-m-d');
                            $xmlArray['data_fim'] = $dataFormatada;
                            $xmlArray['titulo'] = $evento['DESC_EVENTO'];
                            $xmlArray['desc_fase_evento'] = $evento['DESC_FASE_EVENTO'];
                            $xmlArray['regiaoevento'] = $evento['REGIAOEVENTO'];
                            $xmlArray['agenda_num_evento'] = intval($evento['NUM_EVENTO']);
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

                            // $xmlArray['outros_requisitos'] = [];

                            $xmlArray['cod_curso'] = intval($evento['COD_CURSO']);
                            array_push($deParaRequisitos, $xmlArray);
                            $deParaAgenda[] = $xmlArray;
                        }
                    }

                // }
            }

            foreach($deParaRequisitos as $key => &$item) {
                $array = [];
                foreach ($xmlCursos['Curso'] as $curso) {
                    if($item['cod_curso'] === intval($curso['Codigo'])) {
                        if(isset($curso->OutrosRequisitos->Requisito[0]) &&  $curso->OutrosRequisitos->Requisito[0]){
                            foreach($curso->OutrosRequisitos as $requisito) {
                                array_push($array, $requisito->Requisito['Descricao']);
                            }
                        }
                    }
                }
                $item['outros_requisitos'] = $array;
            }

            // dd($deParaRequisitos);
            DB::beginTransaction();
            try {
                foreach($deParaAgenda as $key => $item) {

                    $item['slug'] = \Str::slug($item['titulo'] . ' ' . $item['cod_curso'] . ' ' . $item['regiaoevento']);

                    if(DB::table('cursos')->where('slug', $item['slug'])->first()) {
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
            }
        }
        return redirect('/admin/cursos')->with('error', 'Falha ao atualizar cursos e requisitos');
    }
}
