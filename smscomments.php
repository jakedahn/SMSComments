<?php
  /*
  Plugin Name: SMS Comments
  Plugin URI: http://www.ang.st
  Description: Alerts administrator via SMS when a new comment has been posted.
  Version: 0.1
  Author: Jake Dahn
  Author URI: http://www.ang.st
*/


function sms_register_settings() {
  register_setting('SMS', 'sms_phone' );
  register_setting('SMS', 'sms_provider' );
  add_options_page('SMS Comments', 'SMS Comments', 8, __FILE__, 'sms_options_view');
}

function sms_options_view() {
  include "view.php";
}

function sms_send_mail($message, $email) {
  $to      = $email;
  $subject = '';
  $message = substr($message,0,140)." ...";
  $headers = 'From: comments@wordpress.org'."\r\n" .
      'X-Mailer: PHP/' . phpversion();
  mail($to, $subject, $message, $headers);
}

function sms_send_msg($id) {
  $phoneString = get_option("sms_phone").get_option("sms_provider");

// Add akismet call here
  sms_send_mail(get_comment($id)->comment_content, $phoneString);
}

add_action("comment_post", "sms_send_msg", 1, 1);
add_action('admin_menu', 'sms_register_settings');
