
@extends('front.layout.home')



@section('content')
<!--start wrapper-->
<section class="wrapper">

	<!--Start Recherche-->
	<div class="container">


	<!--End Recherche-->

	<!--start info service-->
	<section class="info_service">
		<div class="row sub_content">
			<div class="col-lg-12">
				<div class="eve-tab">
					<div class="dividerHeading">
						<h4><span>{{ Lang::get('home.recherche') }}</span></h4>
					</div>
					<div class="widget widget_search">
						<div class="site-search-area">
							<form method="get" id="site-searchform" action="#">
								<div>
									<input class="input-text" name="s" id="s" placeholder="{{ Lang::get('home.rechercheplaceholder') }}" type="text">
									<input id="searchsubmit" value="{{ Lang::get('home.search') }}" type="submit">
								</div>
							</form>
						</div><!-- end site search -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row sub_content">
			<div class="col-sm-4 col-md-4 col-lg-4">
				<a href="{{route('home')}}">
				<div class="serviceBox_2">
					<i class="fa fa-gift"></i>
					<h3>{{ Lang::get('home.bestsellers') }}</h3>
				</div>
			</a>
			</div>
			<div class="col-sm-4 col-md-4 col-lg-4">
				<a href="{{route('home')}}">
				<div class="serviceBox_2">
					<i class="fa fa-flash"></i>
					<h3>{{ Lang::get('home.news') }}</h3>
				</div>
			</a>
			</div>
			<div class="col-sm-4 col-md-4 col-lg-4">
				<a href="{{route('produit.callCategorie')}}">
				<div class="serviceBox_2">
					<i class="fa fa-plus-square"></i>
					<h3>{{ Lang::get('home.catalogue') }}</h3>
									</div>
				</a>
			</div>
		</div>
	</div>
</section>
<!--end info service-->



<!--Start recent work-->
<section class="latest_work">
	<div class="container">
		<div class="row sub_content">
			<div class="carousel-intro">
				<div class="col-md-12">
					<div class="dividerHeading">
						<h4><span>	{{ Lang::get('home.lastproductadd') }}</span></h4>
					</div>
					<div class="carousel-navi">
						<div id="work-prev" class="arrow-left jcarousel-prev"><i class="fa fa-angle-left"></i></div>
						<div id="work-next" class="arrow-right jcarousel-next"><i class="fa fa-angle-right"></i></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="jcarousel recent-work-jc" data-jcarousel="true" style="height: 162px;">
				<ul class="jcarousel-list">
					<!-- Recent Work Item -->
					@foreach ($lastProducts as $row)
						<li class="col-sm-3 col-md-3 col-lg-3">
							<div class="recent-item">
								<figure>
									<div class="touching medium">
										<img src="{{ asset($row->chemin) }}" alt="" />
									</div>
									<div class="option">
										<a href="{{route('produit.show', $row->id)}}" class="hover-zoom mfp-image" ><i class="fa fa-search"></i></a>

									</div>
									<a href="{{route('produit.show', $row->id)}}" class="hover-zoom mfp-image" >
										<figcaption class="item-description">
											<h5>{{ $row->nom }}</h5>
										</figcaption>
									</a>
								</figure>
							</div>
						</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</section>
<!--Start recent work-->
<section class="latest_work">
	<div class="container">
		<div class="row sub_content">
			<div class="carousel-intro">
				<div class="col-md-12">
					<div class="dividerHeading">
						<h4><span>	{{ Lang::get('home.bestproductsold') }}</span></h4>
					</div>
					<div class="carousel-navi">
						<div id="work-prev" class="arrow-left jcarousel-prev"><i class="fa fa-angle-left"></i></div>
						<div id="work-next" class="arrow-right jcarousel-next"><i class="fa fa-angle-right"></i></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="jcarousel recent-work-jc" data-jcarousel="true" style="height: 162px;">
				<ul class="jcarousel-list">
					<!-- Recent Work Item -->
					@foreach ($bestProducts as $row)
						<li class="col-sm-3 col-md-3 col-lg-3">
							<div class="recent-item">
								<figure>
									<div class="touching medium">
										<img src="{{ asset($row->chemin) }}" alt="" />
									</div>
									<div class="option">
										<a href="{{route('produit.show', $row->id)}}" class="hover-zoom mfp-image" ><i class="fa fa-search"></i></a>

									</div>
									<a href="{{route('produit.show', $row->id)}}" class="hover-zoom mfp-image" >
										<figcaption class="item-description">
											<h5>{{ $row->nom }}</h5>
										</figcaption>
									</a>
								</figure>
							</div>
						</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</section>
	<!--Start recent work-->


<!--start info service-->
<section class="info_service">
	<div class="container">
		<div class="row sub_content">
			<div class="col-sm-4 col-md-4 col-lg-4">
				<div class="serviceBox_3">
					<div class="service_3_img">
						<img alt="" src="{{ asset('front/images/home/paypal-'.\App::getLocale().'.png') }}">
					</div>
					<div class="service_3_detail">
						<h3>	{{ Lang::get('home.paypal') }}</h3>
						<p>{{ Lang::get('home.paypaldescription') }}</p>
						<p>{{ Lang::get('home.paypaldescription1') }}</p>
						<p>{{ Lang::get('home.paypaldescription2') }}</p>
						<p>{{ Lang::get('home.paypaldescription3') }}</p>
					</div>
				</div>
			</div>
			<div class="col-sm-4 col-md-4 col-lg-4">
				<div class="serviceBox_3">
					<div class="service_3_img">
						<img alt="" src="{{ asset('front/images/home/forum-'.\App::getLocale().'.png') }}">
					</div>
					<div class="service_3_detail">
						<h3>	{{ Lang::get('home.forum') }}</h3>
						<p>{{ Lang::get('home.forumdescription') }}</p>
						<p>{{ Lang::get('home.forumdescription1') }}</p>
						<p>{{ Lang::get('home.forumdescription2') }}</p>
						<p>{{ Lang::get('home.forumdescription3') }}</p>
					</div>
				</div>
			</div>
			<div class="col-sm-4 col-md-4 col-lg-4">
				<div class="serviceBox_3">
					<div class="service_3_img">
						<img alt="" src="{{ asset('front/images/home/apply-'.\App::getLocale().'.png') }}">
					</div>
					<div class="service_3_detail">
						<h3>	{{ Lang::get('home.applications') }}</h3>
						<p>{{ Lang::get('home.applicationsdescription') }}</p>
						<p>{{ Lang::get('home.applicationsdescription1') }}</p>
						<p>{{ Lang::get('home.applicationsdescription2') }}</p>
						<p>{{ Lang::get('home.applicationsdescription3') }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--end info service-->




@stop
