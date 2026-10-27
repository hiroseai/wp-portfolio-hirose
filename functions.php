<?php

/**
 * CSSやJavaScriptを安全に読み込む関数
 */
function my_theme_enqueue_styles_scripts()
{
    // 1. リセットCSS（ress.min.css）を読み込む
    wp_enqueue_style('theme-reset', 'https://unpkg.com/ress@5.0.2/dist/ress.min.css');

    // 2. Google Fonts を読み込む
    wp_enqueue_style('theme-google-fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Oswald:wght@200..700&display=swap', array(), null);

    // 3. テーマ情報（コメント欄）の入った「style.css」を認識させる
    wp_enqueue_style('theme-base-info', get_stylesheet_uri());

    // 4. メインのデザインCSS（css/main.css）を安全に読み込む
    // array('theme-reset') と書くことで、必ずリセットCSSの後に main.css が読み込まれるようになります
    wp_enqueue_style('theme-main-style', get_theme_file_uri('/css/main.css'), array('theme-reset'));

    // 5. メインのJS（js/main.js）を安全に読み込む
    wp_enqueue_script('theme-main-script', get_theme_file_uri('/js/main.js'), array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles_scripts');

/**
 * テーマの機能をセットアップする関数
 */
function my_theme_setup()
{
    // 1. 管理画面に「メニュー」の編集画面を有効化する設定
    register_nav_menus(array(
        'header-menu' => 'ヘッダーナビゲーション',
        'company-nav' => '会社ページナビゲーション',
        'footer-menu' => 'フッターナビゲーション',
    ));

    // 2. 投稿や固定ページで「アイキャッチ画像（サムネイル）」を使えるようにする設定
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'my_theme_setup');

/**
 * 既存の関数の終わり
 */
// 管理画面（!is_admin）ではなく、かつ get_field が存在しない場合のみ定義する
if (! is_admin() && ! function_exists('get_field')) {
    function get_field($selector, $post_id = false, $format_value = true)
    {
        return false;
    }
}
