<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header('shop'); ?>

	<div class="content">
			<div class="cp_bar">
				<img src="<?php bloginfo('template_url'); ?>/images/bar.png">
				<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
				<div class="text"><?php woocommerce_page_title(); ?></div>
				<?php endif; ?>
			</div>
			<div class="cp_content">		
					
			<?php if ( have_posts() ) : ?>
			
			<div class="cp_right">
				<div class="cp_content_nav">
			<?php
				/**
				 * woocommerce_before_shop_loop hook
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>
			<?php do_action('woocommerce_after_shop_loop'); ?>
			</div>
				<?php woocommerce_product_loop_start(); ?>

					<?php woocommerce_product_subcategories(); ?>

					<?php while ( have_posts() ) : the_post(); ?>
				<?php woocommerce_get_template_part( 'content', 'product-right' ); ?>
				<?php endwhile; // end of the loop. ?>

			</div>
			<div class="cp_left">
				<!--<div class="category_min">
				<ul><h1>BROWSE BY CATEGORIES </h1>
				<?php woocommerce_product_loop_start(); ?>

					<?php woocommerce_product_subcategories(); ?>

				<?php woocommerce_get_template_part( 'content', 'product-left' ); ?>
				
			</ul></div>-->
			<div class="filer">

 <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Extra Widgets')) :
					endif; ?>
					</div>
					 <div class="related">
                <div class="prod_s">
                    <h3 class="margin_top"style="color:#694338;height:40px;background:#fff;line-height:2;margin-top:0px;">Top Products</h3>
                   <?php $args = array(
    'posts_per_page' => -1,
    'product_cat' => 'dis',
    'post_type' => 'product',
    'orderby' => 'title',
);
$the_query = new WP_Query( $args );
// The Loop
while ( $the_query->have_posts() ) {
    $the_query->the_post();?>
   <ul class="product_list_widget">
					<li class="widget_li">
					<a href="" title="">
						<div class="imgw"><?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="300px" height="300px" />'; ?></div>
						<div class="infow">
							<?php echo '' . get_the_title() . '<br />';?>		
							<?php woocommerce_get_template( 'loop/price.php' ); ?>		           
							
		           </div>
					</a> 
				</li>
				</ul>
				<?php
}
wp_reset_postdata(); ?>
                </div>
            </div> 
			</div>

			<?php woocommerce_product_loop_end(); ?>
		
			
		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php woocommerce_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>
			</div>			
			 <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Main sidebar')) :
					endif; ?>
	
</div>
<?php get_footer(); ?>