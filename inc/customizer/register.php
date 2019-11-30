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
        )
    );

    // Control: Cookie Notice Text
    $wp_customize->add_control( 
        'cookie_notice_text', 
        array(
            'label' => __( 'Cookie Notice - Text' ),
            'description' => __( 'Text for your cookie notification.' ),
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
        )
    );

    // Control: Cookie Notice Page
    $wp_customize->add_control( 
        'cookie_notice_page',  
        array(
            'label' => __( 'Cookie Notification -  Page' ),
            'description' => __( 'What page should we link to?' ),
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
        )
    );

    // Control: Cookie Notice Page Button Text
    $wp_customize->add_control( 
        'cookie_notice_button_text', 
        array(
            'label' => __( 'Cookie Notice - Button Text' ),
            'description' => __( 'Text for your cookie notification button.' ),
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
        )
    );

    // Control: Facebook Link
    $wp_customize->add_control( 
        'facebook_link', 
        array(
            'label' => __( 'Facebook Link' ),
            'description' => __( 'Link your Facebook page here. Used throughout the site.' ),
            'type' => 'text',
            'section' => 'wyvern_theme_settings_general',
        ) 
    );

    // Setting: Twitter Link
    $wp_customize->add_setting( 
        'twitter_link', 
        array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
        )
    );

    // Control: Twitter Link
    $wp_customize->add_control( 
        'twitter_link', 
        array(
            'label' => __( 'Twitter Link' ),
            'description' => __( 'Link your Twitter page here. Used throughout the site.' ),
            'type' => 'text',
            'section' => 'wyvern_theme_settings_general',
        ) 
    );

    // Setting: Instagram Link
    $wp_customize->add_setting( 
        'instagram_link', 
        array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
        )
    );

    // Control: Instagram Link
    $wp_customize->add_control( 
        'instagram_link', 
        array(
            'label' => __( 'Instagram Link' ),
            'description' => __( 'Link your Instagram page here. Used throughout the site.' ),
            'type' => 'text',
            'section' => 'wyvern_theme_settings_general',
        ) 
    );

    // Setting: YouTube Link
    $wp_customize->add_setting( 
        'youtube_link', 
        array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
        )
    );

    // Control: YouTube Link
    $wp_customize->add_control( 
        'youtube_link', 
        array(
            'label' => __( 'YouTube Link' ),
            'description' => __( 'Link your YouTube page here. Used throughout the site.' ),
            'type' => 'text',
            'section' => 'wyvern_theme_settings_general',
        ) 
    );

    // Setting: Twitch Link
    $wp_customize->add_setting( 
        'twitch_link', 
        array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
        )
    );

    // Control: Twitch Link
    $wp_customize->add_control( 
        'twitch_link', 
        array(
            'label' => __( 'Twitch Link' ),
            'description' => __( 'Link your Twitch page here. Used throughout the site.' ),
            'type' => 'text',
            'section' => 'wyvern_theme_settings_general',
        ) 
    );

    // Setting: Newsletter Signup Form Name
    $wp_customize->add_setting( 
        'newsletter_signup_form_name', 
        array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
        )
    );

    // Control: Newsletter Signup Form Name
    $wp_customize->add_control( 
        'newsletter_signup_form_name', 
        array(
            'label' => __( 'Newsletter Signup Form Name' ),
            'description' => __( 'What is the name of your newletter signup form?' ),
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
        )
    );

    // Control: Newsletter Signup Form Prompt
    $wp_customize->add_control( 
        'newsletter_signup_form_prompt', 
        array(
            'label' => __( 'Newsletter Signup Form Prompt' ),
            'description' => __( 'What text should go above your newsletter signup form?' ),
            'type' => 'text',
            'section' => 'wyvern_theme_settings_newsletter',
        ) 
    );

    // Setting: Progress Bar Icon
    $wp_customize->add_setting( 
        'progress_bar_icon', 
        array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
        )
    );

    // Control: Progress Bar Icon
    $wp_customize->add_control( 
        new WP_Customize_Image_Control(
            $wp_customize,
            'progress_bar_icon',
            array(
                'label'      => __( 'Upload an icon', 'wyvern' ),
                'section'    => 'wyvern_theme_settings_single_posts',
            )
        )
    );

    // Setting: Affiliate Link Notification - Text
    $wp_customize->add_setting( 
        'affiliate_link_notification_text', 
        array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
        )
    );

    // Control: Affiliate Link Notification - Text
    $wp_customize->add_control( 
        'affiliate_link_notification_text', 
        array(
            'label' => __( 'Affiliate Link Notification - Text' ),
            'description' => __( 'What text should be shown as your affiliate link notification?' ),
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
        )
    );

    // Control: Affiliate Link Notification - Page
    $wp_customize->add_control( 
        'affiliate_link_notification_page', 
        array(
            'label' => __( 'Affiliate Link Notification - Page' ),
            'description' => __( 'What page should we link to?' ),
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
        )
    );

    // Control: Footer Statement
    $wp_customize->add_control( 
        'footer_statement', 
        array(
            'label' => __( 'Footer Statement' ),
            'description' => __( 'This text will display on a line before the logo' ),
            'type' => 'textarea',
            'section' => 'wyvern_theme_settings_footer',
        ) 
    );

    // Setting: Footer Copyright Info
    $wp_customize->add_setting( 
        'footer_copyright_statement', 
        array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
        )
    );

    // Control: Footer Copyright Info
    $wp_customize->add_control( 
        'footer_copyright_statement', 
        array(
            'label' => __( 'Footer Copyright Statement' ),
            'description' => __( 'This text will display after the Copyright' ),
            'type' => 'text',
            'section' => 'wyvern_theme_settings_footer',
        ) 
    );
}
add_action( 'customize_register', 'wyvern_customize_register' );