<?php

global $wpdb;
$style_table = $wpdb->prefix . 'wpm_6310_style';
$icon_table = $wpdb->prefix . 'wpm_6310_icons';
$member_table = $wpdb->prefix . 'wpm_6310_member';

$styledata = $wpdb->get_row($wpdb->prepare("SELECT * FROM $style_table WHERE id = %d ", $ids), ARRAY_A);
$allStyle = explode("|", $styledata['css']);
$allSlider = explode("|", $styledata['slider']);

$members = $wpdb->get_results("SELECT * FROM $member_table WHERE id in ({$styledata['memberid']}) ORDER BY name asc", ARRAY_A);

$loading = get_option( 'wpm_6310_loading_icon');
if(!$loading){
  $loading = plugin_dir_url(dirname(__FILE__)) . plugin_basename(dirname(__FILE__)) . '/assets/image/loading.gif';
}

if (file_exists(wpm_6310_plugin_url . "output/{$styledata['style_name']}.php")) {
   wp_enqueue_style('wpm-font-awesome-5-0-13', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css');
   wp_enqueue_style('wpm-font-awesome-4-0-13', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
   wp_enqueue_style("wpm-google-font-{$ids}", "https://fonts.googleapis.com/css?family={$allStyle['17']}|{$allStyle['24']}");
   if ($allSlider[0]) {
       wp_enqueue_style('wpm-wpm-6310-owl-carousel', plugins_url('assets/css/owl.carousel.min.css', __FILE__));
       wp_enqueue_script('wpm-wpm-6310-owl-carousel-js', plugins_url('assets/js/owl.carousel.min.js', __FILE__), array('jquery'), TRUE);
   }

   echo "<div class='wpm_main_template wpm_main_template_{$ids}'>";
   include wpm_6310_plugin_url . "output/{$styledata['style_name']}.php";
   echo "</div>";
   //wpm_version_status();
}
