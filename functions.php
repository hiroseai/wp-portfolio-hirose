<?php

/**
 * CSSやJavaScriptを安全に読み込む関数
 */
function my_theme_enqueue_styles_scripts()
{
    wp_enqueue_style('theme-reset', 'https://unpkg.com/ress@6.0.0/dist/ress.min.css');

    wp_enqueue_style('theme-google-fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Oswald:wght@200..700&display=swap', array(), null);

    wp_enqueue_style('theme-base-info', get_stylesheet_uri());

    wp_enqueue_style('theme-main-style', get_theme_file_uri('/css/main.css'), array('theme-reset'));

    wp_enqueue_script('theme-main-script', get_theme_file_uri('/js/main.js'), array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles_scripts');

/**
 * テーマの機能をセットアップする関数
 */
function my_theme_setup()
{
    register_nav_menus(array(
        'header-menu' => 'ヘッダーナビゲーション',
        'company-nav' => '会社ページナビゲーション',
        'footer-menu' => 'フッターナビゲーション',
    ));

    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'my_theme_setup');

/**
 * 既存の関数の終わり
 */
if (! is_admin() && ! function_exists('get_field')) {
    function get_field($selector, $post_id = false, $format_value = true)
    {
        return false;
    }
}
