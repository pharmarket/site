
@extends('front.layout.app')
@section('content')


{!! Breadcrumbs::render('contact') !!}
<div class="container">
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	@if($success)
		<div class="alert alert-success" role="alert">{{Lang::get('site.contact_confirm')}}</div>
	@endif
	<h1 class="page-heading bottom-indent">{{Lang::get('site.contact_title')}}</h1>
	<div class="row sub_content">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="maps">
				<iframe width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=27+Rue+Saint-Antoine,+Paris,+France&key=AIzaSyCiv13nDnCfHTd4KolYHorc1otJXz7qgt8&language={{(Lang::getLocale() == 'en') ? 'en-GB':Lang::getLocale()}}"></iframe>
			</div>
		</div>
	</div>

	<div class="row sub_content">
		<div class="col-lg-8 col-md-8 col-sm-8">
			<div class="dividerHeading">
				<h4><span>{{Lang::get('site.contact')}}</span></h4>
			</div>

			<div class="alert alert-success hidden alert-dismissable" id="contactSuccess">
			  	<button type="button" class="close" data-dismiss="alert" aria-hidden="{{empty($message)}}">×</button>
			  	<strong>Success!</strong> Your message has been sent to us.
			</div>

				{!! Form::open(array('url' => route('contact'), 'class'=>'form-horizontal', 'role'=>'form', 'method'=>'POST')) !!}			            <div class="row">
				            <div class="form-group">
					            <div class="col-lg-6 ">
							{!! Form::text('nom', null, ["class"=>"form-control", "required", " maxlength"=>"100", "data-msg-required"=>"Please enter your name.", "value"=> Input::get('nom')?:null, "placeholder"=>Lang::get('user.nom')]); !!}
					            </div>
					            <div class="col-lg-6 ">
							{!! Form::email('mail', null, ["class"=>"form-control", "required", " maxlength"=>"100", "data-msg-required"=>"Please enter your mail.", "value"=>Input::get('mail')?:null, "placeholder"=>Lang::get('user.mail')]); !!}
					            </div>
				            </div>
			            </div>
		                        <div class="row">
			                        <div class="form-group">
			                            	<div class="col-md-12">
							{!! Form::text('sujet', null, ["class"=>"form-control", "required", " maxlength"=>"100", "data-msg-required"=>"Please enter the subject.", "value"=>Input::get('sujet')?:null, "placeholder"=>Lang::get('site.contact_sujet')]); !!}
			                            	</div>
			                        </div>
		                        </div>
		                        <div class="row">
		                            	<div class="form-group">
		                                		<div class="col-md-12">
							{!! Form::textarea('message', null, ["class"=>"form-control", "required", " maxlength"=>"100", "cols" => "50", "data-msg-required"=>"Please enter your message.", "value"=>Input::get('message')?:null, "placeholder"=>Lang::get('site.contact_message')]); !!}
		                                		</div>
		                            	</div>
		                        </div>
		                        <div class="row">
		                        	<div class="col-md-12">
						{!! Form::checkbox('newsletter', 0, null, ['id' => 'newsletter']); !!}
						{!! Form::label('newsletter',  Lang::get('site.contact_newsletter')); !!}
		                        	</div>
		                        </div>
		                        <div class="row">
		                            	<div class="col-md-12">
						{!! Form::submit(Lang::get('site.valid'),["data-loading-text"=>"Loading...", "class"=>"btn btn-default btn-lg"]); !!}
		                            	</div>
		                        </div>

			{!! Form::close() !!}
		</div>

		<div class="col-lg-4 col-md-4 col-sm-4">
			<div class="sidebar">
				<div class="widget_info">
					<div class="dividerHeading">
						<h4><span>{{Lang::get('site.contact_info')}}</span></h4>
					</div>
					<ul class="widget_info_contact">
						<li><i class="fa fa-map-marker"></i> <p><strong>{{Lang::get('user.adresse')}}</strong>: 27, rue St Antoine 75004 Paris</p></li>
						<li><i class="fa fa-user"></i> <p><strong>{{Lang::get('user.phone')}}</strong>:0799054751</p></li>
						<li><i class="fa fa-envelope"></i> <p><strong>{{Lang::get('user.mail')}}</strong>: <a href="#">paharmarket.f2i@gmail.com</a></p></li>
						<li><i class="fa fa-globe"></i> <p><strong>Web</strong>: <a href="#" data-placement="bottom" data-toggle="tooltip" title="" data-original-title="www.example.com">www.pharmarket.com</a></p></li>
					</ul>
				</div>

				<div class="widget_social">
					<div class="dividerHeading">
						<h4><span>{{Lang::get('site.social')}}</span></h4>
					</div>
					<ul class="widget_social">
						<li><a class="fb" href="https://www.facebook.com/pages/Pharmarket/1583244831927925?ref=hl" data-placement="bottom" data-toggle="tooltip" title="Facbook"><i class="fa fa-facebook"></i></a></li>
						<li><a class="twtr" href="https://twitter.com/pharmarket75" data-placement="bottom" data-toggle="tooltip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
						<li><a class="rss" href="https://plus.google.com/117424311704712575119/posts" data-placement="top" data-toggle="tooltip" title="Google +"><i class="fa fa-google-plus"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
