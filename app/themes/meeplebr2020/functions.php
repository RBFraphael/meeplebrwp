<?php
if(!defined('ABSPATH')){ exit; }

require_once dirname(__FILE__).'/inc/tgmpa/class-tgm-plugin-activation.php';

/*
| 
| Register CSS files
| 
*/
function rbfTheme_cssStyles()
{
    $version = '2021-02-04';
    $styles = array(
        'css_normalize' => '/assets/css/normalize.css',
        'css_bootstrap' => '/assets/css/bootstrap.min.css',
        'css_fontawesome' => '/assets/css/all.min.css',
        'css_animate' => '/assets/css/animate.css',
        'css_animateonscroll' => '/assets/css/aos.css',
        'css_hamburgers' => '/assets/css/hamburgers.min.css',
        'css_slick' => '/assets/css/slick.css',
        'css_slicktheme' => '/assets/css/slick-theme.css',
        'css_wickedcss' => '/assets/css/wickedcss.min.css',
        'css_content' => '/assets/css/content.css',
        'css_themecss' => '/assets/css/style.css'
    );
    foreach($styles as $identifier => $source){
        wp_enqueue_style($identifier, get_template_directory_uri().$source, array(), $version);
    }
}
add_action('wp_enqueue_scripts', 'rbfTheme_cssStyles');

/*
| 
| Register JavaScript files
| 
*/
function rbfTheme_jsScripts()
{
    wp_deregister_script("jquery");
    wp_enqueue_script("jquery", get_template_directory_uri()."/assets/js/jquery-3.4.1.min.js", [], "3.4.1", false);
    
    $version = '20220723';
    $footer = true;
    $scripts = array(
        'js_popper' => '/assets/js/popper.min.js',
        'js_bootstrap' => '/assets/js/bootstrap.min.js',
        'js_animateonscroll' => '/assets/js/aos.js',
        'js_lettering' => '/assets/js/jquery.lettering.js',
        'js_mask' => '/assets/js/jquery.mask.min.js',
        'js_nicescroll' => '/assets/js/jquery.nicescroll.min.js',
        'js_nicescrolliframehelper' => '/assets/js/jquery.nicescroll.iframehelper.min.js',
        'js_parallax' => '/assets/js/parallax.min.js',
        'js_particles' => '/assets/js/particles.min.js',
        'js_slick' => '/assets/js/slick.min.js',
        'js_lazyload' => '/assets/js/lazyload.min.js',
        'js_themejs' => '/assets/js/script.js'
    );
    
    foreach($scripts as $identifier => $source){
        wp_enqueue_script($identifier, get_template_directory_uri().$source, array(), $version, $footer);
    }
}
add_action('wp_enqueue_scripts', 'rbfTheme_jsScripts');

/*
| 
| Setup theme resources
| 
*/
function rbfTheme_setupTheme()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', ["comment-list", "comment-form", "search-form", "gallery", "caption", "style", "script"]);
    add_theme_support('automatic-feed-links');

    add_image_size("medium-big", 800);
    add_image_size('small-icon', 32, 32);

    load_theme_textdomain("meeplebr2020", get_template_directory()."/lang");
}
add_action('after_setup_theme', 'rbfTheme_setupTheme');

/*
| 
| Register menus
| 
*/
function rbfTheme_registerMenus()
{
    register_nav_menus(array(
        'primary' => 'Menu Principal',
        'secondary' => 'Menu Secundário'
    ));
}
add_action('after_setup_theme', 'rbfTheme_registerMenus');

