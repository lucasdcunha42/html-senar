<select name="assunto" id="" class="custom-select">
    <option value="">ASSUNTO</option>
    @foreach($__assuntos as $assunto)
        <option {{ old('assunto') == $assunto->id ? 'selected' : '' }} value="{{ $assunto->id }}">{{ $assunto->assunto }}</option>
    @endforeach
</select>
