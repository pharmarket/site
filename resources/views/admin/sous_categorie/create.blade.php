@extends('admin.layout.admin')

@section('header')
	<!-- DATA TABLES -->
	<link href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')
<div class="row">
	<div>
		@include('admin.sous_categorie.errors')
	</div>
</div>

<div class="row navBlock">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<h3 style="text-align: center">Ajout d'une sous categorie</h3>
	</div><!-- /.col -->
</div>

{!! Form::open(array('route'=>'admin.sous_categorie.store')) !!}
<div class="row">
	<div class="col-md-10 col-md-offset-1 col-xs-12">
		<div class="form-group navInformations">
	        {!! Form::label('categorie', 'Catégorie :') !!}
	        {!! Form::select('categorie', $categorie, '', ['class'=>'form-control']) !!}
	    </div>
	</div>
</div>

<div class="row navTabs">
	<div class="col-md-10 col-md-offset-1 col-xs-12">
		@foreach($langues as $row)
			<div class="col-md-6 col-xs-12">
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
</div>

<div class="row">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<div class="navButton" >
			<button type="submit" class="btn btn-primary">Submit</button>
			<a class="btn btn-danger" title="Previous" alt="Previous" href="{{URL::previous()}}">Cancel</a>
		</div>
	</div><!-- /.col -->
</div><!-- /.row -->
{!!  Form::close() !!}

@stop

