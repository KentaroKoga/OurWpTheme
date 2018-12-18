<? get_header(); ?>

<?php
if ( have_posts() ) :

  if ( is_home() && ! is_front_page() ) :
    ?>

    <header>
      <h1 class="page-title"><?php single_post_title(); ?></h1>
    </header>
    <?php
  endif;

    while ( have_posts() ) :
      the_post();
    ?>

    <article id="<?php the_ID(); ?>" class="entry">
      <header>
        <h2>
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
        <?php posted_on(); ?>
        <?php posted_by(); ?>
      </header>

      <?php post_thumbnail(); ?>
    </article>

    <?php
    endwhile;

    the_posts_pagination( array(
      'prev_text' => 'PREV',
      'next_text' => 'NEXT'
    ));

else :

    get_template_part( 'template-parts/content', 'none' );

endif;
?>

<? get_footer(); ?>