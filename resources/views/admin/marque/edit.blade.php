@extends('admin.layout.admin')
@section('content')

{!! Form::open(array('route' => array('admin.marque.update', $marque->id), 'method' => 'put')) !!}

<div class="row">
	<div>
		@include('admin.marque.errors')
	</div>
</div><!-- /.row -->

<div class="row navBlock">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<h3 style="text-align: center">Mise à jour de la Marque n°{{$marque->id}}</h3>
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
					{!! Form::label('nom', 'Nom :') !!}
					{!! Form::text('nom', $marque->nom, ['class' => 'form-control', 'name'=>'nom', 'placeholder' => 'Nom']) !!}
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