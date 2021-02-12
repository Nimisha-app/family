<?php include './includes/header.php';
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $cpassword=md5($_POST['confirm_password']);
    
    if($password!==$cpassword){
        echo("<div style='text-align:center;color:#fff;backgroud:red;'>Sorry Password Does'nt Match. </div>");
    }else{
        $checkquery="SELECT * FROM users where `email`='$email'";
        $checkfoundornot=mysqli_num_rows(mysqli_query($db,$checkquery));
        if($checkfoundornot!==0){
            echo("ALREADY REGISTERED");
            echo("<div style='text-align:center;color:#fff;backgroud:red;'>Sorry Already Registered. </div>");

        }else{
        
        $query="INSERT INTO users (`firstName`,`email`,`password`,`lastName`,`partnerName`,`phoneNo`,`address`,`bday`,`aniversary`) VALUES ('$username','$email','$password','','','','','','')";

        $result=mysqli_query($db,$query);
        if($result!=1){
            echo("FAILURE");
        echo("<div style='text-align:center;color:#fff;backgroud:red;'>There is Some Problem ! </div>");
        }else{
            echo("SUCESS");
        echo("<div style='text-align:center;color:#fff;backgroud:green;'>Registered Successfully. </div>");
        }
        }
        
    }
}
?>
<div class="signup-form">
    <form action="/examples/actions/confirmation.php" method="post" class="form-horizontal">
		<div class="col-xs-8 col-xs-offset-4">
			<h2>Sign Up</h2>
		</div>		
        <div class="form-group">
			<label class="control-label col-xs-4">Username</label>
			<div class="col-xs-8">
                <input type="text" class="form-control" name="username" required="required">
            </div>        	
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
			<label class="control-label col-xs-4">Confirm Password</label>
			<div class="col-xs-8">
                <input type="password" class="form-control" name="confirm_password" required="required">
            </div>        	
        </div>
		<div class="form-group">
			<div class="col-xs-8 col-xs-offset-4">
				<p><label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a>.</label></p>
				<button type="submit" class="btn btn-primary btn-lg">Sign Up</button>
			</div>  
		</div>		      
    </form>
	<div class="text-center">Already have an account? <a href="#">Login here</a></div>
</div>
<?php include 'includes/footer.php' ?>