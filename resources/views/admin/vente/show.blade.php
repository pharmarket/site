@extends('admin.layout.admin')

@section('content')

    <link href="{{ asset('front/css/onglet.css') }}" rel="stylesheet" type="text/css" />

    <div class="row navBlock">
        <div class="">
            <h3 style="text-align: center">Vente N°{{$vente->id}}</h3>
        </div><!-- /.col -->
    </div>

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
                                <div class="col-md-10 col-md-offset-1 col-xs-12">
                                    <div class="box box-success">
                                        <div class="box-header">
                                            <h3 class="box-title">Informations générales</h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-md-3" style="text-align: right">Id :</div>
                                                <div class="col-md-9">{{ $vente->id  }}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3" style="text-align: right">Devise :</div>
                                                <div class="col-md-9">{{ $vente->devise->nom }}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3" style="text-align: right">Entrepot :</div>
                                                <div class="col-md-9">{{ $vente->entrepot->nom }} | {{ $vente->entrepot->adresse }} | {{ $vente->entrepot->cp }}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3" style="text-align: right">Fournisseur :</div>
                                                <div class="col-md-9">{{ $vente->fournisseur->siret }} | {{$vente->fournisseur->nom}}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3" style="text-align: right">Commande at :</div>
                                                <div class="col-md-9">{{ $vente->commande_at  }}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3" style="text-align: right">Livraison :</div>
                                                <div class="col-md-9">{{ $vente->livraison_at  }}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3" style="text-align: right">statut :</div>
                                                <div class="col-md-9">{{ $vente->statut->label  }}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3" style="text-align: right">montant :</div>
                                                <div class="col-md-9">{{ $vente->montant  }}</div>
                                            </div>
                                        </div><!-- /.box-body -->
                                    </div><!-- /.box -->
                                </div>
                            </div>

                        </div>

                        <!-- Tab panes Description Multilangues -->
                        <div class="tab-pane fade" id="exemplaireVente">

                            <div class="row">
                                <div class="col-md-10 col-md-offset-1 col-xs-12">
                                    <div class="box box-success">
                                        <div class="box-header">
                                            <h3 class="box-title">Vente Exemplaire</h3>
                                        </div>
                                        <div class="box-body">
                                            @foreach ($vente->ventee as $value)
                                                <div class="row">
                                                    <div class="col-md-3" style="text-align: right">id :</div>
                                                    <div class="col-md-9">{{ $value->id}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3" style="text-align: right">produit :</div>
                                                    <div class="col-md-9">{{ $value->produit_exemplaire->reference}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3" style="text-align: right">quantite :</div>
                                                    <div class="col-md-9">{{ $value->quantite}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3" style="text-align: right">montant :</div>
                                                    <div class="col-md-9">{{ $value->montant}}</div>
                                                </div>
                                                <hr>
                                            @endforeach
                                        </div><!-- /.box-body -->
                                    </div><!-- /.box -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <div style="text-align: center" >
                <a class="btn btn-primary" title="Previous" alt="Previous" href="{{URL::previous()}}">Previous</a>
            </div>
        </div><!-- /.col -->
    </div>

@stop
