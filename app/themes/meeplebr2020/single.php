<?php if(!defined('ABSPATH')){ exit; } ?>
<?php get_header();?>

<?php while(have_posts()){ the_post(); ?>

<div class="container-fluid parallax-window" style="min-height:640px;" data-parallax="scroll" data-speed="0.5" data-image-src="<?= get_the_post_thumbnail_url(); ?>"></div>

<?php if(function_exists('bcn_display')){ ?>
<div class="container-fluid bg-light">
    <div class="container">
        <div class="row py-2 mb-2 border-bottom">
            <div class="col-12 bcn_display">
                <?php bcn_display(); ?>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-12">
                <ul class="list-unstyled my-0">
                    <li>
                        <small><strong>Por: </strong><?= get_the_author_meta('display_name'); ?></small>
                    </li>
                    <li>
                        <small><strong>Publicado em: </strong><?= get_the_date(); ?></small>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <ul class="list-inline my-0">
                    <?php foreach(get_the_category() as $cat){ ?>
                    <li class="list-inline-item"><a href="<?= get_category_link($cat); ?>" class="btn btn-primary font-weight-bold rounded-pill"><?= $cat->name; ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<div class="container-fluid bg-light pt-3 pb-5">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 entry-content shadow p-4 font-weight-light">
                <?php the_content(); ?>
            </div>
        </div>
        <div class="row mt-2 mb-4">
            <div class="col-12">
                <ul class="list-inline my-0">
                    <?php foreach(get_the_tags() as $tag){ ?>
                    <li class="list-inline-item mb-2"><a href="<?= get_tag_link($tag); ?>" class="btn btn-secondary btn-sm rounded-pill">#<?= $tag->name; ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="row mb-4">
            <?= $author_meta = get_the_author_meta(); ?>
            <div class="col-12 col-md-6 bg-light shadow px-4 py-2 author-profile">
                <div class="row">
                    <div class="col-3 p-0">
                        <div class="author-profile-picture rounded-circle border lazy" data-bg="<?= get_avatar_url(get_the_author_meta('ID')); ?>"></div>
                    </div>
                    <div class="col-9">
                        <h3 class="text-dark font-weight-bold"><?= get_the_author_meta('display_name'); ?></h3>
                        <p class="text-dark"><?= get_the_author_meta('description'); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <p><small><?= __("Compartilhar postagem:", "meeplebr2020"); ?></small></p>
                <a title="<?= __("Compartilhar no Facebook", "meeplebr2020"); ?>" href="https://www.facebook.com/sharer.php?u=<?= the_permalink(); ?>" target="_blank" class="btn btn-primary rounded-0 social-button"><i class="fab fa-facebook-f fa-lg"></i></a>
                <a title="<?= __("Compartilhar no Pinterest", "meeplebr2020"); ?>" href="https://pinterest.com/pin/create/button/?url=<?= the_permalink(); ?>&media=&description=" target="_blank" class="btn btn-danger rounded-0 social-button"><i class="fab fa-pinterest fa-lg"></i></a>
                <a title="<?= __("Compartilhar no Twitter", "meeplebr2020"); ?>" href="https://twitter.com/intent/tweet?url=<?= the_permalink(); ?>&text=<?= get_the_title(); ?>" target="_blank" class="btn btn-info rounded-0 social-button"><i class="fab fa-twitter fa-lg"></i></a>
                <a title="<?= __("Enviar por e-mail", "meeplebr2020"); ?>" href="mailto:info@example.com?&subject=&body=<?= the_permalink(); ?>" target="_blank" class="btn btn-dark rounded-0 social-button"><i class="fas fa-envelope fa-lg"></i></a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php comments_template(); ?>
            </div>
        </div>
    </div>
</div>

<?php } ?>

<?php get_footer(); ?>
