<?php

add_action('wp_enqueue_scripts', 'SWA_ALEXA_load_user_assets');
function SWA_ALEXA_load_user_assets(){
	wp_register_style('SWA_ALEXA_user_style', SWA_ALEXA_CSS_URL.'SWA_ALEXA_user_style.css');
	wp_enqueue_style('SWA_ALEXA_user_style');
}