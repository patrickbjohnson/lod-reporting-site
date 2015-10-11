<?php 
	$features_recap = sort_repeater('features_recap');
	$tours_recap = sort_repeater('tour_recap');
	$pending_recap = sort_repeater('pending_recap');
	$passed_recap = sort_repeater('passed_recap');
	$news_recap = sort_repeater('news_recap');
?>

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

		
		
		
	</div>
</nav>