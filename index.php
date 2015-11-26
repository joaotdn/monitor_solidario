<?php 
  get_header();
  
  if ( !is_user_logged_in() ) {
    require_once (dirname(__FILE__) . '/includes/home.sign.php');
  } else {
    require_once (dirname(__FILE__) . '/includes/home.signin.php');
  }

  get_footer();
?>
