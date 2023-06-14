<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME','news');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection


$sql = "SELECT nav FROM tblads ORDER BY posted_on DESC LIMIT 1";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // Fetch the row
    $row = $result->fetch_assoc();
    $nav = $row['nav'];

    // Display the image
    ?>

     <img src="http://localhost/news/newsportal/admin/adsimages/<?php echo  $nav ?>" alt="<?php echo  $nav ?>">

<?php
}

?>