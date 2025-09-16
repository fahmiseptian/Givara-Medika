@php
    $setting = setting();
@endphp

<img src="{{ $setting->logo_url }}" {{ $attributes }} />
