@extends('admin.layout.admin')

@section('content')
    <div class="row">
        <div class="col-xs-12">

            <div>
                @include('admin.faq.succes')
            </div>

            <div class="box-header">

            </div><!-- /.box-header -->

            <div class="box-body">
                <table class="datatable table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Langue</th>
                        <th>question </th>
                        <th>answer </th>
                        <th>order</th>

                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Langue</th>
                            <th>question </th>
                            <th>answer </th>
                            <th>order</th>

                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($faq as $row)


                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->langue->label}}</td>
                            <td>{!! mb_strimwidth( $row->question, 0, 500, "...") !!}</td>
                            <td>{!! mb_strimwidth( $row->answer, 0, 500, "...") !!}</td>
                            <td>{{ $row->order }}</td>

                            <td>
                                <p><a class="btn btn-warning glyphicon glyphicon-edit" href="{{route('admin.faq.edit', $row->id)}}"></a></p>
                            </td>

                            <td>
                                <p><a class="btn btn-primary glyphicon glyphicon-eye-open" href="{{route('admin.faq.show', $row->id)}}"></a></p>
                            </td>

                            <td>
                                <button type="submit" class="btn btn-danger glyphicon glyphicon-trash " data-toggle="modal" data-target="#myModal{{$row->id}}"></button>
                            </td>

                        </tr>


                        <!-- Modal Confirmation de suppression -->
                        <div class="modal fade" id="myModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">FAQ : {{$row->id}}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Vous êtes sur le point de supprimer définitivement la FAQ : {{$row->id}}</p>
                                    </div>
                                    <div class="modal-footer">
                                        {!! Form::open(array('route' => array('admin.faq.destroy', $row->id), 'method' => 'delete')) !!}
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

