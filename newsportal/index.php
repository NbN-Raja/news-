<?php
session_start();
include('includes/config.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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

<body style="padding-top:0">

    <!-- Navigation Bar  -->
    <?php include("includes/header.php")  ?>


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 px-0">
                <div class="">
                    <?php
                    $query1 = mysqli_query($con, "select tblposts.id as pid,tblposts.PostImage as postImage , tblposts.viewCounter as view, tblposts.PostTitle as posttitle,tblposts.PostDetails as postdetail,tblposts.PostingDate as postdate,tblcategory.CategoryName as catname from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join tblsubcategory on tblsubcategory.SubCategoryId=tblposts.SubCategoryId order by viewCounter desc limit 1");
                    while ($result = mysqli_fetch_array($query1)) {

                    ?>
                        </a>
                        <a href="news-details.php?nid=<?php echo htmlentities($result['pid']) ?>">
                            <div class="position-relative overflow-hidden" style="height: 500px;">
                                <img class="img-fluid h-100" src="./admin/postimages/<?php echo htmlentities($result['postImage']); ?>" style="object-fit: cover;">
                                <div class="overlay">
                                    <div class="mb-2">
                                        <a class="badge badge-info text-uppercase font-weight-semi-bold p-2 mr-2" href=""><?php echo htmlentities($result['catname']) ?> </a>
                                        <a class="text-white" href=""><?php echo htmlentities($result['postdate']); ?></a>

                                        <small class="ml-3"> <i class="far fa-eye mr-2"></i><?php echo htmlentities($result['view']); ?></small>
                                        <!-- <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small> -->

                                    </div>
                                    <a href="news-details.php?nid=<?php echo htmlentities($result['pid']) ?>" class="h2 m-0 text-white text-uppercase font-weight-bold" href="">
                                        <?php $title = htmlentities($result['posttitle']);
                                        echo substr($title, 0, 25) . "..."   ?></a>

                                    <i class="" href=""> <?php $title = htmlentities($result['postdetail']) ?></i>

                                </div>
                            </div>
                </div>
                </a>
            <?php } ?>
            </div>

            <!-- side News Here  -->

            <div class="">


                <?php
                $query1 = mysqli_query($con, "select tblposts.id as pid,tblposts.PostImage as postImage , tblposts.viewCounter as view,tblposts.PostTitle as posttitle,tblposts.PostDetails as postdetail,tblposts.PostingDate as postdate,tblcategory.CategoryName as catname from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join tblsubcategory on tblsubcategory.SubCategoryId=tblposts.SubCategoryId order by tblposts.PostingDate desc limit 2");
                $count = 0;
                while ($result = mysqli_fetch_array($query1)) {
                    // start new row every 2 columns


                    echo ' <div class="">
                    
                    <a href="news-details.php?nid=' . $result['pid'] . '">
                <div class="card" style="margin:0px; border-radius:0px" >
                      <div class="position-relative" style="    height: 248px ;object-fit: cover;" >
                        <img src="./admin/postimages/' . htmlentities($result["postImage"]) . '" class="card-img-top opacity-50 img-fluid">
                        
                      </div>
                      <div class="card-body" style="position:absolute; position: absolute;top: 9pc;     background-color: rgb(0 0 0 / 30%); width: -webkit-fill-available;">
                      <a id="category" class="badge badge-info text-uppercase font-weight-semi-bold p-2 mr-2" href="">' . $result['catname'] . '</a>
                        <a class="text-white" ><small>' . $result['postdate'] . '</small></a>
                        <h5 class="card-title text-white text-uppercase">' . $result['posttitle'] . '</h5>
                        
                        
                        <div class="d-flex justify-content-between align-items-center text-white">
                          <small class="ml-3"><i class="far fa-eye mr-2"></i>' . $result['view'] . '</small>
                          <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                        </div>
                      </div>
                    </div>
                  </a>
                    </div>';
                }
                ?>

                <!-- Advertisement  -->



            </div>

            <div class="advertisement">
                <div class="image-fluid" style="background-color: aqua;width: 260px; height: 500px;">
                <?php 
$sql = "SELECT * FROM tblads WHERE home = '' ORDER BY nav;
";                              $result = $con->query($sql);
                          
                              if ($result->num_rows > 0) {
                                  // Fetch the row
                                  $row = $result->fetch_assoc();
                                  $nav = $row['nav'];
                                  $post = $row['posted_on'];
                                  $id = $row['id'];
                                  $link= $row['link'];
                          
                                  // Display the image
                            
                                   
                                  
                                  echo '<a href="' . $link . '" target="_blank">';
                                  echo '<img  width="260px" height= "500px" height="100px" src="admin/postimages/' . htmlentities($row["nav"]) . '">
                                   </a>';
                                   
                                   
                              }
                                ?>
                    
                </div>
            </div>

        </div>




    </div>
    </div>




    <!-- Breaking News  -->
    <div class="container-fluid bg-dark py-3 mb-3">
        <div class="container">
            <div class="row align-items-center bg-dark">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <div class="bg-danger text-dark text-center font-weight-medium py-2" style="width: 170px;">
                            Breaking News</div>
                        <div class="owl-carousel ticker tranding-carousel position-relative d-inline-flex align-items-center ml-3" style="width: calc(100% - 170px); padding-right: 90px;">

                            <!-- php fetch news  -->
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
                                <marquee direction="left" scrollamount="10">

                                    <div class="text-truncate"><a class="text-white text-uppercase font-weight-semi-bold" href=""> <?php echo $title ?> </a></div>
                                </marquee>
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
                </div>
            </div>
        </div>
    </div>




    <!-- Second Advertiusement  -->

    <div style="width: 100%; display: flex; justify-content: center; padding-bottom:10px">
  <?php 
    $sql = "SELECT * FROM tblads WHERE nav = '' ORDER BY home;";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
      // Fetch the row
      $row = $result->fetch_assoc();

      // Display the image
      echo '<a href="' . $row['link'] . '" target="_blank">';
      echo' <img style="height: 100px;" src="./admin/postimages/' . htmlentities($row["home"]) . '">
      </a>';
      echo '<br>';
    }
  ?>
