@extends('admin.layout.admin')

@section('content')
<div class="row">
	<div class="col-xs-12">
	    <div class="box-body">
	      <table class="table table-bordered table-striped"  id="contact-table">
	        <thead>
	          <tr>
	            <th>ID</th>
	            <th>Message</th>
	            <th> Mail </th>
	            <th>Phone</th>
	            <th>Done</th>
	            <th>Langue</th>
	            <th>added</th>
	            <th style="width:70px;"></th>
	          </tr>
	        </thead>
	        <tfoot>>
	          <tr>
	            <th>ID</th>
	            <th>Message</th>
	            <th> Mail </th>
	            <th>Phone</th>
	            <th>Done</th>
	            <th>Langue</th>
	            <th>added</th>
	            <th style="width:70px;"></th>
	          </tr>
	        </tfoot>
	        <tbody>
	        @foreach($contact as $row)
	          <tr>
	            <td>{{ $row->id  }}</td>
	            <td>{{ $row->message  }}</td>
	            <td>{{ $row->mail  }}</td>
	            <td>{{ $row->phone  }}</td>
	            <td>{{ $row->done  }}</td>
	            <td>{{ $row->langue->code  }}</td>
	            <td>{{ $row->created_at  }}</td>
	            <td>
			<a href="" data-toggle="modal" data-target="#myModal"><i class="fa fa-envelope"></i></a>

	            	{!! Form::open(array('route' => array('admin.contact.destroy', $row->id), 'method' => 'delete', 'style' => 'display:inline;')) !!}
				<button style="border:none;display:inline;background: none;" type="submit" ><i class="fa fa-trash-o"></i></button>
			{!!  Form::close() !!}
	            	@if(empty($row->done))
				<a href="{{ route('admin.contact.done', $row->id) }}"><i class="fa fa-check-circle-o"></i></a>
			@endif
	          </tr>
	          @endforeach

	        </tbody>
	      </table>
	    </div><!-- /.box-body -->
	  </div><!-- /.box -->
	</div><!-- /.col -->
</div><!-- /.row -->


            <div class="modal" id="myModal">
		{!! Form::open(array('route' => array('admin.contact.mail', $row->id), 'method' => 'post', 'style' => 'display:inline;')) !!}
              	<div class="modal-dialog">
                		<div class="modal-content">
                  			<div class="modal-header">
                    				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                				<h4 class="modal-title">Modal Default</h4>
                  			</div>
				<div class="modal-body">
					<?php echo Form::textarea('content', '', ['class' => 'form-control', 'placeholder' => 'Votre message']); ?>
				</div>
                  			<div class="modal-footer">
                    				<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    				<?php echo Form::submit('Envoyer', ['class' => 'btn btn-primary', 'name' => 'send']); ?>
                    				<?php echo Form::submit('Envoyer et Traiter', ['class' => 'btn btn-primary', 'name'  => 'done']); ?>
                  			</div>
                		</div><!-- /.modal-content -->
              	</div><!-- /.modal-dialog -->
		{!!  Form::close() !!}
            </div><!-- /.modal -->
@stop

@section('footer')
<script type="text/javascript">
$(function () {
  $('#contact-table').dataTable({"oLanguage": {
    "sUrl": "//cdn.datatables.net/plug-ins/1.10.6/i18n/French.json"
  }})
      .columnFilter({
      aoColumns: [ null,
             null,
             null,
             null,
             null,
             { type: "select", values: [ 'EN', 'FR']  }
        ]

    })
});
</script>
@stop
