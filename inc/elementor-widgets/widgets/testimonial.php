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
class Kanox_Testimonial extends Widget_Base {

	public function get_name() {
		return 'kanox-testimonial';
	}

	public function get_title() {
		return __( 'Testimonial', 'kanox' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return [ 'kanox-elements' ];
	}

	protected function _register_controls() {

        // Testimonial Heading
		$this->start_controls_section(
			'section_heading',
			[
				'label' => __( 'Section Heading', 'kanox' ),
			]
		);
        $this->add_control(
            'sec_title',
            [
                'label'         => esc_html__( 'Title', 'kanox' ),
                'description'   => __( "Use < span> tag for color and italic word", "kanox" ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => __( 'Testimonials', 'kanox' )
            ]
        );
        $this->add_control(
            'sec_subtitle', [
                'label'         => esc_html__( 'Sub Title', 'kanox' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Client says about me', 'kanox' )
                                
            ]
        );
		$this->end_controls_section(); 

        // Intro Video
		$this->start_controls_section(
			'section_intro_vid',
			[
				'label' => __( 'Section Intro Video', 'kanox' ),
			]
		);
        $this->add_control(
            'intro_vid_title',
            [
                'label'         => esc_html__( 'Intro Video Text', 'dingo' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Watch intro video ', 'dingo' )
            ]
        );
        $this->add_control(
            'intro_vid_btnurl',
            [
                'label'         => esc_html__( 'Intro Video Url', 'dingo' ),
                'type'          => Controls_Manager::URL,
                'show_external' => false,
                'default' => [
					'url' => 'https://www.youtube.com/watch?v=pBFQdxA-apI',
					'is_external' => false,
					'nofollow' => true,
				],
            ]
        );
        // $this->add_control(
        //     'intro_vid_img',
        //     [
        //         'label'         => esc_html__( 'Intro Video BG Image', 'dingo' ),
        //         'type'          => Controls_Manager::MEDIA,
        //         'default'       => [
        //             'url'       => Utils::get_placeholder_image_src(),
        //         ]
        //     ]
        // );
		$this->end_controls_section(); 


		// ----------------------------------------  Customers review content ------------------------------
		$this->start_controls_section(
			'customersreview_content',
			[
				'label' => __( 'Customers Review', 'kanox' ),
			]
		);

		$this->add_control(
            'review_slider', [
                'label' => __( 'Create Review', 'kanox' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'client_img',
                        'label' => __( 'Client Image', 'kanox' ),
                        'type'  => Controls_Manager::MEDIA,
                    ],
                    [
                        'name'  => 'desc',
                        'label' => __( 'Descriptions', 'kanox' ),
                        'type'  => Controls_Manager::TEXTAREA,
                        'default'   => __('Own midst. Behold sea created male he together of That Said fourth deep abundantly have light night beginning rule darkness seed darkness which land saying
                        moveth. Fifth shall wont signs, can seasons green days gathered great', 'kanox')
                    ],
                    [
                        'name'  => 'client_logo',
                        'label' => __( 'Client Logo', 'kanox' ),
                        'type'  => Controls_Manager::MEDIA,
                    ],
                    [
                        'name'  => 'label',
                        'label' => __( 'Name', 'kanox' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__( 'Daniel E Gilcritst', 'kanox' )
                    ],
                    [
                        'name'  => 'designation',
                        'label' => __( 'Designation', 'kanox' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__( 'Manager, Vision', 'kanox' )
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
					'{{WRAPPER}} .review_part .section_tittle h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();


		$this->start_controls_section(
			'style_item',
			[
				'label' => __( 'Style Item', 'kanox' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
            'review_txt_color', [
                'label'     => __( 'Review Text Color', 'kanox' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#646464',
                'selectors' => [
                    '{{WRAPPER}} .review_part .client_review_text p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'testimonial_name_color', [
                'label'     => __( 'Client Name Color', 'kanox' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#112e41',
                'selectors' => [
                    '{{WRAPPER}} .review_part .client_review_text h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'testimonial_desc_color', [
                'label'     => __( 'Client Designation Color', 'kanox' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#112e41',
                'selectors' => [
                    '{{WRAPPER}} .review_part .client_review_text h5' => 'color: {{VALUE}};',
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
            'intro_vid_bg',
            [
                'label'     => __( 'Intro Video Background Settings', 'kanox' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'intro-video-bg',
                'label' => __( 'Intro Video Background', 'kanox' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .review_part .intro_video_bg',
            ]
        );

        $this->add_control(
            'section_bgheading',
            [
                'label'     => __( 'Section Background Settings', 'kanox' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'intro-video-section-bg',
                'label' => __( 'Section Background', 'kanox' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .review_part',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    // call load widget script
	$this->load_widget_script();
	$title = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $subTitle = !empty( $settings['sec_subtitle'] ) ? $settings['sec_subtitle'] : '';
    $intro_vid_title = !empty( $settings['intro_vid_title'] ) ? $settings['intro_vid_title'] : '';
    $intro_vid_url = !empty( $settings['intro_vid_btnurl']['url'] ) ? $settings['intro_vid_btnurl']['url'] : 'https://www.youtube.com/watch?v=pBFQdxA-apI';
    $reviews = !empty( $settings['review_slider'] ) ? $settings['review_slider'] : '';
    
    ?>

    <!--::review_part start::-->
    <section class="review_part padding_top">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-5">
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
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="intro_video_bg">
                        <div class="intro_video_iner text-center">
                            <div class="intro_video_icon">
                                <a id="play-video_1" class="video-play-button popup-youtube"
                                    href="<?php echo esc_url( $intro_vid_url )?>">
                                    <span class="ti-control-play"></span>
                                </a>
                            </div>
                            <p><?php echo esc_html( $intro_vid_title )?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-lg-5">
                    <div class="review_text_item">
                        <div class="row">
                            <div class="col-lg-7 col-sm-8">
                                <div class="owl-carousel owl-theme" id="sync2">
                                    <?php
                                    if( is_array( $reviews ) && count( $reviews ) > 0 ){
                                        foreach ($reviews as $review ) {
                                            $image = !empty( $review['client_img']['id'] ) ? wp_get_attachment_image( $review['client_img']['id'], 'kanox_review_client_img_160x160', '', array('class' => 'image','alt' => $review['label'] ) ) : '';
                                        ?>
                                    <div class="owl-thumb-item">
                                        <div class="slider-thumbnails">
                                            <?php
                                                if( $image ){
                                                    echo wp_kses_post( $image );
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
                            <div class="col-lg-12">
                                <div class="slider owl-carousel owl-theme" id="sync1">
                                    <?php
                                    if( is_array( $reviews ) && count( $reviews ) > 0 ){
                                        foreach ($reviews as $review ) {
                                            $image = !empty( $review['client_logo']['id'] ) ? wp_get_attachment_image( $review['client_logo']['id'], 'kanox_review_client_logo_115x68', '', array('class' => 'image','alt' => $review['label'] ) ) : '';
                                            $desc = !empty( $review['desc'] ) ? $review['desc'] : '';
                                            $cName = !empty( $review['label'] ) ? $review['label'] : '';
                                            $desig = !empty( $review['designation'] ) ? $review['designation'] : '';
                                    ?>
                                    <div class="client_review_text">
                                        <?php
                                            // Review text ---------------
                                            if( $desc ){
                                                echo '<p>'. wp_kses_post( $desc ) . '</p>';
                                            }

                                            // Client logo ---------------
                                            if( $image ){
                                                echo wp_kses_post( $image );
                                            }
                                        ?>
                                        <div class="client_info">
                                            <?php
                                                // Name ----------------------
                                                if( $cName ){
                                                    echo '<h3>'. esc_html( $cName ) .' </h3>';
                                                }

                                                // Designation ---------------
                                                if( $desig ){
                                                    echo '<h5>'. esc_html( $desig ) .'</h5>';
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::blog_part end::-->
    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            $(document).ready(function() {

                var sync1 = $("#sync1");
                var sync2 = $("#sync2");
                var slidesPerPage = 3; //globaly define number of elements per page
                var syncedSecondary = true;

                sync1.owlCarousel({
                    items: 1,
                    slideSpeed: 2000,
                    autoplay: true, 
                    dots: true,
                    responsiveRefreshRate: 200,
                    navText: true,
                
                }).on('changed.owl.carousel', syncPosition);

                sync2
                    .on('initialized.owl.carousel', function() {
                        sync2.find(".owl-item").eq(0).addClass("current");
                    })
                    .owlCarousel({
                        items: slidesPerPage,
                        dots: false,
                        smartSpeed: 200,
                        slideSpeed: 500,
                        margin: 0,
                        autoplay: true,
                        slideBy: 1, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
                        responsiveRefreshRate: 100,
                        nav: true,
                        navText:["<span class='flaticon-slim-left'></span>","<span class='flaticon-slim-right'></span>"],

                    }).on('changed.owl.carousel', syncPosition2);

                function syncPosition(el) {
                    var current = el.item.index;

                    sync2
                        .find(".owl-item")
                        .removeClass("current")
                        .eq(current)
                        .addClass("current");
                    var onscreen = sync2.find('.owl-item.active').length - 1;
                    var start = sync2.find('.owl-item.active').first().index();
                    var end = sync2.find('.owl-item.active').last().index();

                    if (current > end) {
                        sync2.data('owl.carousel').to(current, 100, true);
                    }
                    if (current < start) {
                        sync2.data('owl.carousel').to(current - onscreen, 100, true);
                    }
                }

                function syncPosition2(el) {
                    if (syncedSecondary) {
                        var number = el.item.index;
                        sync1.data('owl.carousel').to(number, 100, true);
                    }
                }

                sync2.on("click", ".owl-item", function(e) {
                    e.preventDefault();
                    var number = $(this).index();
                    sync1.data('owl.carousel').to(number, 300, true);
                });
            });
        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
