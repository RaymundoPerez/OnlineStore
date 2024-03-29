<?php
/**
 * Social icons widget
 *
 * @package yith-proteo
 */

/**
 * Adds YITH_Proteo_Social_Icons widget.
 */
class YITH_Proteo_Social_Icons extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'YITH_Proteo_Social_Icons',
			esc_html_x( 'YITH Proteo Social Networks', 'Widget title', 'yith-proteo' ), // Name.
			array(
				'description' => esc_html_x( 'Links to your social profiles', 'Widget description', 'yith-proteo' ),
			)
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @param array $args Widget arguments.
	 * @param array $instance Saved values from database.
	 *
	 * @see WP_Widget::widget()
	 */
	public function widget( $args, $instance ) {

		$title = apply_filters( 'widget_title', isset( $instance['title'] ) ? $instance['title'] : '' );

		$facebook  = isset( $instance['facebook'] ) ? esc_url( $instance['facebook'] ) : '';
		$twitter   = isset( $instance['twitter'] ) ? esc_url( $instance['twitter'] ) : '';
		$instagram = isset( $instance['instagram'] ) ? esc_url( $instance['instagram'] ) : '';
		$linkedin  = isset( $instance['linkedin'] ) ? esc_url( $instance['linkedin'] ) : '';
		$youtube   = isset( $instance['youtube'] ) ? esc_url( $instance['youtube'] ) : '';

		// social profile link.
		$facebook_profile  = '<a target="_blank" rel="nofollow noopener" class="facebook" title="facebook" href="' . $facebook . '"><span class="icon-social-facebook"></span></a>';
		$twitter_profile   = '<a target="_blank" rel="nofollow noopener" class="twitter" title="twitter" href="' . $twitter . '"><span class="icon-social-twitter"></span></a>';
		$instagram_profile = '<a target="_blank" rel="nofollow noopener" class="instagram" title="instagram" href="' . $instagram . '"><span class="icon-social-instagram"></span></a>';
		$linkedin_profile  = '<a target="_blank" rel="nofollow noopener" class="linkedin" title="linkedin" href="' . $linkedin . '"><span class="icon-social-linkedin"></span></a>';
		$youtube_profile   = '<a target="_blank" rel="nofollow noopener" class="youtube" title="youtube" href="' . $youtube . '"><span class="icon-social-youtube"></span></a>';

		echo $args['before_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

		if ( ! empty( $title ) ) {
			echo $args['before_title'] . esc_html( $title ) . $args['after_title']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}

		echo '<div class="yith-proteo-social-icons">';
		echo ( ! empty( $facebook ) ) ? $facebook_profile : null; // phpcs:ignore WordPress.Security.EscapeOutput
		echo ( ! empty( $twitter ) ) ? $twitter_profile : null; // phpcs:ignore WordPress.Security.EscapeOutput
		echo ( ! empty( $instagram ) ) ? $instagram_profile : null; // phpcs:ignore WordPress.Security.EscapeOutput
		echo ( ! empty( $linkedin ) ) ? $linkedin_profile : null; // phpcs:ignore WordPress.Security.EscapeOutput
		echo ( ! empty( $youtube ) ) ? $youtube_profile : null; // phpcs:ignore WordPress.Security.EscapeOutput
		echo '</div>';

		echo $args['after_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}

	/**
	 * Back-end widget form.
	 *
	 * @param array $instance Previously saved values from database.
	 *
	 * @see WP_Widget::form()
	 */
	public function form( $instance ) {
		$title = isset( $instance['title'] ) ? $instance['title'] : '';

		$facebook  = isset( $instance['facebook'] ) ? esc_url( $instance['facebook'] ) : '#';
		$twitter   = isset( $instance['twitter'] ) ? esc_url( $instance['twitter'] ) : '#';
		$instagram = isset( $instance['instagram'] ) ? esc_url( $instance['instagram'] ) : '#';
		$linkedin  = isset( $instance['linkedin'] ) ? esc_url( $instance['linkedin'] ) : '#';
		$youtube   = isset( $instance['youtube'] ) ? esc_url( $instance['youtube'] ) : '#';
		?>
		<p><?php echo esc_html_x( 'To hide a field, just leave it empty', 'Widget option label', 'yith-proteo' ); ?></p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html_x( 'Title:', 'Widget option', 'yith-proteo' ); ?></label>
			<input
				class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
				name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text"
				value="<?php echo esc_attr( $title ); ?>">
		</p>

		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"><?php echo esc_html_x( 'Facebook:', 'Widget option', 'yith-proteo' ); ?></label>
			<input
				class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"
				name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>" type="text"
				value="<?php echo esc_attr( $facebook ); ?>">
		</p>

		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>"><?php echo esc_html_x( 'Twitter:', 'Widget option', 'yith-proteo' ); ?></label>
			<input
				class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>"
				name="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>" type="text"
				value="<?php echo esc_attr( $twitter ); ?>">
		</p>

		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>"><?php echo esc_html_x( 'Instagram:', 'Widget option', 'yith-proteo' ); ?></label>
			<input
				class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>"
				name="<?php echo esc_attr( $this->get_field_name( 'instagram' ) ); ?>" type="text"
				value="<?php echo esc_attr( $instagram ); ?>">
		</p>

		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>"><?php echo esc_html_x( 'LinkedIn:', 'Widget option', 'yith-proteo' ); ?></label>
			<input
				class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>"
				name="<?php echo esc_attr( $this->get_field_name( 'linkedin' ) ); ?>" type="text"
				value="<?php echo esc_attr( $linkedin ); ?>">
		</p>

		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>"><?php echo esc_html_x( 'Youtube:', 'Widget option', 'yith-proteo' ); ?></label>
			<input
				class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>"
				name="<?php echo esc_attr( $this->get_field_name( 'youtube' ) ); ?>" type="text"
				value="<?php echo esc_attr( $youtube ); ?>">
		</p>

		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 * @see WP_Widget::update()
	 */
	public function update( $new_instance, $old_instance ) {
		$instance              = array();
		$instance['title']     = ( ! empty( $new_instance['title'] ) ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
		$instance['facebook']  = ( ! empty( $new_instance['facebook'] ) ) ? wp_strip_all_tags( $new_instance['facebook'] ) : '';
		$instance['twitter']   = ( ! empty( $new_instance['twitter'] ) ) ? wp_strip_all_tags( $new_instance['twitter'] ) : '';
		$instance['instagram'] = ( ! empty( $new_instance['instagram'] ) ) ? wp_strip_all_tags( $new_instance['instagram'] ) : '';
		$instance['linkedin']  = ( ! empty( $new_instance['linkedin'] ) ) ? wp_strip_all_tags( $new_instance['linkedin'] ) : '';
		$instance['youtube']   = ( ! empty( $new_instance['youtube'] ) ) ? wp_strip_all_tags( $new_instance['youtube'] ) : '';

		return $instance;
	}

}
