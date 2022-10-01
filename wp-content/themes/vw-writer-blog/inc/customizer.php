<?php
/**
 * VW Writer Blog Theme Customizer
 *
 * @package VW Writer Blog
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_writer_blog_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_writer_blog_custom_controls' );

function vw_writer_blog_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'vw_writer_blog_customize_partial_blogname', 
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'vw_writer_blog_customize_partial_blogdescription', 
	));

	//add home page setting pannel
	$VWWriterBlogParentPanel = new VW_Writer_Blog_WP_Customize_Panel( $wp_customize, 'vw_writer_blog_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'VW Settings', 'vw-writer-blog' ),
		'priority' => 10,
	));

	$wp_customize->add_section( 'vw_writer_blog_left_right', array(
    	'title'      => esc_html__( 'General Settings', 'vw-writer-blog' ),
		'panel' => 'vw_writer_blog_panel_id'
	) );

	$wp_customize->add_setting('vw_writer_blog_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'vw_writer_blog_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Writer_Blog_Image_Radio_Control($wp_customize, 'vw_writer_blog_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','vw-writer-blog'),
        'description' => __('Here you can change the width layout of Website.','vw-writer-blog'),
        'section' => 'vw_writer_blog_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/images/boxed-width.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_writer_blog_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_writer_blog_sanitize_choices'	        
	) );
	$wp_customize->add_control('vw_writer_blog_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-writer-blog'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-writer-blog'),
        'section' => 'vw_writer_blog_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-writer-blog'),
            'Right Sidebar' => __('Right Sidebar','vw-writer-blog'),
            'One Column' => __('One Column','vw-writer-blog'),
            'Three Columns' => __('Three Columns','vw-writer-blog'),
            'Four Columns' => __('Four Columns','vw-writer-blog'),
            'Grid Layout' => __('Grid Layout','vw-writer-blog')
        ),
	));

	$wp_customize->add_setting('vw_writer_blog_page_layout',array(
        'default' => 'One Column',
        'sanitize_callback' => 'vw_writer_blog_sanitize_choices'
	));
	$wp_customize->add_control('vw_writer_blog_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-writer-blog'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-writer-blog'),
        'section' => 'vw_writer_blog_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-writer-blog'),
            'Right Sidebar' => __('Right Sidebar','vw-writer-blog'),
            'One Column' => __('One Column','vw-writer-blog')
        ),
	) );

	//Wow Animation
	$wp_customize->add_setting( 'vw_writer_blog_animation',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_writer_blog_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Writer_Blog_Toggle_Switch_Custom_Control( $wp_customize, 'vw_writer_blog_animation',array(
        'label' => esc_html__( 'Animation ','vw-writer-blog' ),
        'description' => __('Here you can disable overall site animation effect','vw-writer-blog'),
        'section' => 'vw_writer_blog_left_right'
    )));

    $wp_customize->add_setting('vw_writer_blog_reset_all_settings',array(
      'sanitize_callback'	=> 'sanitize_text_field',
   	));
   	$wp_customize->add_control(new VW_Writer_Blog_Reset_Custom_Control($wp_customize, 'vw_writer_blog_reset_all_settings',array(
      'type' => 'reset_control',
      'label' => __('Reset All Settings', 'vw-writer-blog'),
      'description' => 'vw_writer_blog_reset_all_settings',
      'section' => 'vw_writer_blog_left_right'
   	)));

	//Pre-Loader
	$wp_customize->add_setting( 'vw_writer_blog_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_writer_blog_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Writer_Blog_Toggle_Switch_Custom_Control( $wp_customize, 'vw_writer_blog_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','vw-writer-blog' ),
        'section' => 'vw_writer_blog_left_right'
    )));

	$wp_customize->add_setting('vw_writer_blog_preloader_bg_color', array(
		'default'           => '#e1c65c',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_writer_blog_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'vw-writer-blog'),
		'section'  => 'vw_writer_blog_left_right',
	)));

	$wp_customize->add_setting('vw_writer_blog_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_writer_blog_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'vw-writer-blog'),
		'section'  => 'vw_writer_blog_left_right',
	)));

	//Topbar 
	$wp_customize->add_section( 'vw_writer_blog_topbar', array(
    	'title'      => __( 'Topbar Settings', 'vw-writer-blog' ),
		'priority'   => null,
		'panel' => 'vw_writer_blog_panel_id'
	) );

	//Sticky Header
	$wp_customize->add_setting( 'vw_writer_blog_sticky_header',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_writer_blog_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Writer_Blog_Toggle_Switch_Custom_Control( $wp_customize, 'vw_writer_blog_sticky_header',array(
        'label' => esc_html__( 'Sticky Header','vw-writer-blog' ),
        'section' => 'vw_writer_blog_topbar'
    )));

    $wp_customize->add_setting('vw_writer_blog_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_writer_blog_sticky_header_padding',array(
		'label'	=> __('Sticky Header Padding','vw-writer-blog'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_writer_blog_navigation_menu_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_writer_blog_navigation_menu_font_size',array(
		'label'	=> __('Menus Font Size','vw-writer-blog'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_writer_blog_navigation_menu_font_weight',array(
        'default' => 'Default',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_writer_blog_sanitize_choices'
	));
	$wp_customize->add_control('vw_writer_blog_navigation_menu_font_weight',array(
        'type' => 'select',
        'label' => __('Menus Font Weight','vw-writer-blog'),
        'section' => 'vw_writer_blog_topbar',
        'choices' => array(
        	'Default' => __('Default','vw-writer-blog'),
            'Normal' => __('Normal','vw-writer-blog')
        ),
	) );

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_writer_blog_mail_text', array( 
		'selector' => 'p.infotext', 
		'render_callback' => 'vw_writer_blog_customize_partial_vw_writer_blog_mail_text', 
	));

    $wp_customize->add_setting('vw_writer_blog_mail_adress_icon',array(
		'default'	=> 'fas fa-envelope-open',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Writer_Blog_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_writer_blog_mail_adress_icon',array(
		'label'	=> __('Add Email Icon','vw-writer-blog'),
		'transport' => 'refresh',
		'section'	=> 'vw_writer_blog_topbar',
		'setting'	=> 'vw_writer_blog_mail_adress_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_writer_blog_mail_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_writer_blog_mail_text',array(
		'label'	=> __('Add Email Text','vw-writer-blog'),
		'section'=> 'vw_writer_blog_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_writer_blog_mail',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));	
	$wp_customize->add_control('vw_writer_blog_mail',array(
		'label'	=> __('Add Mail Address','vw-writer-blog'),
		'section'=> 'vw_writer_blog_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_writer_blog_call_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_writer_blog_call_text',array(
		'label'	=> __('Add Phone Text','vw-writer-blog'),
		'section'=> 'vw_writer_blog_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_writer_blog_call',array(
		'default'=> '',
		'sanitize_callback'	=> 'vw_writer_blog_sanitize_phone_number'
	));	
	$wp_customize->add_control('vw_writer_blog_call',array(
		'label'	=> __('Add Phone Number','vw-writer-blog'),
		'section'=> 'vw_writer_blog_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_writer_blog_phone_number_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Writer_Blog_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_writer_blog_phone_number_icon',array(
		'label'	=> __('Add Phone Icon','vw-writer-blog'),
		'transport' => 'refresh',
		'section'	=> 'vw_writer_blog_topbar',
		'setting'	=> 'vw_writer_blog_phone_number_icon',
		'type'		=> 'icon'
	)));
    
	//Slider
	$wp_customize->add_section( 'vw_writer_blog_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'vw-writer-blog' ),
		'priority'   => null,
		'panel' => 'vw_writer_blog_panel_id'
	) );

	$wp_customize->add_setting( 'vw_writer_blog_slider_hide_show',
       array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_writer_blog_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Writer_Blog_Toggle_Switch_Custom_Control( $wp_customize, 'vw_writer_blog_slider_hide_show',
       array(
      'label' => esc_html__( 'Show / Hide Slider','vw-writer-blog' ),
      'section' => 'vw_writer_blog_slidersettings'
    )));

     //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_writer_blog_slider_hide_show',array(
		'selector'        => '#slider .inner_carousel h1',
		'render_callback' => 'vw_writer_blog_customize_partial_vw_writer_blog_slider_hide_show',
	));

	for ( $count = 1; $count <= 3; $count++ ) {
		// Add color scheme setting and control.
		$wp_customize->add_setting( 'vw_writer_blog_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_writer_blog_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_writer_blog_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'vw-writer-blog' ),
			'description' => __('Slider image size (1500 x 600)','vw-writer-blog'),
			'section'  => 'vw_writer_blog_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting('vw_writer_blog_slider_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_writer_blog_slider_button_text',array(
		'label'	=> __('Add Slider Button Text','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_writer_blog_slider_button_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Writer_Blog_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_writer_blog_slider_button_icon',array(
		'label'	=> __('Add Slider Button Icon','vw-writer-blog'),
		'transport' => 'refresh',
		'section'	=> 'vw_writer_blog_slidersettings',
		'setting'	=> 'vw_writer_blog_slider_button_icon',
		'type'		=> 'icon'
	)));

	//content layout
	$wp_customize->add_setting('vw_writer_blog_slider_content_option',array(
        'default' => 'Left',
        'sanitize_callback' => 'vw_writer_blog_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Writer_Blog_Image_Radio_Control($wp_customize, 'vw_writer_blog_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','vw-writer-blog'),
        'section' => 'vw_writer_blog_slidersettings',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/images/slider-content3.png',
    ))));

    //Slider content padding
    $wp_customize->add_setting('vw_writer_blog_slider_content_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_writer_blog_slider_content_padding_top_bottom',array(
		'label'	=> __('Slider Content Padding Top Bottom','vw-writer-blog'),
		'description'	=> __('Enter a value in %. Example:20%','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_writer_blog_slider_content_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_writer_blog_slider_content_padding_left_right',array(
		'label'	=> __('Slider Content Padding Left Right','vw-writer-blog'),
		'description'	=> __('Enter a value in %. Example:20%','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_slidersettings',
		'type'=> 'text'
	));

    //Slider excerpt
	$wp_customize->add_setting( 'vw_writer_blog_slider_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_writer_blog_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_writer_blog_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-writer-blog' ),
		'section'     => 'vw_writer_blog_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_writer_blog_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('vw_writer_blog_slider_opacity_color',array(
      'default'              => 0.5,
      'sanitize_callback' => 'vw_writer_blog_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_writer_blog_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','vw-writer-blog' ),
	'section'     => 'vw_writer_blog_slidersettings',
	'type'        => 'select',
	'settings'    => 'vw_writer_blog_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','vw-writer-blog'),
      '0.1' =>  esc_attr('0.1','vw-writer-blog'),
      '0.2' =>  esc_attr('0.2','vw-writer-blog'),
      '0.3' =>  esc_attr('0.3','vw-writer-blog'),
      '0.4' =>  esc_attr('0.4','vw-writer-blog'),
      '0.5' =>  esc_attr('0.5','vw-writer-blog'),
      '0.6' =>  esc_attr('0.6','vw-writer-blog'),
      '0.7' =>  esc_attr('0.7','vw-writer-blog'),
      '0.8' =>  esc_attr('0.8','vw-writer-blog'),
      '0.9' =>  esc_attr('0.9','vw-writer-blog')
	),
	));

	//Slider height
	$wp_customize->add_setting('vw_writer_blog_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_writer_blog_slider_height',array(
		'label'	=> __('Slider Height','vw-writer-blog'),
		'description'	=> __('Specify the slider height (px).','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_writer_blog_slider_speed', array(
		'default'  => 4000,
		'sanitize_callback'	=> 'vw_writer_blog_sanitize_float'
	) );
	$wp_customize->add_control( 'vw_writer_blog_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','vw-writer-blog'),
		'section' => 'vw_writer_blog_slidersettings',
		'type'  => 'number',
	) );

	//Featured Articals
	$wp_customize->add_section( 'vw_writer_blog_articles_section' , array(
    	'title'      => __( 'Featured Articles', 'vw-writer-blog' ),
		'priority'   => null,
		'panel' => 'vw_writer_blog_panel_id'
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_writer_blog_section_title', array( 
		'selector' => '#articles h2', 
		'render_callback' => 'vw_writer_blog_customize_partial_vw_writer_blog_section_title',
	));

	$wp_customize->add_setting('vw_writer_blog_section_title_icon',array(
		'default'	=> 'fas fa-edit',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Writer_Blog_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_writer_blog_section_title_icon',array(
		'label'	=> __('Add Article Title Icon','vw-writer-blog'),
		'transport' => 'refresh',
		'section'	=> 'vw_writer_blog_articles_section',
		'setting'	=> 'vw_writer_blog_section_title_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_writer_blog_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_writer_blog_section_title',array(
		'label'	=> __('Section Title','vw-writer-blog'),
		'section'=> 'vw_writer_blog_articles_section',
		'setting'=> 'vw_writer_blog_section_title',
		'type'=> 'text'
	));	

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
		if($i==0){
		$default = $category->slug;
		$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_writer_blog_featured_articles',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_writer_blog_sanitize_choices',
	));
	$wp_customize->add_control('vw_writer_blog_featured_articles',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display Articles','vw-writer-blog'),
		'description' => __('Image size (270 x 345)','vw-writer-blog'),
		'section' => 'vw_writer_blog_articles_section',
	));

	//Article excerpt
	$wp_customize->add_setting( 'vw_writer_blog_article_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_writer_blog_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_writer_blog_article_excerpt_number', array(
		'label'       => esc_html__( 'Article Excerpt length','vw-writer-blog' ),
		'section'     => 'vw_writer_blog_articles_section',
		'type'        => 'range',
		'settings'    => 'vw_writer_blog_article_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_writer_blog_article_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_writer_blog_article_button_text',array(
		'label'	=> __('Add Article Button Text','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_articles_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_writer_blog_articles_button_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Writer_Blog_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_writer_blog_articles_button_icon',array(
		'label'	=> __('Add Article Button Icon','vw-writer-blog'),
		'transport' => 'refresh',
		'section'	=> 'vw_writer_blog_articles_section',
		'setting'	=> 'vw_writer_blog_articles_button_icon',
		'type'		=> 'icon'
	)));

	//Blog Post
	$wp_customize->add_panel( $VWWriterBlogParentPanel );

	$BlogPostParentPanel = new VW_Writer_Blog_WP_Customize_Panel( $wp_customize, 'blog_post_parent_panel', array(
		'title' => __( 'Blog Post Settings', 'vw-writer-blog' ),
		'panel' => 'vw_writer_blog_panel_id',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_writer_blog_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'vw_writer_blog_customize_partial_vw_writer_blog_toggle_postdate', 
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vw_writer_blog_post_settings', array(
		'title' => __( 'Post Settings', 'vw-writer-blog' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'vw_writer_blog_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_writer_blog_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Writer_Blog_Toggle_Switch_Custom_Control( $wp_customize, 'vw_writer_blog_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vw-writer-blog' ),
        'section' => 'vw_writer_blog_post_settings'
    )));

    $wp_customize->add_setting( 'vw_writer_blog_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_writer_blog_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Writer_Blog_Toggle_Switch_Custom_Control( $wp_customize, 'vw_writer_blog_toggle_author',array(
		'label' => esc_html__( 'Author','vw-writer-blog' ),
		'section' => 'vw_writer_blog_post_settings'
    )));

    $wp_customize->add_setting( 'vw_writer_blog_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_writer_blog_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Writer_Blog_Toggle_Switch_Custom_Control( $wp_customize, 'vw_writer_blog_toggle_comments',array(
		'label' => esc_html__( 'Comments','vw-writer-blog' ),
		'section' => 'vw_writer_blog_post_settings'
    )));

    $wp_customize->add_setting( 'vw_writer_blog_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_writer_blog_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Writer_Blog_Toggle_Switch_Custom_Control( $wp_customize, 'vw_writer_blog_toggle_time',array(
		'label' => esc_html__( 'Time','vw-writer-blog' ),
		'section' => 'vw_writer_blog_post_settings'
    )));

    $wp_customize->add_setting( 'vw_writer_blog_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_writer_blog_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Writer_Blog_Toggle_Switch_Custom_Control( $wp_customize, 'vw_writer_blog_featured_image_hide_show', array(
		'label' => esc_html__( 'Featured Image','vw-writer-blog' ),
		'section' => 'vw_writer_blog_post_settings'
    )));

    $wp_customize->add_setting( 'vw_writer_blog_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_writer_blog_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_writer_blog_featured_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','vw-writer-blog' ),
		'section'     => 'vw_writer_blog_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_writer_blog_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_writer_blog_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_writer_blog_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Featured Image Box Shadow','vw-writer-blog' ),
		'section'     => 'vw_writer_blog_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    $wp_customize->add_setting( 'vw_writer_blog_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_writer_blog_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_writer_blog_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-writer-blog' ),
		'section'     => 'vw_writer_blog_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_writer_blog_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_writer_blog_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_writer_blog_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-writer-blog'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-writer-blog'),
		'section'=> 'vw_writer_blog_post_settings',
		'type'=> 'text'
	));

	//Blog layout
    $wp_customize->add_setting('vw_writer_blog_blog_layout_option',array(
        'default' => 'Default',
        'sanitize_callback' => 'vw_writer_blog_sanitize_choices'
    ));
    $wp_customize->add_control(new VW_Writer_Blog_Image_Radio_Control($wp_customize, 'vw_writer_blog_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','vw-writer-blog'),
        'section' => 'vw_writer_blog_post_settings',
        'choices' => array(
            'Default' => esc_url(get_template_directory_uri()).'/images/blog-layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/images/blog-layout2.png',
            'Left' => esc_url(get_template_directory_uri()).'/images/blog-layout3.png',
    ))));

    $wp_customize->add_setting('vw_writer_blog_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_writer_blog_sanitize_choices'
	));
	$wp_customize->add_control('vw_writer_blog_excerpt_settings',array(
        'type' => 'select',
        'label' => __('Post Content','vw-writer-blog'),
        'section' => 'vw_writer_blog_post_settings',
        'choices' => array(
        	'Content' => __('Content','vw-writer-blog'),
            'Excerpt' => __('Excerpt','vw-writer-blog'),
            'No Content' => __('No Content','vw-writer-blog')
        ),
	) );

	$wp_customize->add_setting('vw_writer_blog_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_writer_blog_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_writer_blog_blog_pagination_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_writer_blog_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Writer_Blog_Toggle_Switch_Custom_Control( $wp_customize, 'vw_writer_blog_blog_pagination_hide_show',array(
      'label' => esc_html__( 'Show / Hide Blog Pagination','vw-writer-blog' ),
      'section' => 'vw_writer_blog_post_settings'
    )));

	$wp_customize->add_setting( 'vw_writer_blog_blog_pagination_type', array(
        'default'			=> 'blog-page-numbers',
        'sanitize_callback'	=> 'vw_writer_blog_sanitize_choices'
    ));
    $wp_customize->add_control( 'vw_writer_blog_blog_pagination_type', array(
        'section' => 'vw_writer_blog_post_settings',
        'type' => 'select',
        'label' => __( 'Blog Pagination', 'vw-writer-blog' ),
        'choices'		=> array(
            'blog-page-numbers'  => __( 'Numeric', 'vw-writer-blog' ),
            'next-prev' => __( 'Older Posts/Newer Posts', 'vw-writer-blog' ),
    )));

    // Button Settings
	$wp_customize->add_section( 'vw_writer_blog_button_settings', array(
		'title' => __( 'Button Settings', 'vw-writer-blog' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'vw_writer_blog_blog_button_border',
       array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_writer_blog_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Writer_Blog_Toggle_Switch_Custom_Control( $wp_customize, 'vw_writer_blog_blog_button_border',
       array(
      'label' => esc_html__( 'Show / Hide Button Border','vw-writer-blog' ),
      'section' => 'vw_writer_blog_button_settings'
    )));

	$wp_customize->add_setting('vw_writer_blog_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_writer_blog_button_padding_top_bottom',array(
		'label'	=> __('Padding Top Bottom','vw-writer-blog'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_writer_blog_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_writer_blog_button_padding_left_right',array(
		'label'	=> __('Padding Left Right','vw-writer-blog'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_writer_blog_button_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_writer_blog_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_writer_blog_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-writer-blog' ),
		'section'     => 'vw_writer_blog_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_writer_blog_button_text', array( 
		'selector' => '.post-main-box .content-bttn a', 
		'render_callback' => 'vw_writer_blog_customize_partial_vw_writer_blog_button_text', 
	));

    $wp_customize->add_setting('vw_writer_blog_button_text',array(
		'default'=> esc_html__( 'READ MORE', 'vw-writer-blog' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_writer_blog_button_text',array(
		'label'	=> __('Add Button Text','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_writer_blog_blog_button_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Writer_Blog_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_writer_blog_blog_button_icon',array(
		'label'	=> __('Add Button Icon','vw-writer-blog'),
		'transport' => 'refresh',
		'section'	=> 'vw_writer_blog_button_settings',
		'setting'	=> 'vw_writer_blog_blog_button_icon',
		'type'		=> 'icon'
	)));

	// Related Post Settings
	$wp_customize->add_section( 'vw_writer_blog_related_posts_settings', array(
		'title' => __( 'Related Posts Settings', 'vw-writer-blog' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_writer_blog_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'vw_writer_blog_customize_partial_vw_writer_blog_related_post_title', 
	));

    $wp_customize->add_setting( 'vw_writer_blog_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_writer_blog_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Writer_Blog_Toggle_Switch_Custom_Control( $wp_customize, 'vw_writer_blog_related_post',array(
		'label' => esc_html__( 'Related Post','vw-writer-blog' ),
		'section' => 'vw_writer_blog_related_posts_settings'
    )));

    $wp_customize->add_setting('vw_writer_blog_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_writer_blog_related_post_title',array(
		'label'	=> __('Add Related Post Title','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( 'Related Post', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vw_writer_blog_related_posts_count',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_writer_blog_sanitize_float'
	));
	$wp_customize->add_control('vw_writer_blog_related_posts_count',array(
		'label'	=> __('Add Related Post Count','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( '3', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_related_posts_settings',
		'type'=> 'number'
	));

	// Single Posts Settings
	$wp_customize->add_section( 'vw_writer_blog_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'vw-writer-blog' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting('vw_writer_blog_single_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_writer_blog_single_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-writer-blog'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-writer-blog'),
		'section'=> 'vw_writer_blog_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_writer_blog_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_writer_blog_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Writer_Blog_Toggle_Switch_Custom_Control( $wp_customize, 'vw_writer_blog_toggle_tags', array(
		'label' => esc_html__( 'Tags','vw-writer-blog' ),
		'section' => 'vw_writer_blog_single_blog_settings'
    )));

	$wp_customize->add_setting( 'vw_writer_blog_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_writer_blog_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Writer_Blog_Toggle_Switch_Custom_Control( $wp_customize, 'vw_writer_blog_single_blog_post_navigation_show_hide', array(
		'label' => esc_html__( 'Post Navigation','vw-writer-blog' ),
		'section' => 'vw_writer_blog_single_blog_settings'
    )));

	//navigation text
	$wp_customize->add_setting('vw_writer_blog_single_blog_prev_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_writer_blog_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( 'PREVIOUS', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_writer_blog_single_blog_next_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_writer_blog_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( 'NEXT', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_writer_blog_single_blog_comment_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_writer_blog_single_blog_comment_width',array(
		'label'	=> __('Comment Form Width','vw-writer-blog'),
		'description'	=> __('Enter a value in %. Example:50%','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( '100%', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_single_blog_settings',
		'type'=> 'text'
	));

    //404 Page Setting
	$wp_customize->add_section('vw_writer_blog_404_page',array(
		'title'	=> __('404 Page Settings','vw-writer-blog'),
		'panel' => 'vw_writer_blog_panel_id',
	));	

	$wp_customize->add_setting('vw_writer_blog_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_writer_blog_404_page_title',array(
		'label'	=> __('Add Title','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_writer_blog_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_writer_blog_404_page_content',array(
		'label'	=> __('Add Text','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_writer_blog_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_writer_blog_404_page_button_text',array(
		'label'	=> __('Add Button Text','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( 'Return to the home page', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_writer_blog_404_page_button_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Writer_Blog_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_writer_blog_404_page_button_icon',array(
		'label'	=> __('Add Button Icon','vw-writer-blog'),
		'transport' => 'refresh',
		'section'	=> 'vw_writer_blog_404_page',
		'setting'	=> 'vw_writer_blog_404_page_button_icon',
		'type'		=> 'icon'
	)));

	//No Result Page Setting
	$wp_customize->add_section('vw_writer_blog_no_results_page',array(
		'title'	=> __('No Results Page Settings','vw-writer-blog'),
		'panel' => 'vw_writer_blog_panel_id',
	));	

	$wp_customize->add_setting('vw_writer_blog_no_results_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_writer_blog_no_results_page_title',array(
		'label'	=> __('Add Title','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( 'Nothing Found', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_no_results_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_writer_blog_no_results_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_writer_blog_no_results_page_content',array(
		'label'	=> __('Add Text','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_no_results_page',
		'type'=> 'text'
	));

	//Social Icon Setting
	$wp_customize->add_section('vw_writer_blog_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','vw-writer-blog'),
		'panel' => 'vw_writer_blog_panel_id',
	));	

	$wp_customize->add_setting('vw_writer_blog_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_writer_blog_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','vw-writer-blog'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_writer_blog_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_writer_blog_social_icon_padding',array(
		'label'	=> __('Icon Padding','vw-writer-blog'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_writer_blog_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_writer_blog_social_icon_width',array(
		'label'	=> __('Icon Width','vw-writer-blog'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_writer_blog_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_writer_blog_social_icon_height',array(
		'label'	=> __('Icon Height','vw-writer-blog'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_writer_blog_social_icon_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_writer_blog_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_writer_blog_social_icon_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-writer-blog' ),
		'section'     => 'vw_writer_blog_social_icon_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Responsive Media Settings
	$wp_customize->add_section('vw_writer_blog_responsive_media',array(
		'title'	=> __('Responsive Media','vw-writer-blog'),
		'panel' => 'vw_writer_blog_panel_id',
	));

    $wp_customize->add_setting( 'vw_writer_blog_stickyheader_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_writer_blog_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Writer_Blog_Toggle_Switch_Custom_Control( $wp_customize, 'vw_writer_blog_stickyheader_hide_show',array(
      'label' => esc_html__( 'Sticky Header','vw-writer-blog' ),
      'section' => 'vw_writer_blog_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_writer_blog_resp_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_writer_blog_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Writer_Blog_Toggle_Switch_Custom_Control( $wp_customize, 'vw_writer_blog_resp_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','vw-writer-blog' ),
      'section' => 'vw_writer_blog_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_writer_blog_sidebar_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_writer_blog_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Writer_Blog_Toggle_Switch_Custom_Control( $wp_customize, 'vw_writer_blog_sidebar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Sidebar','vw-writer-blog' ),
      'section' => 'vw_writer_blog_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_writer_blog_resp_scroll_top_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_writer_blog_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Writer_Blog_Toggle_Switch_Custom_Control( $wp_customize, 'vw_writer_blog_resp_scroll_top_hide_show',array(
      'label' => esc_html__( 'Show / Hide Scroll To Top','vw-writer-blog' ),
      'section' => 'vw_writer_blog_responsive_media'
    )));

    $wp_customize->add_setting('vw_writer_blog_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Writer_Blog_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_writer_blog_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','vw-writer-blog'),
		'transport' => 'refresh',
		'section'	=> 'vw_writer_blog_responsive_media',
		'setting'	=> 'vw_writer_blog_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_writer_blog_res_close_menus_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Writer_Blog_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_writer_blog_res_close_menus_icon',array(
		'label'	=> __('Add Close Menu Icon','vw-writer-blog'),
		'transport' => 'refresh',
		'section'	=> 'vw_writer_blog_responsive_media',
		'setting'	=> 'vw_writer_blog_res_close_menus_icon',
		'type'		=> 'icon'
	)));
	
	//Footer Text
	$wp_customize->add_section('vw_writer_blog_footer',array(
		'title'	=> __('Footer','vw-writer-blog'),
		'description'=> __('This section will appear in the footer','vw-writer-blog'),
		'panel' => 'vw_writer_blog_panel_id',
	));	

	$wp_customize->add_setting('vw_writer_blog_footer_background_color', array(
		'default'           => '#323232',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_writer_blog_footer_background_color', array(
		'label'    => __('Footer Background Color', 'vw-writer-blog'),
		'section'  => 'vw_writer_blog_footer',
	)));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_writer_blog_footer_text', array( 
		'selector' => '.copyright p', 
		'render_callback' => 'vw_writer_blog_customize_partial_vw_writer_blog_footer_text', 
	));
	
	$wp_customize->add_setting('vw_writer_blog_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_writer_blog_footer_text',array(
		'label'	=> __('Copyright Text','vw-writer-blog'),
		'section'=> 'vw_writer_blog_footer',
		'setting'=> 'vw_writer_blog_footer_text',
		'type'=> 'text'
	));	

	$wp_customize->add_setting('vw_writer_blog_copyright_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_writer_blog_copyright_font_size',array(
		'label'	=> __('Copyright Font Size','vw-writer-blog'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_writer_blog_copyright_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_writer_blog_copyright_padding_top_bottom',array(
		'label'	=> __('Copyright Padding Top Bottom','vw-writer-blog'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_writer_blog_copyright_alignment',array(
        'default' => 'center',
        'sanitize_callback' => 'vw_writer_blog_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Writer_Blog_Image_Radio_Control($wp_customize, 'vw_writer_blog_copyright_alignment', array(
        'type' => 'select',
        'label' => __('Copyright Alignment','vw-writer-blog'),
        'section' => 'vw_writer_blog_footer',
        'settings' => 'vw_writer_blog_copyright_alignment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/images/copyright3.png'
    ))));

	$wp_customize->add_setting( 'vw_writer_blog_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_writer_blog_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Writer_Blog_Toggle_Switch_Custom_Control( $wp_customize, 'vw_writer_blog_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-writer-blog' ),
      	'section' => 'vw_writer_blog_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_writer_blog_scroll_to_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'vw_writer_blog_customize_partial_vw_writer_blog_scroll_to_top_icon', 
	));

    $wp_customize->add_setting('vw_writer_blog_scroll_to_top_icon',array(
		'default'	=> 'fas fa-angle-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Writer_Blog_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_writer_blog_scroll_to_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','vw-writer-blog'),
		'transport' => 'refresh',
		'section'	=> 'vw_writer_blog_footer',
		'setting'	=> 'vw_writer_blog_scroll_to_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_writer_blog_scroll_to_top_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_writer_blog_scroll_to_top_font_size',array(
		'label'	=> __('Icon Font Size','vw-writer-blog'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_writer_blog_scroll_to_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_writer_blog_scroll_to_top_padding',array(
		'label'	=> __('Icon Top Bottom Padding','vw-writer-blog'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_writer_blog_scroll_to_top_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_writer_blog_scroll_to_top_width',array(
		'label'	=> __('Icon Width','vw-writer-blog'),
		'description'	=> __('Enter a value in pixels Example:20px','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_writer_blog_scroll_to_top_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_writer_blog_scroll_to_top_height',array(
		'label'	=> __('Icon Height','vw-writer-blog'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_writer_blog_scroll_to_top_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_writer_blog_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_writer_blog_scroll_to_top_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-writer-blog' ),
		'section'     => 'vw_writer_blog_footer',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_writer_blog_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'vw_writer_blog_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Writer_Blog_Image_Radio_Control($wp_customize, 'vw_writer_blog_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','vw-writer-blog'),
        'section' => 'vw_writer_blog_footer',
        'settings' => 'vw_writer_blog_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/images/layout3.png'
    ))));

    //Woocommerce settings
	$wp_customize->add_section('vw_writer_blog_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'vw-writer-blog'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_writer_blog_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product .sidebar', 
		'render_callback' => 'vw_writer_blog_customize_partial_vw_writer_blog_woocommerce_shop_page_sidebar', ) );

    //Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_writer_blog_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_writer_blog_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Writer_Blog_Toggle_Switch_Custom_Control( $wp_customize, 'vw_writer_blog_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','vw-writer-blog' ),
		'section' => 'vw_writer_blog_woocommerce_section'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_writer_blog_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product .sidebar', 
		'render_callback' => 'vw_writer_blog_customize_partial_vw_writer_blog_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_writer_blog_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_writer_blog_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Writer_Blog_Toggle_Switch_Custom_Control( $wp_customize, 'vw_writer_blog_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','vw-writer-blog' ),
		'section' => 'vw_writer_blog_woocommerce_section'
    )));

     //Products per page
    $wp_customize->add_setting('vw_writer_blog_products_per_page',array(
		'default'=> 9,
		'sanitize_callback'	=> 'vw_writer_blog_sanitize_float'
	));
	$wp_customize->add_control('vw_writer_blog_products_per_page',array(
		'label'	=> __('Products Per Page','vw-writer-blog'),
		'description' => __('Display on shop page','vw-writer-blog'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'vw_writer_blog_woocommerce_section',
		'type'=> 'number',
	));

    //Products per row
    $wp_customize->add_setting('vw_writer_blog_products_per_row',array(
		'default'=> 3,
		'sanitize_callback'	=> 'vw_writer_blog_sanitize_choices'
	));
	$wp_customize->add_control('vw_writer_blog_products_per_row',array(
		'label'	=> __('Products Per Row','vw-writer-blog'),
		'description' => __('Display on shop page','vw-writer-blog'),
		'choices' => array(
            2 => 2,
			3 => 3,
			4 => 4,
        ),
		'section'=> 'vw_writer_blog_woocommerce_section',
		'type'=> 'select',
	));

	//Products padding
	$wp_customize->add_setting('vw_writer_blog_products_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_writer_blog_products_padding_top_bottom',array(
		'label'	=> __('Products Padding Top Bottom','vw-writer-blog'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_writer_blog_products_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_writer_blog_products_padding_left_right',array(
		'label'	=> __('Products Padding Left Right','vw-writer-blog'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_woocommerce_section',
		'type'=> 'text'
	));

	//Products box shadow
	$wp_customize->add_setting( 'vw_writer_blog_products_box_shadow', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_writer_blog_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_writer_blog_products_box_shadow', array(
		'label'       => esc_html__( 'Products Box Shadow','vw-writer-blog' ),
		'section'     => 'vw_writer_blog_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products border radius
    $wp_customize->add_setting( 'vw_writer_blog_products_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_writer_blog_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_writer_blog_products_border_radius', array(
		'label'       => esc_html__( 'Products Border Radius','vw-writer-blog' ),
		'section'     => 'vw_writer_blog_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_writer_blog_products_btn_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_writer_blog_products_btn_padding_top_bottom',array(
		'label'	=> __('Products Button Padding Top Bottom','vw-writer-blog'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_writer_blog_products_btn_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_writer_blog_products_btn_padding_left_right',array(
		'label'	=> __('Products Button Padding Left Right','vw-writer-blog'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_writer_blog_products_button_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_writer_blog_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_writer_blog_products_button_border_radius', array(
		'label'       => esc_html__( 'Products Button Border Radius','vw-writer-blog' ),
		'section'     => 'vw_writer_blog_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products Sale Badge
	$wp_customize->add_setting('vw_writer_blog_woocommerce_sale_position',array(
        'default' => 'right',
        'sanitize_callback' => 'vw_writer_blog_sanitize_choices'
	));
	$wp_customize->add_control('vw_writer_blog_woocommerce_sale_position',array(
        'type' => 'select',
        'label' => __('Sale Badge Position','vw-writer-blog'),
        'section' => 'vw_writer_blog_woocommerce_section',
        'choices' => array(
            'left' => __('Left','vw-writer-blog'),
            'right' => __('Right','vw-writer-blog'),
        ),
	) );

	$wp_customize->add_setting('vw_writer_blog_woocommerce_sale_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_writer_blog_woocommerce_sale_font_size',array(
		'label'	=> __('Sale Font Size','vw-writer-blog'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-writer-blog'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-writer-blog' ),
        ),
		'section'=> 'vw_writer_blog_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_writer_blog_woocommerce_sale_border_radius', array(
		'default'              => '100',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_writer_blog_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_writer_blog_woocommerce_sale_border_radius', array(
		'label'       => esc_html__( 'Sale Border Radius','vw-writer-blog' ),
		'section'     => 'vw_writer_blog_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    // Has to be at the top
	$wp_customize->register_panel_type( 'VW_Writer_Blog_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'VW_Writer_Blog_WP_Customize_Section' );
}

add_action( 'customize_register', 'vw_writer_blog_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class VW_Writer_Blog_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'vw_writer_blog_panel';
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
  	class VW_Writer_Blog_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'vw_writer_blog_section';
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
function vw_writer_blog_customize_controls_scripts() {
  wp_enqueue_script( 'customizer-controls', get_theme_file_uri( '/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'vw_writer_blog_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Writer_Blog_Customize {

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
		$manager->register_section_type( 'VW_Writer_Blog_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new VW_Writer_Blog_Customize_Section_Pro($manager,'vw_writer_blog_upgrade_pro_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'Writer Pro Theme', 'vw-writer-blog' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-writer-blog' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/wordpress-themes-for-writers/'),
		)));

		$manager->add_section(new VW_Writer_Blog_Customize_Section_Pro($manager,'vw_writer_blog_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'vw-writer-blog' ),
			'pro_text' => esc_html__( 'DOCS', 'vw-writer-blog' ),
			'pro_url'  => esc_url('https://www.vwthemesdemo.com/docs/free-vw-writer-blog/'),
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

		wp_enqueue_script( 'vw-writer-blog-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-writer-blog-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/css/customize-controls.css' );

		wp_localize_script(
		'vw-writer-blog-customize-controls',
		'vw_writer_blog_customizer_params',
		array(
			'ajaxurl' =>	admin_url( 'admin-ajax.php' )
		));
	}
}

// Doing this customizer thang!
VW_Writer_Blog_Customize::get_instance();