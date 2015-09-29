<?php
	// auth_redirect();
	


	

	is_logged_in();


	include( get_template_directory() . '/functions/data/class-report-view-model.php' );
	$report = new Report_View_Model( $post );
	global $current_user;
	get_currentuserinfo();

	// if ($report->report_client['ID'] != $current_user->ID || ( $report->report_client['ID'] != $current_user->ID && !current_user_can('manage options') ) ) {
	// 	wp_redirect( site_url() . '/wp-admin' );
	// 	// exit;
	// }

	
	$features_recap = sort_repeater('features_recap');
	$tours_recap = sort_repeater('tour_recap');


	get_header();
?>

<?php if ( have_post ) : while ( have_posts() ) : the_post(); ?>
	<h1>Report Title: <?php echo $report->get_title(); ?></h1>
	<h2>Report Date: <?php echo $report->report_date; ?></h2> 

	<?php if( $features_recap ): ?>
		<h1>Features Report</h1>
		<div class="report">
		<?php foreach( $features_recap as $i => $row ) : $media_outlet = new Report_View_Model ( $row['post'] ); 
			the_partial('report-section', array(
				'name'	=> $row['post']->post_title,
				'outlet_type' => $media_outlet->outlet_type,
				'outlet_description' => $media_outlet->outlet_description,
				'outlet_circulation' => number_format($media_outlet->outlet_circulation),
				'outlet_site_visits' => number_format($media_outlet->outlet_website_visits),
				'notes' => $row['notes'],
				'links' => $row['links'],
				'facebook' => $media_outlet->facebook_account,
				'twitter' => $media_outlet->twitter_account,
				'report_status' => $row['status']
			));
			endforeach; 
		?>
		</div>
	<?php endif; ?>

	<?php if( $tours_recap ): ?>
		<h1>Tour Report</h1>
		<div class="report">
		<?php foreach( $tours_recap as $i => $row ) : $media_outlet = new Report_View_Model ( $row['post'] ); 
			the_partial('report-section', array(
				'name'	=> $row['post']->post_title,
				'outlet_type' => $media_outlet->outlet_type,
				'outlet_description' => $media_outlet->outlet_description,
				'outlet_circulation' => number_format($media_outlet->outlet_circulation),
				'outlet_site_visits' => number_format($media_outlet->outlet_website_visits),
				'notes' => $row['notes'],
				'links' => $row['links'],
				'facebook' => $media_outlet->facebook_account,
				'twitter' => $media_outlet->twitter_account,
				'report_status' => $row['status']
			));
			endforeach; 
		?>
		</div>
	<?php endif; ?>

<?php endwhile; endif; wp_reset_postdata(); ?>

<?php get_footer(); ?>