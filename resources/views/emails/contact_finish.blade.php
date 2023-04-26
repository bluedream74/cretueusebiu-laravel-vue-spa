@extends('layouts.email_layout')

@section('content')

<div class="row ">
	<div class="col-md-12 col-sm-12 notification-title">
    {{ $contact->name }} 様<br/>
    <br/>
    このたびは＜補助金活用.COM＞へお問い合わせいただきありがとうございます。<br/>
    お送りいただきました内容は以下になります。<br/>
    <br/>
    送信日時：{{ date_format($contact->created_at, 'Y/m/d H:i:s') }}<br/>
    ―――――――――――――――――――――――――――――――――――<br/>
    ■お名前　　　　　：{{ $contact->name }}<br/>
    ■フリガナ　　　　：{{ $contact->huri_name }}<br/>
    ■メールアドレス　：{{ $contact->email }}<br/>
    ■電話番号　　　　：{{ $contact->telephone }}<br/>
    ■ＦＡＸ　　　　　：{{ $contact->fax }}<br/>
    <br/>
    ■お問い合わせ内容：<br/>
    {{ $contact->content }}<br/>
    <br/>
    <br/>
    ―――――――――――――――――――――――――――――――――――<br/>
    <br/>
    <br/>
    **********************************************************************<br/>
    <br/><br/>
    補助金活用.COM　株式会社八咲
    eMAIL:info@hojyokin-katsuyou.com
    URL:http://hojyokin-katsuyou.com/

    **********************************************************************
	</div>
</div>
@endsection