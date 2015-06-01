@extends('front.layout.home')

@section('content')
@include('forum::partials.breadcrumbs')

<h2>{{ trans('forum::base.index') }}</h2>

@foreach ($categories as $category)
<table class="table table-index panel panel-default" >
	<thead class="panel-heading">
        <tr>
            <td colspan="3">
                <p class="lead"><a href="{{ $category->Route }}">{{ $category->title }}</a></p>
                {{ $category->subtitle }}</div>
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
                <br>
                {{ $subcategory->subtitle }}
                @if ($subcategory->newestThread)
				<div class="text-muted">
                    <br>
                    {{ trans('forum::base.newest_thread') }}:
                    <a href="{{ $subcategory->newestThread->route }}">
                        {{ $subcategory->newestThread->title }}
                        ({{ $subcategory->newestThread->author->pseudo }})</a>
                    <br>
                    {{ trans('forum::base.last_post') }}:
                    <a href="{{ $subcategory->latestActiveThread->lastPost->route }}">
                        {{ $subcategory->latestActiveThread->title }}
                        ({{ $subcategory->latestActiveThread->lastPost->author->pseudo }})</a>
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
