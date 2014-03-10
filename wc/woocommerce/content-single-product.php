<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
       <div class="product">       
            <div class="prod_image">               
                <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="300px" height="300px" />'; ?>
             </div>    
            <div class="prod_spec">
                <h1 class="margin_zero black"><?php the_title();?></h1>
                <p class="margin_zero red"style="text-align:left;">dolore eu feugiat nulla facilisis at vero eros et accumsan</p>
                <h3 class="margin_top black">DESCRIPTION</h3>
                <p class="margin_zero grey"style="text-align:left;"><?php echo $post->post_excerpt; ?></p>
                <h4 class="black"style="text-align:left;margin-top:5px">RATING:<?php get_star_rating();?></h4>
                <h4 class="black" style="float:left;">MRP:</h4><h4 class="red"><?php echo get_woocommerce_currency_symbol().get_post_meta( $post->ID, '_regular_price', true); ?></h4>
                <h4 class="black">Our Price : <?php echo get_woocommerce_currency_symbol().get_post_meta( $post->ID, '_sale_price', true); ?> </h4>
                <h1 class="green"> <?php echo get_post_meta( $post->ID, '_stock_status', true); ?></h1>
                <p class="margin_zero black"style="text-align:left;">Standard delivery in 2-3 business days.[?]</p>
                <h5 class=" black"style="text-align:left;">Note: In-a-day Guarantee orders placed before 6PM will be delivered on the next</br> 
business day. Orders after 6PM will be delivered the day after.</h5>
<div class="acc">
        <div class="lik"></div>
        <a href="https://www.facebook.com/rohit.langde?fref=ts&ref=br_tf" target="_blank"><div class="fb"></div></a>
        <div class="tw"></div>
        <div class="gp"></div>
    </div>
<div class="buy"><?php do_action( 'woocommerce_after_shop_loop_item' ); ?></div>
    
                <div class="dwn"><img src="<?php bloginfo('template_url')?>/images/dwn.png"></div>
            </div>     
        </div>
        <div class="slider_product">
            <!-- Place somewhere in the <body> of your page -->
            <div class="flexslider">
              <ul class="slides">
                <?php
                    $args = array( 'post_type' => 'product', 'posts_per_page' => 8 );
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?> 
                <li>
                 <a class="fancybox" href="<?php wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'slider-container' );?>"><?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'slider-container'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="300px" height="300px" />'; ?></a>
                </li>
                <?php endwhile; ?>
                <?php wp_reset_query(); ?>                
                <!-- items mirrored twice, total of 12 -->
              </ul>
            </div>
           </div>
        <div class="product_desc">
            <div class="short_desc">
                <h2>SHORT DESCRIPTION</h2>
                <p style="text-align:justify;"><?php the_content();?></p>
            </div>
            <?php echo apply_filters( 'woocommerce_variation_option_name', $term->name )?>
            <div class="tech_desc">

                <h2 class="margin_top black">TECH SPECS</h2>
                <h4 class="margin_top black a1"style="width:161px;float:left">SIZE:</h4><p style="float: left;margin: 0;padding: 0;line-height: 2;"><?php the_field('size');?></p>
                <h4 class="margin_top black a2"style="width:161px;float:left">COMPATIBILITY</h4><p style="float: left;margin: 0;padding: 0;line-height: 2;"><?php the_field('compatibility');?></p>
                <h4 class="margin_top black a3"style="width:161px;float:left">VERSION</h4><p style="float: left;margin: 0;padding: 0;line-height: 2;"><?php the_field('version');?></p>
                <h4 class="margin_top black a4"style="width:161px;float:left">DEVELOPER</h4><p style="float: left;margin: 0;padding: 0;line-height: 2;"><?php the_field('developer');?></p>
                <h4 class="margin_top black a5"style="width:161px;float:left">LICENSE</h4><p style="float: left;margin: 0;padding: 0;line-height: 2;"><?php the_field('license');?></p>
            </div>
        </div>
        <div class="customer_rev">
            <h2 class="margin_zero">CUSTOMER REVIEW</h2>
            <div class="cus_des">
                
                <?php
				    $args = array ('post_type' => 'product');
				    $comments = get_comments( $args );
				    wp_list_comments('type=comment&callback=mytheme_comment', $comments);
				?>
            </div>      
            <div class="related">
                <div class="prod_s">
                    <h3 class="margin-left margin_top"style="color:#694338;"></h3>
                    <h3 class="margin_top"style="color:#694338;height:40px;background:#fff;line-height:2;margin-top: -15px;">Top Products</h3>
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
            <div class="news">
                <div class="news_s">
                    <h3 class="margin-left margin_top"style="color:#032a40;">NEWSLETTER</h3>
                </div>
            </div>
        </div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>