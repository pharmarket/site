<!--start footer-->
  <footer class="footer">
      <div class="container">
          <div class="row">
              <div class="col-sm-6 col-md-3 col-lg-3">
                  <div class="widget_title">
                      <h4><span>{{ Lang::get('footer.navigation') }}</span></h4>
                  </div>

                  <div class="widget_content">
                      <ul class="contact-details-alt">
                          <li><p><a style="padding-left: 35%" href="{{ route('home') }}">{{ Lang::get('footer.home') }}</a><p></li>
                          <li><p><a style="padding-left: 35%" href="{{ route('user.login') }}">{{ Lang::get('footer.connexion') }}</a><p></li>
                          <li><p><a style="padding-left: 35%" href="{{ route('user.suscribe') }}">{{ Lang::get('footer.inscription') }}</a><p></li>
                          <li><p><a style="padding-left: 35%" href="{{ URL::to('forum') }}">{{ Lang::get('footer.forum') }}</a><p></li>
                      </ul>
                  </div>
              </div>
              <div class="col-sm-6 col-md-3 col-lg-3">
                  <div class="widget_title">
                      <h4><span>{{ Lang::get('footer.about') }}</span></h4>
                  </div>
                  <div class="widget_content">
                      <ul class="contact-details-alt">
                          <li><p><a style="padding-left: 35%" href="{{ route('whoPharmarket.index') }}">{{ Lang::get('footer.whoPharmarket') }}</a><p></li>
                          <li><p><a style="padding-left: 35%" href="{{ route('charterQuality.index') }}">{{ Lang::get('footer.charterQuality') }}</a><p></li>
                          <li><p><a style="padding-left: 35%" href="{{ route('contact') }}">{{ Lang::get('footer.contact') }}</a><p></li>
                      </ul>
                  </div>
              </div>
              <div class="col-sm-6 col-md-3 col-lg-3">
                  <div class="widget_title">
                      <h4><span>{{ Lang::get('footer.legalInfo') }}</span></h4>
                  </div>
                  <div class="widget_content">
                      <ul class="contact-details-alt">
                          <li><p><a style="padding-left: 15%" href="{{ route('cgv.index') }}">{{ Lang::get('footer.saleCondition') }}</a><p></li>
                          <li><p><a style="padding-left: 15%" href="{{ route('cgu.index') }}">{{ Lang::get('footer.useTerms') }}</a><p></li>
                          <li><p><a style="padding-left: 15%" href="{{ route('faq.index') }}">{{ Lang::get('footer.faq') }}</a></p></li>
                      </ul>
                  </div>
              </div>
              <div class="col-sm-6 col-md-3 col-lg-3">
                  <div class="widget_title">
                      <h4><span>{{ Lang::get('footer.payment') }}</span></h4>
                  </div>
                  <div class="widget_content">
                      <div class="flickr">
                          {!! HTML::image('img/paiement.png', '', array('width'=>'250')) !!}
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </footer>
<!--end footer-->

<section class="footer_bottom">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 ">
                  <p class="copyright">&copy; Copyright 2014 Eve | Powered by  <a href="http://www.jqueryrain.com/">jQuery Rain</a></p>
      </div>

      <div class="col-lg-6 ">
        <div class="footer_social">
          <ul class="footbot_social">
            <li><a class="fb" href="https://www.facebook.com/pages/Pharmarket/1583244831927925?ref=hl" data-placement="top" data-toggle="tooltip" title="Facbook"><i class="fa fa-facebook"></i></a></li>
            <li><a class="twtr" href="https://twitter.com/pharmarket75" data-placement="top" data-toggle="tooltip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
            <li><a class="rss" href="#." data-placement="top" data-toggle="tooltip" title="Google +"><i class="fa fa-google-plus"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript" src="{{ asset('front/js/jquery-1.10.2.min.js') }}"></script>
<script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('front/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('front/js/retina-1.1.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/jquery.cookie.js') }}"></script> <!-- jQuery cookie -->
<script type="text/javascript" src="{{ asset('front/js/styleswitch.js') }}"></script> <!-- Style Colors Switcher -->
<script src="{{ asset('front/js/jquery.fractionslider.js') }}" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="{{ asset('front/js/jquery.smartmenus.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/jquery.smartmenus.bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/jquery.jcarousel.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/jflickrfeed.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/jquery.magnific-popup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/jquery.isotope.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/swipe.js') }}"></script>
  <script type="text/javascript" src="{{ asset('front/js/jquery-scrolltofixed-min.js') }}"></script>


<!-- End Style Switcher -->
  <script>
      $(window).load(function(){
          $('.slider').fractionSlider({
              'fullWidth': 			true,
              'controls': 			true,
              'responsive': 			true,
              'dimensions': 			"1920,450",
              'increase': 			true,
              'pauseOnHover': 		true,
              'slideEndAnimation': 	true,
              'autoChange':           true
          });
      });
  </script>

<script src="{{ asset('front/js/main.js') }}"></script>
