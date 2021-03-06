@extends('front.layout.app')

@section('header')
    <!-- DATA TABLES -->
    <link href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/cgx.css') }}" rel="stylesheet" type="text/css" />

@stop

@section('content')
{!! Breadcrumbs::render('cgu') !!}

    @foreach($cgu as $row)

            @if($row->langue->label == Lang::get('menu.langactiv'))



                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-md-12 col-md-12 col-lg-12">
                                <div class="box">
                                    <div class="box-icon">
                                        <span class="fa fa-4x fa-users"></span>
                                    </div>
                                    <div class="info">
                                        <h4 class="text-center">{!!$row->title!!}</h4>
                                        <p>
                                            {!!$row->cgu!!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            @endif

    @endforeach


@stop


@section('footer')
@stop
