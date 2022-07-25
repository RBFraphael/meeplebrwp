<?php if(!defined('ABSPATH')){ exit; } ?>
<?php get_header();?>

<?php while(have_posts()){ the_post(); ?>

<div class="container-fluid parallax-window" style="min-height:640px;" data-parallax="scroll" data-speed="0.5" data-image-src="<?= get_the_post_thumbnail_url(); ?>"></div>

<?php if(function_exists('bcn_display')){ ?>
<div class="container-fluid bg-light">
    <div class="container">
        <div class="row py-2 border-bottom">
            <div class="col-12 bcn_display">
                <?php bcn_display(); ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<div class="container-fluid bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 entry-content font-weight-light">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</div>

<?php } ?>

<?php get_footer(); ?>
