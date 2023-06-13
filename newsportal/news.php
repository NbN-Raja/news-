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

  <title>Daily News Portal | Home Page</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">
  <link href="../new/css/style.css" rel="stylesheet">

  <!-- Google Translater -->
  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</head>

<body style="padding-top:0">

  <div class="" id="google_translate_element" style="position:relative; top:50px"></div>

  <!-- Navigation -->
  <?php include('includes/header.php'); ?>

  <!-- Page Content -->

  <div class="container mb-4">



    <div class="row" style="position: relative; right: 0pc; top:5pc;    margin-bottom: 8pc;">


      <!-- Sidebar Widgets Column -->



      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <!-- Blog Post -->
        <?php
        if (isset($_GET['pageno'])) {
          $pageno = $_GET['pageno'];
        } else {
          $pageno = 1;
        }
        $no_of_records_per_page = 4;
        $offset = ($pageno - 1) * $no_of_records_per_page;


        $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
        $result = mysqli_query($con, $total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);


        $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
        while ($row = mysqli_fetch_array($query)) {
        ?>

<a href="news-details.php?nid=<?php echo htmlentities($row['pid']) ?>">

<div class="d-flex card mb-4 shadow">
    <img class="card-img-top img-fluid" src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>" alt="<?php echo htmlentities($row['posttitle']); ?>" style="width: 100%; height: 200px; object-fit: cover;">
    <div class="card-body">
        <h2 class="card-title"><?php echo htmlentities($row['posttitle']); ?></h2>
        <p class="card-text">
            <a class="badge bg-secondary text-decoration-none link-light" href="category.php?catid=<?php echo htmlentities($row['cid']) ?>" style="color:#fff"><?php echo htmlentities($row['category']); ?></a>
            <a class="badge bg-secondary text-decoration-none link-light" style="color:#fff"><?php echo htmlentities($row['subcategory']); ?></a>
        </p>
        <a href="news-details.php?nid=<?php echo htmlentities($row['pid']) ?>" class="btn btn-info">Read More &rarr;</a>
    </div>
    <div class="card-footer text-muted">
        Posted on <?php echo htmlentities($row['postingdate']); ?>
    </div>
</div>


</a>

        <?php } ?>




        <!-- Pagination -->


        <ul class="pagination justify-content-center mb-4">
          <li class="page-item"><a href="?pageno=1" class="page-link">First</a></li>
          <li class="<?php if ($pageno <= 1) {
                        echo 'disabled';
                      } ?> page-item">
            <a href="<?php if ($pageno <= 1) {
                        echo '#';
                      } else {
                        echo "?pageno=" . ($pageno - 1);
                      } ?>" class="page-link">Prev</a>
          </li>
          <li class="<?php if ($pageno >= $total_pages) {
                        echo 'disabled';
                      } ?> page-item">
            <a href="<?php if ($pageno >= $total_pages) {
                        echo '#';
                      } else {
                        echo "?pageno=" . ($pageno + 1);
                      } ?> " class="page-link">Next</a>
          </li>
          <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
        </ul>

      </div>
      <div class="col-lg-4" style="position: relative;left: 97px;">




<!-- Ads Start -->
<div class="mb-3">
    <div class="section-title mb-0">
        <h4 class="m-0 text-uppercase font-weight-bold">Advertisement</h4>
    </div>
    <div class="bg-white text-center border border-top-0 p-3">
        <a href=""><img class="img-fluid" src="img/news-800x500-2.jpg" alt=""></a>
    </div>
</div>
<!-- Ads End -->

<!-- Popular News Start -->

<!-- Popular News End -->

<!-- Newsletter Start -->
<!-- <div class="mb-3">
    <div class="section-title mb-0">
        <h4 class="m-0 text-uppercase font-weight-bold">Newsletter</h4>
    </div>
    <div class="bg-white text-center border border-top-0 p-3">
        <p>Aliqu justo et labore at eirmod justo sea erat diam dolor diam vero kasd</p>
        <div class="input-group mb-2" style="width: 100%;">
            <input type="text" class="form-control form-control-lg" placeholder="Your Email">
            <div class="input-group-append">
                <button class="btn btn-info font-weight-bold px-3">Sign Up</button>
            </div>
        </div>
        <small>Lorem ipsum dolor sit amet elit</small>
    </div>
</div> -->
<!-- Newsletter End -->

<!-- Tags Start -->
<div class="mb-3">
    <div class="section-title mb-0">
        <h4 class="m-0 text-uppercase font-weight-bold">Tags</h4>
    </div>
    <div class="bg-white border border-top-0 p-3">
        <div class="d-flex flex-wrap m-n1">
            <?php $query = mysqli_query($con, "select id,CategoryName from tblcategory");
            while ($row = mysqli_fetch_array($query)) {
            ?>


                <a class="btn btn-sm btn-outline-secondary m-1" href="category.php?catid=<?php echo htmlentities($row['id']) ?>"><?php echo htmlentities($row['CategoryName']); ?></a>



            <?php } ?>

        </div>
    </div>
</div>
<!-- Tags End -->



<!-- trending news start -->
<div class="mb-3">
    <div class="section-title mb-0">
        <h4 class="m-0 text-uppercase font-weight-bold">Trending News</h4>
    </div>
    <div class="bg-white border border-top-0 p-3">
        <div class="list-group">
            <?php
            $apiUrl = 'http://localhost/news/newsportal/api/trendingnews.php';

            // Fetch data from API
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $apiUrl);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec($curl);
            $data = json_decode($response, true);
            curl_close($curl);

            // Display data
            if ($data) {
                foreach ($data as $post) {

                    echo '<div class="border p-1 pb-1">';
                    
                    echo '<h5 class="badge badge-info text-uppercase font-weight-semi-bold p-2 mr-2"> ' . $post['catname'] . '  </h5>';
                    echo '<a class="h4 d-block mb-3 text-secondary font-weight-normal" href="news-details.php?nid='
                        . $post['pid'] . '">'
                        . substr($post['posttitle'], 0, 25) . '</a>';

                    echo '</div>';
                }
            } else {
                echo 'No data found';
            }
            ?>

        </div>



    </div>
</div>
</div>
        
     
      

      <!-- Sidebar Widgets Column -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <?php include('includes/footer.php'); ?>

  <!-- <div id="google_translate_element"></div> -->


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  </head>
</body>

</html>

<style>
  h1 a {
    color: black;
  }

  ul {}

  .col-md-8 {
    box-shadow: 10px 10px 5px 12px #ececec;

  }
</style>


<script type="text/javascript">
  function googleTranslateElementInit() {
    new google.translate.TranslateElement({
      pageLanguage: 'en'
    }, 'google_translate_element');
  }
</script>