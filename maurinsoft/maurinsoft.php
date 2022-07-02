<?php
/*
Plugin Name: Administrador do Site Maurinsoft
Description: Cria uma página de administração da Maurinsoft.
Version: 1.0.1
Author:  Marcelo Maurin Martins
Author URI:  http://maurinsoft.com.br 
Text Domain: maurinsoft
*/

//<!-- Bootstrap -->
wp_enqueue_style('bootstrap.min','https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
wp_enqueue_style('bootstrap-theme.min','https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css');
wp_enqueue_script('bootstrap.min','https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');

//<!-- AngularJS -->
wp_enqueue_script('angular.min','https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js');



//<!-- Jquery -->
//wp_enqueue_script('jquery.min.js','https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js');
wp_enqueue_script('jquery.min.js','https://code.angularjs.org/1.6.4/angular.js');


//<!-- Parte local-->
wp_enqueue_script('ctlr_test','/wp-content/plugins/maurinsoft/js/ctlr_maurinsoft.js');

wp_enqueue_style('style','/wp-content/plugins/maurinsoft/css/maurinsoft.css');

add_shortcode('chatbot', 'funcchatbot' );




function maurinsoft_admin_menu() {
	add_filter('template_include', 'my_plugin_templates');
	add_action( 'admin_enqueue_scripts', 'register_comlink_plugin_scripts' );
	add_action( 'admin_enqueue_scripts', 'load_maurinsoft_plugin_scripts' );
	

    add_menu_page(
        __( 'Adm Maurinsoft', 'my-textdomain' ),
        __( 'Administração da Maurinsoft', 'my-textdomain' ),
        'manage_options',
        'maurinsoft.php',
        'maurinsoft_admin_page_contents',
        'dashicons-schedule',
        3
    );
}

add_action( 'admin_menu', 'maurinsoft_admin_menu' );
add_action('wp_footer','maurinsoft_rodape'); /*informação adicional do rodape*/


function funcchatbot(){
	echo("<div>Chat bot online</div>");
	include ("chatbot.php");
}	



function my_plugin_templates( $template ) {
    $post_types = array('post');

    if (is_singular($post_types)) {
        $template = 'path/to/singular/template/in/plugin/folder.php';
    }

    return $template;
}

function maurinsoft_admin_page_contents() {
?>
    <h1><?php esc_html_e( 'Maurinsoft - Manager', 'maurinsoft-plugin-textdomain' ); ?></h1>

<?php
include "pagina.php";
//echo file_get_contents('wp-content/plugins/maurinosoft/pagina.php');
//echo file_get_contents('pagina.php');

}

function register_maurinsoft_plugin_scripts() {
    //wp_register_style( 'maurinsoft-plugin', plugins_url( 'ddd/css/plugin.css' ) );
    //wp_register_script( 'maurinsoft-plugin', plugins_url( 'ddd/js/plugin.js' ) );
}



function load_maurinsoft_plugin_scripts( $hook ) {
    // Load only on ?page=comlink-application-clone
    if( $hook != 'toplevel_page_comlink-application-clone' ) {
        return;
    }

    // Load style & scripts.
    wp_enqueue_style( 'comlink-plugin' );
    wp_enqueue_script( 'comlink-plugin' );
}


function maurinsoft_rodape(){
		echo "<center><a href='http://maurinsoft.com.br'>maurinsoft.com.br</a> </center>";
	}



