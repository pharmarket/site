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
            <h3 style="text-align: center">Ajout d'une vente</h3>
        </div><!-- /.col -->
    </div>

    {!! Form::open(array('route'=>'fournisseur.venteFournisseur')) !!}


    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <!-- general form elements -->
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Ajout d'une vente</h3>
                </div>
                <!-- form start -->
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('fournisseur_id', 'Fournisseur :') !!}
                        {!! Form::select('fournisseur_id', $fournisseur, '', ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('devise_id', 'devise :') !!}
                        {!! Form::select('devise_id', $devise, '', ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('entrepot_id', 'entrepot :') !!}
                        {!! Form::select('entrepot_id', $entrepot, '', ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('reference', 'reference :') !!}
                        {!! Form::text('reference', '', array('class'=>'form-control', 'name'=>'reference', 'placeholder' => 'reference :')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('commande_at', 'commande_at :') !!}
                        {!!Form::input('date', 'commande_at', null, ['class' => 'form-control', 'name'=>'commande_at', 'placeholder' => 'Date'])!!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('livraison_at', 'livraison_at :') !!}
                        {!!Form::input('date', 'livraison_at', null, ['class' => 'form-control', 'name'=>'livraison_at', 'placeholder' => 'Date'])!!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('statut', 'statut :') !!}
                        {!! Form::text('statut', '', array('class'=>'form-control', 'name'=>'statut', 'placeholder' => 'statut :')) !!}
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
@section('footer')

@stop