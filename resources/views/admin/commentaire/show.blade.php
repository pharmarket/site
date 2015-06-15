@extends('admin.layout.admin')

@section('header')
    <!-- DATA TABLES -->
    <link href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <h3 style="text-align: center">Détails du commentaire n°{{ $commentaire->id }}</h3>
        </div><!-- /.col -->
    </div>


    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Utilisateur :</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-9">{{ $commentaire->user->nom }}</div>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>


    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Produit :</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-9">{{ $commentaire->produit->reference }}</div>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>


    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Information général</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-3">Nom :</div>
                        <div class="col-md-9">{{ $commentaire->nom }}</div>

                        <div class="col-md-3">Note :</div>
                        <div class="col-md-9">{{ $commentaire->note }}</div>

                        <div class="col-md-3">Description :</div>
                        <div class="col-md-9">{!! $commentaire->description !!}</div>

                        <div class="col-md-3">Done :</div>
                        @if($commentaire->done == 1)
                            <div class="col-md-9">Commentaire accepté par l'administrateur</div>
                        @else
                            <div class="col-md-9">Commentaire en cours de validation</div>
                        @endif
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>





    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">INFORMATION SUPPLEMENTAIRE</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-3" style="text-align: right; font-size: 0.7em;">Crée le :</div>
                        <div class="col-md-9" style="font-size: 0.7em;">{{ $commentaire->created_at }}</div><br />
                        <div class="col-md-3" style="text-align: right; font-size: 0.7em;">Modifié le :</div>
                        <div class="col-md-9" style="font-size: 0.7em;">{{ $commentaire->updated_at }}</div>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>



    </div><!-- /.row -->
@stop

@section('footer')
@stop

