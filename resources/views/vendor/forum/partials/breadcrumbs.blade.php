<section class="page_head">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row">
  <div class="col-sm-9 col-md-9 col-lg-9">
    <div class="widget widget_search">
    						<nav id="breadcrumbs">
    							<ul>
    								<li>You are here:</li>
    <li><a href="{{ config('forum.routing.root') }}">{{ trans('forum::base.index') }}</a></li>
    @if (isset($parentCategory) && $parentCategory)
        <li><a href="{!! $parentCategory->route !!}">{!! $parentCategory->title !!}</a></li>
    @endif
    @if (isset($category) && $category)
        <li><a href="{!! $category->route !!}">{!! $category->title !!}</a></li>
    @endif
    @if (isset($thread) && $thread)
        <li><a href="{!! $thread->route !!}">{!! $thread->title !!}</a></li>
    @endif
    @if (isset($other) && $other)
        <li>{!! $other !!}</li>
    @endif


    							</ul>
    						</nav>
  </div>
  <div class="col-sm-3 col-md-3 col-lg-3">

  </div>
</div>


					</div>
				</div>
			</div>
		</section>
