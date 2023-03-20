@extends('layouts.email_layout')

@section('content')
<?php
    $SYSTEM_CONFIRM = [
    '事業再構築補助金',
    'ものづくり補助金',
    '小規模事業者補助金',
    '創業支援',
    '事業承継支援',
    '経営改善計画策定',
    'IT導入補助金',
    '経営力向上計画',
    '先端設備等導入計画',
    '経営革新計画',
    '事業継続力強化計画',
  ];

  $SYSTEM_MISS = [
    '設備を導入したい・設備投資をしたい',
    'Webサイトを作りたい・改善したい',
    'ショッピングサイトを作りたい・改善したい',
    '試作品を作りたい',
    '開発したいことがある',
    '生産性を改善したい・作業を効率化したい',
    '人材育成したい・人材確保したい',
    '品質を改善したい',
    '経営を改善したい・経営を革新したい',
    '起業スタートアップを支援してほしい',
    '設備や作業をIT化したい',
    'キャッシュレス化したい・会計ソフトを導入したい',
    '違う事業を始めたい',
    '違う事業に変更したい',
    '会社を譲りたい・事業を譲りたい',
    '会社を買いたい・事業を買いたい',
    '災害や突然の社会情勢変化に強い会社にしたい',
    '他の事業者と連携し新たな取組をしたい',
    '海外展開したい',
    '販路開拓したい'
  ];

  $SYSTEM_OTHER = [
    'その他',
    '連携相談'
  ];
?>
<div class="row ">
	<div class="col-md-12 col-sm-12 notification-title">
        {{ $user->com_name }} 様<br/>
        <br/>
        このたびは＜補助金活用.COM＞の事業者相談へのご回答ありがとうございます。<br/>
        入力頂いた内容にて、事業者に相談への回答を送信（応募）しました。<br/>
        本機能でのメール送信は初回のみのご利用となります。<br/>
        以降の事業者様との連絡・相談につきましては、本メール内に記載の連絡先電話番号をご利用ください。<br/>
        なお送信済みの回答内容及び、連絡先電話番号につきましてはマイページ内の「過去の回答」一覧からもご確認いただけます。<br/>
        <br/>
        送信日時：{{ date_format(date_create($answer->created_at), 'Y/m/d H:i') }}<br/>
        ―――――――――――――――――――――――――――――――――――<br/>
        ■相談者会社名　　　　：{{ $consultant->com_name }}<br/>
        ■電話番号　　　　　　：{{ $consultant->telephone }}<br/>
        ■メールアドレス　　　：{{ $consultant->email }}<br/>
        ■担当者氏名　　　　　：{{ $consultant->tanto_name }}<br/>
        ■相談内容　　　　　　：<br/>
        【使いたい補助金や制度が決まっている方】<br/>
        @foreach($consultant->confirms as $confirm)
        {{ !is_null($confirm->confirm_id) ? $SYSTEM_CONFIRM[$confirm->confirm_id] : '' }}<br/>
        @endforeach
        【該当の補助金や制度が不明な方】<br/>
        @foreach($consultant->misss as $miss)
        {{ !is_null($miss->miss_id) ? $SYSTEM_MISS[$miss->miss_id] : '' }}<br/>
        @endforeach<br/>
        【その他】<br/>
        @foreach($consultant->others as $other)
        {{ !is_null($other->other_id) ? $SYSTEM_OTHER[$other->other_id] : '' }}<br/>
        @endforeach
        <br/>
        ■相談内容概略　　　　：<br/>
        {{ $consultant->message_title }}<br/>
        ■相談内容詳細　　　　：<br/>
        {{ $consultant->message_content }}<br/>
        @if(!is_null($consultant->expire_date))
        ■掲載期限　　　　　　：{{ date_format($consultant->expire_date, 'Y/m/d') }}<br/>
        @endif
        <br/>
        ■回答者会社名　　　　：{{ $user->com_name }}<br/>
        ■フリガナ　　　　　　：{{ $user->com_huri_name }}<br/>
        ■担当者氏名　　　　　：{{ $user->tanto_name }}<br/>
        ■電話番号　　　　　　：{{ $user->telephone }}<br/>
        ■メールアドレス　　　：{{ $user->email }}<br/>
        ■回答入力　　　　　　：<br/>
        {{ $answer->answer }}<br/>
        <br/>
        <br/>
        **********************************************************************<br/>
        <br/>
        補助金活用.COM　株式会社八咲<br/>
        eMAIL:info@hojyokin-katsuyou.com<br/>
        URL:https://hojyokin-katsuyou.com/<br/>
        <br/>
        **********************************************************************<br/>
	</div>
</div>
@endsection