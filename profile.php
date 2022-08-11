<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <strong> Your Name is : 
<?php 
session_start();
if(!empty($_SESSION['first_name'])){
    
echo $_SESSION['first_name'] . " ";
echo $_SESSION['last_name'] . "<br>";
}else{
    header("Location:index.php");
}
?>
Your Email : 
<?php 
if(!empty($_SESSION['email'])){
echo $_SESSION['email'] . "<br>";
}else{
    header("Location:index.php");
}
?>
</strong>

<strong>Your Profile Picture :
    <?php 
if(!empty($_SESSION['destination'])){
echo "<img src=" . $_SESSION['destination'].">";
}else{
    header("Location:index.php");
}
?>
</strong>
</body>
</html>