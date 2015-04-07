
@extends('front.layout.app')
@section('content')

<div ng-app="myApp" ng-controller="customersCtrl">

<ul>
  <li ng-repeat="x in names">
		@{{ x.Name + ', ' + x.Country }}
  </li>
</ul>

REcherche U2 :=>
@{{test.name}} =====> @{{test.url}}

@{{test.stats.listeners}}
<ul>
  <li ng-repeat="y in test.bandmembers.member">
		@{{ y.name + '- ' + y.yearfrom }}
  </li>
</ul>

</div>

<script src="{{ asset('js/front/contact/contact.js') }}" type="text/javascript"></script>


@stop
