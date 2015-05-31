@extends('admin.layout.admin')

@section('content')

    <div class="row">
        <div>
            @include('admin.commande.errors')

            <div class="col-md-12 col-xs-12">
                <h3 style="text-align: center">Import CSV</h3>
            </div><!-- /.col -->
        </div>
    </div>



    <div class="row">
        <div class="col-md-4">
            {!! Form::open(array('route'=>'commande.importCSVCommande', 'enctype' => 'multipart/form-data', 'files' => true)) !!}
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <!-- general form elements -->
                    <div class="box box-success">
                        <div class="box-header">
                            <h3 class="box-title">IMPORT COMMANDE</h3>
                        </div>
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">
                                {!! Form::file('file', null, ['class' => 'form-control']) !!}
                            </div>

                            <div style="text-align: center" >
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
            {!!  Form::close() !!}
        </div>




        <div class="col-md-4">
            {!! Form::open(array('route'=>'commande.importCSVCommandeExemplaire', 'enctype' => 'multipart/form-data', 'files' => true)) !!}
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <!-- general form elements -->
                    <div class="box box-success">
                        <div class="box-header">
                            <h3 class="box-title">IMPORT COMMANDE EXEMPLAIRE</h3>
                        </div>
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">
                                {!! Form::file('file', null, ['class' => 'form-control']) !!}
                            </div>

                            <div style="text-align: center" >
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
            {!!  Form::close() !!}
        </div>




        <div class="col-md-4">
            {!! Form::open(array('route'=>'commande.importCSVCommandeLivraison', 'enctype' => 'multipart/form-data', 'files' => true)) !!}
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <!-- general form elements -->
                    <div class="box box-success">
                        <div class="box-header">
                            <h3 class="box-title">IMPORT COMMANDE LIVRAISON</h3>
                        </div>
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">
                                {!! Form::file('file', null, ['class' => 'form-control']) !!}
                            </div>

                            <div style="text-align: center" >
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
            {!!  Form::close() !!}
        </div>




        <div class="col-md-4 col-md-offset-2">
            {!! Form::open(array('route'=>'commande.importCSVCommandePaiement', 'enctype' => 'multipart/form-data', 'files' => true)) !!}
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <!-- general form elements -->
                    <div class="box box-success">
                        <div class="box-header">
                            <h3 class="box-title">IMPORT COMMANDE PAIEMENT</h3>
                        </div>
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">
                                {!! Form::file('file', null, ['class' => 'form-control']) !!}
                            </div>

                            <div style="text-align: center" >
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
            {!!  Form::close() !!}
        </div>





        <div class="col-md-4">
            {!! Form::open(array('route'=>'commande.importCSVLivreur', 'enctype' => 'multipart/form-data', 'files' => true)) !!}
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <!-- general form elements -->
                    <div class="box box-success">
                        <div class="box-header">
                            <h3 class="box-title">IMPORT LIVREUR</h3>
                        </div>
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">
                                {!! Form::file('file', null, ['class' => 'form-control']) !!}
                            </div>

                            <div style="text-align: center" >
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
            {!!  Form::close() !!}
        </div>




    </div>

@stop