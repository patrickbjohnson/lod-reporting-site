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

function report_email_set_content_type(){
    return "text/html";
}
add_filter( 'wp_mail_content_type','report_email_set_content_type' );

function on_all_status_transitions( $new_status, $old_status, $post ) {
	if (get_post_type( $post_id ) != 'report') return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    $subject = '';
    
    $post_title = get_the_title( $post_id );
    
    $post_url = get_permalink( $post_id );
    
    $user_id = $_POST['acf']['field_55fa3ddba01bd'];
    $user_data = get_userdata( $user_id );
    $user_email = $user_data->user_email;
    $user_display_name = $user_data->display_name;

    $headers = 'From: Test Email <im@pbj.me>' . "\r\n";
    $message = "<h1>Hi " . $user_display_name . "!</h1>\n\n";
    
    if ( $old_status != 'publish'  &&  $new_status == 'publish' ) {
        $subject = 'Your Life or Death PR Report is Ready!';
    	$message .= "Your new report has been published and is ready to be viewed\n\n";
    	$message .= "Check it out <a href='" . $post_url . "'>here</a>";
    	wp_mail( $user_email, $subject, $message, $headers );    
    } 

    if ($old_status == 'publish' && $new_status == 'publish') {
    	$subject = 'Your Life or Death PR Report has been updated!';
    	$message .= "Your report has been updated!\n\n";
    	$message .= "Check it out <a href='" . $post_url . "'>here</a>";
    	wp_mail( $user_email, $subject, $message, $headers );    
    }
}
add_action(  'transition_post_status',  'on_all_status_transitions', 10, 3 );


