                <?php
                include 'dbconnect.php';
                $result = mysqli_query($conn,"SELECT * FROM courses");
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
      overflow: auto;
      overflow-x: scroll;
      white-space: nowrap;
    }

    .cbw {
      width: 300px;
      display: inline-block;
    }
  </style>
  <title>Learnfinity</title>
</head>

<body>
  <div class="cbo">
                

                <?php
                
                if (mysqli_num_rows($result) > 0) {
                ?>

                <?php
                $i=0;
                while($row = mysqli_fetch_array($result)) {
                ?>
                   <?php 
                        if($row["Course_C"]=='Defence'){
                        ?>
                  
                  <div class="cbw text-wrap m-2 p-1" >
                  <img src="Course_Image/<?php echo $row["Course_pic"]; ?>" alt="" style="width:100%">
                  <h4><?php echo $row["Course_Name"]; ?></h4>
                  <p><?php echo $row["Course_Description"]; ?></p>
                  <a href="<?php echo $row["Course_Link"]; ?>" class="btn btn-dark">Explore and buy</a>
                  </div>
                  <?php
                        }
                    $i++;
                    }
                ?>
                <?php
                }
                else{
                    echo "No result found";
                }
               ?>


  </div>
</body>

</html>