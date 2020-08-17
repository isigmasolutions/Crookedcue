<?php
if (!defined('ABSPATH'))
   exit;
if (!current_user_can('edit_others_pages')) {
   wp_die(__('You do not have sufficient permissions to access this page.'));
}
?>
<div class="wpm-6310">
   <h1>Plugin Settings</h1>
   <?php
   if (!defined('ABSPATH'))
      exit;
   if (!current_user_can('manage_options')) {
      wp_die(__('You do not have sufficient permissions to access this page.'));
   }

   wp_enqueue_media();
   wpm_6310_color_picker_script();

  $loading = get_option( 'wpm_6310_loading_icon');
   if (!empty($_POST['update']) && $_POST['update'] == 'Update') {
      $nonce = $_REQUEST['_wpnonce'];
      if (!wp_verify_nonce($nonce, 'wpm-6310-nonce-update')) {
         die('You do not have sufficient permissions to access this page.');
      } else {
         $wpm_6310_loading_icon = get_option( 'wpm_6310_loading_icon');
         if(!$wpm_6310_loading_icon){
               $wpdb->query("INSERT INTO {$wpdb->prefix}options(option_name, option_value) VALUES ('wpm_6310_loading_icon', '". $_POST['loading_image'] ."')");
         }
         else{
            $wpdb->query("UPDATE {$wpdb->prefix}options set 
								option_value='". $_POST['loading_image'] ."' 
								where option_name = 'wpm_6310_loading_icon'");
         }
        $loading =  $_POST['loading_image'];
      }
   }

   
   if(!$loading){
     $loading = plugin_dir_url(dirname(__FILE__)) . '/assets/image/loading.gif';
   }
   ?>
   <form action="" method="post">
      <?php wp_nonce_field("wpm-6310-nonce-update") ?>
      <div class="wpm-6310-modal-body-form">
         <table width="100%" cellpadding="10" cellspacing="0">
            <tr>
               <td width="120px">Loading Image</td>
               <td width="500px">
                  <input type="text" required name="loading_image" id="loading-image-src" value="<?php echo$loading ?>" class="wpm-form-input lg">
                  <input type="button" id="loading-image" value="Change Image" class="wpm-btn-default">
               </td>
               <td>
                  <img src="<?php echo$loading ?>" height="70" />
               </td>
            </tr>
            <tr>
               <td colspan="3">
                  <input type="submit" name="update" class="wpm-btn-primary wpm-margin-right-10" value="Update" />
               </td>
            </tr>
         </table>
      </div>
      <br class="wpm-6310-clear" />
   </form>
   <script>
      jQuery(document).ready(function() {
         /* ######### Media Start ########### */
         jQuery("body").on("click", "#loading-image", function(e) {
            e.preventDefault();
            var image = wp.media({
                  title: 'Upload Image',
                  multiple: false
               }).open()
               .on('select', function(e) {
                  var uploaded_image = image.state().get('selection').first();
                  console.log(uploaded_image);
                  var image_url = uploaded_image.toJSON().url;
                  jQuery("#loading-image-src").val(image_url);
                  //jQuery("#vkcmu-favicon-image").attr("src", image_url);
               });

            jQuery("#wpm_6310_add_new_media").css({
               "overflow-x": "hidden",
               "overflow-y": "auto"
            });
         });
      });
   </script>