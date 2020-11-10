<?php
	
	session_start();
	include("connection.php");
	
	if(!isset($_SESSION['email'])){
	   header("location:../login.php");
    }
	else{
		
		$email = $_SESSION['email'];
		
		$select_user = "select * from test where email='$email'";
		$quary_user = mysqli_query($con,$select_user);
		$get_data_user = mysqli_fetch_array($quary_user);
		
		$name = $get_data_user['username'];
		$pic = $get_data_user['pic'];
		$get_story = $get_data_user['story'];
		$act_status = $get_data_user['active'];
		$id = $get_data_user['idnt_id'];
		
		echo "<div class='header'style=''>
				<div class='name-pic d-flex'>
					<i id='back' onclick='about()' class='fa fa-arrow-left p-2 text-primary' style='font-size:21px; cursor: pointer;'></i>
					<h5 class='ml-2 mb-0 pt-1'>Switch Account</h5>
				</div>
			</div>
			<div class='main-section' style='overflow-y:unset; height:510px;'>
				<div class='p-4'>
					<div class='d-flex'>
						<div class='icon' style='width:40px;height:40px;overflow:hidden; border-radius:50%;'>
							<img src='img/$pic' style='width:100%;height:100%;object-fit:cover'>
						</div>
						<div class='pl-3'>
							<h5 class='m-0'>$name</h5>
							<span style='font-size:12px;padding-top:-3px;'>Signed in</span>
						</div>
					</div>
					<br>
					<h5 data-target='#add_account' data-toggle='modal'>Add account</h5>
					<div class='modal' id='add_account'>
						<div class='modal-dialog' style='max-width:360px;margin-top:140px'>
							  <div class='modal-content'>
								<div class='modal-header' style='display:initial;border:none'>
									<h5>Add an account to this device</h5>
									<span style='line-height:0 !important; font-size:14px;'>You'll be able to switch between accounts to see your new message</span>
								</div>
								<div class='modal-body'>
									<input class='form-control mb-1' type='email' name='email' placeholder='Email' id='log_email' style='border:none;border-bottom: 1px solid #1d3bd9;border-radius:none !important;'>
									<input class='form-control mt-1' type='pass' name='pass' placeholder='Password' id='log_pass' style='border:none;border-bottom: 1px solid #1d3bd9;border-radius:none !important;'>
									<div class='d-flex py-3'>
										<input type='checkbox'>
										<span style='line-height:1.2 !important; font-size:14px; padding-left:20px;'>require a password to sign into this account from this device</span>
									</div>
									<span class='text-primary'>Forget Password</span>
								</div>
								<div class='modal-footer'style='border:none;'>
									<button class='close text-primary' data-dismiss='modal' style='font-size:15px;'>CANCLE</button>
									<button onclick='add_account($id)' class='btn text-primary' type='button'>ADD</button>
								</div>
							</div>
						</div>
				   </div>
				</div>
			</div>
			<div class='footer'style=''>
				<div class='p-3'>
					<a href='registation.php'><button class='btn btn-primary btn-block'>CREATE NEW ACCOUNT</button></a>
				</div>
			</div>
			";

		
	}
?>