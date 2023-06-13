<?php
session_start();
error_reporting(0);
include('includes/config.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>News Portal | Search Page</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">

  
    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="../new/css/style.css" rel="stylesheet">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../new/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


</head>

<!-- Blog Post -->
<!-- Blog Post -->
<!-- Blog Post -->
<?php
if (isset($_POST['searchText'])) {
    // Sanitize the user input to prevent SQL injection
    $searchTitle = mysqli_real_escape_string($con, $_POST['searchText']);

    // Prepare the SQL query
    $sql = "SELECT * FROM tblposts WHERE PostTitle LIKE ?";

    // Bind the search query to the prepared statement
    $stmt = mysqli_prepare($con, $sql);
    $searchPattern = "%{$searchTitle}%";
    mysqli_stmt_bind_param($stmt, "s", $searchPattern);

    // Execute the SQL query
    mysqli_stmt_execute($stmt);

    // Get the results from the database
    $results = mysqli_stmt_get_result($stmt);

    // If there are no results, display a message
    if (mysqli_num_rows($results) == 0) {
        echo "No records found";
    } else {
        // Fetch only the first row, which corresponds to the searched item
        $row = mysqli_fetch_assoc($results);
        ?>
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title"><?php echo htmlentities($row['PostTitle']); ?></h2>
                <a href="news-details.php?nid=<?php echo htmlentities($row['id']); ?>" class="btn btn-info">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
                Posted on <?php echo htmlentities($row['postingdate']); ?>
            </div>
        </div>
        <?php
    }
}
?>







        <!-- Pagination -->




  <!-- Footer -->


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="jquery-3.6.4.min.js"></script>
  </head>
</body>

</html>