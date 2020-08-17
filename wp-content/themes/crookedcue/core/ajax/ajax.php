<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

////// S=Get Location data according to location
add_action( 'wp_ajax_getlocationdata', 'getlocation' );
add_action( 'wp_ajax_nopriv_getlocationdata', 'getlocation' );	

function getlocation(){

function requireToVar($file){
    ob_start();
    require($file);
    return ob_get_clean();
}
//$test=requireToVar($test);
$sidebarlocation  = ''; 
$testimoniallist = new WP_Query('posts_per_page=-1&post_type=global&orderby=menu_order&order=ASC');
$sidebarlocation  .= '<li><a class="scroll" href="#Location">Location</a></li>';
$sidebarlocation  .= '<li><a id="autoclick" class="scroll" href="#PartyInformation">Party Information</a></li>';
if($testimoniallist->have_posts()) : while($testimoniallist->have_posts()): $testimoniallist->the_post();
//echo get_field('mississauga_location_featured_thumb'); die;
$data = array();
	if($_REQUEST['locationname'] === 'Mississauga'){
		 $data['image'] =   get_field( "mississauga_location_featured_thumb" );
		 $data['locationname'] =   get_field('mississauga_location_title');//get_field( "location_title" );
		 $data['locationphone'] =  get_field('mississauga_phone');
		 $data['location_address'] =  get_field( "mississauga_address" );
		 $data['display'] =  'Mississauga';
		 $data['displaynone'] =  'Etobicoke';
		 //$data['partyinfo'] = requireToVar( get_parent_theme_file_path( '/core/locations/mississauga.php' ));

    $term_id  = 26;
    $taxonomy = 'product_cat';

    // Get subcategories of the current category
    $terms    = get_terms([
        'taxonomy'    => $taxonomy,
        'hide_empty'  => true,
        'parent'      => 26
    ]);

    $output = '';

    // Loop through product subcategories WP_Term Objects
    foreach ( $terms as $term ) { 
        $term_link = get_term_link( $term, $taxonomy );

        $catid =  $term->term_id;

              $sidebarlocation .= '<li><a class="scroll" href="#'.str_replace(' ', '', $term->name).'">'.$term->name.'</a></li>';


    }
$data['sidebarcat'] = $sidebarlocation; 

	}


	if($_REQUEST['locationname'] === 'Etobicoke'){

		$data['image'] =   get_field( "etobicoke_location_featured_thumb" );
		$data['locationname'] = get_field( "etobicoke_location_title" );
		$data['locationphone'] =  get_field( "etobicoke_phone" );
		$data['location_address'] =  get_field( "etobicoke_address" );
		$data['display'] =  'Etobicoke';
		$data['displaynone'] =  'Mississauga';

		    $term_id  = 27;
    $taxonomy = 'product_cat';

    // Get subcategories of the current category
    $terms    = get_terms([
        'taxonomy'    => $taxonomy,
        'hide_empty'  => true,
        'parent'      => 27
    ]);

    $output = '';

    // Loop through product subcategories WP_Term Objects
    foreach ( $terms as $term ) { 
        $term_link = get_term_link( $term, $taxonomy );

        $catid =  $term->term_id;
         $term->name;
         $sidebarlocation .= '<li><a class="scroll" href="#E'.str_replace(' ', '', $term->name).'">'.$term->name.'</a></li>';
    }

    $data['sidebarcat'] = $sidebarlocation; 
		//$data['partyinfo'] = include get_parent_theme_file_path( '/core/locations/etobicoke.php' );
	}
endwhile; endif; wp_reset_query();	
echo json_encode($data);
die;	
}


////// Set Party info and org info to session
add_action( 'wp_ajax_setsession', 'setsessiondata' );
add_action( 'wp_ajax_nopriv_setsession', 'setsessiondata' );	

function setsessiondata(){

	session_start();


	foreach ($_REQUEST['partyinfo'] as $key => $value) {
		if($value){
			$_SESSION['partyinfo'][$key] = $value;
		}
	}

	foreach ($_REQUEST['organizerinfo'] as $keyorg => $valueorg) {
				if($valueorg){
			$_SESSION['organizerinfo'][$keyorg] = $valueorg;
		}
	}

$_SESSION['partyname'] = $_REQUEST['partyname'];
$_SESSION['extraguest'] = $_REQUEST['extraguest'];
$_SESSION['locationname'] = $_REQUEST['locationname'];


/*
Calculate Plate per person
*/
global $woocommerce;
	
	$totalperson = $_REQUEST['partyinfo']['3']['value'];	
	$_SESSION['cost_per_person'] = $woocommerce->cart->total / 10;
exit;
die;	
}


