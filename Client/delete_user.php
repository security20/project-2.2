<?php
// Made by Jarco - © 2019

  require 'include/layout/headersettings.php';
  require 'include/functions.php';

  // Create settings
  $headerSettings = new HeaderSettings();
  $headerSettings->AddStyle("style/main.css");
  $headerSettings->title = 'Home';
  $headerSettings->requireAdmin = true;

  require 'include/layout/header.php';
  require 'include/layout/navbar.php';

  $userid = $_SESSION['userid'];

  // Delete the account
  $result = deleteAccount($userid);
?>
  <div class="maindiv">
    <h1>Delete user</h1>
  <div class="center-box">
  <br>
  <?php
  // If failed
  if($result->error){
    echo '<p>'.$result->message.'<p>';
    echo "<button onclick='history.go(-2);'>Go back</button>";
    echo "<button onclick='history.go(-1);'>Try again</button>";
  }
  // If succeeded
  else{
    echo '<p>'.$result->message.'<p>';
    echo "<button onclick='history.go(-2);'>Back </button>";
  }
  echo "</div>";
 ?>
