<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage wc
 * @since wc 5.0
 */
?>
<footer>
	<div class="footer_holder">
		<div class="footer_left">
			<div class="footer_col">
				<h1><?php echo ot_get_option( 'footerpage_heading1' );?></h1>
				<h3><?php echo ot_get_option( 'footerpage_description1' );?></h3>
				<h3>Lorem ipsum</h3>
				<h3>Lorem ipsum</h3>
				<h3>Lorem ipsum</h3>
			</div>
			<div class="footer_col">
				<h1><?php echo ot_get_option( 'footerpage_heading2' );?></h1>
				<h3><?php echo ot_get_option( 'footerpage_description2' );?></h3>
				<h3>Lorem ipsum</h3>
				<h3>Lorem ipsum</h3>
				<h3>Lorem ipsum</h3>
			</div>
			<div class="footer_col">
				<h1><?php echo ot_get_option( 'footerpage_heading3' );?></h1>
				<h3><?php echo ot_get_option( 'footerpage_description3' );?></h3>
				<h3>Lorem ipsum</h3>
				<h3>Lorem ipsum</h3>
				<h3>Lorem ipsum</h3>
			</div>
			<div class="footer_col">
				<h1><?php echo ot_get_option( 'footerpage_heading4' );?></h1>
				<h3><?php echo ot_get_option( 'footerpage_description4' );?></h3>
				<h3>Lorem ipsum</h3>
				<h3>Lorem ipsum</h3>
				<h3>Lorem ipsum</h3>
			</div>
		</div>
		<div class="line"></div>
		<div class="footer_mid">
			<p><?php echo ot_get_option( 'footerpage_tagline' );?></p>
		</div>
		<div class="footer_right">
			<img src="<?php bloginfo('template_url');?>/images/facebookplugin.png">
		</div>
	</div>
	<div class="end_footer">		
		<div class="policies">
			<h1>Policies:</h1><h3 style="cursor:pointer;">Terms of Use |</h3><h3 style="cursor:pointer;">Security |</h3><h3 style="cursor:pointer;">Privacy</h3>
		</div>	
		<div class="rights">@ 2007-2013 dealarious.com</div>
		<div class="approved"><img src="<?php echo ot_get_option( 'footerpage_approval1' );?>"/></div>
		<div class="approved"><img src="<?php echo ot_get_option( 'footerpage_approval2' );?>"/></div>
		<div class="approved"><img src="<?php echo ot_get_option( 'footerpage_approval3' );?>"/></div>
		<div class="touche">
			<h1>Keep In Touch</h1>
			<div class="i"><img src="<?php echo ot_get_option( 'footerpage_twitter_image' );?>"/></div>
			<div class="i"><img src="<?php echo ot_get_option( 'footerpage_facebook_image' );?>"/></div>
			<div class="i"><img src="<?php echo ot_get_option( 'footerpage_googleplus_image' );?>"/></div>
		</div>

	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>