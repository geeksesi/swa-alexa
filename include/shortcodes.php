<?php

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

