<?php 
	if ( !isset( $name ) ) $name = '';
	if ( !isset( $outlet_type ) ) $outlet_type = '';
	if ( !isset( $outlet_description ) ) $outlet_description = '';
	if ( !isset( $outlet_circulation ) ) $outlet_circulation = '';
	if ( !isset( $outlet_site_visits ) ) $outlet_site_visits = '';
	if ( !isset( $notes ) ) $notes  = '';
 	if ( !isset( $links ) )  $links = '';
 	if ( !isset( $facebook ) )  $facebook = '';
 	if ( !isset( $twitter ) )  $twitter = '';
 	if ( !isset( $report_status ) )  $report_status = '';
?>

<div class="report__item" <?php echo $facebook ? 'data-facebook="' . $facebook . '"' : '' ; ?> <?php echo $twitter ? 'data-twitter="' . $twitter . '"' : '' ; ?>">
	<div class="report__header">
		<h1 class="report__item-title">
			<?php echo $name; ?> 
			<?php if ( $report_status ) : ?>
				<span class="report__status <?php echo $report_status === 'New' ? 'report__status--new' : '' ;?>" ><?php echo $report_status; ?></span>
			<?php endif; ?>
		</h1>
		<div class="report__outlet-description">
		<?php echo $outlet_description; ?>
		</div>
		<ul class="list-unstyled report__stats">
			<li class="report__stats-item">Circulation: <?php echo $outlet_circulation; ?></li>
			<li class="report__stats-item">Unique Visitors: <?php echo $outlet_site_visits; ?></li>
			<?php if ($facebook) : ?>
				<li class="report__stats-item">
					<img src="<?php BPAssetHelper::the_image('icon-facebook.svg');?>" alt="">	
					<?php echo fbLikeCount($facebook) ?>
				</li>
			<?php endif; ?>
			<?php if ( $twitter ) : ?>
				<li class="report__stats-item">
					<img src="<?php BPAssetHelper::the_image('icon-twitter.svg');?>" alt="">
					<?php echo twitter_follower_count($twitter); ?>
				</li>
			<?php endif; ?>
		</ul>
	</div>
	<div class="notes">
		<h2 class="report__notes-title">Notes</h2>
		<?php echo $notes; ?>
		<p><a href="<?php echo $links; ?>"><?php echo $links; ?></a>
	</div>
</div>

