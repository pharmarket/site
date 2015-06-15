@extends('admin.layout.admin')
@section('content')

<div class="row">
	@include('admin.sous_categorie.succes')
</div>

<div class="row navBlock">
	<h3 style="text-align: center">Listing des sous-catégories</h3>
</div>

<div class="row navTabs">
	<div class="col-xs-12">
		    <div class="box-body">
		      	<table class="datatable table table-bordered table-striped">
			        <thead>
			        	<tr>
				            <th>ID</th>
				            <th>Langue / Catégorie</th>
				            <th>Nom </th>
				            <th>Description</th>
				            <th>Added </th>
				            <th></th>
			          	</tr>
			        </thead>
			        <tfoot>
			        	<tr>
				            <th>ID</th>
				            <th>Langue / Catégorie</th>
				            <th>Nom </th>
				            <th>Description</th>
				            <th>Added </th>
			          	</tr>
			        </tfoot>
			        <tbody>
				        @foreach($sous_categorie as $row)
				        	<tr>
					            <td><a href="{{ route('admin.sous_categorie.show', $row->id) }}">{{ $row->id }}</a></td>
					            <td>{{ $row->langue->code}} / {{ $row->categorie->nom }}</td>
					            <td style="width: 125px">{{ $row->nom }}</td>
					            <td>{!! mb_strimwidth($row->description, 0, 50, "...") !!}</td>
					            <td style="width: 125px">{{ $row->created_at }}</td>
					            <td style="text-align: right; width: 100px">
					            	<a class="btn btn-primary glyphicon glyphicon-edit" href="{{route('admin.sous_categorie.edit', $row->id)}}"></a>
				                    <button type="submit" class="btn btn-danger glyphicon glyphicon-trash " data-toggle="modal" data-target="#{{ $row->id  }}"></button>
				                </td>
				          	</tr>

				          	<!-- Modal Confirmation de suppression -->
			            	<div class="modal fade" id="{{ $row->id  }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				                <div class="modal-dialog">
				                    <div class="modal-content">
				                        <div class="modal-header">
				                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				                            <h4 class="modal-title">Sous-catégorie n° {{$row->id}}</h4>
				                        </div>
				                        <div class="modal-body">
				                            <p>Vous êtes sur le point de supprimer définitivement la sous-catégorie n° {{$row->id}} </p>
				                        </div>
				                        <div class="modal-footer">
				                            {!! Form::open(array('route' => array('admin.sous_categorie.destroy', $row->id), 'method' => 'delete')) !!}
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
