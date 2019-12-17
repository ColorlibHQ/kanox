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
 * Kanox elementor Team Member section widget.
 *
 * @since 1.0
 */
class Kanox_Services extends Widget_Base {

	public function get_name() {
		return 'kanox-services';
	}

	public function get_title() {
		return __( 'Services', 'kanox' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'kanox-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Service Section ------------------------------
        $this->start_controls_section(
            'services_heading',
            [
                'label' => __( 'Service Heading', 'kanox' ),
            ]
        );
        $this->add_control(
            'service_header',
            [
                'label'         => esc_html__( 'Service Header', 'kanox' ),
                'description'   => esc_html__('Use <br> tag for line break', 'kanox'),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( '<p> Our Features</p><h1>Building brands with purpose</h1>', 'kanox' )
            ]
        );

        $this->end_controls_section(); // End section top content
        
		// ----------------------------------------   Services content ------------------------------
		$this->start_controls_section(
			'services_block',
			[
				'label' => __( 'Services', 'kanox' ),
			]
		);
		$this->add_control(
            'services_content', [
                'label' => __( 'Create Service', 'kanox' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'      => 'icon',
                        'label'     => __( 'Select Icon', 'kanox' ),
                        'type'      => Controls_Manager::ICON,
                        'default'   => 'fa fa-mobile',
                        'options'   => kanox_flaticon_list()
                    ],
                    [
                        'name'  => 'label',
                        'label' => __( 'Title', 'kanox' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Responsive Design', 'kanox' )
                    ],
                    [
                        'name'      => 'desc',
                        'label'     => __( 'Descriptions', 'kanox' ),
                        'type'      => Controls_Manager::TEXTAREA,
                        'default'   => __( 'Creeping for female light yea that lesser cand evening heaven isn\'t bearing tree appear', 'kanox' )
                    ],
                ],
            ]
        );

		$this->end_controls_section(); // End Services content

        /**
         * Style Tab
         * ------------------------------ Style Tab Content ------------------------------
         *
         */

        // Heading Style ==============================
        $this->start_controls_section(
            'color_sect', [
                'label' => __( 'Style Heading', 'kanox' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Title Color', 'kanox' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#112e41',
                'selectors' => [
                    '{{WRAPPER}} .cta_part .cta_part_iner .cta_part_text h1' => 'color: {{VALUE}};',
                ],
            ]
        );    
        
        $this->end_controls_section();

        // Single Service Color Settings ==============================
        $this->start_controls_section(
            'single_serv_color_sett', [
                'label' => __( 'Single Service Color Settings', 'kanox' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'icon_bg_color', [
                'label'     => __( 'Icon BG Color', 'kanox' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#586779',
                'selectors' => [
                    '{{WRAPPER}} .service_part .single_service_part_iner span' => 'background-color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'title_color', [
                'label'     => __( 'Title Color', 'kanox' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .service_part .single_service_part_iner h3' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'text_color', [
                'label'     => __( 'Text Color', 'kanox' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => 'rgba(255, 255, 255, 0.4)',
                'selectors' => [
                    '{{WRAPPER}} .service_part .single_service_part_iner p' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'section_separator',
            [
                'label'     => __( 'Hover Styles', 'kanox' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );  
        $this->add_control(
            'title_hover_color', [
                'label'     => __( 'Title Hover Color', 'kanox' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#112e41',
                'selectors' => [
                    '{{WRAPPER}} .service_part .single_service_part:hover .single_service_part_iner h3' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'text_hover_color', [
                'label'     => __( 'Text Hover Color', 'kanox' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#888888',
                'selectors' => [
                    '{{WRAPPER}} .service_part .single_service_part:hover .single_service_part_iner p' => 'color: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .service_part.section_bg_2',
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'section_single_bg', [
                'label' => __( 'Style Single Item Background', 'kanox' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'single_serv_bg',
                'label' => __( 'Single Service Background', 'kanox' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .service_part .single_service_part_iner',
            ]
        );

        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();
    $service_header = !empty( $settings['service_header'] ) ? $settings['service_header'] : '';
    $services = !empty( $settings['services_content'] ) ? $settings['services_content'] : '';
    ?>

    <!-- cta part start-->
    <section class="cta_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="cta_part_iner">
                        <div class="cta_part_text">
                            <?php
                                // Service Header =============
                                if( $service_header ){
                                    echo wp_kses_post( wpautop( $service_header ) );
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cta part end-->

    <!-- service_part part start-->
    <section class="service_part section_bg_2 section_padding">
        <div class="container">
            <div class="row">
                <?php
                if( is_array( $services ) && count( $services ) > 0 ){
                    foreach ( $services as $service ) {
                        $fontIcon      = !empty( $service['icon'] ) ? $service['icon'] : '';
                        $service_title = !empty( $service['label'] ) ? $service['label'] : '';
                        $service_desc  = !empty( $service['desc'] ) ? $service['desc'] : '';
                ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_service_part">
                        <div class="single_service_part_iner">
                            <!-- <span class="ti-mobile"></span> -->
                            <?php
                                if( $fontIcon ){
                                    echo '<span class="'. esc_attr( $fontIcon ) .'"></span>';
                                }
                            ?>
                            <h3><?php echo esc_html( $service_title );?></h3>
                            <p><?php echo esc_html( $service_desc );?></p>
                        </div>
                    </div>
                </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <!-- service_part part end-->
    <?php
    }
}
