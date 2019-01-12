<?php
  get_header();
?>

<?php
  if ( have_posts() ):
    while ( have_posts() ):
      the_post();
?>

  <header class="singleHero">
    <?php fump_post_thumbnail(); ?>
  </header>
  <?php get_template_part( 'breadcrumb' ); ?>

  <section class="singleContent">
    <div class="singleContent_wrapper">
      <div class="singleHeader">
        <div class="singleHeader_meta">
          <?php posted_on(); ?>
          <?php posted_by(); ?>
        </div>
        <h1 class="singleHeader_title"><?php the_title(); ?></h1>
        <p class="catList"><?php fump_category_list(); ?></p>
      </div>
      <?php
        the_content() ;
      ?>
    </div>
  </section>

  <?php
    endwhile;
    else:
  ?>

  <p>投稿が見つかりません。</p>

  <?php
    endif;
  ?>

</article>

</main>

<?
	get_footer();
