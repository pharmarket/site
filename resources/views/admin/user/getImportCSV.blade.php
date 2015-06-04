@extends('admin.layout.admin')

@section('content')

    <div class="row">
        <div>
            @include('admin.user.errors')

            <div class="col-md-12 col-xs-12">
                <h3 style="text-align: center">Import CSV</h3>
            </div><!-- /.col -->
        </div>
    </div>



    <div class="row">
        <div class="col-md-9 col-md-offset-1">
            {!! Form::open(array('route'=>'user.importCSV', 'enctype' => 'multipart/form-data', 'files' => true)) !!}
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <!-- general form elements -->
                    <div class="box box-success">
                        <div class="box-header">
                            <h3 class="box-title">IMPORT USER</h3>
                        </div>
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">
                                {!! Form::file('file', null, ['class' => 'form-control']) !!}
                            </div>

                            <div style="text-align: center" >
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
            {!!  Form::close() !!}
        </div>
    </div>

@stop
