@extends('admin.layout.admin')

@section('header')

@stop

@section('content')

    <div class="row">
        <div>
            @include('admin.charte.errors')
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <h3 style="text-align: center">Modification d'une charte qualité </h3>
        </div><!-- /.col -->
    </div>

    {!! Form::open(['method' => 'put', 'url' => route('admin.charte.update', $charte->id)]) !!}



    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <!-- general form elements -->
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Informations générales</h3>
                </div>
                <!-- form start -->
                <div class="box-body">
                    {!! Form::hidden('langue_id', $charte->langue_id, array('class'=>'form-control', 'name'=>'langue_id', 'placeholder' => 'langue_id :')) !!}
                    <div class="form-group">
                        {!! Form::label('title', 'Titre :') !!}
                        {!! Form::text('title', $charte->title, array('class'=>'form-control', 'name'=>'title', 'placeholder' => 'titre :')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'description :') !!}
                        {!! Form::textarea('description', $charte->description, array('class'=>'form-control', 'name'=>'description', 'placeholder' => 'description :')) !!}
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