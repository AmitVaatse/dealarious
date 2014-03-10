<?php
/**
 * Home Deal Saving Price
 * 
 * Handles to Show Saving Price
 * Home page loop content
 * 
 * @package WooCommerce WP Social Deals
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<div>
	<span><?php _e('You Save','wpsd');?></span>
	<div><?php echo $savingprice;?></div>
</div><!--.wpsd-sub-footer-last-->