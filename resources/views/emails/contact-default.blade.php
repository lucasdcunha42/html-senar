<table>
    <thead>
        <tr>
            <th>CAMPO</th>
            <th>VALOR</th>
        </tr>
    </thead>
    <tbody>
        @foreach($request->except(['_token', 'form-active']) as $campo => $valor)
            @if($campo == '_token')
                @continue
            @endif
            <tr>
                <td>{{ strtoupper($campo) }}</td>
                <td>{{ $valor }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
