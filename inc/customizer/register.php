<?php
/**
 * Wyvern Theme Customizer
 *
 * @package Wyvern
 */

/**
 * Registers customerizer controls
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wyvern_customize_register( $wp_customize ) {
    // Add our panels
    $wp_customize->add_panel( 
        'wyvern_theme_settings',
        array(
            'title' => __( 'Theme Settings', 'wyvern' ),
			'description' => __( 'Settings specific to the Wyvern theme.', 'wyvern' ),
            'priority' => 40,
        )
    );

    // Add our sections
	$wp_customize->add_section(
		'wyvern_theme_settings_general',
		array(
			'title'       => __( 'General', 'wyvern' ),
			'description' => __( 'General Information', 'wyvern' ),
            'capability'  => 'edit_theme_options',
            'panel'       => 'wyvern_theme_settings',
			'priority'    => 40,
		)
    );

	$wp_customize->add_section(
		'wyvern_theme_settings_social_media',
		array(
			'title'       => __( 'Social Media', 'wyvern' ),
			'description' => __( 'All of your social media profiles', 'wyvern' ),
            'capability'  => 'edit_theme_options',
            'panel'       => 'wyvern_theme_settings',
			'priority'    => 40,
		)
    );

	$wp_customize->add_section(
		'wyvern_theme_settings_newsletter',
		array(
			'title'       => __( 'Newsletter', 'wyvern' ),
			'description' => __( 'Controls the display of the Newsletter Signup Block', 'wyvern' ),
            'capability'  => 'edit_theme_options',
            'panel'       => 'wyvern_theme_settings',
			'priority'    => 40,
		)
    );

	$wp_customize->add_section(
		'wyvern_theme_settings_single_posts',
		array(
			'title'       => __( 'Single Posts', 'wyvern' ),
			'description' => __( 'Features for single posts.', 'wyvern' ),
            'capability'  => 'edit_theme_options',
            'panel'       => 'wyvern_theme_settings',
			'priority'    => 40,
		)
    );

	$wp_customize->add_section(
		'wyvern_theme_settings_footer',
		array(
			'title'       => __( 'Footer', 'wyvern' ),
			'description' => __( 'Footer Information', 'wyvern' ),
            'capability'  => 'edit_theme_options',
            'panel'       => 'wyvern_theme_settings',
			'priority'    => 40,
		)
    );

    // Setting: Cookie Notice Text
    $wp_customize->add_setting( 
        'cookie_notice_text', 
        array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
            'sanitize_callback' => 'wp_filter_nohtml_kses',
        )
    );

    // Control: Cookie Notice Text
    $wp_customize->add_control( 
        'cookie_notice_text', 
        array(
            'label' => __( 'Cookie Notice - Text', 'wyvern' ),
            'description' => __( 'Text for your cookie notification.', 'wyvern' ),
            'type' => 'text',
            'section' => 'wyvern_theme_settings_general',
        ) 
    );

    // Setting: Cookie Notice Page
    $wp_customize->add_setting( 
        'cookie_notice_page', 
        array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
            'sanitize_callback' => 'wyvern_sanitize_page_dropdown',
        )
    );

    // Control: Cookie Notice Page
    $wp_customize->add_control( 
        'cookie_notice_page',  
        array(
            'label' => __( 'Cookie Notification -  Page', 'wyvern' ),
            'description' => __( 'What page should we link to?', 'wyvern' ),
			'type'     => 'dropdown-pages',
            'section' => 'wyvern_theme_settings_general',
        ) 
    );

    // Setting: Cookie Notice Page Button Text
    $wp_customize->add_setting( 
        'cookie_notice_button_text', 
        array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
            'sanitize_callback' => 'wp_filter_nohtml_kses',
        )
    );

    // Control: Cookie Notice Page Button Text
    $wp_customize->add_control( 
        'cookie_notice_button_text', 
        array(
            'label' => __( 'Cookie Notice - Button Text', 'wyvern' ),
            'description' => __( 'Text for your cookie notification button.', 'wyvern' ),
            'type' => 'text',
            'section' => 'wyvern_theme_settings_general',
        ) 
    );

    // Setting: Facebook Link
    $wp_customize->add_setting( 
        'facebook_link', 
        array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url',
        )
    );

    // Control: Facebook Link
    $wp_customize->add_control( 
        'facebook_link', 
        array(
            'label' => __( 'Facebook Link', 'wyvern' ),
            'description' => __( 'Link your Facebook page here. Used throughout the site.', 'wyvern' ),
            'type' => 'text',
            'section' => 'wyvern_theme_settings_social_media',
        ) 
    );

    // Setting: Twitter Link
    $wp_customize->add_setting( 
        'twitter_link', 
        array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url',
        )
    );

    // Control: Twitter Link
    $wp_customize->add_control( 
        'twitter_link', 
        array(
            'label' => __( 'Twitter Link', 'wyvern' ),
            'description' => __( 'Link your Twitter page here. Used throughout the site.', 'wyvern' ),
            'type' => 'text',
            'section' => 'wyvern_theme_settings_social_media',
        ) 
    );

    // Setting: Instagram Link
    $wp_customize->add_setting( 
        'instagram_link', 
        array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url',
        )
    );

    // Control: Instagram Link
    $wp_customize->add_control( 
        'instagram_link', 
        array(
            'label' => __( 'Instagram Link', 'wyvern' ),
            'description' => __( 'Link your Instagram page here. Used throughout the site.', 'wyvern' ),
            'type' => 'text',
            'section' => 'wyvern_theme_settings_social_media',
        ) 
    );

    // Setting: GitHub Link
    $wp_customize->add_setting( 
        'github_link', 
        array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url',
        )
    );

    // Control: GitHub Link
    $wp_customize->add_control( 
        'github_link', 
        array(
            'label' => __( 'GitHub Link', 'wyvern' ),
            'description' => __( 'Link your GitHub page here. Used throughout the site.', 'wyvern' ),
            'type' => 'text',
            'section' => 'wyvern_theme_settings_social_media',
        ) 
    );

    // Setting: YouTube Link
    $wp_customize->add_setting( 
        'youtube_link', 
        array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url',
        )
    );

    // Control: YouTube Link
    $wp_customize->add_control( 
        'youtube_link', 
        array(
            'label' => __( 'YouTube Link', 'wyvern' ),
            'description' => __( 'Link your YouTube page here. Used throughout the site.', 'wyvern' ),
            'type' => 'text',
            'section' => 'wyvern_theme_settings_social_media',
        ) 
    );

    // Setting: Twitch Link
    $wp_customize->add_setting( 
        'twitch_link', 
        array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url',
        )
    );

    // Control: Twitch Link
    $wp_customize->add_control( 
        'twitch_link', 
        array(
            'label' => __( 'Twitch Link', 'wyvern' ),
            'description' => __( 'Link your Twitch page here. Used throughout the site.', 'wyvern' ),
            'type' => 'text',
            'section' => 'wyvern_theme_settings_social_media',
        ) 
    );

    // Setting: Newsletter Signup Form Name
    $wp_customize->add_setting( 
        'newsletter_signup_form_name', 
        array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
            'sanitize_callback' => 'wp_filter_nohtml_kses',
        )
    );

    // Control: Newsletter Signup Form Name
    $wp_customize->add_control( 
        'newsletter_signup_form_name', 
        array(
            'label' => __( 'Newsletter Signup Form Name', 'wyvern' ),
            'description' => __( 'What is the name of your newletter signup form?', 'wyvern' ),
            'type' => 'text',
            'section' => 'wyvern_theme_settings_newsletter',
        ) 
    );

    // Setting: Newsletter Signup Form Prompt
    $wp_customize->add_setting( 
        'newsletter_signup_form_prompt', 
        array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
            'sanitize_callback' => 'wp_filter_nohtml_kses',
        )
    );

    // Control: Newsletter Signup Form Prompt
    $wp_customize->add_control( 
        'newsletter_signup_form_prompt', 
        array(
            'label' => __( 'Newsletter Signup Form Prompt', 'wyvern' ),
            'description' => __( 'What text should go above your newsletter signup form?', 'wyvern' ),
            'type' => 'text',
            'section' => 'wyvern_theme_settings_newsletter',
        ) 
    );

    // Setting: Affiliate Link Notification - Text
    $wp_customize->add_setting( 
        'affiliate_link_notification_text', 
        array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
            'sanitize_callback' => 'wp_filter_nohtml_kses',
        )
    );

    // Control: Affiliate Link Notification - Text
    $wp_customize->add_control( 
        'affiliate_link_notification_text', 
        array(
            'label' => __( 'Affiliate Link Notification - Text', 'wyvern' ),
            'description' => __( 'What text should be shown as your affiliate link notification?', 'wyvern' ),
            'type' => 'text',
            'section' => 'wyvern_theme_settings_single_posts',
        ) 
    );

    // Setting: Affiliate Link Notification - Page
    $wp_customize->add_setting( 
        'affiliate_link_notification_page', 
        array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
            'sanitize_callback' => 'wyvern_sanitize_page_dropdown',
        )
    );

    // Control: Affiliate Link Notification - Page
    $wp_customize->add_control( 
        'affiliate_link_notification_page', 
        array(
            'label' => __( 'Affiliate Link Notification - Page', 'wyvern' ),
            'description' => __( 'What page should we link to?', 'wyvern' ),
			'type'     => 'dropdown-pages',
            'section' => 'wyvern_theme_settings_single_posts',
        ) 
    );

    // Setting: Footer Statement
    $wp_customize->add_setting( 
        'footer_statement', 
        array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
            'sanitize_callback' => 'wp_filter_nohtml_kses',
        )
    );

    // Control: Footer Statement
    $wp_customize->add_control( 
        'footer_statement', 
        array(
            'label' => __( 'Footer Statement', 'wyvern' ),
            'description' => __( 'This text will display on a line after the logo', 'wyvern' ),
            'type' => 'textarea',
            'section' => 'wyvern_theme_settings_footer',
        ) 
    );

    // Setting: Footer Logo
    $wp_customize->add_setting( 
        'footer_logo', 
        array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
            'sanitize_callback' => 'wyvern_sanitize_file',
        )
    );

    // Control: Footer Logo
    $wp_customize->add_control( 
        new WP_Customize_Image_Control(
            $wp_customize,
            'footer_logo',
            array(
                'label'      => __( 'Footer logo', 'wyvern' ),
                'description' => __( 'If a logo is not uploaded, the header logo will be used.', 'wyvern' ),
                'section'    => 'wyvern_theme_settings_footer',
            )
        )
    );

    // Setting: Footer Copyright Info
    $wp_customize->add_setting( 
        'footer_copyright_statement', 
        array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
            'sanitize_callback' => 'wp_filter_nohtml_kses',
        )
    );

    // Control: Footer Copyright Info
    $wp_customize->add_control( 
        'footer_copyright_statement', 
        array(
            'label' => __( 'Footer Copyright Statement', 'wyvern' ),
            'description' => __( 'This text will display after the Copyright', 'wyvern' ),
            'type' => 'text',
            'section' => 'wyvern_theme_settings_footer',
        ) 
    );
}
add_action( 'customize_register', 'wyvern_customize_register' );

/**
* select sanitization function
* @see https://divpusher.com/blog/wordpress-customizer-sanitization-examples/#select
*/
function wyvern_sanitize_select( $input, $setting ){
          
    //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
    $input = sanitize_key($input);

    //get the list of possible select options 
    $choices = $setting->manager->get_control( $setting->id )->choices;
                      
    //return input if valid or return default option
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
* Sanitize prepoulated page select dropdowns
* @see https://forums.envato.com/t/select-sanitize-callback-in-wp-customizer/51740
*/
function wyvern_sanitize_page_dropdown( $page_id, $setting ) {
    // Ensure $input is an absolute integer.
    $page_id = absint( $page_id );
  
    // If $page_id is an ID of a published page, return it; otherwise, return the default.
    return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

/** 
* file input sanitization function
* @see https://divpusher.com/blog/wordpress-customizer-sanitization-examples/#file
*/
function wyvern_sanitize_file( $file, $setting ) {
          
    //allowed file types
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png'
    );
      
    //check file type from file name
    $file_ext = wp_check_filetype( $file, $mimes );
      
    //if file has a valid mime type return it, otherwise return default
    return ( $file_ext['ext'] ? $file : $setting->default );
}