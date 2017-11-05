<?php

add_action('admin_menu', 'swa_alexa_admin_menu');

function swa_alexa_admin_menu(){

	$main = add_menu_page('رتبه الکسا', 'رتبه الکسا', 'manage_options', 'swa_alexa_main', 'swa_alexa_main_page');

	$main_sub = add_submenu_page('swa_alexa_main', 'راهنما', 'راهنما', 'manage_options', 'swa_alexa_main');

}

