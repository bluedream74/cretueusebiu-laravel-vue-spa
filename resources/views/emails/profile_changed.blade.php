@extends('layouts.email_layout')

@section('content')

<div class="row ">
	<div class="col-md-12 col-sm-12 notification-title">
    {{ $user->tanto_name }} 様

    このたびは＜補助金活用.COM＞をご利用いただきありがとうございます。
    入力頂いたマイプロフィール情報の変更が完了いたしました。
    支援可能条件を変更された場合は、変更後の条件に応じてマッチング掲載相談内容が更新されます。

    更新日時：{{ date_format($user->updated_at, 'Y/m/d H:i:s') }}

    <?php
      $JOB_KINDS = [
        '一般コンサルタント',
        '公認会計士',
        '税理士',
        '中小企業診断士',
        '弁護士',
        '行政書士',
        '司法書士',
        '金融機関',
        'その他'
      ];

      $CONTENTS = [
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
        'その他'
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

      $PRICES = [
        '5,000万円未満',
        '5,000万円以上3億円未満',
        '3億円以上10億円未満',
        '10億円以上'
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
    ?>

    ―――――――――――――――――――――――――――――――――――
    ■認定支援機関ID番号　：{{ $user->kikan_id }}
    ■会社名　　　　　　　：{{ $user->com_name }}
    ■フリガナ　　　　　　：{{ $user->com_huri_name }}
    ■担当者氏名　　　　　：{{ $user->tanto_name }}
    ■部署名　　　　　　　：{{ $user->department_name }}
    ■役職名　　　　　　　：{{ $user->role_name }}
    ■法人／個人事業主　　：{{ $user->is_personal == 0 ? '法人' : '個人事業主' }}
    ■種別　　　　　　　　：{{ $JOB_KINDS[$user->kind] }}
    ■会社所在地　　　　　：〒{{$user->zipcode}}{{ $user->prefecture }} {{ $user->city }} {{ $user->building }}
    ■電話番号　　　　　　：{{ $user->telephone }}
    ■ＦＡＸ　　　　　　　：{{ $user->fax }}
    ■メールアドレス　　　：{{ $user->email }}
    ■PRポイント　　　　　：
    {{ $user->introduction }}

    【支援可能条件入力欄】
    ■支援可能内容　　　　：
    @foreach($user->available_contents as $content)
      {{ $CONTENTS[$content] }},
    @endforeach
    ■支援可能業種　　　　：
    @foreach($user->available_jobs as $job)
      {{ $JOBS[$job] }},
    @endforeach
    ■支援可能年商　　　　：
    @foreach($user->available_prices as $price)
      {{ $PRICES[$price] }},
    @endforeach
    ■支援可能従業員規模　　　　：
    @foreach($user->available_amounts as $amount)
      {{ $AMOUNTS[$amount] }},
    @endforeach


    **********************************************************************

    補助金活用.COM　株式会社八咲
    eMAIL:info@hojyokin-katsuyou.com
    URL:https://hojyokin-katsuyou.com/

    **********************************************************************
	</div>
</div>
@endsection