<?php
/**
 * The template for displaying a list of schemas
 *
 * Used to display archive-type pages
 *
 */

get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

    <?php if ( have_posts() ) : ?>

      <article>
        <div class="entry-content">

          <header class="page-header">
            <h1 class="page-title">Schema Library</h1>
            <?php
              the_archive_description( '<div class="taxonomy-description">', '</div>' );
            ?>
          </header><!-- .page-header -->

          <div ng-app="OMHSchemaLibrary" class="ng-cloak schema-library">
            <?php do_action('omh_schema_library_archive_schema'); ?>
          </div><!-- end schema library angular app -->

        </div>
      </article>

      <?php


    // If no content, include the "No posts found" template.
    else :
      get_template_part( 'template-parts/content', 'none' );

    endif;
    ?>

    </main><!-- .site-main -->
  </div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
