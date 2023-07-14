<?php
session_start();
include('includes/config.php');
//Genrating CSRF Token
if (empty($_SESSION['token'])) {
  $_SESSION['token'] = bin2hex(random_bytes(32));
}

if (isset($_POST['submit'])) {
  // Verifying CSRF Token
  if (!empty($_POST['csrftoken'])) {
    if (hash_equals($_SESSION['token'], $_POST['csrftoken'])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $comment = $_POST['comment'];
      $rating = $_POST['rating']; // Added line to retrieve the rating value
      $postid = intval($_GET['nid']);
      $st1 = '0';
      $query = mysqli_query($con, "INSERT INTO tblcomments (postId, name, email, comment, rating, status) VALUES ('$postid', '$name', '$email', '$comment', '$rating', '$st1')");
      if ($query) {
        echo "<script>alert('Comment successfully submitted. Comment will be displayed after admin review.');</script>";
        unset($_SESSION['token']);
      } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
      }
    }
  }
}

$postid = intval($_GET['nid']);

$sql = "SELECT viewCounter FROM tblposts WHERE id = '$postid'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $visits = $row["viewCounter"];
    $sql = "UPDATE tblposts SET viewCounter = $visits+1 WHERE id ='$postid'";
    $con->query($sql);
  }
} else {
  echo "no results";
}



?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>News Portal | Home Page</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">

  <link href="css/modern-business.css" rel="stylesheet">
  <link href="../new/css/style.css" rel="stylesheet">

  <!-- Google Translater -->
  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>

<body style="padding:0">
  <!-- Navigation -->
  <?php include('includes/header.php'); ?>
  <!-- Page Content -->
  <div class="container">
    <div class="row" style="margin-top: 4%">

      <!-- Blog Entries Column -->
      <div class="col-md">
        <!-- Blog Post -->
        <?php
        $pid = intval($_GET['nid']);
        $currenturl = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];;
        $query = mysqli_query($con, "select tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url,tblposts.postedBy,tblposts.lastUpdatedBy,tblposts.UpdationDate from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.id='$pid'");
        while ($row = mysqli_fetch_array($query)) {
        ?>
          <div class="container shadow p-4 text-dark">
            <div class="">
              <h2 class=""><?php echo htmlentities($row['posttitle']); ?></h2>
              <div class="d-flex justify-content-between" style="width: 12pc; right: 15pc; font-weight: 900;">
                <hr class="font-weight-bold">
              </div>
              <p>
                <div class="d-flex">
                <b class="d-inline-block rounded-circle bg-dark text-red" style="width: 36px; height: 36px;"></b>
                <p class="font-bold ml-2 text-bold fw-bold text-uppercase" style="font-weight: 700;"><?php echo htmlentities($row['postedBy']); ?> <br> <?php echo htmlentities($row['postingdate']); ?> <br>
                Views:<?php print $visits; ?></p>
                


                <div class="mr-10" style="    margin-left: 17pc;">
  <!-- Facebook -->
  <a style="color: #3b5998; font-size: 30px; height: 40px; width: 40px;" href="#!" role="button">
    <i class="fab fa-facebook-f"></i>
  </a>

  <!-- Twitter -->
  <a style="color: #55acee; font-size: 30px; height: 40px; width: 40px;" href="#!" role="button">
    <i class="fab fa-twitter"></i>
  </a>

  <!-- Google -->
  <a style="color: #dd4b39; font-size: 30px; height: 40px; width: 40px;" href="#!" role="button">
    <i class="fab fa-google"></i>
  </a>

  <!-- Instagram -->
  <a style="color: #ac2bac; font-size: 30px; height: 40px; width: 40px;" href="#!" role="button">
    <i class="fab fa-instagram"></i>
  </a>

</div>

        </div>
     
                <?php if ($row['lastUpdatedBy'] != '') : ?>
                  
                <?php endif; ?>
              </p>
              <p>
              </p>
              <hr />
              <img class="img-fluid rounded" src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>" alt="<?php echo htmlentities($row['posttitle']); ?>">
              <p class="card-text bold">
                <?php
                $pt = $row['postdetails'];
                echo (substr($pt, 0));
                ?>
              </p>
            </div>
            <div class="card-footer text-muted">
              <!--category-->
              <a class="badge bg-secondary text-decoration-none link-light" href="category.php?catid=<?php echo htmlentities($row['cid']) ?>" style="color:#fff"><?php echo htmlentities($row['category']); ?></a>
              <!--Subcategory--->
              <a class="badge bg-secondary text-decoration-none link-light" style="color:#fff"><?php echo htmlentities($row['subcategory']); ?></a>
            </div>
          </div>
        <?php } ?>
      </div>

      <!-- Sidebar Widgets Column -->
      <!-- Side bar  -->
      <?php include('includes/sidebar.php'); ?>

    </div>
    <!-- /.row -->
   



    <!---Comment Section --->
    <div class="row">
      <div class="col-md-8 shadow">
      <div class="card my-4">
  <h5 class="card-header">Leave a Comment:</h5>
  <div class="card-body shadow">
    <form name="Comment" method="post">
      <input type="hidden" name="csrftoken" value="<?php echo htmlentities($_SESSION['token']); ?>">
      <?php if (isset($_SESSION['name'])) : ?>
        <div class="form-group">
          <input type="text" name="name" class="form-control" placeholder="Enter your full name" value="<?php echo $_SESSION['name']; ?>" required readonly>
        </div>
      <?php else : ?>
        <div class="form-group">
          <input type="text" name="name" class="form-control" placeholder="Enter your full name" required>
        </div>
      <?php endif; ?>
      <?php if (isset($_SESSION['email'])) : ?>
        <div class="form-group">
          <input type="email" name="email" class="form-control" placeholder="Enter your valid email" value="<?php echo $_SESSION['email']; ?>" required>
        </div>
      <?php else : ?>
        <div class="form-group">
          <input type="email" name="email" class="form-control" placeholder="Enter your valid email" value="" required>
        </div>
      <?php endif; ?>
      <div class="form-group">
        <label for="rating">Rating:</label>
        <div class="rating-stars">
  <?php for ($i = 1; $i <= 5; $i++) : ?>
    <input type="radio" id="star<?php echo $i; ?>" name="rating" value="<?php echo $i; ?>" required>
    <label for="star<?php echo $i; ?>">&#9733;</label>
  <?php endfor; ?>
