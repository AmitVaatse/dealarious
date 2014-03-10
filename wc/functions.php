<?php
/**
 * wc functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage wc
 * @since wc 5.0
 */
define('THEMEROOT', get_stylesheet_directory_uri());
define('IMAGES',THEMEROOT. '/images');
add_theme_support( 'woocommerce' );
/**
 * Sets up the content width value based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 625;

/**
 * Sets up theme defaults and registers the various WordPress features that
 * wc supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since wc 5.0
 */
function wc_setup() {
	/*
	 * Makes ar available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Thirteen, use a find and
	 * replace to change 'twentythirteen' to the name of your theme in all
	 * template files.
	 */

	//require( get_template_directory() . '/inc/widgets.php' );
	// Adds RSS feed links to <head> for posts and comments.
	//add_theme_support( 'automatic-feed-links' );
	/*
	 * This theme supports all available post formats by default.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		 'video'
	) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Navigation Menu', 'wc' ) );
	register_nav_menu( 'footer-nav', __( 'Footer Menu', 'wc' ) );

	/*
	 * This theme uses a custom image size for featured images, displayed on
	 * "standard" posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	//set_post_thumbnail_size( 300, 150, true );
	add_image_size( 'small-list-container',100, 68,true);
	add_image_size( 'thumbnail-container',150, 100,true);
	add_image_size( 'slider-container',630, 420,true);
	add_image_size('small-footer',140,180,true);
	add_image_size('full-size',1000,390,true);
	add_image_size('full',460,115,true);
}
add_action( 'after_setup_theme', 'wc_setup' );
/**
 * Adds support for a custom header image.
 */
//require( get_template_directory() . '/inc/custom-header.php' );

/**
 * Returns the Google font stylesheet URL if available.
 *
 * The use of Open Sans by default is localized. For languages that use
 * characters not supported by the font, the font can be disabled.
 *
 * @since wc 1.2
 *
 * @return string Font stylesheet or empty string if disabled.
 */
function wc_get_font_url() {
	$font_url = '';

	/* translators: If there are characters in your language that are not supported
	 by Open Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'wc' ) ) {
		$subsets = 'latin,latin-ext';

		/* translators: To add an additional Open Sans character subset specific to your language, translate
		 this to 'greek', 'cyrillic' or 'vietnamese'. Do not translate into your own language. */
		$subset = _x( 'no-subset', 'Open Sans font: add new subset (greek, cyrillic, vietnamese)', 'wc' );

		if ( 'cyrillic' == $subset )
			$subsets .= ',cyrillic,cyrillic-ext';
		elseif ( 'greek' == $subset )
			$subsets .= ',greek,greek-ext';
		elseif ( 'vietnamese' == $subset )
			$subsets .= ',vietnamese';

		$protocol = is_ssl() ? 'https' : 'http';
		$query_args = array(
			'family' => 'Open+Sans:400italic,700italic,400,700',
			'subset' => $subsets,
		);
		$font_url = add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" );
	}

	return $font_url;
}

/**
 * Enqueues scripts and styles for front-end.
 *
 * @since wc 5.0
 */
function wc_scripts_styles() {
	global $wp_styles;

	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/*
	 * Adds JavaScript for handling the navigation menu hide-and-show behavior.
	 */
	wp_enqueue_script( 'wc-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0', true );

	$font_url = wc_get_font_url();
	if ( ! empty( $font_url ) )
		wp_enqueue_style( 'wc-fonts', esc_url_raw( $font_url ), array(), null );

	/*
	 * Loads our main stylesheet.
	 */
	wp_enqueue_style( 'wc-style', get_stylesheet_uri() );

	/*
	 * Loads the Internet Explorer specific stylesheet.
	 */
	wp_enqueue_style( 'wc-ie', get_template_directory_uri() . '/css/ie.css', array( 'wc-style' ), '20121010' );
	$wp_styles->add_data( 'wc-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'wc_scripts_styles' );
/**
 * Adds additional stylesheets to the TinyMCE editor if needed.
 *
 * @uses wc_get_font_url() To get the Google Font stylesheet URL.
 *
 * @since wc 1.2
 *
 * @param string $mce_css CSS path to load in TinyMCE.
 * @return string
 */
function wc_mce_css( $mce_css ) {
	$font_url = wc_get_font_url();

	if ( empty( $font_url ) )
		return $mce_css;

	if ( ! empty( $mce_css ) )
		$mce_css .= ',';

	$mce_css .= esc_url_raw( str_replace( ',', '%2C', $font_url ) );

	return $mce_css;
}
add_filter( 'mce_css', 'wc_mce_css' );

/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @since wc 5.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function wc_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'wc' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'wc_wp_title', 10, 2 );

/**
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 *
 * @since wc 5.0
 */
function wc_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'wc_page_menu_args' );

