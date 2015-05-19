@extends('admin.layout.admin')

@section('header')
	<!-- DATA TABLES -->
	<link href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<h3 style="text-align: center">Détails de la Newsletter n° {{ $newsletter->id }}</h3>
	</div><!-- /.col -->
</div>

<div class="row">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<div class="box box-success">
		    <div class="box-header"></div>
		    <div class="box-body">
		      	<div class="row">
		      		<div class="col-md-4" style="text-align: right">Id :</div>
		      		<div class="col-md-8">{{ $newsletter->id }}</div>
		      	</div>
		      	<div class="row">
		      		<div class="col-md-4" style="text-align: right">Langue :</div>
		      		<div class="col-md-8">{{ $newsletter->langue->code }}</div>
		      	</div>
		      	<div class="row">
		      		<div class="col-md-4" style="text-align: right">Contenu :</div>
		      		<div class="col-md-8">{{ $newsletter->content }}</div>
		      	</div>
		      	<div class="row">
		      		<div class="col-md-4" style="text-align: right">Date de creation :</div>
		      		<div class="col-md-8">{{ $newsletter->created_at }}</div>
		      	</div>
		      	<div class="row">
		      		<div class="col-md-4" style="text-align: right">Date de mise à jour :</div>
		      		<div class="col-md-8">{{ $newsletter->updated_at }}</div>
		      	</div>
		      	<div class="row">
		      		<div class="col-md-4" style="text-align: right">Date d'envois :</div>
		      		<div class="col-md-8">{{ $newsletter->sended_at }}</div>
		      	</div>
		    </div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
</div>

</div><!-- /.row -->
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



