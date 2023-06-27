@if(session()->has('bootstrap-alert'))

    @php
        $alert = session()->get('bootstrap-alert');
        $type = isset($alert['type']) ? $alert['type'] : 'warning';
        $message = isset($alert['message']) ? $alert['message'] : '---';
    @endphp

    <div class="alert alert-{{ $type }} go-to-div">
        <span>{{ $message }}</span>
    </div>
@endif
