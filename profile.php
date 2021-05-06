<?php
    session_start();
    if(isset($_POST["submit"])){
        $target_dir = "./uploads/";
        $target_file = $target_dir . $_SESSION['id'].".jpg";
        //echo $target_file;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
        }   
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        $uploadOk = 0;
        }
        if ($uploadOk == 0) {
        } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $link = "http://127.0.0.1:5000/predict?imgname=".$_SESSION['id'].".jpg";
            $data = file_get_contents($link);
            $response_data = json_decode($data);
            $user_data = $response_data->food_name;
        } 
        else {
            echo "Sorry, there was an error uploading your file.";
        }
        }

    }
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>


    <div class="header">
        <nav style="background:rgba(255,255,255,0.5)" class="navbar sticky-top navbar-light" >
            <a class="navbar-brand" href="#">SeTra - Your Self Trainer</a>
            <ul class="nav justify-content-end">
                <li class="nav-item">
                  <a class="nav-link active" href="#"> <?php echo $_SESSION['name'];?></a>
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

    <div class="upload" id="upload">
    <div class="jumbotron text-center" style="height: auto;background-attachment:fixed;background: #fff;">
                    <h1 class="display-4">Count Your Calories!</h1><br>
                    <p style="font-size:1.6em;" class="lead"> <strong><span style="color:rgb(219, 150, 0)">Snap&nbsp; <i class="fa fa-camera"></i></span> &nbsp;. &nbsp; <span style="color:rgb(255, 102, 0)">Upload &nbsp;<i class="fa fa-upload"></i></span> &nbsp;.&nbsp; <span style="color:rgb(165, 0, 0)">Burn&nbsp; <i class="fa fa-fire"></i></span>&nbsp;.</strong></p>
                    <?php
                        if(isset($_POST["caloriesubmit"])){
                            date_default_timezone_set("Asia/Kolkata");
                            $userid = $_SESSION['id'];
                            $foodname = $_POST['foodname'];
                            $quantity = $_POST['qty'];
                            $calories=256;
                            include 'config.php';
                            mysqli_query($con,"insert into test1(userid,foodname,quantity,calories) values('$userid','$foodname','$quantity','$calories')");
                            echo "<br><br><p class='lead'><h1><strong>".$foodname."</strong> of quantity <strong>".$quantity."</strong> is of <strong style='color:red;'>".$calories."</strong> calories</h1></p>";
                            echo "<br><small>Data Saved in your History!</small>";
                        }
                        
                    ?> 
    </div>
        <div class="jumbotron text-center" style="height: auto;background: url(https://wallpapercave.com/wp/wp3469887.jpg) center / cover no-repeat;background-attachment:fixed;">
                    
                    <?php
                        if(isset($user_data)){
                            
                    ?>
                                
                        <form action="" method="POST">
                            <center>
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="<?php echo $target_file;?>" alt="<?php echo $target_file;?>">
                                <div class="card-body">
                                    <p class="card-text">
                                        <h5>Detected Food Items :</h5>
                                    <?php
                                            foreach ($user_data as $food) {
                                    ?>
                                    <label for="foodname"><i class="fa fa-cutlery"></i> &nbsp;(If wrong, change it)</label>

                                    <select class="custom-select mr-sm-2" name="foodname" required>

                                        <option value="<?php echo $food; ?>" selected="selected">Detected : <?php echo $food; ?> </option>
                                        <option value="Cheesecake">Cheesecake</option>
                                        <option value="Chicken Curry">Chicken Curry</option>
                                        <option value="Donuts">Donuts</option>
                                        <option value="French Fries">French Fries</option>
                                        <option value="Fried Rice">Fried Rice</option>
                                        <option value="Grilled Cheese Sandwich">Grilled Cheese Sandwich</option>
                                        <option value="Icecream">Icecream</option>
                                        <option value="Omelette">Omelette</option>
                                        <option value="Pizza">Pizza</option>
                                        <option value="Samosa">Samosa</option>

                                    </select> <br>

                                    <div class="form-group">
                                        <label for="qty"> Food Quantity </label>
                                        <input type="number" name="qty" class="form-control" placeholder="Enter Quantity" required>
                                    </div>
                                    <?php

                                            }
                                    ?>
                                    </p>
                                </div>
                            </div><br><br>
                            <p>
                                    <input class="btn btn-success btn-lg" type="submit" value="Calculate Calories" name="caloriesubmit"> &nbsp;
                                    <a class="btn btn-warning btn-lg" href="profile.php" name="anothersubmit">Upload New</a>
                            </p>
                            </center>

                        </form>

                    <?php
                    }
                    ?>
                    <?php
                        if(!isset($user_data)){       
                    ?>
                    <p style="font-size:0.8em;">
                        <h3>Instructions :- </h3><br>  
                        <ul style="list-style-type:none;">
                            <li >Lorem ipsum dolor eius labore inventore non aut veritatis hic adipisci nulla </li>
                            <li >Lorem ipsum dolor eius labore inventore non aut veritatis hic adipisci nulla non aut veritatis hic adipisci nulla </li>
                            <li >Lorem ipsum dolor eius labore in veritatis hic adipisci nulla </li>
                            <li >Lorem ipsum dolor eius labore inventore non aut veritatis hic adipisci nulla </li>
                            <li >Lorem ipsum dolor eius labore inventore non aut veritatis hiculla </li>
                        </ul>
                    </p>
                    <br><br>
                    <p class="lead">
                            <form action="" method="post" enctype="multipart/form-data">
                                <dl>
                                <input type="file" name="fileToUpload" id="fileToUpload" required>
                                </dl>
                                <p>
                                    <input class="btn btn-success btn-lg" type="submit" value="Upload Image" name="submit">
                                </p>
                            </form>
                        
                    </p>

                    <?php
                    }
                    ?>
                  </div>
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



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
</body>
</html>