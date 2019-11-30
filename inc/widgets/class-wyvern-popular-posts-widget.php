<?php

class Wyvern_Popular_Posts_Widget extends WP_Widget {
    
    public function __construct() {
        $widget_ops = array( 
            'classname' => 'wyvern_popular_posts_widget',
            'description' => 'Displays contact information.',
        );

    	parent::__construct( 'wyvern_popular_posts_widget', 'Wyvern - Popular Posts', $widget_ops );
    }

	// output the widget content on the front-end
	public function widget( $args, $instance ) {
        
        $popular_args = array(
            'post_type' => 'post',
            'posts_per_page' => 2,
            'meta_query' => array(
                array(
                    'key' => '_wyvern_likes',
                    'compare' => 'EXISTS',
                    'type' => 'NUMERIC',
                )
            ),
            'orderby' => 'meta_value_num',
        );

        $popular_query = new WP_Query( $popular_args );

        if ( $popular_query->have_posts() ) {
        
            // Widget Info
            echo $args['before_widget'];
            
            if ( ! empty( $instance['title'] ) ) {
                echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
            } else {
                echo $args['before_title'] . apply_filters( 'widget_title', esc_html__( 'Popular Posts', 'wyvern' ) ) . $args['after_title'];
            }

            echo '<div class="posts">';

            while( $popular_query->have_posts() ) {
                $popular_query->the_post();

                get_template_part( 'template-parts/blocks/posts/post-card' );
            }

            echo '</div>';

            wp_reset_postdata();

            echo $args['after_widget'];
        }
    }

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Popular Posts', 'wyvern' );
        
		?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'wyvern' ); ?></label> 
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
            </p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

		return $instance;
	}
}