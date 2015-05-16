@extends('admin.layout.admin')

@section('header')
    <!-- DATA TABLES -->
    <link href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <h3 style="text-align: center">Détails de la CGU n°{!! $cgv->id !!}</h3>
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
                        <div class="col-md-9">{!! $cgv->langue->label !!}</div>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>



    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">TITRE</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-9">{!! $cgv->title !!}</div>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>


    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">CGU</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-9">{!! $cgv->cgv !!}</div>
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
                        <div class="col-md-9" style="font-size: 0.7em;">{!! $cgv->created_at !!}</div><br />
                        <div class="col-md-3" style="text-align: right; font-size: 0.7em;">Modifié le :</div>
                        <div class="col-md-9" style="font-size: 0.7em;">{!! $cgv->updated_at !!}</div>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>



    </div><!-- /.row -->
@stop

@section('footer')
@stop

