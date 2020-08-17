<?php 

ob_start();
add_action('template_redirect','redirect_visitor');
function redirect_visitor(){
    if ( is_page( 'cart' ) || is_cart() ) {
      
      //print_r(WC()->session); die;
      $eventlocation = WC()->session->get( 'orderlocation' );
        wp_safe_redirect(site_url('party-planner?'.$eventlocation));
        exit(); // Don't forget this one
    }
}


///// Code for update cart instantly 
add_filter( 'woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments', 'woocommerce_template_single_add_to_cart' );

function iconic_cart_count_fragments( $fragments ) {
    $fragments['div.header-cart-total'] = '<div class="header-cart-total">' . WC()->cart->get_cart_total() . '</div><input type="hidden" id="carttotal" id="carttotalforperson">';
    return $fragments;

}



///// Hook for customer account sidebar menus 
add_filter( 'woocommerce_account_menu_items' , 'jc_menu_panel_nav' );

function jc_menu_panel_nav() {
    $items = array(
        'dashboard'       => __( 'Dashboard', 'woocommerce' ),
        'orders'          => __( 'My Bookings', 'woocommerce' ),
        //'downloads'       => __( 'Downloads', 'woocommerce' ),
        'edit-address'    => __( 'Addresses', 'woocommerce' ),
        //'payment-methods' => __( 'Payment Methods', 'woocommerce' ),
        'edit-account'    => __( 'Account Details', 'woocommerce' ),
        'my-rsvp' => __( 'My Rsvp', 'woocommerce' ), // My custom tab here
        'customer-logout' => __( 'Logout', 'woocommerce' ),
    );

    return $items;
}



//// Add new class to product table 
add_filter( 'wc_product_table_row_class', function( $classes, $product ) { 
    $classes[] = 'white-bg';
    return $classes;
}, 10, 2 );




//// Remove fields from check out 
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
function custom_override_checkout_fields( $fields ) {
unset($fields['billing']['billing_first_name']);
unset($fields['billing']['billing_last_name']);
unset($fields['billing']['billing_company']);
unset($fields['billing']['billing_address_1']);
unset($fields['billing']['billing_address_2']);
unset($fields['billing']['billing_city']);
unset($fields['billing']['billing_postcode']);
unset($fields['billing']['billing_country']);
unset($fields['billing']['billing_state']);
unset($fields['billing']['billing_phone']);
unset($fields['order']['order_comments']);
unset($fields['billing']['billing_email']);
unset($fields['account']['account_username']);
unset($fields['account']['account_password']);
unset($fields['account']['account_password-2']);
return $fields;
}


//// remove payments fron check out 
add_filter( 'woocommerce_cart_needs_payment', '__return_false' );


///// Checkout page add party info or organizer info

