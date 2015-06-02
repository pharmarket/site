@extends('admin.layout.admin')

@section('content')
<div class="row">
	@include('admin.produit.succes')
</div>

<div class="row">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<h3 style="text-align: center">Listing des produits</h3>
	</div><!-- /.col -->
</div>

<div class="row">
	<div class="col-md-12 col-xs-12">
	    <div class="box-header"></div><!-- /.box-header -->

	    <div class="box-body">
	      	<table class="datatable table table-bordered table-striped">
		        <thead>
		          	<tr>
			            <!-- <th>ID</th> -->
			            <th>Référence</th>
			            <th>Nom</th>
			            <!-- <th>Image</th> -->
			            <th>Marque</th>
			            <th>Catégorie / Sous catégorie</th>
			            <th>Prix(€)</th>
			            <!-- <th>Added</th> -->
			            <!-- <th>Updated</th> -->
			            <th></th>
		          	</tr>
		        </thead>
		        <tfoot>
		        	<tr>
			            <!-- <th>ID</th> -->
			            <th>Référence</th>
			            <th>Nom</th>
			            <!-- <th>Image</th> -->
			            <th>Marque</th>
			            <th>Catégorie / Sous catégorie</th>
			            <th>Prix(€)</th>
			            <!-- <th>Added</th> -->
			            <!-- <th>Updated</th> -->
			        </tr>
		        </tfoot>
		        <tbody>
		        @foreach($produit as $row)
		          	<tr>
			            <td><a href="{{ route('admin.produit.show', $row->id) }}">{{ $row->reference }}</a></td>
			            <td>
			            	@foreach ($row->info as $value)
				            	@if($value->langue_id==1)
				            		{{$value->nom}}
			            		@endif
			            	@endforeach
			            </td>
			            <td>{{ $row->marque->nom }}</td>
			            <td>{{ $row->categorie->nom }} / {{ $row->sous_categorie->nom}}</td>
			            <td>{{ $row->montant }}</td>
			            <td>
                            <a class="btn btn-primary glyphicon glyphicon-edit" href="{{route('admin.produit.edit', $row->id)}}"></a>
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
		                            <p>Vous êtes sur le point de supprimer définitivement le produit n° {{$row->id}} </p>
		                        </div>
		                        <div class="modal-footer">
		                            {!! Form::open(array('route' => array('admin.produit.destroy', $row->id), 'method' => 'delete')) !!}
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
	  </div><!-- /.box -->
	</div><!-- /.col -->
</div><!-- /.row -->
@stop

