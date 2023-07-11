<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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
            $xmlCursos = XML::import($pathCursos)->get()->toArray();
        } catch (\Exception $e) {
             return redirect('/admin/cursos')->with('error', 'XML de CURSOS inválido, verifique e tente novamente.');
        }

        ddd($xmlCursos);

        if(isset($xmlCursos['Curso'])) {
            $ListaCursos = [];

            foreach($xmlCursos['Curso'] as $_curso)
            {
                foreach($_curso->attributes() as $k => $v) {
                    $curso[$k] = (string)$v;
                }

                $xmlArray = [];

                $xmlArray['codigo'] = intval($curso['Codigo']);
                $xmlArray['nome'] = $curso['Nome'];
                $xmlArray['modalidade'] = $curso['Modalidade'] ?? null;
                $xmlArray['descricao'] = $curso['Nota'];
                $xmlArray['areadeinteresse'] = $curso['AreaDeInteresse'];
                $xmlArray['situacao'] = $curso['Situacao'];
                $xmlArray['cargahorariatotal'] = $curso['CargaHorariaTotal'];
                $xmlArray['escolaridade'] = $curso['Escolaridade'];
                $xmlArray['minimodeparticipantes'] = $curso['MinimoDeParticipantes'];
                $xmlArray['maximodeparticipantes'] = $curso['MaximoDeParticipantes'];
                $xmlArray['conteudoprogramatico'] = $curso['ConteudoProgramatico'];
                $xmlArray['idade'] = $curso['Idade'] ?? null;

                $xmlArray['created_at'] = now();
                $xmlArray['updated_at'] = now();

                array_push($ListaCursos, $xmlArray);
            }


            DB::beginTransaction();
            try {
                foreach($ListaCursos as $key => $item) {
                    $item['slug'] = \Str::slug($item['nome'] . ' ' . $item['modalidade'] . ' ' . $item['cargahorariatotal']);

                    DB::table('cursos')->updateOrInsert(['codigo' => $item['codigo']], $item);
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
