<?php
// Made by 

// Load settings!
require 'include/layout/headersettings.php';

// Create settings
$headerSettings = new HeaderSettings();
$headerSettings->AddStyle("style/main.css");
$headerSettings->title = 'Home';

require 'include/layout/header.php';
require 'include/layout/navbar.php';
?>

<!-- Content  -->
<div class="maindiv">
  <h1>Welcome!</h1>
</div>

<?php include 'include/layout/footer.php';  ?>
