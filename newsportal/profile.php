<?php
session_start();
include('includes/config.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>News Portal | Contact us</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">

  <link href="css/modern-business.css" rel="stylesheet">
  <link href="../new/css/style.css" rel="stylesheet">

  <!-- Google Translater -->
  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  <link href="../new/img/favicon.ico" rel="icon">

<!-- Bootstrap core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

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

<body style="padding:0">

  <!-- Navigation -->
  <?php include('includes/header.php'); ?>
  <!-- Page Content -->
  <div class="container">

    

      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>

      <!-- Intro Content -->
      <div class="row">

        <div class="col-lg-12">
            <!-- Add Here  -->
            <div class="">
                <div class="container">
  <div class="row">
  <div class="col-md-4">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Profile</h5>
      <?php
      $sessionId = $_SESSION['id'];
      $query = mysqli_query($con, "SELECT name, email FROM tblusers WHERE id = '$sessionId'");
      if ($row = mysqli_fetch_assoc($query)) {
          $name = $row['name'];
          $email = $row['email'];
          echo '<p class="card-text">User\'s Name: ' . $name . '</p>';
          echo '<p class="card-text">Email: ' . $email . '</p>';
      }
      ?>
    </div>
  </div>
</div>


  
  </div>
</div>

            </div>

        </div>
      </div>
      <!-- /.row -->
   

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <?php include('includes/footer.php'); ?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>