/**
 * Registers our main widget area and the front page widget areas.
 *
 * @since wc 5.0
 */
function wc_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'wc' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'wc' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'First Front Page Widget Area', 'wc' ),
		'id' => 'sidebar-2',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'wc' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Second Front Page Widget Area', 'wc' ),
		'id' => 'sidebar-3',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'wc' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'wc_widgets_init' );

if ( ! function_exists( 'wc_content_nav' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 *
 * @since wc 5.0
 */
function wc_content_nav( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id );

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'wc' ); ?></h3>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'wc' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'wc' ) ); ?></div>
		</nav><!-- #<?php echo $html_id; ?> .navigation -->
	<?php endif;
}
endif;

if ( ! function_exists( 'wc_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own wc_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since wc 5.0
 */
function wc_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'wc' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'wc' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite><b class="fn">%1$s</b> %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span>' . __( 'Post author', 'wc' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'wc' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'wc' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'wc' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'wc' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

if ( ! function_exists( 'wc_entry_meta' ) ) :
/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own wc_entry_meta() to override in a child theme.
 *
 * @since wc 5.0
 */
function wc_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'wc' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'wc' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'wc' ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'wc' );
	} elseif ( $categories_list ) {
		$utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'wc' );
	} else {
		$utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'wc' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}
endif;

/**
 * Extends the default WordPress body class to denote:
 * 1. Using a full-width layout, when no active widgets in the sidebar
 *    or full-width template.
 * 2. Front Page template: thumbnail in use and number of sidebars for
 *    widget areas.
 * 3. White or empty background color to change the layout and spacing.
 * 4. Custom fonts enabled.
 * 5. Single or multiple authors.
 *
 * @since wc 5.0
 *
 * @param array Existing class values.
 * @return array Filtered class values.
 */
function wc_body_class( $classes ) {
	$background_color = get_background_color();
	$background_image = get_background_image();

	if ( ! is_active_sidebar( 'sidebar-1' ) || is_page_template( 'page-templates/full-width.php' ) )
		$classes[] = 'full-width';

	if ( is_page_template( 'page-templates/front-page.php' ) ) {
		$classes[] = 'template-front-page';
		if ( has_post_thumbnail() )
			$classes[] = 'has-post-thumbnail';
		if ( is_active_sidebar( 'sidebar-2' ) && is_active_sidebar( 'sidebar-3' ) )
			$classes[] = 'two-sidebars';
	}

	if ( empty( $background_image ) ) {
		if ( empty( $background_color ) )
			$classes[] = 'custom-background-empty';
		elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) )
			$classes[] = 'custom-background-white';
	}

	// Enable custom font class only if the font CSS is queued to load.
	if ( wp_style_is( 'wc-fonts', 'queue' ) )
		$classes[] = 'custom-font-enabled';

	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	return $classes;
}
add_filter( 'body_class', 'wc_body_class' );

/**
 * Adjusts content_width value for full-width and single image attachment
 * templates, and when there are no active widgets in the sidebar.
 *
 * @since wc 5.0
 */
function wc_content_width() {
	if ( is_page_template( 'page-templates/full-width.php' ) || is_attachment() || ! is_active_sidebar( 'sidebar-1' ) ) {
		global $content_width;
		$content_width = 960;
	}
}
add_action( 'template_redirect', 'wc_content_width' );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @since wc 5.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * @return void
 */
function wc_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'wc_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since wc 5.0
 */


