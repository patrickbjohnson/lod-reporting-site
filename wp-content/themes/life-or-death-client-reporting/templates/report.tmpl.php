<?php
/* Template Name: Reports */
include( get_template_directory() . '/functions/lib/data/class-post-view-model.php' );
include( get_template_directory() . '/functions/data/class-report-view-model.php' );

$post = new Post_View_Model($post);

get_header();

// var_dump(wp_get_current_user());

$args = array(
	'post_type' => 'report',
	'posts_per_page' => -1

);

if ( !current_user_can( 'manage_options' ) ) {
	$args = array(
		'post_type' => 'report',
		'meta_key' => 'report_client',
		'meta_value' => $current_user->ID
	);
}


$the_query = new WP_Query( $args ); 

?>
<div class="page-container">
	<h1><?php echo $post->get_title(); ?></h1>
	<?php if ( $the_query->have_posts() ) : ?>
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
			$report = new Report_View_Model( $post );
		?>
			<a href="<?php the_permalink(); ?>"><?php echo $report->get_title(); ?></a>
			<p>Report Date:<?php echo $report->report_date; ?></p>
			<p>Report Overview:</p>

			<ul>
				<li>Features: <?php $report->count_updates($report->features_recap); ?> / <span>New: <?php echo $report->get_new_report_count('features_recap'); ?></span></li>
				<li>Tour: <?php $report->count_updates($report->tour_recap); ?> / <span>New: <?php echo $report->get_new_report_count('tour_recap'); ?></span></li>
				<li>Pending: <?php $report->count_updates($report->pending_recap); ?> / <span>New: <?php echo $report->get_new_report_count('pending_recap'); ?></span></li>
				<li>Passed: <?php $report->count_updates($report->passed_recap); ?> / <span>New: <?php echo $report->get_new_report_count('passed_recap'); ?></span></li>
				<li>News: <?php $report->count_updates($report->news_recap); ?> / <span>New: <?php echo $report->get_new_report_count('news_recap'); ?></span></li>
			</ul>

			
		<?php endwhile; wp_reset_postdata(); ?>

	<?php else : ?>
		<p><?php _e( 'Sorry, no reports just yet.' ); ?></p>
	<?php endif; ?>

	<?php get_footer(); ?>
</div>






