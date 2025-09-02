@props(['class' => ''])

@if (session()->has('ok') || session()->has('success') || session()->has('status') || $errors->any())
<div {{ $attributes->merge(['class' => $class]) }}>
    @if (session('ok') || session('success') || session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert-success">
        {{ session('ok') ?? session('success') ?? session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $msg)
            <li>{{ $msg }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
    </div>
    @endif
</div>
<script>
    setTimeout(function() {
        var alertSuccess = document.getElementById('alert-success');
        if (alertSuccess) {
            var bsAlert = bootstrap.Alert.getOrCreateInstance(alertSuccess);
            bsAlert.close();
        }
        var alertDanger = document.getElementById('alert-danger');
        if (alertDanger) {
            var bsAlert = bootstrap.Alert.getOrCreateInstance(alertDanger);
            bsAlert.close();
        }
    }, 3000);
</script>
@endif