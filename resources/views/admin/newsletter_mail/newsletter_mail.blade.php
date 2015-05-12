@extends('admin.layout.admin')
@section('content')
<div class="row">

	<div>
		@if (Session::has('flash_message'))
			<div class="alert alert-success" role="alert">
			   	{!! Session::get('flash_message') !!}
			</div>
		@endif

	</div>

	<div class="col-xs-12">

		    <div class="box-body">
		      	<table class="table table-bordered table-striped" id="select_table">
			        <thead>
			        	<tr>
				            <th>ID</th>
				            <th>Langue</th>
				            <th> Mail </th>
				            <th>Added</th>
				            <th></th>
			          	</tr>
			        </thead>
			        <tfoot>
			        	<tr>
				            <th>ID</th>
				            <th>Langue</th>
				            <th> Mail </th>
				            <th>Added</th>
				            <th></th>
			          	</tr>
			        </tfoot>
			        <tbody>
				        @foreach($newsletter_mail as $row)
				        	<tr>
					            <td>{{ $row->id  }}</td>
					            <td>{{ $row->langue->code}}</td>
					            <td>{{ $row->mail }}</td>
					            <td>{{ $row->created_at }}</td>
					            <td>
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
				                            {!! Form::open(array('route' => array('admin.newsletter_mail.destroy', $row->id), 'method' => 'delete')) !!}
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

@section('footer')
<script type="text/javascript">
	$(function () {
		console.log('test');
		$('#select_table').dataTable({"oLanguage": {
		    "sUrl": "//cdn.datatables.net/plug-ins/1.10.6/i18n/French.json"
		}}).columnFilter({
			aoColumns: [
				null,
			     	{ type: "select", values: [ 'EN', 'FR', 'DE', 'ES']  }
			]
		})
	});
</script>
@stop
