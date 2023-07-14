<?php
include('includes/config.php');

// Check if the registration form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate form data (you can add more validation if needed)
    if (empty($name) || empty($email) || empty($password)) {
        $error = "Please enter all required fields";
    } else {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and execute the SQL query
        $query = "INSERT INTO tblusers (name, email, password) VALUES ('$name', '$email', '$hashedPassword')";
        $result = mysqli_query($con, $query);

        if ($result) {
            // Registration successful, redirect to login page
            header("Location: login.php");
            exit();
        } else {
            $error = "Registration failed";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>News | Register</title>
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">
  <link href="css/modern-business.css" rel="stylesheet">
  <link href="../new/css/style.css" rel="stylesheet">
  <!-- Google Translate -->
  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</head>

<body style="padding:0">
  <!-- Navigation -->
  <?php include('includes/header.php'); ?>
  <!-- Page Content -->
  <div class="container">
    <h1></h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Home</a>
      </li>
      <li class="breadcrumb-item active">Register</li>
    </ol>
    <title>News Registration Form</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <div class="container">
      <h2>News Registration Form</h2>
      <form method="POST" action="">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
          <label for="email">Email address:</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
        <a href="login.php"> Already Signed in? Login Here</a>
      </form>
      <?php
      if (isset($error)) {
          echo '<div class="alert alert-danger mt-3">' . $error . '</div>';
      }
      ?>
    </div>
    <!-- Include Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
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
