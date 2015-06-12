@extends('admin.layout.admin')

@section('header')

@stop

@section('content')
<section class="content-header">
	<h1>
		Pages
		<small>Faq - Edition</small>
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
            @include('admin.faq.errors')
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <h3 style="text-align: center">Modification d'une FAQ</h3>
        </div><!-- /.col -->
    </div>

    {!! Form::open(['method' => 'put', 'url' => route('admin.faq.update', $faq->id)]) !!}


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
                        {!! Form::select('langue_id', $langue, $faq->langue_id, ['class'=>'form-control']) !!}
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
                        {!! Form::label('question', 'Question :') !!}
                        {!! Form::textarea('question', $faq->question, array('class'=>'form-control', 'name'=>'question', 'placeholder' => 'question :')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('answer', 'Reponse :') !!}
                        {!! Form::textarea('answer', $faq->answer, array('class'=>'form-control', 'name'=>'answer', 'placeholder' => 'reponse :')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('order', 'Ordre :') !!}
                        <select class="form-control" name="order" >
                            <option value={{$faq->order}}>{{$faq->order}}</option>
                            @for ($i = 1; $i <= $order; $i++)
                                <option value={{$i}}>{{$i}}</option>
                            @endfor
                        </select>






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
