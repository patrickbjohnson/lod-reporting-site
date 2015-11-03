<?php 

$result = add_role( 'client', __('Client' ), array(
	'read' 				=> true, // true allows this capability
	'edit_posts' 		=> false, // Allows user to edit their own posts
	'edit_pages' 		=> false, // Allows user to edit pages
	'edit_others_posts' => false, // Allows user to edit others posts not just their own
	'create_posts' 		=> false, // Allows user to create new posts
	'manage_categories' => false, // Allows user to manage post categories
	'publish_posts' 	=> false, // Allows the user to publish, otherwise posts stays in draft mode
	)
);