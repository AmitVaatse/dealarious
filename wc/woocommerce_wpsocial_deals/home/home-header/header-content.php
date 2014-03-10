<?php
/**
 * Home header deal content
 * 
 * Handles to show home header deal content
 *
 * 
 * @package WooCommerce WP Social Deals
 * @since 1.0.0
 */


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>	
		<div>

			<div class="wpsd-img-flag"><?php echo $price;?></div>
			<div class="prod_image">
				<a href="<?php echo $dealurl;?>" title="<?php $dealtitle;?>">
					<img src="<?php echo $dealimg;?>" alt="<?php _e('Deal Image','wpsd');?>" />
				</a>
				</div>
		</div><!--.wpsd-header-img-->
		<div class="prod_spec">
				<div>
			<h1><?php echo $dealtitle;?></h1>
		</div><!--wpsd-left-header-->
		<!--wpsd-text-->
		<p class="margin_zero red"><?php echo $description; ?></p>
		<h4 class="black" style="position:absolute;margin-top:110px;">Our Price : <?php echo $price; ?> </h4>
		<div class="off"><img src="<?php bloginfo('template_url')?>/images/dod.png"></div>