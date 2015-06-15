@extends('admin.layout.admin')

@section('content')
    <div class="row">
        <div class="col-xs-12">

            <div>
                @include('admin.commentaire.succes')
            </div>

            <div class="box-header">

            </div><!-- /.box-header -->

            <div class="box-body">
                <table class="datatable table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>user</th>
                        <th>produit</th>
                        <th>nom</th>
                        <th>description</th>
                        <th>done</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>user</th>
                            <th>produit</th>
                            <th>nom</th>
                            <th>description</th>
                            <th>done</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($commentaire as $row)


                        <tr>
                            <td> {{ $row->user->nom }}</td>
                            <td>{{ $row->produit->reference }}</td>
                            <td>{{$row->nom}}</td>
                            <td>{!!mb_strimwidth( $row->description, 0, 500, "...")!!}</td>
                            <td>{{$row->done}}</td>

                            <td>
                                @if(empty($row->done))
                                    <a href="{{ route('admin.commentaire.done', $row->id) }}"><i class="fa fa-check-circle-o"></i></a>
                                @endif
                            </td>
                            <td>
                                <p><a class="btn btn-primary glyphicon glyphicon-eye-open" href="{{route('admin.commentaire.show', $row->id)}}"></a></p>
                                <p><button type="submit" class="btn btn-danger glyphicon glyphicon-trash " data-toggle="modal" data-target="#myModal{{$row->id}}"></button></p>
                            </td>
                        </tr>






                        <!-- Modal Confirmation de suppression -->
                        <div class="modal fade" id="myModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Commentaire : {{$row->id}}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Vous êtes sur le point de supprimer définitivement le commentaire : {{$row->id}}</p>

                                        <p>NOM : {{$row->nom}}</p>

                                        <p>NOTE : {{$row->note}}</p>

                                        <p>DESCRIPTION : {{$row->description}}</p>
                                    </div>
                                    <div class="modal-footer">
                                        {!! Form::open(array('route' => array('admin.commentaire.destroy', $row->id), 'method' => 'delete')) !!}
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

