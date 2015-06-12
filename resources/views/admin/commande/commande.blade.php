@extends('admin.layout.admin')

@section('content')
<section class="content-header">
	<h1>
		Commande
		<small>Liste</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ ucfirst(route('accueil')) }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Commande</li>
	</ol>
</section>

			<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div>
                @include('admin.commande.succes')
            </div>

            <div class="box-header">

            </div><!-- /.box-header -->

            <div class="box-body">
                <table class="datatable table table-bordered table-striped" >
                    <thead>
                    <tr>
                        <th>Devise</th>
                        <th>Reference</th>
                        <th>Statut</th>
                        <th>Lvreur</th>


                        <th></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>devise</th>
                        <th>reference</th>
                        <th>statut</th>
                        <th>livreur</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($commande as $row)
                        <tr>
                            <td>{{ $row->devise->nom }}</td>
                            <td>{{ $row->reference }}</td>
                            <td>
                                <select data-commande="{{$row->id}}" class="select_statut" class="form-control" name="statut">
                                        @foreach($statut as $id => $label)
                                            <option value="{{$id}}" {{ ($row->statut_id == $id) ? 'selected' : ''}}>{{$label}}</option>
                                        @endforeach
                                </select>
                            </td>
                            <td>{{ $row->livreur->nom }}</td>

                            <td>
                                <a class="btn btn-info glyphicon glyphicon-zoom-in" href="{{route('admin.commande.show', $row->id)}}"></a>
                                <button style="border:none;display:inline;" type="submit" class="btn btn-danger glyphicon glyphicon-trash " data-toggle="modal" data-target="#{{ $row->id  }}"></button>
                            </td>
                        </tr>

                        <!-- Modal Confirmation de suppression -->
                        <div class="modal fade" id="{{ $row->id  }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Commande n° {{$row->id}}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Vous êtes sur le point de supprimer définitivement la commande n° {{$row->id}} </p>
                                    </div>
                                    <div class="modal-footer">
                                        {!! Form::open(array('route' => array('admin.commande.destroy', $row->id), 'method' => 'delete')) !!}
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
  </section>
@stop

@section('footer')
<script type="text/javascript">
	$(".select_statut").change(function () {
		$statut = $( this ).find(":selected").val();
		$commande = $(this).data('commande');
		$.post( "{{route('commande.statut.edit')}}",  { statut: $statut, commande: $commande } )
			.done(function( data ) {
				alert( "Mise à jour réussie");
			}
		);
	});
</script>
@stop
