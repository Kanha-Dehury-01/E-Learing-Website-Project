<?php
session_start();
$_SESSION['valid_admin'] = false; 
if(isset($_POST['save']))
{
    extract($_POST);
    include 'dbconnect.php';
    $sql=mysqli_query($conn,"SELECT * FROM admin where Admin_email='$Admin_email' and Admin_pass ='$Admin_pass'");
    $row  = mysqli_fetch_array($sql);
    if(is_array($row))
    {
       $_SESSION['valid_admin'] = true; 
        $_SESSION["Admin_ID"] = $row['Admin_ID'];
        $_SESSION["Admin_email"]=$row['Admin_email'];
        $_SESSION["Password"]=$row['Password'];
        
        header("Location: Admin.php"); 
    }
    else
    {
        echo "Invalid Email ID/Password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/index.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    
    <script src="https://kit.fontawesome.com/3a9eef0171.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;900&family=Libre+Baskerville&family=Poppins:wght@200;500&display=swap" rel="stylesheet">
    
    <title>Learnfinity</title>
</head>
<body>

    <nav class="navbar navbar-expand bg-danger-subtle sticky-top"  >
        <div class="container-fluid">
          
        <img src="Image/icon.png" alt="" style="width:1.5rem;">
          <a class="navbar-brand" href="index.php">Learnfinity</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                
            </ul>
          </div>
        </div>
    </nav>

    <section class="w-100 p-4 d-flex justify-content-center pb-4">
        <div style="width: 26rem;">
          <!-- Pills navs -->
          <ul class="nav justify-content-center">
            <li class="nav-item">
              <button class="tablinks shadow-sm btn btn-outline-danger rounded-4 pill btn-sm m-2 border-2" ><strong>Admin Login</strong></button>
            </li>
          </ul>
          <!-- Pills navs -->

          <!-- Pills content -->
          <div class="tab-content">
            <div class="tab-pane  tabcontent show active" id="pills-login" >
              <form action="" method="post" enctype="multipart/form-data">
                

                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="email" id="loginName" name="Admin_email" class="form-control">
                  <label class="form-label" for="loginName" style="margin-left: 0px;">Email or username</label>
                <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 114.4px;"></div><div class="form-notch-trailing"></div></div></div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" id="loginPassword" name="Admin_pass" class="form-control">
                  <label class="form-label" for="loginPassword" style="margin-left: 0px;">Password</label>
                <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 64.8px;"></div><div class="form-notch-trailing"></div></div></div>


                <!-- Submit button -->
                <button type="submit" name="save" class="btn btn-danger btn-block mb-4">Admin Sign in</button>

                <!-- Register buttons -->
                <div class="text-center">
                  <p>Not an admin ? <a class="tablinks" href="https://wa.me/919668505568?text=Hello%2C%20Mention%20your%20working%20ID%20and%20token%20number%20to%20register%20yourself%20as%20Admin">Contact Senior Admin</a></p>
                </div>
              </form>
            </div>
            
          </div>
          <!-- Pills content -->
        </div>
      </section>

</body>
</html>