<?php get_header(); ?>

<?php get_sidebar(); ?>

<!-- メインコンテンツ -->
<main>

    <?php
    // ==========================================
    // 共通：固定ページのスラッグ
    // ==========================================
    $top_id = get_option('page_on_front');
    ?>

    <!-- kv -->
    <?php
    // ==========================================
    // kv php
    // ==========================================
    $kv_sp = get_field('kv_img_sp', $top_id) ?: get_theme_file_uri('image/main_sp.jpg');
    $kv_pc = get_field('kv_img_pc', $top_id) ?: get_theme_file_uri('image/main_pc.jpg');
    ?>
    <!-- ========================================== -->
    <!-- kv html -->
    <!-- ========================================== -->
    <div class="p-kv js-kv" style="--kv-bg-sp: url(<?php echo esc_url($kv_sp); ?>); --kv-bg-pc: url(<?php echo esc_url($kv_pc); ?>);">

        <div class="p-kv__container">
            <div class="p-kv__text">
                <p class="p-kv__text-ja">
                    <span class="u-block">未知なる道を、</span>
                    <span class="u-block">走りつづける。</span>
                </p>
                <p class="p-kv__text-en">
                    <span class="u-block">Navigating the Path Forward, Together.</span>
                    <span class="u-block-sp">Every mile reflects our commitment to a lasting partnership </span><span class="u-block-sp">and your business success.</span>
                </p>
            </div>
        </div>
    </div>

    <!-- feature -->
    <?php
    // ==========================================
    // feature php
    // ==========================================

    $img_bg_pc   = get_field('feature_img_main_pc', $top_id) ?: get_theme_file_uri('image/feature_bg.jpg');
    $img_bg_sp   = get_field('feature_img_main_sp', $top_id) ?: get_theme_file_uri('image/feature_bg_sp.jpg');

    $img_sub01_pc = get_field('feature_img_sub01_pc', $top_id) ?: get_theme_file_uri('image/feature_01.jpg');
    $img_sub01_sp = get_field('feature_img_sub01_sp', $top_id) ?: get_theme_file_uri('image/feature_01_sp.jpg');
    $img_sub02_pc = get_field('feature_img_sub02_pc', $top_id) ?: get_theme_file_uri('image/feature_02.jpg');
    $img_sub02_sp = get_field('feature_img_sub02_sp', $top_id) ?: get_theme_file_uri('image/feature_02_sp.jpg');

    $catch = get_field('feature_catch', $top_id) ?: "ものを運び、心をつなぐ。\n人々の生活を支えつづけます。";

    $default_text = "わたしたちの考える物流は、ただの荷物の運搬ではありません。<br>ビジネスの流れ、人々の生活、速度、そして社会のつながりを、あらゆるネットワークでサポートする重要な役割を果たしています。\n"
        . "運搬業者としての役割を超えて、お客さまの想いをたいせつに届けること。それは製品、ギフト、思い出…すべての『もの』に対する私たちの誠実な約束です。\n"
        . "わたしたちはその約束を守るために努力しており、みなさまのビジネスや生活を支え続けることを使命としております。";

    $text = get_field('feature_text', $top_id) ?: $default_text;

    $feature_btn_link = get_field('feature_btn_url', $top_id) ?: array(
        'url'    => '#feature',
        'title'  => '私たちの想い',
        'target' => ''
    );

    $feature_btn_icon = get_field('feature_btn_icon', $top_id) ?: get_theme_file_uri('image/icon_arrow_circle.png');
    ?>

    <!-- ========================================== -->
    <!-- feature html -->
    <!-- ========================================== -->
    <section class="p-feature" id="feature" style="--feature-bg-pc: url(<?php echo esc_url($img_bg_pc); ?>); --feature-bg-sp: url(<?php echo esc_url($img_bg_sp); ?>);">
        <div class="p-feature__container">
            <div class="p-feature__inner">
                <h2 class="p-feature__title">
                    <span class="u-visually-hidden">FEATURE</span>
                    <picture>
                        <source srcset="<?php echo get_theme_file_uri('image/feature_title.png'); ?>" media="(min-width: 768px)" width="1099" height="264">
                        <img src="<?php echo get_theme_file_uri('image/feature_title_sp.png'); ?>" width="333" height="83" alt="" decoding="async">
                    </picture>
                </h2>
                <div class="p-feature__wrapper">

                    <div class="p-feature__image-body">

                        <div class="p-feature__image p-feature__image--main">
                            <picture>
                                <source srcset="<?php echo esc_url($img_sub01_pc); ?>" media="(min-width: 768px)">
                                <img src="<?php echo esc_url($img_sub01_sp); ?>" alt="" decoding="async">
                            </picture>
                        </div>

                        <div class="p-feature__image p-feature__image--sub">
                            <picture>
                                <source srcset="<?php echo esc_url($img_sub02_pc); ?>" media="(min-width: 768px)">
                                <img src="<?php echo esc_url($img_sub02_sp); ?>" alt="" decoding="async">
                            </picture>
                        </div>

                    </div>

                    <div class="p-feature__text-body">
                        <p class="p-feature__catch">
                            <?php
                            if ($catch) {
                                $catch_lines = preg_split('/(\r\n|\r|\n)/', trim($catch));
                                foreach ($catch_lines as $line) {
                                    $line = trim($line);
                                    if ($line !== '') {
                                        echo '<span class="p-feature__catch-item">' . esc_html($line) . '</span>' . "\n";
                                    }
                                }
                            }
                            ?>
                        </p>

                        <div class="p-feature__text-wrapper">
                            <?php
                            if ($text) {
                                $text_paragraphs = preg_split('/(\r\n|\r|\n)/', trim($text));
                                $count = 1;
                                foreach ($text_paragraphs as $para) {
                                    $para = trim($para);
                                    if ($para !== '') {
                                        $nobreak_targets = array('せん。', 'ます。', 'です。');
                                        foreach ($nobreak_targets as $target) {
                                            $para = str_replace($target, '<span class="u-nobreak">' . $target . '</span>', $para);
                                        }
                                        if ($count === 3) {
                                            echo '<p class="p-feature__text p-feature__text--pc">' . wp_kses_post($para) . '</p>' . "\n";
                                        } else {
                                            echo '<p class="p-feature__text">' . wp_kses_post($para) . '</p>' . "\n";
                                        }
                                        $count++;
                                    }
                                }
                            }
                            ?>
                        </div>

                        <div class="p-feature__btn-wrapper">
                            <a href="<?php echo esc_url($feature_btn_link['url']); ?>"
                                class="p-feature__btn"
                                <?php echo !empty($feature_btn_link['target']) ? ' target="' . esc_attr($feature_btn_link['target']) . '"' : ''; ?>>

                                <?php echo esc_html($feature_btn_link['title']); ?>

                                <span class="c-btn-icon p-feature__btn-icon">
                                    <img src="<?php echo esc_url($feature_btn_icon); ?>" alt="" class="c-icon-arrow">
                                </span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- service -->
    <?php
    // ==========================================
    // service php
    // ==========================================
    $service_args = array(
        'post_type'      => 'service',
        'posts_per_page' => -1,
        'order'          => 'ASC',
    );
    $service_query = new WP_Query($service_args);
    ?>

    <!-- ========================================== -->
    <!-- service html -->
    <!-- ========================================== -->
    <section class="p-service" id="service">
        <div class="p-service__container">
            <div class="p-service__text-wrapper">
                <div class="c-title c-title--center p-service__title">
                    <span class="c-title__en p-service__title-en">SERVICE</span>
                    <h2 class="c-title__ja p-service__title-ja">サービス案内</h2>
                </div>
            </div>

            <?php if ($service_query->have_posts()) : ?>
                <ol class="p-service__list">

                    <?php
                    $count = 0;
                    while ($service_query->have_posts()) : $service_query->the_post();
                        $count++;

                        $is_reverse         = ($count % 2 === 0) ? '--reverse' : '';
                        $class_item         = $is_reverse ? ' p-service__item' . $is_reverse : '';
                        $class_img          = $is_reverse ? ' p-service__item-image' . $is_reverse : '';
                        $class_content      = $is_reverse ? ' p-service__item-content' . $is_reverse : '';
                        $class_title        = $is_reverse ? ' p-service__item-title' . $is_reverse : '';
                        $class_num          = $is_reverse ? ' p-service__item-title-number' . $is_reverse : '';
                        $class_text         = $is_reverse ? ' p-service__item-title-text' . $is_reverse : '';
                        $class_body         = $is_reverse ? ' p-service__item-text-body' . $is_reverse : '';
                        $class_p            = $is_reverse ? ' p-service__item-text' . $is_reverse : '';
                        $class_btn_wrapper  = $is_reverse ? ' p-service__item-btn-wrapper' . $is_reverse : '';

                        $service_number = get_field('service_number') ?: sprintf('%02d', $count);
                        $service_desc   = get_field('service_description') ?: 'ここにサービスの説明文が入ります。';

                        $default_sp = get_theme_file_uri('image/service_0' . ($count <= 2 ? $count : 1) . '_sp.jpg');
                        $default_pc = get_theme_file_uri('image/service_0' . ($count <= 2 ? $count : 1) . '.jpg');
                        $img_sp     = get_field('service_image_sp') ?: $default_sp;
                        $img_pc     = get_field('service_image_pc') ?: $default_pc;

                        $service_btn_link = get_field('service_btn_url') ?: array(
                            'url'    => get_post_type_archive_link('service'),
                            'title'  => 'サービスをもっと見る',
                            'target' => ''
                        );

                        $service_btn_icon = get_field('service_btn_icon') ?: get_theme_file_uri('image/icon_arrow_circle.png');
                    ?>

                        <li class="p-service__item<?php echo $class_item; ?>">
                            <div class="p-service__item-image<?php echo $class_img; ?>">
                                <picture>
                                    <source srcset="<?php echo esc_url($img_pc); ?>" media="(min-width: 768px)" width="1080" height="600">
                                    <img src="<?php echo esc_url($img_sp); ?>" width="400" height="257" alt="<?php the_title_attribute(); ?>" decoding="async">
                                </picture>
                            </div>
                            <div class="p-service__item-content<?php echo $class_content; ?>">
                                <div class="p-service__item-title<?php echo $class_title; ?>">
                                    <span class="p-service__item-title-number<?php echo $class_num; ?>">
                                        <?php echo esc_html($service_number); ?>.
                                    </span>
                                    <span class="p-service__item-title-text<?php echo $class_text; ?>">
                                        <?php the_title(); ?>
                                    </span>
                                </div>
                                <div class="p-service__item-text-body<?php echo $class_body; ?>">
                                    <p class="p-service__item-text<?php echo $class_p; ?>">
                                        <?php echo nl2br(esc_html($service_desc)); ?>
                                    </p>

                                    <div class="p-service__item-btn-wrapper<?php echo $class_btn_wrapper; ?>">
                                        <a href="<?php echo esc_url($service_btn_link['url']); ?>"
                                            class="p-service__item-btn"
                                            <?php echo !empty($service_btn_link['target']) ? ' target="' . esc_attr($service_btn_link['target']) . '"' : ''; ?>>

                                            <?php echo esc_html($service_btn_link['title']); ?>

                                            <span class="c-btn-icon p-service__btn-icon">
                                                <img src="<?php echo esc_url($service_btn_icon); ?>" alt="" class="c-icon-arrow">
                                            </span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </li>

                    <?php endwhile; ?>
                </ol>
            <?php else : ?>
                <p style="text-align: center; padding: 40px 0; color: #888;">ただいまサービスの情報を準備中です。</p>
            <?php endif;
            wp_reset_postdata(); ?>
        </div>
    </section>

    <!-- works -->
    <?php
    // ==========================================
    // works php
    // ==========================================
    $works_args = array(
        'post_type'      => 'works',
        'posts_per_page' => 4,
        'order'          => 'ASC',
    );
    $works_query = new WP_Query($works_args);

    $works_first_id = !empty($works_query->posts[0]->ID) ? $works_query->posts[0]->ID : null;

    $works_btn_link = get_field('works_btn_link', $works_first_id) ?: array(
        'url'    => get_post_type_archive_link('works'),
        'title'  => '実績をもっと見る',
        'target' => ''
    );

    $works_btn_icon = get_field('works_btn_icon', $works_first_id) ?: get_theme_file_uri('image/icon_arrow_circle.png');
    ?>
    <!-- ========================================== -->
    <!-- works html -->
    <!-- ========================================== -->
    <section class="p-works" id="works">
        <div class="p-works__container">
            <div class="p-works__text-wrapper">
                <div class="c-title p-works__title">
                    <span class="c-title__en c-title__en--white p-works__title-en">WORKS</span>
                    <h2 class="c-title__ja c-title__ja--white p-works__title-ja">実績紹介</h2>
                </div>
                <p class="p-works__text">
                    <?php
                    $lead_text = get_field('works_lead_text', 'option') ?: "当社は関東エリアを中心に、様々な物流関連業務の実績が<span>ございます。</span><br>多種多様な実績の一部をご覧ください。";
                    echo nl2br($lead_text);
                    ?>
                </p>
            </div>

            <?php if ($works_query->have_posts()) : ?>
                <ul class="p-works__list">
                    <?php
                    $count = 0;

                    while ($works_query->have_posts()) : $works_query->the_post();
                        $count++;

                        $class_item = ($count % 2 !== 0) ? ' p-works__item--offset' : '';

                        $default_pc = get_theme_file_uri('image/works_0' . $count . '.jpg');
                        $default_sp = get_theme_file_uri('image/works_0' . $count . '_sp.jpg');

                        $img_pc     = get_field('works_image_pc') ?: $default_pc;
                        $img_sp     = get_field('works_image_sp') ?: $default_sp;
                    ?>

                        <li class="p-works__item<?php echo $class_item; ?>">
                            <div class="p-works__image">
                                <picture>
                                    <source srcset="<?php echo esc_url($img_pc); ?>" media="(min-width: 768px)" width="740" height="960">
                                    <img src="<?php echo esc_url($img_sp); ?>" width="720" height="480" alt="<?php the_title_attribute(); ?>" decoding="async">
                                </picture>
                            </div>
                            <div class="p-works__content">
                                <p class="p-works__content-title"><?php the_title(); ?></p>
                            </div>
                        </li>

                    <?php endwhile; ?>
                </ul>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>

            <div class="p-works__btn-wrapper">
                <a href="<?php echo esc_url($works_btn_link['url']); ?>"
                    class="p-works__btn"
                    <?php echo !empty($works_btn_link['target']) ? ' target="' . esc_attr($works_btn_link['target']) . '"' : ''; ?>>

                    <?php echo esc_html($works_btn_link['title']); ?>

                    <span class="c-btn-icon p-works__btn-icon">
                        <img src="<?php echo esc_url($works_btn_icon); ?>" alt="" class="c-icon-arrow">
                    </span>
                </a>
            </div>

        </div>
    </section>

    <!-- company -->
    <?php
    // ==========================================
    // company php (「トップページの設定」ページから直接取得)
    // ==========================================

    $default_pc = get_theme_file_uri('image/company.jpg');
    $default_sp = get_theme_file_uri('image/company_sp.jpg');

    $img_pc     = get_field('company_image_pc', $top_id) ?: $default_pc;
    $img_sp     = get_field('company_image_sp', $top_id) ?: $default_sp;

    $default_text = '創業80年を超える歴史を持ち、絶えず技術革新とサービスの向上を追求し続け、多岐にわたる業界ニーズに応えてきました。これからも物流・運送業界におけるリーディングカンパニーとして常に先を走り続けます。';
    $company_text = get_field('company_text', $top_id) ?: $default_text;

    $company_years = get_field('company_years', $top_id) ?: '80';

    $company_bg_url = get_field('company_bg_logo', $top_id);

    if (!empty($company_bg_url)) {
        $company_bg_src = esc_url($company_bg_url);
    } else {
        $company_bg_src = esc_url(get_theme_file_uri('image/logo_bg.svg'));
    }
    ?>

    <!-- ========================================== -->
    <!-- company html -->
    <!-- ========================================== -->
    <section class="p-company" id="company">
        <div class="p-company__container">
            <div class="p-company__img-body">
                <div class="p-company__image">
                    <picture>
                        <source srcset="<?php echo esc_url($img_pc); ?>" media="(min-width: 768px)" width="1398" height="880">
                        <img src="<?php echo esc_url($img_sp); ?>" width="360" height="500" alt="会社案内イメージ" decoding="async">
                    </picture>
                </div>
                <div class="p-company__img-text-body">
                    <div class="p-company__img-text-inner">
                        <p class="p-company__img-text-wrapper">
                            <span class="p-company__img-text">想いを運びつづけて<span class="p-company__img-text--big"><?php echo esc_html($company_years); ?></span>年。</span>
                        </p>
                        <p class="p-company__img-text-wrapper p-company__img-text-wrapper--split">
                            <span class="p-company__img-text">常に先をめざして</span><span class="p-company__img-text">走り続けます。</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="p-company__content">
                <div class="p-company__content-bg"></div>
                <div class="p-company__content-white-box">
                    <div class="c-title c-title--center p-company__title">
                        <span class="c-title__en p-company__title-en">COMPANY</span>
                        <h2 class="c-title__ja p-company__title-ja">会社案内</h2>
                    </div>
                    <div class="p-company__content-inner">

                        <div class="p-company__content-logo">
                            <!-- 新しい背景ロゴ専用の変数 $company_bg_src を表示 -->
                            <img src="<?php echo $company_bg_src; ?>" width="602" height="531" alt="会社ロゴ背景" decoding="async">
                        </div>

                        <div class="p-company__content-text-body">
                            <p class="p-company__text"><?php echo nl2br(wp_kses_post($company_text)); ?></p>
                        </div>

                        <div class="p-company__nav-body">
                            <nav class="p-company__nav">
                                <ul class="p-company__list">
                                    <?php
                                    $menu_name_company = '会社ナビ';
                                    $menu_items_company = wp_get_nav_menu_items($menu_name_company);

                                    if (! empty($menu_items_company)) {
                                        foreach ((array) $menu_items_company as $key => $menu_item) :
                                            $url   = $menu_item->url;
                                            $title = $menu_item->title;

                                            $icon_url = get_field('company_menu_icon', $menu_item) ?: get_theme_file_uri('image/icon_arrow_circle_bl.png');
                                    ?>
                                            <li class="p-company__item">
                                                <a href="<?php echo esc_url($url); ?>" class="p-company__link">
                                                    <?php echo esc_html($title); ?>

                                                    <span class="c-btn-icon p-company__btn-icon">
                                                        <img src="<?php echo esc_url($icon_url); ?>" alt="" class="c-icon-arrow">
                                                    </span>
                                                </a>
                                            </li>
                                        <?php
                                        endforeach;
                                    } else {
                                        $default_menus = array(
                                            array('title' => '会社概要', 'url' => '#'),
                                            array('title' => 'ご挨拶・企業理念', 'url' => '#'),
                                            array('title' => 'アクセスマップ', 'url' => '#'),
                                        );
                                        $default_icon_url = get_theme_file_uri('image/icon_arrow_circle_bl.png');

                                        foreach ($default_menus as $d_menu) :
                                        ?>
                                            <li class="p-company__item">
                                                <a href="<?php echo esc_url($d_menu['url']); ?>" class="p-company__link">
                                                    <?php echo esc_html($d_menu['title']); ?>
                                                    <span class="c-btn-icon p-company__btn-icon">
                                                        <img src="<?php echo esc_url($default_icon_url); ?>" alt="" class="c-icon-arrow">
                                                    </span>
                                                </a>
                                            </li>
                                    <?php
                                        endforeach;
                                    }
                                    ?>
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- news -->
    <?php
    // ==========================================
    // news php
    // ==========================================
    $news_btn_link = array(
        'url'    => get_post_type_archive_link('post'),
        'title'  => 'VIEW MORE',
        'target' => ''
    );

    $news_btn_icon = get_theme_file_uri('image/icon_arrow_circle.png');
    ?>
    <!-- ========================================== -->
    <!-- company html -->
    <!-- ========================================== -->
    <section class="p-news" id="news">
        <div class="p-news__container">
            <div class="p-news__inner">
                <div class="c-title c-title--center p-news__title">
                    <span class="c-title__en p-news__title-en">NEWS</span>
                    <h2 class="c-title__ja p-news__title-ja">お知らせ</h2>
                </div>

                <div class="p-news__content">
                    <?php
                    $args = array(
                        'post_type'      => 'post',
                        'category_name'  => 'news',
                        'posts_per_page' => get_option('posts_per_page'),
                        'post_status'    => 'publish'
                    );
                    $news_query = new WP_Query($args);
                    ?>

                    <?php if ($news_query->have_posts()) : ?>
                        <ul class="p-news__list">
                            <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
                                <li class="p-news__item">
                                    <article class="c-news">
                                        <a href="<?php the_permalink(); ?>" class="c-news__link">
                                            <time datetime="<?php echo get_the_date('Y-m-d'); ?>" class="c-news__date">
                                                <?php echo get_the_date('Y.m.d'); ?>
                                            </time>
                                            <h3 class="c-news__title"><?php the_title(); ?></h3>
                                        </a>
                                    </article>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                        <?php wp_reset_postdata(); ?>
                    <?php else : ?>
                        <p class="p-news__empty">お知らせはありません。</p>
                    <?php endif; ?>
                </div>

            </div>

            <div class="p-news__btn-wrapper">
                <a href="<?php echo esc_url($news_btn_link['url']); ?>"
                    class="p-news__btn"
                    <?php echo !empty($news_btn_link['target']) ? ' target="' . esc_attr($news_btn_link['target']) . '"' : ''; ?>>

                    <?php echo esc_html($news_btn_link['title']); ?>

                    <span class="c-btn-icon p-news__btn-icon">
                        <img src="<?php echo esc_url($news_btn_icon); ?>" alt="" class="c-icon-arrow">
                    </span>
                </a>
            </div>

        </div>
    </section>

    <!-- contact -->
    <?php
    // ==========================================
    // contact php (「トップページの設定」ページから直接取得)
    // ==========================================
    // 1. CSSの背景用画像（第2引数の $contact_page_id を削除し、現在のページから直接取得）
    $img_contact_pc = get_field('contact_bg_pc', $top_id) ?: get_theme_file_uri('image/contact.jpg');
    $img_contact_sp = get_field('contact_bg_sp', $top_id) ?: get_theme_file_uri('image/contact_sp.jpg');
    ?>

    <!-- ========================================== -->
    <!-- contact html -->
    <!-- ========================================== -->
    <section class="p-contact" id="contact" style="--contact-bg-pc: url('<?php echo esc_url($img_contact_pc); ?>'); --contact-bg-sp: url('<?php echo esc_url($img_contact_sp); ?>');">
        <div class="p-contact__container">
            <div class="p-contact__title-wrapper">
                <h2 class="p-contact__title">
                    <span class="u-visually-hidden">CONTACT</span>
                    <picture>
                        <source srcset="<?php echo esc_url(get_theme_file_uri('image/contact_title.png')); ?>" media="(min-width: 768px)" width="878" height="201">
                        <img src="<?php echo esc_url(get_theme_file_uri('image/contact_title_sp.png')); ?>" width="366" height="84" alt="" decoding="async">
                    </picture>
                </h2>
                <p class="p-contact__title-text">
                    <span class="u-block">運送・配送についてのご依頼・</span>
                    <span class="u-block">お問い合わせはこちらから</span>
                </p>
            </div>
            <div class="c-contact-cta p-contact__cta">
                <div class="c-contact-cta__container">
                    <div class="c-contact-cta__info">
                        <!-- ★電話番号と営業時間をACFのオプションページから取得するように修正 -->
                        <div class="c-contact-cta__tel">
                            <?php echo esc_html(get_field('cta_tel', 'option') ?: '000-123-4567'); ?>
                        </div>
                        <div class="c-contact-cta__hours">
                            <?php echo esc_html(get_field('cta_hours', 'option') ?: '営業時間 / 平日 9:00 - 18:00'); ?>
                        </div>
                    </div>
                    <div class="c-contact-cta__mail-body">
                        <a href="#contact" class="c-contact-cta__mail">メールでのお問い合わせ</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php get_footer(); ?>