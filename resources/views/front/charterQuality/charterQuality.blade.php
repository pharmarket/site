@extends('front.layout.app')

@section('header')
    <!-- DATA TABLES -->
    <link href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/cgx.css') }}" rel="stylesheet" type="text/css" />

@stop

@section('content')

    @foreach($charte as $row)

        @if($row->langue->label == Lang::get('menu.langactiv'))



            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-md-12 col-md-12 col-lg-12">
                        <div class="box">
                            <div class="box-icon">
                                <span class="fa fa-4x fa-file-text"></span>
                            </div>
                            <div class="info">
                                <h4 class="text-center">{!!$row->title!!}</h4>
                                <p>
                                    {!!$row->description!!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endif

    @endforeach
@stop

