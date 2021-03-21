<?php echo $args['before_widget']; ?>

<?php
if ( ! empty( $instance['title'] ) ) {
	echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
} ?>

<?php the_field('text', $widget_id); ?>

<p>This is an example widget</p>

<?php echo $args['after_widget']; ?>
