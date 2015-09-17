<?php 
	get_header();
 ?>

<div id="container">
	<div id="content" role="main">

		<?php the_post(); ?>
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

	</div><!-- #content -->
</div><!-- #container -->

<?php get_footer(); ?>