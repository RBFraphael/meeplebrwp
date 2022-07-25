<?php
/*
Plugin Name: MeepleBR
Plugin URI: http://meeplebr.com
Description: Plugin de configurações e opções do site meeplebr.com
Version: 1.0.0
Author: RBF Studio
Author URI: https://www.rbfstudio.net
License: GNU General Public License v3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

if(!defined('ABSPATH')){ exit; }

/*
| 
| Hide ACF From panel
|  
*/
// add_filter('acf/settings/show_admin', '__return_false');

/*
| 
| Remove Wordpress logo from WP Admin Bar
| 
*/
function rbfPlugin_removeAdminBarItems()
{
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('wp-logo');
}
add_action('wp_before_admin_bar_render', 'rbfPlugin_removeAdminBarItems');

/*
| 
| Register custom post types
| 
*/
function rbfPlugin_registerPostTypes()
{
    $post_types = array(
        'meeple_product' => array(
            'label' => 'Produtos Meeple',
            'labels' => array(
                'name' => 'Produtos Meeple',
                'singular_name' => 'Produto Meeple',
                'add_new_item' => 'Adicionar Novo Produto Meeple',
                'edit_item' => 'Editar Produto Meeple',
                'new_item' => 'Novo Produto Meeple',
                'view_item' => 'Ver Produto Meeple',
                'view_items' => 'Ver Produtos Meeple',
                'search_items' => 'Pesquisar Produtos Meeple',
                'not_found' => 'Nenhum Produto Meeple encontrado',
                'not_found_in_trash' => 'Nenum Produto Meeple encontrado na lixeira'
            ),
            'public' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
            'taxonomies' => array('meeple_product_group', 'meeple_product_tag'),
            'exclude_from_search' => false,
            'show_in_rest' => true,
            'rest_base' => 'mproduct',
            'rewrite' => array(
                'slug' => 'product',
            ),
        ),
    );

    foreach($post_types as $slug => $data){
        register_post_type($slug, $data);
    }
}
add_action('init', 'rbfPlugin_registerPostTypes');

/*
| 
| Register custom taxonomies
| 
*/
function rbfPlugin_registerTaxonomies()
{
    $taxonomies = array(
        'meeple_product_group' => array(
            'post' => 'meeple_product',
            'data' => array(
                'label' => 'Grupos de Produtos',
                'labels' => array(
                    'name' => 'Grupos de Produtos',
                    'singular_name' => 'Grupo de Produtos'
                ),
                'show_admin_column' => true,
                'hierarchical' => false,
                'rewrite' => array(
                    'slug' => 'product_group'
                )
            ),
        ),
        'meeple_product_tag' => array(
            'post' => 'meeple_product',
            'data' => array(
                'label' => 'Tags',
                'labels' => array(
                    'name' => 'Tags',
                    'singular_name' => 'Tag'
                ),
                'show_admin_column' => true,
                'hierarchical' => false,
                'rewrite' => array(
                    'slug' => 'product_tag'
                )
            ),
        )
    );
    
    foreach($taxonomies as $taxonomy => $data){
        register_taxonomy($taxonomy, $data['post'], $data['data']);
    }
}
add_action('init', 'rbfPlugin_registerTaxonomies');

/*
| 
| Add options page
| 
*/
function rbfPlugin_addOptionsPage()
{
    if(function_exists('acf_add_options_page')){
        $pages = array(
            array(
                'page_title' => 'Opções do Tema',
                'menu_title' => 'Opções do Tema',
                'menu_slug' => 'theme-settings',
                'update_button' => 'Atualizar Configurações',
                'update_message' => 'Configurações atualizadas'
            )
        );
        foreach($pages as $page){
            acf_add_options_page($page);
        }
    }
}
add_action('init', 'rbfPlugin_addOptionsPage');

/*
| 
| Add options subpages
| 
*/
function rbfPlugin_addOptionsSubPages()
{
    if(function_exists('acf_add_options_sub_page')){
        $subpages = array(
            array(
                'page_title' => 'Opções Gerais do Tema',
                'menu_title' => 'Geral',
                'menu_slug' => 'theme-settings-general',
                'parent_slug' => 'theme-settings',
                'update_button' => 'Atualizar Configurações',
                'update_message' => 'Configurações atualizadas'
            ),
            array(
                'page_title' => 'Opções do Cabeçalho',
                'menu_title' => 'Cabeçalho',
                'menu_slug' => 'theme-settings-header',
                'parent_slug' => 'theme-settings',
                'update_button' => 'Atualizar Configurações',
                'update_message' => 'Configurações atualizadas'
            ),
            array(
                'page_title' => 'Opções do Rodapé',
                'menu_title' => 'Rodapé',
                'menu_slug' => 'theme-settings-footer',
                'parent_slug' => 'theme-settings',
                'update_button' => 'Atualizar Configurações',
                'update_message' => 'Configurações atualizadas'
            ),
            array(
                'page_title' => 'Códigos Adicionais',
                'menu_title' => 'Códigos',
                'menu_slug' => 'theme-settings-code',
                'parent_slug' => 'theme-settings',
                'update_button' => 'Atualizar Configurações',
                'update_message' => 'Configurações atualizadas'
            ),
        );
        foreach($subpages as $subpage){
            acf_add_options_sub_page($subpage);
        }
    }
}
add_action('init', 'rbfPlugin_addOptionsSubPages');

