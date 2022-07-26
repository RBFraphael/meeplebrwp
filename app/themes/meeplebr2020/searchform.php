<?php if(!defined('ABSPATH')){ exit; } ?>
<form action="<?= get_bloginfo('url'); ?>" method="get">
    <div class="row align-items-center">
        <div class="col-8 col-md-10 px-0">
            <input type="text" name="s" id="s" class="form-control rounded-0" required="required" placeholder="<?= __("Search for", "meeplebr2020"); ?>" value="<?= get_search_query(); ?>">
        </div>
        <div class="col-4 col-md-2 px-0">
            <button type="submit" class="btn btn-dark btn-block rounded-0"><i class="fas fa-search"></i></button>
        </div>
    </div>
</form>