<?php if(!defined('ABSPATH')){ exit; } ?>
<?php get_header();?>
<?php while(have_posts()){ the_post(); ?>

<?php if(strlen(trim(get_field("product-components"))) > 0): ?>
<div class="modal fade" tabindex="-1" id="components-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= __("Componentes", "meeplebr2020"); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="content font-weight-light">
                    <?= the_field("product-components"); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<div class="modal fade" tabindex="-1" id="zoom-modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-0">
            <div class="text-right">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="zoom-carousel">
                <img data-src="<?= get_field("product-image")['url']; ?>" alt="<?= the_title(); ?>" class="img-fluid lazy">
                <?php while(have_rows("product-images")): the_row(); ?>
                <img data-src="<?= get_sub_field("image")['url']; ?>" alt="" class="img-fluid lazy">
                <?php endwhile; ?>
            </div>
            <button class="prev-slide btn btn-info btn-lg rounded-circle" data-target-carousel="#zoom-carousel">
                <i class="fas fa-chevron-circle-left"></i>
            </button>
            <button class="next-slide btn btn-info btn-lg rounded-circle" data-target-carousel="#zoom-carousel">
                <i class="fas fa-chevron-circle-right"></i>
            </button>
        </div>
    </div>
</div>

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

<div class="container-fluid pb-5 pt-3 bg-light">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <ul class="list-inline my-0">
                    <?php foreach(get_the_terms(get_the_ID(), 'meeple_product_tag') as $tag){ ?>
                    <li class="list-inline-item mb-2"><a href="<?= get_term_link($tag); ?>" class="btn btn-secondary btn-sm rounded-pill">#<?= $tag->name; ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <h1 class="text-center text-aqua font-weight-bold border-bottom pb-2"><?= get_the_title(); ?></h1>
            </div>
        </div>
        <div class="row mb-4 align-items-center">
            <?php while(have_rows("product-specs")){ the_row(); ?>
            <div class="col-12 col-md-4">
                <?php
                $text = get_sub_field("text");
                $icon_source = get_sub_field("icon-source");
                if($icon_source == "fa"){
                    $fa = get_sub_field("fa-icon");
                    $icon = '<span style="font-size:20px;">'.$fa.'</span>';
                } else {
                    $img = get_sub_field("img-icon")['url'];
                    $icon = '<img data-src="'.$img.'" alt="'.$text.'" class="img-fluid lazy" style="max-height:32px;" align="middle">';
                }
                ?>
                <p class="text-dark font-weight-bold h4"><?= $icon." ".$text; ?></p>
            </div>
            <?php } ?>
        </div>
        <div class="row mb-4">
            <div class="col-12 col-md-6">
                <div id="product-carousel">
                    <img data-src="<?= get_field("product-image")['url']; ?>" alt="<?= the_title(); ?>" class="img-fluid lazy">
                    <?php while(have_rows("product-images")): the_row(); ?>
                    <img data-src="<?= get_sub_field("image")['url']; ?>" alt="" class="img-fluid lazy">
                    <?php endwhile; ?>
                </div>
                <div id="product-carousel-nav">
                    <div class="p-2">
                        <img data-src="<?= get_field("product-image")['url']; ?>" alt="<?= the_title(); ?>" class="img-fluid lazy">
                    </div>
                    <?php while(have_rows("product-images")): the_row(); ?>
                    <div class="p-2">
                        <img data-src="<?= get_sub_field("image")['url']; ?>" alt="" class="img-fluid lazy">
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="col-12 col-md-6 mt-4 mt-md-0">
				<div class="content font-weight-light">
					<?php the_content(); ?>
				</div>
                <div class="mt-5 text-center text-md-left">
                    <?php
                    if(get_field("product-buy")){
                    $link = get_field("product-buy"); ?>
                    <a href="<?= $link['url']; ?>" target="<?= $link['target']; ?>" class="btn btn-info font-weight-bold"><i class="fas fa-shopping-cart"></i> <?= $link['title']; ?></a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-12 text-center border-top mb-4 pt-3">
                <h1 class="text-center text-aqua font-weight-bold"><?= __("Ficha Técnica", "meeplebr2020"); ?></h1>
            </div>
            <div class="col-12 col-md-6">
				<div class="content font-weight-light">
					<?php the_field("product-technical-content"); ?>
				</div>
				<?php if(strlen(trim(get_field("product-components"))) > 0): ?>
                <div class="mt-2">
                    <button class="btn btn-info" data-toggle="modal" data-target="#components-modal"><?= __("Componentes", "meeplebr2020"); ?></button>
                </div>
				<?php endif; ?>
            </div>
            <div class="col-12 col-md-6">
                <ul class="list-unstyled">
                    <?php while(have_rows("product-technical-files")){ the_row(); ?>
                    <li class="mb-2">
                        <a href="<?= get_sub_field("file"); ?>" target="_blank" class="text-decoration-none text-aqua font-weight-bold h4"><span class="text-danger"><?= get_sub_field('icon'); ?></span> <?= get_sub_field("name"); ?></a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <?php if(have_rows("product-embeded-media")){ ?>
        <div class="row mb-4">
            <div class="col-12 text-center border-top mb-4 pt-3">
                <h1 class="text-center text-aqua font-weight-bold"><?= __("Vídeos", "meeplebr2020"); ?></h1>
            </div>
            <?php while(have_rows("product-embeded-media")){ the_row(); ?>
            <div class="col-12 col-md-6 mb-4 text-center">
                <div class="embed-container">
                    <?php the_sub_field("media"); ?>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
        <?php if(have_rows("related-products")){ ?>
        <div class="row mb-4">
            <div class="col-12 text-center border-top mb-4 pt-3">
                <h1 class="text-center text-aqua font-weight-bold"><?= __("Produtos Relacionados", "meeplebr2020"); ?></h1>
            </div>
            <?php while(have_rows("related-products")){
                the_row();
                $post = get_sub_field("product");
                setup_postdata($post);
                get_template_part('templates/product-preview');
                wp_reset_postdata();
            } ?>
        </div>
        <?php } ?>
    </div>
</div>

<?php } ?>
<?php get_footer(); ?>