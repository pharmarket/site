
@extends('front.layout.app')
@extends('front.layout.menu')
@section('content')



<!-- TOUJOURs inclure son fichier ou ses ^^ js-->
<script src="{{ asset('/js/front/contact/contact.js') }}"></script>

<div ng-controller="Hello">
	<p>The ID is {{greeting.id}}</p>
	<p>The content is {{greeting.content}}</p>
</div>

@stop
