<?php
/*
Plugin name: SWA-Alexa
Plugin URI: https://sahandwebafzar.ir/products/swa-alexa/
Description: افزونه‌ای برای نمایش رتبه الکسا
Version: 1.0.0
Author: فرهاد حسن پور
Author URI: http://Farhad.in/
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

require SWA_ALEXA_INC_DIR.'shortcodes.php';
require SWA_ALEXA_INC_DIR.'frontend.php';

if(is_admin()){

	require_once SWA_ALEXA_ADMIN_DIR.'page.php';
	require_once SWA_ALEXA_ADMIN_DIR.'menu.php';
	require SWA_ALEXA_INC_DIR.'backend.php';

}