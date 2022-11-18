<?php
	
	/*-------------First highlight color-------------------*/

	$vw_eco_nature_first_color = get_theme_mod('vw_eco_nature_first_color');

	$vw_eco_nature_custom_css = '';

	if($vw_eco_nature_first_color != false){
		$vw_eco_nature_custom_css .='#header, #footer-2, .scrollup i, #footer .tagcloud a:hover, input[type="submit"], #sidebar .custom-social-icons i, #footer .custom-social-icons i, .more-btn a, .donate-btn a:hover, #topbar .custom-social-icons i:hover, #sidebar h3, .pagination .current, .pagination a:hover, #sidebar .tagcloud a:hover, #comments input[type="submit"], nav.woocommerce-MyAccount-navigation ul li, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .more-btn a i:first-child, #slider .more-btn a i:first-child, .header-fixed, #comments a.comment-reply-link, #footer a.custom_read_more, #sidebar a.custom_read_more, .nav-previous a:hover, .nav-next a:hover, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .wp-block-button__link, #preloader, #footer .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__label, .bradcrumbs a:hover, .bradcrumbs span{';
			$vw_eco_nature_custom_css .='background-color: '.esc_attr($vw_eco_nature_first_color).';';
		$vw_eco_nature_custom_css .='}';
	}
	if($vw_eco_nature_first_color != false){
		$vw_eco_nature_custom_css .='a, #footer li a:hover, #footer .custom-social-icons i:hover, .icon-space i, #sidebar ul li a:hover, .post-main-box:hover h2, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, .entry-content a, .sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a, .main-navigation ul.sub-menu a:hover, .post-main-box:hover h2 a, .post-main-box:hover .post-info a, .single-post .post-info:hover a, .icon-space span a:hover, .logo .site-title a:hover, .serv-box h4 a:hover, .about-box h3 a:hover, .entry-summary a{';
			$vw_eco_nature_custom_css .='color: '.esc_attr($vw_eco_nature_first_color).';';
		$vw_eco_nature_custom_css .='}';
	}
	if($vw_eco_nature_first_color != false){
		$vw_eco_nature_custom_css .='.donate-btn a:hover, #topbar .custom-social-icons i:hover{';
			$vw_eco_nature_custom_css .='border-color: '.esc_attr($vw_eco_nature_first_color).';';
		$vw_eco_nature_custom_css .='}';
	}
	if($vw_eco_nature_first_color != false){
		$vw_eco_nature_custom_css .='.main-navigation ul ul{';
			$vw_eco_nature_custom_css .='border-top-color: '.esc_attr($vw_eco_nature_first_color).';';
		$vw_eco_nature_custom_css .='}';
	}
	if($vw_eco_nature_first_color != false){
		$vw_eco_nature_custom_css .='#footer h3:after, .main-navigation ul ul, #footer .wp-block-search .wp-block-search__label:after{';
			$vw_eco_nature_custom_css .='border-bottom-color: '.esc_attr($vw_eco_nature_first_color).';';
		$vw_eco_nature_custom_css .='}';
	}

	/*------------------Second highlight color-------------------*/

	$vw_eco_nature_second_color = get_theme_mod('vw_eco_nature_second_color');

	if($vw_eco_nature_second_color != false){
		$vw_eco_nature_custom_css .='.more-btn a:hover, .main-navigation a:hover, #sidebar .woocommerce-product-search button, #sidebar .widget_price_filter .ui-slider .ui-slider-range, #sidebar .widget_price_filter .ui-slider .ui-slider-handle, #footer .widget_price_filter .ui-slider .ui-slider-range, #footer .widget_price_filter .ui-slider .ui-slider-handle, #footer .woocommerce-product-search button, #sidebar a.custom_read_more:hover, #footer a.custom_read_more:hover, .wp-block-button .wp-block-button__link:hover{';
			$vw_eco_nature_custom_css .='background-color: '.esc_attr($vw_eco_nature_second_color).';';
		$vw_eco_nature_custom_css .='}';
	}
	if($vw_eco_nature_second_color != false){
		$vw_eco_nature_custom_css .='.more-btn a i:first-child, #slider .more-btn a i:first-child{
		box-shadow: inset 2px 2px 10px '.esc_attr($vw_eco_nature_second_color).';
		}';
	}

	/*---------------------------Width Layout -------------------*/

	$vw_eco_nature_theme_lay = get_theme_mod( 'vw_eco_nature_width_option','Full Width');
    if($vw_eco_nature_theme_lay == 'Boxed'){
		$vw_eco_nature_custom_css .='body{';
			$vw_eco_nature_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$vw_eco_nature_custom_css .='}';
		$vw_eco_nature_custom_css .='.scrollup i{';
			$vw_eco_nature_custom_css .='right: 100px;';
		$vw_eco_nature_custom_css .='}';
		$vw_eco_nature_custom_css .='.scrollup.left i{';
			$vw_eco_nature_custom_css .='left: 100px;';
		$vw_eco_nature_custom_css .='}';
	}else if($vw_eco_nature_theme_lay == 'Wide Width'){
		$vw_eco_nature_custom_css .='body{';
			$vw_eco_nature_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$vw_eco_nature_custom_css .='}';
		$vw_eco_nature_custom_css .='.scrollup i{';
			$vw_eco_nature_custom_css .='right: 30px;';
		$vw_eco_nature_custom_css .='}';
		$vw_eco_nature_custom_css .='.scrollup.left i{';
			$vw_eco_nature_custom_css .='left: 30px;';
		$vw_eco_nature_custom_css .='}';
	}else if($vw_eco_nature_theme_lay == 'Full Width'){
		$vw_eco_nature_custom_css .='body{';
			$vw_eco_nature_custom_css .='max-width: 100%;';
		$vw_eco_nature_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$vw_eco_nature_theme_lay = get_theme_mod( 'vw_eco_nature_slider_opacity_color','0.5');
	if($vw_eco_nature_theme_lay == '0'){
		$vw_eco_nature_custom_css .='#slider img{';
			$vw_eco_nature_custom_css .='opacity:0';
		$vw_eco_nature_custom_css .='}';
		}else if($vw_eco_nature_theme_lay == '0.1'){
		$vw_eco_nature_custom_css .='#slider img{';
			$vw_eco_nature_custom_css .='opacity:0.1';
		$vw_eco_nature_custom_css .='}';
		}else if($vw_eco_nature_theme_lay == '0.2'){
		$vw_eco_nature_custom_css .='#slider img{';
			$vw_eco_nature_custom_css .='opacity:0.2';
		$vw_eco_nature_custom_css .='}';
		}else if($vw_eco_nature_theme_lay == '0.3'){
		$vw_eco_nature_custom_css .='#slider img{';
			$vw_eco_nature_custom_css .='opacity:0.3';
		$vw_eco_nature_custom_css .='}';
		}else if($vw_eco_nature_theme_lay == '0.4'){
		$vw_eco_nature_custom_css .='#slider img{';
			$vw_eco_nature_custom_css .='opacity:0.4';
		$vw_eco_nature_custom_css .='}';
		}else if($vw_eco_nature_theme_lay == '0.5'){
		$vw_eco_nature_custom_css .='#slider img{';
			$vw_eco_nature_custom_css .='opacity:0.5';
		$vw_eco_nature_custom_css .='}';
		}else if($vw_eco_nature_theme_lay == '0.6'){
		$vw_eco_nature_custom_css .='#slider img{';
			$vw_eco_nature_custom_css .='opacity:0.6';
		$vw_eco_nature_custom_css .='}';
		}else if($vw_eco_nature_theme_lay == '0.7'){
		$vw_eco_nature_custom_css .='#slider img{';
			$vw_eco_nature_custom_css .='opacity:0.7';
		$vw_eco_nature_custom_css .='}';
		}else if($vw_eco_nature_theme_lay == '0.8'){
		$vw_eco_nature_custom_css .='#slider img{';
			$vw_eco_nature_custom_css .='opacity:0.8';
		$vw_eco_nature_custom_css .='}';
		}else if($vw_eco_nature_theme_lay == '0.9'){
		$vw_eco_nature_custom_css .='#slider img{';
			$vw_eco_nature_custom_css .='opacity:0.9';
		$vw_eco_nature_custom_css .='}';
		}

	/*--------------------Slider Content Layout -------------------*/

	$vw_eco_nature_theme_lay = get_theme_mod( 'vw_eco_nature_slider_content_option','Center');
    if($vw_eco_nature_theme_lay == 'Left'){
		$vw_eco_nature_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_eco_nature_custom_css .='text-align:left; left:15%; right:45%;';
		$vw_eco_nature_custom_css .='}';
	}else if($vw_eco_nature_theme_lay == 'Center'){
		$vw_eco_nature_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_eco_nature_custom_css .='text-align:center; left:20%; right:20%;';
		$vw_eco_nature_custom_css .='}';
	}else if($vw_eco_nature_theme_lay == 'Right'){
		$vw_eco_nature_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_eco_nature_custom_css .='text-align:right; left:45%; right:15%;';
		$vw_eco_nature_custom_css .='}';
	}

	/*------------- Slider Content Padding Settings ------------------*/

	$vw_eco_nature_slider_content_padding_top_bottom = get_theme_mod('vw_eco_nature_slider_content_padding_top_bottom');
	$vw_eco_nature_slider_content_padding_left_right = get_theme_mod('vw_eco_nature_slider_content_padding_left_right');
	if($vw_eco_nature_slider_content_padding_top_bottom != false || $vw_eco_nature_slider_content_padding_left_right != false){
		$vw_eco_nature_custom_css .='#slider .carousel-caption{';
			$vw_eco_nature_custom_css .='top: '.esc_attr($vw_eco_nature_slider_content_padding_top_bottom).'; bottom: '.esc_attr($vw_eco_nature_slider_content_padding_top_bottom).';left: '.esc_attr($vw_eco_nature_slider_content_padding_left_right).';right: '.esc_attr($vw_eco_nature_slider_content_padding_left_right).';';
		$vw_eco_nature_custom_css .='}';
	}

	/*---------------------------Slider Height ------------*/

	$vw_eco_nature_slider_height = get_theme_mod('vw_eco_nature_slider_height');
	if($vw_eco_nature_slider_height != false){
		$vw_eco_nature_custom_css .='#slider img{';
			$vw_eco_nature_custom_css .='height: '.esc_attr($vw_eco_nature_slider_height).';';
		$vw_eco_nature_custom_css .='}';
	}

	/*--------------------------- Slider -------------------*/

	$vw_eco_nature_slider = get_theme_mod('vw_eco_nature_slider_hide_show');
	if($vw_eco_nature_slider == false){
		$vw_eco_nature_custom_css .='.page-template-custom-home-page #serv-section{';
			$vw_eco_nature_custom_css .='padding: 0;';
		$vw_eco_nature_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$vw_eco_nature_theme_lay = get_theme_mod( 'vw_eco_nature_blog_layout_option','Default');
    if($vw_eco_nature_theme_lay == 'Default'){
		$vw_eco_nature_custom_css .='.post-main-box{';
			$vw_eco_nature_custom_css .='';
		$vw_eco_nature_custom_css .='}';
	}else if($vw_eco_nature_theme_lay == 'Center'){
		$vw_eco_nature_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn{';
			$vw_eco_nature_custom_css .='text-align:center;';
		$vw_eco_nature_custom_css .='}';
		$vw_eco_nature_custom_css .='.post-info, .content-bttn{';
			$vw_eco_nature_custom_css .='margin-top:10px;';
		$vw_eco_nature_custom_css .='}';
		$vw_eco_nature_custom_css .='.post-info hr{';
			$vw_eco_nature_custom_css .='margin:15px auto;';
		$vw_eco_nature_custom_css .='}';
	}else if($vw_eco_nature_theme_lay == 'Left'){
		$vw_eco_nature_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$vw_eco_nature_custom_css .='text-align:Left;';
		$vw_eco_nature_custom_css .='}';
		$vw_eco_nature_custom_css .='.content-bttn{';
			$vw_eco_nature_custom_css .='margin:20px 0;';
		$vw_eco_nature_custom_css .='}';
		$vw_eco_nature_custom_css .='.post-info hr{';
			$vw_eco_nature_custom_css .='margin-bottom:10px;';
		$vw_eco_nature_custom_css .='}';
		$vw_eco_nature_custom_css .='.post-main-box h2{';
			$vw_eco_nature_custom_css .='margin-top:10px;';
		$vw_eco_nature_custom_css .='}';
	}

	/*----------------Responsive Media -----------------------*/

	$vw_eco_nature_resp_topbar = get_theme_mod( 'vw_eco_nature_resp_topbar_hide_show',false);
	if($vw_eco_nature_resp_topbar == true && get_theme_mod( 'vw_eco_nature_topbar_hide_show', false) == false){
    	$vw_eco_nature_custom_css .='.lower-header{';
			$vw_eco_nature_custom_css .='display:none;';
		$vw_eco_nature_custom_css .='} ';
	}
    if($vw_eco_nature_resp_topbar == true){
    	$vw_eco_nature_custom_css .='@media screen and (max-width:575px) {';
		$vw_eco_nature_custom_css .='.lower-header{';
			$vw_eco_nature_custom_css .='display:block;';
		$vw_eco_nature_custom_css .='} }';
	}else if($vw_eco_nature_resp_topbar == false){
		$vw_eco_nature_custom_css .='@media screen and (max-width:575px) {';
		$vw_eco_nature_custom_css .='.lower-header{';
			$vw_eco_nature_custom_css .='display:none;';
		$vw_eco_nature_custom_css .='} }';
	}

	$vw_eco_nature_resp_stickyheader = get_theme_mod( 'vw_eco_nature_stickyheader_hide_show',false);
	if($vw_eco_nature_resp_stickyheader == true && get_theme_mod( 'vw_eco_nature_sticky_header',false) != true){
    	$vw_eco_nature_custom_css .='.header-fixed{';
			$vw_eco_nature_custom_css .='position:static;';
		$vw_eco_nature_custom_css .='} ';
	}
    if($vw_eco_nature_resp_stickyheader == true){
    	$vw_eco_nature_custom_css .='@media screen and (max-width:575px) {';
		$vw_eco_nature_custom_css .='.header-fixed{';
			$vw_eco_nature_custom_css .='position:fixed;';
		$vw_eco_nature_custom_css .='} }';
	}else if($vw_eco_nature_resp_stickyheader == false){
		$vw_eco_nature_custom_css .='@media screen and (max-width:575px){';
		$vw_eco_nature_custom_css .='.header-fixed{';
			$vw_eco_nature_custom_css .='position:static;';
		$vw_eco_nature_custom_css .='} }';
	}

	$vw_eco_nature_resp_slider = get_theme_mod( 'vw_eco_nature_resp_slider_hide_show',false);
	if($vw_eco_nature_resp_slider == true && get_theme_mod( 'vw_eco_nature_slider_hide_show', false) == false){
    	$vw_eco_nature_custom_css .='#slider{';
			$vw_eco_nature_custom_css .='display:none;';
		$vw_eco_nature_custom_css .='} ';
	}
    if($vw_eco_nature_resp_slider == true){
    	$vw_eco_nature_custom_css .='@media screen and (max-width:575px) {';
		$vw_eco_nature_custom_css .='#slider{';
			$vw_eco_nature_custom_css .='display:block;';
		$vw_eco_nature_custom_css .='} }';
	}else if($vw_eco_nature_resp_slider == false){
		$vw_eco_nature_custom_css .='@media screen and (max-width:575px) {';
		$vw_eco_nature_custom_css .='#slider{';
			$vw_eco_nature_custom_css .='display:none;';
		$vw_eco_nature_custom_css .='} }';
	}

	$vw_eco_nature_resp_sidebar = get_theme_mod( 'vw_eco_nature_sidebar_hide_show',true);
    if($vw_eco_nature_resp_sidebar == true){
    	$vw_eco_nature_custom_css .='@media screen and (max-width:575px) {';
		$vw_eco_nature_custom_css .='#sidebar{';
			$vw_eco_nature_custom_css .='display:block;';
		$vw_eco_nature_custom_css .='} }';
	}else if($vw_eco_nature_resp_sidebar == false){
		$vw_eco_nature_custom_css .='@media screen and (max-width:575px) {';
		$vw_eco_nature_custom_css .='#sidebar{';
			$vw_eco_nature_custom_css .='display:none;';
		$vw_eco_nature_custom_css .='} }';
	}

	$vw_eco_nature_resp_scroll_top = get_theme_mod( 'vw_eco_nature_resp_scroll_top_hide_show',true);
	if($vw_eco_nature_resp_scroll_top == true && get_theme_mod( 'vw_eco_nature_hide_show_scroll',true) != true){
    	$vw_eco_nature_custom_css .='.scrollup i{';
			$vw_eco_nature_custom_css .='visibility:hidden !important;';
		$vw_eco_nature_custom_css .='} ';
	}
    if($vw_eco_nature_resp_scroll_top == true){
    	$vw_eco_nature_custom_css .='@media screen and (max-width:575px) {';
		$vw_eco_nature_custom_css .='.scrollup i{';
			$vw_eco_nature_custom_css .='visibility:visible !important;';
		$vw_eco_nature_custom_css .='} }';
	}else if($vw_eco_nature_resp_scroll_top == false){
		$vw_eco_nature_custom_css .='@media screen and (max-width:575px){';
		$vw_eco_nature_custom_css .='.scrollup i{';
			$vw_eco_nature_custom_css .='visibility:hidden !important;';
		$vw_eco_nature_custom_css .='} }';
	}

	$vw_eco_nature_resp_menu_toggle_btn_bg_color = get_theme_mod('vw_eco_nature_resp_menu_toggle_btn_bg_color');
	if($vw_eco_nature_resp_menu_toggle_btn_bg_color != false){
		$vw_eco_nature_custom_css .='.toggle-nav i{';
			$vw_eco_nature_custom_css .='background-color: '.esc_attr($vw_eco_nature_resp_menu_toggle_btn_bg_color).';';
		$vw_eco_nature_custom_css .='}';
	}

	/*------------- Top Bar Settings ------------------*/

	$vw_eco_nature_navigation_menu_font_size = get_theme_mod('vw_eco_nature_navigation_menu_font_size');
	if($vw_eco_nature_navigation_menu_font_size != false){
		$vw_eco_nature_custom_css .='.main-navigation a{';
			$vw_eco_nature_custom_css .='font-size: '.esc_attr($vw_eco_nature_navigation_menu_font_size).';';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_nav_menus_font_weight = get_theme_mod( 'vw_eco_nature_navigation_menu_font_weight','Default');
    if($vw_eco_nature_nav_menus_font_weight == 'Default'){
		$vw_eco_nature_custom_css .='.main-navigation a{';
			$vw_eco_nature_custom_css .='';
		$vw_eco_nature_custom_css .='}';
	}else if($vw_eco_nature_nav_menus_font_weight == 'Normal'){
		$vw_eco_nature_custom_css .='.main-navigation a{';
			$vw_eco_nature_custom_css .='font-weight: normal;';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_topbar_padding_top_bottom = get_theme_mod('vw_eco_nature_topbar_padding_top_bottom');
	if($vw_eco_nature_topbar_padding_top_bottom != false){
		$vw_eco_nature_custom_css .='.lower-header{';
			$vw_eco_nature_custom_css .='padding-top: '.esc_attr($vw_eco_nature_topbar_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_eco_nature_topbar_padding_top_bottom).';';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_header_menus_color = get_theme_mod('vw_eco_nature_header_menus_color');
	if($vw_eco_nature_header_menus_color != false){
		$vw_eco_nature_custom_css .='.main-navigation a{';
			$vw_eco_nature_custom_css .='color: '.esc_attr($vw_eco_nature_header_menus_color).';';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_header_menus_hover_color = get_theme_mod('vw_eco_nature_header_menus_hover_color');
	if($vw_eco_nature_header_menus_hover_color != false){
		$vw_eco_nature_custom_css .='.main-navigation a:hover{';
			$vw_eco_nature_custom_css .='color: '.esc_attr($vw_eco_nature_header_menus_hover_color).';';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_header_submenus_color = get_theme_mod('vw_eco_nature_header_submenus_color');
	if($vw_eco_nature_header_submenus_color != false){
		$vw_eco_nature_custom_css .='.main-navigation ul ul a{';
			$vw_eco_nature_custom_css .='color: '.esc_attr($vw_eco_nature_header_submenus_color).';';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_header_submenus_hover_color = get_theme_mod('vw_eco_nature_header_submenus_hover_color');
	if($vw_eco_nature_header_submenus_hover_color != false){
		$vw_eco_nature_custom_css .='.main-navigation ul.sub-menu a:hover{';
			$vw_eco_nature_custom_css .='color: '.esc_attr($vw_eco_nature_header_submenus_hover_color).';';
		$vw_eco_nature_custom_css .='}';
	}

	/*-------------- Sticky Header Padding ----------------*/

	$vw_eco_nature_sticky_header_padding = get_theme_mod('vw_eco_nature_sticky_header_padding');
	if($vw_eco_nature_sticky_header_padding != false){
		$vw_eco_nature_custom_css .='.header-fixed{';
			$vw_eco_nature_custom_css .='padding: '.esc_attr($vw_eco_nature_sticky_header_padding).';';
		$vw_eco_nature_custom_css .='}';
	}

	/*------------------ Search Settings -----------------*/
	
	$vw_eco_nature_search_padding_top_bottom = get_theme_mod('vw_eco_nature_search_padding_top_bottom');
	$vw_eco_nature_search_padding_left_right = get_theme_mod('vw_eco_nature_search_padding_left_right');
	$vw_eco_nature_search_font_size = get_theme_mod('vw_eco_nature_search_font_size');
	$vw_eco_nature_search_border_radius = get_theme_mod('vw_eco_nature_search_border_radius');
	if($vw_eco_nature_search_padding_top_bottom != false || $vw_eco_nature_search_padding_left_right != false || $vw_eco_nature_search_font_size != false || $vw_eco_nature_search_border_radius != false){
		$vw_eco_nature_custom_css .='.search-box i{';
			$vw_eco_nature_custom_css .='padding-top: '.esc_attr($vw_eco_nature_search_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_eco_nature_search_padding_top_bottom).';padding-left: '.esc_attr($vw_eco_nature_search_padding_left_right).';padding-right: '.esc_attr($vw_eco_nature_search_padding_left_right).';font-size: '.esc_attr($vw_eco_nature_search_font_size).';border-radius: '.esc_attr($vw_eco_nature_search_border_radius).'px; border: 1px solid #48b42a;';
		$vw_eco_nature_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$vw_eco_nature_button_padding_top_bottom = get_theme_mod('vw_eco_nature_button_padding_top_bottom');
	$vw_eco_nature_button_padding_left_right = get_theme_mod('vw_eco_nature_button_padding_left_right');
	if($vw_eco_nature_button_padding_top_bottom != false || $vw_eco_nature_button_padding_left_right != false){
		$vw_eco_nature_custom_css .='.more-btn a{';
			$vw_eco_nature_custom_css .='padding-top: '.esc_attr($vw_eco_nature_button_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_eco_nature_button_padding_top_bottom).';padding-left: '.esc_attr($vw_eco_nature_button_padding_left_right).';padding-right: '.esc_attr($vw_eco_nature_button_padding_left_right).';';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_button_border_radius = get_theme_mod('vw_eco_nature_button_border_radius');
	if($vw_eco_nature_button_border_radius != false){
		$vw_eco_nature_custom_css .='.more-btn a{';
			$vw_eco_nature_custom_css .='border-radius: '.esc_attr($vw_eco_nature_button_border_radius).'px;';
		$vw_eco_nature_custom_css .='}';
	}

	/*------------- Single Blog Page------------------*/

	$vw_eco_nature_featured_image_border_radius = get_theme_mod('vw_eco_nature_featured_image_border_radius', 0);
	if($vw_eco_nature_featured_image_border_radius != false){
		$vw_eco_nature_custom_css .='.box-image img, .feature-box img{';
			$vw_eco_nature_custom_css .='border-radius: '.esc_attr($vw_eco_nature_featured_image_border_radius).'px;';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_featured_image_box_shadow = get_theme_mod('vw_eco_nature_featured_image_box_shadow',0);
	if($vw_eco_nature_featured_image_box_shadow != false){
		$vw_eco_nature_custom_css .='.box-image img, .feature-box img, #content-vw img{';
			$vw_eco_nature_custom_css .='box-shadow: '.esc_attr($vw_eco_nature_featured_image_box_shadow).'px '.esc_attr($vw_eco_nature_featured_image_box_shadow).'px '.esc_attr($vw_eco_nature_featured_image_box_shadow).'px #cccccc;';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_single_blog_post_navigation_show_hide = get_theme_mod('vw_eco_nature_single_blog_post_navigation_show_hide',true);
	if($vw_eco_nature_single_blog_post_navigation_show_hide != true){
		$vw_eco_nature_custom_css .='.post-navigation{';
			$vw_eco_nature_custom_css .='display: none;';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_single_blog_comment_title = get_theme_mod('vw_eco_nature_single_blog_comment_title', 'Leave a Reply');
	if($vw_eco_nature_single_blog_comment_title == ''){
		$vw_eco_nature_custom_css .='#comments h2#reply-title {';
			$vw_eco_nature_custom_css .='display: none;';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_single_blog_comment_button_text = get_theme_mod('vw_eco_nature_single_blog_comment_button_text', 'Post Comment');
	if($vw_eco_nature_single_blog_comment_button_text == ''){
		$vw_eco_nature_custom_css .='#comments p.form-submit {';
			$vw_eco_nature_custom_css .='display: none;';
		$vw_eco_nature_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_eco_nature_footer_widgets_heading = get_theme_mod( 'vw_eco_nature_footer_widgets_heading','Left');
    if($vw_eco_nature_footer_widgets_heading == 'Left'){
		$vw_eco_nature_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
		$vw_eco_nature_custom_css .='text-align: left;';
		$vw_eco_nature_custom_css .='}';
	}else if($vw_eco_nature_footer_widgets_heading == 'Center'){
		$vw_eco_nature_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$vw_eco_nature_custom_css .='text-align: center; position:relative;';
		$vw_eco_nature_custom_css .='}';
		$vw_eco_nature_custom_css .='#footer h3:after, #footer .wp-block-search .wp-block-search__label:after{';
			$vw_eco_nature_custom_css .='right: 50%; position:absolute;';
		$vw_eco_nature_custom_css .='}';
	}else if($vw_eco_nature_footer_widgets_heading == 'Right'){
		$vw_eco_nature_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$vw_eco_nature_custom_css .='text-align: right; position:relative;';
		$vw_eco_nature_custom_css .='}';
		$vw_eco_nature_custom_css .='#footer h3:after, #footer .wp-block-search .wp-block-search__label:after{';
			$vw_eco_nature_custom_css .='right: 0%; position:absolute;';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_footer_widgets_content = get_theme_mod( 'vw_eco_nature_footer_widgets_content','Left');
    if($vw_eco_nature_footer_widgets_content == 'Left'){
		$vw_eco_nature_custom_css .='#footer .widget{';
		$vw_eco_nature_custom_css .='text-align: left;';
		$vw_eco_nature_custom_css .='}';
	}else if($vw_eco_nature_footer_widgets_content == 'Center'){
		$vw_eco_nature_custom_css .='#footer .widget{';
			$vw_eco_nature_custom_css .='text-align: center;';
		$vw_eco_nature_custom_css .='}';
	}else if($vw_eco_nature_footer_widgets_content == 'Right'){
		$vw_eco_nature_custom_css .='#footer .widget{';
			$vw_eco_nature_custom_css .='text-align: right;';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_footer_background_color = get_theme_mod('vw_eco_nature_footer_background_color');
	if($vw_eco_nature_footer_background_color != false){
		$vw_eco_nature_custom_css .='#footer{';
			$vw_eco_nature_custom_css .='background-color: '.esc_attr($vw_eco_nature_footer_background_color).';';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_copyright_font_size = get_theme_mod('vw_eco_nature_copyright_font_size');
	if($vw_eco_nature_copyright_font_size != false){
		$vw_eco_nature_custom_css .='.copyright p{';
			$vw_eco_nature_custom_css .='font-size: '.esc_attr($vw_eco_nature_copyright_font_size).';';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_copyright_alignment = get_theme_mod('vw_eco_nature_copyright_alignment');
	if($vw_eco_nature_copyright_alignment != false){
		$vw_eco_nature_custom_css .='.copyright p{';
			$vw_eco_nature_custom_css .='text-align: '.esc_attr($vw_eco_nature_copyright_alignment).';';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_copyright_padding_top_bottom = get_theme_mod('vw_eco_nature_copyright_padding_top_bottom');
	if($vw_eco_nature_copyright_padding_top_bottom != false){
		$vw_eco_nature_custom_css .='#footer-2{';
			$vw_eco_nature_custom_css .='padding-top: '.esc_attr($vw_eco_nature_copyright_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_eco_nature_copyright_padding_top_bottom).';';
		$vw_eco_nature_custom_css .='}';
	}

	/*----------------Sroll to top Settings ------------------*/

	$vw_eco_nature_scroll_to_top_font_size = get_theme_mod('vw_eco_nature_scroll_to_top_font_size');
	if($vw_eco_nature_scroll_to_top_font_size != false){
		$vw_eco_nature_custom_css .='.scrollup i{';
			$vw_eco_nature_custom_css .='font-size: '.esc_attr($vw_eco_nature_scroll_to_top_font_size).';';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_scroll_to_top_padding = get_theme_mod('vw_eco_nature_scroll_to_top_padding');
	$vw_eco_nature_scroll_to_top_padding = get_theme_mod('vw_eco_nature_scroll_to_top_padding');
	if($vw_eco_nature_scroll_to_top_padding != false){
		$vw_eco_nature_custom_css .='.scrollup i{';
			$vw_eco_nature_custom_css .='padding-top: '.esc_attr($vw_eco_nature_scroll_to_top_padding).';padding-bottom: '.esc_attr($vw_eco_nature_scroll_to_top_padding).';';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_scroll_to_top_width = get_theme_mod('vw_eco_nature_scroll_to_top_width');
	if($vw_eco_nature_scroll_to_top_width != false){
		$vw_eco_nature_custom_css .='.scrollup i{';
			$vw_eco_nature_custom_css .='width: '.esc_attr($vw_eco_nature_scroll_to_top_width).';';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_scroll_to_top_height = get_theme_mod('vw_eco_nature_scroll_to_top_height');
	if($vw_eco_nature_scroll_to_top_height != false){
		$vw_eco_nature_custom_css .='.scrollup i{';
			$vw_eco_nature_custom_css .='height: '.esc_attr($vw_eco_nature_scroll_to_top_height).';';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_scroll_to_top_border_radius = get_theme_mod('vw_eco_nature_scroll_to_top_border_radius');
	if($vw_eco_nature_scroll_to_top_border_radius != false){
		$vw_eco_nature_custom_css .='.scrollup i{';
			$vw_eco_nature_custom_css .='border-radius: '.esc_attr($vw_eco_nature_scroll_to_top_border_radius).'px;';
		$vw_eco_nature_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$vw_eco_nature_social_icon_font_size = get_theme_mod('vw_eco_nature_social_icon_font_size');
	if($vw_eco_nature_social_icon_font_size != false){
		$vw_eco_nature_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_eco_nature_custom_css .='font-size: '.esc_attr($vw_eco_nature_social_icon_font_size).';';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_social_icon_padding = get_theme_mod('vw_eco_nature_social_icon_padding');
	if($vw_eco_nature_social_icon_padding != false){
		$vw_eco_nature_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_eco_nature_custom_css .='padding: '.esc_attr($vw_eco_nature_social_icon_padding).';';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_social_icon_width = get_theme_mod('vw_eco_nature_social_icon_width');
	if($vw_eco_nature_social_icon_width != false){
		$vw_eco_nature_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_eco_nature_custom_css .='width: '.esc_attr($vw_eco_nature_social_icon_width).';';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_social_icon_height = get_theme_mod('vw_eco_nature_social_icon_height');
	if($vw_eco_nature_social_icon_height != false){
		$vw_eco_nature_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_eco_nature_custom_css .='height: '.esc_attr($vw_eco_nature_social_icon_height).';';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_social_icon_border_radius = get_theme_mod('vw_eco_nature_social_icon_border_radius');
	if($vw_eco_nature_social_icon_border_radius != false){
		$vw_eco_nature_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_eco_nature_custom_css .='border-radius: '.esc_attr($vw_eco_nature_social_icon_border_radius).'px;';
		$vw_eco_nature_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$vw_eco_nature_related_product_show_hide = get_theme_mod('vw_eco_nature_related_product_show_hide',true);
	if($vw_eco_nature_related_product_show_hide != true){
		$vw_eco_nature_custom_css .='.related.products{';
			$vw_eco_nature_custom_css .='display: none;';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_products_padding_top_bottom = get_theme_mod('vw_eco_nature_products_padding_top_bottom');
	if($vw_eco_nature_products_padding_top_bottom != false){
		$vw_eco_nature_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_eco_nature_custom_css .='padding-top: '.esc_attr($vw_eco_nature_products_padding_top_bottom).'!important; padding-bottom: '.esc_attr($vw_eco_nature_products_padding_top_bottom).'!important;';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_products_padding_left_right = get_theme_mod('vw_eco_nature_products_padding_left_right');
	if($vw_eco_nature_products_padding_left_right != false){
		$vw_eco_nature_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_eco_nature_custom_css .='padding-left: '.esc_attr($vw_eco_nature_products_padding_left_right).'!important; padding-right: '.esc_attr($vw_eco_nature_products_padding_left_right).'!important;';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_products_box_shadow = get_theme_mod('vw_eco_nature_products_box_shadow');
	if($vw_eco_nature_products_box_shadow != false){
		$vw_eco_nature_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$vw_eco_nature_custom_css .='box-shadow: '.esc_attr($vw_eco_nature_products_box_shadow).'px '.esc_attr($vw_eco_nature_products_box_shadow).'px '.esc_attr($vw_eco_nature_products_box_shadow).'px #ddd;';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_products_border_radius = get_theme_mod('vw_eco_nature_products_border_radius');
	if($vw_eco_nature_products_border_radius != false){
		$vw_eco_nature_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_eco_nature_custom_css .='border-radius: '.esc_attr($vw_eco_nature_products_border_radius).'px;';
		$vw_eco_nature_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$vw_eco_nature_products_padding_top_bottom = get_theme_mod('vw_eco_nature_products_padding_top_bottom');
	if($vw_eco_nature_products_padding_top_bottom != false){
		$vw_eco_nature_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_eco_nature_custom_css .='padding-top: '.esc_attr($vw_eco_nature_products_padding_top_bottom).'!important; padding-bottom: '.esc_attr($vw_eco_nature_products_padding_top_bottom).'!important;';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_products_padding_left_right = get_theme_mod('vw_eco_nature_products_padding_left_right');
	if($vw_eco_nature_products_padding_left_right != false){
		$vw_eco_nature_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_eco_nature_custom_css .='padding-left: '.esc_attr($vw_eco_nature_products_padding_left_right).'!important; padding-right: '.esc_attr($vw_eco_nature_products_padding_left_right).'!important;';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_products_box_shadow = get_theme_mod('vw_eco_nature_products_box_shadow');
	if($vw_eco_nature_products_box_shadow != false){
		$vw_eco_nature_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$vw_eco_nature_custom_css .='box-shadow: '.esc_attr($vw_eco_nature_products_box_shadow).'px '.esc_attr($vw_eco_nature_products_box_shadow).'px '.esc_attr($vw_eco_nature_products_box_shadow).'px #ddd;';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_products_border_radius = get_theme_mod('vw_eco_nature_products_border_radius', 0);
	if($vw_eco_nature_products_border_radius != false){
		$vw_eco_nature_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_eco_nature_custom_css .='border-radius: '.esc_attr($vw_eco_nature_products_border_radius).'px;';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_products_btn_padding_top_bottom = get_theme_mod('vw_eco_nature_products_btn_padding_top_bottom');
	if($vw_eco_nature_products_btn_padding_top_bottom != false){
		$vw_eco_nature_custom_css .='.woocommerce a.button{';
			$vw_eco_nature_custom_css .='padding-top: '.esc_attr($vw_eco_nature_products_btn_padding_top_bottom).' !important; padding-bottom: '.esc_attr($vw_eco_nature_products_btn_padding_top_bottom).' !important;';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_products_btn_padding_left_right = get_theme_mod('vw_eco_nature_products_btn_padding_left_right');
	if($vw_eco_nature_products_btn_padding_left_right != false){
		$vw_eco_nature_custom_css .='.woocommerce a.button{';
			$vw_eco_nature_custom_css .='padding-left: '.esc_attr($vw_eco_nature_products_btn_padding_left_right).' !important; padding-right: '.esc_attr($vw_eco_nature_products_btn_padding_left_right).' !important;';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_products_button_border_radius = get_theme_mod('vw_eco_nature_products_button_border_radius', 0);
	if($vw_eco_nature_products_button_border_radius != false){
		$vw_eco_nature_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
			$vw_eco_nature_custom_css .='border-radius: '.esc_attr($vw_eco_nature_products_button_border_radius).'px;';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_woocommerce_sale_position = get_theme_mod( 'vw_eco_nature_woocommerce_sale_position','right');
    if($vw_eco_nature_woocommerce_sale_position == 'left'){
		$vw_eco_nature_custom_css .='.woocommerce ul.products li.product .onsale{';
			$vw_eco_nature_custom_css .='left: -10px; right: auto;';
		$vw_eco_nature_custom_css .='}';
	}else if($vw_eco_nature_woocommerce_sale_position == 'right'){
		$vw_eco_nature_custom_css .='.woocommerce ul.products li.product .onsale{';
			$vw_eco_nature_custom_css .='left: auto; right: 0;';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_woocommerce_sale_font_size = get_theme_mod('vw_eco_nature_woocommerce_sale_font_size');
	if($vw_eco_nature_woocommerce_sale_font_size != false){
		$vw_eco_nature_custom_css .='.woocommerce span.onsale{';
			$vw_eco_nature_custom_css .='font-size: '.esc_attr($vw_eco_nature_woocommerce_sale_font_size).';';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_woocommerce_sale_padding_top_bottom = get_theme_mod('vw_eco_nature_woocommerce_sale_padding_top_bottom');
	if($vw_eco_nature_woocommerce_sale_padding_top_bottom != false){
		$vw_eco_nature_custom_css .='.woocommerce span.onsale{';
			$vw_eco_nature_custom_css .='padding-top: '.esc_attr($vw_eco_nature_woocommerce_sale_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_eco_nature_woocommerce_sale_padding_top_bottom).';';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_woocommerce_sale_padding_left_right = get_theme_mod('vw_eco_nature_woocommerce_sale_padding_left_right');
	if($vw_eco_nature_woocommerce_sale_padding_left_right != false){
		$vw_eco_nature_custom_css .='.woocommerce span.onsale{';
			$vw_eco_nature_custom_css .='padding-left: '.esc_attr($vw_eco_nature_woocommerce_sale_padding_left_right).'; padding-right: '.esc_attr($vw_eco_nature_woocommerce_sale_padding_left_right).';';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_woocommerce_sale_border_radius = get_theme_mod('vw_eco_nature_woocommerce_sale_border_radius', 0);
	if($vw_eco_nature_woocommerce_sale_border_radius != false){
		$vw_eco_nature_custom_css .='.woocommerce span.onsale{';
			$vw_eco_nature_custom_css .='border-radius: '.esc_attr($vw_eco_nature_woocommerce_sale_border_radius).'px;';
		$vw_eco_nature_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	// Site title Font Size
	$vw_eco_nature_site_title_font_size = get_theme_mod('vw_eco_nature_site_title_font_size');
	if($vw_eco_nature_site_title_font_size != false){
		$vw_eco_nature_custom_css .='.logo h1, .logo p.site-title{';
			$vw_eco_nature_custom_css .='font-size: '.esc_attr($vw_eco_nature_site_title_font_size).';';
		$vw_eco_nature_custom_css .='}';
	}

	// Site tagline Font Size
	$vw_eco_nature_site_tagline_font_size = get_theme_mod('vw_eco_nature_site_tagline_font_size');
	if($vw_eco_nature_site_tagline_font_size != false){
		$vw_eco_nature_custom_css .='.logo p.site-description{';
			$vw_eco_nature_custom_css .='font-size: '.esc_attr($vw_eco_nature_site_tagline_font_size).';';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_logo_padding = get_theme_mod('vw_eco_nature_logo_padding');
	if($vw_eco_nature_logo_padding != false){
		$vw_eco_nature_custom_css .='.logo{';
			$vw_eco_nature_custom_css .='padding: '.esc_attr($vw_eco_nature_logo_padding).';';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_logo_margin = get_theme_mod('vw_eco_nature_logo_margin');
	if($vw_eco_nature_logo_margin != false){
		$vw_eco_nature_custom_css .='.logo{';
			$vw_eco_nature_custom_css .='margin: '.esc_attr($vw_eco_nature_logo_margin).';';
		$vw_eco_nature_custom_css .='}';
	}

	/*------------------ Preloader Background Color  -------------------*/

	$vw_eco_nature_preloader_bg_color = get_theme_mod('vw_eco_nature_preloader_bg_color');
	if($vw_eco_nature_preloader_bg_color != false){
		$vw_eco_nature_custom_css .='#preloader{';
			$vw_eco_nature_custom_css .='background-color: '.esc_attr($vw_eco_nature_preloader_bg_color).';';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_preloader_border_color = get_theme_mod('vw_eco_nature_preloader_border_color');
	if($vw_eco_nature_preloader_border_color != false){
		$vw_eco_nature_custom_css .='.loader-line{';
			$vw_eco_nature_custom_css .='border-color: '.esc_attr($vw_eco_nature_preloader_border_color).'!important;';
		$vw_eco_nature_custom_css .='}';
	}