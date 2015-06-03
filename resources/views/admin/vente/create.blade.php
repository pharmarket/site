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

    {!! Form::open(array('route'=>'admin.vente.store')) !!}

    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <!-- general form elements -->
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Informations générales</h3>
                </div>
                <!-- form start -->
                <div class="box-body">

                    <div class="form-group">
                        {!! Form::label('devise_id', 'devise :') !!}
                        {!! Form::select('devise_id', $devise, '', ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('entrepot_id', 'entrepot :') !!}
                        {!! Form::select('entrepot_id', $entrepot, '', ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('fournisseur_id', 'fournisseur :') !!}
                        {!! Form::select('fournisseur_id', $fournisseur, '', ['class'=>'form-control']) !!}
                    </div>


                    <div class="form-group">
                        {!! Form::label('reference', 'reference :') !!}
                        {!! Form::text('reference', '', array('class'=>'form-control', 'name'=>'reference', 'placeholder' => 'reference :')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('livraison_at', 'livraison_at :') !!}
                        {!!Form::input('date', 'livraison_at', null, ['class' => 'form-control', 'name'=>'livraison_at', 'placeholder' => 'Date'])!!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('statut', 'statut :') !!}
                        {!! Form::select('statut', $statut, null, array('class'=>'form-control', 'name'=>'statut', 'placeholder' => 'statut :')) !!}
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
