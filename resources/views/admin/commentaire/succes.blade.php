@if (Session::has('flash_message'))
    <div class="alert alert-success" role="alert">
        {!! Session::get('flash_message') !!}
    </div>
@endif
