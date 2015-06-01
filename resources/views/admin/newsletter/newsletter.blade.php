@extends('admin.layout.admin')
@section('content')

<div class="row">
	@include('admin.newsletter.succes')
</div>

<div class="row navBlock">
	<h3 style="text-align: center">Listing des newsletters</h3>
</div>

<div class="row navTabs">
	<div class="col-xs-12">
		    <div class="box-body">
		      	<table class="datatable table table-bordered table-striped">
			        <thead>
			        	<tr>
				            <th>ID</th>
				            <th>Langue</th>
				            <th>Titre </th>
				            <th>Contenu </th>
				            <th>Envoie </th>
				            <th>Ajout</th>
				            <th></th>
			          	</tr>
			        </thead>
			        <tfoot>
			        	<tr>
				            <th>ID</th>
				            <th>Langue</th>
				            <th>Titre </th>
				            <th>Contenu </th>
				            <th>Envoie </th>
				            <th>Ajout</th>
			          	</tr>
			        </tfoot>
			        <tbody>
				        @foreach($newsletter as $row)
				        	<tr>
					            <td><a href="{{ route('admin.newsletter.show', $row->id) }}">{{ $row->id }}</a></td>
					            <td>{{ $row->langue->code}}</td>
					            <td style="width: 125px">{{ $row->title }}</td>
					            <td>{!! mb_strimwidth($row->content, 0, 50, "...") !!}</td>
					            <td style="width: 125px">{{ $row->send_at }}</td>
					            <td style="width: 125px">{{ $row->created_at }}</td>
					            <td style="text-align: right; width: 100px">
					            	<a class="btn btn-primary glyphicon glyphicon-edit" href="{{route('admin.newsletter.edit', $row->id)}}"></a>
				                    <button type="submit" class="btn btn-danger glyphicon glyphicon-trash " data-toggle="modal" data-target="#{{ $row->id  }}"></button>
				                </td>
				          	</tr>

				          	<!-- Modal Confirmation de suppression -->
			            	<div class="modal fade" id="{{ $row->id  }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				                <div class="modal-dialog">
				                    <div class="modal-content">
				                        <div class="modal-header">
				                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				                            <h4 class="modal-title">Newsletter n° {{$row->id}}</h4>
				                        </div>
				                        <div class="modal-body">
				                            <p>Vous êtes sur le point de supprimer définitivement la newsletter n° {{$row->id}} </p>
				                        </div>
				                        <div class="modal-footer">
				                            {!! Form::open(array('route' => array('admin.newsletter.destroy', $row->id), 'method' => 'delete')) !!}
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
