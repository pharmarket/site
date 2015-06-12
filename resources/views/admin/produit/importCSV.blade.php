@extends('admin.layout.admin')

@section('content')
<section class="content-header">
	<h1>
		Produit
		<small>Import CSV</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ ucfirst(route('accueil')) }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Produit</li>
	</ol>
</section>

			<!-- Main content -->
<section class="content">


    <div class="row">
        <div>
            @include('admin.produit.errors')
        </div>
    </div>

    <div class="row">
		@include('admin.produit.succes')
	</div>

    <div class="row navBlock">
        <div class="col-md-12 col-xs-12" style="text-align: center">
            <h3>Import CSV</h3>
        </div><!-- /.col -->
	</div>

    <div class="row navTabs">
    	<div class="col-md-6 col-md-offset-3">
		    {!! Form::open(array('route'=>'admin.produit.importCsvProduits', 'method' => 'POST')) !!}
            <!-- general form elements -->
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title" style="text-align: center">PRODUITS</h3>
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
		    {!!  Form::close() !!}
		</div>
	</div>

	<div class="row">

		<div class="col-md-6 col-md-offset-3">
		    {!! Form::open(array('route'=>'admin.produit.importCsvExemplaires', 'method' => 'post', 'files' => true)) !!}
            <!-- general form elements -->
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title" style="text-align: center">EXEMPLAIRES</h3>
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
		    {!!  Form::close() !!}
		</div>
	</div>

    <div class="row">
        <div class="col-md-12" style="text-align: center">
            <a class="btn btn-danger" title="Previous" alt="Previous" href="{{URL::previous()}}">Previous</a>
        </div>
    </div>
  </section>
@stop
