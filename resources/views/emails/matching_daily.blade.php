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
        {{ $user->com_name }}<br/>
        {{ $user->tanto_name }} 様<br/>
        <br/>
        いつも＜補助金活用.COM＞をご利用いただきありがとうございます。<br/>
        <br/>
        設定頂いた支援条件とマッチングする事業者相談を新たに{{ count($newJobs) }}件公開いたしました。<br/>
        上記を含め現在{{ count($filtered) }}件の未確認事業者相談をマイページに掲載しております。<br/>
        <br/>
        <a href="https://hojyokin-katsuyou.com/mypage">https://hojyokin-katsuyou.com/mypage</a><br/>
        <br/>
        ご不明点やお困りごとがございましたらお問い合わせフォームにご連絡ください。<br/>
        今後とも補助金活用.COMをよろしくお願いします。<br/>
        <br/>
        <br/>
        <br/>
        ************************マッチング案件一覧****************************<br/>
        <br/>
        @foreach ($newJobs->values() as $key => $job)
        {{ $key + 1 }}/{{count($newJobs)}}件目の新着事業者相談<br/>
        ―――――――――――――――――――――――――――――――――――<br/>
        ■相談者会社名　　　　：{{ $job->com_name }}<br/>
        ■担当者氏名　　　　　：{{ $job->tanto_name }}<br/>
        ■相談内容　　　　　　：<br/>
        【使いたい補助金や制度が決まっている方】<br/>
        @foreach($job->confirms as $confirm)
        {{ !is_null($confirm->confirm_id) ? $SYSTEM_CONFIRM[$confirm->confirm_id] : '' }}<br/>
        @endforeach
        【該当の補助金や制度が不明な方】<br/>
        @foreach($job->misss as $miss)
        {{ !is_null($miss->miss_id) ? $SYSTEM_MISS[$miss->miss_id] : '' }}<br/>
        @endforeach
        【その他】<br/>
        @foreach($job->others as $other)
        {{ !is_null($other->other_id) ? $SYSTEM_OTHER[$other->other_id] : '' }}<br/>
        @endforeach
        ■相談内容概略　　　　：<br/>
        {{ $job->message_title }}<br/>
        <?php 
            $expire_date = date_create($job->expired_at); 
        ?>
        ■掲載期限　　　　　　：{{ date_format($expire_date, 'Y/m/d') }}<br/>
        @endforeach
	</div>
</div>
@endsection