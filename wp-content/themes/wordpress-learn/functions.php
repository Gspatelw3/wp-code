<?php
wp_enqueue_style('main-css', get_template_directory_uri() . '/css/main.css', '1.1');
wp_enqueue_script('main-js', get_template_directory_uri() . '/js/jquery.js', '1.1');
wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', '1.1');


// menu

function register_my_menu()
{
    register_nav_menu('header-menu', __('Header Menu'));
}
add_action('init', 'register_my_menu');


// widget
function wpb_widgets_init()
{

    register_sidebar(array(
        'name' => __('Main Sidebar', 'wpb'),
        'id' => 'sidebar',
        'description' => __('The main sidebar appears on the right on each page except the front page template', 'wpb'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Front page sidebar', 'wpb'),
        'id' => 'sidebar-2',
        'description' => __('Appears on the static front page template', 'wpb'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}

// Custom widget start
class Custom extends WP_Widget {

    public function __construct() {
		parent::__construct( 'custom', 'Custom');
	}

	public function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

	public function form( $instance ) {
		$title_field_name = 'title';

		echo '<input id="' . $this->get_field_id( 'title' ) . '" name="' . $this->get_field_name( 'title' ) . '" type="text" value="' . get_field( $title_field_name, 'widget_' . $this->id_base . '-' . $this->number ) . '" />';
		echo '<br />';
	}

	public function widget( $args, $instance ) {
		$widget_id = 'widget_' . $args['widget_id'];

		require( locate_template( 'widget-custom.php' ) );
	}
}

register_widget( '\Custom' );
// end custom widget ====

add_action('widgets_init', 'wpb_widgets_init');


function create_posttype() {
 
    register_post_type( 'movies',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Movies' ),
                'singular_name' => __( 'Movie' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'movies'),
            'show_in_rest' => true,
 
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );
