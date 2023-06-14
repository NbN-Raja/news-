<?php
session_start();
include('../includes/config.php');

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token");





// Check for connection errors
if (mysqli_connect_errno()) {
  die("Failed to connect to MySQL: " . mysqli_connect_error());
}

// Fetch data from database
$query = "SELECT tblposts.id as pid,tblposts.PostImage as postImage , tblposts.viewCounter as view, tblposts.PostTitle as posttitle,tblposts.PostDetails as postdetail,tblposts.PostingDate as postdate,tblcategory.CategoryName as catname FROM tblposts LEFT JOIN tblcategory ON tblcategory.id=tblposts.CategoryId LEFT JOIN tblsubcategory ON tblsubcategory.SubCategoryId=tblposts.SubCategoryId ORDER BY viewCounter DESC limit 4";
$result = mysqli_query($con, $query);

// Store data in an associative array
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
  $data[] = $row;
}

// Convert associative array to JSON object
$json_data = json_encode($data);

// Set response header to indicate JSON response
header('Content-Type: application/json');

// Send response back to client
echo $json_data;

// Close database connection
mysqli_close($con);

?>
