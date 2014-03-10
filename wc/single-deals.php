<?php 
/**
 * The Template for displaying deal archives, including the main home page which is a deals listing
 *
 * Override this template by copying it to yourtheme/wocommerce_wpsocial_deals/home-deals.php
 *
 * @package WooCommerce WP Social Deals
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	
get_header();

	global $wpsd_render,$post;
	
	$size = get_option('deals_size');
	
	$disable_more_deals = get_option('disable_more_deals');
	
	//render class
	$render = $wpsd_render;
?>
	
		
		<?php do_action( 'woocommerce_archive_description' ); ?>
				
			<?php 
				//do action to add in top of home page
				//do_action( 'wpsd_home_top');
			?>
				<div>
								
				<?php 	
					//do action to add before home header
					do_action( 'wpsd_home_content' );
				?>
						
			</div><!--.wpsd-front-->
		</div>