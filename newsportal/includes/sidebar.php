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
  <div class="card">
    <h5 class="card-header">Categories</h5>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-6">
          <ul class="category list-unstyled mb-0">
            <?php $query = mysqli_query($con, "select id,CategoryName from tblcategory");
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
    <h5 class="card-header">Popular News</h5>
    <div class="card-body">

      <?php
      $query1 = mysqli_query($con, "select tblposts.id as pid,tblposts.PostImage as postImage ,tblposts.PostTitle as posttitle from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId  order by viewCounter desc limit 4");
      while ($result = mysqli_fetch_array($query1)) {

      ?>
        <a href="news-details.php?nid=<?php echo htmlentities($result['pid']) ?>">
          <div class="main" style="display:flex; justify-content: space-around;">
            
              <img class="" style="width:4pc; height:4pc" src="./admin/postimages/<?php echo htmlentities($result['postImage']); ?>">
          

            <div class=" h6 m-0  text-uppercase font-weight-semi-bold">
             <a>  <?php $title = htmlentities($result['posttitle']);
              echo substr($title, 0, 25) . "..."   ?>
              </a>
              
            </div>
          </div>
        </a>
        <br>


        <!-- <img src="<?php echo htmlentities($result['../admin/postimages/postImage']); ?>" alt="Post Image"> -->

        </a>

      <?php } ?>
      </ul>
    </div>
  </div>

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