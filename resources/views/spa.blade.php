@php
$config = [
    'appName' => config('app.name'),
    'locale' => $locale = app()->getLocale(),
    'locales' => config('app.locales'),
    'githubAuth' => config('services.github.client_id'),
];
@endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TZNDQB8');</script>
<!-- End Google Tag Manager -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1">
  <meta name="referrer" content="origin-when-cross-origin">
  <!--meta name="robots" content="index, follow" /-->
  <meta name="robots" content="noindex">
  <meta name="description"
    content="補助金活用.COMのホームページです。当サイトは事業者の方と国（経済産業大臣）が認定した「認定経営革新等支援機関」をマッチングするサイトです。事業者の方の悩み事、相談事を解決するためにご利用ください。" />
  <meta name="keyword" content="補助金支援,マッチングサイト,補助金申請" />
  <meta property="og:type" content="article" />
  <meta property="og:image" content="https://hojyokin-katsuyou.com/img/common/ogp.png" />
  <meta property="og:site_name" content="補助金活用.COM | 補助金申請のことなら事業者×支援機関マッチングサイト" />
  <meta property="og:title" content="補助金活用.COM | 補助金申請のことなら事業者×支援機関マッチングサイト" />
  <meta property="og:description" content="補助金活用.COMのホームページです。当サイトは事業者の方と国（経済産業大臣）が認定した「認定経営革新等支援機関」をマッチングするサイトです。事業者の方の悩み事、相談事を解決するためにご利用ください。" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="format-detection" content="telephone=no">
  <title>補助金活用.COM | 補助金申請のことなら事業者×支援機関マッチングサイト</title>
  <link rel="shortcut icon" href="/asset/favicon.ico">
  
  <link rel="stylesheet" type="text/css" href="/assets/animation.css" media="all" />

  @if(str_contains($_SERVER['REQUEST_URI'], '/admin') )
  <link rel="stylesheet" type="text/css" href="/admin/css/common.css" media="all" />
  <link rel="stylesheet" type="text/css" href="/admin/css/base.css" media="all" />
  <link rel="stylesheet" type="text/css" href="/admin/css/module.css" media="all" />
  <link rel="stylesheet" type="text/css" href="/admin/css/page.css" media="all" />
  <link rel="stylesheet" type="text/css" href="/admin/css/print.css" media="print" />
  @else
  <link rel="stylesheet" type="text/css" href="/assets/common.css" media="all" />
  <link rel="stylesheet" type="text/css" href="/assets/base.css" media="all" />
  <link rel="stylesheet" type="text/css" href="/assets/module.css" media="all" />
  <link rel="stylesheet" type="text/css" href="/assets/page.css" media="all" />
  <link rel="stylesheet" type="text/css" href="/assets/print.css" media="print" />
  @endif
  <script src="/assets/js/jquery.js"></script>
  <script src="/assets/js/jquery.inview.js"></script>
  <script src="/admin/js/jquery.matchHeight.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700;900&display=swap"
    rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ mix('dist/css/app.css') }}">
</head>
<body class="home">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TZNDQB8"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
  <div id="app"></div>
  {{-- Global configuration object --}}
  <script>
    window.config = @json($config);
  </script>

  {{-- Load the application scripts --}}
  <link rel="stylesheet" type="text/css" href="/assets/slick.css" media="all" />
		<link rel="stylesheet" type="text/css" href="/assets/slick-theme.css" media="all" />
    <script src="{{ mix('dist/js/app.js') }}"></script>
    <!-- <script src="/assets/js/common.js"></script> -->
		<script src="/assets/js/slick.min.js"></script>
    <script src="/admin/js/tinymce/tinymce.min.js"></script>
</body>
</html>
