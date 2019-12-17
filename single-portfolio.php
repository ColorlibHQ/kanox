<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package kanox
 */

get_header();
$project_start_time  = kanox_meta( 'project_start_time' );
$project_start_date  = kanox_meta( 'project_start_date' );
$project_end_time    = kanox_meta( 'project_end_time' );
$project_end_date    = kanox_meta( 'project_end_date' );
$project_location    = kanox_meta( 'project_location' );

?>

    <!-- project_details part start -->
    <section class="project_details padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <?php
                        if ( has_post_thumbnail() ) {
                    ?>
                        <div class="project_details_img">
                            <?php
                                the_post_thumbnail( 'kanox_single_project_970x520', array( 'alt' => get_the_title() ) );
                            ?>
                        </div>
                    <?php
                        }

                        // Post navigation
                        kanox_portfolio_single_post_navigation();
                    ?>
                </div>

                <?php
                    if( have_posts() ) {
                        while( have_posts() ) : the_post();
                ?>
                    <div class="col-lg-4 col-sm-12">
                        <div class="project_details_content">
                            <h3><?php the_title()?></h3>
                            <?php the_content()?>
                        </div>
                        <div class="project_details_widget">
                            <div class="single_project_details_widget">
                                <span class="ti-time"></span>
                                <?php 
                                    echo '<h5>'. esc_html__( 'Start Time', 'kanox' ) . '</h5>';
                                    
                                    if( !empty( $project_start_time ) ){
                                        echo '<p>'. esc_html( $project_start_time ) . '</p>';
                                    }
                                    
                                    if( !empty( $project_start_date ) ){
                                        echo '<h6>'. esc_html( $project_start_date ) . '</h6>';
                                    }
                                ?>
                            </div>
                            <div class="single_project_details_widget">
                                <span class="ti-check-box"></span>
                                <?php 
                                    echo '<h5>'. esc_html__( 'End Time', 'kanox' ) . '</h5>';
                                    
                                    if( !empty( $project_end_time ) ){
                                        echo '<p>'. esc_html( $project_end_time ) . '</p>';
                                    }
                                    
                                    if( !empty( $project_end_date ) ){
                                        echo '<h6>'. esc_html( $project_end_date ) . '</h6>';
                                    }
                                ?>
                            </div>
                            <div class="single_project_details_widget">
                                <span class="ti-location-pin"></span>
                                <?php 
                                    echo '<h5>'. esc_html__( 'Location', 'kanox' ) . '</h5>';
                                    
                                    if( !empty( $project_location ) ){
                                        echo '<p>'. esc_html( $project_location ) . '</p>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    endwhile;
                    }
                ?>
            </div>
        </div>
    </section>
    <!-- project_details part end -->

    <?php
    if( kanox_opt('kanox_portfolio_single_rp') == 1 ) {
	    // Portfolio Recent Post
	    if ( function_exists( 'kanox_recent_portfolio' ) ) {
		    kanox_recent_portfolio();
	    }
    }


// Footer============
get_footer();