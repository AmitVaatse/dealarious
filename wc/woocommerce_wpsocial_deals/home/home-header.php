<?php
/**
 * Deals Listing Home Header Part
 * 
 * @package WooCommerce WP Social Deals
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	
?>

<div>

	<?php	
		//check loop contains post or not
		if( $loop->have_posts() ) {
			
			while ( $loop->have_posts() ) : $loop->the_post();
		
				//do action to show home page header deal content
				do_action( 'wpsd_home_header_content' );
		?>			
				
				<div>
				
					<?php
					
						//do action to show home page header right section
						do_action( 'wpsd_home_header_right_top' );
					
					?>
					
					<div>
					
						<?php		
								//do action to show home page header right section
								do_action( 'wpsd_home_header_right_center' );
						?>
				
					</div><!--.wpsd-value-wrap-->
				
					<?php 
					
						//do action to show home page header right panel bottom
						do_action( 'wpsd_home_header_right_bottom' );
						
					?>
						
				</div><!--span4-->
			
			<?php 
					endwhile;
		}
		
		wp_reset_query();
	?>
	
</div><!--.row-fluid-->