@extends('admin.layout.admin')
@section('content')
<div class="row navBlock">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<h3 style="text-align: center">Détails de la Newsletter n° {{ $newsletter->id }}</h3>
	</div><!-- /.col -->
</div>

<div class="row navTabs">
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
		      		<div class="col-md-8">{!! $newsletter->content !!}</div>
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

<div class="row">
	<div class="col-md-12 navButton">
		<a class="btn btn-primary" title="Previous" alt="Previous" href="{{URL::previous()}}">Previous</a>
	</div>
</div>


</div><!-- /.row -->
@stop



