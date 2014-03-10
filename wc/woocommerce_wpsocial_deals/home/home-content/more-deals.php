<?php
/**
 * Home Loop Template
 * 
 * Handles to Show Loop Deals
 * Template on home page
 * 
 * @package WooCommerce WP Social Deals
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	global $post,$wpsd_price,$wpsd_model;
	
	//model class
	$model = $wpsd_model;
	
	//price class
	$price = $wpsd_price;

	//$args is passed when template is call
	
	$i = 0;					
	$loop = null;
	$loop = new WP_Query();
	$loop->query( $args );
	
?>	
	<div class="wpsd-list wpsd-<?php echo $tab;?> row-fluid">
	
<?php	
		//check the loop contains the post or not
		if( $loop->have_posts() ) {
			
			while ( $loop->have_posts() ) : $loop->the_post();
					
				global $product;
			
					$i++;
?>				
					<div class="product">
					
							<div>
								
							
								<?php 
								
									//do action to show home page more deal loop content
									do_action( 'wpsd_home_more_deal_content' );
								
								?>
								<?php
								
									//do action to show home page more deal loop footer
									do_action( 'wpsd_home_more_deal_footer' );
									
								?>
								
							</div><!--wpsd-sub-content-->
						
							
							
						</div><!--wpsd-contentdeal-->
						<!--.span6-->
		<?php 
			
			endwhile;
			
		} else {
			
			//no deals found message
			wpsd_get_template( 'home/home-content/home-no-deals.php' );
			
		}
		
		wp_reset_query();
?>	
	</div><!--.wpsd-active-->