<?php session_start();
ob_start();
// set a time limit in minutes
$timelimit = 15 * 60;
// get the current time
$now = time();
// where to redirect if rejected
$redirect = 'index.php';
// if session variable not set, redirect to login page
if (!isset($_SESSION['authenticated'])) {
  header("Location: $redirect");
  exit;
  }
// if timelimit has expired, destroy session and redirect
elseif ($now > $_SESSION['start'] + $timelimit) {
  // empty the $_SESSION array
  $_SESSION = array();
  // invalidate the session cookie
  if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-86400, '/');
  }
  // end session and redirect with query string
  session_destroy();
  header("Location: {$redirect}?expired=yes");
  exit;
  }
// if it's got this far, it's OK, so update start time
else {
  $_SESSION['start'] = time();
  }