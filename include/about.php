<?php
	session_start();
	include("connection.php");
	if(!isset($_SESSION['email'])){
	   header("location:../login.php");
    }
	else{

	$user_email = $_SESSION['email'];

	$select_user = "select * from test where email='$user_email'";
	$quary_user = mysqli_query($con,$select_user);
	$get_data_user = mysqli_fetch_array($quary_user);
	
	$name = $get_data_user['username'];
	$pic = $get_data_user['pic'];

     $output = "
		<nav class='navbar'>
			 <i id='back' onclick='farid()' class='fa fa-arrow-left' style='font-size:20px; cursor: pointer;'></i>
			 <h4>Me</h4>
		</nav>
   		<div class='about'>
   			<div class='pic' style='cursor:pointer;'>
				<label for='file' style='display: initial;'>
   				<div  class='img'>
   					<img  src='img/{$pic}'>
   				</div>
				</label>
   				<h3 class='text-center pt-2'>{$name}</h3>
   			</div>
			<div class='row m-0 upload-pic' style='display:none;'>
				<div class='col-md-6'>
					<input style='' class='p-1 pic-upload' type='file' name='file' placeholder='select pic' id='file'>
				</div>
			</div>
   			<div class='div1 p-2 px-3 mt-2'>
   				<div class='div2 d-flex p-1 my-2'style=''>
   					<div class='icon text-center bg-dark'>
   						 <i id='back' class='fa fa-moon text-white  pt-2' style='font-size:16px;'></i>
   					</div>
					<h5 class='pl-4'>Dark Mode</h5>
   				</div>
				
   				<div class='div2 d-flex p-1 my-2'>
   					<div class='icon text-center bg-primary'>
   						 <i id='back' class='fas fa-comment mt-1 text-white' style='font-size:18px;'></i>
   					</div>
					<h5 class='pl-4'>Message Request</h5>
   				</div>
				
				<div class='div2 d-flex p-1 my-2'>
   					
					<span class=''>pages</span>
   				</div>
				
				<div class='div2 d-flex p-1 my-2'>
   					<div class='icon text-center'>
   						 <img src='img/pubg.jpg' style='width:100%;height:100%; object-fit:cover;'>
   					</div>
					<h5 class='pl-4'>Pust Gaming</h5>
   				</div>
				
				<div class='div2 d-flex p-1 my-2'>
   					<div class='icon text-center'>
   						 <img src='img/jon.jpg' style='width:100%;height:100%; object-fit:cover;'>
   					</div>
					<h5 class='pl-4'>Jon</h5>
   				</div>
   				
				<div class='div2 d-flex p-1 my-2'>
   					
					<span class=''>Profile</span>
   				</div>
				
				<div class='div2 d-flex p-1 my-2'>
   					<div class='icon text-center' style='background:green;'>
   						 <i id='back' class='fas fa-comment' style='font-size:16px;color:#fff;padding-top: 7px;'></i>
   					</div>
					<div>
					<h5 class='pl-4 mb-0'>Active Status</h5>
					<span class='pl-4' style='font-size:12px;'>On</span>
					</div>
   				</div>
				
				<div class='div2 d-flex p-1 my-2'>
   					<div class='icon text-center' style='background:red;'>
   						 <i id='back' class='fas fa-at' style='font-size:16px;color:#fff;padding-top: 7px;'></i>
   					</div>
					<div>
					<h5 class='pl-4 mb-0'>Username</h5>
					<span class='pl-4' style='font-size:10px;'>$name</span>
					</div>
   				</div>
				
				<div class='div2 d-flex p-1 my-2'>
   					
					<span class=''>Preferences</span>
   				</div>
				
				<div class='div2 d-flex p-1 my-2'>
   					<div class='icon text-center' style='background:#4e24e3;'>
   						 <i id='back' class='fas fa-bell' style='font-size:16px;color:#fff;padding-top: 7px;'></i>
   					</div>
					<h5 class='pl-4'>Notifications & Sounds</h5>
   				</div>
				
				<div class='div2 d-flex p-1 my-2'>
   					<div class='icon text-center' style='background:#3b2f64;'>
   						 <i id='back' class='fab fa-centercode' style='font-size:16px;color:#fff;padding-top: 7px;'></i>
   					</div>
					<h5 class='pl-4'>Data Server</h5>
   				</div>
				
				<div class='div2 d-flex p-1 my-2'>
   					<div class='icon text-center' style='background:#a62a98;'>
   						 <i id='back' class='fab fa-creative-commons-share' style='font-size:16px;color:#fff;padding-top: 7px;'></i>
   					</div>
					<h5 class='pl-4'>Story</h5>
   				</div>
				
				<div class='div2 d-flex p-1 my-2'>
   					<div class='icon text-center' style='background:#0a529f;'>
   						 <i id='back' class='fas fa-comment' style='font-size:16px;color:#fff;padding-top: 7px;'></i>
   					</div>
					<h5 class='pl-4'>SMS</h5>
   				</div>
				
				<div class='div2 d-flex p-1 my-2'>
   					<div class='icon text-center' style='background:#40b99c;'>
   						 <i id='back' class='fas fa-user-friends' style='font-size:16px;color:#fff;padding-top: 7px;'></i>
   					</div>
					<h5 class='pl-4'>People</h5>
   				</div>
				
				<div class='div2 d-flex p-1 my-2'>
   					<div class='icon text-center' style='background:#57e324;'>
   						 <i id='back' class='fas fa-image' style='font-size:16px;color:#fff;padding-top: 7px;'></i>
   					</div>
					<h5 class='pl-4'>Photo</h5>
   				</div>
				
				<div class='div2 d-flex p-1 my-2'>
   					<div class='icon text-center' style='background:#231d37;'>
   						 <i id='back' class='fas fa-lock' style='font-size:16px;color:#fff;padding-top: 7px;'></i>
   					</div>
					<h5 class='pl-4'>Secret Conversations</h5>
   				</div>
				
				<div class='div2 d-flex p-1 my-2'>
   					<div class='icon text-center' style='background:#24e339;'>
   						 <i id='back' class='fas fa-circle' style='font-size:16px;color:#fff;padding-top: 7px;'></i>
   					</div>
					<h5 class='pl-4'>Chat Heads</h5>
   				</div>
				
				<div class='div2 d-flex p-1 my-2'>
   					
					<span class=''>Account</span>
   				</div>
				
				<div class='div2 d-flex p-1 my-2' onclick = 'switch_account()'>
   					<div class='icon text-center' style='background:#4e24e3;'>
   						 <i id='back' class='fas fa-user-friends' style='font-size:16px;color:#fff;padding-top: 7px;'></i>
   					</div>
					<h5 class='pl-4'>Switch Account</h5>
   				</div>
				
				<div class='div2 d-flex p-1 my-2' data-target='#pass_change' data-toggle='modal'>
   					<div class='icon text-center' style='background:#1f39c4;'>
   						 <i id='back' class='fas fa-cog ' style='font-size:16px;color:#fff;padding-top: 7px;'></i>
   					</div>
					<h5 class='pl-4'>Account Seatting</h5>
   				</div>
				<div class='div2 d-flex p-1 my-2'>
   					<div class='icon text-center' style='background:red;'>
   						 <i id='back' class='fas fa-exclamation-triangle ' style='font-size:16px;color:#fff;padding-top: 5px;'></i>
   					</div>
					<h5 class='pl-4'>Report Technical Problem Seatting</h5>
   				</div>
				<div class='div2 d-flex p-1 my-2'>
   					<div class='icon text-center' style='background:#5068e6;'>
   						 <i id='back' class='fas fa-question-circle ' style='font-size:16px;color:#fff;padding-top: 7px;'></i>
   					</div>
					<h5 class='pl-4'>Help</h5>
   				</div>
				<div class='div2 d-flex p-1 my-2'>
   					<div class='icon text-center' style='background:#41434f;'>
   						 <i id='back' class='fas fa-file-contract ' style='font-size:16px;color:#fff;padding-top: 7px;'></i>
   					</div>
					<h5 class='pl-4'>Legal & Policies</h5>
   				</div>
				
   				<div onclick = 'logout()' class='div2 d-flex p-2 my-2'style='justify-content:space-between;'>
					<h5 class=''>Logout</h5>
   					<div class='icon text-center' style='background:red;'>
   						 <i id='back' class='fas fa-sign-out-alt' style='font-size:16px;color:#fff;padding-top: 7px;'></i>
   					</div>
   				</div>
   			</div>
   		</div>
		<div class='modal' id='pass_change'>
		<div class='modal-dialog' style='max-width:360px;margin-top:140px'>
			  <div class='modal-content'>
				<div class='modal-header' style='display:initial;border:none'>
					<h5>Change Password</h5>
					
				</div>
				<div class='modal-body'>
					<input class='form-control mb-1' type='email' name='old_pass' placeholder='Email' id='old_email' style='border:none;border-bottom: 1px solid #1d3bd9;border-radius:none !important;'>
					<input class='form-control mb-1' type='Password' name='old_pass' placeholder='Old Password' id='old_pass' style='border:none;border-bottom: 1px solid #1d3bd9;border-radius:none !important;'>
					<input class='form-control mt-2' type='password' name='new_pass' placeholder='New Password' id='new_pass' style='border:none;border-bottom: 1px solid #1d3bd9;border-radius:none !important;'>
					<input class='form-control mt-2' type='password' name='con_pass' placeholder='Confirm Password' id='con_pass' style='border:none;border-bottom: 1px solid #1d3bd9;border-radius:none !important;'>
					
					<div class='d-flex py-3'>
						<input type='checkbox'>
						<span style='line-height:1.2 !important; font-size:14px; padding-left:20px;'>Are you sure change your password</span>
					</div>
				</div>
				<div class='modal-footer'style='border:none;'>
					<button class='close text-primary' data-dismiss='modal' style='font-size:15px;'>CANCLE</button>
					<button onclick='change_pass()' class='btn text-primary' type='button'>Submit</button>
				</div>
			</div>
		</div>
   </div>
				   
			";

	echo $output;
	}
?>