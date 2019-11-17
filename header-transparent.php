<!DOCTYPE html>
<html>
<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <link rel="icon" type="image/png" href="/images/81-Code.svgs">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <title><?php wp_title('|'); ?></title>
    <?php wp_head()?>

</head>
<body>
<div class="header transparent">
    <div class="inner-header container">
        <div class="logo">
            <div class="inner-logo">
            <?php 
                $custom_logo_id = get_theme_mod( 'custom_logo' );
                $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
                echo '<img src="' . esc_url( $custom_logo_url ) . '" alt="The main site logo">';?>
            </div>
            <div class="hamburger hamburger--squeeze">
                <div class="hamburger-box">
                    <div class="hamburger-inner"></div>
                </div>
            </div>
        </div>
        <div class="nav transition">
            <div class="inner-nav">
                <?php wp_nav_menu(array('theme_location' => 'header-menu', 'menu_class' => 'nav-menu tansition', 'container' => '' )) ?>
            </div>
        </div>
        <div class="nav-overlay transition"></div>
    </div>
</div>