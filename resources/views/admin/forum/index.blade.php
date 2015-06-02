@extends('admin.layout.admin')

@section('content')
<style>
/* fonctionnel */
input {
  display: none;
}
input ~ ul {
 display: none;
}
input:checked ~ ul {
 display: block;
}
input ~ .fa-angle-double-down {
  display: none;
}
input:checked ~ .fa-angle-double-right {
  display: none;
}
input:checked ~ .fa-angle-double-down {
  display: inline;
}

/* habillage */
li {
  display: block;
  font-family: 'Arial';
  font-size: 15px;
  padding: 0.2em;
  border: 1px solid transparent;
}
li:hover {
  border: 1px solid grey;
  border-radius: 3px;
  background-color: lightgrey;
}
</style>
<section class="content">
  <div class="row">
    <div class="col-md-3">
      <a href="#" onclick="$('#add').attr('style','display:block');" class="btn btn-primary btn-block margin-bottom">Crée une Category</a>
      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Options</h3>
          <div class='box-tools'>
            <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
          </div>
        </div>
        <div class="box-body no-padding">
          <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="#" onclick="$('#myModal').modal('show')" ><i class="fa fa-inbox"></i> New Category </a></li>
            <li><a href="#"><i class="fa fa-envelope-o"></i> New sous-Category</a></li>
          </ul>
        </div><!-- /.box-body -->
      </div><!-- /. box -->
      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Labels</h3>
          <div class='box-tools'>
            <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
          </div>
        </div>
        <div class="box-body no-padding">
          <ul class="nav nav-pills nav-stacked">
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> Important</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> Promotions</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-light-blue"></i> Social</a></li>
          </ul>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
    <div class="col-md-9">
      <div class="box box-primary">
        <div class="box-body no-padding">
          <div class="table-responsive mailbox-messages">

            @foreach ($category as $row)
              @if ( $row->parent_category  == null)
              <li><input type="checkbox" id="c{{$row->id}}" />
                <i class="fa fa-angle-double-right"></i>
                <i class="fa fa-angle-double-down"></i>
                <label for="c{{$row->id}}">{{$row->title}}</label>
                @foreach ($category as $souscategor)
                <ul>
                  @if ($souscategor->parent_category  == $row->id)
                  <li><input type="checkbox" id="c{{$row->id}}" />
                    <i class="fa fa-angle-double-right"></i>
                    <i class="fa fa-angle-double-down"></i>
                    <label for="c{{$row->id}}">{{$souscategor->title}}</label></li>
                    @endif
                </ul>

          @endforeach
              </li>

              <div id="add" class="example-modal" >
                <div class="modal modal-success">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      {!! Form::open(array('route' => array('admin.forum.create', $row->id), 'method' => 'post', 'style' => 'display:inline;')) !!}
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Creation</h4>
                      </div>
                      <div class="modal-body">
                        {{ Form::select('parent_category' ) }}
                        {{ Form::text('title') }}
                        {{ Form::text('subtitle') }}
                        {{ Form::text('weight') }}
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline">Ajouter</button>
                      </div>
                    </div><!-- /.modal-content -->
                    {!!  Form::close() !!}
                  </div><!-- /.modal-dialog --
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
              </div>



              <div id="edit" class="example-modal" >
                <div class="modal modal-warning">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      {!! Form::open(array('route' => array('admin.forum.edit', $row->id), 'method' => 'edit', 'style' => 'display:inline;')) !!}


                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">EDITER</h4>
                      </div>
                      <div class="modal-body">
                        {{ Form::select('parent_category') }}
                        {{ Form::text('title', $row->title) }}
                        {{ Form::text('subtitle' , $row->subtitle) }}
                        {{ Form::text('weight' , $row->weight) }}
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline">Save changes</button>
                      </div>
                    </div><!-- /.modal-content -->
                    {!!  Form::close() !!}
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
              </div>

              <div id="delete" class="example-modal">
                <div class="modal modal-danger">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">SUPPRIMER</h4>
                      </div>
                      <div class="modal-body">
                        <p>Vous allez supprimer un element =</p>
                      </div>
                      <div class="modal-footer">

                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        {!! Form::open(array('route' => array('admin.forum.destroy', $row->id), 'method' => 'delete', 'style' => 'display:inline;')) !!}
                        <button type="submit" class="btn btn-outline"><i class="fa fa-trash-o"></i>yes delete-it</button>
                        {!!  Form::close() !!}

                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
              </div>
              @endif
        @endforeach
        </ul>
          </div><!-- /.mail-box-messages -->

        </div><!-- /.box-body -->
      </div><!-- /. box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->

@stop

@section('footer')

@stop
