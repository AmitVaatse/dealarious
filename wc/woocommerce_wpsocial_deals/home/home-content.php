<?php
/**
 * Home More Deal Content Template
 * 
 * Handles to show home page more content
 * 
 * @package WooCommerce WP Social Deals
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	global $post;
	
	//check category is set or not
	$category = isset( $category ) && !empty( $category ) ? $category : '';
	
?>
<div class="wpsd-more row-fluid clearfix">

	<div class="wpsd-wprapper">

		<?php
			
			//do action to load home content inner
			//do_action( 'wpsd_home_more_deals', $category );
			
		?>	
			
	</div><!--wpsd-wprapper--></div>
	<!--.row-fluid-->