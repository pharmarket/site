@extends('admin.layout.admin')

@section('header')

@stop

@section('content')

    <div class="row">
        <div>
            @include('admin.commande.errors')
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <h3 style="text-align: center">Ajout d'une commande</h3>
        </div><!-- /.col -->
    </div>

    {!! Form::open(array('route'=>'admin.commande.store')) !!}

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
                        {!! Form::label('livraison_id', 'livraison :') !!}
                        {!! Form::select('livraison_id', $livraison, '', ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('paiement_id', 'paiement :') !!}
                        {!! Form::select('paiement_id', $paiement, '', ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('user_id', 'user :') !!}
                        {!! Form::select('user_id', $user, '', ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('devise_id', 'devise :') !!}
                        {!! Form::select('devise_id', $devise, '', ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('livreur_id', 'livreur :') !!}
                        {!! Form::select('livreur_id', $livreur, '', ['class'=>'form-control']) !!}
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