<?php
/*
Plugin Name: 	CuCa Validator
Plugin URI:
Description: 	Block your spam by adding a simple mathematical captcha to whatever input field you may want.
Version: 		v1.0
Author: 		Van
Author URI:
Text Domain:	CuCa-Validator
Domain Path:	languages
*/

	/* Variabili globali */
define( 'CUCA_PLUGIN_PATH', plugin_dir_path(__FILE__) );
define( 'CUCA_PLUGIN_URL', plugin_dir_url(__FILE__) );

	
	/* Chiamate fogli php esterni */
require_once(CUCA_PLUGIN_PATH.'CuCa-init.php');
	register_activation_hook( __FILE__, 'CuCa_default');
	register_deactivation_hook( __FILE__, 'CuCa_deactivation');
require_once(CUCA_PLUGIN_PATH.'includes/CuCa-mathematical-generator.php');
require_once(CUCA_PLUGIN_PATH.'CuCa-adminpage.php');


	/* Chiamata foglio di stile */
wp_enqueue_style('CuCa-validator', CUCA_PLUGIN_URL.'css/CuCa_admin_styles.css');
wp_enqueue_style('CuCa-style', CUCA_PLUGIN_URL.'css/CuCa_style.css');


	/* Registrazione scripts */
wp_register_script('CuCa_admin_scripts', CUCA_PLUGIN_URL.'/scripts/CuCa_admin_scripts.js');	
wp_register_script('CuCa_scripts', CUCA_PLUGIN_URL.'/scripts/CuCa_scripts.js');	


	/* Inizializzazione files .PO */
function CuCa_Po_init() {
  load_plugin_textdomain( 'CuCa-Validator', false, 'CuCa-Validator/languages' );
}
add_action('init', 'CuCa_Po_init');


	/* Struttura del pannello di amministrazione - Non è necessario modificare questo pezzo */
function CuCa_settings_page_builder(){
	echo "<br/><br/>";
	echo "<div class='CuCa_admWelcome'><div>X</div></div><div id='CuCa_admWelcomeAd'></div>";
	echo "<div align='center' style='width: 1000px; margin: 0 auto;'>";
	echo "<font id='CuCa_admin_title'>CuCa Validator</font><br>";
	echo "<font id='CuCa_admin_subTitle'>";
	_e('Stop your spam with a simple mathematical operation','CuCa-Validator');
	echo "</font>";
	echo CuCa_math();
	echo CuCa_donation();
	echo "</div>";
}


	/* Iniezioni variabili nello script.js */
$script_params = array(
	/* Captcha Matematico */
	'primoNum' => get_option('CuCa_math_first_number'),
	'secondoNum' => get_option('CuCa_math_second_number'),
	'plus' => get_option('CuCa_math_sign_add'),
	'minus' => get_option('CuCa_math_sign_min'),
	'mul' => get_option('CuCa_math_sign_mul'),
	'div' => get_option('CuCa_math_sign_div'),
	'skin' => get_option('CuCa_math_skin'),
	/* Captcha Alfanumerico */
	'CuCa_word_skin' => get_option('CuCa_word_skin'),
	/* Captcha Colore */
	'CuCa_color_trialN' => get_option('CuCa_color_trialN'),
	/* Captcha Generale */
	'pluginpath' => CUCA_PLUGIN_URL,
);
$admin_script_params = array(
	/* Captcha Generale */
	'pluginpath' => CUCA_PLUGIN_URL,	
	'welcomeMsg' => get_option('CuCa_welcome')
);
wp_localize_script('CuCa_scripts', 'scriptParams', $script_params);
wp_localize_script('CuCa_admin_scripts', 'scriptAdminParams', $admin_script_params);
wp_enqueue_script('CuCa_admin_scripts', CUCA_PLUGIN_URL.'scripts/CuCa_admin_scripts.js','','',true);	
wp_enqueue_script('CuCa_scripts', CUCA_PLUGIN_URL.'scripts/CuCa_scripts.js', array('jquery','CuCa_admin_scripts'),'1.0',true);	


	/* Wordpress hooks - Generazione voce nel menu */
function Cuca_options_panel_menu() {
 	add_options_page( 'Opzioni per CuCa', 'CuCa Validator', 'manage_options', 'CuCa-admin', 'CuCa_settings_page_builder' );
}
add_action('admin_menu', 'Cuca_options_panel_menu');


	/* Wordpress filters - Link alla pagina delle impostazioni dalla pagina dei PlugIn */
function CuCa_add_settings_link( $links ){
	$settings_link = '<a href="options-general.php?page=CuCa-admin">'.__('Settings','CuCa-Validator').'</a>';
	array_unshift($links, $settings_link);
	return $links;
}
add_filter( 'plugin_action_links_'.plugin_basename(__FILE__),'CuCa_add_settings_link' );
?>