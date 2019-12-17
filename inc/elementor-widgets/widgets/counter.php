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
 * Kanox elementor section widget.
 *
 * @since 1.0
 */
class Kanox_Counter extends Widget_Base {

	public function get_name() {
		return 'kanox-counter';
	}

	public function get_title() {
		return __( 'Counter', 'kanox' );
	}

	public function get_icon() {
		return 'eicon-countdown';
	}

	public function get_categories() {
		return [ 'kanox-elements' ];
	}

    public function kanox_get_svg_icon( $icon_name ){
        switch ( $icon_name ) {
            case 'cap':
                $icon_name = KANOX_DIR_ICON_IMG_URI .'cap.svg';
                break;
            case 'bag':
                $icon_name = KANOX_DIR_ICON_IMG_URI .'bag.svg';
                break;
            case 'shirt':
                $icon_name = KANOX_DIR_ICON_IMG_URI .'shirt.svg';
                break;
            
            default:
                $icon_name = KANOX_DIR_ICON_IMG_URI .'cafe.svg';
                break;
        }

        return $icon_name;
    }

	protected function _register_controls() {

		// ----------------------------------------  Customers review content ------------------------------
		$this->start_controls_section(
			'counter_label_content',
			[
				'label' => __( 'Counter Setting', 'kanox' ),
			]
		);

		$this->add_control(
            'counter_contents', [
                'label' => __( 'Create New', 'kanox' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ second_line }}}',
                'fields' => [
                    [
                        'name'      => 'icon_img',
                        'label'     => __( 'Counter Image', 'kanox' ),
                        'type'      => Controls_Manager::ICON,
                        'default'   => 'cap',
                        'options'   => kanox_themify_icon()
                    ],
                    [
                        'name'  => 'count_val',
                        'label' => __( 'Counter Value', 'kanox' ),
                        'type'  => Controls_Manager::NUMBER,
                        'label_block' => true,
                        'default' => 85
                    ],
                    [
                        'name'  => 'first_line',
                        'label' => __( 'First Line', 'kanox' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'Satisfied'
                    ],
                    [
                        'name'  => 'second_line',
                        'label' => __( 'Second Line', 'kanox' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'client'
                    ],
                    
                ],
            ]
		);

		$this->end_controls_section(); // End exibition content

        /**
         * Style Tab
         *
         */
		//------------------------------ Style Section ------------------------------
		
		$this->start_controls_section(
			'style_item',
			[
				'label' => __( 'Style Item', 'kanox' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
            'counter_color', [
                'label'     => __( 'Counter Text Color', 'kanox' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .happy_client .single_happy_client span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'text_color', [
                'label'     => __( 'Text Color', 'kanox' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .happy_client .single_happy_client h4' => 'color: {{VALUE}};',
                ],
            ]
        );

		$this->end_controls_section();



        /*------------------------------ Background Style ------------------------------*/
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
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .happy_client',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    // call load widget script
	$this->load_widget_script();
    $counter_contents = !empty( $settings['counter_contents'] ) ? $settings['counter_contents'] : '';
    ?>

    <!-- happy_client counter start -->
    <section class="happy_client">
        <div class="container">
            <div class="row">
                <?php
                if( is_array( $counter_contents ) && count( $counter_contents ) > 0 ){
                    foreach ($counter_contents as $counter ) {
                        $icon_img = !empty( $counter['icon_img'] ) ? $this->kanox_get_svg_icon( $counter['icon_img'] ) : '';
                        $count_val = !empty( $counter['count_val'] ) ? $counter['count_val'] : '';
                        $first_line = !empty( $counter['first_line'] ) ? $counter['first_line'] : '';
                        $second_line = !empty( $counter['second_line'] ) ? $counter['second_line'] : '';
                    ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_happy_client">
                        <?php
                            // Image ----------------------
                            if( $icon_img ){
                                echo '<img src="' . esc_url( $icon_img ) .'" alt="'. $first_line . ' ' . $second_line . '">';
                            }

                            // Count value ----------------------
                            if( $count_val ){
                                echo '<span class="counter">'. esc_html( $count_val ) .' </span>';
                            }

                            // First line ----------------------
                            if( $first_line ){
                                echo '<h4>'. esc_html( $first_line ) .' <br>';
                            }

                            // Second line ----------------------
                            if( $second_line ){
                                echo esc_html( $second_line ) .' </h4>';
                            }
                        ?>
                    </div>
                </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <!-- happy_client counter end -->
    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            $('.counter').counterUp({
                time: 2000
            });
        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
