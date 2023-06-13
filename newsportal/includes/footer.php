<!-- Footer Start -->
<div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5">
        <div class="row py-4">
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Get In Touch</h5>
                <p class="font-weight-medium"><i class="fa fa-map-marker-alt mr-2"></i>Bharatpuu, Chitwan Nepal </p>
                <p class="font-weight-medium"><i class="fa fa-phone-alt mr-2"></i>+977 9865458699 </p>
                <p class="font-weight-medium"><i class="fa fa-envelope mr-2"></i>info@dailynews.com</p>
                <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">Follow Us</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square" href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">Popular News</h5>
            <?php
$query1=mysqli_query($con,"select tblposts.id as pid,tblposts.PostImage as postImage , tblposts.viewCounter as view, tblposts.PostTitle as posttitle,tblposts.PostDetails as postdetail,tblposts.PostingDate as postdate,tblcategory.CategoryName as catname from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join tblsubcategory on tblsubcategory.SubCategoryId=tblposts.SubCategoryId order by viewCounter desc limit 4");
while ($result=mysqli_fetch_array($query1)) {

?>
                    

                   
                <div class="mb-3">
                    <div class="mb-2">
                        <a class="badge badge-info text-uppercase font-weight-semi-bold p-1 mr-2" href=""><?php  echo htmlentities($result['catname']) ?></a>
                        <a class="text-body" href=""><?php echo htmlentities($result['postdate']);?></small></a>
                    </div>
                    <a class="small text-body text-uppercase font-weight-medium" href="news-details.php?nid=<?php echo htmlentities($result['pid'])?>"> <?php  $title=htmlentities($result['posttitle']); echo substr($title, 0, 25) . "..."   ?></a>
                </div>


                <?php } ?>

                
                
                
            </div>

            <!-- category Here  -->
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Categories</h5>
               
                <?php $query=mysqli_query($con,"select id,CategoryName from tblcategory");
while($row=mysqli_fetch_array($query))
{
?>

                     <div class="m-n1">
                    <div class="btn btn-sm btn-secondary m-1"
                        href="category.php?catid=<?php echo htmlentities($row['id'])?>"><?php echo htmlentities($row['CategoryName']);?></div>
                        </div>
                        

                    <?php } ?>
        

   
               
            </div>
            <!-- <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Flickr Photos</h5>
                <div class="row">
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="../new/img/news-110x110-1.jpg" alt=""></a>
                    </div>
                    <div class="col-4 mb-3">
                    <a href=""><img class="w-100" src="../new/img/news-110x110-1.jpg" alt=""></a>
                    </div>
                    <div class="col-4 mb-3">
                    <a href=""><img class="w-100" src="../new/img/news-110x110-1.jpg" alt=""></a>
                    </div>
                    <div class="col-4 mb-3">
                    <a href=""><img class="w-100" src="../new/img/news-110x110-1.jpg" alt=""></a>
                    </div>
                    <div class="col-4 mb-3">
                    <a href=""><img class="w-100" src="../new/img/news-110x110-1.jpg" alt=""></a>
                    </div>
                    <div class="col-4 mb-3">
                    <a href=""><img class="w-100" src="../new/img/news-110x110-1.jpg" alt=""></a>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
        <p class="m-0 text-center">&copy; <a href="#">Daily News</a>. All Rights Reserved.@Pratima Dhakal  @Shreaya Aryal 
		
		<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
		
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-info btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>