function wc_customize_preview_js() {
	wp_deregister_script('jquery');
	wp_register_script('jquery', "//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js", false, true);
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'jquery.main1', get_template_directory_uri() . '/js/main1.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'wc-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20130301', true );
	
}
add_action( 'wp_enqueue_scripts', 'wc_customize_preview_js' );
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

add_filter( 'woocommerce_get_price_html', 'wpa83367_price_html', 100, 2 ); function wpa83367_price_html( $price, $product ){ return 'Was:' . str_replace( '<ins>', ' Now:<ins>', $price ); }
// Add save percent next to sale item prices.
add_filter( 'woocommerce_sale_price_html', 'woocommerce_custom_sales_price', 10, 2 );
function woocommerce_custom_sales_price( $price, $product ) {
	$percentage = round( ( ( $product->regular_price - $product->sale_price ) / $product->regular_price ) * 100 );
	return $price . sprintf( __(' Save %s', 'woocommerce' ), $percentage . '%' );
}
add_filter('woocommerce_get_price', 'return_custom_price', $product, 2); 
function return_custom_price($price, $product) {    
    global $post, $woocommerce;
    // Grab the product id
    $post_id = $product->id; 
    // Get user's ip location and correspond it to the custom field key
    $user_country = $_SESSION['user_location'];
    $get_user_currency = strtolower($user_country.'_price');
    // If the IP detection is enabled look for the correct price
    if($get_user_currency!=''){
        $new_price = get_post_meta($post_id, $get_user_currency, true);
        if($new_price==''){
            $new_price = $price;
        }
    }
    return $new_price;
}   

function addPriceSuffix($format, $currency_pos) {
	switch ( $currency_pos ) {
		case 'left' :
			$currency = get_woocommerce_currency();
			$format = '%1$s%2$s&nbsp;' . $currency;
		break;
	}
 
	return $format;
}
add_action('woocommerce_price_format', 'addPriceSuffix', 1, 2);
add_action('woocommerce_after_shop_loop_item', 'get_star_rating' );
function get_star_rating()
{
    global $woocommerce, $product;
    $average = $product->get_average_rating();

    echo '<div class="star-rating"><span style="width:'.( ( $average / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">'.$average.'</strong> '.__( 'out of 5', 'woocommerce' ).'</span></div>';
}
function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>   
   <div id="li-comment-<?php comment_ID() ?>">
     <div class="customer_speak">
                    <div class="user"><?php echo get_avatar($comment,$size='108',$default='<path_to_url>' ); ?>
     				</div>
                    <div class="arrow_speak"><img src="<?php bloginfo('template_url')?>/images/arrow_speak.png"></div>
                    <div class="comment">
                        <h4 class="margin-left margin_top grey">who says you cant have it all?</h4>
                        <h6 class="margin-left grey">Review by:  <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?></h6>
                        <h5 class="margin-left orange">Rated:  <?php get_star_rating();?></h5>                        
                        <p><?php comment_text() ?>                        	
                        </p>
                        <p style="color:#694338"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></p>
                    </div>
                </div>
    </div>
<?php
        }

function my_theme_wrapper_start() {
  echo '<div class="content">';
}
add_filter( 'woocommerce_get_availability', 'custom_get_availability', 1, 2);
  
function custom_get_availability( $availability, $_product ) {
    //change text "In Stock' to 'SPECIAL ORDER'
    if ( $_product->is_in_stock() ) $availability['availability'] = __('AVAILABLE', 'woocommerce');
  
    //change text "Out of Stock' to 'SOLD OUT'
    if ( !$_product->is_in_stock() ) $availability['availability'] = __('SOLD OUT', 'woocommerce');
        return $availability;
    }
function my_theme_wrapper_end() {
  echo '</div>';
}
// Handle cart in header fragment for ajax add to cart
add_filter('add_to_cart_fragments', 'header_add_to_cart_fragment');
function header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	woocommerce_cart_link();

	$fragments['a.cart-button'] = ob_get_clean();

	return $fragments;

}

