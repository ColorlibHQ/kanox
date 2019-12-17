<?php
namespace Kanoxelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
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
 * elementor projects section widget.
 *
 * @since 1.0
 */
class Kanox_projects extends Widget_Base {

	public function get_name() {
		return 'kanox-projects';
	}

	public function get_title() {
		return __( 'Recent Works', 'kanox' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'kanox-elements' ];
	}

	protected function _register_controls() {

        $this->start_controls_section(
			'section_heading',
			[
				'label' => __( 'Section Heading', 'kanox' ),
			]
        );
        
        $this->add_control(
            'sec_heading',
            [
                'label'         => esc_html__( 'Heading Text', 'kanox' ),
                'type'          => Controls_Manager::WYSIWYG,
                'default'       => __( '<p>recent work</p><h2>Creative work for client</h2>', 'kanox' )
            ]
        );
		$this->end_controls_section(); 


        // ----------------------------------------  Projects Content ------------------------------
        $this->start_controls_section(
            'menu_tab_sec',
            [
                'label' => __( 'Projects', 'kanox' ),
            ]
        );
        $this->add_control(
			'show_cat',
			[
				'label'         => __( 'Show Project Category', 'kanox' ),
				'type'          => Controls_Manager::SWITCHER,
				'label_on'      => __( 'Show', 'kanox' ),
				'label_off'     => __( 'Hide', 'kanox' ),
				'return_value'  => 'yes',
				'default'       => 'yes',
			]
		);
		$this->add_control(
			'excerpt_limit', [
				'label'         => esc_html__( 'Excerpt Limit', 'kanox' ),
				'type'          => Controls_Manager::NUMBER,
				'min'           => 1,
				'default'       => 28
			]
		);
		$this->add_control(
			'portfolio_number', [
				'label'         => esc_html__( 'Project Number', 'kanox' ),
				'type'          => Controls_Manager::NUMBER,
				'max'           => 5,
				'min'           => 1,
				'step'          => 1,
				'default'       => 3

			]
		);

        $this->end_controls_section(); // End projects content

        //------------------------------ Color Settings ------------------------------
        $this->start_controls_section(
            'color_settings', [
                'label' => __( 'Color Settings', 'kanox' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'sec_title_color', [
                'label'     => __( 'Section Title Color', 'kanox' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#112e41',
                'selectors' => [
                    '{{WRAPPER}} .our_latest_work .section_tittle h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'proj_title_color', [
                'label'     => __( 'Project Title Color', 'kanox' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#112e41',
                'selectors' => [
                    '{{WRAPPER}} .our_latest_work .single_work_demo h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'proj_text_color', [
                'label'     => __( 'Project Text Color', 'kanox' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#646464',
                'selectors' => [
                    '{{WRAPPER}} .our_latest_work .single_work_demo p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'learn_more_color', [
                'label'     => __( 'Learn More Color', 'kanox' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#112e41',
                'selectors' => [
                    '{{WRAPPER}} .our_latest_work .single_work_demo .btn_3' => 'color: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .our_latest_work',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    $sec_heading = !empty( $settings['sec_heading'] ) ? $settings['sec_heading'] : '';
    $show_cat = $settings['show_cat'];
    $excerpt_limit = $settings['excerpt_limit'];
    $pNumber = $settings['portfolio_number'];
    ?>

    <!-- portfolio start-->
    <section class="our_latest_work section_padding">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="section_tittle text-center">
                        <?php
                            //Section heading ==============
                            if( $sec_heading ){
                                echo wp_kses_post( wpautop( $sec_heading ) );
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?php
                        kanox_portfolio_section( $pNumber, $excerpt_limit, $show_cat );
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- portfolio part end-->
    <?php

    }
}
