@extends('admin.layout.admin')
@section('content')

    <div class="row">
        <div>
            @include('admin.user.errors')
            @include('admin.user.succes')
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <h3 style="text-align: center">Ajout d'une ville</h3>
        </div><!-- /.col -->
    </div>

    {!! Form::open(array('route'=>'user.postVille')) !!}

        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-xs-12">
                <!-- general form elements -->
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Ajout d'une adresse</h3>
                    </div>
                    <!-- form start -->
                    <div class="box-body">
                        <div class="form-group">
                            {!! Form::label('pays_id', 'pays :') !!}
                            {!! Form::select('pays_id', $pays, '', ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('nom', 'nom :') !!}
                            {!! Form::text('nom', '', array('class'=>'form-control', 'name'=>'nom', 'placeholder' => 'nom :')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('cp', 'cp :') !!}
                            {!! Form::text('cp', '', array('class'=>'form-control', 'name'=>'cp', 'placeholder' => 'cp :')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('adresse', 'adresse :') !!}
                            {!! Form::textarea('adresse', '', array('class'=>'form-control', 'name'=>'adresse', 'placeholder' => 'adresse :')) !!}
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