<?php
/**
 * Wyvern Theme Customizer
 *
 * @package Wyvern
 */

/**
 * Registers customizer controls for the theme
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wyvern_customizer_theme_settings_panel( $wp_customize ) {
    // Add our panel
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

    /* DISABLING UNTIL FULLY DEVELOPED
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
    */

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

    /* DISABLING UNTIL FULLY DEVELOPED
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
    */

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
add_action( 'customize_register', 'wyvern_customizer_theme_settings_panel' );


/**
 * Registers customizer controls for colors
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wyvern_customizer_color_settings_panel( $wp_customize ) {
    // Add our panel
    $wp_customize->add_panel( 
        'wyvern_color_settings',
        array(
            'title' => __( 'Color Settings', 'wyvern' ),
			'description' => __( 'Customize your theme\'s colors', 'wyvern' ),
            'priority' => 40,
        )
    );

    // Add our sections
	$wp_customize->add_section(
		'wyvern_color_settings_header',
		array(
			'title'       => __( 'Header & Menu', 'wyvern' ),
			'description' => __( 'Header and Top Menu Colors', 'wyvern' ),
            'capability'  => 'edit_theme_options',
            'panel'       => 'wyvern_color_settings',
			'priority'    => 40,
		)
    );

	$wp_customize->add_section(
		'wyvern_color_settings_footer',
		array(
			'title'       => __( 'Footer', 'wyvern' ),
			'description' => __( 'Footer and Bottom Menu Colors', 'wyvern' ),
            'capability'  => 'edit_theme_options',
            'panel'       => 'wyvern_color_settings',
			'priority'    => 40,
		)
    );

    // Setting: Colors - Header Background
    $wp_customize->add_setting( 
        'colors_header_background', 
        array(
            'type' => 'theme_mod',
            'default' => '#000000',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
            'sanitize_callback' => 'wp_filter_nohtml_kses',
        )
    );

    // Control: Colors - Header Background
    $wp_customize->add_control(
        new WP_Customize_Color_Control( $wp_customize, 
            'colors_header_background',
            array(
                'label' => __( 'Background Color', 'wyvern' ),
                'description' => __( 'Sets the primary header background color' ),
                'section' => 'wyvern_color_settings_header',
            ) 
        ) 
    );

    // Setting: Colors - Nav Item
    $wp_customize->add_setting( 
        'colors_nav_item', 
        array(
            'type' => 'theme_mod',
            'default' => '#FFFFFF',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
            'sanitize_callback' => 'wp_filter_nohtml_kses',
        )
    );

    // Control: Colors - Nav Item
    $wp_customize->add_control(
        new WP_Customize_Color_Control( $wp_customize, 
            'colors_nav_item',
            array(
                'label' => __( 'Menu Item', 'wyvern' ),
                'description' => __( 'Sets the nav menu text color' ),
                'section' => 'wyvern_color_settings_header',
            ) 
        ) 
    );

    // Setting: Colors - Nav Item, Hover
    $wp_customize->add_setting( 
        'colors_nav_item_hover', 
        array(
            'type' => 'theme_mod',
            'default' => '#C0C0C0',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
            'sanitize_callback' => 'wp_filter_nohtml_kses',
        )
    );

    // Control: Colors - Nav Item, Hover
    $wp_customize->add_control(
        new WP_Customize_Color_Control( $wp_customize, 
            'colors_nav_item_hover',
            array(
                'label' => __( 'Menu Item - Hover/Focus/Active', 'wyvern' ),
                'description' => __( 'Sets the hover, focus, and active state color' ),
                'section' => 'wyvern_color_settings_header',
            ) 
        ) 
    );

    // Setting: Colors - Footer Background
    $wp_customize->add_setting( 
        'colors_footer_background', 
        array(
            'type' => 'theme_mod',
            'default' => '#000000',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
            'sanitize_callback' => 'wp_filter_nohtml_kses',
        )
    );

    // Control: Colors - Footer Background
    $wp_customize->add_control(
        new WP_Customize_Color_Control( $wp_customize, 
            'colors_footer_background',
            array(
                'label' => __( 'Background Color', 'wyvern' ),
                'description' => __( 'Sets the primary footer background color' ),
                'section' => 'wyvern_color_settings_footer',
            ) 
        ) 
    );

    // Setting: Colors - Nav Item
    $wp_customize->add_setting( 
        'colors_footer_nav_item', 
        array(
            'type' => 'theme_mod',
            'default' => '#FFFFFF',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
            'sanitize_callback' => 'wp_filter_nohtml_kses',
        )
    );

    // Control: Colors - Nav Item
    $wp_customize->add_control(
        new WP_Customize_Color_Control( $wp_customize, 
            'colors_footer_nav_item',
            array(
                'label' => __( 'Menu Item', 'wyvern' ),
                'description' => __( 'Sets the nav menu text color' ),
                'section' => 'wyvern_color_settings_footer',
            ) 
        ) 
    );

    // Setting: Colors - Nav Item, Hover
    $wp_customize->add_setting( 
        'colors_footer_nav_item_hover', 
        array(
            'type' => 'theme_mod',
            'default' => '#C0C0C0',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
            'sanitize_callback' => 'wp_filter_nohtml_kses',
        )
    );

    // Control: Colors - Nav Item, Hover
    $wp_customize->add_control(
        new WP_Customize_Color_Control( $wp_customize, 
            'colors_footer_nav_item_hover',
            array(
                'label' => __( 'Menu Item - Hover/Focus/Active', 'wyvern' ),
                'description' => __( 'Sets the hover, focus, and active state color' ),
                'section' => 'wyvern_color_settings_footer',
            ) 
        ) 
    );

}
add_action( 'customize_register', 'wyvern_customizer_color_settings_panel' );


/**
 * Registers customizer controls for colors
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wyvern_customizer_typography_settings_panel( $wp_customize ) {
    // Add our panel
    $wp_customize->add_panel( 
        'wyvern_typography_settings',
        array(
            'title' => __( 'Typography Settings', 'wyvern' ),
			'description' => __( 'Customize your theme\'s fonts & text sizes', 'wyvern' ),
            'priority' => 40,
        )
    );

    // Add our sections
	$wp_customize->add_section(
		'wyvern_typography_settings_fonts',
		array(
			'title'       => __( 'Fonts', 'wyvern' ),
			'description' => __( 'Font Settings', 'wyvern' ),
            'capability'  => 'edit_theme_options',
            'panel'       => 'wyvern_typography_settings',
			'priority'    => 40,
		)
    );

    // Setting: Typography - Primary Font, used for most text
    $wp_customize->add_setting( 
        'typography_font_primary', 
        array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
            'sanitize_callback' => 'wp_filter_nohtml_kses',
        )
    );

    // Control: Typography - Primary Font
    $wp_customize->add_control( 
        'typography_font_primary', 
        array(
            'label' => __( 'Primary Font', 'wyvern' ),
            'description' => __( 'Used for most text', 'wyvern' ),
            'type' => 'select',
            'choices' => array(
                'Lato' => __( 'Lato', 'wyvern' ),
                'Lora' => __( 'Lora', 'wyvern' ),
                'Merriweather' => __( 'Merriweather', 'wyvern' ),
                'Montserrat' => __( 'Montserrat', 'wyvern' ),
                'Open+Sans' => __( 'Open Sans', 'wyvern' ),
                'Oswald' => __( 'Oswald', 'wyvern' ),
                'Playfair+Display' => __( 'Playfair Display', 'wyvern' ),
                'Poppins' => __( 'Poppins', 'wyvern' ),
                'PT+Serif' => __( 'PT Serif', 'wyvern' ),
                'Raleway' => __( 'Raleway', 'wyvern' ),
                'Roboto' => __( 'Roboto', 'wyvern' ),
                'Roboto+Slab' => __( 'Roboto Slab', 'wyvern' ),
            ),
            'section' => 'wyvern_typography_settings_fonts',
        ) 
    );

    // Setting: Typography - Secondary Font, used for headers
    $wp_customize->add_setting( 
        'typography_font_secondary', 
        array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
            'sanitize_callback' => 'wp_filter_nohtml_kses',
        )
    );

    // Control: Typography - Secondary Font
    $wp_customize->add_control( 
        'typography_font_secondary', 
        array(
            'label' => __( 'Secondary Font', 'wyvern' ),
            'description' => __( 'Used for headers and other special situations', 'wyvern' ),
            'type' => 'select',
            'choices' => array(
                'Lato' => __( 'Lato', 'wyvern' ),
                'Lora' => __( 'Lora', 'wyvern' ),
                'Merriweather' => __( 'Merriweather', 'wyvern' ),
                'Montserrat' => __( 'Montserrat', 'wyvern' ),
                'Open+Sans' => __( 'Open Sans', 'wyvern' ),
                'Oswald' => __( 'Oswald', 'wyvern' ),
                'Playfair+Display' => __( 'Playfair Display', 'wyvern' ),
                'Poppins' => __( 'Poppins', 'wyvern' ),
                'PT+Serif' => __( 'PT Serif', 'wyvern' ),
                'Raleway' => __( 'Raleway', 'wyvern' ),
                'Roboto' => __( 'Roboto', 'wyvern' ),
                'Roboto+Slab' => __( 'Roboto Slab', 'wyvern' ),
            ),
            'section' => 'wyvern_typography_settings_fonts',
        ) 
    );
}
add_action( 'customize_register', 'wyvern_customizer_typography_settings_panel' );


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