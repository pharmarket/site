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
            <h3 style="text-align: center">Modification d'une commande</h3>
        </div><!-- /.col -->
    </div>

    {!! Form::open(array('route' => array('admin.commande.update', $commande->id), 'method' => 'put')) !!}
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
                        {!! Form::select('livraison_id', $livraison, $commande->livraison_id, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('paiement_id', 'paiement :') !!}
                        {!! Form::select('paiement_id', $paiement, $commande->paiement_id, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('user_id', 'user :') !!}
                        {!! Form::select('user_id', $user, $commande->user_id, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('devise_id', 'devise :') !!}
                        {!! Form::select('devise_id', $devise, $commande->devise_id, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('livreur_id', 'livreur :') !!}
                        {!! Form::select('livreur_id', $livreur, $commande->livreur_id, ['class'=>'form-control']) !!}
                    </div>


                    <div class="form-group">
                        {!! Form::label('commande_at', 'commande_at :') !!}
                        {!!Form::input('', 'commande_at', $commande->commande_at, ['class' => 'form-control', 'name'=>'commande_at'])!!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('livraison_at', 'livraison_at :') !!}
                        {!!Form::input('', 'livraison_at', $commande->livraison_at, ['class' => 'form-control', 'name'=>'livraison_at'])!!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('statut', 'statut :') !!}
                        {!! Form::text('statut', $commande->statut, array('class'=>'form-control', 'name'=>'statut', 'placeholder' => 'statut :')) !!}
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->



    @foreach($commandeExemplaire as $row)
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-xs-12">
                <!-- general form elements -->
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Modification d'exemplaire d'une commande {{$row->id}}</h3>
                    </div>
                    <!-- form start -->
                    <div class="box-body">
                        <div class="form-group">
                            {!! Form::label('devise_id', 'devise :') !!}
                            {!! Form::select('devise_id'.$row->id, $devise, $row->devise_id, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('exemplaire_id', 'exemplaire :') !!}
                            {!! Form::select('exemplaire_id'.$row->id, $exemplaireProduit, $row->exemplaire_id, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('commande_id', 'commande :') !!}
                            {!! Form::select('commande_id'.$row->id, $commandee, $row->commande_id, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('montant', 'montant :') !!}
                            {!! Form::text('montant', $row->montant, array('class'=>'form-control', 'name'=>'montant'.$row->id, 'placeholder' => 'montant :', 'required'=>'required', 'pattern'=>'[0-9]*')) !!}
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    @endforeach



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