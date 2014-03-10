<?php
/**
 * Home Deal Normal Price
 * 
 * Handles to Show Deal Normal Price
 * 
 * @package WooCommerce WP Social Deals
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<div class="prod_spec">
	<h1 class="margin_zero black"><?php the_title();?></h1>
									<p class="margin_zero red">dolore eu feugiat nulla facilisis at vero eros et accumsan</p>
									<h3 class="margin_top black">DESCRIPTION</h3>
									<p class="margin_zero grey"><?php the_content();?></p>
	<span><?php _e('Deal Value','wpsd');?></span>
	<div><?php echo $normalprice;?></div>
<!--.wpsd-sub-footer-->