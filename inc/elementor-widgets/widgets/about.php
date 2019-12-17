<?php
namespace Kanoxelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *
 * Kanox elementor section widget.
 *
 * @since 1.0
 */
class Kanox_About extends Widget_Base {

	public function get_name() {
		return 'kanox-about';
	}

	public function get_title() {
		return __( 'About', 'kanox' );
	}

	public function get_icon() {
		return 'eicon-thumbnails-half';
	}

	public function get_categories() {
		return [ 'kanox-elements' ];
	}

	protected function _register_controls() {

        
		// ----------------------------------------  About content ------------------------------
		$this->start_controls_section(
			'about_content',
			[
				'label' => __( 'About Section', 'kanox' ),
			]
		);
        
        $this->add_control(
			'about_img',
			[
				'label'         => esc_html__( 'Select Image', 'kanox' ),
                'type'          => Controls_Manager::MEDIA,
                'default'       => [
                    'url'       => Utils::get_placeholder_image_src(),
                ]
			]
		);
        $this->add_control(
            'left_text',
            [
                'label'         => esc_html__( 'Left Text', 'kanox' ),
                'description'   => esc_html__('Use <br> tag for line break', 'kanox'),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( '<h2>25 Years Working <br> Experience</h2>', 'kanox' )
            ]
        );
        $this->add_control(
            'content',
            [
                'label'         => esc_html__( 'Content', 'kanox' ),
                'description'   => esc_html__('Use <br> tag for line break', 'kanox'),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( '<h5>About our company</h5><h2>Make the customer the hero of your story</h2><h4>He hath his earth firmament air very itself light day moring morning you living saying good above fourth</h4><p>Meat abundantly life made fly years there whose beginning crea unto beast sixth herb their bring. Evening fruitful god you spir evning itself land you of of own brought </p>', 'kanox' )
            ]
        );
        $this->add_control(
            'btnlabel',
            [
                'label'         => esc_html__( 'Button Label', 'kanox' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'learn more ', 'kanox' )
            ]
        );
        $this->add_control(
            'btnurl',
            [
                'label'         => esc_html__( 'Button Url', 'kanox' ),
                'type'          => Controls_Manager::URL,
                'show_external' => false
            ]
        );
		$this->end_controls_section(); // End about content

        // Color Settings ==============================
        $this->start_controls_section(
            'color_sect', [
                'label' => __( 'Color Settings', 'kanox' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
		$this->add_control(
			'left_title', [
				'label'     => __( 'Left Title Color', 'kanox' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#112e41',
				'selectors' => [
					'{{WRAPPER}} .about_part .about_img h2' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'right_bigger_title', [
				'label'     => __( 'Right Bigger Title Color', 'kanox' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#112e41',
				'selectors' => [
					'{{WRAPPER}} .about_part .about_text h2' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'right_secondary_title', [
				'label'     => __( 'Right Secondary Title Color', 'kanox' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#112e41',
				'selectors' => [
					'{{WRAPPER}} .about_part .about_text h4' => 'color: {{VALUE}}!important;',
				],
			]
        );
        
		$this->add_control(
			'right_paragraph', [
				'label'     => __( 'Right Paragraph Color', 'kanox' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#646464',
				'selectors' => [
					'{{WRAPPER}} .about_part .about_text p' => 'color: {{VALUE}};',
				],
			]
		);
        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Background Style ------------------------------
         *
         */
        $this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'kanox' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
            'section_bgheading',
            [
                'label'     => __( 'Background Settings', 'kanox' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'kanox' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .about_part',
            ]
        );

        $this->end_controls_section();


	}

	protected function render() {
        $settings     = $this->get_settings();
        $content      = !empty( $settings['content'] ) ? $settings['content'] : '';
        $left_text    = !empty( $settings['left_text'] ) ? $settings['left_text'] : '';
        $button_label = !empty( $settings['btnlabel'] ) ? $settings['btnlabel'] : '';
        $button_url   = !empty( $settings['btnurl']['url'] ) ? $settings['btnurl']['url'] : '';

		$feature_img  = !empty( $settings['about_img']['id'] ) ? wp_get_attachment_image( $settings['about_img']['id'], 'kanox_about_section_847x619', false, array( 'alt' => 'about image' ) ) : '';
        $icon_path_4 = KANOX_DIR_ASSETS_URI .'img/animate_icon/icon_4.png';
        $icon_path_5 = KANOX_DIR_ASSETS_URI .'img/animate_icon/icon_5.png';
        $icon_path_7 = KANOX_DIR_ASSETS_URI .'img/animate_icon/icon_7.png';
        ?>

    <!-- about part start-->
    <section class="about_part">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6 p-0">
                    <div class="about_img">
                        <?php
                            if( $feature_img ){
                                echo wp_kses_post( $feature_img );
                            }
                            if( $left_text ){
                                echo $left_text;
                            }
                        ?>
                    </div>
                </div>
                <div class="offset-lg-1 col-lg-4">
                    <div class="about_text">
                        <?php
                            //Content ==============
                            if( $content ){
                                echo wp_kses_post( wpautop( $content ) );
                            }
                            // Button =============
                            if( $button_label ){
                                echo '<a class="btn_1" href="'. esc_url( $button_url ) .'">'. esc_html( $button_label ) .' <i class="ti-angle-right"></i> </a>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-app-7 custom-animation"><img src="<?php echo esc_url( $icon_path_7 );?>" alt="Icon image 7"></div>
        <div class="hero-app-8 custom-animation2"><img src="<?php echo esc_url( $icon_path_4 );?>" alt="Icon image 4"></div>
        <div class="hero-app-6 custom-animation3"><img src="<?php echo esc_url( $icon_path_5 );?>" alt="Icon image 5"></div>
    </section>
    <!-- about part start-->
    <?php

    }

}
