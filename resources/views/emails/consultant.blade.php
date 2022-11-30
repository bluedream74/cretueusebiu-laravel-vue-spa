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

  $JOBS = [
    '農業、林業',
    '漁業',
    '鉱業、採石業、砂利採取業',
    '建設業',
    '製造業',
    '電気',
    'ガス',
    '熱供給',
    '水道業',
    '情報通信業',
    '運輸業',
    '郵便業',
    '卸売業、小売業',
    '金融業、保険業',
    '不動産業、物品賃貸業',
    '学術研究、専門',
    '技術サービス業',
    '宿泊業、飲食サービス業',
    '生活関連サービス業、娯楽業',
    '教育、学習支援業',
    '医療、福祉',
    '複合サービス事業',
    'サービス業（他に分類されないもの）',
    '公務（他に分類されるものを除く）',
    '分類不能の産業'
  ];

  $AMOUNTS = [
    '5人未満',
    '5～9人',
    '10～29人',
    '30～99人',
    '100～499人',
    '500～999人',
    '1,000人以上'
  ];

  $PRICES = [
    '5,000万円未満',
    '5,000万円以上3億円未満',
    '3億円以上10億円未満',
    '10億円以上'
  ];

  $SUPPORT_PRICES = [
    '1,000万円未満',
    '1,000万円以上3,000万円未満',
    '3,000万円以上5,000万円未満',
    '5,000万円以上8,000万円未満',
    '8,000万円以上'
  ];
?>
<div class="row ">
  <div class="col-md-12 col-sm-12 notification-title">
    下記のとおり、事業者相談申し込みを受け付けました。<br/>
    <br/>
    送信日時：{{ date_format($consultant->created_at, 'Y/m/d H:i:s') }}<br/>
    ―――――――――――――――――――――――――――――――――――<br/>
    ■相談内容　　　　：<br/>
    @foreach($consultant->confirms as $confirm)
    {{ $SYSTEM_CONFIRM[$confirm->confirm_id] }}<br/>
    @endforeach
    @foreach($consultant->misss as $miss)
    {{ $SYSTEM_MISS[$miss->miss_id] }}<br/>
    @endforeach
    @foreach($consultant->others as $other)
    {{ $SYSTEM_OTHER[$other->other_id] }}<br/>
    @endforeach
    ■会社名　　　　：{{ $consultant->com_name }}<br/>
    ■業種　　　　　：{{ $JOBS[$consultant->job] }}<br/>
    ■会社所在地　　：〒{{$consultant->zipcode}}　{{ $consultant->prefecture }} {{ $consultant->city }} {{ $consultant->building }}<br/>
    ■従業員規模　　：{{ $AMOUNTS[$consultant->amount] }}<br/>
    ■年商　　　　　：{{$PRICES[$consultant->income]}}<br/>
    ■電話番号　　　：{{ $consultant->telephone }}<br/>
    ■ＦＡＸ　　　　：{{ $consultant->fax }}<br/>
    ■メールアドレス：{{ $consultant->email }}<br/>
    ■担当者氏名　　：{{ $consultant->tanto_name }}<br/>
    ■部署名　　　　：{{ $consultant->department_name }}<br/>
    ■役職名　　　　：{{ $consultant->role_name }}<br/>
    ■投資予定額　　：{{ $SUPPORT_PRICES[$consultant->price] }}<br/>
    ■相談内容概略　：<br/>
    {{ $consultant->message_title }}<br/>
    ■相談内容詳細　：<br/>
    {{ $consultant->message_content }}<br/>
    ■掲載期限　　　：{{ date_format($consultant->expired_at, 'Y/m/d') }}<br/>
    <br/>
    <br/>
    ―――――――――――――――――――――――――――――――――――<br/>
    <br/>
    サイトにこの相談を掲載するには下記承認URLにアクセスしてください。<br/>
    <br/>
    ＜承認URL＞<br/>
    <a href="{{ $url }}">{{ $url }}</a>
	</div>
</div>

@endsection