function wc_register_guests( $order_id ) {
  //session_start();
  // get all the order data
  $order = new WC_Order($order_id);
  
  //get the user email from the order
  $order_email = $_SESSION['organizerinfo']['2']['value'];
    
  // check if there are any users with the billing email as user or email
  $email = email_exists( $order_email );  
  $user = username_exists( $order_email );
  

  // if the UID is null, then it's a guest checkout
  if( $user == false && $email == false ){
    
            // random password with 12 chars
      $random_password = wp_generate_password();       
      // create new user with email as username & newly created pw
      $user_id = wp_create_user( $order_email, $random_password, $order_email );

      $user_id_role = new WP_User($user_id);
      $user_id_role->set_role('customer');

    ////// Send Emails to user
      
      wp_new_user_notification( $user_id, $random_password);
  
  }

if(!$user_id){

  $user = get_user_by( 'email', $order_email );
    
        $user_id = $user->ID;

}
   



//WooCommerce guest customer identification
       // update_user_meta( $user_id, 'guest', 'yes' );

        update_user_meta($user_id, 'first_name', $_SESSION['organizerinfo']['1']['value']);       
        //user's billing data
        update_user_meta( $user_id, 'billing_address_1', $_SESSION['organizerinfo']['3']['value'] );        
        update_user_meta( $user_id, 'billing_company', $_SESSION['organizerinfo']['5']['value'] );        
        update_user_meta( $user_id, 'billing_email', $_SESSION['organizerinfo']['2']['value'] );
        update_user_meta( $user_id, 'billing_first_name', $_SESSION['organizerinfo']['1']['value'] );
        //update_user_meta( $user_id, 'billing_last_name', $_SESSION['organizerinfo']['0']['value'] );
        update_user_meta( $user_id, 'billing_phone', $_SESSION['organizerinfo']['4']['value'] );

        // user's shipping data
        update_user_meta( $user_id, 'shipping_address_1', $_SESSION['organizerinfo']['3']['value'] );       
        update_user_meta( $user_id, 'shipping_company', $_SESSION['organizerinfo']['5']['value'] );        
        update_user_meta( $user_id, 'shipping_first_name', $_SESSION['organizerinfo']['1']['value'] );
        //update_user_meta( $user_id, 'shipping_last_name', $_SESSION['organizerinfo']['0']['value'] );

        //// Extra Field for user register       

          update_user_meta( $user_id, 'Preferred_date_1' , $_SESSION['partyinfo']['0']['value']);
          update_user_meta( $user_id, 'Preferred_date_2' , $_SESSION['partyinfo']['1']['value']);
          update_user_meta( $user_id, 'Preferred_date_3' , $_SESSION['partyinfo']['2']['value']);
          update_user_meta( $user_id, 'number_of_guests' , $_SESSION['partyinfo']['3']['value']);
          update_user_meta( $user_id, 'partyporpus' , $_SESSION['partyinfo']['4']['value']);
          update_user_meta( $user_id, 'dite_comment' , $_SESSION['partyinfo']['5']['value']);
          update_user_meta( $user_id, 'order_comments' , $_SESSION['organizerinfo']['0']['value']);


        ///// Set Customer purchased by 
        update_post_meta($order_id, '_customer_user', $user_id);
        update_post_meta($order_id, 'event_order_location', $_SESSION['locationname']);
        update_post_meta($order_id, 'eventmedia', $_SESSION['partyinfo']['7']['value']);
        


///
//Create RSVP LINK
////

    $title = $_SESSION['partyname'].'-'.$_SESSION['partyinfo']['4']['value'].'-'.$order_id;
    $content =  $_SESSION['partyinfo']['6']['value'];
 
    $post_id = wp_insert_post( array(
        'post_type'         => 'rsvp_event',
        'post_title'        => $title,
        'post_content'      => $content,
        'post_status'       => 'pending',
        'post_author'       => $user_id
    ) );

        $posturl = "/wp-admin/post.php?post=".$post_id."&action=edit"; 
        update_post_meta($post_id, 'start_rsvp_date',  $_SESSION['partyinfo']['0']['value']);
        update_post_meta($post_id, 'end_rsvp_date',  $_SESSION['partyinfo']['0']['value'] );
        update_post_meta($post_id, 'assignrsvptouser',  $order_email );
        update_post_meta($post_id, 'order_party_type', $_SESSION['partyinfo']['4']['value']);
        update_post_meta($order_id, 'orderposturl',  $posturl );
        update_post_meta($post_id, 'event_location',  $_SESSION['locationname'] );
        update_post_meta($post_id, 'event_additional_guest',  $_SESSION['extraguest'] );
        update_post_meta($post_id, 'eventname',  $_SESSION['partyname'] );
        update_post_meta( $user_id, 'number_of_guests' , $_SESSION['partyinfo']['3']['value']);
        update_post_meta( $post_id, 'dite_comment' , $_SESSION['partyinfo']['5']['value']);


        if($_REQUEST['locationname'] === 'Mississauga'){
          $link = 'https://calendly.com/';
        }
        if($_REQUEST['locationname'] === 'Etobicoke'){
          $link = 'https://calendly.com/';
        }  
        update_post_meta($post_id, 'contact_consaltent',  $link );
        update_post_meta($order_id, 'orderpostid',  $post_id );






// Set a veriable for redirection (Optional)
$redirect_to = 'my-account';

/**
 * WordPress Auto login script
 */
if(!is_user_logged_in())
{
    // Take your username you want to keep for auto login.
    $username = $order_email;

    // Check if user exist by his username
    if($user = get_user_by('email', $username))
    {
        clean_user_cache($user->ID);

        // Removes all of the cookies associated with authentication
        wp_clear_auth_cookie();
        
        // Changes the current user by ID.
        wp_set_current_user($user->ID);

        // If secure domain then we have to set secure cookie
        wp_set_auth_cookie($user->ID, true, (!empty($_SERVER['HTTPS'])));

        update_user_caches($user);

        // If user logged in then do some action.
        if(is_user_logged_in())
        {
            // You can set redirect to create a new page
            $redirect_to = admin_url() . 'post-new.php?post_type=page';
        }
        else
        {
            // Set redirect to login page
            $redirect_to = wp_login_url();
        }
    }


}


  
}
 
