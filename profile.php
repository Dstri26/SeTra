<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthify</title>
    <link rel="stylesheet" href="../static/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.1.0/cropper.min.css" integrity="sha512-vmXqikRa5kmI3gOQygzml5nV+5NGxG8rt8KWHKj8JYYK12JUl2L8RBfWinFGTzvpwwsIRcINy9mhLyodnmzjig==" crossorigin="anonymous" />
</head>
<body>
    <section class="header">
        <div class="jumbotron">
            <h1 class="display-4">Healthify !</h1>
            <p class="lead">Welcomes you.</p> <br>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. <br> Lorem Ipsum has been the industry's standard dummy text ever <br> since the 1500s, when an unknown printer took a galley of type <br>and scrambled it to make a type specimen book. It has survived not only five centuries,<br> </p>
            <p class="lead">
              <a class="btn btn-primary btn-lg" href="#upload" role="button">Get Started</a>
            </p>
          </div>
    </section>

    <section id="upload" class="upload">
        <div class="content">
            <h3>Your Uploaded Image</h3>
            <hr>            
            <br><br>
            <form action="./upload.php" method="post" enctype="multipart/form-data">
                <h3>Upload Your Food Photo to check calorie</h3>
                <dl>
                <input type="file" name="fileToUpload" id="fileToUpload">
                </dl>
                <p>
                <input type="submit" value="Upload Image" name="submit">
                </p>
            </form>
        </div>
        
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.1.0/cropper.js" integrity="sha512-XL8wKq9jUbb9LMyrezd19IPRrf41omJUvZpqTXlpGXREAFbmoulbt3yBv+Lw+L007NL5tL0HRfnlXeKtvlvITg==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>
</html>