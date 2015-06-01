@extends('admin.layout.admin')

@section('header')

@stop

@section('content')

    <div class="row">
        <div>
            @include('admin.cgu.errors')
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <h3 style="text-align: center">Ajout d'une CGU</h3>
        </div><!-- /.col -->
    </div>

    {!! Form::open(array('route'=>'admin.cgu.store')) !!}




    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <!-- general form elements -->
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">LANGUE</h3>
                </div>
                <!-- form start -->
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('langue_id', 'Langue :') !!}
                        {!! Form::select('langue_id', $langue, '', ['class'=>'form-control']) !!}
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->




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
                        {!! Form::label('title', 'Titre :') !!}
                        {!! Form::text('title', '', array('class'=>'form-control', 'name'=>'title', 'placeholder' => 'titre :')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('cgu', 'CGU :') !!}
                        {!! Form::textarea('cgu', '', array('class'=>'form-control', 'name'=>'cgu', 'placeholder' => 'CGU :')) !!}
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
    <!-- TINY MCE -->
    <script src="{{ asset('tinymce/tinymce.min.js') }}"></script>

    <script type="text/javascript">
        tinymce.init({
            selector: "textarea",
            plugins: [
                "",
                "",
                ""
            ],
            toolbar: "undo redo | styleselect | bold italic | bullist numlist"
        });
    </script>

@stop