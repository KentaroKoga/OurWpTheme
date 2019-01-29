<?php
  $post_id = get_queried_object_id();
  $post_title = get_the_title( $post_id );
?>
<div class="breadcrumb">
  <ul class="breadcrumb_wrapper">
    <li><a href="<?= esc_url( home_url() ); ?>">HOME</a> / </li>
    <?php if(is_single()):?>
    <?php
      $cats = get_the_category( $post_id );
      $current = $cats[0];
      foreach ( $cats as $cat ):
        if ( $cat->parent !== 0 ) {
          $current = $cat;
          break;
        }
      endforeach;
      $catUrl = get_category_link($current->cat_ID);
      $catName = $current->name;
    ?>
      <li><a href="<?= esc_url( $catUrl ); ?>"><?= esc_html( $catName ); ?></a> / </li>
      <li><?= esc_html( $post_title ); ?></li>
    <?php elseif ( is_page() ): ?>
      <li><?= esc_html( $post_title ); ?></li>
    <?php elseif ( is_404() ): ?>
      <li>ページが見つかりませんでした。</li>
    <?php elseif ( is_home() ): ?>
      <li>最新記事一覧</li>
    <?php elseif ( is_category() ): ?>
      <?php
        $bc = '';
        $cat = get_queried_object();
        $catName = $cat->name;
        if ( $cat->parent !== 0 ) {
          $ancs = get_ancestors( $cat->cat_ID, 'category' );
          $anc = $ancs[0];
          $bc .= '<li><a href="' . get_category_link( $anc ) . '">' . get_cat_name( $anc ) . '</a></li>';
        }
        $bc .= '<li>'. esc_html( $catName ) .'</li>';
        echo $bc;
      ?>
    <?php endif; ?>
  </ul>
</div>
