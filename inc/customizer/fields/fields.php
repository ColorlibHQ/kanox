<?php 
/**
 * @Packge     : Kanox
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 * Customizer section fields
 *
 */

/***********************************
 * General Section Fields
 ***********************************/

 // Theme color field
Epsilon_Customizer::add_field(
    'kanox_theme_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Theme Color', 'kanox' ),
        'description' => esc_html__( 'Select the theme color.', 'kanox' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'kanox_general_section',
        'default'     => '#ff1481',
    )
);

 // Theme color field
Epsilon_Customizer::add_field(
    'kanox_theme_box_shadow_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Box Color', 'kanox' ),
        'description' => esc_html__( 'Select the theme color.', 'kanox' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'kanox_general_section',
        'default'     => 'rgba(190, 0, 88, 0.5)',
    )
);

 
// Header background color field
Epsilon_Customizer::add_field(
    'kanox_header_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Sticky Header BG Color', 'kanox' ),
        'description' => esc_html__( 'Select the header background color.', 'kanox' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'kanox_header_section',
        'default'     => '#e614ff',
    )
);

// Header nav menu color field
Epsilon_Customizer::add_field(
    'kanox_header_menu_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu color', 'kanox' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'kanox_header_section',
        'default'     => '#112e41',
    )
);

// Header nav menu hover color field
Epsilon_Customizer::add_field(
    'kanox_header_menu_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu hover color', 'kanox' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'kanox_header_section',
        'default'     => '#112e41',
    )
);

// Header dropdown menu color field
Epsilon_Customizer::add_field(
    'kanox_header_drop_menu_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu color', 'kanox' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'kanox_header_section',
        'default'     => '#ffffff',
    )
);

// Header dropdown menu hover color field
Epsilon_Customizer::add_field(
    'kanox_header_drop_menu_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu hover color', 'kanox' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'kanox_header_section',
        'default'     => '#ffffff',
    )
);


/***********************************
 * Blog Section Fields
 ***********************************/
 
// Post excerpt length field
Epsilon_Customizer::add_field(
    'kanox_excerpt_length',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Set post excerpt length', 'kanox' ),
        'description' => esc_html__( 'Set post excerpt length.', 'kanox' ),
        'section'     => 'kanox_blog_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => '30',
    )
);

// Blog single page social share icon
Epsilon_Customizer::add_field(
    'kanox_blog_meta',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog page post meta show/hide', 'kanox' ),
        'section'     => 'kanox_blog_section',
        'default'     => true
    )
);
Epsilon_Customizer::add_field(
    'kanox_like_btn',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog Single Page Like Button show/hide', 'kanox' ),
        'section'     => 'kanox_blog_section',
        'default'     => true
    )
);
Epsilon_Customizer::add_field(
    'kanox_blog_share',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog Single Page Share show/hide', 'kanox' ),
        'section'     => 'kanox_blog_section',
        'default'     => true
    )
);


/*==============================================
	Portfolio Section
 =============================================*/


Epsilon_Customizer::add_field(
	'kanox_portfolio_single_rp',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Project Recent Post Section show/hide', 'kanox' ),
		'section'     => 'kanox_portfolio_section',
		'default'     => true
	)
);
Epsilon_Customizer::add_field(
	'portfolio_recent_post_section_title',
	array(
		'type'              => 'text',
		'label'             => esc_html__( 'Recent Project Section Title ', 'kanox' ),
        'section'           => 'kanox_portfolio_section',
        'sanitize_callback' => 'sanitize_text_field',
		'default'           => esc_html__('Related Project', 'kanox')
	)
);
Epsilon_Customizer::add_field(
	'portfolio_recent_post_number',
	array(
		'type'              => 'number',
		'label'             => esc_html__( 'Recent Project Number', 'kanox' ),
		'section'           => 'kanox_portfolio_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => absint('3')
	)
);


/***********************************
 * 404 Page Section Fields
 ***********************************/

// 404 text #1 field
Epsilon_Customizer::add_field(
    'kanox_fof_titleone',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #1', 'kanox' ),
        'section'           => 'kanox_fof_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Say Hello.'
    )
);
// 404 text #2 field
Epsilon_Customizer::add_field(
    'kanox_fof_titletwo',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #2', 'kanox' ),
        'section'           => 'kanox_fof_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Say Hello.'
    )
);
// 404 text #1 color field
Epsilon_Customizer::add_field(
    'kanox_fof_textone_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #1 Color', 'kanox' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'kanox_fof_section',
        'default'     => '#000000',
    )
);
// 404 text #2 color field
Epsilon_Customizer::add_field(
    'kanox_fof_texttwo_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #2 Color', 'kanox' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'kanox_fof_section',
        'default'     => '#656565',
    )
);
// 404 background color field
Epsilon_Customizer::add_field(
    'kanox_fof_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Page Background Color', 'kanox' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'kanox_fof_section',
        'default'     => '#fff',
    )
);

/***********************************
 * Footer Section Fields
 ***********************************/

// Footer Widget section
Epsilon_Customizer::add_field(
    'footer_widget_separator',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Footer Widget Section', 'kanox' ),
        'section'     => 'kanox_footer_section',

    )
);

// Footer widget toggle field
Epsilon_Customizer::add_field(
    'kanox_footer_widget_toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Footer widget show/hide', 'kanox' ),
        'description' => esc_html__( 'Toggle to display footer widgets.', 'kanox' ),
        'section'     => 'kanox_footer_section',
        'default'     => true,
    )
);

// Footer Copyright section
Epsilon_Customizer::add_field(
    'kanox_footer_copyright_separator',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Footer Copyright Section', 'kanox' ),
        'section'     => 'kanox_footer_section',
        'default'     => true,

    )
);

// Footer copyright text field
// Copy right text
$url = 'https://colorlib.com/';
$copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'kanox' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );
Epsilon_Customizer::add_field(
    'kanox_footer_copyright_text',
    array(
        'type'        => 'epsilon-text-editor',
        'label'       => esc_html__( 'Footer copyright text', 'kanox' ),
        'section'     => 'kanox_footer_section',
        'default'     => wp_kses_post( $copyText ),
    )
);

// Footer widget background color field
Epsilon_Customizer::add_field(
    'kanox_footer_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Background Color', 'kanox' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'kanox_footer_section',
        'default'     => '#162b45',
    )
);

// Footer widget text color field
Epsilon_Customizer::add_field(
    'kanox_footer_widget_text_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Text Color', 'kanox' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'kanox_footer_section',
        'default'     => '#abb2ba',
    )
);

// Footer widget title color field
Epsilon_Customizer::add_field(
    'kanox_footer_widget_title_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Title Color', 'kanox' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'kanox_footer_section',
        'default'     => '#ffffff',
    )
);

// Footer widget anchor color field
Epsilon_Customizer::add_field(
    'kanox_footer_widget_anchor_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Anchor Color', 'kanox' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'kanox_footer_section',
        'default'     => '#ff1481',
    )
);

// Footer widget anchor hover color field
Epsilon_Customizer::add_field(
    'kanox_footer_widget_anchor_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Anchor Hover Color', 'kanox' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'kanox_footer_section',
        'default'     => '#ff1481',
    )
);

