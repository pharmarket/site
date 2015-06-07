@extends('admin.layout.admin')

@section('header')
    <!-- DATA TABLES -->
    <link href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">

            <div>
                @include('admin.charte.succes')
            </div>

            <div class="box-header">

            </div><!-- /.box-header -->

            <div class="box-body">
                <table class="datatable table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Langue</th>
                        <th>title </th>
                        <th>description </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Langue</th>
                        <th>title </th>
                        <th>description </th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($charte as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->langue->label }}</td>
                            <td>{{ $row->title }}</td>
                            <td>
                                {!!mb_strimwidth( $row->description, 0, 500, "...")!!}
                            </td>
                            <td>
                                <p><a class="btn btn-primary glyphicon glyphicon-eye-open" href="{{route('admin.charte.show', $row->id)}}"></a></p>
                                <p><a class="btn btn-warning glyphicon glyphicon-edit" href="{{route('admin.charte.edit', $row->id)}}"></a></p>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
    </div><!-- /.row -->
@stop