//call our wc_register_guests() function on the thank you page
add_action( 'woocommerce_thankyou', 'wc_register_guests', 10, 1 );


/**
 * @snippet       Add Content to the Customer Processing Order Email - WooCommerce
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @testedwith    Woo 3.8
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
  
add_action( 'woocommerce_email_before_order_table', 'bbloomer_add_content_specific_email', 20, 4 );
  
function bbloomer_add_content_specific_email( $order, $sent_to_admin, $plain_text, $email ) {
   //if ( $email->id == 'customer_processing_order' ) {
      echo '<h2 class="email-upsell-title">Party Information</h2><p class="email-upsell-p">Thank you for Plane this Party!</p>';

}


/**
 * @snippet       Edit Order Functionality @ WooCommerce My Account Page
 * @how-to        Get CustomizeWoo.com FREE
 * @sourcecode    https://businessbloomer.com/?p=91893
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 4.1
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
  
// ----------------
// 1. Allow Order Again for Processing Status
  
add_filter( 'woocommerce_valid_order_statuses_for_order_again', 'bbloomer_order_again_statuses' );
  
function bbloomer_order_again_statuses( $statuses ) {
    $statuses[] = 'pending';
    return $statuses;
}
  
// ----------------
// 2. Add Order Actions @ My Account
  
add_filter( 'woocommerce_my_account_my_orders_actions', 'bbloomer_add_edit_order_my_account_orders_actions', 50, 2 );
  
function bbloomer_add_edit_order_my_account_orders_actions( $actions, $order ) {
    if ( $order->has_status( 'pending' ) ) {
      
      $orderlocation =  get_post_meta($order->get_id(), 'event_order_location',true);
      $orderposturl =  get_post_meta($order->get_id(), 'orderposturl',true);
      WC()->session->set( 'orderlocation',$orderlocation);

        $actions['edit-order'] = array(
            'url'  => wp_nonce_url( add_query_arg( array('orderlocation' => $orderlocation , 'order_again' => $order->get_id(), 'edit_order' => $order->get_id() ) ), 'woocommerce-order_again' ),
            'name' => __( 'Edit Order', 'woocommerce' )
        );
    }
    return $actions;
}
  
// ----------------
// 3. Detect Edit Order Action and Store in Session
  
add_action( 'woocommerce_cart_loaded_from_session', 'bbloomer_detect_edit_order' );
             
function bbloomer_detect_edit_order( $cart ) {
    if ( isset( $_GET['edit_order'], $_GET['_wpnonce'] ) && is_user_logged_in() && wp_verify_nonce( wp_unslash( $_GET['_wpnonce'] ), 'woocommerce-order_again' ) ) 
//echo "<pre>"; print_r(WC()->session); die;
      WC()->session->set( 'edit_order', absint( $_GET['edit_order'] ) );
      WC()->session->set( 'event_order_location', absint( @$_GET['orderlocation'] ) );
    
}
  
// ----------------
// 4. Display Cart Notice re: Edited Order
  
// add_action( 'woocommerce_before_cart', 'bbloomer_show_me_session' );
  
// function bbloomer_show_me_session() {
//     if ( ! is_cart() ) return;
//     $edited = WC()->session->get('edit_order');
//     if ( ! empty( $edited ) ) {
//         $order = new WC_Order( $edited );
//         $credit = $order->get_total();
//         //wc_print_notice( 'A credit of ' . wc_price($credit) . ' has been applied to this new order. Feel free to add products to it or change other details such as delivery date.', 'notice' );
//     }
// }
  
// ----------------
// 5. Calculate New Total if Edited Order
   
// add_action( 'woocommerce_cart_calculate_fees', 'bbloomer_use_edit_order_total', 20, 1 );
   
// function bbloomer_use_edit_order_total( $cart ) {
    
//   if ( is_admin() && ! defined( 'DOING_AJAX' ) ) return;
     
//   $edited = WC()->session->get('edit_order');
//   if ( ! empty( $edited ) ) {
//       $order = new WC_Order( $edited );
//      // $credit = -1 * $order->get_total();
//       //$cart->add_fee( 'Credit', $credit );
//   }
    
// }
  
// ----------------
// 6. Save Order Action if New Order is Placed
  
add_action( 'woocommerce_checkout_update_order_meta', 'bbloomer_save_edit_order' );
   
function bbloomer_save_edit_order( $order_id ) {
    $edited = WC()->session->get( 'edit_order' );
    if ( ! empty( $edited ) ) {

        // update this new order
        update_post_meta( $order_id, '_edit_order', $edited );

        //$orderposturl =  get_post_meta($edited , 'orderposturl',true);
        

        $user_id = get_post_meta($edited, '_customer_user', true);
        update_post_meta($order_id, '_customer_user', $user_id);

       $orderpostid =  get_post_meta($order_id, 'orderpostid',  true );

        $link = get_post_meta($orderpostid, 'contact_consaltent',  true);        
        update_post_meta($post_id, 'contact_consaltent',  $link );

        $posturl = "/wp-admin/post.php?post=".$post_id."&action=edit";
        update_post_meta($order_id, 'orderposturl',  $posturl );

        $neworder = new WC_Order( $order_id );
        $oldorder_edit = get_edit_post_link( $edited );
        $neworder->add_order_note( 'Order placed after editing. Old order number: <a href="' . $oldorder_edit . '">' . $edited . '</a>' );
        // cancel previous order
        $oldorder = new WC_Order( $edited );
        $neworder_edit = get_edit_post_link( $order_id );
        $oldorder->update_status( 'cancelled', 'Order cancelled after editing. New order number: <a href="' . $neworder_edit . '">' . $order_id . '</a> -' );
        WC()->session->set( 'edit_order', null );
    }
}



///// Change update cart text

function change_update_cart_text( $translated, $text, $domain ) {
    if( is_cart() && $translated == 'Update cart' ){
        $translated = 'Update Order';
    }
    if( is_cart() && $translated == 'Cart totals' ){
        $translated = __('Party Cost', 'woocommerce');
    }
    if( is_cart() && $translated == 'Proceed to checkout' ){
        $translated = __('View Order Summary', 'woocommerce');
    }
    return $translated;
}
add_filter( 'gettext', 'change_update_cart_text', 20, 3 );



add_filter( 'woocommerce_order_button_text', 'misha_custom_button_text' );
 
function misha_custom_button_text( $button_text ) {
   return 'Book'; // new text is here 
}



add_action( 'woocommerce_thankyou', 'woocommerce_thankyou_change_order_status', 10, 1 );
function woocommerce_thankyou_change_order_status( $order_id ){
    if( ! $order_id ) return;

    $order = wc_get_order( $order_id );

    if( $order->get_status() == 'processing' )
        $order->update_status( 'Pending payment' );
}


////////// Registration fields

    function wooc_extra_register_fields() {?>
           <p class="form-row form-row-wide">
           <label for="reg_billing_phone"><?php _e( 'Phone', 'woocommerce' ); ?></label>
           <input type="text" class="input-text" name="billing_phone" id="reg_billing_phone" value="<?php esc_attr_e( @$_POST['billing_phone'] ); ?>" />
           </p>
           <p class="form-row form-row-first">
           <label for="reg_billing_first_name"><?php _e( 'First name', 'woocommerce' ); ?><span class="required">*</span></label>
           <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
           </p>
           <p class="form-row form-row-last">
           <label for="reg_billing_last_name"><?php _e( 'Last name', 'woocommerce' ); ?><span class="required">*</span></label>
           <input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
           </p>
           <div class="clear"></div>
           <?php
     }
     add_action( 'woocommerce_register_form_start', 'wooc_extra_register_fields' );

add_action( 'woocommerce_register_form', 'wc_register_form_password_repeat' );
function wc_register_form_password_repeat() {
?>
<p class="form-row form-row-wide">
<label for="reg_password2"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
    <input type="password" class="input-text" name="password2" id="reg_password2" value="<?php if ( ! empty( $_POST['password2'] ) ) echo esc_attr( $_POST['password2'] ); ?>" />
</p>
<?php
}

/**
 * Notify admin when a new customer account is created
 */
