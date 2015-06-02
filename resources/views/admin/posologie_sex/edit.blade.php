@extends('admin.layout.admin')

@section('header')
	<!-- DATA TABLES -->
	<link href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')

<div class="row">
	<div>
		@include('admin.posologie_sex.errors')	
	</div>
</div>

<div class="row">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<h3 style="text-align: center">Mise à jour d'une posologie sexe</h3>
	</div><!-- /.col -->
</div>

{!! Form::open(array('route' => array('admin.posologie_sex.update', $posologie_sexe), 'method' => 'put')) !!}

<div class="row">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<!-- general form elements -->
		<div class="box box-success">
			<div class="box-header"></div>
			<!-- form start -->			
			<div class="box-body">
                <div class="form-group navInformations">
                    {!! Form::label('produit', 'Produit :') !!}
                    {!! Form::select('produit', $produits, $posologie_sexe->produit_id, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group navInformations">
		            {!! Form::label('sexe', 'Sexe :') !!}
		            {!! Form::select('sexe', ['H' =>'H', 'F' => 'F'], $posologie_sexe->sexe,['class'=>'form-control']) !!}
		        </div>
		        <div class="form-group navInformations">
                    {!! Form::label('coeff', 'Coefficient :') !!}
                    {!!Form::input('coeff', 'coeff', $posologie_sexe->coeff, ['class' => 'form-control', 'name'=>'coeff', 'placeholder' => 'coefficient'])!!}  
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
@section('footer')
	<!-- DATA TABES SCRIPT -->
	<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
	<script src="{{ asset('plugins/datatables/dataTables.bootstrap.js') }}" type="text/javascript"></script>
	<!-- SlimScroll -->
	<script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
	<!-- FastClick -->
	<script src="{{ asset('plugins/fastclick/fastclick.min.js') }}"></script>
@stop