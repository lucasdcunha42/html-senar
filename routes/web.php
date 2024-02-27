<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\Frontend\CoursesController;
use App\Http\Controllers\Frontend\ProgramasController;
use App\Http\Controllers\Frontend\InstitucionalController;
use App\Http\Controllers\Frontend\NewsController;
use App\Http\Controllers\Frontend\FormController;
use App\Http\Controllers\Admin\CursosController;
use App\Http\Controllers\Admin\RegioesController;
use App\Http\Controllers\Admin\SindicatosController;
use App\Http\Controllers\Frontend\AgendasController;
use App\Http\Controllers\Admin\ListaInscritosController;
use App\Http\Controllers\Admin\InscritosEventosController;
use App\Http\Controllers\Admin\AtendenteController;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Http\Controllers\VoyagerBreadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('page.home');

Route::get('/cursos', [CoursesController::class, 'index'])->name('page.cursos');
//Route::post('/cursos-load-more', [CoursesController::class, 'loadMore'])->name('page.cursos.load.more');
Route::get('/cursos/{slug}', [CoursesController::class, 'single'])->name('page.cursos.single');

Route::get('/agenda', [AgendasController::class, 'agenda'])->name('page.agenda');
Route::post('/agenda-load-more', [AgendasController::class, 'loadMore'])->name('page.agenda.loadMore');
Route::get('/agendas/{slug}', [AgendasController::class, 'single'])->name('page.agendas.single');

Route::get('/contato', [PagesController::class, 'contato'])->name('page.contato');
Route::get('/fale-conosco', [PagesController::class, 'faleConosco'])->name('page.fale-conosco');
Route::get('/trabalhe-conosco', [PagesController::class, 'trabalheConosco'])->name('page.trabalhe.conosco');
Route::get('/quero-ser-fornecedor', [PagesController::class, 'queroSerFornecedor'])->name('page.quero.ser.fornecedor');

Route::get('/onde-estamos', [PagesController::class, 'ondeEstamos'])->name('page.onde-estamos');

Route::get('/supervisao', [PagesController::class, 'supervisao'])->name('page.cursos.supervisao');
Route::get('/apoiadores', [PagesController::class, 'apoiadores'])->name('page.apoiadores');
Route::get('/arrecadacao', [PagesController::class, 'arrecadacao'])->name('page.cursos.arrecadacao');

Route::get('/eventos', [PagesController::class, 'eventos'])->name('page.eventos');
Route::get('/eventos/{slug}', [PagesController::class, 'single'])->name('page.eventos.single');
Route::get('/eventos/{slug}/inscricao', [PagesController::class, 'showInscricao'])->name('page.eventos.inscricao');
Route::post('/eventos/{slug}/inscricao', [PagesController::class, 'storeInscricao'])->name('page.eventos.inscricao.store');

Route::get('/sindicatos', [PagesController::class, 'sindicatos'])->name('page.sindicatos');

Route::get('/transparencia', [PagesController::class, 'transparencia'])->name('page.transparencia');
Route::get('/transparencia/download/{id}', [PagesController::class, 'transparenciaDownload'])->name('transparencia.download');

Route::get('/o-senar', [InstitucionalController::class, 'oSenar'])->name('page.o-senar');
Route::get('/legislacao', [InstitucionalController::class, 'legislacao'])->name('page.legislacao');
Route::get('/atividades', [InstitucionalController::class, 'atividades'])->name('page.atividades');
Route::get('/contribuicao-previdencia-rural', [InstitucionalController::class, 'contribuicaoPrevidenciaRural'])->name('page.contribuicao.previdencia.rural');

Route::get('/noticias', [NewsController::class, 'index'])->name('page.news.index');

// noticia ou categoria
Route::get('/noticias/{slug}', [NewsController::class, 'single'])->name('page.news.single');
Route::post('/noticias/load/more', [NewsController::class, 'loadMore'])->name('page.news.loadMore');

Route::get('/licitacoes', [InstitucionalController::class, 'licitacoesEContrato'])->name('page.licitacoes.contrato');

Route::get('/programas-capacitacao', [ProgramasController::class, 'index'])->name('page.programas');
Route::get('/programas-capacitacao/{slug}', [ProgramasController::class, 'single'])->name('page.programas.single');

// forms
Route::post('fale-conosco-send', [FormController::class, 'faleConosco'])->name('form.fale.conosco');
Route::post('contato-send', [FormController::class, 'contato'])->name('form.contato');
Route::post('licitacao-empresa-send', [FormController::class, 'licitacaoEmpresa'])->name('form.licitacao.empresa');
Route::post('licitacao-cliente-send', [FormController::class, 'licitacaoCliente'])->name('form.licitacao.cliente');

Route::group(['prefix' => 'admin'], function () {

    Voyager::routes();

    Route::get('/update-xml-cursos', [CursosController::class, 'update'])->name('xml.cursos.update');
    Route::get('/update-xml-regioes', [RegioesController::class, 'update'])->name('xml.regioes.update');
    Route::get('/update-xml-sindicatos', [SindicatosController::class, 'update'])->name('xml.sindicatos.update');

    Route::get('/eventos-inscritos/{event}/inscritos', [ListaInscritosController::class, 'index'])->name('lista.inscritos.index');

    Route::get('/eventos-inscritos/{evento}/inscricao', [InscritosEventosController::class, 'formulario'])->name('lista.inscritos.formulario');
    Route::post('/eventos-inscritos/{evento}/adicionar', [InscritosEventosController::class, 'adicionaInscrito'])->name('lista.inscritos.adicionar');

    Route::get('/eventos-inscritos/{evento}/remover-inscrito/{inscrito}', [InscritosEventosController::class, 'removeInscritoEvento'])->name('lista.inscritos.remover');
    Route::post('/eventos-inscritos/{evento}/bulk-detach-inscritos', [InscritosEventosController::class, 'bulkDetachInscritos'])->name('lista.inscritos.bulkDetach');

    Route::get('/eventos-inscritos/{evento}/inscrito/{inscrito}/cracha', [InscritosEventosController::class, 'imprimeCracha'])->name('lista.inscritos.imprimeCracha');
    Route::get('/eventos-inscritos/{evento}/inscrito/{inscrito}/certificado', [InscritosEventosController::class, 'imprimeCertificado'])->name('lista.inscritos.imprimeCertificado');

    //Atendente
    Route::get('/atendente', [AtendenteController::class, 'listaEventos'])->name('atendente.eventos');
    Route::get('/atendente/{evento}/inscrito', [AtendenteController::class, 'showInscritos'])->name('atendente.showInscritos');
    Route::get('/atendente/{evento}/inscrito/getData', [AtendenteController::class, 'getData'])->name('atendente.getdata');

    Route::post('/atendente/store', [AtendenteController::class, 'store'])->name('atendente.store');
    Route::post('/atendente/{evento}/inscritos/{inscrito}/marcar-presente', [AtendenteController::class, 'presenca'])->name('atendente.presenca');


});

//Route::redirect('/admin', 'admin/cursos');
