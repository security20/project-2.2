<?php
  require 'include/header.php';


  if($_SESSION['admin'] != 1){ //check if the user is an admin
      // if he is not an admin, redirect him to the webpage
    header("Location: webpage.php");
  }
  if(isset($_GET['id'])){
    $_SESSION['userid'] = substr($_GET['id'],1,-1);
    $userid = $_SESSION['userid'];
    $query = "SELECT `username` FROM users WHERE `userid` = '$userid'";
    $result = getData($conn,$query); //put the result of the query in a
    $username = $result[0]["username"]; //puts the password in a hash
}

  echo "Are you sure you want to delete $username?";?>
  <br>
  <br>
  <form action="delete_user.php">
  <button type="submit">Yes</button>
  </form>
  <br>
  <form action="admin.php">
  <button type="submit">Cancel</button>
  </form>
