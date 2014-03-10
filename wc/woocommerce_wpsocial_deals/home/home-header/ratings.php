<?php
/**
 * Home header star ratings
 * 
 * Handles to show home
 * star ratings
 *
 * 
 * @package WooCommerce WP Social Deals
 * @since 1.0.0
 */


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

//if rating is empty then do not load its html
if( empty( $rating ) ) return;

?>
	<div class="wpsd-rating">
		<div class="wpsd-rating-label"><?php _e('Customer Rating','wpsd');?></div>
		<div class="review-star wps-fbre-stars_<?php echo $rating;?>stars"></div>
	</div><!--.wps-deals-rating-->