<form action="{{ route('lista.inscritos.adicionar', ['evento' => $evento->id]) }}" method="post">
    @csrf

    {{-- Campos do formulário --}}
    <input type="hidden" name="evento_id" value="{{ $eventoId }}">

    <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}" required>
    </div>

    <div class="form-group">
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" class="form-control" value="{{ old('cpf') }}" required>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
    </div>

    <div class="form-group">
        <label for="atividade">Atividade:</label>
        <input type="atividade" name="atividade" id="atividade" class="form-control" value="{{ old('atividade') }}">
    </div>

    <div class="form-group">
        <label for="cidade">Municipio:</label>
        <input type="cidade" name="cidade" id="cidade" class="form-control" value="{{ old('cidade') }}">
    </div>

    <div class="form-group">
        <label for="telefone">Telefone:</label>
        <input type="telefone" name="telefone" class="form-control" value="{{ old('telefone') }}">
    </div>

    {{-- Botão de envio --}}
    <button type="submit">Inscrever-se</button>
</form>

