<?php 
include 'includes/header.php';


if(isset($_POST['signin'])){
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    // $query="INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `phoneNo`, `address`, `partnerName`, `date`) VALUES (NULL, 'prabhat', 'sharma', 'prabhat@gmail.com', '9999999999', 'e7', 'xyz', current_timestamp()); "
    $query="SELECT * FROM `users` WHERE email='$email' and password='$password'";
    $result=mysqli_query($db,$query);
    if(mysqli_num_rows($result)==1){
        $_SESSION['email']=$email;
        $result=mysqli_fetch_assoc($result);
        $_SESSION['id']=$result['id'];
        $_SESSION['firstName']=$result['firstName'];
        header('Location:./user/manual.php');
    }else{
        echo('<div style="text-align:center;background:red;margin-top:100px">Sorry ! wrong Password</div>');
    }

}

?>



<div class="signup-form">
    <form action="./signin.php" method="post" class="form-horizontal">
		<div class="col-xs-8 col-xs-offset-4">
			<h2>Sign In</h2>
		</div>		
        
		<div class="form-group">
			<label class="control-label col-xs-4">Email Address</label>
			<div class="col-xs-8">
                <input type="email" class="form-control" name="email" required="required">
            </div>        	
        </div>
		<div class="form-group">
			<label class="control-label col-xs-4">Password</label>
			<div class="col-xs-8">
                <input type="password" class="form-control" name="password" required="required">
            </div>        	
        </div>
	
		<div class="form-group">
			<div class="col-xs-8 col-xs-offset-4">
				<p><label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a>.</label></p>
				<button type="submit" name="signin" class="btn btn-primary btn-lg">Sign In</button>
			</div>  
		</div>		      
    </form>
	<div class="text-center">Not Having  an account? <a href="./signup.php">Sign Up here</a></div>
</div>


<?php include 'includes/footer.php' ?>