<?php include '../includes/header.php';

$users=mysqli_query($db,"SELECT * FROM users where 1");



if(isset($_POST['messageSent'])){
    $from=$_SESSION['id'];
    $to=$_POST['to'];
    $message=$_POST['message'];
    $arr=['dirty','looks','home'];
    foreach($arr as $keyword){
        if(strpos($message, $keyword) !== false){
            $query="INSERT INTO notifications ( `notiTo`,  `notiFrom`) VALUES ('$to','$from')";
            $notificationSent=mysqli_query($db,$query);
            if(!$notificationSent){
                echo("<div style='text-align:center;background:red;color:#fff'>Oops !  There is some problem.</div>");
            }
  
        }
    }
    $query="INSERT INTO `messages`(`srcFrom`, `destTo`,  `message`) VALUES ('$from','$to','$message')";
    $result=mysqli_query($db,$query);
    if(!$result){
        echo("error");
        echo('<div style="text-align:center;color:#fff;background:red"> There is some Problem</div>');
        
    }else{
      echo("success");
        echo('<div style="text-align:center;color:#fff;background:green">Sent Successfully!</div>');

    }
    
}
 ?>
<style>
    .main {
	background: #E5DDD5 url("https://www.toptal.com/designers/subtlepatterns/patterns/sports.png") fixed;
}


.page-header {
	background: #006A4E;
	margin: 0;
  padding: 20px 0 10px;
	color: #FFFFFF;
	position: fixed;
	width: 100%;
  z-index: 1
}
.main {
	height: 100vh;
	padding-top: 70px;
}

.chat-log {
	padding: 40px 0 114px;
	height: auto;
	overflow: auto;
}
.chat-log__item {
	background: #fafafa;
	padding: 10px;
	margin: 0 auto 20px;
	max-width: 80%;
	float: left;
	border-radius: 4px;
	box-shadow: 0 1px 2px rgba(0,0,0,.1);
	clear: both;
}

.chat-log__item.chat-log__item--own {
	float: right;
	background: #DCF8C6;
	text-align: right;
}

.chat-form {
	background: #DDDDDD;
	padding: 40px 0;
	position: fixed;
	bottom: 0;
	width: 100%;
}

.chat-log__author {
	margin: 0 auto .5em;
	font-size: 14px;
	font-weight: bold;
}

</style>
<div class="main">
  <div class="container ">
    <div class="chat-log">
        <?php 
        if(isset($_GET['userId'])){
            $userid=$_GET['userId'];
            $myid=$_SESSION['id'];
            // $query="SELECT * FROM `messages` WHERE (srcFrom='$myid' and destTo='$userid') or (srcFrom='$userid' and destTo='$myid' )
            // ORDER BY time ASC";
            $query="SELECT * FROM `messages` INNER JOIN users ON (messages.srcFrom=users.id) WHERE  (srcFrom='$myid' and destTo='$userid') or (srcFrom='$userid' and destTo='$myid' ) ORDER BY time ASC";
            $result=mysqli_query($db,$query);       
        if($result){
        foreach($result as $message){
            if($message['destTo']==$_SESSION['id']){
                echo('<div class="chat-log__item"><h3 class="chat-log__author">'.$message['firstName'].' <small>'.$message['time'].'</small></h3><div class="chat-log__message">'.$message['message'].'</div></div>');
            }else{
                echo('<div class="chat-log__item chat-log__item--own"><h3 class="chat-log__author">'.$_SESSION['firstName'].' <small>'.$message['time'].'</small></h3><div class="chat-log__message">'.$message['message'].'</div></div>');
            }
        }
    }
   }   ?>

      
    </div>
  </div>
  <div class="chat-form">
    <div class="container ">
      <form method="post" action="" class="form-horizontal">
        <div class="row">
        <div class="col-sm-2 col-xs-2">
            <label>To : </label>
            <select id="to" name="to">
            <?php            
            foreach($users as $row){
                echo("<option value=".$row['id']." >".$row['firstName']."</option>");
            }                    
            ?>
            </select>

          </div>
          <div class="col-sm-8 col-xs-2">
            <input type="text" class="form-control" name="message" id="" placeholder="Message" />
          </div>
          <div class="col-sm-2 col-xs-4">
            <button type="submit" name="messageSent" class="btn btn-success btn-block">Send</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>



