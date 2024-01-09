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

        h2,
        h3,
        h4 {
            font-family: 'Bona Nova', serif;
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

    <div id="carouselExampleAutoplaying" class="carousel slide " data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="2000">
                <img src="Image/JoinUs1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="Image/JoinUs2.png" class="d-block w-100" alt="...">
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
    <br><br>


    <h2 class="text-center"><strong>So many reasons to start</strong></h2>
    <div style="width:100%; margin:0 auto; " class=" d-flex ">
        <div class="m-5 text-center">
            <img src="Image/Join 1.jpg" alt="" style="width:8rem ">
            <h4>Teach your way</h4>
            <p>Publish the course you want, in the way you want, and always have control of your own content.</p>
        </div>
        <div class="m-5 text-center">
            <img src="Image/Join 2.jpg" alt="" style="width:8rem ">
            <h4>Teach your way</h4>
            <p>Publish the course you want, in the way you want, and always have control of your own content.</p>
        </div>
        <div class="m-5 text-center">
            <img src="Image/Join 3.jpg" alt="" style="width:8rem ">
            <h4>Teach your way</h4>
            <p>Publish the course you want, in the way you want, and always have control of your own content.</p>
        </div>
    </div>
    <h2 class="text-center"><strong>How to begin</strong></h2>
    <div style="width:70%; margin-left:15%">

        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Plan your curriculum
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body  text-center">
                    <img src="Image/Joina1.jpg" alt="" class=" " >
                        <p>You start with your passion and knowledge. Then choose a promising topic with the help of our
                            Marketplace Insights tool.<br>
                            The way that you teach — what you bring to it — is up to you.
                        </p>
                        <h4>How we help you</h4>
                        <p>We offer plenty of resources on how to create your first course. And, our instructor
                            dashboard and curriculum pages help keep you organized.</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Record your video
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body text-center">
                        <img src="Image/Joina2.jpg" alt="">
                        <p>Use basic tools like a smartphone or a DSLR camera. Add a good microphone and you’re ready to
                            start. <br>

                            If you don’t like being on camera, just capture your screen. Either way, we recommend two
                            hours or more of video for a paid course.</p>
                        <h4>How we help you</h4>
                        <p>Our support team is available to help you throughout the process and provide feedback on test
                            videos.</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Launch your course
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body text-center">
                        <img src="Image/Joina3.jpg" alt="">
                        <p>Gather your first ratings and reviews by promoting your course through social media and your
                            professional networks.<br>

                            Your course will be discoverable in our marketplace where you earn revenue from each paid
                            enrollment.
                        </p>
                        <h4>How we help you</h4>
                        <p>Our custom coupon tool lets you offer enrollment incentives.Team member help to clarify your
                            mistakes.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div style="width:70%; margin-left:15% " class=" d-flex ">
        <div class="m-5 text-center">
            <img src="Image/Joinb1.jpg" alt="" >
            <h3><strong>You won't have to do it alone</strong></h3>
            <p>Our <strong>Instructor Support Team</strong> is here to answer your questions and review your test video,while our <strong>Teaching Center</strong> gives you plenty of resources to help you through the process. Plus get the support of experienced instructor in our <strong>online comunity.</strong></p>
        </div>
    </div>

    <div style="width:70%; margin:0 auto; " class=" d-flex ">
        <div class="text-center"style="margin:0 auto; " >
            
            <h3><strong>Become an instructor today</strong></h3>
            <p>Join one of the world largest online learing marketplaces.</p>
            <a class="btn btn-dark">Fill the form</a>
        </div>
    </div>
    <br><br><br>



    <div class="container">
        <UL class="nav col-md justify-content-center list-unstyled d-flex">
            <li class="ms-5"><a href="ContactUs.php" class="text-muted text-decoration-none">Contact Us</a></li>
            <li class="ms-5"><a href="TermsAndConditions.php" class="text-muted text-decoration-none">Terms &
                    Condition</a></li>
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
                <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-instagram"></i></a></li>
                <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-twitter"></i></a></li>
                <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-linkedin"></i></a></li>
            </ul>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>

</body>

</html>