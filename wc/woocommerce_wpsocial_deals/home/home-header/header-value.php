<?php

/**
 * Home page header deal value
 * 
 * Handles to show home page deal value box
 * 
 * @package WooCommerce WP Social Deals
 * @since 1.0.0
 */


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
	<div style="margin-top:40px;">
	<h4 class="black" style="float:left;"><?php _e( 'Retail Price:','wpsd' );?></h4><h4 class="red"><?php echo $normalprice; ?></h4>
	