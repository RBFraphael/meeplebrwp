<?php // Template name: Homepage
// Template post type: page
if(!defined('ABSPATH')){ exit; } ?>
<?php get_header();?>

<?php while(have_posts()){ the_post(); ?>

<div class="container-fluid parallax-window" style="min-height:640px;" data-parallax="scroll" data-speed="0.5" data-image-src="<?= get_the_post_thumbnail_url(); ?>"></div>

<div class="container-fluid pb-5">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <?= get_search_form(); ?>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-12">
                <ul class="list-inline text-center mb-0">
                    <?php
                    while(have_rows('featured-links')){
                    the_row();
                    $link = get_sub_field('link');
                    $icon = get_sub_field('icon-source') == 'fa' ? get_sub_field('fa-icon') : '<img data-src="'.get_sub_field('img-icon')['url'].'" alt="'.$link['title'].'" class="img-fluid lazy" style="max-height:70px;">';
                    ?>
                    <li class="list-inline-item mx-3">
                        <a href="<?= $link['url']; ?>" target="<?= $link['target']; ?>" class="text-dark text-decoration-none text-uppercase font-weight-bold link-zoom-image">
                            <?=  $icon; ?>
                            <p class="mt-2"><?= $link['title']; ?></p>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-12 entry-content">
                <?php the_content(); ?>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-12 border-bottom">
                <h4 class="font-weight-bold text-uppercase text-aqua">
                    <?php $icon = get_field('newly-icon-source') == 'fa' ? get_field('newly-fa-icon') : '<img data-src="'.get_field('newly-img-icon')['url'].'" alt="" class="img-fluid lazy" style="max-height:50px;" align="middle">'; ?>
                    <?= $icon." ".get_field("newly-title"); ?>
                </h4>
            </div>
        </div>
        <div class="row justify-content-center mb-4">
            <?php while(have_rows("newly-products")){
                the_row();
                $post = get_sub_field("product");
                setup_postdata($post);
                get_template_part('templates/product-preview');
                wp_reset_postdata();
            } ?>
        </div>
        <div class="row mb-4">
            <div class="col-12 border-bottom">
                <h4 class="font-weight-bold text-uppercase text-aqua">
                    <?php $icon = get_field('blog-icon-source') == 'fa' ? get_field('blog-fa-icon') : '<img data-src="'.get_field('blog-img-icon')['url'].'" alt="" class="img-fluid lazy" style="max-height:50px;" align="middle">'; ?>
                    <?= $icon." ".get_field("blog-title"); ?>
                </h4>
            </div>
        </div>
        <div class="row justify-content-center row-eq-height">
            <?php
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'order' => 'DESC',
                'orderby' => 'date',
                'posts_per_page' => 3
            );
            $query = new WP_Query($args);
            while($query->have_posts()){
                $query->the_post();
                ?>
                <div class="col-12 col-md-4 p-3">
					<div class="shadow p-0" style="height:100%;">
						<div class="post-thumbnail lazy" data-bg="<?= get_the_post_thumbnail_url(); ?>"></div>
						<div class="p-3">
							<h4 class="font-weight-bold text-uppercase text-dark"><?= get_the_title(); ?></h4>
							<p><?= get_the_excerpt(); ?></p>
							<p class="text-right m-0">
								<a href="<?= get_the_permalink(); ?>" class="btn btn-dark rounded-0"><i class="fas fa-eye"></i> <?= __("Quero ver!", "meeplebr2020"); ?></a>
							</p>
						</div>
					</div>
                </div>
                <?php
                wp_reset_postdata();
            }
            ?>
        </div>
    </div>
</div>

<?php } ?>

<?php get_footer(); ?>