@extends('admin.layout.admin')

@section('header')

@stop

@section('content')
<section class="content-header">
	<h1>
		Produit
		<small>Creation</small>
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
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<h3 style="text-align: center">Ajout d'un produit</h3>
	</div><!-- /.col -->
</div>

{!! Form::open(array('route'=>'admin.produit.store', 'enctype' => 'multipart/form-data', 'files' => true, 'class' => 'dropzone')) !!}

<div class="row">
	<div class="col-md-10 col-md-offset-1 col-xs-12">
        <div class="panel with-nav-tabs panel-primary" style="min-height: 350px">
        	<!-- Nav tabs -->
            <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li  class="active"><a href="#infosGenerales" data-toggle="tab">Informations</a></li>
					    <li><a href="#descriptionMultilangues" data-toggle="tab">Descriptions multi-langues</a></li>
                    </ul>
            </div>

            <div class="panel-body">
                <div class="tab-content">
                	<!-- Tab panes Informations générales -->
                    <div class="tab-pane fade in active" id="infosGenerales">
                    	<div class="form-group navInformations">
		                	{!! Form::label('reference', 'Référence :') !!}
		                    {!!Form::input('texte', 'reference', null, ['class' => 'form-control', 'name'=>'reference', 'placeholder' => 'Référence'])!!}
		                </div>
		                <div class="form-group navInformations">
		                    {!! Form::label('marque', 'Marque :') !!}
		                    {!! Form::select('marque', $marques, '', ['class'=>'form-control']) !!}
		                </div>
		                <div class="form-group navInformations">
	                		{!! Form::label('categorie', 'Catégorie :') !!}
	                    	{!! Form::select('categorie', $categories, '', ['class'=>'form-control']) !!}
		                </div>
		                <div class="form-group navInformations">
                			{!! Form::label('sousCategorie', 'Sous catégorie :') !!}
                    		{!! Form::select('sousCategorie', $sousCategories, '', ['class'=>'form-control']) !!}
		                </div>
		                <div class="form-group navInformations">
		                    {!! Form::label('notice', 'Notice:') !!}
		                    {!! Form::file('notice', ['class'=>'form-control']) !!}
		                </div>
		                <div class="form-group navInformations">
		                    {!! Form::label('fournisseur', 'Fournisseur :') !!}
		                    {!! Form::select('fournisseur', $fournisseurs, '', ['multiple' => 'multiple', 'class'=>'form-control', 'name'=>'fournisseur[]']) !!}
		                </div>
		                <div class="form-group navInformations">
		                	{!! Form::label('montant', 'Prix (euros) :') !!}
		                    {!! Form::input('texte', 'montant', null, ['class' => 'form-control', 'name'=>'montant', 'placeholder' => 'Montant'])!!}
		                </div>
                    </div>

                    <!-- Tab panes Description Multilangues -->
                    <div class="tab-pane fade" id="descriptionMultilangues">
                    	@foreach ($langues as $row)
                    	<div class="col-md-6">
                    		<div class="row">
					            <div class="col-md-12"><h4 class="navTitle">{{ $row->label}}</h4></div>
					        </div>
                    		<div class="form-group">
			                	{!! Form::label('nom_'.$row->id, 'Nom :') !!}
			                    {!! Form::input('nom_'.$row->id, 'nom_'.$row->id, null, ['class' => 'form-control', 'placeholder' => $row->label]) !!}
			                </div>
			                <div class="form-group">
			                	{!! Form::label('description_'.$row->id, 'Description :') !!}
			                    {!! Form::textarea('description_'.$row->id, null, ['class' => 'form-control', 'placeholder' => $row->label]) !!}
			                </div>
                    	</div>
                    	@endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<div class="navButton">
			<button type="submit" class="btn btn-primary">Submit</button>
			<a class="btn btn-danger" title="Previous" alt="Previous" href="{{URL::previous()}}">Cancel</a>
		</div>
	</div><!-- /.col -->
</div><!-- /.row -->
{!!  Form::close() !!}
</section>
@stop
