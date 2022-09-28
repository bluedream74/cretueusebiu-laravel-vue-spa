@extends('layouts.email_layout')

@section('content')

<div class="row ">
	<div class="col-md-12 col-sm-12 notification-title">
	<p>NIZIMARIさんから警告メッセージがありました</p>
	<p>{{ $text }}</p>
	</div>
</div>
@endsection