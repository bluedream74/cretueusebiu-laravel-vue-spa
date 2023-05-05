<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WRTNZNH');</script>
<!-- End Google Tag Manager -->
<meta charset="<?php bloginfo('charset'); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=1124">
<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/common/favicon.ico" type="image/vnd.microsoft.icon">
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/common/favicon.ico" type="image/vnd.microsoft.icon">
<meta property="og:url" content="https://hojyokin-katsuyou.com/campaign/" />
<meta property="og:image" content="<?php echo get_stylesheet_directory_uri(); ?>/img/common/ogp.png" />
<meta property="og:site_name" content="補助金活用.COM" />
<meta name="format-detection" content="telephone=no">
<meta name="description" content="<?php bloginfo('description'); ?>">
<meta name="keyword" content="補助金支援,マッチングサイト,補助金申請" />
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/common.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/base.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/module.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/page.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/print.css" media="print" />
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/animation.css" media="all" />
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.inview.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/common.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700;900&display=swap" rel="stylesheet">
<?php
global $lightning_theme_options;
$lightning_theme_options = get_option( 'lightning_theme_options' );
?>
<?php wp_head(); ?>
</head>
<?php
if( is_front_page() ) {
?>
<body id="top" class="home campaign">
<?php
}
else {
?>
<body id="top" <?php body_class('campaign common_page'); ?>>
<?php
}
?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WRTNZNH"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<header id="fix_menu">
		<div class="menu_top block_link fix">
			<div id="site_ttl">
				<p><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/common/logo.png" alt="補助金活用.COM"></p>
			</div>
		</div>
	</header>
	<main>