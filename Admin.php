<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['valid_admin'] != true) {
    header('Location: index.php');
    die();
}

include 'dbconnect.php';


$result1 = mysqli_query($conn, "SELECT * FROM register");
$result2 = mysqli_query($conn, "SELECT * FROM courses");
$result3 = mysqli_query($conn, "SELECT * FROM orders");
$result4 = mysqli_query($conn, "SELECT * FROM teacher");


$rowcount1 = mysqli_num_rows($result1);
$rowcount2 = mysqli_num_rows($result2);
$rowcount3 = mysqli_num_rows($result3);
$rowcount4 = mysqli_num_rows($result4);



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

    <title>Learnfinity</title>
    <style>
        .sidebar {
            margin: 0;
            padding: 0;
            width: 200px;
            background-color: #f1f1f1;
            position: fixed;
            height: 100%;
            overflow: auto;
        }

        div.content {
            margin-left: 200px;
            padding: 1px 16px;
            height: 1000px;
        }

        .sidebar a {
            display: block;
        }
    </style>
</head>

<body>



    <nav class="navbar navbar-expand bg-danger-subtle sticky-top">
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



                </ul>
            </div>
        </div>
    </nav>




    <div class=" sidebar border border-2 rounded">
        <a class="tablinks btn btn-primary  " style="margin-bottom:100px" data-bs-toggle="tab"
            onclick="openCity(event, 'Home')" id="defaultOpen">HOME</a>
        <a class="tablinks btn btn-outline-danger m-2" data-bs-toggle="tab"
            onclick="openCity(event, 'Student')">Student</a>
        <a class="tablinks btn btn-outline-danger m-2" data-bs-toggle="tab"
            onclick="openCity(event, 'Teacher')">Teacher</a>
        <a class="tablinks btn btn-outline-danger m-2" data-bs-toggle="tab"
            onclick="openCity(event, 'Courses')">Courses</a>
        <a class="tablinks btn btn-outline-danger m-2" data-bs-toggle="tab" onclick="openCity(event, 'Admin')">Admin</a>
    </div>

    <div class="content">

        <div id="Home" class="tabcontent">
            <h3>Home</h3>

                        <div class="rounded-3"
                            style="background-color:#E74646;  height:300px; width:300px;  margin:0 auto; margin-top:5%;">
                            <h3 class="text-center p-3">No. of Students</h3>
                            <div class="rounded-3"
                                style="background-color:yellow; height:40%; width:70%; margin: 20% auto;">
                                <p class="text-center" style="font-size:5rem;"> <strong>
                                        <?php echo $rowcount1 ?>
                                    </strong></p>
                            </div>
                        </div>
                    
                        <div class="rounded-3"
                            style="background-color:#E74646; height:300px; width:300px;  margin:0 auto; margin-top:5%;">
                            <h3 class="text-center p-3">No. of Courses</h3>
                            <div class="rounded-3"
                                style="background-color:yellow; height:40%; width:70%; margin: 20% auto;">
                                <p class="text-center" style="font-size:5rem;"> <strong>
                                        <?php echo $rowcount2 ?>
                                    </strong></p>
                            </div>
                        </div>
                    
                        <div class="rounded-3"
                            style="background-color:#E74646; height:300px; width:300px;  margin:0 auto; margin-top:5%; ">
                            <h3 class="text-center p-3">No. of Orders</h3>
                            <div class="rounded-3"
                                style="background-color:yellow; height:40%; width:70%; margin: 20% auto;">
                                <p class="text-center" style="font-size:5rem;"> <strong>
                                        <?php echo $rowcount3 ?>
                                    </strong></p>
                            </div>
                        </div>
                   
                        <div class="rounded-3"
                            style="background-color:#E74646; height:300px; width:300px;  margin:0 auto; margin-top:5%; ">
                            <h3 class="text-center p-3">No. of Teacher</h3>
                            <div class="rounded-3"
                                style="background-color:yellow; height:40%; width:70%; margin: 20% auto;">
                                <p class="text-center" style="font-size:5rem;"> <strong>
                                        <?php echo $rowcount4 ?>
                                    </strong></p>
                            </div>
                        </div>
                    


            </div>

        <div id="Student" class="tabcontent tab-content tab-pane">
            <h3>Student</h3>
            <?php
            include_once 'dbconnect.php';
            $result = mysqli_query($conn, "SELECT * FROM register");
            ?>
            <table class="table table-info table-striped table-hover">

                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email id</th>
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
                            <td>
                                <?php echo $row["ID"]; ?>
                            </td>
                            <td>
                                <?php echo $row["First_Name"]; ?>
                            </td>
                            <td>
                                <?php echo $row["Last_Name"]; ?>
                            </td>
                            <td>
                                <?php echo $row["Email"]; ?>
                            </td>
                            <td><a href="delete-process-student.php?ID=<?php echo $row["ID"]; ?>"><i
                                        class="fa-solid fa-trash"></i></a></td>
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

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><a href="add_student.php"><i class="fa-solid fa-plus"></i></a></td>
                </tr>
            </table>


        </div>

        <div id="Teacher" class="tabcontent">
            <h3>Teacher</h3>
            <?php
            include_once 'dbconnect.php';
            $result = mysqli_query($conn, "SELECT * FROM teacher");
            ?>

            <table class="table table-info table-striped">

                <tr>
                    <td>Teacher_ID</td>
                    <td>Teacher_Name</td>
                    <td>Teacher_email</td>
                    <td>Teacher_quali</td>
                    <td></td>
                </tr>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    ?>

                    <?php
                    $i = 0;
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $row["Teacher_ID"]; ?>
                            </td>
                            <td>
                                <?php echo $row["Teacher_Name"]; ?>
                            </td>
                            <td>
                                <?php echo $row["Teacher_email"]; ?>
                            </td>
                            <td>
                                <?php echo $row["Teacher_quali"]; ?>
                            </td>
                            <td></td>
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

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><a href="add_teacher.php"><i class="fa-solid fa-plus"></i></a></td>
                </tr>

            </table>
        </div>

        <div id="Courses" class="tabcontent">
            <h3>Courses</h3>
            <?php
            include_once 'dbconnect.php';
            $result = mysqli_query($conn, "SELECT * FROM courses");
            ?>

            <table class="table table-info table-striped table-hover">

                <tr>
                    <th>Course ID</th>
                    <th>Course Name</th>
                    <th>Course Link</th>
                    <th>Course Pic</th>
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
                            <td>
                                <?php echo $row["Course_ID"]; ?>
                            </td>
                            <td>
                                <?php echo $row["Course_Name"]; ?>
                            </td>
                            <td>
                                <?php echo $row["Course_Link"]; ?>
                            </td>
                            <td>
                                <?php echo $row["Course_pic"]; ?>
                            </td>
                            <td>
                                <?php echo $row["Course_MRP"]; ?>
                            </td>
                            <td>
                                <?php echo $row["Course_OP"]; ?>
                            </td>
                            <td><a href="delete-process-course.php?Course_ID=<?php echo $row["Course_ID"]; ?>"><i
                                        class="fa-solid fa-trash"></i></a></td>

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
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>

                    <td><a href="add_courses.php"><i class="fa-solid fa-plus"></i></a></td>
                </tr>
            </table>
        </div>

        <div id="Admin" class="tabcontent">
            <h3>Admin</h3>
            <?php
            include_once 'dbconnect.php';
            $result = mysqli_query($conn, "SELECT * FROM admin");
            ?>
            <?php
            if (mysqli_num_rows($result) > 0) {
                ?>
                <table class="table table-info table-striped table-hover">

                    <tr>
                        <td>Admin ID</td>
                        <td>Admin Name</td>
                        <td>Admin Mail</td>


                    </tr>
                    <?php
                    $i = 0;
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $row["Admin_ID"]; ?>
                            </td>
                            <td>
                                <?php echo $row["Admin_Name"]; ?>
                            </td>
                            <td>
                                <?php echo $row["Admin_email"]; ?>
                            </td>

                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
                </table>
                <?php
            } else {
                echo "No result found";
            }
            ?>
        </div>

    </div>
    </div>


    <script>
        function openCity(evt, cityName) {
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

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>

</body>

</html>