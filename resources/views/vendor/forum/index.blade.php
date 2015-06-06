@extends('front.layout.home')

@section('content')
@include('forum::partials.breadcrumbs')

<h2 style="display:inline">
	{{ trans('forum::base.index') }}
</h2>

	@if(Auth::user() && Auth::user()->isAdmin())
		<a href="{{route('forum.cat.store')}}"><i class="glyphicon glyphicon-plus"></i></a>
	@endif


@foreach ($categories as $category)
	<table class="table table-index panel panel-default" >
		<thead class="panel-heading">
			<tr>
				<td colspan="3">
					<p class="lead"  @if(Auth::user() && Auth::user()->isAdmin())style= "display:inline"@endif>
						<a href="{{ $category->Route }}">{{ $category->title }}</a>
						@if(Auth::user() && Auth::user()->isAdmin())
							<a href="{{route('forum.cat.edit', $category->id)}}"><i class="glyphicon glyphicon-pencil"></i></a>
							{!! Form::open(['route' => ['forum.cat.destroy', $category->id], 'method' => 'delete', 'style' => "display:inline"]) !!}
							 	<button style="border:none;background: none;;" type="submit"><i class="glyphicon glyphicon-trash"></i></button>
							{!!Form::close() !!}
						@endif
					</p>
					{{ $category->subtitle }}
				</td>
			</tr>
	    	</thead>
		<tbody class="panel-body">
			<tr>
				<th>{{ trans('forum::base.category') }}</th>
				<th>{{ trans('forum::base.threads') }}</th>
				<th>{{ trans('forum::base.posts') }}</th>
			</tr>
			@if (!$category->subcategories->isEmpty())
				@foreach ($category->subcategories as $subcategory)
					<tr>
						<td>
							<a href="{{ $subcategory->route }}">{{ $subcategory->title }}</a>
							@if(Auth::user() && Auth::user()->isAdmin())
								<a href="{{route('forum.cat.edit', $subcategory->id)}}"><i class="glyphicon glyphicon-pencil"></i></a>
								{!! Form::open(['route' => ['forum.cat.destroy', $subcategory->id], 'method' => 'delete', 'style' => "display:inline"]) !!}
								 	<button style="border:none;background: none;;" type="submit"><i class="glyphicon glyphicon-trash"></i></button>
								{!!Form::close() !!}
							@endif
							<br>
							{{ $subcategory->subtitle }}
							@if ($subcategory->newestThread)
								<div class="text-muted">
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
								</div>
							@endif
						</td>
						<td>{{ $subcategory->threadCount }}</td>
						<td>{{ $subcategory->postCount }}</td>
					</tr>
				@endforeach
			@else
				<tr>
					<th colspan="3">
						{{ trans('forum::base.no_categories') }}
					</th>
				</tr>
			@endif
		</tbody>
	</table>
@endforeach
@overwrite
