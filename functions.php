<?php

// テーマのセットアップ
if ( ! function_exists( 'theme_setup' ) ) :

  function theme_setup() {
    add_theme_support( 'post-thumbnails' );

    register_nav_menus( array(
        'header' => 'ヘッダーメニュー',
        'footer' => 'フッターメニュー'
    ) );

    add_theme_support( 'title-tag' );

    add_theme_support( 'custom-logo', array(
      'height' => '250',
      'width' => '250',
      'flex-height' => true,
      'flex-width' => true,
    ) );
    add_theme_support( 'customize-selective-refresh-widgets' );
  }
endif;
add_action( 'after_setup_theme', 'theme_setup' );

// サイドバーの登録
function fump_widgets_init() {
	register_sidebar( array(
		'name'          => 'サイドバー',
		'id'            => 'sidebar',
		'description'   => 'ウィジェットを追加する。',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'fump_widgets_init' );


// css・jsの読み込み
function fump_theme_scripts() {
  wp_enqueue_style( 'fump-style', get_stylesheet_uri() );
  wp_enqueue_script( 'fump-main', get_template_directory_uri() . '/assets/js/main.js', array(), false, true );
}
add_action( 'wp_enqueue_scripts', 'fump_theme_scripts' );


function fump_category_list () {
  $categorys = get_the_category();
  foreach ( $categorys as $category ) {
    echo "<a href='" . esc_url( get_category_link($category->term_id) ) .  "' ";
    echo "class='catList_" . esc_html( $category->slug ) . "'>";
    echo esc_html( $category->name );
    echo "</a>";
  }
}

function fump_aritcle_id () {
  $id = get_the_id();
  $slug = get_post( $id )->post_name;
  if ( empty($slug) ) {
    $slug = '404';
  }
  echo esc_attr($slug);
}


/**
* customize an original output value of archive title.
*/
function customize_get_the_archive_title() {
  if ( is_category() ) {
  /* translators: Category archive title. 1: Category name */
  $title = single_cat_title( '', false );
  } elseif ( is_tag() ) {
  /* translators: Tag archive title. 1: Tag name */
  $title = single_tag_title( '', false );
  } elseif ( is_author() ) {
  /* translators: Author archive title. 1: Author name */
  $title = get_the_author();
  } elseif ( is_year() ) {
  /* translators: Yearly archive title. 1: Year */
  $title = get_the_date( _x( 'Y', 'yearly archives date format' ) );
  } elseif ( is_month() ) {
  /* translators: Monthly archive title. 1: Month name and year */
  $title = get_the_date( _x( 'F Y', 'monthly archives date format' ) );
  } elseif ( is_day() ) {
  /* translators: Daily archive title. 1: Date */
  $title = get_the_date( _x( 'F j, Y', 'daily archives date format' ) );
  } elseif ( is_tax( 'post_format' ) ) {
  if ( is_tax( 'post_format', 'post-format-aside' ) ) {
  $title = _x( 'Asides', 'post format archive title' );
  } elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
  $title = _x( 'Galleries', 'post format archive title' );
  } elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
  $title = _x( 'Images', 'post format archive title' );
  } elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
  $title = _x( 'Videos', 'post format archive title' );
  } elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
  $title = _x( 'Quotes', 'post format archive title' );
  } elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
  $title = _x( 'Links', 'post format archive title' );
  } elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
  $title = _x( 'Statuses', 'post format archive title' );
  } elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
  $title = _x( 'Audio', 'post format archive title' );
  } elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
  $title = _x( 'Chats', 'post format archive title' );
  }
  } elseif ( is_post_type_archive() ) {
  $title = post_type_archive_title( '', false );
  } elseif ( is_tax() ) {
  $tax = get_taxonomy( get_queried_object()->taxonomy );
  $title = sprintf( __( '%1$s: %2$s' ), $tax->labels->singular_name, single_term_title( '', false ) );
  } elseif ( is_search() ) {
  $title = '検索結果 : ' . get_search_query();
  } else {
  $title = __( 'Archives' );
  }
      return $title;
  }

  add_filter('get_the_archive_title', 'customize_get_the_archive_title');





require get_template_directory() . '/inc/template-tags.php';

?>
