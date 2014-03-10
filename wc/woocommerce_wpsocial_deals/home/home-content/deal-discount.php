<?php
/**
 * Home Deal Discount
 * 
 * Handles to Show Deal Discount
 * Value for home page loop content
 * 
 * @package WooCommerce WP Social Deals
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<div>
	<span><?php _e('Discount','wpsd');?></span>
	<div><?php echo $discount;?></div>
</div><!--.wpsd-sub-footer-->