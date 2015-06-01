@extends('admin.layout.admin')

@section('content')

    <div class="row">
        <div>
            @include('admin.produit.errors')

            <div class="col-md-12 col-xs-12">
                <h3 style="text-align: center">Import CSV</h3>
            </div><!-- /.col -->
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            {!! Form::open(array('route'=>'admin.produit.exportCsvProduitsInfos')) !!}
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <!-- general form elements -->
                    <div class="box box-success">
                        <div class="box-header">
                            <h3 class="box-title">Export PRODUITS</h3>
                        </div>
                        <!-- form start -->
                        <div class="box-body">
                            <div style="text-align: center" >
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
            {!!  Form::close() !!}
        </div>

        <div class="col-md-10 col-md-offset-1">
            {!! Form::open(array('route'=>'admin.produit.exportCsvExemplairesInfos')) !!}
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <!-- general form elements -->
                    <div class="box box-success">
                        <div class="box-header">
                            <h3 class="box-title">Export EXEMPLAIRES</h3>
                        </div>
                        <!-- form start -->
                        <div class="box-body">
                            <div style="text-align: center" >
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
            {!!  Form::close() !!}
        </div>
    </div>

    <div class="row">
        <div class="col-md-12" style="text-align: center">
            <a class="btn btn-danger" title="Previous" alt="Previous" href="{{URL::previous()}}">Previous</a>
        </div>
    </div>

@stop