
<?php 
  // run this script only if the logout button has been clicked
if (array_key_exists('logout', $_POST)) {
  // empty the $_SESSION array
  $_SESSION = array();
  // invalidate the session cookie
  if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-86400, '/');
  }
  // end session and redirect
  session_destroy();
  header("Location: $redirect");
  exit;
  }
?>