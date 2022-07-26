<?php if(!defined('ABSPATH')){ exit; } ?>
<?php get_header();?>

<div class="container-fluid py-5 bg-light">
    <div class="container">
        <div class="row align-items-center" style="height:100vh;">
            <div class="col-12">
                <h1 class="display-1 text-center text-muted"><i class="far fa-sad-tear"></i></h1>
                <h1 class="text-center text-muted font-weight-bold">A página que você está visitando não existe.</h1>
                <p class="text-center"><a href="<?= get_bloginfo('url'); ?>" class="btn btn-info font-weight-bold">Voltar para o Início</a></p>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
