<form action="{{ route('page.eventos.inscricao.store', ['slug' => $evento->slug]) }}" method="post">
    @csrf

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
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
    </div>

    <div class="form-group">
        <label for="atividade"> Atividade: </label>
        <input type="atividade" name="atividade" id="atividade" class="form-control" value="{{ old('atividade') }}">
    </div>

    <div class="form-group">
        <label for="cidade">Municipio:</label>
        <select name="cidade" id="cidade" class="form-control" required>
            <option value="" disabled selected>Selecione um município</option>
            @foreach($cidades as $id => $cidade)
                <option value="{{ $cidade }}" {{ old('cidade') == $id ? 'selected' : '' }}>
                    {{ $cidade }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="telefone">Telefone:</label>
        <input type="telefone" name="telefone" id="telefone" class="form-control" value="{{ old('telefone') }}">
    </div>

    <button type="submit" class="btn btn-success">Inscrever-se</button>
</form>
