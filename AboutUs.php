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

  <title>Learnfinity</title>
  <style>
    p {
      font-family: 'Poppins', sans-serif;
    }
    h1,
    h2,
    h3,
    h4 {
      font-family: 'Bona Nova', serif;
    }
    p{
      font-size:1.3rem;
    }
  </style>
</head>

<body>
<nav class="navbar navbar-expand  sticky-top" style="background-color:#A66CFF">
        <div class="container-fluid">
            <img src="Image/icon.png" alt="" style="width:1.5rem;">
            <a class="navbar-brand" href="home.php">Learnfinity</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
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
                            <input class="form-control ms-5 me-2 rounded-pill border-0" type="search"
                                placeholder="Search" aria-label="Search">
                            <button class="btn " type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </li>
                </ul>
                <a class="navbar-brand">
                    <?php echo $uName ?>
                </a>
                <a href="logout.php"><img src="Student_Image/<?php echo $upic ?>" alt=""
                        style="width:40px; border-radius: 100%;"></a>
                <a href="Cart.php" class=" ms-2 btn btn-dark btn-sm"><i class="fa-solid fa-cart-shopping">
                        <?php echo $rowcount ?>
                    </i></a>
            </div>
        </div>
    </nav>

  <img src="Image/JoinUs1.png" alt="" style="width:100%;">
  <br><br>

  <div style="width:80%; margin:0 auto; " class=" d-flex ">
        <div class="text-center"style="margin:0 auto; " >
            
            <h1><strong>Improving life through <br> learning</strong></h1>
            <br><br>
            <p>Whether you want to learn or to share what you know, you’ve come to the right place. As a global destination for <br> online learning, we connect people through knowledge.</p>
            
        </div>
    </div>
    <br><br>



  <div style="width:50%; margin:0 auto; font-size:1em">

    <p class="text-center">Welcome to our e-learning website! Our mission is to make learning accessible, engaging, and
      effective for everyone. We believe that education is the key to unlocking people's potential, and that e-learning
      can play a crucial role in providing quality education to people all over the world.</p>
    <br>
    <br>

    <p class="text-center">Our team consists of experienced educators, instructional designers, and technology experts
      who are passionate about creating innovative e-learning solutions. We work hard to design courses that are
      interactive, engaging, and tailored to the needs of our users.</p>
    <br>
    <br>

    <p class="text-center">Whether you're a student, a professional, or someone who simply loves to learn, our website
      has something for you. We offer a wide range of courses in various subjects, from business and technology to
      language and personal development. Our courses are designed to help you acquire new skills and knowledge, advance
      your career, or simply pursue your passions.</p>
    <br>
    <br>

    <p class="text-center">We are committed to providing high-quality education that is accessible to everyone,
      regardless of their background or location. That's why we offer our courses at affordable prices, and why we use
      the latest technology to ensure that our courses can be accessed from anywhere, at any time.</p>
    <br>
    <br>

    <p class="text-center">Thank you for choosing our e-learning website, and we look forward to helping you achieve
      your learning goals!</p>
    <br>
    <br>

  </div>



  <div class="container">
    <UL class="nav col-md justify-content-center list-unstyled d-flex">
      <li class="ms-5"><a href="ContactUs.php" class="text-muted text-decoration-none">Contact Us</a></li>
      <li class="ms-5"><a href="TermsAndConditions.php" class="text-muted text-decoration-none">Terms & Condition</a>
      </li>
    </UL>


    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
      <div class="col-md-4 d-flex align-items-center">
        <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
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
            <li class="ms-3"><a class="text-muted" href="https://www.instagram.com/kanha.dehury.20/"><i class="fa-brands fa-instagram"></i></a></li>
            <li class="ms-3"><a class="text-muted" href="https://twitter.com/kanha_dehury"><i class="fa-brands fa-twitter"></i></a></li>
            <li class="ms-3"><a class="text-muted" href="https://www.linkedin.com/in/kanha-dehury-a3b7301b5/"><i class="fa-brands fa-linkedin"></i></a></li>
          </ul>
    </footer>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>

</body>

</html>