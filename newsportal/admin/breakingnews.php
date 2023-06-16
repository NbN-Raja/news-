<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {

    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $posted_on = date('Y-m-d H:i:s');
        $status = 1;
        $query = mysqli_query($con, "insert into breaking_news(title,posted_on) values('$title','$posted_on')");
        if ($query) {
            $msg = "News Updated  ";
        } else {
            $error = "Something went wrong . Please try again.";
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
                                    <h4 class="page-title">Add Breaking News </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Breakingnews </a>
                                        </li>
                                        <li class="active">
                                            Add Breaking news
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
                                    <h4 class="m-t-0 header-title"><b>Add Breaking news </b></h4>
                                    <hr />
                                    <div class="row">
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
                                            <form class="form-horizontal" name="category" method="post">


                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Live Breakingnews</label>
                                                    <div class="col-md-10">
                                                        <?php
                                                        $sql = "SELECT * FROM breaking_news ORDER BY posted_on DESC LIMIT 1 ";
                                                        $result = mysqli_query($con, $sql);

                                                        // Check if there are any breaking news items
                                                        if (mysqli_num_rows($result) > 0) {
                                                            // Get the latest breaking news item
                                                            $row = mysqli_fetch_assoc($result);
                                                            $title = $row['title'];
                                                            $posted_on = $row['posted_on'];
                                                        ?>
                                                            <div direction="left" scrollamount="10">
                                                                <div class="">
                                                                    <a style="font-size: 18px; font-weight: 600;" class="text-dark text-uppercase font-weight-semi-bold" href=""> <?php echo $title ?> </a>
                                                            </div>
                                                            </div>
                                                        <?php

                                                        } else {
                                                            // Display a default message if there are no breaking news items
                                                            $title = "No breaking news";
                                                            $posted_on = date("Y-m-d H:i:s");
                                                        }

                                                        // Close the database connection


                                                        ?>

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Breaking News</label>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control" rows="5" name="title" required></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">&nbsp;</label>
                                                    <div class="col-md-10">

                                                        <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="submit">
                                                            Submit/Update
                                                        </button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
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