@extends('admin.layout.admin')

@section('content')

    <div class="row">
        <div>
            @include('admin.fournisseur.errors')
        </div>
    </div>

    <link href="{{ asset('front/css/onglet.css') }}" rel="stylesheet" type="text/css" />

    <div class="row navBlock">
        <div class="">
            <h3 style="text-align: center">Modification du fournisseur n°{{ $fournisseur->id  }}</h3>
        </div><!-- /.col -->
    </div>


    {!! Form::open(array('route' => array('admin.fournisseur.update', $fournisseur->id), 'method' => 'put')) !!}


    <div class="row navTabs">
        <div class="col-md-10 col-md-offset-1 col-xs-12">
            <div class="panel with-nav-tabs panel-primary" style="min-height: 350px">
                <!-- Nav tabs -->
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#fournisseur" data-toggle="tab">Fournisseur</a></li>
                        <li><a href="#vente" data-toggle="tab">Achat</a></li>
                        <li><a href="#produitFournisseur" data-toggle="tab">Produit Fournisseur</a></li>
                    </ul>
                </div>

                <div class="panel-body">
                    <div class="tab-content">
                        <!-- Tab panes Informations générales -->
                        <div class="tab-pane fade in active" id="fournisseur">

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
                                                {!! Form::label('nom', 'nom :') !!}
                                                {!! Form::text('nom', $fournisseur->nom, array('class'=>'form-control', 'name'=>'nom', 'placeholder' => 'nom :')) !!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('adresse', 'adresse :') !!}
                                                {!! Form::text('adresse', $fournisseur->adresse, array('class'=>'form-control', 'name'=>'adresse', 'placeholder' => 'adresse :')) !!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('cp', 'cp :') !!}
                                                {!! Form::text('cp', $fournisseur->cp, array('class'=>'form-control', 'name'=>'cp', 'placeholder' => 'cp :')) !!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('ville', 'ville :') !!}
                                                {!! Form::text('ville', $fournisseur->ville, array('class'=>'form-control', 'name'=>'ville', 'placeholder' => 'ville :')) !!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('phone', 'phone :') !!}
                                                {!! Form::text('phone', $fournisseur->phone, array('class'=>'form-control', 'name'=>'phone', 'placeholder' => 'phone :')) !!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('contact', 'contact :') !!}
                                                {!! Form::text('contact', $fournisseur->contact, array('class'=>'form-control', 'name'=>'contact', 'placeholder' => 'contact :')) !!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('commentaire', 'commentaire :') !!}
                                                {!! Form::textarea('commentaire', $fournisseur->commentaire, array('class'=>'form-control', 'name'=>'commentaire', 'placeholder' => 'commentaire :')) !!}
                                            </div>

                                        </div><!-- /.box-body -->
                                    </div><!-- /.box -->
                                </div><!-- /.col -->
                            </div><!-- /.row -->

                        </div>

                        <!-- Tab panes Description Multilangues -->
                        <div class="tab-pane fade" id="vente">

                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 col-xs-12">
                                    <!-- general form elements -->
                                    <div class="box box-success">
                                        <div class="box-header">
                                            <h3 class="box-title">Modification d'un achat</h3>
                                        </div>
                                        <!-- form start -->

                                        @foreach($fournisseur->ventee as $value)

                                            <div class="box-body">

                                                <div class="form-group">
                                                    {!! Form::label('devise_id', 'devise :') !!}
                                                    {!! Form::select('devise_id'.$value->id, $devise, $value->devise_id, ['class'=>'form-control']) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('entrepot_id', 'entrepot :') !!}
                                                    {!! Form::select('entrepot_id'.$value->id, $entrepot, $value->entrepot_id, ['class'=>'form-control']) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('fournisseur_id', 'fournisseur :') !!}
                                                    {!! Form::select('fournisseur_id'.$value->id, $fournisseurr, $value->fournisseur_id, ['class'=>'form-control']) !!}
                                                </div>


                                                <div class="form-group">
                                                    {!! Form::label('commande_at', 'commande_at :') !!}
                                                    {!!Form::input('', 'commande_at', $value->commande_at, ['class' => 'form-control', 'name'=>'commande_at'.$value->id, 'required'=>'required'])!!}
                                                </div>

                                                <div class="form-group">
                                                    {!! Form::label('livraison_at', 'livraison_at :') !!}
                                                    {!!Form::input('', 'livraison_at', $value->livraison_at, ['class' => 'form-control', 'name'=>'livraison_at'.$value->id, 'required'=>'required'])!!}
                                                </div>

                                                <div class="form-group">
                                                    {!! Form::label('statut', 'statut :') !!}
                                                    {!! Form::select('statut', $statut, $value->statut->id, array('class'=>'form-control', 'name'=>'statut'.$value->id, 'placeholder' => 'statut :', 'required'=>'required', 'pattern'=>'[a-zA-Z0-9]+[a-zA-Z0-9 ]+')) !!}
                                                </div>

                                                <div class="form-group">
                                                    {!! Form::label('montant', 'montant :') !!}
                                                    {!! Form::text('montant', $value->montant, array('class'=>'form-control', 'name'=>'montant'.$value->id, 'placeholder' => 'montant :', 'required'=>'required', 'pattern'=>'[0-9]*')) !!}
                                                </div>
                                            </div><!-- /.box-body -->
                                            <hr>

                                        @endforeach
                                    </div><!-- /.box -->
                                </div><!-- /.col -->
                            </div><!-- /.row -->

                        </div>

                        <!-- Tab panes Description Notice -->
                        <div class="tab-pane fade" id="produitFournisseur">

                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 col-xs-12">
                                    <!-- general form elements -->
                                    <div class="box box-success">
                                        <div class="box-header">
                                            <h3 class="box-title">Modification du fournisseur d'un produit</h3>
                                        </div>
                                        <!-- form start -->

                                        @foreach($fournisseur->produitFournisseur as $value)

                                            <div class="box-body">
                                                <div class="form-group">
                                                    {!! Form::label('produit_id', 'produit :') !!}
                                                    {!! Form::select('produit_id'.$value->id, $produit, $value->produit_id, ['class'=>'form-control']) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('fournisseur_id', 'fournisseur :') !!}
                                                    {!! Form::select('fournisseur_id'.$value->id, $fournisseure, $value->fournisseur_id, ['class'=>'form-control']) !!}
                                                </div>
                                            </div><!-- /.box-body -->
                                            <hr>
                                        @endforeach

                                    </div><!-- /.box -->
                                </div><!-- /.col -->
                            </div><!-- /.row -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <div class="col-md-12 navButton" style="text-align: center;">
                <button type="submit" class="btn btn-success">Submit</button>
                <a class="btn btn-primary" title="Previous" alt="Previous" href="{{URL::previous()}}">Previous</a>
            </div>
        </div><!-- /.col -->
    </div><!-- /.row -->

    {!!  Form::close() !!}

@stop
