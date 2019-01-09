<?php
  get_header();
?>
  <header class="frontPageHeader">
    <div class="frontPageHeader_wrapper">
      <h1 class="frontPageHeader_title">Our WP Theme</h1>
      <p class="frontPageHeader_subtitle">WordPress theme developed by Fump</p>
    </div>
  </header>

  <section class="pageContent">

    <section class="frontNews">
      <div class="frontNews_title">
        <h2 class="frontNews_title-l">News</h2>
        <p class="frontNews_title-s">お知らせ</p>
      </div>
      <div class="frontNews_posts">
          <?php
            $args = array(
              'posts_per_page' => 3
            );
            $posts = get_posts( $args );
            foreach ( $posts as $post ):
            setup_postdata( $post );
            $cats = get_the_category( $post );
            $catUrl = get_category_link($cats[0]->term_id);
            $catName = $cats[0]->name;
          ?>
          <div class="frontNews_post">
            <a href="<?php the_permalink(); ?>"><?php post_thumbnail(); ?></a>
            <span class="frontNews_post-info">
              <time class="frontNews_post-date"><?= get_the_date(); ?></time>
              <a href="<?= esc_url( $catUrl ); ?>" class="frontNews_post-cat"><?= esc_html( $catName ); ?></a>
            </span>
            <a href="<?php the_permalink(); ?>"><h2 class="frontNews_post-title"><?php the_title(); ?></h2></a>
          </div>
          <?php
            endforeach;
            wp_reset_postdata();
          ?>
      </div><!--frontNews_posts-->
    </section>
  </section>
</article>

</main>

<?php
	get_footer();
