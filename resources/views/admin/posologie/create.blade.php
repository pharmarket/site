@extends('admin.layout.admin')

@section('header')
	<!-- DATA TABLES -->
	<link href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')

<div class="row">
	<div>
		@include('admin.posologie.errors')	
	</div>
</div>

<div class="row">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<h3 style="text-align: center">Ajout d'une posologie</h3>
	</div><!-- /.col -->
</div>

{!! Form::open(array('route'=>'admin.posologie.store')) !!}

<div class="row">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<!-- general form elements -->
		<div class="box box-success">
			<div class="box-header">
		      	<h3 class="box-title">Informations générales</h3>
		    </div>
			<!-- form start -->			
			<div class="box-body">
                <div class="form-group">
                    {!! Form::label('produit', 'Produit :') !!}
                    {!! Form::select('produit', $produits, '', ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('type', 'Type :') !!}
                    {!! Form::select('type', $types, '', ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('min', 'Minimum :') !!}
                    {!!Form::input('min', 'min', null, ['class' => 'form-control', 'name'=>'min', 'placeholder' => 'Minimum'])!!}  
                </div>
                <div class="form-group">
                    {!! Form::label('max', 'Maximum :') !!}
                    {!!Form::input('max', 'max', null, ['class' => 'form-control', 'name'=>'max', 'placeholder' => 'Maximum'])!!} 
                </div>
                <div class="form-group">
                    {!! Form::label('coeff', 'Coefficient :') !!}
                    {!!Form::input('coeff', 'coeff', null, ['class' => 'form-control', 'name'=>'coeff', 'placeholder' => 'Coefficient'])!!}   
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