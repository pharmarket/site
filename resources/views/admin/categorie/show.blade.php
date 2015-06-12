@extends('admin.layout.admin')
@section('content')
<section class="content-header">
	<h1>
		Produit
		<small>Categorie - Affichage</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ ucfirst(route('accueil')) }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Produit</li>
	</ol>
</section>

			<!-- Main content -->
<section class="content">
<div class="row navBlock">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<h3 style="text-align: center">Détails de la catégorie n° {{ $categorie->id }}</h3>
	</div><!-- /.col -->
</div>

<div class="row navTabs">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<div class="box box-success">
		    <div class="box-header"></div>
		    <div class="box-body">
		      	<div class="row">
		      		<div class="col-md-4" style="text-align: right">Id :</div>
		      		<div class="col-md-8">{{ $categorie->id }}</div>
		      	</div>
		      	<div class="row">
		      		<div class="col-md-4" style="text-align: right">Langue :</div>
		      		<div class="col-md-8">{{ $categorie->langue->code }}</div>
		      	</div>
		      	<div class="row">
		      		<div class="col-md-4" style="text-align: right">Nom :</div>
		      		<div class="col-md-8">{!! $categorie->nom !!}</div>
		      	</div>
		      	<div class="row">
		      		<div class="col-md-4" style="text-align: right">Description :</div>
		      		<div class="col-md-8">{!! $categorie->description !!}</div>
		      	</div>
		      	<div class="row">
		      		<div class="col-md-4" style="text-align: right">Date de creation :</div>
		      		<div class="col-md-8">{{ $categorie->created_at }}</div>
		      	</div>
		    </div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
</div>

<div class="row">
	<div class="col-md-12 navButton">
		<a class="btn btn-primary" title="Previous" alt="Previous" href="{{URL::previous()}}">Previous</a>
	</div>
</div>


</div><!-- /.row -->
</section>
@stop
