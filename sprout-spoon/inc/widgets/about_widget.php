<?php
/**
 * Plugin Name: About Widget
 */

add_action( 'widgets_init', 'solopine_about_load_widget' );

function solopine_about_load_widget() {
	register_widget( 'solopine_about_widget' );
}

class solopine_about_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function solopine_about_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'solopine_about_widget', 'description' => __('An About Me Widget', 'sprout-spoon') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'solopine_about_widget' );

		/* Create the widget. */
		parent::__construct( 'solopine_about_widget', __('Sprout & Spoon: About Me', 'sprout-spoon'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$image = $instance['image'];
		$image_link = $instance['image_link'];
		$description = $instance['description'];
		$signing = $instance['signing'];
		
		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		?>
			
			<div class="about-widget">
				
				<?php if($image) : ?>
				<div class="about-img">
					<?php if($image_link) : ?><a href="<?php echo esc_url($image_link); ?>"><?php endif; ?><img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_html($title); ?>" /><?php if($image_link) : ?></a><?php endif; ?>
				</div>
				<?php endif; ?>
				
				<?php if($description) : ?>
				<p><?php echo wp_kses_post($description); ?></p>
				<?php endif; ?>
				
				<?php if($signing) : ?>
				<span class="about-autograph"><img src="<?php echo esc_url($signing); ?>" alt="" /></span>
				<?php endif; ?>
				
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
		$instance['image'] = strip_tags( $new_instance['image'] );
		$instance['image_link'] = strip_tags( $new_instance['image_link'] );
		$instance['description'] = $new_instance['description'];
		$instance['signing'] = strip_tags( $new_instance['signing'] );

		return $instance;
	}


	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'About Me', 'image' => '', 'description' => '', 'signing' => '', 'image_link' => '');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title', 'sprout-spoon' ); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:96%;" />
		</p>
		
		<!-- image url -->
		<p>
			<label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php esc_html_e( 'Image URL', 'sprout-spoon' ); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" value="<?php echo $instance['image']; ?>" style="width:96%;" /><br />
			<small><?php esc_html_e( 'Enter the image URL you want to use. You can upload your image via Media > Add New', 'sprout-spoon' ); ?></small>
		</p>
		
		<!-- image link -->
		<p>
			<label for="<?php echo $this->get_field_id( 'image_link' ); ?>"><?php esc_html_e( 'Image Link', 'sprout-spoon' ); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'image_link' ); ?>" name="<?php echo $this->get_field_name( 'image_link' ); ?>" value="<?php echo $instance['image_link']; ?>" style="width:96%;" /><br />
			<small><?php esc_html_e( 'Enter a link you want the about me image to go to.', 'sprout-spoon' ); ?></small>
		</p>
		
		<!-- description -->
		<p>
			<label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php esc_html_e( 'About me text', 'sprout-spoon' ); ?>:</label>
			<textarea id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" style="width:95%;" rows="6"><?php echo $instance['description']; ?></textarea>
		</p>
		
		<!-- autograph url -->
		<p>
			<label for="<?php echo $this->get_field_id( 'signing' ); ?>"><?php esc_html_e( 'Autograph Image URL', 'sprout-spoon' ); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'signing' ); ?>" name="<?php echo $this->get_field_name( 'signing' ); ?>" value="<?php echo $instance['signing']; ?>" style="width:96%;" /><br />
		</p>


	<?php
	}
}

?>