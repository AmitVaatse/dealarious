<?php
/**
 * Initialize the custom theme options.
 */
add_action( 'admin_init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
    'sections'        => array(
       
       array(
        'id'          => 'footer-page',
        'title'       => 'Footer Page'
      ),
    ),
    'settings'        => array( 
      array(
        'id'          => 'footerpage_heading1',
        'label'       => 'Footer Page heading first',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
       array(
        'id'          => 'footerpage_description1',
        'label'       => 'Footerpage Description first',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
        array(
        'id'          => 'footerpage_heading2',
        'label'       => 'Footer Page heading second',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
       array(
        'id'          => 'footerpage_description2',
        'label'       => 'Footerpage Description Second',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
        array(
        'id'          => 'footerpage_heading3',
        'label'       => 'Footer Page heading third',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
       array(
        'id'          => 'footerpage_description3',
        'label'       => 'Footerpage Description third',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
        array(
        'id'          => 'footerpage_heading4',
        'label'       => 'Footer Page heading fourth',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
       array(
        'id'          => 'footerpage_description4',
        'label'       => 'Footerpage Description fourth',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
         array(
        'id'          => 'footerpage_tagline',
        'label'       => 'Footer Tagline',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
         array(
        'id'          => 'footerpage_approval1',
        'label'       => 'Footer Approved By',
        'desc'        => '',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'footer-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
         array(
        'id'          => 'footerpage_approval2',
        'label'       => 'Footer Approved By',
        'desc'        => '',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'footer-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
         array(
        'id'          => 'footerpage_approval3',
        'label'       => 'Footer Approved By',
        'desc'        => '',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'footer-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
         array(
        'id'          => 'footerpage_twitter_image',
        'label'       => 'Footer Twitter Image',
        'desc'        => '',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'footer-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
          array(
        'id'          => 'footerpage_twitter',
        'label'       => 'Footer Twitter',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
           array(
        'id'          => 'footerpage_facebook_image',
        'label'       => 'Footer Facebook Image',
        'desc'        => '',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'footer-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
           array(
        'id'          => 'footerpage_facebook',
        'label'       => 'Footer Facebook',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
             array(
        'id'          => 'footerpage_googleplus_image',
        'label'       => 'Footer googleplus Image',
        'desc'        => '',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'footer-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
            array(
        'id'          => 'footerpage_googleplus',
        'label'       => 'Footer googleplus',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}