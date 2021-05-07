<?php
session_start();
include 'config.php';
$id=$_SESSION['id'];
$date= date('Y-m-d');
$start=date("Y-m-d G:i:s",strtotime($date));
$end =date("Y-m-d G:i:s",strtotime($date.' +1day'));
$currentcalories=mysqli_query($con,"SELECT SUM(calories) FROM test1 WHERE userid='$id' and ctime >='$start' AND ctime< '$end' ");
$calarr=mysqli_fetch_assoc($currentcalories);
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
          <div class="jumbotron text-right" style="min-height: 50vh;background:url('https://cdn.hipwallpaper.com/i/31/14/OXcgSH.jpg') center / cover no-repeat;background-attachment:fixed;">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-7">
                    <h2>Calories To Burn Today!</h2>
                    <p class="lead">Here are some activities to burn calories</p><br>
                    <h1 class="display-1" style="color:#000; "><strong><?php echo $calarr['SUM(calories)']; ?></strong></h1> <small>Kcal</small>
                    <p class="lead">
                        <br>
                      <a class="btn btn-danger btn-lg" href="#upload" role="button">Start Activities!</a>
                    </p>
                  </div>
                </div>
            </div>
            
    </div>
    <div class="jumbotron text-center" style="height: auto;background-attachment:fixed;background: #fff;">
                    <h1 class="display-4">Calories Earned!</h1><br><br><br> 
                    <table class="table table-borderless">
                        <?php
                        $calories=mysqli_query($con,"select * from test1 where userid='$id'");                        
                        if ($calories->num_rows > 0) {
                            echo "<thead><tr><th scope='col'>Time</th><th scope='col'>Food Item</th><th scope='col'>Quantity</th><th scope='col'>Calories</th><th scope='col'> </th></tr></thead><tbody>";
                          while($row = mysqli_fetch_assoc($calories)) {
                            echo "<tr><td>".$row["ctime"]."</td><td>".$row["foodname"]."</td><td>".$row["quantity"]."</td><td>".$row["calories"]."</td><td><a href='edit.php'><i style='color:green' class='fa fa-edit'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='delete.php'><i style='color:red' class='fa fa-trash'></i></a>&nbsp;&nbsp;&nbsp;</td></tr>";
                          }
                        ?>
                          
                        <?php
                                }
                                echo "</tbody></table>";

                        ?>
                
    </div>
    <footer id="footerpad" style="background:#fff;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-8 mx-auto" style="background:#fff;">
                    <p class="copyright text-muted text-center">© SeTra 2021 | Developed with&nbsp;<i style="color:#70E000;" class="fa fa-heart"></i> by Trideep Barik and Suryansu Dash</p>
                </div>
            </div>
        </div>
    </footer>

        


<!-- -----------------------All The Individual Sections Goes Here----------------------- -->
<!-- -----------------------All the JS Links Goes Here----------------------- -->

<script src="./assets/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

<!-- -----------------------All The JS Links Goes Here----------------------- -->

</body>
</html>