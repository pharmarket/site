@extends('admin.layout.admin')

@section('content')
<div>
	<span>ID</span>
	<span>{{ $contact->id  }}</span>
</div>
<div>
	<span>Message</span>
	<span>{{ $contact->message  }}</span>
</div>
<div>
	<span>Mail</span>
	<span>{{ $contact->mail  }}</span>
</div>
<div>
	<span>Telephone</span>
	<span>{{ $contact->phone  }}</span>
</div>
<div>
	<span>Fait</span>
	<span>{{ $contact->done  }}</span>
</div>
<div>
	<span>Date</span>
	<span>{{ $contact->created_at  }}</span>
</div>
@stop
