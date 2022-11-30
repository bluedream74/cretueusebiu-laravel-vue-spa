@extends('layouts.email_layout')

@section('content')

<div class="row ">
	<div class="col-md-12 col-sm-12 notification-title">
    {{ $contact->name }} 様<br/>
    <br/>
    このたびは＜補助金活用.COM＞へお問い合わせいただきありがとうございます。<br/>
    お送りいただきました内容は以下になります。<br/>
    <br/>
    送信日時：{{ date_format($consultant->created_at, 'Y/m/d H:i:s') }}<br/>
    ―――――――――――――――――――――――――――――――――――
    ■お名前　　　　　：{{ $contact->name }}<br/>
    ■フリガナ　　　　：{{ $contact->huri_name }}<br/>
    ■メールアドレス　：{{ $contact->email }}<br/>
    ■電話番号　　　　：{{ $contact->telephone }}<br/>
    ■ＦＡＸ　　　　　：{{ $contact->fax }}<br/>
    <br/>
    ■お問い合わせ内容：<br/>
    {{ $contact->content }}<br/>
    <br/>
    ―――――――――――――――――――――――――――――――――――<br/>
    <br/>
    頂戴いたしましたお問い合わせにつきましては、<br/>
    内容を確認の上、弊社担当者よりご返答させて頂きます。<br/>
    <br/>
    なお、2営業日以上が経過しても連絡が届かない場合、大変お手数ですが、<br/>
    下記ご連絡先までお問い合せ下さい。<br/>
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