@extends('admin.layout.admin')

@section('header')
	<!-- DATA TABLES -->
	<link href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')
<section class="content-header">
	<h1>
		Produit
		<small>Categorie - Creation</small>
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
		@include('admin.categorie.errors')
	</div>
</div>

<div class="row navBlock">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<h3 style="text-align: center">Ajout d'une categorie</h3>
	</div><!-- /.col -->
</div>

{!! Form::open(array('route'=>'admin.categorie.store')) !!}
<div class="row navTabs" style="padding-left: 14%">
@foreach($langues as $row)
	<div class="col-md-5 col-xs-12">
		<!-- general form elements -->
		<div class="box box-success">
			<div class="box-body">
				<div class="row">
					<div class="col-md-12"><h4 class="navTitle">{{ $row->label }}</h4></div>
				</div>
				<div class="form-group">
                	{!! Form::label('nom_'.$row->id, 'Nom :') !!}
                    {!! Form::input('nom_'.$row->id, 'nom_'.$row->id, null, ['class' => 'form-control', 'placeholder' => $row->label]) !!}
                </div>
                <div class="form-group">
                	{!! Form::label('description_'.$row->id, 'Description :') !!}
                    {!! Form::textarea('description_'.$row->id, null, ['class' => 'form-control', 'placeholder' => $row->label]) !!}
                </div>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div><!-- /.col -->
@endforeach
</div><!-- /.row -->

<div class="row">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<div class="navButton" >
			<button type="submit" class="btn btn-primary">Submit</button>
			<a class="btn btn-danger" title="Previous" alt="Previous" href="{{URL::previous()}}">Cancel</a>
		</div>
	</div><!-- /.col -->
</div><!-- /.row -->
{!!  Form::close() !!}
</section>

@stop
