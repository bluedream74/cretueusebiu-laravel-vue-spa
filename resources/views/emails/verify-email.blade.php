@extends('layouts.email_layout')

@section('content')

<div class="row ">
	<div class="col-md-12 col-sm-12 notification-title">
		{{ $tanto_name }} 様<br/>
		<br/>
		このたびは＜補助金活用.COM＞の支援機関新規登録をご利用いただきありがとうございます。<br/>
		ただいま、【仮登録】の状態です。<br/>
		【支援機関登録】を完了するには24時間以内に下記URLにアクセスしてください。<br/>
		<br/>
		＜本登録URL＞<br/>
		<a href="{{ $url }}">{{ $url }}</a><br/>
		<br/>
		※うまくアクセスできない場合は、ＵＲＬをコピー&ペーストしてアクセスしてください。<br/>
		改行されている場合なども、うまくアクセスできない場合がございます。<br/>
		<br/>
		上記URLにて【本会員登録】が完了いたしましたら<br/>
		改めてご登録内容ご確認メールをお送りいたします。<br/>
		ご不明な点がございましたら、お手数ではございますがお問合せください。<br/>
		<br/>
		<br/>
		**********************************************************************<br/>
		<br/>
		補助金活用.COM　株式会社八咲<br/>
		TEL:06-6136-7304  月曜～土曜／9:00～18:00<br/>
		URL:http://hojyokin-katsuyou.com/<br/>
		<br/>
		**********************************************************************<br/>
	</div>
</div>

@endsection