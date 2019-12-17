<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <!-- For Resposive Device -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php echo kanox_site_icon();?>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>

    <!--::header part start::-->
    <?php if( is_front_page() ) {
        $kanox_menu_class = 'main_menu home_menu';
    } else {
        $kanox_menu_class = 'main_menu';
    } ?>
    <header class="<?php echo $kanox_menu_class?>">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <?php
                            echo kanox_theme_logo( 'navbar-brand' );
                        ?>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <?php
                            if(has_nav_menu('primary-menu')) {
                                wp_nav_menu(array(
                                    'menu'           => 'primary-menu',
                                    'theme_location' => 'primary-menu',
                                    'menu_id'        => 'menu-main-menu',
                                    'container_class'=> 'collapse navbar-collapse main-menu-item justify-content-end',
                                    'container_id'   => 'navbarSupportedContent',
                                    'menu_class'     => 'navbar-nav',
                                    'walker'         => new kanox_bootstrap_navwalker,
                                    'depth'          => 3
                                ));
                            }
                        ?>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    <?php
    //Page Title Bar
    if( function_exists( 'kanox_page_titlebar' ) ){
	    kanox_page_titlebar();
    }

