<tr id="post-{{ $post->id }}">
	<td>
		<strong>{!! $post->author->pseudo !!}</strong>
	</td>
	<td>
		{!! nl2br(e($post->content)) !!}
	</td>
</tr>
<tr>
	<td>
		@if ($post->canEdit)
			<a href="{{ $post->editRoute }}"><i class="glyphicon glyphicon-pencil"></i></a>
		@endif
		@if ($post->canDelete || (Auth::user() && Auth::user()->isAdmin()))
			{!! Form::open(['url' =>  $post->deleteRoute, 'method' => 'delete', 'style' => "display:inline"]) !!}
			 	<button style="border:none;background: none;;" type="submit"><i class="glyphicon glyphicon-trash"></i></button>
			{!!Form::close() !!}
		@endif
	</td>
	<td class="text-muted">
		{{ trans('forum::base.posted_at') }} {{ $post->posted }}
		@if ($post->updated_at != null && $post->created_at != $post->updated_at)
			{{ trans('forum::base.last_update') }} {{ $post->updated }}
		@endif
	</td>
</tr>
