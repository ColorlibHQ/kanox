<?php
// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit( 'Direct script access denied.' );
} 
/**
 * @Packge     : KANOX
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
 
// enqueue css
function kanox_common_custom_css(){
    
    wp_enqueue_style( 'kanox-common', get_template_directory_uri().'/assets/css/dynamic.css' );
		$header_bg         		  = esc_url( get_header_image() );
		$header_bg_img 			  = !empty( $header_bg ) ? 'background-image: url('.esc_url( $header_bg ).')' : '';

		$themeColor     		  = kanox_opt( 'kanox_theme_color' );
		$boxShadowColor    		  = kanox_opt( 'kanox_theme_box_shadow_color' );

		$buttonBorderColor     	  = kanox_opt( 'kanox_button_border_color' );
		$hoverColor     	  	  = kanox_opt( 'kanox_hover_color');

		$headerTop_bg     		  = kanox_opt( 'kanox_top_header_bg_color' );
		$headerTop_col     		  = kanox_opt( 'kanox_top_header_color' );

		$headerBg          		  = kanox_opt( 'kanox_header_bg_color');
		$menuColor          	  = kanox_opt( 'kanox_header_menu_color' );
		$menuHoverColor           = kanox_opt( 'kanox_header_menu_hover_color' );
		$dropMenuColor            = kanox_opt( 'kanox_header_drop_menu_color' );
		$dropMenuHovColor         = kanox_opt( 'kanox_header_drop_menu_hover_color' );


		$footerwbgColor     	  = kanox_opt('kanox_footer_bg_color');
		$footerwTextColor   	  = kanox_opt('kanox_footer_widget_text_color') != '#abb2ba' ? kanox_opt('kanox_footer_widget_text_color') : '';
		$widgettitlecolor  		  = kanox_opt('kanox_footer_widget_title_color');
		$footerwanchorcolor 	  = kanox_opt('kanox_footer_widget_anchor_color');
		$footerwanchorhovcolor    = kanox_opt('kanox_footer_widget_anchor_hover_color');


		$customcss ="
			.hero-banner{
				{$header_bg_img}
			}
			
			.btn_2
			{
				border-color: {$buttonBorderColor};
			}

			.cta_part .cta_part_iner .cta_part_text p, .about_part .about_text h5, .section_tittle p, .our_latest_work .single_work_demo h5, .blog_part .single-home-blog .card h5:hover, .blog_part .single-home-blog .card ul li i
			{
				color: {$themeColor}
			}			
			.our_latest_work .single_work_demo .btn_3:hover, .team_member_section .single_team_member .single_team_text h3 a:hover, .team_member_section .single_team_member .team_member_social_icon a:hover, .blog_part .single-home-blog .card .card-body a:hover, .pre_icon a:hover, .next_icon a:hover, .review_part .section_tittle p, .blog_part .section_tittle p, .banner-breadcrumb > ol > li.breadcrumb-item > a.bread-link:hover, .review_part .section_tittle p, .banner-breadcrumb .breadcrumb-item a:hover, .blog_details a:hover, .blog_right_sidebar .widget_categories ul li:hover, .blog_right_sidebar .widget_categories ul li:hover a, .blog_right_sidebar .widget_categories ul li a:hover{
				color: {$themeColor}!important;
			}

			.btn_1, .review_part .intro_video_bg .video-play-button, .review_part .owl-prev span:after, .review_part .owl-next span:after, .review_part .intro_video_bg .video-play-button:after, .review_part .intro_video_bg .video-play-button:before, .review_part .intro_video_bg .video-play-button:hover:after, .blog_item_img .blog_item_date, .button, .single_sidebar_widget .tagcloud a:hover, .blog_right_sidebar .single_sidebar_widget.widget_kanox_newsletter .btn, .pre_icon :after, .next_icon :after
			{
				background: {$themeColor}
			}

			.service_part .single_service_part:hover .single_service_part_iner span
			{
				background: {$themeColor}!important;
			}

			.btn_2:hover,
			.copyright_part .footer-social a:hover
			{
				background: {$hoverColor}!important;
			}

			.blog_part .single-home-blog .card h5:hover
			{
				color: {$hoverColor};
			}

			.about_part .about_img h2:after, .copyright_part .footer-social a
			{
				border-color: {$themeColor}
			}
			.btn_1:hover {
				box-shadow: 0px 10px 30px {$boxShadowColor};
			}


			.sub_header{
				background: {$headerTop_bg}
			}
			.sub_header .sub_header_social_icon a,
			.sub_header .sub_header_social_icon .register_icon
			{
				color: {$headerTop_col}
			}

			.main_menu.menu_fixed, .dropdown .dropdown-menu, .dropdown .dropdown-menu .dropdown-item
			{
				background: {$headerBg};
			}
			.main_menu .main-menu-item ul li a
			{
			   color: {$menuColor}!important;
			}
			.main_menu .main-menu-item ul li a:hover
			{
			   color: {$menuHoverColor}!important;
			}
			
			.dropdown .dropdown-menu .dropdown-item
			{
			   color: {$dropMenuColor}!important;
			}
			.dropdown .dropdown-menu .dropdown-item:hover
			{
			   color: {$dropMenuHovColor}!important;
			}

			.footer-area {
				background-color: {$footerwbgColor};
			}

			.footer-area .single-footer-widget p, .footer-area .widget_kanox_newsletter .input-group input, .footer-area .copyright_part_text p, .footer-area .footer_2 .social_icon a
			{
				color: {$footerwTextColor}
			}
			.footer-area .widget_kanox_newsletter .input-group, .footer-area .copyright_part_text {
				border-color: {$footerwTextColor}
			}
			.footer-area .single-footer-widget h4
			{
				color: {$widgettitlecolor}
			}

			.footer-area .copyright_part_text a
			{
			   color: {$footerwanchorcolor};
			}
			.footer-area .btn{
				background: {$footerwanchorcolor};
			}
			.footer-area .copyright_part_text a:hover, .footer-area .footer_2 .social_icon a:hover
			{
			   color: {$footerwanchorhovcolor}!important;
			}

        ";
       
    wp_add_inline_style( 'kanox-common', $customcss );
    
}
add_action( 'wp_enqueue_scripts', 'kanox_common_custom_css', 50 );