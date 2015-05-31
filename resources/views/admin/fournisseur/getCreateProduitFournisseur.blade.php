@extends('admin.layout.admin')

@section('header')

@stop

@section('content')

    <div class="row">
        <div>
            @include('admin.fournisseur.errors')
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <h3 style="text-align: center">Ajout d'un produit</h3>
        </div><!-- /.col -->
    </div>

    {!! Form::open(array('route'=>'fournisseur.produitFournisseur')) !!}



    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <!-- general form elements -->
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Information général</h3>
                </div>
                <!-- form start -->
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('produit_id', 'produit :') !!}
                        {!! Form::select('produit_id', $produit, '', ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('fournisseur_id', 'fournisseur :') !!}
                        {!! Form::select('fournisseur_id', $fournisseure, '', ['class'=>'form-control']) !!}
                    </div>

                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->







    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <div style="text-align: center" >
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div><!-- /.col -->
    </div><!-- /.row -->
    {!!  Form::close() !!}

@stop