</div>



    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ">
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Trending News</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                       <div class="list-group p-2 ">';
                                <?php
                                $apiUrl = 'http://localhost/news/newsportal/api/trendingnews.php';

                                // Fetch data from API
                                $curl = curl_init();
                                curl_setopt($curl, CURLOPT_URL, $apiUrl);
                                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                                $response = curl_exec($curl);
                                $data = json_decode($response, true);
                                curl_close($curl);

                                if ($data) {
                                    foreach ($data as $post) {
                                        echo '<div class="p-1 pb-4 ">';
                                        echo '<div class="media shadow">';

                                        // Image on the left
                                        echo '<div class="image-container">';
                                        echo '<img class="" src="./admin/postimages/' . htmlentities($post["postImage"]) . '" alt="Post Image">';
                                        echo '</div>';


                                        // Text and category on the right
                                        echo '<div class="ml-3 media-body mr-10">';
                                        echo '<h5 class="badge badge-info text-uppercase font-weight-semi-bold p-2 mr-2">' . $post['catname'] . '</h5>';
                                        echo '<a class="h4 d-block mb-3 text-secondary font-weight-semi-bold" href="news-details.php?nid='
                                            . $post['pid'] . '">'
                                            . substr($post['posttitle'], 0, 25) . '</a>';
                                        $words = explode(' ', $post['postdetail']);
                                        $limitedWords = array_slice($words, 0, 30);
                                        $limitedText = implode(' ', $limitedWords);
                                        echo '<a>' . $limitedText . '</a> ... <br>';
                                        echo '<a>' . $post['postdate'] .   '</a> <br>';
                                        echo '<h5 class="badge badge-info text-uppercase font-weight-semi-bold p-2 mr-2"> Read More</h5>';
                                        echo '</div>';

                                        echo '</div>';
                                        echo '</div>';
                                    }
                                } else {
                                    echo 'No data found';
                                }
                                ?>


                            </div>



                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title" style="   ">
                                <h4 class="m-0 text-uppercase font-weight-bold">Latest News</h4>
                            </div>
                        </div>

                        <!-- included file here -->
                        <!-- ************************************************ Latest News Start ***************************************************** -->

                        <?php
                        $apiUrl = 'http://localhost/news/newsportal/api/latestnews.php';

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
                                echo '<a href="news-details.php?nid=' . $post['pid'] . '">
                                        <div class="card">
                                            <div class="card-img"> 
                                                <img src="./admin/postimages/' . htmlentities($post["postImage"]) . '">
                                            </div>
                                            <div class="card-info">
                                                <a id="category" class="badge badge-info text-uppercase font-weight-semi-bold p-2 mr-2" href="">' . $post['catname'] . '</a>
                                                <a class="text-body"><small>' . $post['postdate'] . '</small></a>
                                                <h2 class="blog-title">' . $post['posttitle'] . '</h2>';
                        
                                $words = explode(' ', $post['postdetail']);
                                $limitedWords = array_slice($words, 0, 30);
                                $limitedText = implode(' ', $limitedWords);
                                echo '<p>' . $limitedText . ' ... </p>
                                      <hr>
                                      <small class="ml-3"><i class="far fa-eye mr-2"></i>' . $post['view'] . '</small>
                                      <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                                    </div>
                                </div>
                            </a>';
                            }
                        } else {
                            echo 'No data found';
                        }
                        ?>








                        <!-- ************************************************ Latest News end ***************************************************** -->




                    </div>
                </div>
                <div class="col-lg-12">




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
                            <h4 class="m-0 text-uppercase font-weight-bold">Popular News</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <div class="list-group">
                                <?php
                                $apiUrl = 'http://localhost/news/newsportal/api/popularnews.php';

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
                                        echo '<a class="h4 d-block mb-3 text-secondary font-weight-semi-bold" href="news-details.php?nid='
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

            </div>
        </div>
    </div>


    <!-- footer  -->
    <?php include('includes/footer.php')  ?>



</body>

</html>

<style>
    .card {
        width: 365px;
        border: 1px solid #ccc;
        border-radius: 5px;
        overflow: hidden;
        margin: 11px 13px 4px 2px;

    }

    .card-img {
        width: 100%;
        height: 200px;
        overflow: hidden;
    }

    .card-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .card-info {
        padding: 10px;
    }

    .blog-title {
        margin: 0;
        font-size: 24px;
        font-weight: bold;
    }

    .category,
    .views {
        display: inline-block;
        margin-right: 10px;
        font-size: 14px;
        color: #888;
    }

    .category:before {
        content: "Category: ";
    }

    .views:before {
        content: "Views: ";
    }


    .image-container {
        width: 203px;
        height: 206px;
        overflow: hidden;
    }

    .image-container img {
        width: auto;
        height: 100%;
        object-fit: cover;
    }
</style>




