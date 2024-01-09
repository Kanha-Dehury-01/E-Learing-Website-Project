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
if (isset($_POST['order_btn'])) {

    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $method = $_POST['method'];
    $flat = $_POST['flat'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $pin_code = $_POST['pin_code'];


    $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
    $price_total = 0;
    if (mysqli_num_rows($cart_query) > 0) {
        while ($product_item = mysqli_fetch_assoc($cart_query)) {
            $product_name[] = $product_item['name'] ;
            $product_price = $product_item['price'] * $product_item['quantity'];
            $price_total += $product_price;
        }
        ;
    }
    ;
    $total_product = implode(', ', $product_name);
    $detail_query = mysqli_query($conn, "INSERT INTO `orders`(name, number, email, method, flat, street, city, state, country, pin_code, total_products, total_price,student_id) VALUES('$name','$number','$email','$method','$flat','$street','$city','$state','$country','$pin_code','$total_product','$price_total','$EId')") or die('query failed');
    $sql = mysqli_query($conn, "DELETE FROM `cart` where student_id = '$EId'");
    if ($cart_query && $detail_query && $sql) {
        $_SESSION['message'] = "
        <div style='width:70%; height:80%; margin:0 auto;'>
        
            <div style='padding:10px;'>
                <h1 class='text-center'><strong>Thank you for choosing us!</strong></h1>
                <br><br><br><br>
                <div class='text-center' style='font-size:1.3rem;'>
                    <span>" . $total_product . "</span><br>
                    <span class='total'> Total Price : $" . $price_total . "/- </span>
                </div>
                <div class='text-left' style='font-size:1.3rem;'>
                    <p> Name : <span>" . $name . "</span> </p>
                    <p> Number : <span>" . $number . "</span> </p>
                    <p> Email : <span>" . $email . "</span> </p>
                    <p> Address : <span>" . $flat . ", " . $street . ", " . $city . ", " . $state . ", " . $country
                            . " - " . $pin_code . "</span> </p>
                    <p> Your payment mode : <span>" . $method . "</span> </p>
                    
                </div>
                <br><br><br>
                <a href='Buy.php' class='btn  btn-primary rounded-pill'>Buy More</a>
            </div>
        

    </div>
        ";
         header("location: OrderConfirm.php");
       
    }

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
            </div>
        </div>
    </nav>

    <section class="w-100 p-4 d-flex justify-content-center pb-4">
        <div style="width: 26rem;">
            <!-- Pills navs -->
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <button
                        class="tablinks shadow-sm btn bg-danger text-white rounded-4 pill btn-lg m-2 border-2"><strong>Fill
                            The Form To Complete the Order</strong></button>
                </li>
            </ul>
            <!-- Pills navs -->

            <!-- Pills content -->
            <div class="tab-content">
                <div class="tab-pane active tabcontent show" id="pills-register">
                    <form action="" method="post" enctype="multipart/form-data">

                        <!-- Name input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="name" class="form-control">
                            <label class="form-label" style="margin-left: 0px;">Name</label>
                            <div class="form-notch">
                                <div class="form-notch-leading" style="width: 9px;"></div>
                                <div class="form-notch-middle" style="width: 42.4px;"></div>
                                <div class="form-notch-trailing"></div>
                            </div>
                        </div>

                        <!-- Username input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="number" class="form-control">
                            <label class="form-label" style="margin-left: 0px;">Mobile No</label>
                            <div class="form-notch">
                                <div class="form-notch-leading" style="width: 9px;"></div>
                                <div class="form-notch-middle" style="width: 66.4px;"></div>
                                <div class="form-notch-trailing"></div>
                            </div>
                        </div>

                        <div class="form-outline mb-4">
                            <input type="email" id="registerEmail" name="email" class="form-control">
                            <label class="form-label" for="registerEmail" style="margin-left: 0px;">Email</label>
                            <div class="form-notch">
                                <div class="form-notch-leading" style="width: 9px;"></div>
                                <div class="form-notch-middle" style="width: 40px;"></div>
                                <div class="form-notch-trailing"></div>
                            </div>
                        </div>
                        <!-- Username input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="flat" class="form-control">
                            <label class="form-label" style="margin-left: 0px;">Address Line 1</label>
                            <div class="form-notch">
                                <div class="form-notch-leading" style="width: 9px;"></div>
                                <div class="form-notch-middle" style="width: 66.4px;"></div>
                                <div class="form-notch-trailing"></div>
                            </div>
                        </div>

                        <!-- Username input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="street" class="form-control">
                            <label class="form-label" style="margin-left: 0px;">Address Line 2</label>
                            <div class="form-notch">
                                <div class="form-notch-leading" style="width: 9px;"></div>
                                <div class="form-notch-middle" style="width: 66.4px;"></div>
                                <div class="form-notch-trailing"></div>
                            </div>
                        </div>

                        <div class="form-outline mb-4">
                            <input type="text" name="city" class="form-control">
                            <label class="form-label" style="margin-left: 0px;">City</label>
                            <div class="form-notch">
                                <div class="form-notch-leading" style="width: 9px;"></div>
                                <div class="form-notch-middle" style="width: 66.4px;"></div>
                                <div class="form-notch-trailing"></div>
                            </div>
                        </div>

                        <div class="form-outline mb-4">
                            <input type="text" name="state" class="form-control">
                            <label class="form-label" style="margin-left: 0px;">State</label>
                            <div class="form-notch">
                                <div class="form-notch-leading" style="width: 9px;"></div>
                                <div class="form-notch-middle" style="width: 66.4px;"></div>
                                <div class="form-notch-trailing"></div>
                            </div>
                        </div>

                        <div class="form-outline mb-4">
                            <input type="text" name="country" class="form-control">
                            <label class="form-label" style="margin-left: 0px;">Country</label>
                            <div class="form-notch">
                                <div class="form-notch-leading" style="width: 9px;"></div>
                                <div class="form-notch-middle" style="width: 66.4px;"></div>
                                <div class="form-notch-trailing"></div>
                            </div>
                        </div>


                        <div class="form-outline mb-4">
                            <input type="text" name="pin_code" class="form-control">
                            <label class="form-label" style="margin-left: 0px;">Pin Code</label>
                            <div class="form-notch">
                                <div class="form-notch-leading" style="width: 9px;"></div>
                                <div class="form-notch-middle" style="width: 66.4px;"></div>
                                <div class="form-notch-trailing"></div>
                            </div>
                        </div>
                        <div class="form-outline mb-4">
                            <select class="form-select" name="method" aria-label="Default select example">
                                <option selected>Choose method of payment</option>
                                <option value="Card">Card</option>
                                <option value="Net Banking">Online Banking</option>
                                <option value="UPI">UPI</option>
                            </select>
                            <label class="form-label" style="margin-left: 0px;">Payment</label>
                            <div class="form-notch">
                                <div class="form-notch-leading" style="width: 9px;"></div>
                                <div class="form-notch-middle" style="width: 66.4px;"></div>
                                <div class="form-notch-trailing"></div>
                            </div>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" name="order_btn" class="btn btn-danger btn-block mt-5">Order Now</button>
                    </form>
                </div>

            </div>
            <!-- Pills content -->
        </div>

    </section>



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