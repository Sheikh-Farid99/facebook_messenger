<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Registation</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/registation.css">
	</head>
	<body>

		<div class="row justify-content-center">
		   <div class="col-lg-4 col-lg-4">
		      <div class="box">
				<header class="card-header py-4">
					<a href="login.php" class="float-right btn btn-primary mt-1 mr-4">Log in</a>
					<h2 class="card-title text-white ml-4">Sign up</h2>
				</header>
					<div class="reg">
						<form>
							
							<div class="form-group" required>
								<label for="uname">User Name</label>
								<input type="text" class="form-control" placeholder="username" name="uname" id="uname">
							</div>
							
							<div class="form-group" required>
								<label for="email">Email address</label>
								<input type="email" class="form-control" placeholder="email" name="email" id="email">
							</div>
							<div class="form-group" required>
								<label for="pass">Create password</label>
								<input class="form-control" type="password" name="pass" id="pass" placeholder="password">
							</div>
							<div class="form-group" required>
								<lable class="checkbox-inline"><input type="checkbox"> I accept the <a href="#">Terms of Use</a> &amp; <a href="">Privacy Policy</a></lable>
							</div>
							<div class="form-group">
								<button onclick="registation()" type="button" name="login" class="btn btn-primary btn-block"> Register  </button>
							</div>
							<div class="alert alert-danger p-0 text-center" style="display:none" id="alert-msg">
								<h4>farid</h4>
							</div>
					   </form>
					<div class="pt-3 card-body text-center">Already have an account? <a href="login.php">Log In</a></div>
				</div>
				</div>
			</div>
		</div>
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		
		<script type="text/javascript">
	         function registation(){
				var name = $("#uname").val();
				var email = $("#email").val();
				var password = $("#pass").val();
				$.ajax({
					url: "include/reg_data.php",
					type : "POST",
					data :{uname:name,uemail:email, upass:password},
					success : function(result){
						if(result=='success'){
							window.location = 'login.php'
						}
						else{
							jQuery('#alert-msg').show();
							$("#alert-msg").html(result);
						}
					}
				});
			}
	</script>
	</body>
</html>