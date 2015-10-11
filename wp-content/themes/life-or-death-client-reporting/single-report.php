<?php
	include( get_template_directory() . '/functions/data/class-report-view-model.php' );
	$report = new Report_View_Model( $post );

	// check if current user matches the report user
	// or if the current user is an admin
	// if not, send them back to their admin page
	if ($current_user->ID != $report->report_client['ID'] && !current_user_can('manage_options')) {
		wp_redirect( site_url() . '/wp-admin' );
	}
	
	// Get all report content
	// then sort it and get ready to be printed to the screen
	$features_recap = sort_repeater('features_recap');
	$tours_recap = sort_repeater('tour_recap');
	$pending_recap = sort_repeater('pending_recap');
	$passed_recap = sort_repeater('passed_recap');
	$news_recap = sort_repeater('news_recap');

	get_header();
?>

<?php the_partial('nav'); ?>


	
	<?php if ( have_post ) : while ( have_posts() ) : the_post(); ?>
		<div class="hero">
			<div class="page-container">
				<h2 class="hero__client"><?php echo $current_user->display_name; ?></h2>
				<h1 class="hero__title"><?php echo $report->get_title(); ?></h1>
				<?php if ($report->label) : ?>
					<h3 class="hero__label"><?php echo $report->label; ?></h3>
				<?php endif; ?>
				<h4 class="hero__date"><?php echo $report->report_date; ?></h4>
			</div>
		</div>
		<div class="page-container">
		<?php if( $features_recap ): ?>
			<div class="report" id="features">
			<h1 class="report__title">Features</h1>
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
			<div class="report" id="tours">
			<h1 class="report__title">Tours</h1>
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

		<?php if( $pending_recap ): ?>
			<div class="report" id="pending">
			<h1 class="report__title">Pending</h1>
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

		<?php if( $passed_recap ): ?>
			<div class="report" id="passed">
			<h1 class="report__title">Passed</h1>
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

		<?php if( $news_recap ): ?>
			<div class="report" id="news">
			<h1 class="report__title">News</h1>
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
		</div>
	<?php endwhile; endif; wp_reset_postdata(); ?>
</div>


<?php get_footer(); ?>