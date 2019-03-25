<?php
/*
Plugin name: SWA-Alexa
Plugin URI: http://FarhadHP.ir/swa-alexa/
Description: Its a wordpress plugin to show your websites alexa rank in posts and pages.
Version: 2.0.0
Author: Farhad Hassan Pour
Author URI: http://FarhadHP.ir/
Text Domain: swa-alexa
 */
defined('ABSPATH') || exit('No Direct Access.');
define('SWA_ALEXA_DIR', plugin_dir_path(__FILE__));
define('SWA_ALEXA_URL', plugin_dir_url(__FILE__));
define('SWA_ALEXA_CSS_URL', trailingslashit(SWA_ALEXA_URL.'assets/css'));
define('SWA_ALEXA_JS_URL', trailingslashit(SWA_ALEXA_URL.'assets/js'));
define('SWA_ALEXA_IMG_URL', trailingslashit(SWA_ALEXA_URL.'assets/img'));
define('SWA_ALEXA_INC_DIR', trailingslashit(SWA_ALEXA_DIR.'include'));
define('SWA_ALEXA_ADMIN_DIR', trailingslashit(SWA_ALEXA_DIR.'admin'));
define('SWA_ALEXA_TPL_DIR', trailingslashit(SWA_ALEXA_DIR.'template'));

add_action('plugins_loaded', 'farhad_swa_wan_load_textdomain');
function farhad_swa_wan_load_textdomain() {
	load_plugin_textdomain( 'swa-alexa', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
}

add_shortcode('swa_alexa_country', 'swa_alexa_country');
add_shortcode('swa_alexa_country_name', 'swa_alexa_country_name');
add_shortcode('swa_alexa_country_global', 'swa_alexa_country_global');

// get_site_url()
function swa_alexa_country(){
	$source = simplexml_load_file('http://data.alexa.com/data?cli=10&url='.get_site_url());
    return $source->SD->COUNTRY['RANK'];
}

function swa_alexa_country_name(){
	$source = simplexml_load_file('http://data.alexa.com/data?cli=10&url='.get_site_url());
    return $source->SD->COUNTRY['NAME'];
}

function swa_alexa_country_global(){
	$source = simplexml_load_file('http://data.alexa.com/data?cli=10&url='.get_site_url());
    return $source->SD->POPULARITY['TEXT'];
}

add_action('wp_enqueue_scripts', 'SWA_ALEXA_load_user_assets');
function SWA_ALEXA_load_user_assets(){
	wp_register_style('SWA_ALEXA_user_style', SWA_ALEXA_CSS_URL.'SWA_ALEXA_user_style.css');
	wp_enqueue_style('SWA_ALEXA_user_style');
}

if(is_admin()){

	

	function swa_alexa_admin_menu(){

		$main = add_menu_page(__('Alexa rank', 'swa-alexa'), __('Alexa rank', 'swa-alexa'), 'manage_options', 'swa_alexa_main', 'swa_alexa_main_page');

		$main_sub = add_submenu_page('swa_alexa_main', __('Alexa rank', 'swa-alexa'), __('Alexa rank', 'swa-alexa'), 'manage_options', 'swa_alexa_main');

	}

	function swa_alexa_main_page(){
?>
				<div class="wrap">
			<h2><?php _e('Alexa rank plugin', 'swa-alexa'); ?></h2>
			<p><?php _e('Its a wordpress plugin to show your websites alexa rank in posts and pages.', 'swa-alexa'); ?></p>
			<hr>
			<?php
			$source = simplexml_load_file('http://data.alexa.com/data?cli=10&url='.get_site_url());
			?>
			<p><?php _e('Your local rank is ', 'swa-alexa'); ?><strong>(<?php echo $source->SD->COUNTRY['RANK']; ?>)</strong> <?php _e('and your global rank is ', 'swa-alexa'); ?><strong>(<?php echo $source->SD->POPULARITY['TEXT']; ?>)</strong> <?php _e('and your local country name is ', 'swa-alexa'); ?><strong>(<?php echo $source->SD->COUNTRY['NAME']; ?>)</strong> </p>
			<hr>
			<h3><?php _e('View local rank', 'swa-alexa') ?></h3>
			<p><?php _e('shortcode: <code>[swa_alexa_country]</code>', 'swa-alexa') ?></p>
			<h3><?php _e('View global rank', 'swa-alexa') ?></h3>
			<p><?php _e('shortcode: <code>[swa_alexa_country_global]</code>', 'swa-alexa') ?></p>
			<h3><?php _e('View local country name', 'swa-alexa') ?></h3>
			<p><?php _e('shortcode: <code>[swa_alexa_country_name]</code>', 'swa-alexa') ?></p>
			<hr>
			<h2><?php _e('About plugin', 'swa-alexa') ?></h2>
			<p>
				<strong><?php _e('Plugin author: ', 'swa-alexa') ?> </strong> <a href="https://farhad.in" target="_blank"><?php _e('Farhad Hassan Pour', 'swa-alexa') ?></a> <br>
				<strong><?php _e('Plugin verison: ', 'swa-alexa') ?> </strong> <?php _e('1.0.0', 'swa-alexa') ?> <br>
				<strong><?php _e('Plugin source: ', 'swa-alexa') ?></strong> <a href="https://github.com/SahandWebAfzar/swa-alexa" target="_blank"><?php _e('Github', 'swa-alexa') ?></a> <br>
				<strong><?php _e('Donate: ', 'swa-alexa') ?></strong> <a href="<?php _e('https://farhad.in/donate/', 'swa-alexa') ?>" target="_blank"><?php _e('Please donate', 'swa-alexa') ?></a> <br>
				<strong><?php _e('Team name: ', 'swa-alexa') ?><a href="http://sahandwebafzar.ir" target="_blank"><?php _e('Sahand Web Afzar', 'swa-alexa') ?></a>.</strong>
			</p>
			<hr>
		</div>
<?php
	}


	add_action('admin_menu', 'swa_alexa_admin_menu');

}