add_action( 'woocommerce_created_customer', 'woocommerce_created_customer_admin_notification' );
function woocommerce_created_customer_admin_notification( $customer_id ) {
  wp_send_new_user_notifications( $customer_id, 'admin' );
}


/////////////Rsvp Section Start here

function create_rsvp() {
    register_post_type( 'rsvp_event',
        array(
            'labels' => array(
                'name' => 'Rsvp',
                'singular_name' => 'Rsvp Event',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Rsvp Event',
                'edit' => 'Edit',
                'edit_item' => 'Edit Rsvp Event',
                'new_item' => 'New Rsvp Event',
                'view' => 'View',
                'view_item' => 'View Rsvp Event',
                'search_items' => 'Search Rsvp',
                'not_found' => 'No Rsvp Events found',
                'not_found_in_trash' => 'No Rsvp Events found in Trash',
                'parent' => 'Parent Rsvp Event'
            ),
 
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'editor', 'comments', 'thumbnail', 'custom-fields' , 'author' ),
            'taxonomies' => array( '' ),
            'menu_icon' => plugins_url( 'images/image.png', __FILE__ ),
            'has_archive' => true
        )
    );
}

add_action( 'init', 'create_rsvp' );

////// Add Metaboxes to rsvp 
function myplugin_add_meta_box() {

    add_meta_box(
        'start-event-date',
        'Event Start Dates',
        'myplugin_meta_box_callback',
        'rsvp_event'
    );

    add_meta_box(
        'end-event-date',
        'End Start Dates',
        'myplugin_meta_box_callback2',
        'rsvp_event'
    );

  add_meta_box(
        'assign-rsvppost-to-user',
        'Assign This Rsvp',
        'myplugin_meta_box_callback3',
        'rsvp_event'
    );

  add_meta_box(
        'event_additional_guest',
        'Allow Additional Number Of Guest',
        'myplugin_meta_box_callback4',
        'rsvp_event'
    );
  add_meta_box(
        'event_location',
        'Event Location',
        'myplugin_meta_box_callback5',
        'rsvp_event'
    );
}

