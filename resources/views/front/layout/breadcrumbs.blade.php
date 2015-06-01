	@section('breadcrumbs')
	@if ($breadcrumbs)
		<nav id="breadcrumbs">
			<ul>
				<li>You are here:</li>
				@foreach ($breadcrumbs as $breadcrumb)
	          @if (!$breadcrumb->last)
	              <li><a href="{{{ $breadcrumb->url }}}">{{{ $breadcrumb->title }}}</a></li>
	          @else
	              <li>{{{ $breadcrumb->title }}}</li>
	          @endif
	      @endforeach
			</ul>
		</nav>
		@endif
	@stop
