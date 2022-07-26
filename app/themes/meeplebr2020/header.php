<?php if(!defined('ABSPATH')){ exit; } ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?= get_field("head_open_code", "option"); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= get_field('site-favicon', 'options')['url']; ?>">
    <?php while(have_rows("additional_css", "option")){ the_row(); ?>
    <link rel="stylesheet" href="<?= get_sub_field("link", "option"); ?>">
    <?php } ?>
    <?php wp_head(); ?>
    <?= get_field("head_close_code", "option"); ?>
</head>
<body <?php body_class(); ?>>
<?= get_field("body_open_code", "option"); ?>
<?php if(get_field('site-loader', 'option')){ ?>
<div id="loader">
    <div id="image-wrapper">
        <img src="<?= get_field('site-loader-image', 'option')['url']; ?>" alt="<?= get_bloginfo('name'); ?>">
    </div>
</div>
<?php } ?>
<header class="container-fluid py-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="list-inline text-center text-md-right my-0" id="social-networks">
                    <?php while(have_rows("social-networks", "option")){the_row(); ?>
                    <li class="list-inline-item" style="color:<?= get_sub_field('color'); ?>"><a href="<?= get_sub_field('link'); ?>" target="_blank" rel="noopener noreferrer" class="social-icon"><?= get_sub_field('icon'); ?></a></li>
                    <?php } ?>
					<?php show_languages(); ?>
                </ul>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-6 col-md-3">
                <a href="<?= get_bloginfo('url'); ?>"><img data-src="<?= get_field('header-logo', 'options')['url']; ?>" alt="<?= get_bloginfo('name'); ?>" class="img-fluid lazy" style="max-height:50px;"></a>
            </div>
            <div class="col-md-9 text-right d-none d-md-block header-menu" style="display:none;">
                <?php wp_nav_menu(get_nav_menu_locations()['primary']); ?>
            </div>
            <div class="col-6 d-block d-md-none text-right">
                <button class="btn btn-dark btn-lg rounded-0" data-toggle="collapse" data-target="#mobile-menu"><i class="fas fa-bars"></i></button>
            </div>
        </div>
        <div class="row d-block d-md-none mt-2">
            <div class="col-12 px-0 collapse" id="mobile-menu">
                <?php wp_nav_menu(get_nav_menu_locations()['primary']); ?>
            </div>
        </div>
    </div>
</header>