</div>
      </div>
      <div class="form-group">
        <textarea class="form-control" name="comment" rows="3" placeholder="Comment" required></textarea>
      </div>
      
      <button type="submit" class="btn btn-info" name="submit">Submit</button>
    </form>
  </div>
</div>



        <!---Comment Display Section --->
        <?php
        $sts = 1;
        $query = mysqli_query($con, "select name,rating,comment,postingDate from  tblcomments where postId='$pid' and status='$sts'");
        while ($row = mysqli_fetch_array($query)) {
        ?>
         <div class="media mb-4">
  <img class="d-flex mr-3 rounded-circle" src="images/usericon.png" alt="">
  <div class="media-body">
    <h5 class="mt-0">
      <?php
        echo htmlentities($row['name']);
        $rating = intval($row['rating']); // Convert rating to an integer
        echo '<br>';
        for ($i = 1; $i <= 5; $i++) {
          if ($i <= $rating) {
            echo '<span style="font-weight: bold;">&#9733;</span>'; // Display a filled star
          } else {
            echo '&#9734;'; // Display an empty star
          }
        }
      ?>
      <span style="font-size:11px;"><b>at</b> <?php echo htmlentities($row['postingDate']); ?></span>
    </h5>
    <a> <?php echo htmlentities($row['comment']); ?> </a>
  </div>
</div>

        <?php } ?>
      </div>
    </div>
  </div>



  <?php include('includes/footer.php'); ?>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>




<style>
.rating-container {
  display: flex;
  align-items: center;
}

.star {
  color: gold;
  margin-right: 5px;
  font-size: 20px;
}


</style>