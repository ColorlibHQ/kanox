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
class Kanox_Team_Member extends Widget_Base {

	public function get_name() {
		return 'kanox-team-member';
	}

	public function get_title() {
		return __( 'Team Member', 'kanox' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'kanox-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Team Section ------------------------------
        $this->start_controls_section(
            'team_heading',
            [
                'label' => __( 'Team Heading', 'kanox' ),
            ]
        );
        $this->add_control(
            'team_header',
            [
                'label'         => esc_html__( 'Team Header', 'kanox' ),
                'description'   => esc_html__('Use <br> tag for line break', 'kanox'),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( '<p>Team Member</p><h2>Talest & Experienced Team</h2>', 'kanox' )
            ]
        );

        $this->end_controls_section(); // End section top content
        
		// ----------------------------------------   Teams content ------------------------------
		$this->start_controls_section(
			'teams_block',
			[
				'label' => __( 'Teams', 'kanox' ),
			]
		);
		$this->add_control(
            'teams_content', [
                'label' => __( 'Create Team', 'kanox' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'image',
                        'label' => __( 'Member Image', 'kanox' ),
                        'type'  => Controls_Manager::MEDIA,
                    ],
                    [
                        'name'  => 'label',
                        'label' => __( 'Name', 'kanox' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Jhosef Williams', 'kanox' )
                    ],
                    [
                        'name'      => 'desg',
                        'label'     => __( 'Designation', 'kanox' ),
                        'type'      => Controls_Manager::TEXT,
                        'default'   => __( 'Web developer', 'kanox' )
                    ],
                    [
                        'name'      => 'fb',
                        'label'     => __( 'Facebook URL', 'kanox' ),
                        'type'      => Controls_Manager::URL,
                        'show_external' => false,
                        'default'   => [
                            'url'   => '#',
                        ]
                    ],
                    [
                        'name'      => 'tw',
                        'label'     => __( 'Twitter URL', 'kanox' ),
                        'type'      => Controls_Manager::URL,
                        'show_external' => false,
                        'default'   => [
                            'url'   => '#',
                        ]
                    ],
                    [
                        'name'      => 'skp',
                        'label'     => __( 'Skype URL', 'kanox' ),
                        'type'      => Controls_Manager::URL,
                        'show_external' => false,
                        'default'   => [
                            'url'   => '#',
                        ]
                    ],
                ],
            ]
        );

		$this->end_controls_section(); // End Teams content

        /**
         * Style Tab
         * ------------------------------ Style Tab Content ------------------------------
         *
         */

        // Heading Style ==============================
        $this->start_controls_section(
            'color_sect', [
                'label' => __( 'Style Team Heading', 'kanox' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Team Left Title Color', 'kanox' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#112e41',
                'selectors' => [
                    '{{WRAPPER}} section.cta_part .cta_part_text h2' => 'color: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .team_member_section',
            ]
        );

        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();
    $team_header = !empty( $settings['team_header'] ) ? $settings['team_header'] : '';
    $teams = !empty( $settings['teams_content'] ) ? $settings['teams_content'] : '';
    ?>

    <!-- cta part start-->
    <section class="cta_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="cta_part_iner">
                        <div class="cta_part_text">
                            <?php
                                // Team Header =============
                                if( $team_header ){
                                    echo wp_kses_post( wpautop( $team_header ) );
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cta part end-->
    <!-- team_member part start-->
    <section class="team_member_section section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <?php
                if( is_array( $teams ) && count( $teams ) > 0 ){
                    foreach ( $teams as $team ) {
                        $team_img   = !empty( $team['image']['id'] ) ? wp_get_attachment_image( $team['image']['id'], 'kanox_team_img_320x309', false, array( 'alt' => $team['label'] ) ) : '';
                        $name       = !empty( $team['label'] ) ? $team['label'] : '';
                        $desig      = !empty( $team['desg'] ) ? $team['desg'] : '';
                        $fb         = !empty( $team['fb']['url'] ) ? $team['fb']['url'] : '';
                        $tw         = !empty( $team['tw']['url'] ) ? $team['tw']['url'] : '';
                        $skp        = !empty( $team['skp']['url'] ) ? $team['skp']['url'] : '';
                ?>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_team_member">
                        <?php
                            if( $team_img ){
                                echo wp_kses_post( $team_img );
                            }
                        ?>
                        <div class="single_team_text">
                            <h3><a href="#"> <?php echo esc_html( $name );?></a></h3>
                            <p><?php echo esc_html( $desig );?></p>
                            <div class="team_member_social_icon">
                                <a href="<?php echo esc_url( $fb );?>"><?php echo esc_html( 'facebook', 'kanox' );?></a>
                                <a href="<?php echo esc_url( $tw );?>"><?php echo esc_html( 'twitter', 'kanox' );?></a>
                                <a href="<?php echo esc_url( $skp );?>"><?php echo esc_html( 'skype', 'kanox' );?></a>
                            </div>
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
    <!-- team_member part end-->
    <?php
    }
}
