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
<div class="page-container">
	<div class="hero">
		<h1>Artist Name</h1>
		<h2>Project Name / Album Name</h2>
		
	</div>
	<h1><?php echo $post->get_title(); ?></h1>
	<?php if ( $the_query->have_posts() ) : ?>
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); $report = new Report_View_Model( $post );?>
			<a href="<?php the_permalink(); ?>"><?php echo $report->get_title(); ?></a>
			<p>Date: <?php echo $report->report_date; ?></p>
			<p>Overview: </p>
			<?php if( have_rows('pull_quotes') ): ?>
			    <?php while ( have_rows('pull_quotes') ) : the_row(); ?>
					<blockquote>
						<?php  
							the_sub_field('quote_text');
							the_sub_field('quote_attribution');	
						?>
					</blockquote>
			    <?php endwhile; ?>
			<?php endif; ?>

		<?php endwhile; wp_reset_postdata(); ?>

	<?php else : ?>
		<p><?php _e( 'Sorry, no reports just yet.' ); ?></p>
	<?php endif; ?>

	<?php get_footer(); ?>
</div>






