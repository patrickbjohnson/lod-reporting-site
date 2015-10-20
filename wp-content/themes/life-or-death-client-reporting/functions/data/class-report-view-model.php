<?php 

require_once( dirname( __FILE__ ) . '/../lib/data/class-post-view-model.php' );

class Report_View_Model extends Post_View_Model {

    public function set_number_format( $num_value ) {
        if ( !isset( $num_value )) return;
        
        return number_format(intval($num_value));
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