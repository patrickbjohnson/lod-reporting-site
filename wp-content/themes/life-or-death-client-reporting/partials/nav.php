<?php 
	$features_recap = sort_repeater('features_recap');
	$reviews_recap = sort_repeater('reviews_recap');
	$pending_recap = sort_repeater('pending_recap');
	$passed_recap = sort_repeater('passed_recap');
	$news_recap = sort_repeater('news_recap');
	$tv_radio_recap = sort_repeater('tv_radio_recap');
	$tours_recap = get_field('tour_recap', $post->ID);
?>

<?php if ($features_recap || $reviews_recap || $pending_recap || $passed_recap || $news_recap || $tv_radio_recap || $tours_recap) : ?>
	<nav class="nav">
		<button class="menu" data-js-component="nav">
			<span class="menu__bar"></span>
			<span class="menu__bar"></span>
			<span class="menu__bar"></span>
		</button>
		<div class="nav__wrapper">
			<?php if ( $features_recap ) : ?>
			<a class="nav__item" href="#features">Features</a>
			<?php endif; ?>

			<?php if ( $reviews_recap ) : ?>
			<a class="nav__item" href="#reviews">Reviews</a>
			<?php endif; ?>

			<?php if ( $tours_recap ) : ?>
			<a class="nav__item" href="#tours">Tour</a>
			<?php endif; ?>

			<?php if ( $pending_recap ) : ?>
			<a class="nav__item" href="#pending">Pending</a>
			<?php endif; ?>

			<?php if ( $passed_recap ) : ?>
			<a class="nav__item" href="#passed">Passed</a>
			<?php endif; ?>

			<?php if ( $news_recap ) : ?>
			<a class="nav__item" href="#news">News</a>
			<?php endif; ?>

			<?php if ( $tv_radio_recap ) : ?>
			<a class="nav__item" href="#radio">TV / Radio</a>
			<?php endif; ?>
		</div>
		<a href="#" class="nav__logo" target="_blank">
			<svg role="img" title="CodePen" viewBox="0 0 184 129">
			    <use xlink:href="<?php BPAssetHelper::the_image('svgsprite.svg');?>#lod-logo"/>
			</svg>
		</a>
	</nav>
<?php endif; ?>
