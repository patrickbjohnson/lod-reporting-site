<?php
/* Template Name: Reports */


is_logged_in();

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


<?php if ( $the_query->have_posts() ) : ?>
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	<?php endwhile; wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php _e( 'Sorry, no reports just yet.' ); ?></p>
<?php endif; ?>

<?php get_footer(); ?>





