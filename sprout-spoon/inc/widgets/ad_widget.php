<?php
/**
 * Plugin Name: Ad Widget
 */

add_action( 'widgets_init', 'solopine_ad_load_widget' );

function solopine_ad_load_widget() {
	register_widget( 'solopine_ad_widget' );
}

class solopine_ad_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function solopine_ad_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'solopine_ad_widget', 'description' => __('Paste in your ad code to display your ad', 'sprout-spoon') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'solopine_ad_widget' );

		/* Create the widget. */
		parent::__construct( 'solopine_ad_widget', __('Sprout & Spoon: Ad widget', 'sprout-spoon'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$ad_code = $instance['ad_code'];
		$border = $instance['border'];
		
		if($border == false && $title) {
		$before_widget = str_replace('class="', 'class="noborder ', $before_widget);
		} elseif( !$border && !$title ) {
			$before_widget = str_replace('class="', 'class="notitle noborder ', $before_widget);
		} elseif($border && !$title) {
			$before_widget = str_replace('class="', 'class="border_notitle ', $before_widget); 
		}
		
		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		?>
			
			<div class="center-widget">
				<?php echo $ad_code; ?>
			</div>
			
		<?php

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['ad_code'] = $new_instance['ad_code'];
		$instance['border'] = strip_tags( $new_instance['border'] );

		return $instance;
	}


	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => '', 'ad_code' => '', 'border' => false);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title', 'sprout-spoon' ); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:96%;" />
		</p>
		
		<!-- Ad code -->
		<p>
			<label for="<?php echo $this->get_field_id( 'ad_code' ); ?>"><?php esc_html_e( 'Ad Code', 'sprout-spoon' ); ?>:</label>
			<textarea id="<?php echo $this->get_field_id( 'ad_code' ); ?>" name="<?php echo $this->get_field_name( 'ad_code' ); ?>" style="width:95%;" rows="6"><?php echo $instance['ad_code']; ?></textarea>
		</p>
		
		<!-- Border -->
		<p>
			<label for="<?php echo $this->get_field_id( 'border' ); ?>"><?php esc_html_e( 'Show Border around Widget?', 'sprout-spoon' ); ?></label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'border' ); ?>" name="<?php echo $this->get_field_name( 'border' ); ?>" <?php checked( (bool) $instance['border'], true ); ?> />
		</p>


	<?php
	}
}

?>