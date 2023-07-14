<?php
session_start();
include('includes/config.php');

if (isset($_POST['insert'])) {
    $pagetype = 'news';
    $userid = $_SESSION['id'];
    $pagetitle = $_POST['pagetitle'];
    $pagedescription = $_POST['pagedescription'];
    $name = $_SESSION['email'];

    $query = mysqli_query($con, "INSERT INTO tblusernews (name,userid, PageTitle, pagedescription) VALUES ('$name','$userid', '$pagetitle', '$pagedescription')");
    if ($query) {
        $msg = "Added To Admin";
    } else {
        $error = "Something went wrong. Please try again.";
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

    <title>News Portal | About us</title>

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


    <div class="container">
    <div class="add">
        <form name="aboutus" method="post">
            <div class="form-group m-b-20">
                <h5>Add News</h5>
                <h5 class="m-b-30 m-t-0 header-title"><b>Title</b></h5>
                <input type="text" class="form-control" id="pagetitle" name="pagetitle" required>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <h5 class="m-b-30 m-t-0 header-title"><b>Provide News Here</b></h5>
                        <textarea rows="10" cols="90" class="summernote" name="pagedescription" required></textarea>
                    </div>
                </div>
            </div>
            <button type="submit" name="insert" class="btn btn-success waves-effect waves-light">Add</button>
        </form>
    </div>
    <div class="side">
        <!-- Search Widget -->
        <div class="card mb-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
                <form name="search" action="search.php" method="post">
                    <div class="input-group">
                        <input type="text" name="searchtitle" class="form-control" placeholder="Search for..." required>
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="submit">Go!</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="category list-unstyled mb-0">
                            <?php
                            $query = mysqli_query($con, "select id,CategoryName from tblcategory");
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <li class="category">
                                    <a href="category.php?catid=<?php echo htmlentities($row['id']) ?>"><?php echo htmlentities($row['CategoryName']); ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php'); ?>

<style>
    .container {
        display: flex;
        justify-content: center;
    }

    .add {
        flex: 1;
        margin: 10px;
        padding: 20px;
        background-color: #f2f2f2;
    }

    .side {
        flex: 1;
        margin: 10px;
    }
</style>




    <!-- END wrapper -->



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

    <!--Summernote js-->
    <script src="../plugins/summernote/summernote.min.js"></script>
    <!-- Select 2 -->
    <script src="../plugins/select2/js/select2.min.js"></script>
    <!-- Jquery filer js -->
    <script src="../plugins/jquery.filer/js/jquery.filer.min.js"></script>

    <!-- page specific js -->
    <script src="assets/pages/jquery.blog-add.init.js"></script>

    <!-- App js -->
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>

    <script>
        jQuery(document).ready(function() {

            $('.summernote').summernote({
                height: 240, // set editor height
                minHeight: null, // set minimum height of editor
                maxHeight: null, // set maximum height of editor
                focus: false // set focus to editable area after initializing summernote
            });
            // Select2
            $(".select2").select2();

            $(".select2-limiting").select2({
                maximumSelectionLength: 2
            });
        });
    </script>
    <script src="../plugins/switchery/switchery.min.js"></script>

    <!--Summernote js-->
    <script src="../plugins/summernote/summernote.min.js"></script>




</body>

</html>