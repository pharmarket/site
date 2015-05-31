@extends('admin.layout.admin')

@section('content')

    <link href="{{ asset('front/css/onglet.css') }}" rel="stylesheet" type="text/css" />

    <div class="row navBlock">
        <div class="">
            <h3 style="text-align: center">Modification d'une vente</h3>
        </div><!-- /.col -->
    </div>

    {!! Form::open(array('route' => array('admin.vente.update', $vente->id), 'method' => 'put')) !!}

    <div class="row navTabs">
        <div class="col-md-10 col-md-offset-1 col-xs-12">
            <div class="panel with-nav-tabs panel-primary" style="min-height: 350px">
                <!-- Nav tabs -->
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#vente" data-toggle="tab">Vente</a></li>
                        <li><a href="#exemplaireVente" data-toggle="tab">Exemplaire Vente</a></li>
                    </ul>
                </div>

                <div class="panel-body">
                    <div class="tab-content">
                        <!-- Tab panes Informations générales -->
                        <div class="tab-pane fade in active" id="vente">

                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 col-xs-12">
                                    <!-- general form elements -->
                                    <div class="box box-success">
                                        <div class="box-header">
                                            <h3 class="box-title">Vente</h3>
                                        </div>
                                        <!-- form start -->
                                        <div class="box-body">

                                            <div class="form-group">
                                                {!! Form::label('devise_id', 'devise :') !!}
                                                {!! Form::select('devise_id', $devise, $vente->devise_id, ['class'=>'form-control']) !!}
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('entrepot_id', 'entrepot :') !!}
                                                {!! Form::select('entrepot_id', $entrepot, $vente->entrepot_id, ['class'=>'form-control']) !!}
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('fournisseur_id', 'fournisseur :') !!}
                                                {!! Form::select('fournisseur_id', $fournisseur, $vente->fournisseur_id, ['class'=>'form-control']) !!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('commande_at', 'commande_at :') !!}
                                                {!!Form::input('', 'commande_at', $vente->commande_at, ['class' => 'form-control', 'name'=>'commande_at'])!!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('livraison_at', 'livraison_at :') !!}
                                                {!!Form::input('', 'livraison_at', $vente->livraison_at, ['class' => 'form-control', 'name'=>'livraison_at'])!!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('statut', 'statut :') !!}
                                                {!! Form::text('statut', $vente->statut, array('class'=>'form-control', 'name'=>'statut', 'placeholder' => 'statut :')) !!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('montant', 'montant :') !!}
                                                {!! Form::text('montant', $vente->montant, array('class'=>'form-control', 'name'=>'montant', 'placeholder' => 'montant :')) !!}
                                            </div>

                                        </div><!-- /.box-body -->
                                    </div><!-- /.box -->
                                </div><!-- /.col -->
                            </div><!-- /.row -->

                        </div>

                        <!-- Tab panes Description Multilangues -->
                        <div class="tab-pane fade" id="exemplaireVente">

                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 col-xs-12">
                                    <!-- general form elements -->
                                    <div class="box box-success">
                                        <div class="box-header">
                                            <h3 class="box-title">Exemplaire Vente</h3>
                                        </div>
                                        <!-- form start -->
                                        @foreach($vente->ventee as $value)
                                            <div class="box-body">
                                                <div class="form-group">
                                                    {!! Form::label('vente_id', 'vente :') !!}
                                                    {!! Form::select('vente_id'.$value->id, $ventee, $value->vente_id, ['class'=>'form-control']) !!}
                                                </div>

                                                <div class="form-group">
                                                    {!! Form::label('exemplaire_id', 'exemplaire produit :') !!}
                                                    {!! Form::select('exemplaire_id'.$value->id, $produitExemplaire, $value->exemplaire_id, ['class'=>'form-control']) !!}
                                                </div>

                                                <div class="form-group">
                                                    {!! Form::label('quantite', 'quantite :') !!}
                                                    {!! Form::text('quantite', $value->quantite, array('class'=>'form-control', 'name'=>'quantite'.$value->id, 'placeholder' => 'quantite :', 'required'=>'required', 'pattern'=>'[0-9]*')) !!}
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

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <div style="text-align: center" >
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-primary" title="Previous" alt="Previous" href="{{URL::previous()}}">Previous</a>
            </div>
        </div><!-- /.col -->
    </div>

    {!!  Form::close() !!}

@stop