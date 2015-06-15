@extends('front.layout.app')

@section('header')
	{!!HTML::style('front/css/purchase.css') !!}
@stop
@section('content')
<h1>{{Lang::get('purchase.return')}}</h1>
<p>
{{Lang::get('purchase.returnThanks')}}
</p>

@stop
