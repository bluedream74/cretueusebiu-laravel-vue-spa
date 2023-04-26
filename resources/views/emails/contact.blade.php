@extends('layouts.email_layout')

@section('content')

<div class="row ">
	<div class="col-md-12 col-sm-12 notification-title">
		下記のとおり、お問い合わせがありました。<br/>
		<br/>
		送信日時：{{ date_format($contact->created_at, 'Y/m/d H:i:s') }}<br/>
		―――――――――――――――――――――――――――――――――――<br/>
		■お名前　　　　　：{{$name}}<br/>
		■フリガナ　　　　：{{$huri_name}}<br/>
		■メールアドレス　：{{$email}}<br/>
		■電話番号　　　　：{{$telephone}}<br/>
		■ＦＡＸ　　　　　：{{$fax}}<br/>
		<br/>
		■お問い合わせ内容：<br/>
		<div style="word-break: break-all; white-space: pre-wrap;">{{$content}}</div><br/>
		<br/>
		―――――――――――――――――――――――――――――――――――
	</div>
</div>
@endsection