<!-- Include jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<div class="container-fluid d-none d-lg-block">
    <div class="row align-items-center bg-dark px-lg-5">
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-sm bg-dark p-0">
                <ul class="navbar-nav ml-n2">
                    <li class="nav-item border-right border-secondary">
                        <a class="nav-link text-body small" href="#"><?php $mydate=getdate(date("U"));
               echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";?></a>
                    </li>
                    <li class="nav-item border-right border-secondary">
                        <a class="nav-link text-body small" href="#">Advertise</a>
                    </li>
                    <li class="nav-item border-right border-secondary">
                        <a class="nav-link text-body small" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-body small" href="#">Login</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="col-lg-3 text-right d-none d-md-block">
            <nav class="navbar navbar-expand-sm bg-dark p-0">
                <ul class="navbar-nav ml-auto mr-n2">
                    <li class="nav-item">
                        <a class="nav-link text-body" href="#"><small class="fab fa-twitter"></small></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-body" href="#"><small class="fab fa-facebook-f"></small></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-body" href="#"><small class="fab fa-linkedin-in"></small></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-body" href="#"><small class="fab fa-instagram"></small></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-body" href="#"><small class="fab fa-google-plus-g"></small></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-body" href="#"><small class="fab fa-youtube"></small></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="row align-items-center bg-white py-3 px-lg-5">
        <div class="col-lg-4">
            <a href="index.php" class="navbar-brand p-0 d-none d-lg-block">
                <h1 class="m-0 display-4 text-uppercase text-info">Daily <span
                        class="text-secondary font-weight-normal">News</span></h1>
            </a>
        </div>
        <div class="col-lg-8 text-center text-lg-right">
        <?php 
        $con = mysqli_connect('localhost','root','','news');
                              $sql = "SELECT * FROM tblads WHERE home = '' AND nav ='' ORDER BY footer";
                              $result = $con->query($sql);

    if ($result->num_rows > 0) {
      // Fetch the row
      $row = $result->fetch_assoc();

      // Display the image
      echo '<a href="' . $row['link'] . '" target="_blank">';
      echo' <img style="height: 100px; width: -webkit-fill-available;" src="./admin/postimages/' . htmlentities($row["footer"]) . '">
      </a>';
      echo '<br>';
    }
  ?>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
        <a href="index.html" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 display-4 text-uppercase text-info">Daily<span
                    class="text-white font-weight-normal">News</span></h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
            <div class="navbar-nav mr-auto py-0">
                <a href="index.php" class="nav-item nav-link active bg-info">Home</a>
                <a href="about-us.php" class="nav-item nav-link">About</a>
                <a href="news.php" class="nav-item nav-link"> News</a>
                <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Category</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="#" class="dropdown-item">Menu item 1</a>
                            <a href="#" class="dropdown-item">Menu item 2</a>
                            <a href="#" class="dropdown-item">Menu item 3</a>
                        </div>
                    </div> -->
                <a href="contact-us.php" class="nav-item nav-link">Contact</a>
                <a href="addnews.php" class="nav-item nav-link">Add News</a>
                <?php 
if(isset($_SESSION['name'])){
    $name = $_SESSION['name'];
    echo '<div class="dropdown">';
    echo '<button class="btn btn-secondary dropdown-toggle d-flex justify-content-center align-items-center  bg-info" style="
    position: relative;
    top: 10px;
" type="button" id="profileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
    echo $name;
    echo '</button>';
    echo '<div class="dropdown-menu" aria-labelledby="profileDropdown">';
    echo '<a class="dropdown-item" href="profile.php">Profile</a>';
    echo '<a class="dropdown-item" href="logout.php">Logout</a>';
    echo '</div>';
    echo '</div>';
} else {
    echo '<a href="login.php" class="nav-item nav-link">Login</a>';
}
?>






            </div>

                <div class="input-group ml-auto d-none d-lg-flex" style="width: 100%; max-width: 300px;">
<form action="search.php" method="post">

                    <input type="text" class="form-control border-0" placeholder="search news .." name="searchtitle" id="searchtitle">
                    <div class="shadow" id="searchResults" ></div>

                    <div class="input-group-append">
                        
                    </div>
                    </form>

                </div>
        </div>
    </nav>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>

$(document).ready(function() {
    $('#searchtitle').on('input', function() {
        var searchText = $(this).val();
        if (searchText !== '') {
            $.ajax({
                url: 'search.php', // Replace 'search.php' with the actual PHP file where your query is executed
                method: 'POST',
                data: { searchText: searchText },
                success: function(response) {
                    $('#searchResults').html(response);
                }
            });
        } else {
            $('#searchResults').empty();
        }
    });
});

</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="jquery-3.6.4.min.js"></script>


<!-- Old -->

<!-- 
 <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-info" style="height:6pc">
     <div class="container" style=" min-width: -webkit-fill-available">
         <h1> <a href="index.php" style="color:white"> Daily News </a> </h1>
         <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
             data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
             aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>

         
         <div class="collapse navbar-collapse" id="navbarResponsive">
             <ul class="navbar-nav ml-10 ">
                 <li class="nav-item">
                     <a class="nav-link " href="index.php">Home</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link " href="about-us.php">About</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link " href="index.php">News</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link " href="contact-us.php">Contact us</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="admin/">Admin</a>
                 </li>

             </ul>
         </div>

         <div class="search" style="display:flex;">
             <form name="search" action="search.php" method="post">

                 <input type="text" name="searchtitle" class="form-control" placeholder="Search for..." required>
                 <span class="input-group-btn">
                      <button class="btn btn-secondary" type="submit">Go!</button> -->
<!-- <input type="hidden" name="submit">
                 </span>
             </form>
         </div>
     </div>
 </nav> -->


 
 <style>

    #searchResults{
        position: absolute;
        top: 50px;
        z-index: 1;
        right: 2pc;
        background-color: aliceblue;
    }

    .navbar-nav a{
        text-transform: lowercase;
    }
 </style>