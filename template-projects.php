<?php 
/**
 * @Packge 	   : Kanox
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 *
 * Template Name: Projects Page
 */
 
get_header();

?>

<!-- portfolio start-->
<section class="our_latest_work section_padding">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="section_tittle text-center">
                    <p><?php echo esc_html('Recent work', 'kanox')?></p>
                    <h2><?php echo esc_html('Creative work for client', 'kanox')?></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php
                    kanox_portfolio_section( 3, 30, 'yes' );
                ?>
            </div>
        </div>
    </div>
</section>
<!-- portfolio part end-->

<?php

get_footer();

?>