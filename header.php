<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<title>
        <?php 
            wp_title( '·', TRUE, 'right' );
    	?>    
    </title>
	<?php wp_head(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="mobile-web-app-capable" content="yes">
	<link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri()?>/assets/etc/img/favicon.ico"/>
</head>
<body>
    <div class="top-bar">
      <div class="top-bar-title">
        <span data-responsive-toggle="responsive-menu" data-hide-for="medium">
          <button class="menu-icon dark" type="" data-toggle></button>
        </span>
        <a href="<?php echo get_home_url() ?>"><strong class="logo"><span>Kampus</span>kamari</strong></a>
      </div>
      <div id="responsive-menu">
        <div class="top-bar-left">
          <ul class="menu" data-dropdown-menu>
          <?php wp_nav_menu(array("theme_location" => "primary", 'container' => '', 'items_wrap' => '%3$s')); ?>
            <!--li><a href="registration.html">Registration</a></li-->
          </ul>
        </div>
        <div class="top-bar-right hide-for-small-only">
          <ul class="menu" data-dropdown-menu>
            <li><a href="http://www.tampere.chamber.fi/" target="_blank"><img src="<?php echo get_template_directory_uri()?>/assets/etc/img/kk-logo2.png"></a></li>
            <li><a href="https://www.tampere3.fi/" target="_blank"><img src="<?php echo get_template_directory_uri()?>/assets/etc/img/tre3-logo.png"></a></li>
          </ul>
        </div>
      </div>
    </div>