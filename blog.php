<?php
/*Template Name: blog*/


get_header();

$src = wp_get_attachment_image_src( get_post_thumbnail_id(9), 'thumbnail_size' );
$splash_url = $src[0];

$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$args = array(
  'post_type' => 'post',
  'posts_per_page' => 1,
  'paged' => $paged
);
 
$custom_query = new WP_Query( $args );
?>

<div id="blog">

    <div class="splash-block" style="background-image: url(<?php echo $splash_url; ?>);">
        <!--img src="<?php echo get_template_directory_uri()?>/assets/img/citymap_white.png" id="img-map-white"-->
    </div>

    <div class="container separator">
        <h1 class="separator-content"><img src="<?php echo get_template_directory_uri()?>/assets/img/logo_marker_small.png" height="63px"></h1>
    </div>

    <div id="posts" class="block container">

      <?php if ( $custom_query->have_posts() ) : ?>

        <!-- the loop -->
        <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

        <article class="row apost">
            <div class="post-header col-md-12">
                    <p>Posted on <span id="post-date"><?php echo $post->post_date; ?></span>
                    <strong> by <span id="post-author"><?php the_author(); ?></span></strong></p>
                
            </div>
            <div class="post-img">
                <div class="img-container text-center">
                    <?php echo get_the_post_thumbnail($post->ID, 'large'); ?>
                </div>
            </div>
            <div class="post-body">
                <h1 class="post-title text-blue">
                    <?php the_title(); ?>
                </h1>
                <p class="post-text demo1">
                    <?php the_content(); ?>
                </p>
            </div>
        </article>



        <?php endwhile; ?>
        <!-- end of the loop -->

        <!-- pagination here -->
        <?php
          if (function_exists(custom_pagination)) {
            custom_pagination($custom_query->max_num_pages,"",$paged);
          }
        ?>

      <?php wp_reset_postdata(); ?>

      <?php else:  ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
      <?php endif; ?>

    </div>
</div>  

<?php include 'inc/partners.php';?>
<?php get_footer(); ?>