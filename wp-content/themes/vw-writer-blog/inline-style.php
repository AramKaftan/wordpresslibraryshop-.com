<?php
	
	/*---------------------First highlight color-------------------*/

	$vw_writer_blog_first_color = get_theme_mod('vw_writer_blog_first_color');

	$vw_writer_blog_custom_css = '';

	if($vw_writer_blog_first_color != false){
		$vw_writer_blog_custom_css .='.slider-date, .scrollup i, input[type="submit"], .footer .tagcloud a:hover, .footer-2, .box:after, .sidebar input[type="submit"], .sidebar .tagcloud a:hover, nav.woocommerce-MyAccount-navigation ul li, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .pagination span, .pagination a, #comments input[type="submit"].submit, #comments a.comment-reply-link, .toggle-nav i, .sidebar .widget_price_filter .ui-slider .ui-slider-range, .sidebar .widget_price_filter .ui-slider .ui-slider-handle, .sidebar .woocommerce-product-search button, .footer .widget_price_filter .ui-slider .ui-slider-range, .footer .widget_price_filter .ui-slider .ui-slider-handle, .footer .woocommerce-product-search button, .footer a.custom_read_more, .sidebar a.custom_read_more, .footer .custom-social-icons i:hover, .sidebar .custom-social-icons i:hover, .nav-previous a, .nav-next a, .woocommerce nav.woocommerce-pagination ul li a, #preloader, .footer .wp-block-search .wp-block-search__button, .sidebar .wp-block-search .wp-block-search__button{';
			$vw_writer_blog_custom_css .='background-color: '.esc_attr($vw_writer_blog_first_color).';';
		$vw_writer_blog_custom_css .='}';
	}
	if($vw_writer_blog_first_color != false){
		$vw_writer_blog_custom_css .='a, .call i, .email i, p.infotext, .footer h3, .woocommerce-message::before, .post-main-box:hover h2 a, .post-main-box:hover .post-info a, .single-post .post-info:hover a, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, .more-btn a:hover,.footer li a:hover, .sidebar ul li a:hover, .main-navigation a:hover, .main-navigation ul.sub-menu a:hover, .entry-content a, .sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a, .post-main-box h2 a:hover, h2.section-title a:hover, .error-btn a:hover, .footer .custom-social-icons i, .sidebar .custom-social-icons i, .logo .site-title a:hover, #slider .inner_carousel h1 a:hover, .footer .wp-block-search .wp-block-search__label, .post-main-box:hover .content-bttn a{';
			$vw_writer_blog_custom_css .='color: '.esc_attr($vw_writer_blog_first_color).';';
		$vw_writer_blog_custom_css .='}';
	}
	if($vw_writer_blog_first_color != false){
		$vw_writer_blog_custom_css .='.slider-date:before{';
			$vw_writer_blog_custom_css .='border-left-color: '.esc_attr($vw_writer_blog_first_color).';';
		$vw_writer_blog_custom_css .='}';
	}
	if($vw_writer_blog_first_color != false){
		$vw_writer_blog_custom_css .='.footer .custom-social-icons i, .sidebar .custom-social-icons i, .footer .custom-social-icons i:hover, .sidebar .custom-social-icons i:hover{';
			$vw_writer_blog_custom_css .='border-color: '.esc_attr($vw_writer_blog_first_color).';';
		$vw_writer_blog_custom_css .='}';
	}
	if($vw_writer_blog_first_color != false){
		$vw_writer_blog_custom_css .='.woocommerce-message, .post-info hr, .main-navigation ul ul{';
			$vw_writer_blog_custom_css .='border-top-color: '.esc_attr($vw_writer_blog_first_color).';';
		$vw_writer_blog_custom_css .='}';
	}
	if($vw_writer_blog_first_color != false){
		$vw_writer_blog_custom_css .='.main-navigation ul ul, .header-fixed{';
			$vw_writer_blog_custom_css .='border-bottom-color: '.esc_attr($vw_writer_blog_first_color).';';
		$vw_writer_blog_custom_css .='}';
	}

	/*---------------- Width Layout -------------------*/

	$vw_writer_blog_theme_lay = get_theme_mod( 'vw_writer_blog_width_option','Full Width');
    if($vw_writer_blog_theme_lay == 'Boxed'){
		$vw_writer_blog_custom_css .='body{';
			$vw_writer_blog_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$vw_writer_blog_custom_css .='}';
		$vw_writer_blog_custom_css .='.page-template-custom-homepage .header .nav{';
			$vw_writer_blog_custom_css .='margin: 27px 11.6em 0 0;';
		$vw_writer_blog_custom_css .='}';
		$vw_writer_blog_custom_css .='.nav ul li a{';
			$vw_writer_blog_custom_css .='padding: 8px 12px;';
		$vw_writer_blog_custom_css .='}';
		$vw_writer_blog_custom_css .='.scrollup i{';
			$vw_writer_blog_custom_css .='right: 100px;';
		$vw_writer_blog_custom_css .='}';
		$vw_writer_blog_custom_css .='.scrollup.left i{';
			$vw_writer_blog_custom_css .='left: 100px;';
		$vw_writer_blog_custom_css .='}';
	}else if($vw_writer_blog_theme_lay == 'Wide Width'){
		$vw_writer_blog_custom_css .='body{';
			$vw_writer_blog_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$vw_writer_blog_custom_css .='}';
		$vw_writer_blog_custom_css .='.page-template-custom-homepage .header .nav{';
			$vw_writer_blog_custom_css .='margin: 27px 2em 0 0;';
		$vw_writer_blog_custom_css .='}';
		$vw_writer_blog_custom_css .='.nav ul li a{';
			$vw_writer_blog_custom_css .='padding: 12px 15px;';
		$vw_writer_blog_custom_css .='}';
		$vw_writer_blog_custom_css .='.scrollup i{';
			$vw_writer_blog_custom_css .='right: 30px;';
		$vw_writer_blog_custom_css .='}';
		$vw_writer_blog_custom_css .='.scrollup.left i{';
			$vw_writer_blog_custom_css .='left: 30px;';
		$vw_writer_blog_custom_css .='}';
	}else if($vw_writer_blog_theme_lay == 'Full Width'){
		$vw_writer_blog_custom_css .='body{';
			$vw_writer_blog_custom_css .='max-width: 100%;';
		$vw_writer_blog_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$vw_writer_blog_theme_lay = get_theme_mod( 'vw_writer_blog_slider_opacity_color','0.5');
	if($vw_writer_blog_theme_lay == '0'){
		$vw_writer_blog_custom_css .='#slider img{';
			$vw_writer_blog_custom_css .='opacity:0';
		$vw_writer_blog_custom_css .='}';
		}else if($vw_writer_blog_theme_lay == '0.1'){
		$vw_writer_blog_custom_css .='#slider img{';
			$vw_writer_blog_custom_css .='opacity:0.1';
		$vw_writer_blog_custom_css .='}';
		}else if($vw_writer_blog_theme_lay == '0.2'){
		$vw_writer_blog_custom_css .='#slider img{';
			$vw_writer_blog_custom_css .='opacity:0.2';
		$vw_writer_blog_custom_css .='}';
		}else if($vw_writer_blog_theme_lay == '0.3'){
		$vw_writer_blog_custom_css .='#slider img{';
			$vw_writer_blog_custom_css .='opacity:0.3';
		$vw_writer_blog_custom_css .='}';
		}else if($vw_writer_blog_theme_lay == '0.4'){
		$vw_writer_blog_custom_css .='#slider img{';
			$vw_writer_blog_custom_css .='opacity:0.4';
		$vw_writer_blog_custom_css .='}';
		}else if($vw_writer_blog_theme_lay == '0.5'){
		$vw_writer_blog_custom_css .='#slider img{';
			$vw_writer_blog_custom_css .='opacity:0.5';
		$vw_writer_blog_custom_css .='}';
		}else if($vw_writer_blog_theme_lay == '0.6'){
		$vw_writer_blog_custom_css .='#slider img{';
			$vw_writer_blog_custom_css .='opacity:0.6';
		$vw_writer_blog_custom_css .='}';
		}else if($vw_writer_blog_theme_lay == '0.7'){
		$vw_writer_blog_custom_css .='#slider img{';
			$vw_writer_blog_custom_css .='opacity:0.7';
		$vw_writer_blog_custom_css .='}';
		}else if($vw_writer_blog_theme_lay == '0.8'){
		$vw_writer_blog_custom_css .='#slider img{';
			$vw_writer_blog_custom_css .='opacity:0.8';
		$vw_writer_blog_custom_css .='}';
		}else if($vw_writer_blog_theme_lay == '0.9'){
		$vw_writer_blog_custom_css .='#slider img{';
			$vw_writer_blog_custom_css .='opacity:0.9';
		$vw_writer_blog_custom_css .='}';
		}

	/*-----------------Slider Content Layout -------------------*/

	$vw_writer_blog_theme_lay = get_theme_mod( 'vw_writer_blog_slider_content_option','Left');
    if($vw_writer_blog_theme_lay == 'Left'){
		$vw_writer_blog_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, .more-btn{';
			$vw_writer_blog_custom_css .='text-align:left; left:17%; right:45%;';
		$vw_writer_blog_custom_css .='}';
	}else if($vw_writer_blog_theme_lay == 'Center'){
		$vw_writer_blog_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, .more-btn{';
			$vw_writer_blog_custom_css .='text-align:center; left:20%; right:20%;';
		$vw_writer_blog_custom_css .='}';
	}else if($vw_writer_blog_theme_lay == 'Right'){
		$vw_writer_blog_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, .more-btn{';
			$vw_writer_blog_custom_css .='text-align:right; left:45%; right:17as%;';
		$vw_writer_blog_custom_css .='}';
	}

	/*------------- Slider Content Padding Settings ------------------*/

	$vw_writer_blog_slider_content_padding_top_bottom = get_theme_mod('vw_writer_blog_slider_content_padding_top_bottom');
	$vw_writer_blog_slider_content_padding_left_right = get_theme_mod('vw_writer_blog_slider_content_padding_left_right');
	if($vw_writer_blog_slider_content_padding_top_bottom != false || $vw_writer_blog_slider_content_padding_left_right != false){
		$vw_writer_blog_custom_css .='#slider .carousel-caption{';
			$vw_writer_blog_custom_css .='top: '.esc_attr($vw_writer_blog_slider_content_padding_top_bottom).'; bottom: '.esc_attr($vw_writer_blog_slider_content_padding_top_bottom).';left: '.esc_attr($vw_writer_blog_slider_content_padding_left_right).';right: '.esc_attr($vw_writer_blog_slider_content_padding_left_right).';';
		$vw_writer_blog_custom_css .='}';
	}

	/*---------------------------Slider Height ------------*/

	$vw_writer_blog_slider_height = get_theme_mod('vw_writer_blog_slider_height');
	if($vw_writer_blog_slider_height != false){
		$vw_writer_blog_custom_css .='#slider img{';
			$vw_writer_blog_custom_css .='height: '.esc_attr($vw_writer_blog_slider_height).';';
		$vw_writer_blog_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$vw_writer_blog_theme_lay = get_theme_mod( 'vw_writer_blog_blog_layout_option','Default');
    if($vw_writer_blog_theme_lay == 'Default'){
		$vw_writer_blog_custom_css .='.post-main-box{';
			$vw_writer_blog_custom_css .='';
		$vw_writer_blog_custom_css .='}';
	}else if($vw_writer_blog_theme_lay == 'Center'){
		$vw_writer_blog_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services .service-text p{';
			$vw_writer_blog_custom_css .='text-align:center;';
		$vw_writer_blog_custom_css .='}';
		$vw_writer_blog_custom_css .='.post-info, .content-bttn{';
			$vw_writer_blog_custom_css .='margin-top:10px;';
		$vw_writer_blog_custom_css .='}';
		$vw_writer_blog_custom_css .='.post-info hr{';
			$vw_writer_blog_custom_css .='margin:15px auto;';
		$vw_writer_blog_custom_css .='}';
	}else if($vw_writer_blog_theme_lay == 'Left'){
		$vw_writer_blog_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$vw_writer_blog_custom_css .='text-align:Left;';
		$vw_writer_blog_custom_css .='}';
	}

	/*-----------------Responsive Media -----------------------*/

	$vw_writer_blog_resp_stickyheader = get_theme_mod( 'vw_writer_blog_stickyheader_hide_show',false);
	if($vw_writer_blog_resp_stickyheader == true && get_theme_mod( 'vw_writer_blog_sticky_header',false) != true){
    	$vw_writer_blog_custom_css .='.header-fixed{';
			$vw_writer_blog_custom_css .='position:static;';
		$vw_writer_blog_custom_css .='} ';
	}
    if($vw_writer_blog_resp_stickyheader == true){
    	$vw_writer_blog_custom_css .='@media screen and (max-width:575px) {';
		$vw_writer_blog_custom_css .='.header-fixed{';
			$vw_writer_blog_custom_css .='position:fixed;';
		$vw_writer_blog_custom_css .='} }';
	}else if($vw_writer_blog_resp_stickyheader == false){
		$vw_writer_blog_custom_css .='@media screen and (max-width:575px){';
		$vw_writer_blog_custom_css .='.header-fixed{';
			$vw_writer_blog_custom_css .='position:static;';
		$vw_writer_blog_custom_css .='} }';
	}

	$vw_writer_blog_resp_slider = get_theme_mod( 'vw_writer_blog_resp_slider_hide_show',false);
	if($vw_writer_blog_resp_slider == true && get_theme_mod( 'vw_writer_blog_slider_hide_show', false) == false){
    	$vw_writer_blog_custom_css .='#slider{';
			$vw_writer_blog_custom_css .='display:none;';
		$vw_writer_blog_custom_css .='} ';
	}
    if($vw_writer_blog_resp_slider == true){
    	$vw_writer_blog_custom_css .='@media screen and (max-width:575px) {';
		$vw_writer_blog_custom_css .='#slider{';
			$vw_writer_blog_custom_css .='display:block;';
		$vw_writer_blog_custom_css .='} }';
	}else if($vw_writer_blog_resp_slider == false){
		$vw_writer_blog_custom_css .='@media screen and (max-width:575px) {';
		$vw_writer_blog_custom_css .='#slider{';
			$vw_writer_blog_custom_css .='display:none;';
		$vw_writer_blog_custom_css .='} }';
	}

	$vw_writer_blog_resp_sidebar = get_theme_mod( 'vw_writer_blog_sidebar_hide_show',true);
    if($vw_writer_blog_resp_sidebar == true){
    	$vw_writer_blog_custom_css .='@media screen and (max-width:575px) {';
		$vw_writer_blog_custom_css .='.sidebar{';
			$vw_writer_blog_custom_css .='display:block;';
		$vw_writer_blog_custom_css .='} }';
	}else if($vw_writer_blog_resp_sidebar == false){
		$vw_writer_blog_custom_css .='@media screen and (max-width:575px) {';
		$vw_writer_blog_custom_css .='.sidebar{';
			$vw_writer_blog_custom_css .='display:none;';
		$vw_writer_blog_custom_css .='} }';
	}

	$vw_writer_blog_resp_scroll_top = get_theme_mod( 'vw_writer_blog_resp_scroll_top_hide_show',true);
	if($vw_writer_blog_resp_scroll_top == true && get_theme_mod( 'vw_writer_blog_hide_show_scroll',true) != true){
    	$vw_writer_blog_custom_css .='.scrollup i{';
			$vw_writer_blog_custom_css .='visibility:hidden !important;';
		$vw_writer_blog_custom_css .='} ';
	}
    if($vw_writer_blog_resp_scroll_top == true){
    	$vw_writer_blog_custom_css .='@media screen and (max-width:575px) {';
		$vw_writer_blog_custom_css .='.scrollup i{';
			$vw_writer_blog_custom_css .='visibility:visible !important;';
		$vw_writer_blog_custom_css .='} }';
	}else if($vw_writer_blog_resp_scroll_top == false){
		$vw_writer_blog_custom_css .='@media screen and (max-width:575px){';
		$vw_writer_blog_custom_css .='.scrollup i{';
			$vw_writer_blog_custom_css .='visibility:hidden !important;';
		$vw_writer_blog_custom_css .='} }';
	}

	/*-------------- Sticky Header Padding ----------------*/

	$vw_writer_blog_sticky_header_padding = get_theme_mod('vw_writer_blog_sticky_header_padding');
	if($vw_writer_blog_sticky_header_padding != false){
		$vw_writer_blog_custom_css .='.header-fixed{';
			$vw_writer_blog_custom_css .='padding: '.esc_attr($vw_writer_blog_sticky_header_padding).';';
		$vw_writer_blog_custom_css .='}';
	}

	/*-------------- Menus Settings ----------------*/

	$vw_writer_blog_navigation_menu_font_size = get_theme_mod('vw_writer_blog_navigation_menu_font_size');
	if($vw_writer_blog_navigation_menu_font_size != false){
		$vw_writer_blog_custom_css .='.main-navigation a{';
			$vw_writer_blog_custom_css .='font-size: '.esc_attr($vw_writer_blog_navigation_menu_font_size).';';
		$vw_writer_blog_custom_css .='}';
	}

	$vw_writer_blog_nav_menus_font_weight = get_theme_mod( 'vw_writer_blog_navigation_menu_font_weight','Default');
    if($vw_writer_blog_nav_menus_font_weight == 'Default'){
		$vw_writer_blog_custom_css .='.main-navigation a{';
			$vw_writer_blog_custom_css .='';
		$vw_writer_blog_custom_css .='}';
	}else if($vw_writer_blog_nav_menus_font_weight == 'Normal'){
		$vw_writer_blog_custom_css .='.main-navigation a{';
			$vw_writer_blog_custom_css .='font-weight: normal;';
		$vw_writer_blog_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$vw_writer_blog_button_padding_top_bottom = get_theme_mod('vw_writer_blog_button_padding_top_bottom');
	$vw_writer_blog_button_padding_left_right = get_theme_mod('vw_writer_blog_button_padding_left_right');
	if($vw_writer_blog_button_padding_top_bottom != false || $vw_writer_blog_button_padding_left_right != false){
		$vw_writer_blog_custom_css .='.post-main-box .content-bttn{';
			$vw_writer_blog_custom_css .='padding-top: '.esc_attr($vw_writer_blog_button_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_writer_blog_button_padding_top_bottom).';padding-left: '.esc_attr($vw_writer_blog_button_padding_left_right).';padding-right: '.esc_attr($vw_writer_blog_button_padding_left_right).';';
		$vw_writer_blog_custom_css .='}';
	}

	$vw_writer_blog_button_border_radius = get_theme_mod('vw_writer_blog_button_border_radius');
	if($vw_writer_blog_button_border_radius != false){
		$vw_writer_blog_custom_css .='.post-main-box .content-bttn{';
			$vw_writer_blog_custom_css .='border-radius: '.esc_attr($vw_writer_blog_button_border_radius).'px;';
		$vw_writer_blog_custom_css .='}';
	}

	$btn_border = get_theme_mod( 'vw_writer_blog_blog_button_border', false);
	if($btn_border == true){
		$vw_writer_blog_custom_css .='.post-main-box .content-bttn{';
			$vw_writer_blog_custom_css .='border: 1px solid #323232; display: inline-block;';
		$vw_writer_blog_custom_css .='}';
	}

	/*------------- Single Blog Page------------------*/

	$vw_writer_blog_featured_image_border_radius = get_theme_mod('vw_writer_blog_featured_image_border_radius', 0);
	if($vw_writer_blog_featured_image_border_radius != false){
		$vw_writer_blog_custom_css .='.box-image img, .feature-box img{';
			$vw_writer_blog_custom_css .='border-radius: '.esc_attr($vw_writer_blog_featured_image_border_radius).'px;';
		$vw_writer_blog_custom_css .='}';
	}

	$vw_writer_blog_featured_image_box_shadow = get_theme_mod('vw_writer_blog_featured_image_box_shadow',0);
	if($vw_writer_blog_featured_image_box_shadow != false){
		$vw_writer_blog_custom_css .='.box-image img, .feature-box img, #content-vw img{';
			$vw_writer_blog_custom_css .='box-shadow: '.esc_attr($vw_writer_blog_featured_image_box_shadow).'px '.esc_attr($vw_writer_blog_featured_image_box_shadow).'px '.esc_attr($vw_writer_blog_featured_image_box_shadow).'px #cccccc;';
		$vw_writer_blog_custom_css .='}';
	}

	$vw_writer_blog_single_blog_post_navigation_show_hide = get_theme_mod('vw_writer_blog_single_blog_post_navigation_show_hide',true);
	if($vw_writer_blog_single_blog_post_navigation_show_hide != true){
		$vw_writer_blog_custom_css .='.post-navigation{';
			$vw_writer_blog_custom_css .='display: none;';
		$vw_writer_blog_custom_css .='}';
	}

	$vw_writer_blog_comment_width = get_theme_mod('vw_writer_blog_single_blog_comment_width');
	if($vw_writer_blog_comment_width != false){
		$vw_writer_blog_custom_css .='#comments textarea{';
			$vw_writer_blog_custom_css .='width: '.esc_attr($vw_writer_blog_comment_width).';';
		$vw_writer_blog_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_writer_blog_footer_background_color = get_theme_mod('vw_writer_blog_footer_background_color');
	if($vw_writer_blog_footer_background_color != false){
		$vw_writer_blog_custom_css .='.footer{';
			$vw_writer_blog_custom_css .='background-color: '.esc_attr($vw_writer_blog_footer_background_color).';';
		$vw_writer_blog_custom_css .='}';
	}

	$vw_writer_blog_copyright_font_size = get_theme_mod('vw_writer_blog_copyright_font_size');
	if($vw_writer_blog_copyright_font_size != false){
		$vw_writer_blog_custom_css .='.copyright p{';
			$vw_writer_blog_custom_css .='font-size: '.esc_attr($vw_writer_blog_copyright_font_size).';';
		$vw_writer_blog_custom_css .='}';
	}

	$vw_writer_blog_copyright_padding_top_bottom = get_theme_mod('vw_writer_blog_copyright_padding_top_bottom');
	if($vw_writer_blog_copyright_padding_top_bottom != false){
		$vw_writer_blog_custom_css .='.footer-2{';
			$vw_writer_blog_custom_css .='padding-top: '.esc_attr($vw_writer_blog_copyright_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_writer_blog_copyright_padding_top_bottom).';';
		$vw_writer_blog_custom_css .='}';
	}

	$vw_writer_blog_copyright_alignment = get_theme_mod('vw_writer_blog_copyright_alignment');
	if($vw_writer_blog_copyright_alignment != false){
		$vw_writer_blog_custom_css .='.copyright p{';
			$vw_writer_blog_custom_css .='text-align: '.esc_attr($vw_writer_blog_copyright_alignment).';';
		$vw_writer_blog_custom_css .='}';
	}

	/*----------------Sroll to top Settings ------------------*/

	$vw_writer_blog_scroll_to_top_font_size = get_theme_mod('vw_writer_blog_scroll_to_top_font_size');
	if($vw_writer_blog_scroll_to_top_font_size != false){
		$vw_writer_blog_custom_css .='.scrollup i{';
			$vw_writer_blog_custom_css .='font-size: '.esc_attr($vw_writer_blog_scroll_to_top_font_size).';';
		$vw_writer_blog_custom_css .='}';
	}

	$vw_writer_blog_scroll_to_top_padding = get_theme_mod('vw_writer_blog_scroll_to_top_padding');
	$vw_writer_blog_scroll_to_top_padding = get_theme_mod('vw_writer_blog_scroll_to_top_padding');
	if($vw_writer_blog_scroll_to_top_padding != false){
		$vw_writer_blog_custom_css .='.scrollup i{';
			$vw_writer_blog_custom_css .='padding-top: '.esc_attr($vw_writer_blog_scroll_to_top_padding).';padding-bottom: '.esc_attr($vw_writer_blog_scroll_to_top_padding).';';
		$vw_writer_blog_custom_css .='}';
	}

	$vw_writer_blog_scroll_to_top_width = get_theme_mod('vw_writer_blog_scroll_to_top_width');
	if($vw_writer_blog_scroll_to_top_width != false){
		$vw_writer_blog_custom_css .='.scrollup i{';
			$vw_writer_blog_custom_css .='width: '.esc_attr($vw_writer_blog_scroll_to_top_width).';';
		$vw_writer_blog_custom_css .='}';
	}

	$vw_writer_blog_scroll_to_top_height = get_theme_mod('vw_writer_blog_scroll_to_top_height');
	if($vw_writer_blog_scroll_to_top_height != false){
		$vw_writer_blog_custom_css .='.scrollup i{';
			$vw_writer_blog_custom_css .='height: '.esc_attr($vw_writer_blog_scroll_to_top_height).';';
		$vw_writer_blog_custom_css .='}';
	}

	$vw_writer_blog_scroll_to_top_border_radius = get_theme_mod('vw_writer_blog_scroll_to_top_border_radius');
	if($vw_writer_blog_scroll_to_top_border_radius != false){
		$vw_writer_blog_custom_css .='.scrollup i{';
			$vw_writer_blog_custom_css .='border-radius: '.esc_attr($vw_writer_blog_scroll_to_top_border_radius).'px;';
		$vw_writer_blog_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$vw_writer_blog_social_icon_font_size = get_theme_mod('vw_writer_blog_social_icon_font_size');
	if($vw_writer_blog_social_icon_font_size != false){
		$vw_writer_blog_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_writer_blog_custom_css .='font-size: '.esc_attr($vw_writer_blog_social_icon_font_size).';';
		$vw_writer_blog_custom_css .='}';
	}

	$vw_writer_blog_social_icon_padding = get_theme_mod('vw_writer_blog_social_icon_padding');
	if($vw_writer_blog_social_icon_padding != false){
		$vw_writer_blog_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_writer_blog_custom_css .='padding: '.esc_attr($vw_writer_blog_social_icon_padding).';';
		$vw_writer_blog_custom_css .='}';
	}

	$vw_writer_blog_social_icon_width = get_theme_mod('vw_writer_blog_social_icon_width');
	if($vw_writer_blog_social_icon_width != false){
		$vw_writer_blog_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_writer_blog_custom_css .='width: '.esc_attr($vw_writer_blog_social_icon_width).';';
		$vw_writer_blog_custom_css .='}';
	}

	$vw_writer_blog_social_icon_height = get_theme_mod('vw_writer_blog_social_icon_height');
	if($vw_writer_blog_social_icon_height != false){
		$vw_writer_blog_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_writer_blog_custom_css .='height: '.esc_attr($vw_writer_blog_social_icon_height).';';
		$vw_writer_blog_custom_css .='}';
	}

	$vw_writer_blog_social_icon_border_radius = get_theme_mod('vw_writer_blog_social_icon_border_radius');
	if($vw_writer_blog_social_icon_border_radius != false){
		$vw_writer_blog_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_writer_blog_custom_css .='border-radius: '.esc_attr($vw_writer_blog_social_icon_border_radius).'px;';
		$vw_writer_blog_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$vw_writer_blog_products_padding_top_bottom = get_theme_mod('vw_writer_blog_products_padding_top_bottom');
	if($vw_writer_blog_products_padding_top_bottom != false){
		$vw_writer_blog_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_writer_blog_custom_css .='padding-top: '.esc_attr($vw_writer_blog_products_padding_top_bottom).'!important; padding-bottom: '.esc_attr($vw_writer_blog_products_padding_top_bottom).'!important;';
		$vw_writer_blog_custom_css .='}';
	}

	$vw_writer_blog_products_padding_left_right = get_theme_mod('vw_writer_blog_products_padding_left_right');
	if($vw_writer_blog_products_padding_left_right != false){
		$vw_writer_blog_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_writer_blog_custom_css .='padding-left: '.esc_attr($vw_writer_blog_products_padding_left_right).'!important; padding-right: '.esc_attr($vw_writer_blog_products_padding_left_right).'!important;';
		$vw_writer_blog_custom_css .='}';
	}

	$vw_writer_blog_products_box_shadow = get_theme_mod('vw_writer_blog_products_box_shadow');
	if($vw_writer_blog_products_box_shadow != false){
		$vw_writer_blog_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$vw_writer_blog_custom_css .='box-shadow: '.esc_attr($vw_writer_blog_products_box_shadow).'px '.esc_attr($vw_writer_blog_products_box_shadow).'px '.esc_attr($vw_writer_blog_products_box_shadow).'px #ddd;';
		$vw_writer_blog_custom_css .='}';
	}

	$vw_writer_blog_products_border_radius = get_theme_mod('vw_writer_blog_products_border_radius', 0);
	if($vw_writer_blog_products_border_radius != false){
		$vw_writer_blog_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_writer_blog_custom_css .='border-radius: '.esc_attr($vw_writer_blog_products_border_radius).'px;';
		$vw_writer_blog_custom_css .='}';
	}

	$vw_writer_blog_products_btn_padding_top_bottom = get_theme_mod('vw_writer_blog_products_btn_padding_top_bottom');
	if($vw_writer_blog_products_btn_padding_top_bottom != false){
		$vw_writer_blog_custom_css .='.woocommerce a.button{';
			$vw_writer_blog_custom_css .='padding-top: '.esc_attr($vw_writer_blog_products_btn_padding_top_bottom).' !important; padding-bottom: '.esc_attr($vw_writer_blog_products_btn_padding_top_bottom).' !important;';
		$vw_writer_blog_custom_css .='}';
	}

	$vw_writer_blog_products_btn_padding_left_right = get_theme_mod('vw_writer_blog_products_btn_padding_left_right');
	if($vw_writer_blog_products_btn_padding_left_right != false){
		$vw_writer_blog_custom_css .='.woocommerce a.button{';
			$vw_writer_blog_custom_css .='padding-left: '.esc_attr($vw_writer_blog_products_btn_padding_left_right).' !important; padding-right: '.esc_attr($vw_writer_blog_products_btn_padding_left_right).' !important;';
		$vw_writer_blog_custom_css .='}';
	}

	$vw_writer_blog_products_button_border_radius = get_theme_mod('vw_writer_blog_products_button_border_radius', 0);
	if($vw_writer_blog_products_button_border_radius != false){
		$vw_writer_blog_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
			$vw_writer_blog_custom_css .='border-radius: '.esc_attr($vw_writer_blog_products_button_border_radius).'px;';
		$vw_writer_blog_custom_css .='}';
	}

	$vw_writer_blog_woocommerce_sale_position = get_theme_mod( 'vw_writer_blog_woocommerce_sale_position','right');
    if($vw_writer_blog_woocommerce_sale_position == 'left'){
		$vw_writer_blog_custom_css .='.woocommerce ul.products li.product .onsale{';
			$vw_writer_blog_custom_css .='left: -10px; right: auto;';
		$vw_writer_blog_custom_css .='}';
	}else if($vw_writer_blog_woocommerce_sale_position == 'right'){
		$vw_writer_blog_custom_css .='.woocommerce ul.products li.product .onsale{';
			$vw_writer_blog_custom_css .='left: auto; right: 0;';
		$vw_writer_blog_custom_css .='}';
	}

	$vw_writer_blog_woocommerce_sale_font_size = get_theme_mod('vw_writer_blog_woocommerce_sale_font_size');
	if($vw_writer_blog_woocommerce_sale_font_size != false){
		$vw_writer_blog_custom_css .='.woocommerce span.onsale{';
			$vw_writer_blog_custom_css .='font-size: '.esc_attr($vw_writer_blog_woocommerce_sale_font_size).';';
		$vw_writer_blog_custom_css .='}';
	}

	$vw_writer_blog_woocommerce_sale_border_radius = get_theme_mod('vw_writer_blog_woocommerce_sale_border_radius', 100);
	if($vw_writer_blog_woocommerce_sale_border_radius != false){
		$vw_writer_blog_custom_css .='.woocommerce span.onsale{';
			$vw_writer_blog_custom_css .='border-radius: '.esc_attr($vw_writer_blog_woocommerce_sale_border_radius).'px;';
		$vw_writer_blog_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	// Site title Font Size
	$vw_writer_blog_site_title_font_size = get_theme_mod('vw_writer_blog_site_title_font_size');
	if($vw_writer_blog_site_title_font_size != false){
		$vw_writer_blog_custom_css .='.logo h1 a, .logo p.site-title a{';
			$vw_writer_blog_custom_css .='font-size: '.esc_attr($vw_writer_blog_site_title_font_size).';';
		$vw_writer_blog_custom_css .='}';
	}

	// Site tagline Font Size
	$vw_writer_blog_site_tagline_font_size = get_theme_mod('vw_writer_blog_site_tagline_font_size');
	if($vw_writer_blog_site_tagline_font_size != false){
		$vw_writer_blog_custom_css .='.logo p.site-description{';
			$vw_writer_blog_custom_css .='font-size: '.esc_attr($vw_writer_blog_site_tagline_font_size).';';
		$vw_writer_blog_custom_css .='}';
	}

	/*------------------ Preloader Background Color  -------------------*/

	$vw_writer_blog_preloader_bg_color = get_theme_mod('vw_writer_blog_preloader_bg_color');
	if($vw_writer_blog_preloader_bg_color != false){
		$vw_writer_blog_custom_css .='#preloader{';
			$vw_writer_blog_custom_css .='background-color: '.esc_attr($vw_writer_blog_preloader_bg_color).';';
		$vw_writer_blog_custom_css .='}';
	}

	$vw_writer_blog_preloader_border_color = get_theme_mod('vw_writer_blog_preloader_border_color');
	if($vw_writer_blog_preloader_border_color != false){
		$vw_writer_blog_custom_css .='.loader-line{';
			$vw_writer_blog_custom_css .='border-color: '.esc_attr($vw_writer_blog_preloader_border_color).'!important;';
		$vw_writer_blog_custom_css .='}';
	}
