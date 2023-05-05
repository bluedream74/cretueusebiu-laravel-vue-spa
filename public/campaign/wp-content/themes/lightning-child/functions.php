<?php
/**
 * Lightning Child theme functions
 *
 * @package lightning
 */

//WordPress 本体の jQuery を登録解除
function delete_jquery() {
  if (!is_admin()) {
    wp_deregister_script('jquery');
  }
}
add_action('init', 'delete_jquery');

//親テーマのスタイルシートを無効化
function denqueue_parent_scripts() {
	$remove_styles = array( 'vkExUnit_common_style', 'wp-block-library','vk-swiper-style','lightning-common-style-inline','lightning-design-style','lightning-design-style-inline','vk-blog-card','vk-blocks-build-css','vk-blocks-build-css-inline','lightning-common-style','vk-swiper-script','bootstrap-4-style' );
    foreach( $remove_styles as $target ) {
        if( wp_style_is($target) ) { // スタイルシートが登録済みかチェック
            wp_dequeue_style($target); // スタイルシートを削除する
        }
    }
}
add_action( 'wp_enqueue_scripts', 'denqueue_parent_scripts', 11 );

function rem_cat_function($link) {
return str_replace("/category/", "/", $link);
}
add_filter('user_trailingslashit', 'rem_cat_function');
function rem_cat_flush_rules() {
global $wp_rewrite;
$wp_rewrite->flush_rules();
}
add_action('init', 'rem_cat_flush_rules');
function rem_cat_rewrite($wp_rewrite) {
$new_rules = array('(.+)/page/(.+)/?' => 'index.php?category_name='.$wp_rewrite->preg_index(1).'&paged='.$wp_rewrite->preg_index(2));
$wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}
add_filter('generate_rewrite_rules', 'rem_cat_rewrite');
/* 固定ページのスラッグをクラス名に追加 */
function my_body_class($classes) {
    if (is_page()) {
        $page = get_post();
        $classes[] = $page->post_name;
    }
    return $classes;
}
add_filter('body_class', 'my_body_class');