/*
| 
| Require plugins with TGMPA
| 
*/
function rbfTheme_requirePlugins()
{
    $plugins = array(
        array(
            'name' => 'Advanced Custom Fields Pro',
            'slug' => 'advanced-custom-fields-pro',
            'source' => get_template_directory_uri().'/inc/tgmpa/plugins/advanced-custom-fields-pro.zip',
            'required' => true,
        ),
        array(
            'name' => 'Advanced Custom Fields: Font Awesome Field',
            'slug' => 'advanced-custom-fields-font-awesome',
            'required' => true,
        ),
        array(
            'name' => 'Classic Editor',
            'slug' => 'classic-editor',
            'required' => true,
        ),
        // array(
        //     'name' => 'Theme Plugin',
        //     'slug' => 'base-plugin',
        //     'source' => get_template_directory_uri().'/inc/tgmpa/plugins/base-plugin.zip',
        //     'required' => true,
        // ),
        array(
            'name' => 'Contact Form 7',
            'slug' => 'contact-form-7',
            'required' => true,
        ),
        array(
            'name' => 'Breadcrumb NavXT',
            'slug' => 'breadcrumb-navxt',
            'required' => false,
        ),
        array(
            'name' => 'Re-add Text Underline and Justify',
            'slug' => 're-add-underline-justify',
            'required' => false,
        ),
        array(
            'name' => 'Yoast SEO',
            'slug' => 'wordpress-seo',
            'required' => false,
        ),
    );

    $config = array(
        'id' => 'rbftheme-tgmpa',
        'menu' => 'rbftheme-install-plugins',
        // 'strings' => array(
        //     'page_title' => 'Instalar Plugins do Tema',
        //     'menu_title' => 'Instalar Plugins',
        //     'installing' => 'Instalando plugin: %s',
        //     'updating' => 'Atualizando plugin: %s',
        //     'oops' => 'Algo de errado aconteceu com a API de plugins.',
        //     'notice_can_install_required' => 'O tema requer esse(s) plugin(s): %1$s.',
        //     'notice_can_install_recommended' => 'O tema recomenda esse(s) plugin(s): %1$s.',
        //     'notice_ask_to_update' => 'O(s) seguinte(s) plugin(s) necessita(m) ser atualizado(s) para sua(s) útlima(s) versão(ões) para manter total compatibilidade: %1$s.',
        //     'notice_ask_to_update_maybe' => 'O(s) seguinte(s) plugin(s) possue(m) atualização(ões) disponível(is): %1$s.',
        //     'notice_can_activate_required' => 'O(s) seguinte(s) plugin(s) requerido(s) está(ão) desativado(s): %1$s.',
        //     'notice_can_activate_recommended' => 'O(s) seguinte(s) plugin(s) recomendado(s) está(ão) desativado(s): %1$s.',
        //     'install_link' => 'Iniciar instalação',
        //     'update_link' => 'Iniciar atualização',
        //     'activate_link' => 'Iniciar ativação',
        //     'return' => 'Retornar ao instalador de plugins',
        //     'plugin_activated' => 'Plugin ativado com sucesso.',
        //     'activated_successfully' => 'Os seguintes plugins foram ativados com sucesso:',
        //     'plugin_already_active' => 'Nenhuma ação necessária. O plugin %1$s já está ativado.',
        //     'plugin_needs_higher_version' => 'O plugin %s não foi ativado pois precisa de uma versão mais recente para o tema. Por favor, atualize o plugin.',
        //     'complete' => 'Todos os plugins foram instalados e ativados com sucesso. %1$s',
        //     'dismiss' => 'Fechar mensagem',
        //     'notice_cannot_install_activate' => 'Há um ou mais plugins requeridos ou recomendados para instalar, atualizar ou ativar.',
        //     'contact_admin' => 'Por favor, entre em contato com o administrador deste site para obter ajuda.',
        //     'nag_type' => ''
        // ),
    );

    tgmpa($plugins, $config);
}
add_action('tgmpa_register', 'rbfTheme_requirePlugins');

/*
| 
| Customize excerpt ending
| 
*/
function rbfTheme_excerptEnding($more)
{
    $ending = '...';
    if(function_exists('get_field')){
        $ending = get_field('excerpt_ending', 'option') ? get_field('excerpt_ending', 'option') : $ending;
    }
    return $ending;
}
add_filter('excerpt_more', 'rbfTheme_excerptEnding');

/*
| 
| Customize excerpt length
| 
*/
function rbfTheme_excerptLength($length)
{
    $length = 30;
    if(function_exists('get_field')){
        $length = get_field('excerpt_length', 'option') ? get_field('excerpt_length', 'option') : $length;
    }
    return $length;
}
add_filter('excerpt_length', 'rbfTheme_excerptLength');

function rbfTheme_productsOrder($query)
{
    if($query->is_tax('meeple_product_group') || $query->is_tax('meeple_product_tag')){
        $query->set('order', 'ASC');
        $query->set('orderby', 'title');
    }
}
add_action('pre_get_posts', 'rbfTheme_productsOrder');

/*
| 
| Return menu items from specified menu
| 
*/
function get_menu_items($menu_location = ''){
    return wp_get_nav_menu_items(get_nav_menu_locations()[$menu_location]);
}

function show_languages()
{
	if(function_exists("pll_the_languages")){
		$languages = pll_the_languages([
			'show_names' => 0,
			'show_flags' => 1,
			'hide_current' => 1,
			'raw' => 1
		]);
		foreach($languages as $lang){
			?>
			<li class="list-inline-item"><a href="<?= $lang['url']; ?>" class="social-icon"><?= $lang['flag']; ?></a></li>
			<?php
		}
	}
}
