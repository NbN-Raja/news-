<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {

if (isset($_POST['submit_nav'])) {
    $nav = $_FILES['home'];
    $link= $_POST['link'];

    // File Upload
    if ($nav['error'] === UPLOAD_ERR_OK) {
        $image_name = $nav['name'];
        $image_tmp = $nav['tmp_name'];
        $image_path = "postimages/" . $image_name;

        // Move the uploaded file to the desired location
        if (move_uploaded_file($image_tmp, $image_path)) {
            // File upload successful, insert a new record in the database
            $query = mysqli_query($con, "INSERT INTO tblads (home,link) VALUES ('$image_name','$link')");

            if ($query) {
                $msg = "News Updated";
            } else {
                $error = "Something went wrong. Please try again.";
            }
        } else {
            $error = "Failed to move uploaded file. Please try again.";
        }
    } else {
        $error = "Error occurred during file upload. Please try again.";
    }
}


// Update here 
if (isset($_POST['update'])) {
    $navs = $_FILES['home']['name'];  // Extract the file name from the $_FILES array
    $id = $_POST['id'];
    $link = $_POST['link'];
$sql = "UPDATE tblads SET home = '$navs' , link= '$link' where id='$id'";

// Execute the SQL statement
if (mysqli_query($con, $sql)) {
    echo "Record updated successfully.";
} else {
    echo "Error updating record: " . mysqli_error($con);
}
}


?>







    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Newsportal | Add Category</title>

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>

    </head>
    <body class="fixed-left">
        <!-- Begin page -->
        <div id="wrapper">
            <!-- Top Bar Start -->
            <?php include('includes/topheader.php'); ?>
            <!-- Top Bar End -->
            <!-- ========== Left Sidebar Start ========== -->
            <?php include('includes/leftsidebar.php'); ?>
            <!-- Left Sidebar End -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Add Advertisement </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Advertisement </a>
                                        </li>
                                        <li class="active">
                                            Add Advertisement
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Add Home Ads</b></h4>
                                    <hr />
                                   
                                    <div class="row">
                                  


                             <?php 
                              $sql = "SELECT * FROM tblads WHERE nav = '' ORDER BY home;
                              ";
                              $result = $con->query($sql);
                          
                              if ($result->num_rows > 0) {
                                  // Fetch the row
                                  $row = $result->fetch_assoc();
                                  $home = $row['home'];
                                  $post = $row['posted_on'];
                                  $id = $row['id'];
                                  $link = $row['link'];
                          
                                  // Display the image
                            
                                   echo '<p>  Live Advertisement on home page   </p>';
                                   echo '<p> ' . $id .  '</p>';
                                   echo '<img height="100px" src="postimages/' . htmlentities($row["home"]) . '">';
                                   echo '<br>';
                                   echo '<p>Uploaded on ' . $post . '</p>';
                              
                                ?>
                                        
                                        <div class="col-sm-6">
                                            <!---Success Message--->
                                            <?php if ($msg) { ?>
                                                <div class="alert alert-success" role="alert">
                                                    <strong>Well done!</strong> <?php echo htmlentities($msg); ?>
                                                </div>
                                            <?php } ?>

                                            <!---Error Message--->
                                            <?php if ($error) { ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                                </div>
                                            <?php } ?>


                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                        


                                        <form class="form-horizontal" name="category" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Upload Image</label>
                                                    <div class="col-md-10">
                                                        <input type="file" class="form-control" name="home" >
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" name="link" value="<?php echo $link ?>"  required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">&nbsp;</label>
                                                    <div class="col-md-10">
                                                     
                                                    <input type="text" name="id" value="<?php echo $id ?>">

                                                        <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="submit_nav">
                                                            Submit
                                                        </button>
                                                        <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="update">
                                                            Update
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <?php 
                    } else {
                        echo "No image found.";

                        ?>
                       <form class="form-horizontal" name="category" method="post" enctype="multipart/form-data">
                                      <div class="form-group">
                                          <label class="col-md-2 control-label">Upload Image</label>
                                          <div class="col-md-10">
                                              <input type="file" class="form-control" name="nav" required>
                                          </div>
                                          <div class="col-md-10">
                                              <input type="text" class="form-control" name="link" placeholder="Enter you ad link" required>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-md-2 control-label">&nbsp;</label>
                                          <div class="col-md-10">
                                           

                                              <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="submit_nav">
                                                  Submit
                                              </button>
                                             
                                          </div>
                                      </div>
                                  </form>


<?php 
                    }
                ?>



                       




                        
                        <!-- end row -->


                    </div> <!-- container -->

                </div> <!-- content -->
                <?php include('includes/footer.php'); ?>
            </div>
        </div>

        
        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
    </body>
    </html>
<?php } ?>