<?php 

require_once( dirname( __FILE__ ) . '/../lib/data/class-post-view-model.php' );

class Report_View_Model extends Post_View_Model {

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

    public function count_updates( $report ) {
        if ( empty($report) ) {
            echo 0;
        } else {
            echo count( $report );
        }
    }

    public function get_new_report_count($repeater_field) {
        $report_with_new_status = array();

        while ( have_rows($repeater_field) ) {
            the_row();
            if ( get_sub_field('report_status') == 'New') {
                array_push($report_with_new_status, get_sub_field('report_status'));
            }
        }



        return count($report_with_new_status);
    }
}