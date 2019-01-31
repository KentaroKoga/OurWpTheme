  <section class="pageContent">
    <div class="pageContent_wrapper">

    <?php
    if ( is_home() && current_user_can( 'publish_posts' ) ) :

    printf(
      '<p>' . wp_kses(
        'まだ記事が１つも投稿されていません。 <a href="%1$s">ここから始める</a>.',
        array(
          'a' => array(
            'href' => array(),
          ),
          )
          ) . '</p>',
          esc_url( admin_url( 'post-new.php' ) )
        );

      elseif ( is_search() ) :
      ?>

      <!-- 検索結果が見つからないときのみ -->
      <p>
        申し訳ありません。<br>
        検索結果が見つかりませんでした。
      </p>
      <?php
        get_search_form();

      else :

      ?>

      <!-- 例) 404 -->
      <p>
        お探しのものが見つかりませんでした。<br>
        以下の検索フォームから検索してみてください。
      </p>
      <?php
      get_search_form();

    endif;
    ?>
    </div>
  </section><!-- .pageContent -->
