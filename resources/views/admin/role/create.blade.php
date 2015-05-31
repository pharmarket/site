@extends('admin.layout.admin')
@section('content')

    <div class="row">
        <div>
            @include('admin.role.errors')
            @include('admin.role.succes')
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <h3 style="text-align: center">Ajout d'un rôle</h3>
        </div><!-- /.col -->
    </div>

    {!! Form::open(array('route'=>'admin.role.store')) !!}

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
                        {!! Form::label('label', 'label :') !!}
                        {!! Form::text('label', '', array('class'=>'form-control', 'name'=>'label', 'placeholder' => 'label :')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'description :') !!}
                        {!! Form::textarea('description', '', array('class'=>'form-control', 'name'=>'description', 'placeholder' => 'description :')) !!}
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