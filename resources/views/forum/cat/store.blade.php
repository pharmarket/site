@extends('front.layout.app')

@section('content')
<div class="row">
<div class="col-md-offset-2">
	<h2>Categories</h2>
		<br>
	{!! Form::open(array('route' => array('forum.cat.post'), 'method' => 'POST')) !!}
		{!!Form::label('parent_category', Lang::get('forum.parent_category'));!!}
		{!!Form::select('parent_category', ['' => ''] + $cat, $catForum);!!}

		<br>
		{!!Form::label('title', Lang::get('forum.title'));!!}
		{!!Form::text('title');!!}

		<br>

		{!!Form::label('subtitle', Lang::get('forum.subtitle'));!!}
		{!!Form::text('subtitle');!!}


		<br>

		{!!Form::label('weight', Lang::get('forum.weight'));!!}
		{!!Form::text('weight');!!}


		<br>

		{!!Form::submit(Lang::get('site.valid'), ['style' => 'background-color:#78AB4E']);!!}

	{!!Form::close() !!}

</div>
</div>
@stop
