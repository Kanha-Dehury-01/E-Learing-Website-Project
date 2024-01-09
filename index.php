<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="CSS/index.css">
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

<body style="">

  <nav class="navbar navbar-expand  sticky-top" style="background-color:#A66CFF">
    <div class="container-fluid">
      <img src="Image/icon.png" alt="" style="width:1.5rem;">
      <a class="navbar-brand" href="home.php">Learnfinity</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        </ul>

      </div>
    </div>
  </nav>

  <div id="carouselExampleAutoplaying" class="carousel slide " data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="2000">
        <img src="Image/6.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="Image/1.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="Image/5.png" class="d-block w-100" alt="...">
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





  <section class="w-100 p-4 d-flex justify-content-center pb-4">
    <div style="width: 26rem;">
      <!-- Pills navs -->
      <ul class="nav justify-content-center">
        <li class="nav-item">
          <button class="tablinks shadow-sm btn btn-outline-primary rounded-4 pill btn-sm m-2 border-2"
            onclick="openCourse(event, 'pills-login')"><strong>Login</strong></button>
        </li>
        <li class="nav-item">
          <button class="tablinks shadow-sm btn btn-outline-primary rounded-4 btn-sm m-2 border-2"
            onclick="openCourse(event, 'pills-register')" id="defaultOpen"><strong>Sign Up</strong></button>
        </li>
      </ul>
      <!-- Pills navs -->

      <!-- Pills content -->
      <div class="tab-content">
        <div class="tab-pane  tabcontent " id="pills-login">
          <form action="loginProcess.php" method="post" enctype="multipart/form-data">


            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" id="loginName" name="email" class="form-control">
              <label class="form-label" for="loginName" style="margin-left: 0px;">Email or username</label>
              <div class="form-notch">
                <div class="form-notch-leading" style="width: 9px;"></div>
                <div class="form-notch-middle" style="width: 114.4px;"></div>
                <div class="form-notch-trailing"></div>
              </div>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" id="loginPassword" name="pass" class="form-control">
              <label class="form-label" for="loginPassword" style="margin-left: 0px;">Password</label>
              <div class="form-notch">
                <div class="form-notch-leading" style="width: 9px;"></div>
                <div class="form-notch-middle" style="width: 64.8px;"></div>
                <div class="form-notch-trailing"></div>
              </div>
            </div>

            <!-- 2 column grid layout -->
            <div class="text-center mb-4">Don't remember your password? <a href="register.php">Change it!</a></div>

            <!-- Submit button -->
            <button type="submit" name="save" class="btn btn-primary btn-block mb-4">Sign in</button>

            <!-- Register buttons -->
            <div class="text-center">
              <p>Not a member? <a class="tablinks" onclick="openCourse(event, 'pills-register')">Register</a></p>
            </div>
          </form>
        </div>
        <div class="tab-pane active tabcontent show" id="pills-register">
          <form action="register_a.php" method="post" enctype="multipart/form-data">

            <!-- Name input -->
            <div class="form-outline mb-4">
              <input type="text" id="registerName" name="first_name" class="form-control">
              <label class="form-label" for="registerName" style="margin-left: 0px;">First Name</label>
              <div class="form-notch">
                <div class="form-notch-leading" style="width: 9px;"></div>
                <div class="form-notch-middle" style="width: 42.4px;"></div>
                <div class="form-notch-trailing"></div>
              </div>
            </div>

            <!-- Username input -->
            <div class="form-outline mb-4">
              <input type="text" name="last_name" id="registerUsername" class="form-control">
              <label class="form-label" for="registerUsername" style="margin-left: 0px;">Last Name</label>
              <div class="form-notch">
                <div class="form-notch-leading" style="width: 9px;"></div>
                <div class="form-notch-middle" style="width: 66.4px;"></div>
                <div class="form-notch-trailing"></div>
              </div>
            </div>


            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" id="registerEmail" name="email" class="form-control">
              <label class="form-label" for="registerEmail" style="margin-left: 0px;">Email</label>
              <div class="form-notch">
                <div class="form-notch-leading" style="width: 9px;"></div>
                <div class="form-notch-middle" style="width: 40px;"></div>
                <div class="form-notch-trailing"></div>
              </div>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" id="registerPassword" name="pass" class="form-control">
              <label class="form-label" for="registerPassword" style="margin-left: 0px;">Password</label>
              <div class="form-notch">
                <div class="form-notch-leading" style="width: 9px;"></div>
                <div class="form-notch-middle" style="width: 64.8px;"></div>
                <div class="form-notch-trailing"></div>
              </div>
            </div>

            <!-- Repeat Password input -->
            <div class="form-outline mb-4">
              <input type="password" id="registerRepeatPassword" name="cpass" class="form-control">
              <label class="form-label" for="registerRepeatPassword" style="margin-left: 0px;">Repeat password</label>
              <div class="form-notch">
                <div class="form-notch-leading" style="width: 9px;"></div>
                <div class="form-notch-middle" style="width: 106.4px;"></div>
                <div class="form-notch-trailing"></div>
              </div>
            </div>

            <!-- Address -->
            <div class="form-outline mb-4">
              <input type="text" id="registerAddress" name="add" class="form-control">
              <label class="form-label" for="registerAddress" style="margin-left: 0px;">Permanent Address</label>
              <div class="form-notch">
                <div class="form-notch-leading" style="width: 9px;"></div>
                <div class="form-notch-middle" style="width: 42.4px;"></div>
                <div class="form-notch-trailing"></div>
              </div>
            </div><!-- District -->
            <div class="form-outline mb-4">
              <input type="text" id="registerDistrict" name="dis" class="form-control">
              <label class="form-label" for="registerDistrict" style="margin-left: 0px;">District</label>
              <div class="form-notch">
                <div class="form-notch-leading" style="width: 9px;"></div>
                <div class="form-notch-middle" style="width: 42.4px;"></div>
                <div class="form-notch-trailing"></div>
              </div>
            </div><!-- State -->
            <div class="form-outline mb-4">
              <input type="text" id="registerState" name="state" class="form-control">
              <label class="form-label" for="registerState" style="margin-left: 0px;">State</label>
              <div class="form-notch">
                <div class="form-notch-leading" style="width: 9px;"></div>
                <div class="form-notch-middle" style="width: 42.4px;"></div>
                <div class="form-notch-trailing"></div>
              </div>
            </div>
            <!-- Country -->
            <div class="form-outline mb-4">
              <input type="text" id="registerCountry" name="country" class="form-control">
              <label class="form-label" for="registerCountry" style="margin-left: 0px;">Country</label>
              <div class="form-notch">
                <div class="form-notch-leading" style="width: 9px;"></div>
                <div class="form-notch-middle" style="width: 42.4px;"></div>
                <div class="form-notch-trailing"></div>
              </div>
            </div>

            <!--Pin -->
            <div class="form-outline mb-4">
              <input type="text" id="registerPin" name="pin" class="form-control">
              <label class="form-label" for="registerPin" style="margin-left: 0px;">PIN</label>
              <div class="form-notch">
                <div class="form-notch-leading" style="width: 9px;"></div>
                <div class="form-notch-middle" style="width: 42.4px;"></div>
                <div class="form-notch-trailing"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="file" name="file" required>
              <p>Please provide square photo</p>
              <!-- <input type="submit" name="upload" value="Upload" class="btn"> -->
            </div>

            <!-- Checkbox -->
            <div class="form-check d-flex justify-content-center mb-4">
              <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked=""
                aria-describedby="registerCheckHelpText">
              <label class="form-check-label" for="registerCheck">
                I have read and agree to the terms
              </label>
            </div>

            <!-- Submit button -->
            <button type="submit" name="save" class="btn btn-primary btn-block mb-3">Sign Up</button>
          </form>
        </div>
      </div>
      <!-- Pills content -->
    </div>
  </section>




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

  <div class="container footer mt-5">



    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
      <div class="col-md-4 d-flex align-items-center">
        <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
          <svg class="bi" width="30" height="24">
            <use xlink:href="#bootstrap"></use>
          </svg>
        </a>
        <span class="text-muted">© Learnfinity 2023 Company, Inc</span>
      </div>



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

</body>

</html>