<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage wc
 * @since wc 5.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body> 
<div id="header">
	<div class="container">
	  <div class="logo"><a href="<?php bloginfo( 'url' ); ?>"><img src="<?php bloginfo('template_url'); ?>/images/wc_logo.png"></a></div>
	  <div class="subscribe">
	  			<form method="get" class="searchform1" action="<?php echo home_url( '/' ); ?>" >
			        <input type="text" class="searchform" name="s" placeholder="<?php esc_attr_e( 'Search For Product...', 'woothemes' ); ?>" />
			        <input type="submit" class="search" name="submit" alt="Submit" value="Search" />
    			</form> 
    			<img src="<?php bloginfo('template_url')?>/images/searchside.png" style="margin-top: -38px;position: relative;float: right;margin-right: 78px;"/>
   	  </div>
	  <div class="guest">
	  	 <?php if ( is_user_logged_in() ) { ?>
 	<a href="<?php echo get_permalink( get_option('woocommerce_logout_page_id') ); ?>"><?php woocommerce_cart_link2();?></a>
 <?php } 
 else { ?>
 	<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" ><?php woocommerce_cart_link1();?></a>
 <?php } ?>
	  		
	  		<div id="drop" style="display:none">
	  			<a href="#">
	  				<h1 class="rown">hello</h1>
	  			</a>
	  			<a href="#">
	  				<h1 class="rown">hello</h1>
	  			</a>
	  			<a href="#">
	  				<h1 class="rown">hello</h1>
	  			</a>
	  		</div>
	  </div>
    </div>   
    <div class="just"></div> 
</div>
<div class="menusp">
	<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav' ,'container' => 'div') ); ?>
</div>