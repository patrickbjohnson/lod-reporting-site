<?php
/* ------------------------------------------------------------
 *
 * CUSTOM HELPER FUNCTIONS
 *
 * Define any custom helper functions needed in the theme below.
 * 
 * ------------------------------------------------------------ */

function sort_repeater($repeater_field) {
	$repeater_field = get_field($repeater_field);
	$order = array();
	foreach ($repeater_field as $key => $row) {
		$order[$key] = array(
			'post' 		=> $row['media_outlet'],
			'notes' 	=> $row['feature_notes'],
			'links' 	=> $row['feature_links'],
			'status' 	=> $row['report_status'],
		);
	}
	array_multisort( $order, SORT_DESC, $repeater_field);
	return $order;
}

function is_logged_in() {
	if (!is_user_logged_in()) {
	 wp_redirect( site_url() . '/wp-admin' );
	};
}
