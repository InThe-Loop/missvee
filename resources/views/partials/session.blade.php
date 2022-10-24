@if (session()->has('success'))
    <div class="alert alert-success">
        <p>{{ ucfirst(session()->get('success')) }}</p>
    </div>
@endif

@if (session()->has('error'))
    <div class="alert alert-danger-custom text-center">
        <p class="text-white">{{ ucfirst(session()->get('error')) }}</p>
    </div>
@endif
