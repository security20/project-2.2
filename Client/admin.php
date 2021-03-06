<?php
// Made by Jarco - © 2019

// Load settings!
require 'include/layout/headersettings.php';
require 'include/functions.php';

// Create settings
$headerSettings = new HeaderSettings();
$headerSettings->AddStyle("style/main.css");
$headerSettings->title = 'Adminpanel';
$headerSettings->requireAdmin = true;

require 'include/layout/header.php';
require 'include/layout/navbar.php';
?>

<!-- Content  -->
<div class="maindiv">
  <h1>Admin panel</h1>
<div class="center-box admin-register">

<!-- Show form for registering new account -->

<p>Create a new account:</p>
<br>

<form class="login-form" action = "register.php" method ="POST">
  <label for="username" class="tl">Username:</label>
  <input type="text" placeholder="Username" name="username" size ="20" maxlength="50" required>

  <label for="password" class="tl">Password:</label>
  <input type="password" placeholder="password" name="password0" size ="20" maxlength="100" required>

  <label for="password" class="tl">Repeat Password:</label>
  <input type="password" placeholder="password" name="password1" size ="20" maxlength="100" required>

  <label for="admin" class="tl">Admin: </label>
  <input class="cb" type="checkbox" id="admin" name = "admin" value = "yes">

  <button class='ripple' type="submit">Register</button>
</form>
</div>
<br>
<br>
<br>
<!-- Show table with all accounts -->
<table id="topten" class="center-item" width="50%" border="1">
  <thead>
    <tr>
      <th><strong>ID</strong></th>
      <th><strong>Username</strong></th>
      <th><strong>Admin</strong></th>
      <th><strong>Edit</strong></th>
      <th><strong>Delete</strong></th>
    </tr>
  </thead>
<?php
      // Get all accounts
      $result = getAccounts();
      // Check for error
      if($result->error == false){
        $count=0;
        // For each account:
        foreach ($result->data as $row){
          $admin = "";
          if($row['admin'] == 1){
            $admin = "Yes";
          }else{
            $admin = "No";
          }

          $count += 1;
          // Show data
          echo "<tr>";
            echo"<td align='center'>".$row["userid"]."</td>";
            echo"<td align='center'>".$row["username"]."</td>";
            echo"<td align='center'>".$admin."</td>";
            echo"<td align='center'>
                  <a href='edit.php?id=".$row["userid"]."'>Edit</a>
                  </td>";
            echo"<td align='center'>
                  <a href='delete.php?id=".$row["userid"]."'>Delete</a>
                  </td>";
          echo "</tr>";
      }
      }else{
        // echo the error!
        echo $result->message;
      }
      echo "</tbody>";
      echo "</table>";
      echo "<br>";
      echo "<br>";
?>
  </div>
</div>

<?php include 'include/layout/footer.php';  ?>
