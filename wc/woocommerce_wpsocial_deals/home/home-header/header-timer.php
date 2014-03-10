<?php

/**
 * Home page header deal ending timer
 * 
 * Handles to make home page header timer
 * 
 * @package WooCommerce WP Social Deals
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>	
<!--wpsd-right-header-->
<div class="wpsd-timing-front">
	<div align="center" class="wpsd-time">
		<span class="timer-icon-big" style="font-size:20px;position:absolute;left:10px;top:18px;">Time Left:</span>
		<span class=" position">
		<span class="wpsd-days digit static"></span>&nbsp;
		</span>
		<span  style="position:absolute;"><?php _e(':','wpsd');?></span>&nbsp;
		<span class=" position">
		<span class="wpsd-hrs digit static"></span>&nbsp;
		</span>
		<span style="position:absolute;"><?php _e(':','wpsd');?></span>&nbsp;
		<span class=" position">
		<span class="wpsd-mins digit static"></span>&nbsp;
		</span>
		<span style="position:absolute;"><?php _e(':','wpsd');?></span>&nbsp;
		<span class=" position">
		<span class="wpsd-secs digit static"></span>&nbsp;
		</span>
	</div><!--wpsd-time-->
	<div class="names">
		<span style="padding-right:40px;"><?php _e('days','wpsd');?></span>&nbsp;
		<span style="padding-right:40px;"><?php _e('Hrs','wpsd');?></span>&nbsp;
		<span style="padding-right:30px;"><?php _e('Mins','wpsd');?></span>&nbsp;
		<span style="padding-right:30px;"><?php _e('Secs','wpsd');?></span>&nbsp;
	</div>
</div><!--.wpsd-timing-front-->