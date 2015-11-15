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
	$pending_recap = sort_repeater('pending_recap');
	$passed_recap = sort_repeater('passed_recap');
	$news_recap = sort_repeater('news_recap');
	$tv_radio_recap = sort_repeater('tv_radio_recap');
	$reviews_recap = sort_repeater('reviews_recap');


	// $dompdf = new DOMPDF();
	// $html = "<h1>hello this is some html";
	// $dompdf->load_html($html);
	// $dompdf->render();

	get_header();
?>

<?php the_partial('nav'); ?>
	
<?php if ( have_post ) : while ( have_posts() ) : the_post(); ?>
	<div class="hero">
		<div class="page-container">
			<h2 class="hero__client"><?php echo $report->report_client['display_name']; ?></h2>
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
				'outlet_circulation' => $media_outlet->set_number_format($media_outlet->outlet_circulation),
				'outlet_site_visits' => $media_outlet->set_number_format($media_outlet->outlet_website_visits),
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

	<?php if( $reviews_recap ): ?>
		<div class="report" id="reviews">
		<h1 class="report__title">Reviews</h1>
		<?php foreach( $reviews_recap as $i => $row ) : $media_outlet = new Report_View_Model ( $row['post'] ); 
			the_partial('report-section', array(
				'name'	=> $row['post']->post_title,
				'outlet_type' => $media_outlet->outlet_type,
				'outlet_description' => $media_outlet->outlet_description,
				'outlet_circulation' => $media_outlet->set_number_format($media_outlet->outlet_circulation),
				'outlet_site_visits' => $media_outlet->set_number_format($media_outlet->outlet_website_visits),
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
		
	
	<?php  if( have_rows('tour_recap') ): ?>

		<div class="report" id="tours">
			<h1 class="report__title">Tour Press</h1>
		    <?php while ( have_rows('tour_recap') ) : the_row(); 
				$tour_report = get_sub_field('tour_report');

				$market_report = array(
					'name' => get_sub_field('tour_market'),
					'date' => get_sub_field('tour_date'),
					'markets' => array(
						'confirmed' => array(),
						'pitched' => array(),
						'passed' => array()
					)
				);

				foreach ($tour_report as $key => $value) {
					$market_report['markets'][$value['pitch_status']][$key] = array(
						'title' => $value['media_outlet']->post_title,
						'pitch_status' => $value['pitch_status'],
						'report_status' => $value['report_status'],
						'notes' => $value['notes'],
						'link' => $value['links'],
						'post' => $value['media_outlet'],
					);					
				}

				foreach ($market_report['markets'] as $key => $value) {
					array_multisort( $market_report['markets'][$key], SORT_ASC );	
				}; 
			?>

			<?php if ( $market_report['markets']['confirmed'] || $market_report['markets']['pitched'] || $market_report['markets']['passed']): ?>
				<div class="report__sub-group">
					<h1 class="report__subtitle">
					<?php echo $market_report['date'];?> - <?php echo $market_report['name']; ?></h1>
					<div class="report__tour-group">
						<?php if ($market_report['markets']['confirmed']): ?>
							<h2 class="report__subtitle report__subtitle--small">Confirmed</h2>
							<?php foreach( $market_report['markets']['confirmed'] as $i => $row ) : $media_outlet = new Report_View_Model ( $row['post'] ) ;
								the_partial('report-section', array(
									'name'	=> $row['post']->post_title,
									'outlet_type' => $media_outlet->outlet_type,
									'outlet_description' => $media_outlet->outlet_description,
									'outlet_circulation' => $media_outlet->set_number_format($media_outlet->outlet_circulation),
									'outlet_site_visits' => $media_outlet->set_number_format($media_outlet->outlet_website_visits),
									'notes' => $row['notes'],
									'links' => $row['links'],
									'facebook' => $media_outlet->facebook_account,
									'twitter' => $media_outlet->twitter_account,
									'report_status' => $row['status']
								));
								endforeach; 
							?>
						<?php endif ?>
						
					</div>
					<div class="report__tour-group">
						<?php if ( $market_report['markets']['pitched'] ): ?>
							<h2 class="report__subtitle report__subtitle--small">Pitched</h2>
							<?php foreach( $market_report['markets']['pitched'] as $i => $row ) : $media_outlet = new Report_View_Model ( $row['post'] ) ;
								the_partial('report-section', array(
									'name'	=> $row['post']->post_title,
									'outlet_type' => $media_outlet->outlet_type,
									'outlet_description' => $media_outlet->outlet_description,
									'outlet_circulation' => $media_outlet->set_number_format($media_outlet->outlet_circulation),
									'outlet_site_visits' => $media_outlet->set_number_format($media_outlet->outlet_website_visits),
									'notes' => $row['notes'],
									'links' => $row['links'],
									'facebook' => $media_outlet->facebook_account,
									'twitter' => $media_outlet->twitter_account,
									'report_status' => $row['status']
								));
								endforeach; 
							?>
						<?php endif ?>
						
					</div>
					<div class="report__tour-group">
						<?php if ( $market_report['markets']['passed'] ): ?>
							<h2 class="report__subtitle report__subtitle--small">Passed</h2>
							<?php foreach( $market_report['markets']['passed'] as $i => $row ) : $media_outlet = new Report_View_Model ( $row['post'] ) ;
								the_partial('report-section', array(
									'name'	=> $row['post']->post_title,
									'outlet_type' => $media_outlet->outlet_type,
									'outlet_description' => $media_outlet->outlet_description,
									'outlet_circulation' => $media_outlet->set_number_format($media_outlet->outlet_circulation),
									'outlet_site_visits' => $media_outlet->set_number_format($media_outlet->outlet_website_visits),
									'notes' => $row['notes'],
									'links' => $row['links'],
									'facebook' => $media_outlet->facebook_account,
									'twitter' => $media_outlet->twitter_account,
									'report_status' => $row['status']
								));
								endforeach; 
							?>
						<?php endif ?>
						
					</div>
				</div>
			<?php endif ?>

				
		    <?php endwhile; ?>
			</div>

	<?php endif; ?>


	<?php if( $pending_recap ): ?>
		<div class="report" id="pending">
		<h1 class="report__title">Pending</h1>
		<?php foreach( $pending_recap as $i => $row ) : $media_outlet = new Report_View_Model ( $row['post'] ); 
			the_partial('report-section', array(
				'name'	=> $row['post']->post_title,
				'outlet_type' => $media_outlet->outlet_type,
				'outlet_description' => $media_outlet->outlet_description,
				'outlet_circulation' => $media_outlet->set_number_format($media_outlet->outlet_circulation),
				'outlet_site_visits' => $media_outlet->set_number_format($media_outlet->outlet_website_visits),
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
		<?php foreach( $passed_recap as $i => $row ) : $media_outlet = new Report_View_Model ( $row['post'] ); 
			the_partial('report-section', array(
				'name'	=> $row['post']->post_title,
				'outlet_type' => $media_outlet->outlet_type,
				'outlet_description' => $media_outlet->outlet_description,
				'outlet_circulation' => $media_outlet->set_number_format($media_outlet->outlet_circulation),
				'outlet_site_visits' => $media_outlet->set_number_format($media_outlet->outlet_website_visits),
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
		<?php foreach( $news_recap as $i => $row ) : $media_outlet = new Report_View_Model ( $row['post'] ); 
			the_partial('report-section', array(
				'type'  => 'news',
				'name'	=> $row['post']->post_title,
				'outlet_type' => $media_outlet->outlet_type,
				'links' => $row['links'],
				'report_status' => $row['status']
			));
			endforeach; 
		?>
		</div>
	<?php endif; ?>


	<?php if( $tv_radio_recap ): ?>
		<div class="report" id="radio">
		<h1 class="report__title">TV / Radio</h1>
		<?php foreach( $tv_radio_recap as $i => $row ) : $media_outlet = new Report_View_Model ( $row['post'] ); 
			the_partial('report-section', array(
				'name'	=> $row['post']->post_title,
				'outlet_type' => $media_outlet->outlet_type,
				'outlet_description' => $media_outlet->outlet_description,
				'outlet_circulation' => $media_outlet->set_number_format($media_outlet->outlet_circulation),
				'outlet_site_visits' => $media_outlet->set_number_format($media_outlet->outlet_website_visits),
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