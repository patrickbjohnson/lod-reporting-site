<?php 

require_once( dirname( __FILE__ ) . '/../lib/data/class-post-view-model.php' );

class Report_View_Model extends Post_View_Model {

    public function is_on_tap() {
        return $this->on_tap > 0;
    }

    public function get_ingredients() {
        $ingredients = array();

        while ( have_rows('ingredients') ) {
            the_row();

            $ingredients[] = array(
                'type' => get_sub_field( 'type' ),
                'items' => explode( "\n", get_sub_field( 'list' ) )
            );
        }

        return $ingredients;
    }

    public function get_availability() {
        $availability = get_field( 'beer_availability', $this->post );

        if ( ! $availability ) {
            // if no availability was set, default to the beer type
            $availability = $this->get_beer_type();
        }
        
        return $availability;
    }

    public function get_beer_type() {
        $beer_type = get_the_terms( $this->post->ID, 'beer_type' );

        return empty( $beer_type ) ? '' : $beer_type[0]->name;
    }

    public function get_awards() {
        return explode( "\n", $this->awards );
    }
}