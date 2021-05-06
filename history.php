<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="./assets/img/logo.png">

<title>Calories History</title>

<!-- -----------------------All The CSS Links Goes Here----------------------- -->

<link rel="stylesheet" href="./assets/css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<!-- -----------------------All The CSS Links Goes Here----------------------- -->
<!-- -----------------------All other External Links Goes Here----------------------- -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<!-- -----------------------All other External Links Goes Here----------------------- -->
</head>
<body>
<!-- -----------------------All the Individual Sections Goes Here----------------------- -->
<div class="header">
        <nav style="background:rgba(255,255,255,0.5)" class="navbar sticky-top navbar-light" >
            <a class="navbar-brand" href="#">SeTra - Your Self Trainer</a>
            <ul class="nav justify-content-end">
                <li class="nav-item">
                  <a class="nav-link active" href="./profile.php"> <?php echo $_SESSION['name'];?></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./history.php">Calories History</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./logout.php">Logout</a>
                </li>
              </ul>
          </nav>
          <div class="jumbotron" style="min-height: 80vh;background:url('./assets/img/bg.jpg') center / cover no-repeat;background-attachment:fixed;">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="display-2">Welcome Buddy!</h1>
                    <p class="lead">Let's start together the journey into a healthier future</p><br>
                    <hr class="my-4"><br>
                    <p style="width: 50vw;font-size:0.8em;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    <p class="lead">
                        <br>
                      <a class="btn btn-success btn-lg" href="#upload" role="button">Get Started!</a>
                    </p>
                  </div>
                </div>
            </div>
            
    </div>
    <div class="jumbotron text-center" style="height: auto;background-attachment:fixed;background: #fff;">
                    <h1 class="display-4">Calories Earned!</h1><br><br><br> 
                    <table class="table table-borderless">
                        <?php
                        include 'config.php';
                        $id=$_SESSION['id'];
                        $calories=mysqli_query($con,"select * from test1 where userid='$id'");                        
                        if ($calories->num_rows > 0) {
                            echo "<thead><tr><th scope='col'>Time</th><th scope='col'>Food Item</th><th scope='col'>Quantity</th><th scope='col'>Calories</th><th scope='col'> </th></tr></thead><tbody>";
                          while($row = mysqli_fetch_assoc($calories)) {
                            echo "<tr><td>".$row["time"]."</td><td>".$row["foodname"]."</td><td>".$row["quantity"]."</td><td>".$row["calories"]."</td><td><a href='edit.php'><i style='color:green' class='fa fa-edit'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='delete.php'><i style='color:red' class='fa fa-trash'></i></a>&nbsp;&nbsp;&nbsp;</td></tr>";
                          }
                        ?>
                          
                        <?php
                                }
                                echo "</tbody></table>";

                        ?>
                
    </div>

        


<!-- -----------------------All The Individual Sections Goes Here----------------------- -->
<!-- -----------------------All the JS Links Goes Here----------------------- -->

<script src="./assets/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

<!-- -----------------------All The JS Links Goes Here----------------------- -->

</body>
</html>