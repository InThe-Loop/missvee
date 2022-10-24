@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger-custom text-center">
            <p class="text-white">{!! $error !!}</p>
        </div>
    @endforeach
@endif
