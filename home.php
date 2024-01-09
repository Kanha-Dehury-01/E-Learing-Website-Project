<?php
if (!isset($_SESSION)) {
  session_start();
}
if ($_SESSION['valid_user'] != true) {
  header('Location: index.php');
  die();
}

include 'dbconnect.php';
$SId = $_SESSION['ID'];

$result = mysqli_query($conn, "SELECT * FROM register where ID='$SId'");
while ($row = mysqli_fetch_array($result)) {
  $EId = $row['ID'];
  $uName = $row['First_Name'];
  $upic = $row['File'];
}
$sql = "SELECT * from cart where student_id = '$EId'";
$rowcount = 0;

if ($result = mysqli_query($conn, $sql)) {

  // Return the number of rows in result set
  $rowcount = mysqli_num_rows($result);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>


  <script src="https://kit.fontawesome.com/3a9eef0171.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Bona+Nova&family=Cinzel:wght@400;900&family=Libre+Baskerville&family=Poppins:wght@200;500& display=swap"
    rel="stylesheet">
  <style>
    .cbo {
      min-width: 300px;
      overflow: auto;
      overflow-x: scroll;
      white-space: nowrap;
    }

    .cbw {
      min-width: 25%;
      width: 25%;
      display: inline-block;
    }

    .skill-row {

      margin: 100px auto;
      text-align: left;
      line-height: 2;
      display: table;

    }

    .tablecol1 {
      padding: 5%;
    }

    p {
      font-family: 'Poppins', sans-serif;
    }

    h1,
    h2,
    h3 {
      font-family: 'Bona Nova', serif;
    }
  </style>
  <title>Learnfinity</title>
</head>

<body >
  <nav class="navbar navbar-expand  sticky-top" style="background-color:#A66CFF;">
    <div class="container-fluid">
      <img src="Image/icon.png" alt="" style="width:1.5rem;">
      <a class="navbar-brand" href="home.php">Learnfinity</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link " href="home.php#Categories" role="button">
              Categories
            </a>

          </li>

          <li>
            <form class="d-flex align-middle" role="search">
              <input class="form-control ms-5 me-2 rounded-pill border-0" type="search" placeholder="Search"
                aria-label="Search">
              <button class="btn " type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
          </li>
        </ul>
        <a class="navbar-brand">Welcome,
          <?php echo $uName ?>
        </a>
        <a href="user.php"><img src="Student_Image/<?php echo $upic ?>" alt=""
            style="width:40px; border-radius: 100%;"></a>
        <a href="Cart.php" class=" ms-2 btn btn-dark btn-sm"><i class="fa-solid fa-cart-shopping">
            <?php echo $rowcount ?>
          </i></a>
      </div>
    </div>
  </nav>

  <div id="carouselExampleAutoplaying" class="carousel slide " data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="3000">
        <img src="Image/5.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item" data-bs-interval="3000">
        <img src="Image/3.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item" data-bs-interval="3000">
        <img src="Image/4.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item" data-bs-interval="3000">
        <img src="Image/2.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item" data-bs-interval="3000">
        <img src="Image/7.png" class="d-block w-100" alt="...">
      </div>

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
      data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
      data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="ms-1" style="margin-top: 60px; " id="Categories">
    <br>

    <h1 class="mt-5">A broad selection of courses</h1>
    <p class="mt-2">Choose from thousand of online video courses with new additions every month</p>
  </div>


  <!--Courses Card Scroll-->
  <ul class="nav ">
    <li class="nav-item">
      <button class="tablinks shadow-sm btn rounded-pill btn-outline-primary border-0 btn-sm m-2"
        onclick="openCourse(event, 'IT and Software')" id="defaultOpen"><strong>IT and Software</strong></button>
    </li>
    <li class="nav-item">
      <button class="tablinks shadow-sm btn rounded-pill btn-outline-primary border-0 btn-sm m-2 "
        onclick="openCourse(event, 'Defence')"><strong>Defence</strong></button>
    </li>
    <li class="nav-item">
      <button class="tablinks shadow-sm btn rounded-pill btn-outline-primary border-0 btn-sm m-2"
        onclick="openCourse(event, 'SSC')"><strong>SSC</strong></button>
    </li>
    <li class="nav-item">
      <button class="tablinks shadow-sm btn rounded-pill btn-outline-primary border-0 btn-sm m-2"
        onclick="openCourse(event, 'Medical & Engineering')"><strong>Medical & Engineering</strong></button>
    </li>
    <li class="nav-item">
      <button class="tablinks shadow-sm btn rounded-pill btn-outline-primary border-0 btn-sm m-2"
        onclick="openCourse(event, 'UPSC')"><strong>UPSC</strong></button>
    </li>
  </ul>

  <div id="IT and Software" class="tabcontent">
    <div class="border border-primary border-2 bg-primary-subtle rounded-top rounded-5 p-3 m-1 ">

      <h3>Expand your career opportunities with IT and Software</h3>
      <p>Take one of Learnfinity range of Python courses and learn how to code using this incredibly useful language.
        Its simple syntax and readability makes Python perfect for Flask, Django, data science, and machine learning.
        You’ll learn how to build everything from games to sites to apps. Choose from a range of courses that will
        appeal to ...</p>

      <div class="cbo d-flex align-items-start">
        <?php
        include_once 'dbconnect.php';
        $result = mysqli_query($conn, "SELECT * FROM courses");
        ?>


        <?php

        if (mysqli_num_rows($result) > 0) {
          ?>

          <?php
          $i = 0;
          while ($row = mysqli_fetch_array($result)) {
            ?>
            <?php
            if ($row["Course_C"] == 'IT') {
              ?>

              <div class="cbw text-wrap m-2 p-1">
                <img src="Course_Image/<?php echo $row["Course_pic"]; ?>" alt="" style="width:100%; border-radius:10px;">
                <h3 class="mt-2">
                  <?php echo $row["Course_Name"]; ?>
                </h3>
                <p>
                  <?php echo $row["Course_Description"]; ?>
                </p>
                <ul class="list-unstyled d-flex  text-warning mb-0">
                  <?php
                  for ($j = 0; $j < $row["Course_R"]; $j++) {
                    ?>
                    <li><i class="fas fa-star fa-sm"></i></li>
                    <?php
                  }
                  ?>
                </ul>
                <p class="h3"><strong>₹
                    <?php echo $row["Course_OP"]; ?>
                  </strong> <span class="text-muted h6"><strike>₹
                      <?php echo $row["Course_MRP"]; ?>
                    </strike></span></p>
                <a href="<?php echo $row["Course_Link"]; ?>" class="btn btn-dark ">Explore and buy</a>
              </div>
              <?php
            }
            $i++;
          }
          ?>
          <?php
        } else {
          echo "No result found";
        }
        ?>


      </div>
    </div>
  </div>

  <div id="Defence" class="tabcontent">
    <div class="border border-dark border-2 bg-primary-subtle rounded-top rounded-5 p-3 m-1">

      <h3>Expand your career opportunities with Defence Studies</h3>
      <p>Defence Studies is the approach of studying national security and which includes geopolitics, military
        geography, science and technology, war and strategic studies, warfare and national security studies and much
        more.</p>

      <div class="cbo d-flex align-items-start">
        <?php
        include_once 'dbconnect.php';
        $result = mysqli_query($conn, "SELECT * FROM courses");
        ?>


        <?php

        if (mysqli_num_rows($result) > 0) {
          ?>

          <?php
          $i = 0;
          while ($row = mysqli_fetch_array($result)) {
            ?>
            <?php
            if ($row["Course_C"] == 'Defence') {
              ?>

              <div class="cbw text-wrap m-2 p-1">
                <img src="Course_Image/<?php echo $row["Course_pic"]; ?>" alt="" style="width:100%; border-radius:10px;">
                <h3 class="mt-2">
                  <?php echo $row["Course_Name"]; ?>
                </h3>
                <p>
                  <?php echo $row["Course_Description"]; ?>
                </p>
                <ul class="list-unstyled d-flex  text-warning mb-0">
                  <?php
                  for ($j = 0; $j <= $row["Course_R"]; $j++) {
                    ?>
                    <li><i class="fas fa-star fa-sm"></i></li>
                    <?php
                  }
                  ?>
                </ul>
                <p class="h3"><strong>₹
                    <?php echo $row["Course_OP"]; ?>
                  </strong> <span class="text-muted h6"><strike>₹
                      <?php echo $row["Course_MRP"]; ?>
                    </strike></span></p>
                <a href="<?php echo $row["Course_Link"]; ?>" class="btn btn-dark ">Explore and buy</a>
              </div>
              <?php
            }
            $i++;
          }
          ?>
          <?php
        } else {
          echo "No result found";
        }
        ?>


      </div>



    </div>
  </div>

  </div>

  <div id="SSC" class="tabcontent">
    <div class="border border-dark border-2 bg-primary-subtle rounded-top rounded-5 p-3 m-1">

      <h3>Expand your career opportunities with SSC</h3>
      <p>This SSC Mahapack includes Live Classes, Recorded Lecture by renowned Educators, Test series & EBooks curated by
        the best content team with the trust of <strong>Learnfinity</strong>.
        This will cater all the upcoming Exams of SSC including SSC CGL, SSC CPO, SSC CHSL,MTS, STENO, SSC GD, & State
        wise various Exams like UP, Delhi, Bihar and many More. <br>
        If you are preparing for SSC & State Exams then this is the most useful pack for you.
        This is a one stop solution for all of your exam preparation.
        This will add value and direction to your preparation at an affordable price.</p>

      <div class="cbo d-flex align-items-start">
        <?php
        include_once 'dbconnect.php';
        $result = mysqli_query($conn, "SELECT * FROM courses");
        ?>


        <?php

        if (mysqli_num_rows($result) > 0) {
          ?>

          <?php
          $i = 0;
          while ($row = mysqli_fetch_array($result)) {
            ?>
            <?php
            if ($row["Course_C"] == 'SSC') {
              ?>

              <div class="cbw text-wrap m-2 p-1">
                <img src="Course_Image/<?php echo $row["Course_pic"]; ?>" alt="" style="width:100%; border-radius:10px;">
                <h3 class="mt-2">
                  <?php echo $row["Course_Name"]; ?>
                </h3>
                <p>
                  <?php echo $row["Course_Description"]; ?>
                </p>
                <ul class="list-unstyled d-flex  text-warning mb-0">
                  <?php
                  for ($j = 0; $j <= $row["Course_R"]; $j++) {
                    ?>
                    <li><i class="fas fa-star fa-sm"></i></li>
                    <?php
                  }
                  ?>
                </ul>
                <p class="h3"><strong>₹
                    <?php echo $row["Course_OP"]; ?>
                  </strong> <span class="text-muted h6"><strike>₹
                      <?php echo $row["Course_MRP"]; ?>
                    </strike></span></p>
                <a href="<?php echo $row["Course_Link"]; ?>" class="btn btn-dark ">Explore and buy</a>
              </div>
              <?php
            }
            $i++;
          }
          ?>
          <?php
        } else {
          echo "No result found";
        }
        ?>


      </div>



    </div>

  </div>
  </div>

  <div id="Medical & Engineering" class="tabcontent">
    <div class="border border-dark border-2 bg-primary-subtle rounded-top rounded-5 p-3 m-1">

      <h3>Expand your career opportunities with Medical & Engineering</h3>
      <p>Learnfinity provides online courses for Engineering (JEE Main, JEE Advanced, BITSAT) and Medical (NEET-UG) entrance examinations. The online courses also cover IAT, NTSE, Olympiads and CBSE/ ICSE Boards preparation. The online courses include live classes, hard copy study material and online test series.</p>

      <div class="cbo d-flex align-items-start">
        <?php
        include_once 'dbconnect.php';
        $result = mysqli_query($conn, "SELECT * FROM courses");
        ?>


        <?php

        if (mysqli_num_rows($result) > 0) {
          ?>

          <?php
          $i = 0;
          while ($row = mysqli_fetch_array($result)) {
            ?>
            <?php
            if ($row["Course_C"] == 'ME') {
              ?>

              <div class="cbw text-wrap m-2 p-1">
                <img src="Course_Image/<?php echo $row["Course_pic"]; ?>" alt="" style="width:100%; border-radius:10px;">
                <h3 class="mt-2">
                  <?php echo $row["Course_Name"]; ?>
                </h3>
                <p>
                  <?php echo $row["Course_Description"]; ?>
                </p>
                <ul class="list-unstyled d-flex  text-warning mb-0">
                  <?php
                  for ($j = 0; $j <= $row["Course_R"]; $j++) {
                    ?>
                    <li><i class="fas fa-star fa-sm"></i></li>
                    <?php
                  }
                  ?>
                </ul>
                <p class="h3"><strong>₹
                    <?php echo $row["Course_OP"]; ?>
                  </strong> <span class="text-muted h6"><strike>₹
                      <?php echo $row["Course_MRP"]; ?>
                    </strike></span></p>
                <a href="<?php echo $row["Course_Link"]; ?>" class="btn btn-dark ">Explore and buy</a>
              </div>
              <?php
            }
            $i++;
          }
          ?>
          <?php
        } else {
          echo "No result found";
        }
        ?>


      </div>
    </div>

  </div>
  </div>

  <div id="UPSC" class="tabcontent">
    <div class="border border-dark border-2 bg-primary-subtle rounded-top rounded-5 p-3 m-1">

      <h3>Expand your career opportunities with IT and Software</h3>
      <p>Take one of Learnfinity range of Python courses and learn how to code using this incredibly useful language.
        Its simple syntax and readability makes Python perfect for Flask, Django, data science, and machine learning.
        You’ll learn how to build everything from games to sites to apps. Choose from a range of courses that will
        appeal to ...</p>

      <div class="cbo d-flex align-items-start">
        <?php
        include_once 'dbconnect.php';
        $result = mysqli_query($conn, "SELECT * FROM courses");
        ?>


        <?php

        if (mysqli_num_rows($result) > 0) {
          ?>

          <?php
          $i = 0;
          while ($row = mysqli_fetch_array($result)) {
            ?>
            <?php
            if ($row["Course_C"] == 'UPSC') {
              ?>

              <div class="cbw text-wrap m-2 p-1">
                <img src="Course_Image/<?php echo $row["Course_pic"]; ?>" alt="" style="width:100%; border-radius:10px;">
                <h3 class="mt-2">
                  <?php echo $row["Course_Name"]; ?>
                </h3>
                <p>
                  <?php echo $row["Course_Description"]; ?>
                </p>
                <ul class="list-unstyled d-flex  text-warning mb-0">
                  <?php
                  for ($j = 0; $j <= $row["Course_R"]; $j++) {
                    ?>
                    <li><i class="fas fa-star fa-sm"></i></li>
                    <?php
                  }
                  ?>
                </ul>
                <p class="h3"><strong>₹
                    <?php echo $row["Course_OP"]; ?>
                  </strong> <span class="text-muted h6"><strike>₹
                      <?php echo $row["Course_MRP"]; ?>
                    </strike></span></p>
                <a href="<?php echo $row["Course_Link"]; ?>" class="btn btn-dark ">Explore and buy</a>
              </div>
              <?php
            }
            $i++;
          }
          ?>
          <?php
        } else {
          echo "No result found";
        }
        ?>


      </div>
    </div>

  </div>
  </div>

  <script>
    function openCourse(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }
    document.getElementById("defaultOpen").click();
  </script>

  <h2 class="ms-1 mb-3" style="margin-top:60px;">Top Courses Liked By Millions OF Students</h2>
  <div class="border border-primary border-2 bg-primary-subtle rounded rounded-5 p-3 m-1 ">

    <div class="cbo d-flex align-items-start">
      <?php
      include_once 'dbconnect.php';
      $result = mysqli_query($conn, "SELECT * FROM courses");
      ?>


      <?php

      if (mysqli_num_rows($result) > 0) {
        ?>

        <?php
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
          ?>
          <?php
          if ($row["Course_R"] > '4') {
            ?>

            <div class="cbw text-wrap m-2 p-1">
              <img src="Course_Image/<?php echo $row["Course_pic"]; ?>" alt="" style="width:100%; border-radius:10px;">
              <h3 class="mt-2">
                <?php echo $row["Course_Name"]; ?>
              </h3>
              <p>
                <?php echo $row["Course_Description"]; ?>
              </p>
              <ul class="list-unstyled d-flex  text-warning mb-0">
                <?php
                for ($j = 0; $j < $row["Course_R"]; $j++) {
                  ?>
                  <li><i class="fas fa-star fa-sm"></i></li>
                  <?php
                }
                ?>
              </ul>
              <p class="h3"><strong>₹
                  <?php echo $row["Course_OP"]; ?>
                </strong> <span class="text-muted h6"><strike>₹
                    <?php echo $row["Course_MRP"]; ?>
                  </strike></span></p>
              <a href="<?php echo $row["Course_Link"]; ?>" class="btn btn-dark ">Explore and buy</a>
            </div>
            <?php
          }
          $i++;
        }
        ?>
        <?php
      } else {
        echo "No result found";
      }
      ?>


    </div>



  </div>
  </div>

  <h2>Reviews by student</h2>


  <div id="carouselExampleDark" class="carousel slide text-center carousel-dark" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="10000">
        <img class="rounded-circle shadow-1-strong mb-4" src="Image/avatar.png" alt="avatar" style="width: 150px;" />
        <div class="row d-flex justify-content-center">
          <div class="col-lg-8">
            <h5 class="mb-3">Anna Deynah</h5>
            <p>UX Designer</p>
            <p class="text-muted">
              <i class="fas fa-quote-left pe-2"></i>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus et deleniti
              nesciunt sint eligendi reprehenderit reiciendis, quibusdam illo, beatae quia
              fugit consequatur laudantium velit magnam error. Consectetur distinctio fugit
              doloremque.
            </p>
          </div>
        </div>
        <ul class="list-unstyled d-flex justify-content-center text-warning mb-0">
          <li><i class="fas fa-star fa-sm"></i></li>
          <li><i class="fas fa-star fa-sm"></i></li>
          <li><i class="fas fa-star fa-sm"></i></li>
          <li><i class="fas fa-star fa-sm"></i></li>
          <li><i class="far fa-star fa-sm"></i></li>
        </ul>
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img class="rounded-circle shadow-1-strong mb-4" src="Image/avatar.png" alt="avatar" style="width: 150px;" />
        <div class="row d-flex justify-content-center">
          <div class="col-lg-8">
            <h5 class="mb-3">John Doe</h5>
            <p>Web Developer</p>
            <p class="text-muted">
              <i class="fas fa-quote-left pe-2"></i>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus et deleniti
              nesciunt sint eligendi reprehenderit reiciendis.
            </p>
          </div>
        </div>
        <ul class="list-unstyled d-flex justify-content-center text-warning mb-0">
          <li><i class="fas fa-star fa-sm"></i></li>
          <li><i class="fas fa-star fa-sm"></i></li>
          <li><i class="fas fa-star fa-sm"></i></li>
          <li><i class="fas fa-star fa-sm"></i></li>
          <li><i class="far fa-star fa-sm"></i></li>
        </ul>
      </div>
      <div class="carousel-item">
        <img class="rounded-circle shadow-1-strong mb-4" src="Image/avatar.png" alt="avatar" style="width: 150px;" />
        <div class="row d-flex justify-content-center">
          <div class="col-lg-8">
            <h5 class="mb-3">Maria Kate</h5>
            <p>Photographer</p>
            <p class="text-muted">
              <i class="fas fa-quote-left pe-2"></i>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus et deleniti
              nesciunt sint eligendi reprehenderit reiciendis, quibusdam illo, beatae quia
              fugit consequatur laudantium velit magnam error. Consectetur distinctio fugit
              doloremque.
            </p>
          </div>
        </div>
        <ul class="list-unstyled d-flex justify-content-center text-warning mb-0">
          <li><i class="fas fa-star fa-sm"></i></li>
          <li><i class="fas fa-star fa-sm"></i></li>
          <li><i class="fas fa-star fa-sm"></i></li>
          <li><i class="fas fa-star fa-sm"></i></li>
          <li><i class="far fa-star fa-sm"></i></li>
        </ul>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="skill-row">
    <table>
      <tr>
        <td style="width: 500px;" class="tablecol1"><img src="Image/instructor.jpg" alt="" style="width: 100%;"></td>
        <td style="width: 500px;" class="tablecol1">
          <h2>Become an instructor</h2>
          <p>Instructors from around the world teach millions of students on Udemy. We provide the tools and skills to
            teach what you love.</p>
          <a href="JoinUs.php" class="btn btn-outline-dark "> Join Us </a>
        </td>
      </tr>
    </table>

  </div>

  <div class="container">
    <UL class="nav col-md justify-content-center list-unstyled d-flex">
      <li class="ms-5"><a href="ContactUs.php" class="text-muted text-decoration-none">Contact Us</a></li>
      <li class="ms-5"><a href="AboutUs.php" class="text-muted text-decoration-none">About Us</a></li>
      <li class="ms-5"><a href="TermsAndConditions.php" class="text-muted text-decoration-none">Terms & Condition</a>
      </li>
    </UL>


    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
      <div class="col-md-4 d-flex align-items-center">
        <a href="" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
          <svg class="bi" width="30" height="24">
            <use xlink:href="#bootstrap"></use>
          </svg>
        </a>
        <span class="text-muted">© Learnfinity 2023 Company, Inc</span>
      </div>

      <ul class="nav col-md justify-content-center list-unstyled d-flex">
        <li class="ms-5"><a href="AdminLogin.php" class="text-muted text-decoration-none">Admin Login</a></li>
      </ul>

      <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
        <li class="ms-3"><a class="text-muted" href="https://www.instagram.com/kanha.dehury.20/"><i
              class="fa-brands fa-instagram"></i></a></li>
        <li class="ms-3"><a class="text-muted" href="https://twitter.com/kanha_dehury"><i
              class="fa-brands fa-twitter"></i></a></li>
        <li class="ms-3"><a class="text-muted" href="https://www.linkedin.com/in/kanha-dehury-a3b7301b5/"><i
              class="fa-brands fa-linkedin"></i></a></li>
      </ul>
    </footer>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>

</body>

</html>