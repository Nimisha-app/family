<?php 
include($_SERVER['DOCUMENT_ROOT'].'/nimisha/config/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="   css/header.css">
    <link rel="stylesheet" href="css/singup.css">
    <link rel="stylesheet" href="css/chat.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
<!-- Sticky header -->
<header>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#">OUR FAMILY</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
     
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        <li><a href="./manual.php"><span class="glyphicon glyphicon-info-sign"></span> Manual</a></li>
        <?php 
        
            echo("<li><a href='./signin.php'><span class='glyphicon glyphicon-folder-open'></span> Sign In</a></li>");
            echo("<li><a href='./signup.php'><span class='glyphicon glyphicon-phone-alt'></span> Sign Up</a></li>");

        
        
        ?>
				
      </ul>
    </div>
  </div>
</nav>

</header>
<div class="content" style="margin-top:60px;text-align:center;">
