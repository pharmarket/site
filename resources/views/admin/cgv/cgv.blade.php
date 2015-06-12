@extends('admin.layout.admin')

@section('header')
    <!-- DATA TABLES -->
    <link href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')
<section class="content-header">
	<h1>
		Pages
		<small>CGV</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ ucfirst(route('accueil')) }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Pages</li>
	</ol>
</section>

			<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div>
                @include('admin.cgv.succes')
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
                        <th>CGV </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Langue</th>
                        <th>title </th>
                        <th>CGV </th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($cgv as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->langue->label }}</td>
                            <td>{{ $row->title }}</td>
                            <td>
                                {!!mb_strimwidth( $row->cgv, 0, 500, "...")!!}
                            </td>
                            <td>
                                <p><a class="btn btn-primary glyphicon glyphicon-eye-open" href="{{route('admin.cgv.show', $row->id)}}"></a></p>
                                <p><a class="btn btn-warning glyphicon glyphicon-edit" href="{{route('admin.cgv.edit', $row->id)}}"></a></p>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
    </div><!-- /.row -->
  </section>
@stop
