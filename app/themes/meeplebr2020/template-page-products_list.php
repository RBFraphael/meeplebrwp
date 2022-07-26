<?php // Template name: Lista de Produtos Meeple
// Template post type: page
if(!defined('ABSPATH')){ exit; } ?>
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

<div class="container-fluid py-5 bg-light">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 border-bottom">
                <h4 class="font-weight-bold text-uppercase text-aqua">
                    <?php $icon = get_field('icon-source') == 'fa' ? get_field('fa-icon') : '<img data-src="'.get_field('img-icon')['url'].'" alt="" class="img-fluid lazy" style="max-height:50px;" align="middle">'; ?>
                    <?= $icon." ".get_the_title(); ?>
                </h4>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-12 entry-content">
                <?php the_content(); ?>
            </div>
        </div>
        <div class="row">
            <?php
            $args = array(
                'post_type' => 'meeple_product',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'order' => get_field('show-order'),
                'orderby' => get_field('show-orderby'),
            );
            while(have_rows('show-products')){
                the_row();
                $product_id = get_sub_field('product');
                if(!isset($args['post__in'])){
                    $args['post__in'] = array();
                }
                $args['post__in'][] = $product_id;
            }
            if(have_rows('show-groups')){
                if(!isset($args['tax_query'])){
                    $args['tax_query'] = array();
                }
                $tax_query = array(
                    'taxonomy' => 'meeple_product_group',
                    'field' => 'term_id',
                    'terms' => array(),
                );
                while(have_rows('show-groups')){
                    the_row();
                    $tax_query['terms'][] = get_sub_field('group');
                }
                $args['tax_query'] = array(
                    $tax_query,
                );
                if(is_array(get_field('show-groups')) && count(get_field('show-groups')) > 1){
                    $args['tax_query']['relation'] = 'AND';
                }
            }
            $query = new WP_Query($args);

            if($query->have_posts()){
                while($query->have_posts()){
                    $query->the_post();
                    get_template_part('templates/product-preview');
                    wp_reset_postdata();
                }
            } else {
                ?>
                <div class="col-12">
                    <h4 class="text-center text-muted"><?= __("Nenhum produto disponível.", "meeplebr2020"); ?></h4>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>

<?php } ?>

<?php get_footer(); ?>