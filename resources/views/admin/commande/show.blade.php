@extends('admin.layout.admin')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Detail de la commande {{$commande->reference}}
                <small>ID : {{$commande->id}}</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa fa-globe"></i> Commande
                        <small class="pull-right">Date: {{$commande->created_at}}</small>
                    </h2>
                </div><!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    From
                    <address>
                        <strong>PHARMARKET</strong><br>
                        Phone: 01 23 45 67 89<br/>
                        Mobile : 06 78 96 54 10<br/>
                        Email: contact@contact-pharmarket.fr
                    </address>
                </div><!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    To
                    <address>
                        <strong>{{$commande->user->nom}}</strong><br>
                        Phone: {{$commande->user->phone}}<br/>
                        Mobile: {{$commande->user->mobile}}<br/>
                        Email: {{$commande->user->email}}
                    </address>
                </div><!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>information</b>
                    <br/>
                    <b>Livreur :</b> {{$commande->livreur->nom}}<br/>
                    <b>Payment :</b> {{$commande->paiement->montant}}€<br/>
                    <b>Livraison le :</b> {{$commande->livraison_at}}
                </div><!-- /.col -->
            </div><!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Qty</th>
                            <th>reference exemplaire produit</th>
                            <th>peremption_at</th>
                            <th>Montant de l'exemplaire</th>
                            <th>Ville de livraison</th>
                            <th>Adresse de livraison</th>
                            <th>Compagny de livraison</th>
                            <th>Durée de livraison</th>
                            <th>Logo</th>
                            <th>Ref #</th>
                            <th>Statut</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($exemplaireProduct as $row)
                        <tr>
                            @foreach($exemplaire as $value)
                                <td>{{$value->total}}</td>
                            @endforeach
                            <td>{{$row->reference}}</td>
                            <td>{{$row->peremption_at}}</td>
                            <td>{{$row->montant}}€</td>
                            <td>{{$commande->livraison->ville}}</td>
                            <td>{{$commande->livraison->adresse}}</td>
                            <td>{{$commande->livreur->nom}}</td>
                            <td>{{$commande->livreur->duration}}</td>
                            <td>{!! HTML::image($commande->livreur->logo, '', array('height'=>'35', 'width'=>'55')) !!}</td>
                            <td>#{{$commande->reference}}</td>
                            <td>{{$commande->statut}}</td>
                            <td>{{$commande->paiement->montant}}€</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.col -->
            </div><!-- /.row -->


            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-xs-12">
                    <a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-hand-o-left"></i> Retour</a>
                </div>
            </div>
        </section><!-- /.content -->
        <div class="clearfix"></div>
    </div><!-- /.content-wrapper -->
@stop