function myplugin_meta_box_callback4(){
  global $post;
  $datef =  get_post_meta($post->ID, 'event_additional_guest',true);
//print_r($datef);
   echo '<input value="'.$datef.'" type="text"  name="event_additional_guest" />';
}


function myplugin_meta_box_callback5(){
  global $post;
  $datef =  get_post_meta($post->ID, 'event_location',true);
  $contact_consaltent =  get_post_meta($post->ID, 'contact_consaltent',true);
//print_r($datef);
   echo '<input value="'.$datef.'" type="text"  name="event_location"/>';
   echo '<input value="'.$contact_consaltent.'" type="text"  name="contact_consaltent"/>';
}



function myplugin_meta_box_callback(){
  global $post;
  $datef =  get_post_meta($post->ID, 'start_rsvp_date',true);
//print_r($datef);
   echo '<input value="'.$datef.'" type="date" id="datePick" name="start_rsvp_date"/>';
}

function myplugin_meta_box_callback2(){
    global $post;
  $dateff = get_post_meta($post->ID, 'end_rsvp_date',true);
   echo '<input value="'.$dateff.'" type="date" id="datePick2" name="end_rsvp_date"/>';
}

function myplugin_meta_box_callback3(){
  global $post;
   # This goes in functions.php
$args = array(
    'role'    => 'customer',
    'orderby' => 'user_nicename',
    'order'   => 'ASC'
);
$users = get_users( $args );

echo $rsvpuserpost = get_post_meta($post->ID, 'assignrsvptouser',true);

}
add_action( 'add_meta_boxes', 'myplugin_add_meta_box' );

