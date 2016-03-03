<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-content">

    <div ng-app="OMHSchemaLibrary" class="ng-cloak schema-library">
    <?php do_action('omh_schema_library_single_schema'); ?>
    </div><!-- end schema library angular app -->

    <?php
    wp_link_pages( array(
      'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
      'after'       => '</div>',
      'link_before' => '<span>',
      'link_after'  => '</span>',
      'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
      'separator'   => '<span class="screen-reader-text">, </span>',
    ) );
    ?>
  </div><!-- .entry-content -->

  <?php
    edit_post_link(
      sprintf(
        /* translators: %s: Name of current post */
        __( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
        get_the_title()
      ),
      '<footer class="entry-footer"><span class="edit-link">',
      '</span></footer><!-- .entry-footer -->'
    );
  ?>

</article><!-- #post-## -->
