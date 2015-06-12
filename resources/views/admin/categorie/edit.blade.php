@extends('admin.layout.admin')
@section('content')
<section class="content-header">
	<h1>
		Produit
		<small>Categorie - Edition</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ ucfirst(route('accueil')) }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Produit</li>
	</ol>
</section>

			<!-- Main content -->
<section class="content">
{!! Form::open(array('route' => array('admin.categorie.update', $categorie->id), 'method' => 'put')) !!}

<div class="row">
	<div>
		@include('admin.categorie.errors')
	</div>
</div><!-- /.row -->

<div class="row navBlock">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<h3 style="text-align: center">Mise à jour de la Catégorie n°{{$categorie->id}}</h3>
	</div><!-- /.col -->
</div>

<div class="row navTabs">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<!-- general form elements -->
		<div class="box box-success">
			<div class="box-header"></div>
			<!-- form start -->
			<div class="box-body">
	            <div class="form-group">
	            	{!! Form::label('langue', 'Langue :') !!}
	                {!! Form::select('langue_id', $langues, $categorie->langue_id, ['class'=>'form-control']) !!}
	            </div>
		        <div class="form-group">
					{!! Form::label('nom', 'Nom :') !!}
					{!! Form::text('nom', $categorie->nom, ['class' => 'form-control', 'name'=>'nom', 'placeholder' => 'Nom']) !!}
		        </div>
		        <div class="form-group">
					{!! Form::label('description', 'Description :') !!}
					{!! Form::textarea('description', $categorie->description, ['class' => 'form-control', 'name'=>'description', 'placeholder' => 'Description'])!!}
		        </div>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div><!-- /.col -->
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
