<?php
namespace Kanoxelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;  
}


/**
 *
 * Kanox elementor about us section widget.
 *
 * @since 1.0
 */
class Kanox_Banner extends Widget_Base {

	public function get_name() {
		return 'kanox-banner';
	}

	public function get_title() {
		return __( 'Banner', 'kanox' );
	}

	public function get_icon() {
		return 'eicon-banner';
	}

	public function get_categories() {
		return [ 'kanox-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  content ------------------------------
        $this->start_controls_section(
            'banner_section',
            [
                'label' => __( 'Banner Section Content', 'kanox' ),
            ]
        );
        $this->add_control(
            'banner_content',
            [
                'label'         => esc_html__( 'Banner Content', 'kanox' ),
                'type'          => Controls_Manager::WYSIWYG,
                'default'       => __( '<h2>Think <span>Creative Turn</span></h2><h3>Ideas Into Life</h3>', 'kanox' )
            ]
        );
        $this->add_control(
            'banner_btnlabel',
            [
                'label'         => esc_html__( 'Button Label', 'kanox' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'learn more ', 'kanox' )
            ]
        );
        $this->add_control(
            'banner_btnurl',
            [
                'label'         => esc_html__( 'Button Url', 'kanox' ),
                'type'          => Controls_Manager::URL,
                'show_external' => false
            ]
        );

        $this->add_control(
			'banner_img',
			[
				'label'         => esc_html__( 'Select Image', 'kanox' ),
                'type'          => Controls_Manager::MEDIA,
                'default'       => [
                    'url'       => Utils::get_placeholder_image_src(),
                ]
			]
		);

        $this->end_controls_section(); // End content


        /**
         * Style Tab
         * ------------------------------ Background Style ------------------------------
         *
         */

        // Heading Style ==============================
        $this->start_controls_section(
            'color_sect', [
                'label' => __( 'Banner Heading Style', 'kanox' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Main Title Color', 'kanox' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#112e41',
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text h2' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'sub_title_color', [
                'label'     => __( 'Sub Title Color', 'kanox' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#112e41',
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->end_controls_section();

        // Background Style ==============================
        $this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'kanox' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'kanox' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .banner_part',
            ]
        );
        $this->end_controls_section();

        // Background Before Style ==============================
        $this->start_controls_section(
            'section_bg_before', [
                'label' => __( 'Style Background Before', 'kanox' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg_before',
                'label' => __( 'Background', 'kanox' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .banner_part:before',
            ]
        );
        $this->end_controls_section();

        // Background After Style ==============================
        $this->start_controls_section(
            'section_bg_after', [
                'label' => __( 'Style Background After', 'kanox' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg_after',
                'label' => __( 'Background', 'kanox' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .banner_part:after',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {
        $settings = $this->get_settings();
        $ban_content = !empty( $settings['banner_content'] ) ? $settings['banner_content'] : '';
        $button_label = !empty( $settings['banner_btnlabel'] ) ? $settings['banner_btnlabel'] : '';
        $button_url = !empty( $settings['banner_btnurl']['url'] ) ? $settings['banner_btnurl']['url'] : '';
        $banner_img  = !empty( $settings['banner_img']['id'] ) ? wp_get_attachment_image( $settings['banner_img']['id'], 'kanox_banner_img_555x528', false, array( 'alt' => 'banner image' ) ) : '';
        $icon_path_1 = KANOX_DIR_ASSETS_URI .'img/animate_icon/icon_1.png';
        $icon_path_2 = KANOX_DIR_ASSETS_URI .'img/animate_icon/icon_2.png';
        $icon_path_3 = KANOX_DIR_ASSETS_URI .'img/animate_icon/icon_3.png';
        $icon_path_4 = KANOX_DIR_ASSETS_URI .'img/animate_icon/icon_4.png';
    ?>

    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-6 col-md-6">
                    <div class="banner_text">
                        <div class="banner_text_iner text-center">
                            <?php
                                //Content ==============
                                if( $ban_content ){
                                    echo wp_kses_post( wpautop( $ban_content ) );
                                }
                                // Button =============
                                if( $button_label ){
                                    echo '<a class="btn_1" href="'. esc_url( $button_url ) .'">'. esc_html( $button_label ) .'  <i class="ti-angle-right"></i>  </a>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="banner_bg">
                        <?php
                            if( $banner_img ){
                                echo wp_kses_post( $banner_img );
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-app-1 custom-animation"><img src="<?php echo esc_url( $icon_path_1 );?>" alt="Icon 1"></div>
        <div class="hero-app-5 custom-animation2"><img src="<?php echo esc_url( $icon_path_2 );?>" alt="Icon 2"></div>
        <div class="hero-app-7 custom-animation3"><img src="<?php echo esc_url( $icon_path_3 );?>" alt="Icon 3"></div>
        <div class="hero-app-8 custom-animation"><img src="<?php echo esc_url( $icon_path_4 );?>" alt="Icon 4"></div>
    </section>
    <!-- banner part end-->        
        <?php

    }
	
}
