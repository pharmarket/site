@extends('admin.layout.admin')
@section('content')

<div class="row">
	<div>
		@include('admin.produit.errors')
	</div>
</div>

<div class="row">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<h3 style="text-align: center">Ajout d'un exemplaire</h3>
	</div><!-- /.col -->
</div>

{!! Form::open(array('route'=>'admin.exemplaire.store')) !!}

<div class="row">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<!-- general form elements -->
		<div class="box box-success">
			<div class="box-body">
		                    <div class="form-group navInformations">
		                        {!! Form::label('vente_id', 'Achat :') !!}
		                        {!! Form::select('vente_id', $vente, '', ['class'=>'form-control']) !!}
		                    </div>
				<div class="form-group navInformations">
					{!! Form::label('idProduit', 'Id du produit') !!}
					{!! Form::select('idProduit', $produit, null, ['class' => 'form-control', 'name'=>'idProduit', 'placeholder' => 'Id']) !!}
				</div>
				<div class="form-group navInformations">
					{!! Form::label('reference', 'Reference') !!}
					{!! Form::input('texte', 'reference', null, ['class' => 'form-control', 'name'=>'reference', 'placeholder' => 'Référence']) !!}
				</div>
				<div class="form-group navInformations">
	      			{!! Form::label('datePeremption', 'Date de peremption :') !!}
	      			{!!Form::input('date', 'datePeremption', null, ['class' => 'form-control', 'name'=>'datePeremption', 'placeholder' => 'Date de peremption'])!!}
	      			</div>

		                    <div class="form-group navInformations">
		                        {!! Form::label('montant', 'montant :') !!}
		                        {!! Form::text('montant', '', array('class'=>'form-control', 'name'=>'montant', 'placeholder' => 'montant :')) !!}
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
