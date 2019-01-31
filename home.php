<?php
  get_header();
?>

<?php
if ( have_posts() ) :

  if ( is_home() && ! is_front_page() ) :
    ?>

    <header class="pageHeader">
      <div class="pageHeader_wrapper">
        <h1 class="pageHeader_title"><?php single_post_title(); ?></h1>
      </div>
    </header>

    <?php get_template_part( 'breadcrumb' ); ?>

    <div class="entryContainer">
      <div class="entryContainer_wrapper">

    <?php
  endif;

    while ( have_posts() ) :
      the_post();
    ?>

    <article id="<?php the_ID(); ?>" class="entry">
      <?php fump_post_thumbnail(); ?>
      <header>
        <h2 class="entry_title">
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
        <?php posted_on(); ?>
        <?php posted_by(); ?>
      </header>
    </article>

    <?php
    endwhile;
    ?>

      </div><!--entryContainer_wrapper-->
    </div><!--entryContainer-->

    <?php
    the_posts_pagination( array(
      'prev_text' => 'PREV',
      'next_text' => 'NEXT'
    ));

else :

    get_template_part( 'template-parts/content', 'none' );

endif;
?>

</article>

</main>

<?
	get_sidebar();
	get_footer();
