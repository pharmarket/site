@extends('admin.layout.admin')
@section('content')
    <div class="row">
        <div class="col-xs-12">

            <div>
                @include('admin.fournisseur.succes')
            </div>

            <div class="box-header">

            </div><!-- /.box-header -->

            <div class="box-body">
                <table class="datatable table table-bordered table-striped" >
                    <thead>
                    <tr>
                        <th>siret</th>
                        <th>ville</th>
                        <th>phone</th>
                        <th>commentaire</th>

                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>siret</th>
                        <th>ville</th>
                        <th>phone</th>
                        <th>commentaire</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($fournisseur as $row)
                        <tr>
                            <td>{{ $row->siret }}</td>
                            <td>{{ $row->ville }}</td>
                            <td>{{ $row->phone }}</td>
                            <td>{{ $row->commentaire }}</td>

                            <td>
                                <p><a class="btn btn-primary glyphicon glyphicon-edit" href="{{route('admin.fournisseur.edit', $row->id)}}"></a></p>
                            </td>

                            <td>
                                <p><a class="btn btn-info glyphicon glyphicon-zoom-in " href="{{route('admin.fournisseur.show', $row->id)}}"></a></p>
                            </td>

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
                                        <h4 class="modal-title">Fournisseur n° {{$row->id}}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Vous êtes sur le point de supprimer définitivement le fournisseur n° {{$row->siret}} </p>
                                    </div>
                                    <div class="modal-footer">
                                        {!! Form::open(array('route' => array('admin.fournisseur.destroy', $row->id), 'method' => 'delete')) !!}
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

