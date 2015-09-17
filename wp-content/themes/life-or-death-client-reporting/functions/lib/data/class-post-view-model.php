<?php 

class Post_View_Model {

    public $post;

    /**
     * Creates a Post_View_Model Instance.
     * 
     * @param WP_Post $post The post that will be wrapped by the view model
     */
    public function __construct( $post ) {
        $this->post = $post;
    }

    public function get_title() {
        return get_the_title( $this->post );
    }

    public function the_content() {
        the_content();
    }

    public function get_content() {
        return get_the_content();
    }

    public function get_terms( $taxonomy ) {
        return get_the_terms( $this->post->ID, $taxonomy );
    }

    public function get_permalink( $leavename = false ) {
        return get_permalink( $this->post->ID, $leavename );
    }

    public function __get( $name ) {
        // if using ACF, call get_field instead of get_post_meta
        if ( function_exists( 'get_field' ) ) {
            return get_field( $name, $this->post );
        } else {
            return get_post_meta( $this->post->ID, $name );
        }
    }
}