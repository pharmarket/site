@extends('admin.layout.admin')
@section('content')
    <div class="row">
        <div class="col-xs-12">

            <div>
                @include('admin.role.succes')
            </div>

            <p style="text-align: center;"><a class="btn btn-primary" href="{{route('admin.role.create')}}">Create</a></p>

            <div class="box-header">

            </div><!-- /.box-header -->

            <div class="box-body">
                <table class="datatable table table-bordered table-striped" >
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>label</th>
                        <th>description</th>
                        <th>created_at</th>

                        <th></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>id</th>
                        <th>label</th>
                        <th>description</th>
                        <th>created_at</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($role as $row)
                        <tr>
                            <td>{{ $row->id  }}</td>
                            <td>{{ $row->label }}</td>
                            <td>{{ $row->description }}</td>
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
                                        <h4 class="modal-title">ROLE : {{$row->id}}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Vous êtes sur le point de supprimer définitivement le role {{$row->label}} </p>
                                    </div>
                                    <div class="modal-footer">
                                        {!! Form::open(array('route' => array('admin.role.destroy', $row->id), 'method' => 'delete')) !!}
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
