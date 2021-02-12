<?php include '../includes/header.php';
if(!$_SESSION['email']){
    echo("<div>Sorry You Are Not Logged IN</div>");
    return;
}else{
 ?>
 <style>
     .boxes{
        border-radius:20px;;height:200px;width:200px;background:linear-gradient(#e66465, #9198e5);
        flex:1;
        margin:20px;
        padding:10%;
     }
     </style>
     <h2>Hi ! <?php echo($_SESSION['firstName']) ?></h2>
<div class="container" style="text-align:center;display:flex;">
    
        <div class=" boxes" >
        <a href="./notification.php">
        <h4>Notification</h4></a>
        </div>
        <div class=" boxes">
        <a href="./chat.php"><h4>Chat</h4></a>
        </div>
        <div class=" boxes">
        <a href="./userprofile.php"><h4>Profile</h4></a>
        </div>
</div>
<?php 
}
include '../includes/footer.php' ?>


