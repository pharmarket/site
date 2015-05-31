@extends('admin.layout.admin')
@section('content')
    <div class="row">
        <div class="col-xs-12">

            <div>
                @include('admin.vente.succes')
            </div>

            <div class="box-header">

            </div><!-- /.box-header -->

            <div class="box-body">
                <table class="datatable table table-bordered table-striped" >
                    <thead>
                    <tr>
                        <th>devise</th>
                        <th>entrepot</th>
                        <th>statut</th>
                        <th>montant</th>

                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>devise</th>
                        <th>entrepot</th>
                        <th>statut</th>
                        <th>montant</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($vente as $row)
                        <tr>
                            <td>{{ $row->devise->nom }}</td>
                            <td>{{ $row->entrepot->nom }}</td>
                            <td>{{ $row->statut }}</td>
                            <td>{{ $row->montant }}</td>

                            <td>
                                <p><a class="btn btn-primary glyphicon glyphicon-edit" href="{{route('admin.vente.edit', $row->id)}}"></a></p>
                            </td>

                            <td>
                                <p><a class="btn btn-info glyphicon glyphicon-zoom-in " href="{{route('admin.vente.show', $row->id)}}"></a></p>
                            </td>

                            <td>
                                <button type="submit" class="btn btn-danger glyphicon glyphicon-trash " data-toggle="modal" data-target="#{{ $row->id }}"></button>
                            </td>
                        </tr>


                        <!-- Modal Confirmation de suppression -->
                        <div class="modal fade" id="{{ $row->id  }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Vente n° {{$row->id}}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Vous êtes sur le point de supprimer définitivement la vente n° {{$row->reference}} </p>
                                    </div>
                                    <div class="modal-footer">
                                        {!! Form::open(array('route' => array('admin.vente.destroy', $row->id), 'method' => 'delete')) !!}
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