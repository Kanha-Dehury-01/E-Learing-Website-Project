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

if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE name = '$remove_id'");
    header('location:Cart.php');
}
;

if (isset($_GET['delete_all'])) {
    mysqli_query($conn, "DELETE FROM `cart`");
    header('location:Cart.php');
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




    <div style="width:70%; margin: 0 auto; margin-top:5%;">
        <table class="table table-primary table-striped table-hover">

            <thead>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Action</th>
            </thead>


            <?php

            $select_cart = mysqli_query($conn, "SELECT * FROM `cart` where student_id='$EId'");
            $grand_total = 0;
            $sub_total = 0;
            if (mysqli_num_rows($select_cart) > 0) {
                while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                    ?>



                    <tbody>
                        <tr>
                            <td><img src="Course_Image/<?php echo $fetch_cart['image']; ?>" style="width:150px" alt=""></td>
                            <td>
                                <?php echo $fetch_cart['name']; ?>
                            </td>
                            <td>₹
                                <?php echo number_format($fetch_cart['price']); ?>/-
                            </td>
                            <td>
                                <?php echo $fetch_cart['quantity']; ?>
                            </td>
                            <td>₹
                                <?php echo $sub_total = $fetch_cart['price'] * $fetch_cart['quantity']; ?>/-
                            </td>
                            <td><a href="Cart.php?remove=<?php echo $fetch_cart['name']; ?>"
                                    onclick="return confirm('remove item from cart?')" class="delete-btn"> <i
                                        class="fas fa-trash"></i></a></td>
                        </tr>

                        <?php
                        $grand_total += $sub_total;
                }
                ;
            }
            ;
            ?>
                <tr class="table-bottom" style="font-size:1.3rem;">
                    <td></td>
                    <td colspan="3"><strong>Total</strong></td>
                    <td>
                        <strong>₹
                            <?php echo $grand_total; ?>/-
                        </strong>
                    </td>
                    <td><a href="Cart.php?delete_all" onclick="return confirm('Are you sure you want to delete all?');"
                            class=" btn btn-dark btn-sm rounded-pill delete-btn">DELETE ALL</a></td>
                </tr>

            </tbody>

        </table>
    </div>


    <div class="btn-primary text-center " style="margin-bottom:10%; margin-top:5%;">
        <a href="Buy.php" class="btn btn-primary me-5" style="margin-top: 0;">Add More Courses</a>
        <a href="Checkout.php" class="btn <?= ($grand_total > 1) ? 'btn-primary' : 'btn-dark disabled'; ?>">Procced To Checkout</a>
    </div>

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
                <li class="ms-5"><a href="AdminLogin.php" class="text-muted text-decoration-none">Admin
                        Login</a></li>
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