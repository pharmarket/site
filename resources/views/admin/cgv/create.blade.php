@extends('admin.layout.admin')

@section('header')

@stop

@section('content')
<section class="content-header">
	<h1>
		Pages
		<small>CGV - Create</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ ucfirst(route('accueil')) }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Pages</li>
	</ol>
</section>

			<!-- Main content -->
<section class="content">
    <div class="row">
        <div>
            @include('admin.cgv.errors')
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <h3 style="text-align: center">Ajout d'une CGV</h3>
        </div><!-- /.col -->
    </div>

    {!! Form::open(array('route'=>'admin.cgv.store')) !!}



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
                        {!! Form::label('cgv', 'CGV :') !!}
                        {!! Form::textarea('cgv', '', array('class'=>'form-control', 'name'=>'cgv', 'placeholder' => 'CGV :')) !!}
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
  </section>
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
