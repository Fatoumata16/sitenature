<?php
/**
 * VW Eco Nature Theme Customizer
 *
 * @package VW Eco Nature
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_eco_nature_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_eco_nature_custom_controls' );

function vw_eco_nature_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'vw_eco_nature_customize_partial_blogname', 
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'vw_eco_nature_customize_partial_blogdescription', 
	));

	//add home page setting pannel
	$VWEcoNatureParentPanel = new VW_Eco_Nature_WP_Customize_Panel( $wp_customize, 'vw_eco_nature_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'VW Settings', 'vw-eco-nature' ),
		'priority' => 10,
	));

	// Layout
	$wp_customize->add_section( 'vw_eco_nature_left_right', array(
    	'title'      => esc_html__( 'General Settings', 'vw-eco-nature' ),
		'panel' => 'vw_eco_nature_panel_id'
	) );

	$wp_customize->add_setting('vw_eco_nature_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'vw_eco_nature_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Eco_Nature_Image_Radio_Control($wp_customize, 'vw_eco_nature_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','vw-eco-nature'),
        'description' => __('Here you can change the width layout of Website.','vw-eco-nature'),
        'section' => 'vw_eco_nature_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_eco_nature_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_eco_nature_sanitize_choices'	        
	) );
	$wp_customize->add_control('vw_eco_nature_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-eco-nature'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-eco-nature'),
        'section' => 'vw_eco_nature_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-eco-nature'),
            'Right Sidebar' => __('Right Sidebar','vw-eco-nature'),
            'One Column' => __('One Column','vw-eco-nature'),
            'Three Columns' => __('Three Columns','vw-eco-nature'),
            'Four Columns' => __('Four Columns','vw-eco-nature'),
            'Grid Layout' => __('Grid Layout','vw-eco-nature')
        ),
	));

	$wp_customize->add_setting('vw_eco_nature_page_layout',array(
        'default' => 'One Column',
        'sanitize_callback' => 'vw_eco_nature_sanitize_choices'
	));
	$wp_customize->add_control('vw_eco_nature_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-eco-nature'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-eco-nature'),
        'section' => 'vw_eco_nature_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-eco-nature'),
            'Right Sidebar' => __('Right Sidebar','vw-eco-nature'),
            'One Column' => __('One Column','vw-eco-nature')
        ),
	) );

	$wp_customize->add_setting( 'vw_eco_nature_single_page_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_single_page_breadcrumb',array(
		'label' => esc_html__( 'Single Page Breadcrumb','vw-eco-nature' ),
		'section' => 'vw_eco_nature_left_right'
    )));

	 //Wow Animation
	$wp_customize->add_setting( 'vw_eco_nature_animation',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_animation',array(
        'label' => esc_html__( 'Animation ','vw-eco-nature' ),
        'description' => __('Here you can disable overall site animation effect','vw-eco-nature'),
        'section' => 'vw_eco_nature_left_right'
    )));

    $wp_customize->add_setting('vw_eco_nature_reset_all_settings',array(
      'sanitize_callback'	=> 'sanitize_text_field',
   	));
   	$wp_customize->add_control(new VW_Eco_Nature_Reset_Custom_Control($wp_customize, 'vw_eco_nature_reset_all_settings',array(
      'type' => 'reset_control',
      'label' => __('Reset All Settings', 'vw-eco-nature'),
      'description' => 'vw_eco_nature_reset_all_settings',
      'section' => 'vw_eco_nature_left_right'
   	)));

	//Pre-Loader
	$wp_customize->add_setting( 'vw_eco_nature_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','vw-eco-nature' ),
        'section' => 'vw_eco_nature_left_right'
    )));

	$wp_customize->add_setting('vw_eco_nature_preloader_bg_color', array(
		'default'           => '#24a500',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_eco_nature_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'vw-eco-nature'),
		'section'  => 'vw_eco_nature_left_right',
	)));

	$wp_customize->add_setting('vw_eco_nature_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_eco_nature_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'vw-eco-nature'),
		'section'  => 'vw_eco_nature_left_right',
	)));

	//Topbar
	$wp_customize->add_section( 'vw_eco_nature_topbar', array(
    	'title'      => __( 'Topbar Settings', 'vw-eco-nature' ),
		'panel' => 'vw_eco_nature_panel_id'
	) );

	$wp_customize->add_setting( 'vw_eco_nature_topbar_hide_show',
       array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_topbar_hide_show',
       array(
      'label' => esc_html__( 'Show / Hide Topbar','vw-eco-nature' ),
      'section' => 'vw_eco_nature_topbar'
    )));

    $wp_customize->add_setting('vw_eco_nature_topbar_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_topbar_padding_top_bottom',array(
		'label'	=> __('Topbar Padding Top Bottom','vw-eco-nature'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_topbar',
		'type'=> 'text'
	));

    //Sticky Header
	$wp_customize->add_setting( 'vw_eco_nature_sticky_header',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_sticky_header',array(
        'label' => esc_html__( 'Sticky Header','vw-eco-nature' ),
        'section' => 'vw_eco_nature_topbar'
    )));

    $wp_customize->add_setting('vw_eco_nature_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_sticky_header_padding',array(
		'label'	=> __('Sticky Header Padding','vw-eco-nature'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_navigation_menu_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_navigation_menu_font_size',array(
		'label'	=> __('Menus Font Size','vw-eco-nature'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_navigation_menu_font_weight',array(
        'default' => 'Default',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_eco_nature_sanitize_choices'
	));
	$wp_customize->add_control('vw_eco_nature_navigation_menu_font_weight',array(
        'type' => 'select',
        'label' => __('Menus Font Weight','vw-eco-nature'),
        'section' => 'vw_eco_nature_topbar',
        'choices' => array(
        	'Default' => __('Default','vw-eco-nature'),
            'Normal' => __('Normal','vw-eco-nature')
        ),
	) );

	$wp_customize->add_setting('vw_eco_nature_header_menus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_eco_nature_header_menus_color', array(
		'label'    => __('Menus Color', 'vw-eco-nature'),
		'section'  => 'vw_eco_nature_topbar',
	)));

	$wp_customize->add_setting('vw_eco_nature_header_menus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_eco_nature_header_menus_hover_color', array(
		'label'    => __('Menus Hover Color', 'vw-eco-nature'),
		'section'  => 'vw_eco_nature_topbar',
	)));

	$wp_customize->add_setting('vw_eco_nature_header_submenus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_eco_nature_header_submenus_color', array(
		'label'    => __('Sub Menus Color', 'vw-eco-nature'),
		'section'  => 'vw_eco_nature_topbar',
	)));

	$wp_customize->add_setting('vw_eco_nature_header_submenus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_eco_nature_header_submenus_hover_color', array(
		'label'    => __('Sub Menus Hover Color', 'vw-eco-nature'),
		'section'  => 'vw_eco_nature_topbar',
	)));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_eco_nature_search_hide_show', array( 
		'selector' => '.search-box i', 
		'render_callback' => 'vw_eco_nature_customize_partial_vw_eco_nature_search_hide_show', 
	));

	$wp_customize->add_setting( 'vw_eco_nature_search_hide_show',array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_search_hide_show',array(
          'label' => esc_html__( 'Show / Hide Search','vw-eco-nature' ),
          'section' => 'vw_eco_nature_topbar'
    )));

    $wp_customize->add_setting('vw_eco_nature_search_icon',array(
		'default'	=> 'fas fa-search',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Eco_Nature_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_eco_nature_search_icon',array(
		'label'	=> __('Add Search Icon','vw-eco-nature'),
		'transport' => 'refresh',
		'section'	=> 'vw_eco_nature_topbar',
		'setting'	=> 'vw_eco_nature_search_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_eco_nature_search_close_icon',array(
		'default'	=> 'fa fa-window-close',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Eco_Nature_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_eco_nature_search_close_icon',array(
		'label'	=> __('Add Search Close Icon','vw-eco-nature'),
		'transport' => 'refresh',
		'section'	=> 'vw_eco_nature_topbar',
		'setting'	=> 'vw_eco_nature_search_close_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('vw_eco_nature_search_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_search_font_size',array(
		'label'	=> __('Search Font Size','vw-eco-nature'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_search_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_search_padding_top_bottom',array(
		'label'	=> __('Search Padding Top Bottom','vw-eco-nature'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_search_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_search_padding_left_right',array(
		'label'	=> __('Search Padding Left Right','vw-eco-nature'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_eco_nature_search_border_radius', array(
		'default'              => "",
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_eco_nature_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_eco_nature_search_border_radius', array(
		'label'       => esc_html__( 'Search Border Radius','vw-eco-nature' ),
		'section'     => 'vw_eco_nature_topbar',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_eco_nature_search_placeholder',array(
       'default' => esc_html__('Search','vw-eco-nature'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_eco_nature_search_placeholder',array(
       'type' => 'text',
       'label' => __('Search Placeholder Text','vw-eco-nature'),
       'section' => 'vw_eco_nature_topbar'
    ));

	 //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_eco_nature_location_text', array( 
		'selector' => '.icon-space b', 
		'render_callback' => 'vw_eco_nature_customize_partial_vw_eco_nature_location_text', 
	));

    $wp_customize->add_setting('vw_eco_nature_location_icon',array(
		'default'	=> 'fas fa-map-marker-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Eco_Nature_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_eco_nature_location_icon',array(
		'label'	=> __('Add Location Icon','vw-eco-nature'),
		'transport' => 'refresh',
		'section'	=> 'vw_eco_nature_topbar',
		'setting'	=> 'vw_eco_nature_location_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_eco_nature_location_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_location_text',array(
		'label'	=> __('Add Location Text','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( 'LOCATION', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_location',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_location',array(
		'label'	=> __('Add Location','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '828 N. Iqyreesrs Street Liocnss Park', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_phone_number_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Eco_Nature_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_eco_nature_phone_number_icon',array(
		'label'	=> __('Add Phone Number Icon','vw-eco-nature'),
		'transport' => 'refresh',
		'section'	=> 'vw_eco_nature_topbar',
		'setting'	=> 'vw_eco_nature_phone_number_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_eco_nature_phone_number_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_phone_number_text',array(
		'label'	=> __('Add Phone Number Text','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( 'PHONE', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_phone_number',array(
		'default'=> '',
		'sanitize_callback'	=> 'vw_eco_nature_sanitize_phone_number'
	));
	$wp_customize->add_control('vw_eco_nature_phone_number',array(
		'label'	=> __('Add Phone Number','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '+00 987 654 1230', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_email_address_icon',array(
		'default'	=> 'far fa-envelope',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Eco_Nature_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_eco_nature_email_address_icon',array(
		'label'	=> __('Add Email Icon','vw-eco-nature'),
		'transport' => 'refresh',
		'section'	=> 'vw_eco_nature_topbar',
		'setting'	=> 'vw_eco_nature_email_address_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_eco_nature_email_address_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_email_address_text',array(
		'label'	=> __('Add Email Address Text','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( 'EMAIL', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_email_address',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));
	$wp_customize->add_control('vw_eco_nature_email_address',array(
		'label'	=> __('Add Email Address','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( 'example@gmail.com', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_donate_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_donate_text',array(
		'label'	=> __('Add Button Text','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( 'DONATE NOW', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_donate_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('vw_eco_nature_donate_url',array(
		'label'	=> __('Add Button URL','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( 'www.example.com', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_topbar',
		'type'=> 'text'
	));
    
	//Slider
	$wp_customize->add_section( 'vw_eco_nature_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'vw-eco-nature' ),
    	'description' => __('Free theme has 3 slides options, For unlimited slides and more options </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/eco-nature-wordpress-theme/">GO PRO</a>','vw-eco-nature'),
		'panel' => 'vw_eco_nature_panel_id'
	) );

	$wp_customize->add_setting( 'vw_eco_nature_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','vw-eco-nature' ),
      'section' => 'vw_eco_nature_slidersettings'
    )));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_eco_nature_slider_hide_show',array(
		'selector'        => '#slider .inner_carousel h1',
		'render_callback' => 'vw_eco_nature_customize_partial_vw_eco_nature_slider_hide_show',
	));

	for ( $count = 1; $count <= 3; $count++ ) {
		$wp_customize->add_setting( 'vw_eco_nature_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_eco_nature_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_eco_nature_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'vw-eco-nature' ),
			'description' => __('Slider image size (1500 x 590)','vw-eco-nature'),
			'section'  => 'vw_eco_nature_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting('vw_eco_nature_before_slider_button_icon',array(
		'default'	=> 'fas fa-plus',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Eco_Nature_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_eco_nature_before_slider_button_icon',array(
		'label'	=> __('Add Before Slider Button Icon','vw-eco-nature'),
		'transport' => 'refresh',
		'section'	=> 'vw_eco_nature_slidersettings',
		'setting'	=> 'vw_eco_nature_before_slider_button_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_eco_nature_slider_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_slider_button_text',array(
		'label'	=> __('Add Slider Button Text','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_after_slider_button_icon',array(
		'default'	=> 'fas fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Eco_Nature_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_eco_nature_after_slider_button_icon',array(
		'label'	=> __('Add After Slider Button Icon','vw-eco-nature'),
		'transport' => 'refresh',
		'section'	=> 'vw_eco_nature_slidersettings',
		'setting'	=> 'vw_eco_nature_after_slider_button_icon',
		'type'		=> 'icon'
	)));

	//content layout
	$wp_customize->add_setting('vw_eco_nature_slider_content_option',array(
        'default' => 'Center',
        'sanitize_callback' => 'vw_eco_nature_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Eco_Nature_Image_Radio_Control($wp_customize, 'vw_eco_nature_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','vw-eco-nature'),
        'section' => 'vw_eco_nature_slidersettings',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/slider-content3.png',
    ))));

    //Slider content padding
    $wp_customize->add_setting('vw_eco_nature_slider_content_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_slider_content_padding_top_bottom',array(
		'label'	=> __('Slider Content Padding Top Bottom','vw-eco-nature'),
		'description'	=> __('Enter a value in %. Example:20%','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_slider_content_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_slider_content_padding_left_right',array(
		'label'	=> __('Slider Content Padding Left Right','vw-eco-nature'),
		'description'	=> __('Enter a value in %. Example:20%','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_slidersettings',
		'type'=> 'text'
	));

    //Slider excerpt
	$wp_customize->add_setting( 'vw_eco_nature_slider_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_eco_nature_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_eco_nature_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-eco-nature' ),
		'section'     => 'vw_eco_nature_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_eco_nature_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('vw_eco_nature_slider_opacity_color',array(
      'default'              => 0.5,
      'sanitize_callback' => 'vw_eco_nature_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_eco_nature_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','vw-eco-nature' ),
	'section'     => 'vw_eco_nature_slidersettings',
	'type'        => 'select',
	'settings'    => 'vw_eco_nature_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','vw-eco-nature'),
      '0.1' =>  esc_attr('0.1','vw-eco-nature'),
      '0.2' =>  esc_attr('0.2','vw-eco-nature'),
      '0.3' =>  esc_attr('0.3','vw-eco-nature'),
      '0.4' =>  esc_attr('0.4','vw-eco-nature'),
      '0.5' =>  esc_attr('0.5','vw-eco-nature'),
      '0.6' =>  esc_attr('0.6','vw-eco-nature'),
      '0.7' =>  esc_attr('0.7','vw-eco-nature'),
      '0.8' =>  esc_attr('0.8','vw-eco-nature'),
      '0.9' =>  esc_attr('0.9','vw-eco-nature')
	),
	));

	//Slider height
	$wp_customize->add_setting('vw_eco_nature_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_slider_height',array(
		'label'	=> __('Slider Height','vw-eco-nature'),
		'description'	=> __('Specify the slider height (px).','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_eco_nature_slider_speed', array(
		'default'  => 4000,
		'sanitize_callback'	=> 'vw_eco_nature_sanitize_float'
	) );
	$wp_customize->add_control( 'vw_eco_nature_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','vw-eco-nature'),
		'section' => 'vw_eco_nature_slidersettings',
		'type'  => 'number',
	) );
    
	//Our Services section
	$wp_customize->add_section( 'vw_eco_nature_services_section' , array(
    	'title'      => __( 'Our Services Settings', 'vw-eco-nature' ),
    	'description' => __('For more options of the Our Services section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/eco-nature-wordpress-theme/">GO PRO</a>','vw-eco-nature'),
		'priority'   => null,
		'panel' => 'vw_eco_nature_panel_id'
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_eco_nature_section_title', array( 
		'selector' => '#serv-section h2', 
		'render_callback' => 'vw_eco_nature_customize_partial_vw_eco_nature_section_title',
	));

	$wp_customize->add_setting('vw_eco_nature_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_section_title',array(
		'label'	=> __('Add Section Title','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( 'We Are The Savious of planet Earth', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_services_section',
		'type'=> 'text'
	));

	$categories = get_categories();
	$cat_post = array();
	$cat_post[]= 'select';
	$i = 0;	
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_eco_nature_our_services',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_eco_nature_sanitize_choices',
	));
	$wp_customize->add_control('vw_eco_nature_our_services',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display Services','vw-eco-nature'),
		'description' => __('Image Size (80 x 80)','vw-eco-nature'),
		'section' => 'vw_eco_nature_services_section',
	));

	$wp_customize->add_setting( 'vw_eco_nature_about_page' , array(
		'default'           => '',
		'sanitize_callback' => 'vw_eco_nature_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'vw_eco_nature_about_page' , array(
		'label'    => __( 'Select About Page', 'vw-eco-nature' ),
		'section'  => 'vw_eco_nature_services_section',
		'type'     => 'dropdown-pages'
	) );

	//Services excerpt
	$wp_customize->add_setting( 'vw_eco_nature_services_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_eco_nature_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_eco_nature_services_excerpt_number', array(
		'label'       => esc_html__( 'Services Excerpt length','vw-eco-nature' ),
		'section'     => 'vw_eco_nature_services_section',
		'type'        => 'range',
		'settings'    => 'vw_eco_nature_services_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog Post
	$wp_customize->add_panel( $VWEcoNatureParentPanel );

	$BlogPostParentPanel = new VW_Eco_Nature_WP_Customize_Panel( $wp_customize, 'blog_post_parent_panel', array(
		'title' => __( 'Blog Post Settings', 'vw-eco-nature' ),
		'panel' => 'vw_eco_nature_panel_id',
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	$wp_customize->add_section('vw_eco_nature_blog_post',array(
		'title'	=> __('Post Settings','vw-eco-nature'),
		'panel' => 'blog_post_parent_panel',
	));	

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_eco_nature_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'vw_eco_nature_customize_partial_vw_eco_nature_toggle_postdate', 
	));

	$wp_customize->add_setting('vw_eco_nature_toggle_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Eco_Nature_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_eco_nature_toggle_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','vw-eco-nature'),
		'transport' => 'refresh',
		'section'	=> 'vw_eco_nature_blog_post',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_eco_nature_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vw-eco-nature' ),
        'section' => 'vw_eco_nature_blog_post'
    )));

    $wp_customize->add_setting('vw_eco_nature_toggle_author_icon',array(
		'default'	=> 'far fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Eco_Nature_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_eco_nature_toggle_author_icon',array(
		'label'	=> __('Add Author Icon','vw-eco-nature'),
		'transport' => 'refresh',
		'section'	=> 'vw_eco_nature_blog_post',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_eco_nature_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_toggle_author',array(
		'label' => esc_html__( 'Author','vw-eco-nature' ),
		'section' => 'vw_eco_nature_blog_post'
    )));

    $wp_customize->add_setting('vw_eco_nature_toggle_comments_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Eco_Nature_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_eco_nature_toggle_comments_icon',array(
		'label'	=> __('Add Comments Icon','vw-eco-nature'),
		'transport' => 'refresh',
		'section'	=> 'vw_eco_nature_blog_post',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_eco_nature_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_toggle_comments',array(
		'label' => esc_html__( 'Comments','vw-eco-nature' ),
		'section' => 'vw_eco_nature_blog_post'
    )));

    $wp_customize->add_setting('vw_eco_nature_toggle_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Eco_Nature_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_eco_nature_toggle_time_icon',array(
		'label'	=> __('Add Time Icon','vw-eco-nature'),
		'transport' => 'refresh',
		'section'	=> 'vw_eco_nature_blog_post',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_eco_nature_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_toggle_time',array(
		'label' => esc_html__( 'Time','vw-eco-nature' ),
		'section' => 'vw_eco_nature_blog_post'
    )));

    $wp_customize->add_setting( 'vw_eco_nature_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_featured_image_hide_show', array(
		'label' => esc_html__( 'Featured Image','vw-eco-nature' ),
		'section' => 'vw_eco_nature_blog_post'
    )));

    $wp_customize->add_setting( 'vw_eco_nature_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_eco_nature_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_eco_nature_featured_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','vw-eco-nature' ),
		'section'     => 'vw_eco_nature_blog_post',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_eco_nature_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_eco_nature_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_eco_nature_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Featured Image Box Shadow','vw-eco-nature' ),
		'section'     => 'vw_eco_nature_blog_post',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    $wp_customize->add_setting( 'vw_eco_nature_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_eco_nature_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_eco_nature_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-eco-nature' ),
		'section'     => 'vw_eco_nature_blog_post',
		'type'        => 'range',
		'settings'    => 'vw_eco_nature_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_eco_nature_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-eco-nature'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-eco-nature'),
		'section'=> 'vw_eco_nature_blog_post',
		'type'=> 'text'
	));

	//Blog layout
    $wp_customize->add_setting('vw_eco_nature_blog_layout_option',array(
        'default' => 'Default',
        'sanitize_callback' => 'vw_eco_nature_sanitize_choices'
    ));
    $wp_customize->add_control(new VW_Eco_Nature_Image_Radio_Control($wp_customize, 'vw_eco_nature_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','vw-eco-nature'),
        'section' => 'vw_eco_nature_blog_post',
        'choices' => array(
            'Default' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout2.png',
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout3.png',
    ))));

    $wp_customize->add_setting('vw_eco_nature_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_eco_nature_sanitize_choices'
	));
	$wp_customize->add_control('vw_eco_nature_excerpt_settings',array(
        'type' => 'select',
        'label' => __('Post Content','vw-eco-nature'),
        'section' => 'vw_eco_nature_blog_post',
        'choices' => array(
        	'Content' => __('Content','vw-eco-nature'),
            'Excerpt' => __('Excerpt','vw-eco-nature'),
            'No Content' => __('No Content','vw-eco-nature')
        ),
	) );

	$wp_customize->add_setting('vw_eco_nature_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_blog_post',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_eco_nature_blog_pagination_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_blog_pagination_hide_show',array(
      'label' => esc_html__( 'Show / Hide Blog Pagination','vw-eco-nature' ),
      'section' => 'vw_eco_nature_blog_post'
    )));

	$wp_customize->add_setting( 'vw_eco_nature_blog_pagination_type', array(
        'default'			=> 'blog-page-numbers',
        'sanitize_callback'	=> 'vw_eco_nature_sanitize_choices'
    ));
    $wp_customize->add_control( 'vw_eco_nature_blog_pagination_type', array(
        'section' => 'vw_eco_nature_blog_post',
        'type' => 'select',
        'label' => __( 'Blog Pagination', 'vw-eco-nature' ),
        'choices'		=> array(
            'blog-page-numbers'  => __( 'Numeric', 'vw-eco-nature' ),
            'next-prev' => __( 'Older Posts/Newer Posts', 'vw-eco-nature' ),
    )));

	// Button Settings
	$wp_customize->add_section( 'vw_eco_nature_button_settings', array(
		'title' => esc_html__( 'Button Settings','vw-eco-nature'),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting('vw_eco_nature_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_button_padding_top_bottom',array(
		'label'	=> __('Padding Top Bottom','vw-eco-nature'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_button_padding_left_right',array(
		'label'	=> __('Padding Left Right','vw-eco-nature'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_eco_nature_button_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_eco_nature_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_eco_nature_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-eco-nature' ),
		'section'     => 'vw_eco_nature_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_eco_nature_before_blog_button_icon',array(
		'default'	=> 'fas fa-plus',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Eco_Nature_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_eco_nature_before_blog_button_icon',array(
		'label'	=> __('Add Button Icon','vw-eco-nature'),
		'transport' => 'refresh',
		'section'	=> 'vw_eco_nature_button_settings',
		'setting'	=> 'vw_eco_nature_before_blog_button_icon',
		'type'		=> 'icon'
	)));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_eco_nature_button_text', array( 
		'selector' => '.post-main-box .more-btn a', 
		'render_callback' => 'vw_eco_nature_customize_partial_vw_eco_nature_button_text', 
	));

    $wp_customize->add_setting('vw_eco_nature_button_text',array(
		'default'=> esc_html__( 'READ MORE', 'vw-eco-nature' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_button_text',array(
		'label'	=> __('Add Button Text','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_after_blog_button_icon',array(
		'default'	=> 'fas fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Eco_Nature_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_eco_nature_after_blog_button_icon',array(
		'label'	=> __('Add Button Icon','vw-eco-nature'),
		'transport' => 'refresh',
		'section'	=> 'vw_eco_nature_button_settings',
		'setting'	=> 'vw_eco_nature_after_blog_button_icon',
		'type'		=> 'icon'
	)));

	// Related Post Settings
	$wp_customize->add_section( 'vw_eco_nature_related_posts_settings', array(
		'title' => __( 'Related Posts Settings', 'vw-eco-nature' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_eco_nature_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'vw_eco_nature_customize_partial_vw_eco_nature_related_post_title', 
	));

    $wp_customize->add_setting( 'vw_eco_nature_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_related_post',array(
		'label' => esc_html__( 'Related Post','vw-eco-nature' ),
		'section' => 'vw_eco_nature_related_posts_settings'
    )));

    $wp_customize->add_setting('vw_eco_nature_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_related_post_title',array(
		'label'	=> __('Add Related Post Title','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( 'Related Post', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vw_eco_nature_related_posts_count',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_eco_nature_sanitize_float'
	));
	$wp_customize->add_control('vw_eco_nature_related_posts_count',array(
		'label'	=> __('Add Related Post Count','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '3', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_related_posts_settings',
		'type'=> 'number'
	));

	// Single Posts Settings
	$wp_customize->add_section( 'vw_eco_nature_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'vw-eco-nature' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'vw_eco_nature_single_post_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_single_post_breadcrumb',array(
		'label' => esc_html__( 'Single Post Breadcrumb','vw-eco-nature' ),
		'section' => 'vw_eco_nature_single_blog_settings'
    )));

	$wp_customize->add_setting('vw_eco_nature_single_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_single_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-eco-nature'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-eco-nature'),
		'section'=> 'vw_eco_nature_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_eco_nature_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_toggle_tags', array(
		'label' => esc_html__( 'Tags','vw-eco-nature' ),
		'section' => 'vw_eco_nature_single_blog_settings'
    )));

	$wp_customize->add_setting( 'vw_eco_nature_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_single_blog_post_navigation_show_hide', array(
		'label' => esc_html__( 'Post Navigation','vw-eco-nature' ),
		'section' => 'vw_eco_nature_single_blog_settings'
    )));

	//navigation text
	$wp_customize->add_setting('vw_eco_nature_single_blog_prev_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( 'PREVIOUS', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_single_blog_next_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( 'NEXT', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_single_blog_comment_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_eco_nature_single_blog_comment_title',array(
		'label'	=> __('Add Comment Title','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( 'Leave a Reply', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_single_blog_comment_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_eco_nature_single_blog_comment_button_text',array(
		'label'	=> __('Add Comment Button Text','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( 'Post Comment', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_single_blog_settings',
		'type'=> 'text'
	));

    //404 Page Setting
	$wp_customize->add_section('vw_eco_nature_404_page',array(
		'title'	=> __('404 Page Settings','vw-eco-nature'),
		'panel' => 'vw_eco_nature_panel_id',
	));	

	$wp_customize->add_setting('vw_eco_nature_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_eco_nature_404_page_title',array(
		'label'	=> __('Add Title','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_eco_nature_404_page_content',array(
		'label'	=> __('Add Text','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_before_404_page_button_icon',array(
		'default'	=> 'fas fa-plus',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Eco_Nature_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_eco_nature_before_404_page_button_icon',array(
		'label'	=> __('Add Button Icon','vw-eco-nature'),
		'transport' => 'refresh',
		'section'	=> 'vw_eco_nature_404_page',
		'setting'	=> 'vw_eco_nature_before_404_page_button_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_eco_nature_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_404_page_button_text',array(
		'label'	=> __('Add Button Text','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( 'GO BACK', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_after_404_page_button_icon',array(
		'default'	=> 'fas fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Eco_Nature_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_eco_nature_after_404_page_button_icon',array(
		'label'	=> __('Add Button Icon','vw-eco-nature'),
		'transport' => 'refresh',
		'section'	=> 'vw_eco_nature_404_page',
		'setting'	=> 'vw_eco_nature_after_404_page_button_icon',
		'type'		=> 'icon'
	)));

	//No Result Page Setting
	$wp_customize->add_section('vw_eco_nature_no_results_page',array(
		'title'	=> __('No Results Page Settings','vw-eco-nature'),
		'panel' => 'vw_eco_nature_panel_id',
	));	

	$wp_customize->add_setting('vw_eco_nature_no_results_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_eco_nature_no_results_page_title',array(
		'label'	=> __('Add Title','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( 'Nothing Found', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_no_results_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_no_results_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_eco_nature_no_results_page_content',array(
		'label'	=> __('Add Text','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_no_results_page',
		'type'=> 'text'
	));

	//Social Icon Setting
	$wp_customize->add_section('vw_eco_nature_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','vw-eco-nature'),
		'panel' => 'vw_eco_nature_panel_id',
	));	

	$wp_customize->add_setting('vw_eco_nature_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','vw-eco-nature'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_social_icon_padding',array(
		'label'	=> __('Icon Padding','vw-eco-nature'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_social_icon_width',array(
		'label'	=> __('Icon Width','vw-eco-nature'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_social_icon_height',array(
		'label'	=> __('Icon Height','vw-eco-nature'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_eco_nature_social_icon_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_eco_nature_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_eco_nature_social_icon_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-eco-nature' ),
		'section'     => 'vw_eco_nature_social_icon_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Responsive Media Settings
	$wp_customize->add_section('vw_eco_nature_responsive_media',array(
		'title'	=> __('Responsive Media','vw-eco-nature'),
		'panel' => 'vw_eco_nature_panel_id',
	));

	$wp_customize->add_setting( 'vw_eco_nature_resp_topbar_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_resp_topbar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Topbar','vw-eco-nature' ),
      'section' => 'vw_eco_nature_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_eco_nature_stickyheader_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_stickyheader_hide_show',array(
      'label' => esc_html__( 'Sticky Header','vw-eco-nature' ),
      'section' => 'vw_eco_nature_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_eco_nature_resp_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_resp_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','vw-eco-nature' ),
      'section' => 'vw_eco_nature_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_eco_nature_sidebar_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_sidebar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Sidebar','vw-eco-nature' ),
      'section' => 'vw_eco_nature_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_eco_nature_resp_scroll_top_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_resp_scroll_top_hide_show',array(
      'label' => esc_html__( 'Show / Hide Scroll To Top','vw-eco-nature' ),
      'section' => 'vw_eco_nature_responsive_media'
    )));

    $wp_customize->add_setting('vw_eco_nature_resp_menu_toggle_btn_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_eco_nature_resp_menu_toggle_btn_bg_color', array(
		'label'    => __('Toggle Button Bg Color', 'vw-eco-nature'),
		'section'  => 'vw_eco_nature_responsive_media',
	)));

    $wp_customize->add_setting('vw_eco_nature_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Eco_Nature_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_eco_nature_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','vw-eco-nature'),
		'transport' => 'refresh',
		'section'	=> 'vw_eco_nature_responsive_media',
		'setting'	=> 'vw_eco_nature_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_eco_nature_res_close_menus_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Eco_Nature_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_eco_nature_res_close_menus_icon',array(
		'label'	=> __('Add Close Menu Icon','vw-eco-nature'),
		'transport' => 'refresh',
		'section'	=> 'vw_eco_nature_responsive_media',
		'setting'	=> 'vw_eco_nature_res_close_menus_icon',
		'type'		=> 'icon'
	)));

	//Footer Text
	$wp_customize->add_section('vw_eco_nature_footer',array(
		'title'	=> __('Footer Settings','vw-eco-nature'),
		'description' => __('For more options of the footer section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/eco-nature-wordpress-theme/">GO PRO</a>','vw-eco-nature'),
		'panel' => 'vw_eco_nature_panel_id',
	));	

	$wp_customize->add_setting('vw_eco_nature_footer_background_color', array(
		'default'           => '#1c1c1c',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_eco_nature_footer_background_color', array(
		'label'    => __('Footer Background Color', 'vw-eco-nature'),
		'section'  => 'vw_eco_nature_footer',
	)));

	$wp_customize->add_setting('vw_eco_nature_footer_widgets_heading',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_eco_nature_sanitize_choices'
	));
	$wp_customize->add_control('vw_eco_nature_footer_widgets_heading',array(
        'type' => 'select',
        'label' => __('Footer Widget Heading','vw-eco-nature'),
        'section' => 'vw_eco_nature_footer',
        'choices' => array(
        	'Left' => __('Left','vw-eco-nature'),
            'Center' => __('Center','vw-eco-nature'),
            'Right' => __('Right','vw-eco-nature')
        ),
	) );

	$wp_customize->add_setting('vw_eco_nature_footer_widgets_content',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_eco_nature_sanitize_choices'
	));
	$wp_customize->add_control('vw_eco_nature_footer_widgets_content',array(
        'type' => 'select',
        'label' => __('Footer Widget Content','vw-eco-nature'),
        'section' => 'vw_eco_nature_footer',
        'choices' => array(
        	'Left' => __('Left','vw-eco-nature'),
            'Center' => __('Center','vw-eco-nature'),
            'Right' => __('Right','vw-eco-nature')
        ),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_eco_nature_footer_text', array( 
		'selector' => '.copyright p', 
		'render_callback' => 'vw_eco_nature_customize_partial_vw_eco_nature_footer_text', 
	));
	
	$wp_customize->add_setting('vw_eco_nature_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_eco_nature_footer_text',array(
		'label'	=> __('Copyright Text','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( 'Copyright 2019, .....', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_footer',
		'type'=> 'text'
	));	

	$wp_customize->add_setting('vw_eco_nature_copyright_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_copyright_font_size',array(
		'label'	=> __('Copyright Font Size','vw-eco-nature'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_copyright_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_copyright_padding_top_bottom',array(
		'label'	=> __('Copyright Padding Top Bottom','vw-eco-nature'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_copyright_alignment',array(
        'default' => 'center',
        'sanitize_callback' => 'vw_eco_nature_sanitize_choices'
	));
	$wp_customize->add_control(new vw_eco_nature_Image_Radio_Control($wp_customize, 'vw_eco_nature_copyright_alignment', array(
        'type' => 'select',
        'label' => __('Copyright Alignment','vw-eco-nature'),
        'section' => 'vw_eco_nature_footer',
        'settings' => 'vw_eco_nature_copyright_alignment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

	$wp_customize->add_setting( 'vw_eco_nature_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-eco-nature' ),
      	'section' => 'vw_eco_nature_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_eco_nature_scroll_to_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'vw_eco_nature_customize_partial_vw_eco_nature_scroll_to_top_icon', 
	));

    $wp_customize->add_setting('vw_eco_nature_scroll_to_top_icon',array(
		'default'	=> 'fas fa-angle-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Eco_Nature_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_eco_nature_scroll_to_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','vw-eco-nature'),
		'transport' => 'refresh',
		'section'	=> 'vw_eco_nature_footer',
		'setting'	=> 'vw_eco_nature_scroll_to_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_eco_nature_scroll_to_top_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_scroll_to_top_font_size',array(
		'label'	=> __('Icon Font Size','vw-eco-nature'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_scroll_to_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_scroll_to_top_padding',array(
		'label'	=> __('Icon Top Bottom Padding','vw-eco-nature'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_scroll_to_top_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_scroll_to_top_width',array(
		'label'	=> __('Icon Width','vw-eco-nature'),
		'description'	=> __('Enter a value in pixels Example:20px','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_scroll_to_top_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_scroll_to_top_height',array(
		'label'	=> __('Icon Height','vw-eco-nature'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_eco_nature_scroll_to_top_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_eco_nature_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_eco_nature_scroll_to_top_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-eco-nature' ),
		'section'     => 'vw_eco_nature_footer',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_eco_nature_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'vw_eco_nature_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Eco_Nature_Image_Radio_Control($wp_customize, 'vw_eco_nature_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','vw-eco-nature'),
        'section' => 'vw_eco_nature_footer',
        'settings' => 'vw_eco_nature_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));

    //Woocommerce settings
	$wp_customize->add_section('vw_eco_nature_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'vw-eco-nature'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_eco_nature_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product #sidebar', 
		'render_callback' => 'vw_eco_nature_customize_partial_vw_eco_nature_woocommerce_shop_page_sidebar', ) );

    //Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_eco_nature_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','vw-eco-nature' ),
		'section' => 'vw_eco_nature_woocommerce_section'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_eco_nature_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product #sidebar', 
		'render_callback' => 'vw_eco_nature_customize_partial_vw_eco_nature_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_eco_nature_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','vw-eco-nature' ),
		'section' => 'vw_eco_nature_woocommerce_section'
    )));

    //Related Products
	$wp_customize->add_setting( 'vw_eco_nature_related_product_show_hide',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_related_product_show_hide',array(
        'label' => esc_html__( 'Related product','vw-eco-nature' ),
        'section' => 'vw_eco_nature_woocommerce_section'
    )));

    //Products per page
    $wp_customize->add_setting('vw_eco_nature_products_per_page',array(
		'default'=> '9',
		'sanitize_callback'	=> 'vw_eco_nature_sanitize_float'
	));
	$wp_customize->add_control('vw_eco_nature_products_per_page',array(
		'label'	=> __('Products Per Page','vw-eco-nature'),
		'description' => __('Display on shop page','vw-eco-nature'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'vw_eco_nature_woocommerce_section',
		'type'=> 'number',
	));

    //Products per row
    $wp_customize->add_setting('vw_eco_nature_products_per_row',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_eco_nature_sanitize_choices'
	));
	$wp_customize->add_control('vw_eco_nature_products_per_row',array(
		'label'	=> __('Products Per Row','vw-eco-nature'),
		'description' => __('Display on shop page','vw-eco-nature'),
		'choices' => array(
            '2' => '2',
			'3' => '3',
			'4' => '4',
        ),
		'section'=> 'vw_eco_nature_woocommerce_section',
		'type'=> 'select',
	));

	//Products padding
	$wp_customize->add_setting('vw_eco_nature_products_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_products_padding_top_bottom',array(
		'label'	=> __('Products Padding Top Bottom','vw-eco-nature'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_products_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_products_padding_left_right',array(
		'label'	=> __('Products Padding Left Right','vw-eco-nature'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_woocommerce_section',
		'type'=> 'text'
	));

	//Products box shadow
	$wp_customize->add_setting( 'vw_eco_nature_products_box_shadow', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_eco_nature_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_eco_nature_products_box_shadow', array(
		'label'       => esc_html__( 'Products Box Shadow','vw-eco-nature' ),
		'section'     => 'vw_eco_nature_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products border radius
    $wp_customize->add_setting( 'vw_eco_nature_products_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_eco_nature_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_eco_nature_products_border_radius', array(
		'label'       => esc_html__( 'Products Border Radius','vw-eco-nature' ),
		'section'     => 'vw_eco_nature_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_eco_nature_products_btn_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_products_btn_padding_top_bottom',array(
		'label'	=> __('Products Button Padding Top Bottom','vw-eco-nature'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_products_btn_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_products_btn_padding_left_right',array(
		'label'	=> __('Products Button Padding Left Right','vw-eco-nature'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_eco_nature_products_button_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_eco_nature_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_eco_nature_products_button_border_radius', array(
		'label'       => esc_html__( 'Products Button Border Radius','vw-eco-nature' ),
		'section'     => 'vw_eco_nature_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products Sale Badge
	$wp_customize->add_setting('vw_eco_nature_woocommerce_sale_position',array(
        'default' => 'right',
        'sanitize_callback' => 'vw_eco_nature_sanitize_choices'
	));
	$wp_customize->add_control('vw_eco_nature_woocommerce_sale_position',array(
        'type' => 'select',
        'label' => __('Sale Badge Position','vw-eco-nature'),
        'section' => 'vw_eco_nature_woocommerce_section',
        'choices' => array(
            'left' => __('Left','vw-eco-nature'),
            'right' => __('Right','vw-eco-nature'),
        ),
	) );

	$wp_customize->add_setting('vw_eco_nature_woocommerce_sale_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_woocommerce_sale_font_size',array(
		'label'	=> __('Sale Font Size','vw-eco-nature'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_woocommerce_sale_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_woocommerce_sale_padding_top_bottom',array(
		'label'	=> __('Sale Padding Top Bottom','vw-eco-nature'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_woocommerce_sale_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_woocommerce_sale_padding_left_right',array(
		'label'	=> __('Sale Padding Left Right','vw-eco-nature'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_eco_nature_woocommerce_sale_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_eco_nature_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_eco_nature_woocommerce_sale_border_radius', array(
		'label'       => esc_html__( 'Sale Border Radius','vw-eco-nature' ),
		'section'     => 'vw_eco_nature_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    // new Panel
	$wp_customize->register_panel_type( 'VW_Eco_Nature_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'VW_Eco_Nature_WP_Customize_Section' );
}

add_action( 'customize_register', 'vw_eco_nature_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
 	class VW_Eco_Nature_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'vw_eco_nature_panel';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class VW_Eco_Nature_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'vw_eco_nature_section';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
  	}
}

// Enqueue our scripts and styles
function vw_eco_nature_customize_controls_scripts() {
  wp_enqueue_script( 'customizer-controls', get_theme_file_uri( '/assets/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'vw_eco_nature_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Eco_Nature_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Eco_Nature_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new VW_Eco_Nature_Customize_Section_Pro($manager,'vw_eco_nature_upgrade_pro_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'VW Eco Nature Pro', 'vw-eco-nature' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-eco-nature' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/eco-nature-wordpress-theme/'),
		)));

		// Register sections.
		$manager->add_section(new VW_Eco_Nature_Customize_Section_Pro($manager,'vw_eco_nature_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'Documentation', 'vw-eco-nature' ),
			'pro_text' => esc_html__( 'Docs', 'vw-eco-nature' ),
			'pro_url'  => esc_url('https://www.vwthemesdemo.com/docs/free-vw-eco-nature/'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-eco-nature-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-eco-nature-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/css/customize-controls.css' );
		
		wp_localize_script(
		'vw-eco-nature-customize-controls',
		'vw_eco_nature_customizer_params',
		array(
			'ajaxurl' =>	admin_url( 'admin-ajax.php' )
		));
	}
}

// Doing this customizer thang!
VW_Eco_Nature_Customize::get_instance();