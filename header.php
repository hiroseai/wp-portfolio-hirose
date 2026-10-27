<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>トランス物流株式会社</title>
    <meta name="description" content="ページの説明">
    <meta name="format-detection" content="telephone=no, email=no">

    <!-- noindex -->
    <meta name="robots" content="noindex , nofollow">

    <?php wp_head(); ?>
</head>

<body <?php body_class('js-body'); ?>>
    <?php
    // ==========================================
    // header php
    // ==========================================
    $top_id = get_option('page_on_front');
    ?>

    <!-- ヘッダー -->
    <header class="l-header js-header">
        <div class="l-header__container">
            <h1 class="l-header__logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo esc_url(get_theme_file_uri('/image/logo.svg')); ?>" width="317" height="44" alt="トランス物流株式会社">
                </a>
            </h1>
            <div class="l-header__hamburger-button js-header__hamburger-button">
                <img src="<?php echo esc_url(get_theme_file_uri('/image/hamburger-button.png')); ?>" class="l-header__hamburger-button-img" width="60" height="42" alt="" decoding="async">
            </div>
            <div class="l-header__hamburger-menu js-header__hamburger-menu">

                <nav class="l-header__nav">
                    <ul class="l-header__list">
                        <?php
                        $header_menu_name = 'header-menu';
                        $locations = get_nav_menu_locations();

                        if (isset($locations[$header_menu_name])) :
                            $menu = wp_get_nav_menu_object($locations[$header_menu_name]);
                            $menu_items = wp_get_nav_menu_items($menu->term_id);

                            if (! empty($menu_items)) :
                                $count = 0;
                                $total_items = count($menu_items);

                                foreach ((array) $menu_items as $key => $menu_item) :
                                    $count++;
                                    $is_contact = ($count === $total_items);
                                    $li_class = $is_contact ? 'l-header__item l-header__item--contact' : 'l-header__item';
                                    $a_class = $is_contact ? 'l-header__item-link l-header__item-link--contact' : 'l-header__item-link';
                                    $url = $menu_item->url;
                                    $title = $menu_item->title;
                        ?>

                                    <li class="<?php echo esc_attr($li_class); ?>">
                                        <a href="<?php echo esc_url($url); ?>" class="<?php echo esc_attr($a_class); ?>"><?php echo esc_html($title); ?></a>
                                    </li>

                        <?php endforeach;
                            endif;
                        endif;
                        ?>
                    </ul>
                </nav>

                <div class="c-contact-cta l-header__cta">
                    <div class="c-contact-cta__container l-header__cta-container">

                        <div class="c-contact-cta__info l-header__cta-info">
                            <!-- ★修正箇所：'option' を $top_id に変更し、デフォルト値を設定 -->
                            <?php $header_tel = get_field('cta_tel', $top_id) ?: '000-123-4567'; ?>
                            <?php if (!empty($header_tel)) : ?>
                                <div class="c-contact-cta__tel l-header__cta-tel">
                                    <?php echo esc_html($header_tel); ?>
                                </div>
                            <?php endif; ?>

                            <!-- ★修正箇所：'option' を $top_id に変更し、デフォルト値を設定 -->
                            <?php $header_hours = get_field('cta_hours', $top_id) ?: '営業時間 / 平日 9:00 - 18:00'; ?>
                            <?php if (!empty($header_hours)) : ?>
                                <div class="c-contact-cta__hours l-header__cta-hours">
                                    <?php echo esc_html($header_hours); ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="c-contact-cta__mail-body l-header__cta-mail-body">
                            <a href="<?php echo esc_url(home_url('/')); ?>#contact" class="c-contact-cta__mail l-header__cta-mail">メールでのお問い合わせ</a>
                        </div>

                        <ul class="c-sns-icon-list l-header__sns-list">
                            <!-- -----------------------------------------
              X (旧Twitter)
            ------------------------------------------ -->
                            <!-- ★修正箇所：'option' を $top_id に変更 -->
                            <?php $twitter_url = get_field('sns_twitter', $top_id) ?: 'https://x.com'; ?>
                            <li class="c-sns-icon c-sns-icon--x-twitter l-header__sns-item l-header__sns-item--x-twitter">
                                <a href="<?php echo esc_url($twitter_url); ?>" class="c-sns-icon__link c-sns-icon__link--x-twitter" target="_blank" rel="noopener noreferrer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="c-sns-icon__svg c-sns-icon__svg--x-twitter c-sns-icon__svg--white" viewBox="0 0 16 17">
                                        <path fill-rule="evenodd" fill="rgb(46, 44, 43)" d="M9.120,7.052 L14.824,0.422 L13.473,0.422 L8.519,6.179 L4.563,0.422 L-0.000,0.422 L5.983,9.127 L-0.000,16.078 L1.352,16.078 L6.583,9.1000 L10.761,16.078 L15.324,16.078 L9.119,7.052 L9.120,7.052 ZM7.268,9.203 L6.662,8.336 L1.839,1.439 L3.915,1.439 L7.808,7.006 L8.414,7.872 L13.473,15.107 L11.397,15.107 L7.268,9.203 L7.268,9.203 Z" />
                                    </svg>
                                </a>
                            </li>

                            <!-- -----------------------------------------
              YouTube
            ------------------------------------------ -->
                            <!-- ★修正箇所：'option' を $top_id に変更 -->
                            <?php $youtube_url = get_field('sns_youtube', $top_id) ?: 'https://youtube.com'; ?>
                            <li class="c-sns-icon c-sns-icon--youtube l-header__sns-item l-header__sns-item--youtube">
                                <a href="<?php echo esc_url($youtube_url); ?>" class="c-sns-icon__link c-sns-icon__link--youtube" target="_blank" rel="noopener noreferrer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="c-sns-icon__svg c-sns-icon__svg--youtube c-sns-icon__svg--white" viewBox="0 0 20 14">
                                        <path fill-rule="evenodd" fill="rgb(46, 44, 43)" d="M19.489,2.183 C19.260,1.323 18.586,0.646 17.729,0.416 C16.177,-0.000 9.951,-0.000 9.951,-0.000 C9.951,-0.000 3.726,-0.000 2.173,0.416 C1.317,0.646 0.642,1.323 0.413,2.183 C-0.003,3.741 -0.003,6.992 -0.003,6.992 C-0.003,6.992 -0.003,10.242 0.413,11.799 C0.642,12.659 1.317,13.336 2.173,13.566 C3.726,13.983 9.951,13.983 9.951,13.983 C9.951,13.983 16.177,13.983 17.729,13.566 C18.586,13.336 19.260,12.659 19.489,11.799 C19.905,10.242 19.905,6.992 19.905,6.992 C19.905,6.992 19.905,3.741 19.489,2.183 ZM7.960,9.987 L7.960,3.995 L13.132,6.992 L7.960,9.987 Z" />
                                    </svg>
                                </a>
                            </li>

                            <!-- -----------------------------------------
              Instagram
            ------------------------------------------ -->
                            <!-- ★修正箇所：'option' を $top_id に変更 -->
                            <?php $instagram_url = get_field('sns_instagram', $top_id) ?: 'https://instagram.com'; ?>
                            <li class="c-sns-icon c-sns-icon--instagram l-header__sns-item l-header__sns-item--instagram">
                                <a href="<?php echo esc_url($instagram_url); ?>" class="c-sns-icon__link c-sns-icon__link--instagram" target="_blank" rel="noopener noreferrer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="c-sns-icon__svg c-sns-icon__svg--instagram c-sns-icon__svg--white" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" fill="rgb(46, 44, 43)" d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.051.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
    </header>