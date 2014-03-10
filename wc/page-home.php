<?php
/**
 * Template name: Home Page Template 
 * The template for displaying about pages.
 */
get_header('shop');
?>
<div class="content">
	<div class="homepage">
		<div class="top_banner">
			<h1>NEW YEAR SALE</h1>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
		</div>		
		<div class="deal_shc">
			<div class="hdr">
						<div class="hd1 abc" id="hda"><h4>DEALS OF THE DAY</h4></div>
						<div class="border_50"></div>
						<div class="hd1" id="hdb"><h4>TOP SELLER</h4></div>
						<div class="border_50"></div>
						<div class="hd1" id="hdc"><h4>Featured Products</h4></div>
			</div>

			<div class="contents" id="hda1" style="display: block">
					<div class="product" style="margin-top:20px;">
			    		<?php get_template_part('single', 'deals');?>		    
					</div>
			</div>
		<div class="contents" id="hda2" style="display:none;">
					<div class="product"style="margin-top:20px;">
						 <?php 
        $args = array( 'post_type' => 'product', 'posts_per_page' => -1);
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post(); global $product; 
						 	$posts = get_posts(array(
    'meta_query' => array(
        array(
            'key' => 'top_or_featured', // name of custom field
            'value' => '"top"', // matches exaclty "top", not just top. This prevents a match for "acquitop"
            'compare' => 'LIKE'
        )
    )
));
 
if( in_array( 'top', get_field('top_or_featured') ) )
{?>
    <a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
			            <div class="prod_image"><?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="300px" height="300px" />'; ?>
			            	<div class="bubble">
		           <div class="inside">
		             <div class="inside-text">
		             	<?php 
					$percentage = round( ( ( $product->regular_price - $product->sale_price ) / $product->regular_price ) * 100 );
					echo $price . sprintf( __('%s', 'woocommerce' ), $percentage . '%' ); ?></div>
		           </div>
	    		</div>
			            </div></a>
						<div class="prod_spec">
							<h1 class="margin_zero black"><?php the_title(); ?></h1>
							<p class="margin_zero red">m here asshole eu feugiat nulla facilisis at vero eros et accumsan</p>
							<h3 class="margin_top black">DESCRIPTION</h3>
							<p class="margin_zero grey"><?php the_excerpt(); ?></p>
							<div class="off"></div>
							<h4 class="margin_zero black">RATING: <?php get_star_rating();?></h4>
							<h4 class="red">Retail Price: <?php echo get_woocommerce_currency_symbol().$product->regular_price ?></h4>
							<h3 class=" red">Our Price : <?php echo get_woocommerce_currency_symbol().$product->price; ?>	</h3>
							 
							<h1 class="margin_top green"><?php echo $product->stock_status ?></h1>
							<p class="margin_zero black">Standard delivery in 2-3 business days.[?]</p>
							<h5 class="margin_bottom black">Note: In-a-day Guarantee orders placed before 6PM will be delivered on the next</br> 
			business day. Orders after 6PM will be delivered the day after.</h5>
							<div class="buy"><?php do_action( 'woocommerce_after_shop_loop_item' ); ?></div>
							<div class="dwn"><img src="<?php bloginfo('template_url'); ?>/images/dwn.png"></div>
						</div><?php
}
						 ?>
						 <?php endwhile; ?>	
					</div>
		</div>
				<div class="contents" id="hda3" style="display:none;">
					<div class="product"style="margin-top:20px;">
			     <?php 
        $args = array( 'post_type' => 'product', 'posts_per_page' => -1);
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post(); global $product; 
						 	$posts = get_posts(array(
    'meta_query' => array(
        array(
            'key' => 'top_or_featured', // name of custom field
            'value' => '"featured"', // matches exaclty "red", not just red. This prevents a match for "acquired"
            'compare' => 'LIKE'
        )
    )
));
 
