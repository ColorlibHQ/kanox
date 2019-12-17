<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package
 */

    $url = 'https://colorlib.com/';
    $copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'kanox' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );
    $copyRight = !empty( kanox_opt( 'kanox_footer_copyright_text' ) ) ? kanox_opt( 'kanox_footer_copyright_text' ) : $copyText;
    $footer_class = kanox_opt( 'kanox_footer_widget_toggle' ) == 1 ? 'footer-area' : 'no_widget';

    ?>

    <!-- footer part start-->
    
    <footer class="footer-area">
        <?php
            if( kanox_opt( 'kanox_footer_widget_toggle' ) == 1 ) {
        ?>
        <div class="container">
            <div class="row justify-content-between">
                <?php
                    // Footer Widget 1
                    if ( is_active_sidebar( 'footer-1' ) ) {
                        dynamic_sidebar( 'footer-1' );
                    }

                    // Footer Widget 2
                    if ( is_active_sidebar( 'footer-2' ) ) {
                        echo '<div class="col-sm-6 col-md-6 col-xl-4">';
                            dynamic_sidebar( 'footer-2' );
                        echo '</div>';
                    }

                    // Footer Widget 3
                    if ( is_active_sidebar( 'footer-3' ) ) {
                        dynamic_sidebar( 'footer-3' );
                    }
                ?>
            </div>
        </div>
        <?php
            } 
        ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright_part_text text-center">
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="footer-text m-0"><?php echo wp_kses_post( $copyRight ); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
    </body>
</html>