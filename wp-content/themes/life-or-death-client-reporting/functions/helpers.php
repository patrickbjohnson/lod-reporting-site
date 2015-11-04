<?php
/* ------------------------------------------------------------
 *
 * CUSTOM HELPER FUNCTIONS
 *
 * Define any custom helper functions needed in the theme below.
 * 
 * ------------------------------------------------------------ */


// Alphabetically sorts content from ACF Field

function sort_repeater($variable) {
	$field = get_field($variable);

	if ( empty( $field ) ) return;

	$order = array();

	foreach ($field as $key => $value) {

		$order[$key] = array(
			'title'			=> $value['media_outlet']->post_title,
			'notes'			=> $value['feature_notes'],
			'links'			=> $value['feature_links'],
			'status'		=> $value['report_status'],
			'post'			=> $value['media_outlet']
		);
	}

	array_multisort( $order, SORT_ASC, $field );
	return $order;
}

function is_logged_in() {
	if (!is_user_logged_in()) {
	 wp_redirect( site_url() . '/wp-admin' );
	};
}

function disable_wp_admin_bar() {
	if ( ! current_user_can( 'manage_options' ) ) {
	    show_admin_bar( false );
	}
	?>
	<style>
		html { margin-top: 0 !important; }
		* html body { margin-top: 0 !important; }
		@media screen and ( max-width: 782px ) {
			html { margin-top: 0 !important; }
			* html body { margin-top: 0 !important; }
		}
	</style>
	<?php
}

if(function_exists('set_pdf_print_support')) {
  set_pdf_print_support(array('post', 'page', 'report'));
}


//Get Facebook Likes Count of a page
function fbLikeCount($fb_id){
	$app_id = '1659676727645012';
	$app_secret = '8fbeb085f9e5b281a1633ebdbe4522c9';

	//Construct a Facebook URL
	$json_url ='https://graph.facebook.com/' . $fb_id . '?access_token=' . $app_id . '|' . $app_secret . '&fields=likes';
	$json = file_get_contents( $json_url );
	$json_output = json_decode( $json );
 
	//Extract the likes count from the JSON object
	if( $json_output ){
		return number_format( $json_output->likes );
	} else {
		return 0;
	}
}


function twitter_follower_count($user) {
	$settings = array(
	    'oauth_access_token' => "3990303016-sYVmj2iuoEsKJ1wsQfIY2X7hP5DejxhU0DppZS7",
	    'oauth_access_token_secret' => "oc0BD1qqndSKGjYTpMUOvVrhhgPYVoqSQEufJIjjWusZt",
	    'consumer_key' => "i5YkgcbJ6uWtnK64SkquhiwLn",
	    'consumer_secret' => "g5UQqBVMyfPFy4A2GsorusjiWhqUCNzhUcd47gZHxNDnEtd0B9"
	);

	$url = "https://api.twitter.com/1.1/users/show.json";
	$getfield = '?screen_name=' . $user;
	$requestMethod = 'GET';
	$twitter = new TwitterAPIExchange( $settings );

	$twitter_data = $twitter->setGetfield( $getfield )
	             			->buildOauth( $url, $requestMethod )
	             			->performRequest();

	$get_count = json_decode( $twitter_data, true );
	return number_format( $get_count['followers_count'] );  
}



function test_post_publish( $post_id, $post, $update ) {
		
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

		// If this is just a revision, don't send the email.
		if ( wp_is_post_revision( $post_id ) ) return;

		$post_title = get_the_title( $post_id );
		$post_url = get_permalink( $post_id );
		$subject = 'A post has been updated';

		$message = "A post has been updated on your website:\n\n";
		$message .= $post_title . ": " . $post_url;

		// // Send email to admin.
		wp_mail( 'p@pbj.me', $subject, $message );
}


add_action( 'save_post_report', 'test_post_publish', 10, 1 );
// add_action(  'publish_report',  'test_post_publish', 10, 2 );
// add_action('future_to_publish', 'test_post_publish');
// add_action('new_to_publish', 'test_post_publish');
// add_action('draft_to_publish' ,'test_post_publish');
// add_action('auto-draft_to_publish' ,'test_post_publish');


// add_action(  'new_to_publish',  'test_post_publish', 10, 1 );
// add_action(  'draft_to_publish',  'test_post_publish', 10, 1 );
// add_action(  'pending_to_publish',  'test_post_publish', 10, 1 );

