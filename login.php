<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home Page</title>
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="font/css/all.min.css">
</head>
<body>
    
    <div class="row justify-content-center">
    	<div class="min p-0" id="col">
    		<div class="login p-3">
   		       	<div class="profile pb-2">
   		       		<div class="img">
   		       			<img src="img/user.png" alt="">
   		       		</div>
   		       	</div>
    		    <div class="form-group">
    		    	<label for="email">Email</label>
    		    	<input type="email" name="email" placeholder="email" class="form-control" id="email" required>
    		    </div>
    		    <div class="form-group">
    		    	<label for="pass">Password</label>
    		    	<input type="password" name="pass" placeholder="password" class="form-control" id="pass" required>
    		    </div>
    		    <div class="small text-center">Forgot Password? <a href="include/forget_password.php">Click Here</a></div><br>
    		    <div class="form-group">
    		    	<button class="btn btn-primary btn-block" type="button" name="login" id="btn">Login</button>
    		    </div>
    		    <div id="msg" style="display:none;" class="alert alert-danger text-center p-1"></div>
    		    <div class="text-center small" style="color:#444;">Don't have an account?  <a href="registation.php">Create one</a></div>
    		</div>
    	</div>
    </div>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function(){
			$("#btn").on("click",function(e){
				var email = $("#email").val();
				var password = $("#pass").val();
				$.ajax({
					url: "include/login_data.php",
					type : "POST",
					data :{uemail:email, upass:password},
					success : function(result){
						if(result=='success'){
							window.location = 'index.php'
						}
						else{
							jQuery('#msg').show();
							$("#msg").html(result);
						}
					}
				});
			});
		});
	</script>
</body>
</html>