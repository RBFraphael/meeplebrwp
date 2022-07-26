<?php if(!defined('ABSPATH')){ exit; } ?>
<footer class="container-fluid bg-aqua py-4">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 text-light">
                <div class="row" id="footer-widget-one">
                    <?php dynamic_sidebar('footer-one'); ?>
                </div>
            </div>
            <div class="col-12 col-md-4 offset-md-4 text-light">
                <div class="row" id="footer-widget-two">
                    <?php dynamic_sidebar('footer-two'); ?>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="container-fluid bg-black py-2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-6">
                <p class="text-center text-md-left text-light mb-0"><small><?= get_field("copyright", "option"); ?></small></p>
            </div>
            <div class="col-12 col-md-6">
                <ul class="list-inline text-center text-md-right my-0">
                    <?php while(have_rows("social-networks", "option")){the_row(); ?>
                    <li class="list-inline-item" style="color:<?= get_sub_field('color'); ?>"><a href="<?= get_sub_field('link'); ?>" target="_blank" rel="noopener noreferrer" class="social-icon"><?= get_sub_field('icon'); ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	var inputs = document.querySelectorAll(".input");
	inputs.forEach(function(input){
		if(!input.classList.contains("form-control")){
			input.classList.add("form-control");
		}
		if(!input.classList.contains("mb-2")){
			input.classList.add("mb-2");
		}
	});
</script>
<?php while(have_rows("additional_js", "option")){ the_row(); ?>
<script type="text/javascript" src="<?= get_sub_field("link", "option"); ?>"></script>
<?php } ?>
<?php wp_footer(); ?>
<?= get_field("body_close_code", "option"); ?>
</body>
</html>
