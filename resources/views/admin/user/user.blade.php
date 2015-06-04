@extends('admin.layout.admin')
@section('content')
    <div class="row">
        <div class="col-xs-12">

            <div>
                @include('admin.user.succes')
            </div>

            <div class="box-header">

            </div><!-- /.box-header -->

            <div class="box-body">
                <table class="datatable table table-bordered table-striped" >
                    <thead>
                    <tr>
                        <th>role</th>
                        <th>nom</th>
                        <th>mail</th>
                        <th>avatar</th>

                        <th></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>role</th>
                        <th>nom</th>
                        <th>mail</th>
                        <th>avatar</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($user as $row)
                        <tr>
                            <td>{{ $row->role->label  }}</td>
                            <td>{{ $row->nom }}</td>
                            <td>{{ $row->mail }}</td>
                            <td>{!! HTML::image($row->avatar, 'avatar', array('class' => 'thumb', 'height'=>'35', 'width'=>'35')) !!}</td>

                            <td>
                                    <a class="btn btn-primary glyphicon glyphicon-edit" href="{{route('admin.user.edit', $row->id)}}"></a>
                                    <a class="btn btn-info glyphicon glyphicon-zoom-in" href="{{route('admin.user.show', $row->id)}}"></a>
                                <button type="submit" class="btn btn-danger glyphicon glyphicon-trash " data-toggle="modal" data-target="#{{ $row->id  }}"></button>
                            </td>
                        </tr>

                        <!-- Modal Confirmation de suppression -->
                        <div class="modal fade" id="{{ $row->id  }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Utilisateur : {{$row->nom}}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Vous êtes sur le point de supprimer définitivement l'utilisateur {{$row->nom}} </p>
                                    </div>
                                    <div class="modal-footer">
                                        {!! Form::open(array('route' => array('admin.user.destroy', $row->id), 'method' => 'delete')) !!}
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
