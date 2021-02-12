<style>
    .noti{
        text-align:center;background:#ff4d4d;padding:10px;margin:10px;border-radius:10px;color:#fff;
    }
    </style>
<?php include '../includes/header.php';
$my_id=$_SESSION['id'];

// $query="SELECT * from notifications Where notiTo=$my_id";
$query="SELECT * FROM `notifications`INNER JOIN users ON notifications.notiFrom=users.id WHERE notiTo=$my_id";
$notifications=mysqli_query($db,$query);
foreach($notifications as $notification){
    echo("<div class='noti'>".$notification['notiText']." <strong style='color:#000'> FROM- ".$notification['firstName']."</strong>  </div>");
}
//bday notification to users
$mydate=date("Y-m-d");
$month=date("m", strtotime($mydate));
$day=date('d',strtotime($mydate));
$bdayquery="SELECT * FROM `users` WHERE month(date)='$month' and day(date)='$day'";
$bdayresult=mysqli_query($db,$bdayquery);
foreach($bdayresult as $user){
    $to=$user['id'];
    $from=$_SESSION['id'];
    $notiText="Wish You a very Happy Bday";
    $notiresult=mysqli_query($db,"INSERT INTO `notifications`( `notiTo`,  `notiFrom`, `notiText`) VALUES ('$to','$from','$notiText')");
    if(!$notiresult){
        echo("<div>Oops Somethign Wrong !");
    }
}

?>

<div></div>

<?php include '../includes/footer.php';
