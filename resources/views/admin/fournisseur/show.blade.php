@extends('admin.layout.admin')

@section('content')

    <link href="{{ asset('front/css/onglet.css') }}" rel="stylesheet" type="text/css" />

    <div class="row navBlock">
        <div class="">
            <h3 style="text-align: center">Fournisseur n°{{ $fournisseur->id  }}</h3>
        </div><!-- /.col -->
    </div>

    @foreach($fournisseurp as $row)

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

                                    <div class="col-md-10 col-md-offset-1 col-xs-1">
                                        <div class="box box-success">
                                            <div class="box-header">
                                                <h3 class="box-title">Informations générales</h3>
                                            </div>

                                            <div class="box-body">
                                                <div class="row">
                                                    <div class="col-md-3" style="text-align: right; font-weight: bold;">Id :</div>
                                                    <div class="col-md-9">{{ $row->id  }}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3" style="text-align: right; font-weight: bold;">siret :</div>
                                                    <div class="col-md-9">{{ $row->siret  }}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3" style="text-align: right; font-weight: bold;">nom :</div>
                                                    <div class="col-md-9">{{ $row->nom  }}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3" style="text-align: right; font-weight: bold;">adresse :</div>
                                                    <div class="col-md-9">{{ $row->adresse }}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3" style="text-align: right; font-weight: bold;">cp :</div>
                                                    <div class="col-md-9">{{ $row->cp }}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3" style="text-align: right; font-weight: bold;">ville :</div>
                                                    <div class="col-md-9">{{ $row->ville }}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3" style="text-align: right; font-weight: bold;">phone :</div>
                                                    <div class="col-md-9">{{ $row->phone  }}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3" style="text-align: right; font-weight: bold;">contact :</div>
                                                    <div class="col-md-9">{{ $row->contact  }}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3" style="text-align: right; font-weight: bold;">commentaire :</div>
                                                    <div class="col-md-9">{{ $row->commentaire  }}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3" style="text-align: right; font-weight: bold;">created_at :</div>
                                                    <div class="col-md-9">{{ $row->created_at  }}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3" style="text-align: right; font-weight: bold;">updated_at :</div>
                                                    <div class="col-md-9">{{ $row->updated_at  }}</div>
                                                </div>
                                            </div><!-- /.box-body -->
                                        </div><!-- /.box -->
                                    </div>
                                </div>

                            </div>

                            <!-- Tab panes Description Multilangues -->
                            <div class="tab-pane fade" id="vente">

                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1 col-xs-1">
                                        <div class="box box-success">
                                            <div class="box-header">
                                                <h3 class="box-title">Information supplémentaire</h3>
                                            </div>
                                            <div class="box-body">
                                                @foreach($row->ventee as $value)
                                                    <div class="row">
                                                        <div class="col-md-3" style="text-align: right; font-weight: bold;">reference :</div>
                                                        <div class="col-md-9">{{ $value->reference}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3" style="text-align: right; font-weight: bold;">commande_at :</div>
                                                        <div class="col-md-9">{{ $value->commande_at }}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3" style="text-align: right; font-weight: bold;">livraison_at :</div>
                                                        <div class="col-md-9">{{ $value->livraison_at }}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3" style="text-align: right; font-weight: bold;">montant :</div>
                                                        <div class="col-md-9">{{ $value->montant }}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3" style="text-align: right; font-weight: bold;">created_at :</div>
                                                        <div class="col-md-9">{{ $value->created_at }}</div>
                                                    </div>
                                                    <br>
                                                @endforeach
                                            </div><!-- /.box-body -->
                                        </div><!-- /.box -->
                                    </div>
                                </div>

                            </div>

                            <!-- Tab panes Description Notice -->
                            <div class="tab-pane fade" id="produitFournisseur">

                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1 col-xs-1">
                                        <div class="box box-success">
                                            <div class="box-header">
                                                <h3 class="box-title">Information supplémentaire</h3>
                                            </div>
                                            <div class="box-body">
                                                @foreach($row->produit as $value)
                                                    <div class="row">
                                                        <div class="col-md-3" style="text-align: right; font-weight: bold;">reference :</div>
                                                        <div class="col-md-9">{{$value->reference}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3" style="text-align: right; font-weight: bold;">created_at :</div>
                                                        <div class="col-md-9">{{$value->created_at}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3" style="text-align: right; font-weight: bold;">montant :</div>
                                                        <div class="col-md-9">{{$value->montant}}</div>
                                                    </div>
                                                    <br>
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

    @endforeach

    <div class="row">
        <div class="col-md-12 navButton" style="text-align: center;">
            <a class="btn btn-primary" title="Previous" alt="Previous" href="{{URL::previous()}}">Previous</a>
        </div>
    </div>

@stop