function woocommerce_cart_total() {
	global $woocommerce;
	?>
	<a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> <?php _e('in your shopping cart', 'woothemes'); ?>" class="cartel">
	<h3 class="items"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count); ?></h3>
	</a>
	<?php
}
function woocommerce_cart_link1() {
	global $woocommerce;
	?>
	<div class="login"><h3>Welcome Guest,Login</h3></div>
	  		<a href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><img src="<?php bloginfo('template_url');?>/images/mycart.png"></a>
	  		<div class="cartel" id="drop1">	  			
	  			<h3><?php woocommerce_cart_total();?></h3>
	  			<img src="<?php bloginfo('template_url');?>/images/bot_show.png">
	</div>
	<?php
}
function woocommerce_cart_link2() {
	global $woocommerce;
	?>
	<div class="login"><h3>Users Logout</h3></div>
	  		<a href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><img src="<?php bloginfo('template_url');?>/images/mycart.png"></a>
	  		<div class="cartel" id="drop1">	  			
	  			<h3><?php woocommerce_cart_total();?></h3>
	  			<img src="<?php bloginfo('template_url');?>/images/bot_show.png">
	</div>
	<?php
}
function woocommerce_cart_link() {
	global $woocommerce;
	?>
	
	  		<a href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><div class="buy"style="width:134px;float:left;"><img src="<?php bloginfo('template_url')?>/images/buy1.png"></div></a>
	  		<div class="cartel" id="drop1">	  			
	  			<h3><?php woocommerce_cart_total();?></h3>
	  			<img src="<?php bloginfo('template_url');?>/images/bot_show.png">
	</div>
	<?php
}
/**
 * Register our sidebars and widgetized areas.
 *
 */

function arphabet_widgets_init() {

	register_sidebar( array(
		'name' => 'Home right sidebar',
		'id' => 'home_right_1',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h3 class=""margin-left margin_top">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => 'Home mid sidebar',
		'id' => 'home_mid_1',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h3 class=""margin-left margin_top">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'arphabet_widgets_init' );
if (function_exists('register_sidebar')) {
register_sidebar(array(
'name' => 'Extra Widgets',
'id' => 'extra-widgets',
'description' => 'The extra widgets for your website.',
'before_widget' => ' <div id="%1$s" class="widgetSidebar %2$s"> ',
'after_widget' => ' </div> ',
'before_title' => ' <h4> ',
'after_title' => ' </h4 >'
));
}
/*bread*/
add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );
function jk_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => ' &#187; ',
            'wrap_before' => '<nav class="woocommerce-breadcrumb" itemprop="breadcrumb">',
            'wrap_after'  => '</nav>',
            'before'      => '',
            'after'       => '',
            'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
        );
}
/*numeric post*/
function wpbeginner_numeric_posts_nav() {


	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="navigation"><ul>' . "\n";

	/**	Previous Post Link 
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link 
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );*/

	echo '</ul></div>' . "\n";

}
function get_me_list_of($atts, $content = null)
{   
    $args = array( 'post_type' => 'product', 'posts_per_page' => 10, 'product_cat' => $atts[0], 'orderby' => 'rand' );

    $loop = new WP_Query( $args );

    echo '<h1 class="upp">Style '.$atts[0].'</h1>';
    echo "<ul class='mylisting'>";
    while ( $loop->have_posts() ) : $loop->the_post(); 
    global $product; 

    echo '<li><a href="'.get_permalink().'">'.get_the_post_thumbnail($loop->post->ID, 'thumbnail').'</a></li>';

    endwhile; 

    echo "</ul>";

    wp_reset_query(); 

}
add_filter( 'loop_shop_per_page', function ( $cols ) {
    // $cols contains the current number of products per page based on the value stored on Options -> Reading
    // Return the number of products you wanna show per page.
    return 4;
}, 20 );
/**
 * Options Tree.
 */
 
/**
 * Optional: set 'ot_show_pages' filter to false.
 * This will hide the settings & documentation pages.
 */
add_filter( 'ot_show_pages', '__return_false' );

/**
 * Optional: set 'ot_show_new_layout' filter to false.
 * This will hide the "New Layout" section on the Theme Options page.
 */
add_filter( 'ot_show_new_layout', '__return_false' );

/**
 * Required: set 'ot_theme_mode' filter to true.
 */
add_filter( 'ot_theme_mode', '__return_true' );

/**
 * Required: include OptionTree.
 */
include_once( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );

include_once( trailingslashit( get_template_directory() ) . 'inc/theme-options.php' );


?>
