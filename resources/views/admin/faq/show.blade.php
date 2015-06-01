@extends('admin.layout.admin')

@section('header')
    <!-- DATA TABLES -->
    <link href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <h3 style="text-align: center">Détails de la FAQ n°{!! $faq->id !!}</h3>
        </div><!-- /.col -->
    </div>


    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">LANGUE</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-9">{!! $faq->langue->label !!}</div>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>


    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">QUESTION</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-9">{!! $faq->question !!}</div>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>


    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">REPONSE</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-9">{!! $faq->answer !!}</div>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>





    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">INFORMATION SUPPLEMENTAIRE</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-3" style="text-align: right; font-size: 0.7em;">Crée le :</div>
                        <div class="col-md-9" style="font-size: 0.7em;">{!! $faq->created_at !!}</div><br />
                        <div class="col-md-3" style="text-align: right; font-size: 0.7em;">Modifié le :</div>
                        <div class="col-md-9" style="font-size: 0.7em;">{!! $faq->updated_at !!}</div>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>



    </div><!-- /.row -->
@stop

@section('footer')
@stop

