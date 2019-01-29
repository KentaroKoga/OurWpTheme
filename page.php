<?php
  get_header();
?>

  <?php
    if ( have_posts() ):
      while ( have_posts() ):
      the_post();
    ?>
    <header class="pageHeader">
      <div class="pageHeader_wrapper">
        <h1 class="pageHeader_title"><?php the_title(); ?></h1>
      </div>
    </header>

    <?php get_template_part( 'breadcrumb' ); ?>

    <section class="pageContent">
      <div class="pageContent_wrapper">
        <?php the_content(); ?>
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

<?php
	get_footer();
