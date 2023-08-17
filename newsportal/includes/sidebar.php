  <div class="col-md-4">

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
        </form>
      </div>
    </div>
  </div>

  <!-- Categories Widget -->
  <div class="mb-3">
    <div class="section-title mb-0">
        <h4 class="m-0 text-uppercase font-weight-bold">Category</h4>
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

  <!-- Side Widget -->
  <!-- <div class="card my-4">
            <h5 class="card-header">Recent News</h5>
            <div class="card-body">
                      <ul class="mb-0">
                         <?php
                          $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId limit 8");
                          while ($row = mysqli_fetch_array($query)) {

                          ?>

  <li>
                      <a href="news-details.php?nid=<?php echo htmlentities($row['pid']) ?>"><?php echo htmlentities($row['posttitle']); ?></a>
                    </li>
            <?php } ?>
          </ul>
            </div>
          </div> -->


  <!-- Side Widget -->
  <div class="card my-4">
    <h5 class="card-header">Popular Newss</h5>
    <div class="card-body">
      <?php
      $query1 = mysqli_query($con, "select tblposts.id as pid,tblposts.PostImage as postImage ,tblposts.PostDetails as postdetail,tblposts.PostTitle as posttitle from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId  order by viewCounter desc limit 4");
      while ($result = mysqli_fetch_array($query1)) {
      ?>
        <a href="news-details.php?nid=<?php echo htmlentities($result['pid']) ?>">
          <div class="main" style="display:flex; ">
            <div class="">
              <img class="object-cover" style="width: 4pc; height: 4pc; object-fit: cover;     border-radius: 10px;" src="./admin/postimages/<?php echo htmlentities($result['postImage']); ?>">
            </div>
            <div class="h6 ml-2  m-0  font-weight-semi-bold">
              <a><?php $title = htmlentities($result['posttitle']);
                  echo substr($title, 0, 25) . "..." ?>
                  </a>
                  
            </div>

          </div>
        </a>
        <br>
      <?php } ?>
      </ul>
    </div>
  </div>


  
  <iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%23ffffff&ctz=Asia%2FKathmandu&mode=MONTH&hl=ne&showTabs=1" style="border:solid 1px #777" width="400" height="300" frameborder="0" scrolling="no"></iframe>


  </div>


  <style>
    ul a {
      color: black;
      padding-left: 10px;
    }

    .category {
      background-color: #e6e1e1;
      border-radius: 8px;
      font-size: 20px;
      font-weight: 600;
      min-width: min-content
    }
  </style>