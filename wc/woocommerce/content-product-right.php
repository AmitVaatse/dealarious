<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
//$classes = array();
//if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
//	$classes[] = 'first';
//if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
//	$classes[] = 'last';
?>


	<a href="<?php the_permalink(); ?>">
		<div class="cpr_content">
						<div class="cpr_image"><?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="300px" height="300px" />'; ?></div>
					<div class="cpr_info">
						<div class="cpr_info_box">
							<h1><?php the_title(); ?></h1>
							<del style="float:left;"><?php echo get_woocommerce_currency_symbol().get_post_meta( $post->ID, '_regular_price', true); ?></del>
							<ins><?php echo get_woocommerce_currency_symbol(). get_post_meta( $post->ID, '_sale_price', true); ?></ins>
							<div class="inside-t" style="float:left">
					           <h6>  
						           	<?php 
									$percentage = round( ( ( $product->regular_price - $product->sale_price ) / $product->regular_price ) * 100 );
									echo $price . sprintf( __('%s', 'woocommerce' ), $percentage . '%' ); ?>
								</h6>
							</div>
		        	<h4 style="text-align: left;float: right;top: -20px;position: relative;right: 76px;"><?php get_star_rating();?></h4>
						<?php the_excerpt(); ?>
					</div>
						<div class="cpr_ship">
							<div class="ship">
								<div class="ship_image"><img src="<?php bloginfo('template_url'); ?>/images/ship.png"></div>
								<div class="ship_text">Dispatched in 3 business days</div>
							</div>
							<div class="ship_right">
								<h3>View Detail</h3><h3>|</h3><h3>Add to wishlist</h3>
								<div class="buy change"style="width:134px;float:left;margin-top:5px;"><?php do_action( 'woocommerce_after_shop_loop_item' ); ?></div>							
								
							</div>
						</div>
					</div>	

				</div>
	</a>

	
