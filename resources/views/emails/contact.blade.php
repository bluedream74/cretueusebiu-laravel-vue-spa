@extends('layouts.email_layout')

@section('content')

<div class="row ">
	<div class="col-md-12 col-sm-12 notification-title">
		<p>{{ $name }}さんからのお問い合わせです。</p>
		<br/>
		<p>{{ $content }}</p>
	</div>
</div>
@endsection