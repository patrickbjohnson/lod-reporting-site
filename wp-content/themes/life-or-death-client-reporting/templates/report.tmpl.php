<?php
/* Template Name: Reports */
include( get_template_directory() . '/functions/lib/data/class-post-view-model.php' );
include( get_template_directory() . '/functions/data/class-report-view-model.php' );

$post = new Post_View_Model($post);

get_header();

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

<main class="reporting-dashboard">
	<div class="hero">

		<h1><?php echo get_userdata($current_user->ID)->data->display_name; ?>'s Dashboard</h1>
	</div>

	<div class="page-container">
		<?php the_partial('report-section-title', array('title' => 'Reports')); ?>
		<?php if ( $the_query->have_posts() ) : ?>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); $report = new Report_View_Model( $post );?>

				<a href="<?php echo $report->get_permalink();?>" class="report-card report__item">
					<div class="report-card__header">
						<div class="report-card__header-group">
							<h2 class="report-card__title"><?php echo $report->get_title(); ?></h2>
						</div>
						<div class="report-card__header-group">
							<p class="report-card__date"><?php echo $report->report_date; ?></p>
							<?php if ( $report->label ) : ?>
							<p class="report-card__label"><?php echo $report->label; ?></p>
							<?php endif; ?>
						</div>
					</div>
					
					<?php if( have_rows('pull_quotes') ): ?>

						<?php ; ?>
						<div class="report-card__body report-card__grid report-card__grid-<? echo count( get_field( 'pull_quotes' ) ); ?>-up">
						<h3 class="report-card__subtitle report__item-title">Select Press Quotes</h3>
						    <?php while ( have_rows('pull_quotes') ) : the_row(); ?>
						    	<div class="report-card__quote report-card__grid-item">
						    		<blockquote>
						    			<?php  
						    				the_sub_field('quote_text');
						    				
						    			?>
						    			<footer>
						    				<cite><?php the_sub_field('quote_attribution');	 ?></cite>
						    			</footer>
						    		</blockquote>
						    	</div>
						    <?php endwhile; ?>
						</div>
					<?php endif; ?>
					
				</a>
				

			<?php endwhile; wp_reset_postdata(); ?>

		<?php else : ?>
			<p><?php _e( 'Sorry, no reports just yet.' ); ?></p>
		<?php endif; ?>

	</div>
</main>



<?php get_footer(); ?>





