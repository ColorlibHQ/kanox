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
 * Kanox elementor few words section widget.
 *
 * @since 1.0
 */

class Kanox_Blog extends Widget_Base {

	public function get_name() {
		return 'kanox-blog';
	}

	public function get_title() {
		return __( 'Blog', 'kanox' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	public function get_categories() {
		return [ 'kanox-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  Blog content ------------------------------
        $this->start_controls_section(
            'blog_content',
            [
                'label' => __( 'Latest Blog Post', 'kanox' ),
            ]
        );
		$this->add_control(
			'sec_title',
			[
				'label'         => esc_html__( 'Title', 'kanox' ),
				'description'   => __( "Use < span> tag for color and italic word", "kanox" ),
				'type'          => Controls_Manager::TEXT,
				'label_block'   => true,
				'default'       => __( 'Latest news', 'kanox' )
			]
		);
		$this->add_control(
			'sec_subtitle', [
				'label'         => esc_html__( 'Sub Title', 'kanox' ),
				'type'          => Controls_Manager::TEXT,
				'label_block'   => true,
				'default'       => esc_html__( 'We Have True Story', 'kanox' )

			]
		);

        $this->end_controls_section(); // End few words content

        //------------------------------ Style Section ------------------------------
        $this->start_controls_section(
            'style_section', [
                'label' => __( 'Style Section Heading', 'kanox' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Section Title Color', 'kanox' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#112e41',
                'selectors' => [
                    '{{WRAPPER}} .blog_part .section_tittle h2' => 'color: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .blog_part',
            ]
        );

        $this->end_controls_section();
	}

	protected function render() {

    $settings  = $this->get_settings();
    $title = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $subTitle = !empty( $settings['sec_subtitle'] ) ? $settings['sec_subtitle'] : '';
    ?>

    <!--::blog_part start::-->
    <section class="blog_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <?php
                            if( $title ){
                                echo '<p>'. wp_kses_post( $title ) .'</p>';
                            }
                            if( $subTitle ){
                                echo '<h2>'. esc_html( $subTitle ) .'</h2>';
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php
                    if( function_exists( 'kanox_latest_blog' ) ) {
                        kanox_latest_blog();
                    }
                ?>
            </div>
        </div>
    </section>
    <!--::blog_part end::-->
    <?php
	}
}
