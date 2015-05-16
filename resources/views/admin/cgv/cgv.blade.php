@extends('admin.layout.admin')

@section('header')
    <!-- DATA TABLES -->
    <link href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">

            <div>
                @include('admin.cgv.succes')
            </div>

            <div class="box-header">

            </div><!-- /.box-header -->

            <div class="box-body">
                <table class="datatable table table-bordered table-striped" id="cgv-table" >
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Langue</th>
                        <th>title </th>
                        <th>CGV </th>
                        <th></th>

                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cgv as $row)


                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->langue->label }}</td>
                            <td>{{ $row->title }}</td>
                            <td>
                                <?php
                                    $length = 90;
                                    $text = $row->cgv;

                                    if(strlen($text <= $length)){
                                        $text = substr($text, 0, $length);
                                        $position_space = strrpos($text, " ");
                                        $text = substr($text, 0, $position_space);
                                        $text .= '...';
                                        echo $text;
                                    }else{
                                        echo $text;
                                    }
                                ?>
                            </td>



                            <td>
                                <p><a class="btn btn-primary glyphicon glyphicon-eye-open" href="{{route('admin.cgv.show', $row->id)}}"></a></p>
                            </td>


                            <td>
                                <p><a class="btn btn-warning glyphicon glyphicon-edit" href="{{route('admin.cgv.edit', $row->id)}}"></a></p>
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
                                        <h4 class="modal-title">CGV : {{$row->title}}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Vous êtes sur le point de supprimer définitivement la CGV : {{$row->title}}</p>
                                    </div>
                                    <div class="modal-footer">
                                        {!! Form::open(array('route' => array('admin.cgv.destroy', $row->id), 'method' => 'delete')) !!}
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
            $('#cgv-table').dataTable({"oLanguage": {
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

