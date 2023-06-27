<div class="form-site form-licitacao hide-on-load" id="form-licitacao-cliente">
    <form action="{{ route('form.licitacao.cliente') }}" method="post">
        @csrf
        <input type="hidden" name="form-active" value="0">
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <input
                        type="text"
                        name="nome"
                        value="{{ old('nome') }}"
                        placeholder="NOME"
                        class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-2 col-sm-3">
                <div class="form-group">
                    <input
                        type="text"
                        name="ddd"
                        value="{{ old('ddd') }}"
                        placeholder="(51)"
                        class="form-control">
                </div>
            </div>
            <div class="col-xs-10 col-sm-9">
                <div class="form-group">
                <input
                    type="text"
                    name="telefone"
                    value="{{ old('telefone') }}"
                    placeholder="TELEFONE"
                    class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <input
                        type="text"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="E-MAIL"
                        class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-8 col-sm-9">
                <div class="form-group">
                    <input
                        type="text"
                        name="cidade"
                        value="{{ old('cidade') }}"
                        placeholder="CIDADE"
                        class="form-control">
                </div>
            </div>
            <div class="col-xs-4 col-sm-3">
                <div class="form-group">
                    <input
                        type="text"
                        name="estado"
                        value="{{ old('estado') }}"
                        placeholder="ESTADO"
                        class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <button type="submit" class="btn-submit">ENVIAR</button>
                <img src="{{ asset('images/loading.gif') }}" class="hide-on-load" alt="">
            </div>
        </div>
    </form>
</div>
