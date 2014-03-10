<?php
/**
 * Price Flag Small Template
 * 
 * Handles to show small price flag on 
 * deals image
 * 
 * @package WooCommerce WP Social Deals
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<div class="prod_image">
	<a href="<?php echo $dealurl;?>" title="<?php echo $dealtitle;?>">
		<img src="<?php echo $dealimg;?>" alt="<?php _e('Deal Image','wpsd');?>" />
	</a>
</div><!--.wpsd-home-content-img-->