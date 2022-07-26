<?php if(!defined('ABSPATH')){ exit; } ?>
<?php get_header();?>

<div class="container-fluid parallax-window" style="min-height:640px;" data-parallax="scroll" data-speed="0.5" data-image-src="<?= get_the_post_thumbnail_url(get_option('page_for_posts', true)); ?>"></div>

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

<div class="container-fluid py-5 bg-light">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 border-bottom">
                <h4 class="font-weight-bold text-uppercase text-aqua">
                    <?php $icon = get_field('icon-source', get_option('page_for_posts', true)) == 'fa' ? get_field('fa-icon', get_option('page_for_posts', true)) : '<img data-src="'.get_field('img-icon', get_option('page_for_posts', true))['url'].'" alt="" class="img-fluid lazy" style="max-height:50px;" align="middle">'; ?>
                    <?= $icon." Pesquisando por: ".get_search_query(); ?>
                </h4>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-12">
                <?php get_search_form(); ?>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-12">
                <?php if(have_posts()){
                    while(have_posts()){
                        the_post();
                        ?>
                        <div class="row row-eq-height mb-4 shadow">
                            <div class="col-12 col-md-4 px-0">
                                <div class="post-thumbnail lazy" data-bg="<?= get_the_post_thumbnail_url(); ?>"></div>
                            </div>
                            <div class="col-12 col-md-8 py-3">
                                <div class="row" style="height:100%;">
                                    <div class="col-12 align-self-start">
                                        <h5 class="font-weight-bold text-dark"><?= get_post_type_object(get_post_type())->labels->singular_name; ?></h5>
                                        <h3 class="font-weight-bold text-uppercase text-dark"><?= get_the_title(); ?></h3>
                                        <p><?= the_excerpt(); ?></p>
                                    </div>
                                    <div class="col-12 align-self-end text-right">
                                        <a href="<?= the_permalink(); ?>" class="btn btn-dark rounded-0"><i class="fas fa-eye"></i> <?= __("Quero ver!", "meeplebr2020"); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    ?>
                    <h4 class="font-weight-bold text-center text-muted"><?= __("Nenhum post disponível.", "meeplebr2020"); ?></h4>
                    <?php
                } ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
