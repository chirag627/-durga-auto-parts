<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<title>Admin</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right">Auto parts Admin</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>

  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Overview</a>
    <a href="allcategory.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  All Category</a>
    <a href="addcategory.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Add Category</a>
    <a href="editcategory.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Edit/Delete Category</a>
    <a href="allproducts.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i> All Product</a>
    <a href="addproducts.php" class="w3-bar-item w3-button w3-padding "><i class="fa fa-bullseye fa-fw"></i> Add Product</a>
    <a href="editproducts.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-diamond fa-fw"></i>  Edit/Delete Product</a>
    <a href="reviews.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i> Reviews</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i> Logout</a>
    
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i>Edit/Update Products</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom"> <form class="w3-container">

<br><table class="w3-table">
<tr>
    
  <th>ID</th>
    
  <th>Name</th>
  <th>Category</th>
  <th>Delete</th>
  <th>Edit</th>
</tr>
<?php
include'db.php';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  echo"
<tr>
<td>$row[id]</td>
<td>$row[title]</td>
<td>$row[category]</td>
<td><a href='delete_product.php?id=$row[id]'>Delete</a></td>
<td><a href='edit_product.php?id=$row[id]'>Edit</a></td>
</tr>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
     
</table>
     </div>



<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>
