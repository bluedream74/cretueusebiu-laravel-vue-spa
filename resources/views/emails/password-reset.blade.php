@extends('layouts.email_layout')

@section('content')

<div class="row ">
	<div class="col-md-12 col-sm-12 notification-title">
        <p>{{$user_name}}様</p>
        <p>NIZIMARIをご利用いただき、ありがとうございます。</p><br/>
        <p>パスワードリセットのリクエストを受け付けました。</p>
        <p>以下のURLをクリックし、変更を完了してください。</p>
        <a href="{{ $url }}">{{ $url }}</a>
        <p>URLの有効期限は24時間です。有効期限を過ぎた場合は、再度のご登録をお願いいたします</p><br/>
        <p>本メールに心あたりのない場合は、お手数ですが、その旨を下記お問い合わせフォームよりご連絡ください。</p><br/>
	</div>
</div>
@endsection