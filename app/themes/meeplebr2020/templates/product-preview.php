<?php if(!defined('ABSPATH')){ exit; } ?>
<div class="col-12 col-sm-6 col-md-4 text-center">
    <a href="<?= the_permalink(); ?>" class="product-preview p-2">
        <h5 class="text-center text-aqua">
			<?= get_the_title(); ?>
		</h5>
        <div class="product-preview-thumbnail mb-3 lazy" data-bg="<?= get_field("product-image")['url']; ?>"></div>
        <ul class="list-unstyled text-left px-4">
            <?php
            while(have_rows("product-specs")){
                the_row();
                $text = get_sub_field("text");
                $icon_source = get_sub_field("icon-source");
                if($icon_source == "fa"){
                    $fa = get_sub_field("fa-icon");
                    $icon = '<span style="font-size:50px;">'.$fa.'</span>';
                } else {
                    $img = get_sub_field("img-icon")['url'];
                    $icon = '<img data-src="'.$img.'" alt="'.$text.'" class="img-fluid lazy" style="max-height:40px;">';
                }
                ?>
                <li>
                    <p class="text-dark font-weight-bold"><?= $icon; ?> <?= $text; ?></p>
                </li>
                <?php
            }
            ?>
        </ul>
    </a>
</div>