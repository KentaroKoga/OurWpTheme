<!DOCTYPE html>
<html lang="jp">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<?php wp_head(); ?>
</head>
<body>
<?php
  $logo = get_custom_logo();
?>

<header class="header">
  <div class="header_wrapper">
    <?php if ( is_front_page() ) :?>
      <h1 class="siteTitle">
      <?php
        if ( $logo ):
          the_custom_logo();
        else:
      ?>
        <a href="<?= esc_url( home_url('/') ) ?>">
          <?php bloginfo('name'); ?>
        </a>
      <?php
        endif;
      ?>
      </h1>
    <?php else : ?>
      <p class="siteTitle">
      <?php
        if ( $logo ):
          the_custom_logo();
        else:
      ?>
        <a href="<?= esc_url( home_url('/') ) ?>">
          <?php bloginfo('name'); ?>
        </a>
      <?php
        endif;
      ?>
      </p>
    <?php endif ; ?>

    <?php get_template_part( 'navMenu' ); ?>

  </div>

</header>

<div class="container">
  <main id="main">
    <article id="<?php fump_aritcle_id() ?>">
