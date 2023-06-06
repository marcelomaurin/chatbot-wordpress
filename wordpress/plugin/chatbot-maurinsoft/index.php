<?php
/*
Plugin Name: Administrador do ChatBot da Maurinsoft
Description: Administrar conteudo de dados do chatbot.
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
wp_enqueue_script('ctlr_test','/wp-content/plugins/chatbot-maurinsoft/js/ctlr_maurinsoft.js');

wp_enqueue_style('style','/wp-content/plugins/chatbot-maurinsoft/css/maurinsoft.css');

add_shortcode('chatbot', 'funcchatbot' );


// Cria as tabelas quando o plugin for ativado
register_activation_hook( __FILE__, 'chat_criar_tabelas' );


function chat_criar_tabelas() {
    global $wpdb;

    // Cria a tabela chatjobs
    $table_name1 = $wpdb->prefix . 'chatjobs';
    $charset_collate = $wpdb->get_charset_collate();
    $sql1 = "CREATE TABLE $table_name1 (
        idjob mediumint(9) NOT NULL AUTO_INCREMENT,
        telefone varchar(30) NOT NULL,
        mensagem varchar(50) NOT NULL,
        status TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
        PRIMARY KEY (idjob)
    ) $charset_collate;";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql1 );

    // Cria a tabela chathistorico
    $table_name2 = $wpdb->prefix . 'chathistorico';
    $sql2 = "CREATE TABLE $table_name2 (
        idhistorico mediumint(9) NOT NULL AUTO_INCREMENT,
        pergunta varchar(500) NOT NULL,
        lastdt datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (idhistorico)
    ) $charset_collate;";
    dbDelta( $sql2 );

}

function chat_admin_menu() {
  add_filter('template_include', 'my_plugin_templates');
  add_action( 'admin_enqueue_scripts', 'load_chat_plugin_scripts' );
  add_menu_page(
		__( 'ChatBot Menu', 'my-textdomain' ),
		__( 'Chatbot', 'my-textdomain' ), 'manage_options', 'chat-options','wps_theme_func_hello','dashicons-schedule', 3	);

  add_submenu_page( 'chat-options', 'Chatbot - Simulação', 'Simulação do chatbot', 'manage_options', 'theme-op-faq', 'wps_theme_func_chatbot');
  add_submenu_page( 'chat-options', 'Chatbot - Base Pergunta', 'Base Perguntas', 'manage_options', 'theme-op-settings', 'chat_basepergunta');
  add_submenu_page( 'chat-options', 'Chatbot - Histórico Pergunta', 'Histórico', 'manage_options', 'chat_hperg', 'chat_historico');
  add_submenu_page( 'chat-options', 'Chatbot - Base Resposta', 'Base de Resposta', 'manage_options', 'chat_bresposta', 'wps_theme_func_bresposta');
  add_submenu_page( 'chat-options', 'Chatbot - Associação P&R', 'Associação P&R', 'manage_options', 'chat_presp', 'wps_theme_func_pr');
  //add_submenu_page( 'chat-options', 'Chatbot - Base Operação', 'Base Operação', 'manage_options', 'chat_boperacao', 'wps_theme_func_boperacao');
  add_submenu_page( 'chat-options', 'Chatbot - Base Operação', 'Base Operação', 'manage_options', 'chat_boperacao', 'wps_theme_func_boperacao');

}

function wps_theme_func_hello(){
?>
    <h1><?php esc_html_e( 'Chat - Help', 'chat-plugin-textdomain' ); ?></h1>

<?php	
        echo '<div class="wrap"><div id="icon-options-general" class="icon32"><br></div></div>';
	include ("wellcome.php");
}

function wps_theme_func_chatbot(){
?>
    <h1><?php esc_html_e( 'Chat - Simulador ', 'chat-plugin-textdomain' ); ?></h1>

<?php	
        echo '<div class="wrap"><div id="icon-options-general" class="icon32"><br></div>
        <h2>Simulador do chatbot</h2></div>';
	include ("chatbot.php");
}

function chat_basepergunta() {
?>
    <h1><?php esc_html_e( 'Chat - Base Pergunta', 'chat-plugin-textdomain' ); ?></h1>

<?php
include "pagina.php"; 
}

function chat_historico(){
?>
    <h1><?php esc_html_e( 'Chat - Histórico', 'chat-plugin-textdomain' ); ?></h1>

<?php	
        echo '<div class="wrap"><div id="icon-options-general" class="icon32"><br></div>';
		include ("historico.php");
}

function wps_theme_func_bresposta(){
?>
    <h1><?php esc_html_e( 'Chat - Base Resposta', 'chat-plugin-textdomain' ); ?></h1>

<?php	
        echo '<div class="wrap"><div id="icon-options-general" class="icon32"><br></div>';
	include ("bresposta.php");
}

function wps_theme_func_pr(){
	?>
    <h1><?php esc_html_e( 'Chat - Manager', 'chat-plugin-textdomain' ); ?></h1>

<?php	
        echo '<div class="wrap"><div id="icon-options-general" class="icon32"><br></div>';
		include ("peresp.php");	
}

function wps_theme_func_boperacao(){
    ?>
    <h1><?php esc_html_e( 'Chat - Manager', 'chat-plugin-textdomain' ); ?></h1>
    <?php
    echo '<div class="wrap"><div id="icon-options-general" class="icon32"><br></div>';
    include ("boperacao.php");
}

add_action( 'admin_menu', 'chat_admin_menu' );
add_action('wp_footer','chat_rodape'); /*informação adicional do rodape*/


function funcchatbot(){
?>
    <h1><?php esc_html_e( 'Chat - Manager', 'chat-plugin-textdomain' ); ?></h1>

<?php	
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



function register_chat_plugin_scripts() {
    //wp_register_style( 'chat-plugin', plugins_url( 'ddd/css/plugin.css' ) );
    //wp_register_script( 'chat-plugin', plugins_url( 'ddd/js/plugin.js' ) );
}



function load_chat_plugin_scripts( $hook ) {
    // Load only on ?page=comlink-application-clone
    if( $hook != 'toplevel_page_comlink-application-clone' ) {
        return;
    }

    // Load style & scripts.
    wp_enqueue_style( 'comlink-plugin' );
    wp_enqueue_script( 'comlink-plugin' );
}


function chat_rodape(){
		echo "<center><a href='https://maurinsoft.com.br'>maurinsoft.com.br</a> </center>";
	}



