@if (Session::has('flash_message'))
    <div class="alert alert-success" style="padding-left: 20px" role="alert">
        {!! Session::get('flash_message') !!}
    </div>
@endif
