<?php

/**
 * Index template
 * 1ページ完結サイトのため、万が一このファイルが読み込まれた場合はトップページへリダイレクトします。
 */

wp_safe_redirect(home_url('/'));
exit;
