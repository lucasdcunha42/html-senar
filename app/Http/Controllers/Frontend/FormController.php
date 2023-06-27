<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class FormController extends Controller
{
    private $formulario;

    public function __construct()
    {
        $this->formulario = new \App\Formulario();
        $this->formulario->enviado = 0;
        $this->formulario->nome = request()->get('nome', '-');
        $this->formulario->email = request()->get('email', '-');
        $this->formulario->ip = request()->ip();
        $this->formulario->json = json_encode(request()->except(['_token', 'form-active']));
    }

    public function storeForm()
    {
        $this->formulario->save();
    }

    public function contato(\App\Http\Requests\Contato $request)
    {
        $this->formulario->formulario = 'Contato';
        $this->storeForm();

        $this->sendDefaultEmail($request);

        return $this->makeResponse($request);
    }

    public function faleConosco(\App\Http\Requests\FaleConosco $request)
    {
        $this->formulario->formulario = 'Fale Conosco';
        $this->storeForm();

        $this->sendDefaultEmail($request);

        return $this->makeResponse($request);
    }

    public function licitacaoEmpresa(\App\Http\Requests\LicitacaoEmpresa $request)
    {
        $this->formulario->formulario = 'Licitação Empresa';
        $request->merge(['assunto' => 'Licitação Empresa']);
        $this->storeForm();
        $this->configEmailLicitacoes($request);

        return $this->makeResponse($request);
    }

    public function licitacaoCliente(\App\Http\Requests\LicitacaoCliente $request)
    {
        $this->formulario->formulario = 'Licitação Cliente';
        $request->merge(['assunto' => 'Licitação Cliente']);
        $this->storeForm();
        $this->configEmailLicitacoes($request);

        return $this->makeResponse($request);
    }

    private function configEmailLicitacoes($request)
    {
        $receivers = [];

        $emails = explode(',', setting('admin.destinatarios-formularios-licitacoes'));
        foreach($emails as $email) {
            $receivers[] = trim($email);
        }

        \Mail::to($receivers)->send(new \App\Mail\ContactDefault($request));
    }

    private function sendDefaultEmail($request) {

        $emails = \App\ContatosAssuntosEmails::with('assunto')
                    ->where('assunto_id', $request->get('assunto'))
                    ->get();

        $receivers = [];

        foreach($emails as $email) {
            $receivers[] = $email->email;
        }

        if($emails->isNotEmpty()) {
            $request->merge(['assunto' => optional($emails->first()->assunto)->assunto ?? '-']);
        }

        \Mail::to($receivers)->send(new \App\Mail\ContactDefault($request));
    }

    private function makeResponse($request)
    {
        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Formulário enviado com sucesso'
            ]);
        }

        session()->flash('bootstrap-alert', [
            'message' => 'Formulário enviado com sucesso',
            'type' => 'success'
        ]);

        return back();
    }

}
