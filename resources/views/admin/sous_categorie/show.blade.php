@extends('admin.layout.admin')
@section('content')

<div class="row navBlock">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<h3 style="text-align: center">Détails de la sous-catégorie n° {{ $sous_categorie->id }}</h3>
	</div><!-- /.col -->
</div>

<div class="row navTabs">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<div class="box box-success">
		    <div class="box-header"></div>
		    <div class="box-body">
		      	<div class="row">
		      		<div class="col-md-4" style="text-align: right">Id :</div>
		      		<div class="col-md-8">{{ $sous_categorie->id }}</div>
		      	</div>
		      	<div class="row">
		      		<div class="col-md-4" style="text-align: right">Langue :</div>
		      		<div class="col-md-8">{{ $sous_categorie->langue->code }}</div>
		      	</div>
		      	<div class="row">
		      		<div class="col-md-4" style="text-align: right">Nom :</div>
		      		<div class="col-md-8">{!! $sous_categorie->nom !!}</div>
		      	</div>
		      	<div class="row">
		      		<div class="col-md-4" style="text-align: right">Description :</div>
		      		<div class="col-md-8">{!! $sous_categorie->description !!}</div>
		      	</div>
		      	<div class="row">
		      		<div class="col-md-4" style="text-align: right">Date de creation :</div>
		      		<div class="col-md-8">{{ $sous_categorie->created_at }}</div>
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
@stop



