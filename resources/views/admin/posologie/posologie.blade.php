@extends('admin.layout.admin')

@section('header')
	<!-- DATA TABLES -->
	<link href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')
<div class="row">
	<div class="col-xs-12">

	 	<div>
		@include('admin.posologie.succes')	
		</div>

	    <div class="box-header">
	      <h3 class="box-title"><a class="btn btn-info glyphicon glyphicon-pencil" href="{{ URL::to('admin/posologie/create') }}"></a></h3>
	    </div><!-- /.box-header -->

	    <div class="box-body">
	      	<table class="table table-bordered table-striped" id="select_table">
		        <thead>
		          	<tr>
			            <th>ID</th>
			            <th>Produit</th>
			            <th>Type</th>
			            <th>Minimum</th>
			            <th>Maximum</th>
			            <th>Coefficient</th>
			            <th>Added</th>
			            <th>Updated</th>
			            <th></th>
		          	</tr>
		        </thead>
		        <tbody>
		        @foreach($posologie as $row)
		          	<tr>
			            <td>{{ $row->id  }}</td>
			            <td> <a href="#" data-toggle="modal" data-target="#infos{{$row->produit->reference}}{{$row->type}}{{$row->max}}{{$row->min}}">{{ $row->produit->reference }}</a></td>
			            <td>{{ $row->posologie_type->label }}</td>
			            <td>{{ $row->min }}</td>
			            <td>{{ $row->max }}</td>
			            <td>{{ $row->coeff }}</td>
			            <td>{{ $row->created_at }}</td>
			            <td>{{ $row->updated_at }}</td>
			            <td>
                            <a class="btn btn-primary glyphicon glyphicon-edit" href="{{route('admin.posologie.edit', $row->id)}}"></a>
						    <button type="submit" class="btn btn-danger glyphicon glyphicon-trash " data-toggle="modal" data-target="#suppression{{$row->produit->reference}}{{$row->type}}{{$row->max}}{{$row->min}}"></button>
						</td>
		          	</tr>

		          	<!-- Modal Confirmation de suppression -->
		            <div class="modal fade" id="suppression{{$row->produit->reference}}{{$row->type}}{{$row->max}}{{$row->min}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		                <div class="modal-dialog">
		                    <div class="modal-content">
		                        <div class="modal-header">
		                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                            <h4 class="modal-title">Posologie n° {{$row->id}}</h4>
		                        </div>
		                        <div class="modal-body">
		                            <p>Vous êtes sur le point de supprimer définitivement la posologie n° {{$row->id}} </p>
		                        </div>
		                        <div class="modal-footer">
		                            {!! Form::open(array('route' => array('admin.posologie.destroy', $row->id), 'method' => 'delete')) !!}
		                                <button type="submit" class="btn btn-danger glyphicon glyphicon-trash "></button>
		                            {!!  Form::close() !!}
		                        </div>
		                    </div>
		                </div>
		            </div>
		            <!-- Fin Modal -->

		            <!-- Modal Infos Produit -->
					<div class="modal fade" id="infos{{$row->produit->reference}}{{$row->type}}{{$row->max}}{{$row->min}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
						    <div class="modal-content">
							    <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h4 class="modal-title" id="myModalLabel">Produit n°{{ $row->produit->id }}</h4>
							    </div>
							    <div class="modal-body">
							    	<div class="row">
							      		<div class="col-md-6" style="text-align: right">Référence :</div>
							      		<div class="col-md-6">{{ $row->produit->reference }}</div>
							      	</div>
							    	<div class="row">
							      		<div class="col-md-6" style="text-align: right">Nom :</div>
							      		<div class="col-md-6">{{ $row->produit->info[0]->nom }}</div>
							      	</div>
							      	<div class="row">
							      		<div class="col-md-6" style="text-align: right">Description :</div>
							      		<div class="col-md-6">{{ $row->produit->info[0]->description }}</div>
							      	</div>
							      	<div class="row">
							      		<div class="col-md-6" style="text-align: right">Marque :</div>
							      		<div class="col-md-6">{{ $row->produit->marque->nom }}</div>
							      	</div>
							      	<div class="row">
							      		<div class="col-md-6" style="text-align: right">Catégorie :</div>
							      		<div class="col-md-6">{{ $row->produit->categorie->nom }}</div>
							      	</div>
							      	<div class="row">
							      		<div class="col-md-12" style="text-align: center;  margin-top: 25px">{!! HTML::image($row->produit->media[0]->chemin . $row->produit->media[0]->nom, '', array('height'=>'120', 'width'=>'120')) !!}</div>
							      	</div>
							    </div>
							    <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							    </div>
							</div>
						</div>
					</div>
		          @endforeach
		        </tbody>
	      	</table>
	    </div><!-- /.box-body -->
	  </div><!-- /.box -->
	</div><!-- /.col -->
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

	<script type="text/javascript">
	$(function () {
		console.log('test');
		$('#select_table').dataTable({"oLanguage": {
		    "sUrl": "//cdn.datatables.net/plug-ins/1.10.6/i18n/French.json"
		}}).columnFilter({
			aoColumns: [
				null
			]
		})
	});
</script>
@stop

