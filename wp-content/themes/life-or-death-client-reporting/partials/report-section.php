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

<div class="report__item" data-facebook="<?php echo $facebook; ?>" data-twitter="<?php echo $twitter; ?>">
	<h1><?php echo $name; ?></h1>
	<p>Status:  <?php echo $report_status; ?></p>
	<p>Type: <?php echo $outlet_type; ?></p>
	<p>Descrption: <?php echo $outlet_description; ?></p>
	<p>Circulation: <?php echo $outlet_circulation; ?></p>
	<p>Site Stats: <?php echo $outlet_site_visits; ?></p>
	<p>Feature Notes: <?php echo $notes; ?></p>
	<p>Feature Links: <?php echo $links; ?></p>
	<div class="report__social">
		<p>Facebook: <?php echo $facebook; ?></p>
		<p>Twitter: <a href="https://twitter.com/<?php echo $twitter; ?>" class="twitter-follow-button"
  ><?php echo $twitter; ?></a></p>
	</div>
</div>

