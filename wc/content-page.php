<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage wc
 * @since wc 5.0
 */
?>


<div class="content">
	<div class="homepage">
		<div class="top_banner">
			<h1>NEW YEAR SALE</h1>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
		</div>	
		<div class="cp_bar1">
	<img src="<?php bloginfo('template_url')?>/images/bar.png">
	<div class="text"><?php _e('SECURE CHECKOUT','wc')?></div>
</div>
<h2><?php _e('One Step Checkout','wc')?></h2>
<h6><?php _e('Please enter your details below to complete your purchase','wc')?></h6>
<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
</div>
</div>			