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
          ?>
          <article class="frontNewsEntry">
            <a href="<?php the_permalink(); ?>"><?php fump_post_thumbnail(); ?></a>
            <span class="frontNewsEntry_meta">
              <?php posted_on(); ?>
              <?php fump_category_list(); ?>
            </span>
            <h2 class="frontNewsEntry_title">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
          </article>
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
