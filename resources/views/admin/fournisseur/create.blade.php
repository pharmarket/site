@extends('admin.layout.admin')

@section('header')

@stop

@section('content')

    <div class="row">
        <div>
            @include('admin.fournisseur.errors')
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <h3 style="text-align: center">Ajout d'un fournisseur</h3>
        </div><!-- /.col -->
    </div>

    {!! Form::open(array('route'=>'admin.fournisseur.store')) !!}

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
                        {!! Form::label('siret', 'siret :') !!}
                        {!! Form::text('siret', '', array('class'=>'form-control', 'name'=>'siret', 'placeholder' => 'siret :')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('nom', 'nom :') !!}
                        {!! Form::text('nom', '', array('class'=>'form-control', 'name'=>'nom', 'placeholder' => 'nom :')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('adresse', 'adresse :') !!}
                        {!! Form::text('adresse', '', array('class'=>'form-control', 'name'=>'adresse', 'placeholder' => 'adresse :')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('cp', 'cp :') !!}
                        {!! Form::text('cp', '', array('class'=>'form-control', 'name'=>'cp', 'placeholder' => 'cp :')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('ville', 'ville :') !!}
                        {!! Form::text('ville', '', array('class'=>'form-control', 'name'=>'ville', 'placeholder' => 'ville :')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('phone', 'phone :') !!}
                        {!! Form::text('phone', '', array('class'=>'form-control', 'name'=>'phone', 'placeholder' => 'phone :')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('contact', 'contact :') !!}
                        {!! Form::text('contact', '', array('class'=>'form-control', 'name'=>'contact', 'placeholder' => 'contact :')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('commentaire', 'commentaire :') !!}
                        {!! Form::textarea('commentaire', '', array('class'=>'form-control', 'name'=>'commentaire', 'placeholder' => 'commentaire :')) !!}
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