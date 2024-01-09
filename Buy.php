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

if (isset($_POST['add_to_cart'])) {

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $student_ID = $EId;
    $product_quantity = 1;

    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' and student_id='$EId'");

    if (mysqli_num_rows($select_cart) > 0) {
        echo "Item Already Added To Cart";
    } else {
        $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity,student_id) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity','$student_ID')");
        echo "Course added to cart succesfully";
    }

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
        href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;900&family=Libre+Baskerville&family=Poppins:wght@200;500&display=swap"
        rel="stylesheet">
    <style>
        .cbo {
            min-width: 300px;
            overflow: auto;
            overflow-x: scroll;
            white-space: nowrap;
        }

        .cbw {
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
            font-family: 'Playfair Display', serif;
        }
    </style>
    <title>Learnfinity</title>
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
                        <a class="nav-link " href="#Categories" role="button">
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
                <a class="navbar-brand">Welcome,
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


    <div style="width:90%; margin: 0 auto; margin-top:5%;">
        <?php
        include_once 'dbconnect.php';
        $result = mysqli_query($conn, "SELECT * FROM courses");
        ?>

        <table class="table table-info table-striped table-hover">

            <tr>
                <th>Course Pic</th>
                <th>Course ID</th>
                <th>Course Name</th>

                <th>MRP</th>
                <th>Offer Price</th>
                <th></th>
            </tr>
            <?php
            if (mysqli_num_rows($result) > 0) {
                ?>

                <?php
                $i = 0;
                while ($row = mysqli_fetch_array($result)) {
                    ?>

                    <tr>
                        <td><img src="Course_Image/<?php echo $row["Course_pic"]; ?>" alt=""
                                style="width:150px; border-radius:20px;">

                        </td>
                        <td>
                            <?php echo $row["Course_ID"]; ?>
                        </td>
                        <td>
                            <?php echo $row["Course_Name"]; ?>
                        </td>


                        <td>
                            <?php echo $row["Course_MRP"]; ?>
                        </td>
                        <td>
                            <?php echo $row["Course_OP"]; ?>
                        </td>

                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="product_name" value="<?php echo $row['Course_Name']; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $row['Course_OP']; ?>">
                                <input type="hidden" name="product_image" value="<?php echo $row['Course_pic']; ?>">
                                <input type="submit" class="btn btn-primary btn-sm rounded-pill" value="Add to cart"
                                    name="add_to_cart">
                            </form>
                        </td>

                    </tr>
                    <?php

                    $i++;
                }
                ?>

                <?php
            } else {
                echo "No result found";
            }
            ?>

        </table>
    </div>

    <br><br><br>

    <div class="container">
        <UL class="nav col-md justify-content-center list-unstyled d-flex">
            <li class="ms-5"><a href="ContactUs.php" class="text-muted text-decoration-none">Contact Us</a></li>
            <li class="ms-5"><a href="AboutUs.php" class="text-muted text-decoration-none">About Us</a></li>
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