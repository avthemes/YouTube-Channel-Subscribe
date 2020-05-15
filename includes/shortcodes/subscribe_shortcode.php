<?php

/**
 * Shortcode content generator
 *
 * @param  Array $attr
 * @param  String $content
 * @return String	Returns the HTML for the plugin
 */
function AV_YT_subscribe_shortcode( $attr, $content = null ) {

	$options				= get_option( 'AV_YT_options' );

	$attr 					= shortcode_atts( array(
		'channel_id'		=> $options['channel_id'],
		'layout'			=> $options['layout'],
		'theme'				=> $options['theme'],
		'subscribers'		=> $options['show_subscribers_count'],
		'align'				=> $options['widget_alignment'],
		'color'				=> $options['widget_color'],
		'bgcolor'			=> $options['widget_bg_color'],
		'bordercolor'		=> $options['widget_border_color'],
		'class'				=> $options['widget_add_css'],
		'text'				=> $options['widget_text']
	), $attr );

	if( ! is_null( $content ) && trim($content) != "" ) {

		$attr['text'] = do_shortcode( $content );
	}	

	include( AV_YT_PLUGIN_PATH . 'includes/front/tpl/yt-subscribe.php' );

	return $html;
}