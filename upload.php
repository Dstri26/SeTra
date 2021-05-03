<?php
$target_dir = "./uploads/";
$target_file = $target_dir . "example.jpg";
echo $target_file;
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
if (file_exists($target_file)) {
  $uploadOk = 0;
}
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  $uploadOk = 0;
}
if ($uploadOk == 0) {
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $link = "apilink?imgname=example.jpg";
    $data = file_get_contents($link);
    $response_data = json_decode($data);
    $user_data = $response_data->author;
    print_r($user_data);
    header("Location: profile.php?food=$user_data");
  } 
  else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>