function myplugin_save_postdata($post_id){ 

    if ( 'rsvp_event' == @$_POST['post_type'] ) {  $_REQUEST['start_rsvp_date'];

        //$splitidandemail = explode(',', $_REQUEST['assignrsvptouser']);
        $splitidandemail = get_post_meta($post_id, 'assignrsvptouser',true);
       
        update_post_meta($post_id, 'start_rsvp_date',  $_REQUEST['start_rsvp_date']);
        update_post_meta($post_id, 'end_rsvp_date',  $_REQUEST['end_rsvp_date'] );
        update_post_meta($post_id, 'event_location',  $_REQUEST['event_location'] );
        update_post_meta($post_id, 'event_additional_guest',  $_REQUEST['event_additional_guest'] );
        update_post_meta($post_id, 'contact_consaltent',  $_REQUEST['contact_consaltent'] );
        //update_post_meta($post_id, 'assignrsvptouser',  $splitidandemail['0'] );

        $getpostmeta = get_post_meta($post_id, 'number_of_guests',true);
        $locationparty = $_REQUEST['event_location'];
       
       $getpostlink =  get_permalink()."&postid=".get_the_id()."&partydate=".$_REQUEST['start_rsvp_date']."&eventlocation=".$_REQUEST['event_location'];
       $linksend = '<a href="'.$getpostlink.'">'.$getpostlink.'<a>';
        $to = $splitidandemail;//'sandeepchoudhary85@gmail.com';
        $subject = "Your Party is at  The Crooked Cue $locationparty is  Approved ";
        $body  .= 'Hi, <br> Thank you for Booking your Party with The Crooked Cue, please find your event details below';
        $body  .= '<br><br>Name of the Event: ' . get_the_title();
        $body  .= '<br><br>Event Date and Time: '.$_REQUEST['start_rsvp_date'];
        $body  .= '<br><br>Organizer Name: ' . $splitidandemail;
        $body  .= '<br><br>Number of people allowed per invite: '.$getpostmeta;
        $body  .= '<br><br>Rsvp Link : '.$linksend;
        $body  .= '<br><br>Please reach out to us if you have any questions';
        $body  .= '<br><br>Regards,';
        $body  .= '<br>Crooked Cue Team';
        $headers = array('Content-Type: text/html; charset=UTF-8');
         
        wp_mail( $to, $subject, $body, $headers ); 

    }
}
add_action( 'save_post', 'myplugin_save_postdata' );



///////////// Order Complete

add_action( 'woocommerce_order_status_completed', 'mysite_completed', 10, 1);

function mysite_completed($order_id) {
   
    $getposturl = get_post_meta($order_id, 'orderposturl',  true );
    //echo site_url().$getposturl; die;
    wp_redirect( site_url().$getposturl);
    exit();
}

///// Show custome date on admin side order 

    function cloudways_display_order_data_in_admin( $order ){  ?>
        <div class="order_data_column">
            <h4><?php _e( 'Additional Information', 'woocommerce' ); ?><a href="#" class="edit_address"><?php _e( 'Edit', 'woocommerce' ); ?></a></h4>
            <div class="address">
            <?php
            $post_id = get_post_meta($order->id, 'orderpostid',  true);
                echo '<p><strong>' . __( 'Start Date' ) . ': ' . get_post_meta( $post_id, 'start_rsvp_date', true ) . '</strong></p>';
                echo '<p><strong>' . __( 'End Date' ) . ': ' . get_post_meta( $post_id, 'end_rsvp_date', true ) . '</strong></p>'; 
                echo '<p><strong>' . __( 'Purpose of party' ) . ': ' . get_post_meta( $post_id, 'order_party_type', true ) . '</strong></p>'; 
                echo '<p><strong>' . __( 'Name of Party' ) . ': ' . get_post_meta( $post_id, 'eventname', true ) . '</strong></p>'; ?>
            </div>
            <!-- <div class="edit_address">
                <?php //woocommerce_wp_text_input( array( 'id' => '_cloudways_text_field', 'label' => __( 'Some field' ), 'wrapper_class' => '_billing_company_field' ) ); ?>
                <?php //woocommerce_wp_text_input( array( 'id' => '_cloudways_dropdown', 'label' => __( 'Another field' ), 'wrapper_class' => '_billing_company_field' ) ); ?>
            </div> -->
        </div>
    <?php }
    add_action( 'woocommerce_admin_order_data_after_order_details', 'cloudways_display_order_data_in_admin' );



//////

add_action( 'woocommerce_email_order_meta', 'misha_add_email_order_meta', 10, 3 );
/*
 * @param $order_obj Order Object
 * @param $sent_to_admin If this email is for administrator or for a customer
 * @param $plain_text HTML or Plain text (can be configured in WooCommerce > Settings > Emails)
 */
function misha_add_email_order_meta( $order_obj, $sent_to_admin, $plain_text ){
 session_start();
  // this order meta checks if order is marked as a gift
 
 
  // ok, if it is the gift order, get all the other fields
  //$gift_wrap = get_post_meta( $order_obj->get_order_number(), 'eventmedia', true );
  //$gift_recipient = get_post_meta( $order_obj->get_order_number(), 'gift_name', true );
  //$gift_message = get_post_meta( $order_obj->get_order_number(), 'gift_message', true );
 
 

 
    echo "Party Media<br></br><a href='".$_SESSION['partyinfo']['7']['value']."'</a>";
    //echo "<br><br>";
echo $_SESSION['partyinfo']['7']['value'];
    //echo $order_obj->get_order_number();
 
}


?>

