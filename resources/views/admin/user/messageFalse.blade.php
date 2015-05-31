@if (Session::has('flash_message'))
    <div class="alert alert-danger" role="alert">
        {!! Session::get('flash_message') !!}
    </div>
@endif
