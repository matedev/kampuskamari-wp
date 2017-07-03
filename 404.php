<?php get_header(); ?>

<div id="main">
    <div class="splash-block">
        <div class="container">
            <img src="<?php echo get_template_directory_uri()?>/assets/img/phone.png" id="img-phone">
        </div>  
    </div>

    <div class="container separator">
        <div class="separator-content"><img src="<?php echo get_template_directory_uri()?>/assets/img/logo_marker_small.png" height="64px"></div>
    </div>


	<div class="container block">
		<div class="pcontent">
			<main id="main" class="site-main" role="main">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center page404">
						<h2><?php _e( 'This is somewhat embarrassing, isn’t it?', 'citytrack' ); ?></h2>
						<p>It looks like nothing was found at this location. Go back to the <a href="<?php echo get_home_url(); ?>">front page</p>
					</div>
				</div>
			</main>
		</div>
	</div>
</div>

<?php get_footer(); ?>