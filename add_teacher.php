

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
          <a class="navbar-brand" href="Admin.php">Learnfinity</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Categories
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                
                <li>
                    <form class="d-flex align-middle" role="search">
                        <input class="form-control ms-5 me-2 " type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </li>
            </ul>
          </div>
        </div>
    </nav>

    <section class="w-100 p-4 d-flex justify-content-center pb-4">
        <div style="width: 26rem;">
          <!-- Pills navs -->
          <ul class="nav justify-content-center">
            <li class="nav-item">
              <button class="tablinks shadow-sm btn bg-danger text-white rounded-4 pill btn-lg m-2 border-2" ><strong>Add Teacher</strong></button>
            </li>
          </ul>
          <!-- Pills navs -->

          <!-- Pills content -->
          <div class="tab-content">
          <div class="tab-pane active tabcontent show" id="pills-register">
              <form action="teacher_admin_res.php" method="post" enctype="multipart/form-data">

                <!-- Name input -->
                <div class="form-outline mb-4">
                  <input type="text" id="registerName" name="first_name" class="form-control">
                  <label class="form-label" for="registerName" style="margin-left: 0px;">Teacher Name</label>
                <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 42.4px;"></div><div class="form-notch-trailing"></div></div></div>

                <!-- Username input -->
                <div class="form-outline mb-4">
                  <input type="text" name="last_name" id="registerUsername" class="form-control">
                  <label class="form-label" for="registerUsername" style="margin-left: 0px;">Qualification</label>
                <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 66.4px;"></div><div class="form-notch-trailing"></div></div></div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="email" id="registerEmail" name="email" class="form-control">
                  <label class="form-label" for="registerEmail" style="margin-left: 0px;">Teacher Email</label>
                <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 40px;"></div><div class="form-notch-trailing"></div></div></div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" id="registerPassword" name="pass" class="form-control">
                  <label class="form-label" for="registerPassword" style="margin-left: 0px;">Password</label>
                <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 64.8px;"></div><div class="form-notch-trailing"></div></div></div>

                <!-- Repeat Password input -->
                <div class="form-outline mb-4">
                  <input type="password" id="registerRepeatPassword" name="cpass" class="form-control">
                  <label class="form-label" for="registerRepeatPassword" style="margin-left: 0px;">Repeat password</label>
                <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 106.4px;"></div><div class="form-notch-trailing"></div></div></div>
                
                    <div class="form-group">
                        <input type="file" name="file" required>
                        <!-- <input type="submit" name="upload" value="Upload" class="btn"> -->
                    </div>

                

                <!-- Submit button -->
                <button type="submit" name="saves" class="btn btn-danger btn-block mt-5">Add Teacher</button>
              </form>
            </div>
            
          </div>
          <!-- Pills content -->
        </div>
      </section>

      <div class="container">
        <UL class="nav col-md justify-content-center list-unstyled d-flex">
          <li class="ms-5"><a href="#" class="text-muted text-decoration-none">Contact Us</a></li>
          <li class="ms-5"><a href="#" class="text-muted text-decoration-none">About Us</a></li>
          <li class="ms-5"><a href="#" class="text-muted text-decoration-none">Terms & Condition</a></li>
        </UL>

        
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
          <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
              <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
            </a>
            <span class="text-muted">© Learnfinity 2023 Company, Inc</span>
          </div>

          <ul class="nav col-md justify-content-center list-unstyled d-flex">
          <li class="ms-5"><a href="logout.php" class="text-muted text-decoration-none">Admin Logout</a></li>
          </ul>
      
          <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-instagram"></i></a></li>
            <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-twitter"></i></a></li>
            <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-linkedin"></i></a></li>
          </ul>
        </footer>
      </div>

</body>
</html>