@extends('admin.layout.admin')

@section('header')
	<!-- DATA TABLES -->
	<link href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')
<section class="content-header">
	<h1>
		Produit
		<small>Exemplaire Listes</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ ucfirst(route('accueil')) }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Produit</li>
	</ol>
</section>

			<!-- Main content -->
<section class="content">
<div class="row">
	@include('admin.produit.succes')
</div>

<div class="row">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<h3 style="text-align: center">Listing des exemplaires du produit n° {{$exemplaires[0]->produit_id}}</h3>
	</div>
</div>

<div class="row">
	<div class="col-md-12 col-xs-12">
	    <div class="box-header"></div><!-- /.box-header -->

	    <div class="box-body">
	      	<table class="datatable table table-bordered table-striped" >
		        <thead>
		          	<tr>
			            <th>ID</th>
			            <th>Reference</th>
			            <th>Date de peremption</th>
			            <th>Added</th>
			            <th>Updated</th>
			            <th></th>
		          	</tr>
		        </thead>
		        <tbody>
		        @foreach($exemplaires as $row)
		          	<tr>
		          		<td>{{ $row->id }}</td>
			            <td>{{ $row->reference }}</td>
			            <td>{{ $row->peremption_at }}</td>
			            <td>{{ $row->created_at }}</td>
			            <td>{{ $row->updated_at }}</td>
			            <td>
			            	<a class="btn btn-primary glyphicon glyphicon-edit" href="{{route('admin.exemplaire.edit', $row->id)}}"></a>
                            <button type="submit" class="btn btn-danger glyphicon glyphicon-trash " data-toggle="modal" data-target="#{{ $row->id  }}"></button>
                        </td>

		          	</tr>

		          	<!-- Modal Confirmation de suppression -->
		            	<div class="modal fade" id="{{ $row->id  }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			                <div class="modal-dialog">
			                    <div class="modal-content">
			                        <div class="modal-header">
			                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			                            <h4 class="modal-title">Produit n° {{$row->id}}</h4>
			                        </div>
			                        <div class="modal-body">
			                            <p>Vous êtes sur le point de supprimer définitivement l'exemplaire n° {{$row->id}} </p>
			                        </div>
			                        <div class="modal-footer">
			                            {!! Form::open(array('route' => array('admin.exemplaire.destroy', $row->id), 'method' => 'delete')) !!}
			                                <button type="submit" class="btn btn-danger glyphicon glyphicon-trash "></button>
			                            {!!  Form::close() !!}
			                        </div>
			                    </div>
			                </div>
		            	</div><!-- Fin Modal -->
		          @endforeach
		        </tbody>
	      	</table>
	    </div><!-- /.box-body -->
	</div><!-- /.col -->
</div><!-- /.row -->

<div class="row">
	<div class="col-md-12" style="text-align: center">
		<a class="btn btn-primary" title="Previous" alt="Previous" href="{{URL::to('admin/exemplaire')}}">Previous</a>
	</div>
</div>
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
