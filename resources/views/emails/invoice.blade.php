@extends('layouts.email_layout')

@section('content')

<div class="row ">
	<div class="col-md-12 col-sm-12 notification-title">
        {{ $user->com_name }}<br/>
        {{ $user->tanto_name }} 様<br/>
        <br/>
        いつも＜補助金活用.COM＞をご利用いただきありがとうございます。<br/>
        ご利用頂いております{{ $month }}のお支払いについてお知らせいたします。<br/>
        <br/>
        ----------------------------------<br/>
        <br/>
        ご請求内容：{{ $month }}月利用分<br/>
        ご利用期間：{{ $start_date }}～{{ $end_date }}<br/>
        お支払い期限：{{ $expire_date }}<br/>
        <br/>
        ----------------------------------<br/>
        <br/>
        ※請求内容は前月1日から前月末日までのサイト利用料ならび、広告掲載料の合計となります。<br/>
        <br/>
        マイページからご利用明細のPDFをダウンロードいただけます。<br/>
        上記期限内に、記載の振込口座に振込お願いいたします。<br/>
        <br/>
        <a href="https://hojyokin-katsuyou.com/mypage">https://hojyokin-katsuyou.com/mypage</a><br/>
        <br/>
        <br/>
        お支払い期限を過ぎてもお支払いの確認ができなかった場合、一部サービスの利用を停止させていただく場合がございますので、ご了承ください。<br/>
        <br/>
        お支払いについてご不明点やお困りごとがございましたらお問い合わせフォームまでお気軽にご連絡ください。<br/>
        今後とも補助金活用.COMをよろしくお願いします。<br/>
        <br/>
        <br/>
        **********************************************************************<br/>
        <br/>
        補助金活用.COM　株式会社八咲<br/>
        eMAIL:info@hojyokin-katsuyou.com<br/>
        URL:https://hojyokin-katsuyou.com/<br/>
        <br/>
        **********************************************************************
	</div>
</div>
@endsection