if( in_array( 'featured', get_field('top_or_featured') ) )
{?>
    <a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
			            <div class="prod_image"><?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="300px" height="300px" />'; ?>
			            	<div class="bubble">
		           <div class="inside">
		             <div class="inside-text">
		             	<?php 
					$percentage = round( ( ( $product->regular_price - $product->sale_price ) / $product->regular_price ) * 100 );
					echo $price . sprintf( __('%s', 'woocommerce' ), $percentage . '%' ); ?></div>
		           </div>
	    		</div>
			            </div></a>
						<div class="prod_spec">
							<h1 class="margin_zero black"><?php the_title(); ?></h1>
							<p class="margin_zero red">m here asshole eu feugiat nulla facilisis at vero eros et accumsan</p>
							<h3 class="margin_top black">DESCRIPTION</h3>
							<p class="margin_zero grey"><?php the_excerpt(); ?></p>
							<div class="off"></div>
							<h4 class="margin_zero black">RATING: <?php get_star_rating();?></h4>
							<h4 class="red">Retail Price: <?php echo get_woocommerce_currency_symbol().$product->regular_price ?></h4>
							<h3 class="red">Our Price : <?php echo get_woocommerce_currency_symbol().$product->price; ?>	</h3>
							 
							<h1 class="margin_top green"><?php echo $product->stock_status ?></h1>
							<p class="margin_zero black">Standard delivery in 2-3 business days.[?]</p>
							<h5 class="margin_bottom black">Note: In-a-day Guarantee orders placed before 6PM will be delivered on the next</br> 
			business day. Orders after 6PM will be delivered the day after.</h5>
							<div class="buy"><?php do_action( 'woocommerce_after_shop_loop_item' ); ?></div>
							<div class="dwn"><img src="<?php bloginfo('template_url'); ?>/images/dwn.png"></div>
						</div><?php
}
						 ?>
						 <?php endwhile; ?>		   
			</div>
				</div>
		</div>

		<!--category starts from here -->			
			<div class="prod_cat_container">
				<div class="prod_cat_navigation">					
					<div class="name_product">
					<h3>Antivirus</h3>						
					</div>
					<ul>
					 	<?php wp_list_categories( 'taxonomy=product_cat&pad_counts=1&title_li=' ); ?>
					</ul>
				</div>
				<div class="prod_cat_collection">
				 <?php
        $args = array( 'post_type' => 'product', 'posts_per_page' => 4, 'product_cat' => 'antivir', 'orderby' => 'rand' );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
					 <a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">

					<div class="products_simple">						
						<h2><?php the_title(); ?></h2>
						<h4 style="text-decoration:none;">Extra <?php 
					$percentage = round( ( ( $product->regular_price - $product->sale_price ) / $product->regular_price ) * 100 );
					echo $price . sprintf( __('%s', 'woocommerce' ), $percentage . '%' ); ?> Saving</h4>
						 <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="300px" height="300px" />'; ?>
						<h5>Buy Now</h5>
						<img src="<?php bloginfo('template_url')?>/images/buy_arrow.png" style="width:21px;height:21px;margin-left:10px;">
						<div class="snipit">
					         <h4><?php the_title(); ?></h4>
					         <h4>USE Coupon:<b style="color:#e9c205">GV73FDSF</b></h4>
					         <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard 
</p>
					         <h3 class="margin_top red">Retail Price: <?php echo get_woocommerce_currency_symbol().$product->regular_price ?></h3>
                			 <h4 class="margin_top red">Our Price : <?php echo get_woocommerce_currency_symbol().$product->price; ?> </h4>				         
					    	
					    </div>
					</div>
					</a>									
				
					<?php endwhile; ?>	
					</div>
    <?php wp_reset_query(); ?>
			</div>
			<div class="prod_cat_container">
				<div class="prod_cat_navigation">					
					<div class="name_product">
						<h3>Security Utility</h3>
					</div>
					<ul>
					 	<?php wp_list_categories( 'taxonomy=product_cat&pad_counts=1&title_li=' ); ?>
					</ul>
				</div>

				<div class="prod_cat_collection">
				 <?php
        $args = array( 'post_type' => 'product', 'posts_per_page' => 4, 'product_cat' => 'sec', 'orderby' => 'rand' );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
					 <a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">

					<div class="products_simple">
						
						<h2><?php the_title(); ?></h2>
						<h4 style="text-decoration:none;">Extra <?php 
					$percentage = round( ( ( $product->regular_price - $product->sale_price ) / $product->regular_price ) * 100 );
					echo $price . sprintf( __('%s', 'woocommerce' ), $percentage . '%' ); ?> Saving</h4>
						 <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="300px" height="300px" />'; ?>
						<h5>Buy Now</h5>
						<img src="<?php bloginfo('template_url')?>/images/buy_arrow.png" style="width:21px;height:21px;margin-left:10px;">
						<div class="snipit">
					         <h4><?php the_title(); ?></h4>
					         <h4>USE Coupon:<b style="color:#e9c205">GV73FDSF</b></h4>
					         <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard 
</p>
					         <h3 class="margin_top red">Retail Price: <?php echo get_woocommerce_currency_symbol().$product->regular_price ?></h3>
                			 <h4 class="margin_top red">Our Price : <?php echo get_woocommerce_currency_symbol().$product->price; ?> </h4>				         
					    	
					    </div>
					</div>
					</a>		
				
					<?php endwhile; ?>
					</div>	
    <?php wp_reset_query(); ?>	
			</div>
	</div>	
</div>
<?php get_footer();?>