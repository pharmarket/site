@extends('admin.layout.admin')

@section('header')
	<!-- DATA TABLES -->
	<link href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')
<section class="content-header">
	<h1>
		Produit
		<small>Posologie - affichage</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ ucfirst(route('accueil')) }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Produit</li>
	</ol>
</section>

			<!-- Main content -->
<section class="content">


<div class="row">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<h3 style="text-align: center">Détails de la posologie n°{{ $posologie->id  }}</h3>
	</div><!-- /.col -->
</div>

<div class="row">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<div class="box box-success">
		    <div class="box-header">
		      	<h3 class="box-title">Informations générales</h3>
		    </div>
		    <div class="box-body">
		      	<div class="row">
		      		<div class="col-md-3" style="text-align: right">Id :</div>
		      		<div class="col-md-9">{{ $posologie->id  }}</div>
		      	</div>
		      	<div class="row">
		      		<div class="col-md-3" style="text-align: right">Produit :</div>
		      		<div class="col-md-9">{{ $posologie->produit->reference }}</div>
		      	</div>
		      	<div class="row">
		      		<div class="col-md-3" style="text-align: right">Type :</div>
		      		<div class="col-md-9">{{ $posologie->posologie_type->label }}</div>
		      	</div>
		      	<div class="row">
		      		<div class="col-md-3" style="text-align: right">Min :</div>
		      		<div class="col-md-9">{{ $posologie->min }}</div>
		      	</div>
		      	<div class="row">
		      		<div class="col-md-3" style="text-align: right">Max :</div>
		      		<div class="col-md-9">{{ $posologie->max }}</div>
		      	</div>
		    </div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
</div>

<div class="row">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<div class="box box-success">
		    <div class="box-header">
		      	<h3 class="box-title">Informations générales</h3>
		    </div>
		    <div class="box-body">
		      	<div class="row">
		      		<div class="col-md-3" style="text-align: right">Id :</div>
		      		<div class="col-md-9">{{ $posologie->id  }}</div>
		      	</div>

		    </div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
</div>

</div><!-- /.row -->
</section>
@stop
@section('footer')
	<!-- DATA TABES SCRIPT -->
	<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
	<script src="{{ asset('plugins/datatables/dataTables.bootstrap.js') }}" type="text/javascript"></script>
	<!-- SlimScroll -->
	<script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
	<!-- FastClick -->
	<script src="{{ asset('plugins/fastclick/fastclick.min.js') }}"></script>
@stop