////// S=Get Location data according to location
add_action( 'wp_ajax_rsvpconfirmation', 'rsvpconfirmation' );
add_action( 'wp_ajax_nopriv_rsvpconfirmation', 'rsvpconfirmation' );	

function rsvpconfirmation(){

	//echo "<pre>"; print_r($_REQUEST); die('sa');


	$email = $_REQUEST['getrsvpformdata']['0']['value'];
	$name = $_REQUEST['getrsvpformdata']['1']['value'];
	$yesno = $_REQUEST['getrsvpformdata']['2']['value'];
	$postid = $_REQUEST['getrsvpformdata']['3']['value'];
	$fromid = $_REQUEST['getrsvpformdata']['4']['value'];
	$fromemail = $_REQUEST['getrsvpformdata']['5']['value'];
	$guestquantity = $_REQUEST['getrsvpformdata']['6']['value'];


	global $wpdb;
	$table = $wpdb->prefix.'rsvp_attendee';
    //echo "SELECT * FROM $table WHERE attendee_email = '".$email."' and post_id = '".$postid."'";
	$datum = $wpdb->get_results("SELECT * FROM $table WHERE attendee_email = '".$email."' and post_id = '".$postid."'");
	
	//echo $datum['0']->attendee_email;
	//echo $datum['0']->post_id;
	if($email == @$datum['0']->attendee_email && $postid == @$datum['0']->post_id){
		echo 301;
		die;
	} 


$data = array('post_id' => $postid, 'attendee_name' => $name, 'attendee_email' => $email, 'attendee_status' => $yesno, 'fromid' => $fromid, 'fromemail' => $fromemail , 'additional_guest' => $guestquantity  );
$format = array('%d','%s','%s','%s','%d','%s','%d');
$wpdb->insert($table,$data,$format);
if($wpdb->insert_id){
	if($guestquantity){

		$guestif = 'I will be attending with $guestquantity additional guests I will see you there';
	}
	$regard = "<br>Regards<br>$name";
	$eventname = get_the_title( $postid ); 
	$username =  get_the_author_meta( 'nickname', $fromid);

	if($yesno == 'yes'){
		//$subjectc "Subject: Invite Response from $name to $eventname";
		$body = "Hi $username <br><br>  Thank you for your kind invitation I will be delighted to attend the party.<br>$guestif  $regard";
	}
	if($yesno == 'no'){
		
		$body = 'Hi $username <br><br> Thank you for your kind invitation Unfortunately It will not be possible for me to attend.'.$regard ;
	}

	$to = $fromemail;
	$subject = "Subject: Invite Response from $name to $eventname";
	
	$headers = array('Content-Type: text/html; charset=UTF-8');
	 
	wp_mail( $to, $subject, $body, $headers );

  echo 200;	
}
else{echo 300;}

die;	
}

////// Send Rsvp Email
add_action( 'wp_ajax_senrevplink', 'sendrsvpemail' );
add_action( 'wp_ajax_nopriv_senrevplink', 'sendrsvpemail' );

function sendrsvpemail(){

$email = explode(',', $_REQUEST['emails']);
$rsvplink = $_REQUEST['rsvplink'];
$fromid = $_REQUEST['fromid'];
$fromemail = $_REQUEST['fromemail'];

$postid = $_REQUEST['postid'];
$partydate = $_REQUEST['partydate'];
$eventlocation = $_REQUEST['eventlocation'];

$eventname = get_the_title( $postid ); 
$body = '';
foreach ($email as $key => $value) {
	

	$linksend = '<a href="'.$rsvplink.'?fromid='.$fromid.'&fromemail='.$fromemail.'&sendtoemail='.$value.'">'.$rsvplink.'<a>';
	$textlink = $rsvplink.'?fromid='.$fromid.'&fromemail='.$fromemail.'&sendtoemail='.$value;
	$to = $value;//'sandeepchoudhary85@gmail.com';
	$subject = 'You are invited to - '.$eventname;
	$body .= 'I am inviting you to '. $eventname.', at the Crooked Cue - '.$eventlocation.' on '.$partydate;
	$body .= '<br><br>It would help us in organizing this event if you could please RSVP.    Even if you are not attending, please RSVP.';
	$body .= '<br><br>'.$linksend;
	$body .= '<br><br>If this button is not working in your email, copy and past the following link in your browser.<br>'.$textlink;
	$headers = array('Content-Type: text/html; charset=UTF-8');
	 
	wp_mail( $to, $subject, $body, $headers );


}
echo "200";
die;
}	
?>