/*
| 
| Custom Login - Logo target URL
| 
*/
function rbfPlugin_loginLogoUrl()
{
    return get_bloginfo('url');
}
add_filter('login_headerurl', 'rbfPlugin_loginLogoUrl');

/*
| 
| Custom Login - Logo title/alt text
| 
*/
function rbfPlugin_loginLogoText()
{
    return get_bloginfo('name').' - '.get_bloginfo('description');
}
add_filter('login_headertext', 'rbfPlugin_loginLogoText');

/*
| 
| Custom Login - Background and logo image
| 
*/
function rbfPlugin_loginLogoStyle()
{
    ?>
    <style type='text/css'>
        body.login{
            background-color: #3498db;
        }
        body.login div#login h1 a{
            background-image: url('<?= plugin_dir_url(__FILE__); ?>/assets/img/login.png');
            background-size: 100%;
            width: 128px;
            height: 128px;
            margin: 0 auto 25px;
        }
    </style>
    <?php
}
add_filter('login_enqueue_scripts', 'rbfPlugin_loginLogoStyle');

/*
| 
| Setup colors on tinyMCE editor
| 
*/
function rbfPlugin_customEditorColors($init){
    $default_colors = array(
        '"000000","Black"', '"993300","Burnt orange"', '"333300","Dark olive"', '"003300","Dark green"', '"003366","Dark azure"',
        '"000080","Navy Blue"', '"333399","Indigo"', '"333333","Very dark gray"', '"800000","Maroon"', '"FF6600","Orange"',
        '"808000","Olive"', '"008000","Green"', '"008080","Teal"', '"0000FF","Blue"', '"666699","Grayish blue"',
        '"808080","Gray"', '"FF0000","Red"', '"FF9900","Amber"', '"99CC00","Yellow green"', '"339966","Sea green"',
        '"33CCCC","Turquoise"', '"3366FF","Royal blue"', '"800080","Purple"', '"999999","Medium gray"', '"FF00FF","Magenta"',
        '"FFCC00","Gold"', '"FFFF00","Yellow"', '"00FF00","Lime"', '"00FFFF","Aqua"', '"00CCFF","Sky blue"',
        '"993366","Red violet"', '"FFFFFF","White"', '"FF99CC","Pink"', '"FFCC99","Peach"', '"FFFF99","Light yellow"',
        '"CCFFCC","Pale green"', '"CCFFFF","Pale cyan"', '"99CCFF","Light sky blue"', '"CC99FF","Plum"',
    );

    $custom_colors = array(
        '"1ABC9C","Turquoise"', '"16A085","Green Sea"', '"2ECC71","Emerald"', '"27AE60","Nephritis"', '"3498DB","Peter River"',
        '"2980B9","Belize Hole"', '"9B59B6","Amethyst"', '"8E44AD","Wisteria"', '"34495E","Wet Asphalt"', '"2C3E50","Midnight Blue"',
        '"F1C40F","Sun Flower"', '"F39C12","Orange"', '"E67E22","Carrot"', '"D35400","Pumpkin"', '"E74C3C","Alizarin"',
        '"C0392B","Pomegranate"', '"ECF0F1","Clouds"', '"BDC3C7","Silver"', '"95A5A6","Concrete"', '"7F8C8D","Asbestos"',
        '"1EB395","Meeple"'
    );

    $colors = '['.implode(',', $default_colors).','.implode(',', $custom_colors).']';

    $init['textcolor_map'] = $colors;
    $init['textcolor_rows'] = 10;
    $init['textcolor_cols'] = 6;

    return $init;
}
add_filter('tiny_mce_before_init', 'rbfPlugin_customEditorColors');

/*
| 
| Register footer widgets area
| 
*/
function rbfPlugin_registerWidgetsArea()
{
    $widgets = array(
        array(
            'name' => 'Rodapé 1',
            'id' => 'footer-one',
            'description' => 'Área de Widgets 1 do rodapé',
            'before_widget' => '<div class="col-12">',
            'after_widget' => '</div>',
            'before_title' => '<p class="font-weight-bold text-dark text-uppercase mb-3">',
            'after_title' => '</p>'
        ),
        array(
            'name' => 'Rodapé 2',
            'id' => 'footer-two',
            'description' => 'Área de Widgets 2 do rodapé',
            'before_widget' => '<div class="col-12">',
            'after_widget' => '</div>',
            'before_title' => '<p class="font-weight-bold text-dark text-uppercase mb-3">',
            'after_title' => '</p>'
        ),
    );

    foreach($widgets as $w){
        register_sidebar($w);
    }
}
add_action('init', 'rbfPlugin_registerWidgetsArea');
