<?php
ob_start();
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["first_name"])){
    $first_name = filter_var($_POST["first_name"],FILTER_SANITIZE_STRING);
    $last_name = filter_var($_POST["last_name"],FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"],FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST["password"],FILTER_SANITIZE_EMAIL);
    $_SESSION["first_name"] = $first_name;
    $_SESSION["last_name"] = $last_name;
    $_SESSION["email"] = $email;
    $_SESSION["password"] = $password;

    $image = $_FILES["person_img"]["name"];
    $size = $_FILES["person_img"]["size"];
    $tmp_name = $_FILES["person_img"]["tmp_name"];
    $type = $_FILES["person_img"]["type"];

    $extention_allowed = array("png","jpg","jpeg");


    @$extention= strtolower(end(explode(".",$image)));
    
    if(in_array($extention,$extention_allowed)){
        $avatar = rand(0,1000000) . "_" . $image ;
        $destination = "img/" . $avatar ;
        $_SESSION['destination'] = $destination;
        move_uploaded_file($tmp_name,$destination);
    }else{
        echo "<div class=\"container pr-0 pl-0\"><div class=\"alert alert-danger\" role=\"alert\">
                Sorry Extention Not Allowed , You Might Upload Profile Picture
                </div></div>";
    } 
        header("Location:profile.php");

}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
    <div class="row mt-5">
    <form form method="POST" action="index.php" enctype="multipart/form-data">
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationDefault01">First name</label>
      <input type="text" class="form-control" id="validationDefault01" name="first_name" required>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationDefault02">Last name</label>
      <input type="text" class="form-control" id="validationDefault02" name="last_name" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationDefault03">Email</label>
      <input type="email" class="form-control" id="validationDefault03" name="email" required>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationDefault03">Password</label>
      <input type="password" class="form-control" id="validationDefault03" name="password" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationDefault04">Profile Picture</label>
      <input type="file"  id="validationDefault03" name="person_img" required>
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
      <label class="form-check-label" for="invalidCheck2">
        Agree to terms and conditions
      </label>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Submit form</button>
</form>
    </div>
    </div>





    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
</body>
</html>

<?php 

ob_end_flush();