@extends('front.layout.home')

@section('content')
@include('forum::partials.breadcrumbs')

<h2 style="display:inline">{{ $category->title }}</h2>

@if(Auth::user() && Auth::user()->isAdmin())
	<a href="{{route('forum.cat.store', ['cat' => $category->id])}}"><i class="glyphicon glyphicon-plus"></i></a>
@endif

@if (!$category->subcategories->isEmpty())
<table class="table table-category panel panel-default" >
	<thead class="panel-heading">
		<tr>
			<th>{{ trans('forum::base.category') }}</th>
			<th class="col-md-2">{{ trans('forum::base.threads') }}</th>
			<th class="col-md-2 text-right">{{ trans('forum::base.posts') }}</th>
		</tr>
	</thead>
	<tbody  class="panel-body">
		@foreach ($category->subcategories as $subcategory)
		<tr>
			<td>

  				<a href="{{ $subcategory->Route }}">{{ $subcategory->title }}</a>
				@if(Auth::user() && Auth::user()->isAdmin())
					<a href="{{route('forum.cat.edit', $subcategory->id)}}"><i class="glyphicon glyphicon-pencil"></i></a>
					{!! Form::open(['route' => ['forum.cat.destroy', $subcategory->id], 'method' => 'delete', 'style' => "display:inline"]) !!}
					 	<button style="border:none;background: none;;" type="submit"><i class="glyphicon glyphicon-trash"></i></button>
					{!!Form::close() !!}
				@endif
				<br>
				{{ $subcategory->subtitle }}
				@if ($subcategory->newestThread)
					<br>
					{{ trans('forum::base.newest_thread') }}:
					<a href="{{ $subcategory->newestThread->route }}">
						{{ $subcategory->newestThread->title }}
						({{ $subcategory->newestThread->author->pseudo }})
					</a>
					<br>
					{{ trans('forum::base.last_post') }}:
					<a href="{{ $subcategory->latestActiveThread->lastPost->route }}">
						{{ $subcategory->latestActiveThread->title }}
						({{ $subcategory->latestActiveThread->lastPost->author->pseudo }})
					</a>
				@endif

			</td>
			<td>{{ $subcategory->threadCount }}</td>
			<td class="text-right">{{ $subcategory->postCount }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endif

<div class="row">
	<div class="col-xs-4">
		@if ($category->canPost)
		<a href="{{ $category->newThreadRoute }}" class="btn btn-primary">{{ trans('forum::base.new_thread') }}</a>
		@endif
	</div>
	<div class="col-xs-8 text-right">
		{!! $category->pageLinks !!}
	</div>
</div>

<table class="table table-thread">
	<thead>
		<tr>
			<th>{{ trans('forum::base.subject') }}</th>
			<th class="col-md-2">{{ trans('forum::base.replies') }}</th>
			<th class="col-md-2 text-right">{{ trans('forum::base.last_post') }}</th>
		</tr>
	</thead>
	<tbody>
		@if (!$category->threadsPaginated->isEmpty())
			@foreach ($category->threadsPaginated as $thread)
				<tr>
					<td>
						<span class="pull-right">
							@if($thread->locked)
								<span class="label label-danger">{{ trans('forum::base.locked') }}</span>
							@endif
							@if($thread->pinned)
								<span class="label label-info">{{ trans('forum::base.pinned') }}</span>
							@endif
							@if($thread->userReadStatus)
								<span class="label label-primary">{{ trans($thread->userReadStatus) }}</span>
							@endif
						</span>
						<p class="lead" style="display:inline">
							<a href="{{ $thread->route }}">{{ $thread->title }}</a>
						</p>
						{!! Form::open(['route' => ['forum.thread.destroy', $thread->id], 'method' => 'delete', 'style' => "display:inline"]) !!}
						 	<button style="border:none;background: none;;" type="submit"><i class="glyphicon glyphicon-trash"></i></button>
						{!!Form::close() !!}
						<p>{{ $thread->author->pseudo }} <span class="text-muted">({{ $thread->posted }})</span></p>
					</td>
					<td>
					    {{ $thread->replyCount }}
					</td>
					<td class="text-right">
					    {{ $thread->lastPost->author->pseudo }}
						<p class="text-muted">({{ $thread->lastPost->posted }})</p>
						<a href="{{ URL::to( $thread->lastPostRoute ) }}" class="btn btn-primary btn-xs">{{ trans('forum::base.view_post') }} &raquo;</a>
					</td>
				</tr>
			@endforeach
		@else
			<tr>
				<td>
					{{ trans('forum::base.no_threads') }}
				</td>
				<td colspan="2">
					@if ($category->canPost)
						<a href="{{ $category->newThreadRoute }}">{{ trans('forum::base.first_thread') }}</a>
					@endif
				</td>
			</tr>
		@endif
	</tbody>
</table>

<div class="row">
	<div class="col-xs-4">
		@if ($category->canPost)
		<a href="{{ $category->newThreadRoute }}" class="btn btn-primary">{{ trans('forum::base.new_thread') }}</a>
		@endif
	</div>
	<div class="col-xs-8 text-right">
		{!! $category->pageLinks !!}
	</div>
</div>
@overwrite
