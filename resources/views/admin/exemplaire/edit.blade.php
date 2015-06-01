@extends('admin.layout.admin')
@section('content')

<div class="row">
	<div>
		@include('admin.produit.errors')	
	</div>
</div>

<div class="row">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<h3 style="text-align: center">Ajout d'exemplaire</h3>
	</div><!-- /.col -->
</div>

{!! Form::open(array('method' => 'put', 'url' => route('admin.exemplaire.update', $produit_exemplaire->id))) !!}

<div class="row">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<!-- general form elements -->
		<div class="box box-success">
			<div class="box-body">
				<div class="form-group navInformations">
					{!! Form::label('produit', 'Produit') !!}
		            {!! Form::select('produit', $produit, $produit_exemplaire->produit_id, ['class'=>'form-control']) !!}
				</div>
				<div class="form-group navInformations">
					{!! Form::label('reference', 'Référence') !!}
					{!! Form::input('texte', 'reference', $produit_exemplaire->reference, ['class' => 'form-control', 'name'=>'reference', 'placeholder' => 'Référence']) !!}
				</div>
				<div class="form-group navInformations">
					{!! Form::label('datePeremption', 'Date de peremption') !!}
					{!! Form::input('texte', 'datePeremption', $produit_exemplaire->peremption_at, ['class' => 'form-control', 'name'=>'datePeremption', 'placeholder' => 'Date de peremption']) !!}
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