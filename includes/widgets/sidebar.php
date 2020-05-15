<?php

/**
 * Configurable YouTube Channel Subscription Widget
 */
class AV_YouTube_Subscribe_Widget extends WP_Widget {

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// outputs the content of the widget

		extract( $args );
		extract( $instance );

		$title				= apply_filters( 'widget_title', $title );

		echo $before_widget;
		echo $before_title . $title . $after_title;

		$attr = $instance;
		
		include( AV_YT_PLUGIN_PATH . 'includes/front/tpl/yt-subscribe.php' );

		echo $html;
		echo $after_widget;
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin

		$options						= get_option( 'AV_YT_options' );

		$default						= array( 
			'title' 					=> __( 'Subscribe to my channel', 'av-youtube' ),
			'channel_id' 				=> $options['channel_id'],
			'layout'					=> $options['layout'],
			'theme'						=> $options['theme'],
			'subscribers'				=> $options['show_subscribers_count'],
			'align'						=> $options['widget_alignment'],
			'color'						=> $options['widget_color'],
			'bgcolor'					=> $options['widget_bg_color'],
			'bordercolor'				=> $options['widget_border_color'],
			'class'						=> $options['widget_add_css'],
			'text'						=> $options['widget_text']
		);

		$instance						= wp_parse_args( (array) $instance, $default );
		
		include( AV_YT_PLUGIN_PATH . 'includes/widgets/tpl/sidebar-form.php' );
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {

		// processes widget options to be saved
		$instance									= array();
		$instance['title']							= strip_tags( $new_instance['title'] );
		$instance['channel_id']						= sanitize_text_field( $new_instance['channel_id'] );
		$instance['layout']							= sanitize_text_field( $new_instance['layout'] );
		$instance['theme']							= sanitize_text_field( $new_instance['theme'] );
		$instance['subscribers']					= sanitize_text_field( $new_instance['subscribers'] );
		$instance['text']							= sanitize_text_field( $new_instance['text'] );
		$instance['align']							= sanitize_text_field( $new_instance['align'] );
		$instance['color']							= ( $new_instance['color'] );
		$instance['bgcolor']						= ( $new_instance['bgcolor'] );
		$instance['bordercolor']					= ( $new_instance['bordercolor'] );
		$instance['class']							= sanitize_text_field( $new_instance['class'] );

		return $instance;
	}

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {

		$widget_ops = array( 
			'description' => __( 'Displays YouTube channel subscribe button.', 'av-youtube' ),
		);
		
		parent::__construct( 'av_youtube_subscribe_widget', __( 'AV Plugin: YouTube Channel Subscribe', 'av-youtube' ), $widget_ops );
	}
}