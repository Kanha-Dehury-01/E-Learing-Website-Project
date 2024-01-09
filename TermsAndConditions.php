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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    
    
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

     h2,h3,h4{
        font-family: 'Bona Nova', serif;
    }
    </style>
</head>
<body >
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

    <h4 class="text-center" style=" font-size:3em; ">Terms and conditions</h4>
    <br><br><br>
    <div>
        <h4>User Accounts</h4>
        <p>
            <ol type="a">
                <li>Users must create an account to access the website's courses and resources.</li>
                <li>Users are responsible for maintaining the confidentiality of their account information and password.</li>
                <li>Users are responsible for all activities that occur under their account.</li>
            </ol>
        </p>

    </div>

    <div>
        <h4>Content Ownership</h4>
        <p>
            <ol type="a">
                <li>All content on the website, including text, images, videos, and audio, is owned by the website and/or its content providers.</li>
                <li> Users may not copy, modify, distribute, or transmit any content from the website without the website's written consent.</li>
                <li>Users grant the website a license to use, reproduce, modify, and distribute any content they submit to the website.</li>
            </ol>
        </p>

    </div>

    <div>
        <h4>Acceptable Use</h4>
        <p>
            <ol type="a">
                <li> Users must use the website for lawful purposes only.</li>
                <li>Users must not post or transmit any content that is defamatory, obscene, or infringes on the intellectual property rights of others.</li>
                <li>Users must not use the website to engage in any activity that could harm the website or its users.</li>
            </ol>
        </p>

    </div>

    <div>
        <h4>Privacy</h4>
        <p>
            <ol type="a">
                <li>The website collects personal information from users for the purpose of providing access to courses and resources.</li>
                <li>The website may use cookies and other tracking technologies to improve the user experience.</li>
                <li>The website will not sell or share user information with third parties without the user's consent.</li>
            </ol>
        </p>

    </div>

    <div>
        <h4>Liability</h4>
        <p>
            <ol type="a">
                <li>The website is not responsible for any loss or damage arising from the use of the website or its content.</li>
                <li>The website is not liable for any technical issues, including website downtime or system failures.</li>
                <li>Users agree to indemnify the website and its affiliates from any claims or damages arising from their use of the website.</li>
            </ol>
        </p>

    </div>

    <p>By accessing and using the website, users agree to abide by these terms and conditions. The website reserves the right to modify these terms at any time, and users are encouraged to review them regularly.
    </p>

    


    <div class="container">
        <UL class="nav col-md justify-content-center list-unstyled d-flex">
          <li class="ms-5"><a href="ContactUs.php" class="text-muted text-decoration-none">Contact Us</a></li>
          <li class="ms-5"><a href="AboutUs.php" class="text-muted text-decoration-none">About Us</a></li>
        </UL>

        
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
          <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
              <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
            </a>
            <span class="text-muted">© Learnfinity 2023 Company, Inc</span>
          </div>

          <ul class="nav col-md justify-content-center list-unstyled d-flex">
          <li class="ms-5"><a href="AdminLogin.php" class="text-muted text-decoration-none">Admin Login</a></li>
          </ul>
      
          <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-instagram"></i></a></li>
            <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-twitter"></i></a></li>
            <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-linkedin"></i></a></li>
          </ul>
        </footer>
    </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>