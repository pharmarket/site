@extends('admin.layout.admin')
@section('content')

    <div class="row">
        <div>
            @include('admin.vente.errors')
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <h3 style="text-align: center">VENTE</h3>
        </div><!-- /.col -->
    </div>

    {!! Form::open(array('route'=>'vente.exemplaireVente')) !!}

    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <!-- general form elements -->
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Ajout d'une exemplaire de vente</h3>
                </div>
                <!-- form start -->
                <div class="box-body">

                    <div class="form-group">
                        {!! Form::label('vente_id', 'vente :') !!}
                        {!! Form::select('vente_id', $vente, '', ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('exemplaire_id', 'exemplaire produit :') !!}
                        {!! Form::select('exemplaire_id', $produitExemplaire, '', ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('quantite', 'quantite :') !!}
                        {!! Form::text('quantite', '', array('class'=>'form-control', 'name'=>'quantite', 'placeholder' => 'quantite :')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('montant', 'montant :') !!}
                        {!! Form::text('montant', '', array('class'=>'form-control', 'name'=>'montant', 'placeholder' => 'montant :')) !!}
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


