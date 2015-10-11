<?php 
	is_logged_in();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?><?php wp_title(' | ', true, 'left'); ?></title>
    
    <?php wp_head(); ?>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.ico">
</head>
<?php 
disable_wp_admin_bar();
 show_admin_bar( false );
?>
<body <?php body_class(); ?>>