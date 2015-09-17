<?php
	get_header();

	include( get_template_directory() . '/functions/data/class-report-view-model.php' );

	$report = new Report_View_Model( $post );



?>

<?php if ( have_post ) : while ( have_posts() ) : the_post(); ?>
	<h1><?php echo $report->get_title(); ?></h1>
	<h2>Report Date: <?php echo $report->report_date; ?></h2> 

	<?php if( have_rows('features_recap') ): ?>
		<h2>Features</h2>
		<?php while ( have_rows('features_recap') ) : the_row();
	        $media_outlet = new Report_View_Model ( get_sub_field('media_outlet') ); ?>
	        <div class="report">
	        	<p>Media Outlet Name: <?php echo $media_outlet->get_title(); ?></p>
	        	<p>Media Outlet Type: <?php echo $media_outlet->outlet_type; ?></p>
	        	<p>Feature Notes: <?php echo get_sub_field('feature_notes'); ?></p>
	        	<p>Feature Links: <?php echo get_sub_field('feature_links'); ?></p>	
	        </div>
	        <hr>
	    <?php endwhile; ?>

	<?php endif; ?>

	<?php if( have_rows('tour_recap') ): ?>
		<h2>tour</h2>
		<?php while ( have_rows('tour_recap') ) : the_row();
	        $media_outlet = new Report_View_Model ( get_sub_field('media_outlet') ); ?>
	        <p>Media Outlet Type: <?php echo $media_outlet->outlet_type; ?></p>
	        <p>Feature Notes: <?php echo get_sub_field('feature_notes'); ?></p>
	        <p>Feature Links: <?php echo get_sub_field('feature_links'); ?></p>
	    <?php endwhile; ?>

	<?php endif; ?>

<?php endwhile; endif; wp_reset_postdata();?>

<?php 

	get_footer();
?>