@extends('admin.layout.admin')

@section('header')
	<!-- DATA TABLES -->
	<link href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')

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

<div class="row navTabs">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<!-- general form elements -->
		<div class="box box-success">
			<div class="box-body">
				<div class="form-group">
					{!! Form::label('langue', 'Langue') !!}
					{!! Form::select('langue_id', $langues, '', ['class'=>'form-control']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('nom', 'Nom') !!}
					{!! Form::text('nom', '', array('class'=>'form-control', 'name'=>'nom', 'placeholder' => 'Nom')) !!}
				</div>
				<div class="form-group">
					{!! Form::label('description', 'Description') !!}
					{!! Form::textarea('description', '', array('class'=>'form-control', 'name'=>'description', 'placeholder' => 'Description')) !!}
				</div>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div><!-- /.col -->
</div><!-- /.row -->

<div class="row">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<div style="text-align: center" >
			<button type="submit" class="btn btn-primary">Submit</button>
			<a class="btn btn-danger" title="Previous" alt="Previous" href="{{URL::previous()}}">Cancel</a>
		</div>
	</div><!-- /.col -->
</div><!-- /.row -->
{!!  Form::close() !!}

@stop

