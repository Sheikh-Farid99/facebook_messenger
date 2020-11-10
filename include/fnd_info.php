<?php
	session_start();
	include("connection.php");
	if(!isset($_SESSION['email'])){
	   header("location:../login.php");
    }
	else{

		$get_id = $_POST['id'];

		$select_user = "select * from test where idnt_id='$get_id'";
		$quary_user = mysqli_query($con,$select_user);
		$get_data_user = mysqli_fetch_array($quary_user);

		$name = $get_data_user['username'];
		$pic = $get_data_user['pic'];

		 $output = "
			<nav class='navbar'>
				 <i id='back' onclick='message($get_id);' class='fa fa-arrow-left text-primary' style='font-size:20px; cursor: pointer;'></i>
				 <h4>Me</h4>
			</nav>
			<div class='about'>
				<div class='pic'>
					<div class='img' style='width:100px;height:100px;'>
						<img src='img/{$pic}'>
					</div>
					<h4 class='text-center pt-2'>{$name}</h4>
					<h6 class='text-center'>Messenger</h6>
				</div>
				<div class='text-center' style='padding:15px 45px 0 45px;'>
					<div class='d-flex ' style='justify-content:space-around;'>
						<div>
							 <i class='fa fa-phone' style='font-size:16px; width:30px heidht:30px; border-radius: 50px; background:#bdb0b0;padding:6px;'></i>
							<h6 class='pt-1'>Audio</h6>
						</div>
						<div>
							 <i class='fa fa-video' style='font-size:16px; width:30px heidht:30px; border-radius: 50px; background:#bdb0b0;padding:6px;'></i>
							<h6 class='pt-1'>Video</h6>
						</div>
						<div>
							 <i class='fa fa-user' style='font-size:16px; width:30px heidht:30px; border-radius: 50px; background:#bdb0b0;padding:6px;'></i>
							<h6 class='pt-1'>Profile</h6>
						</div>
						<div>
							 <i class='fas fa-bell' style='font-size:16px; width:30px heidht:30px; border-radius: 50px; background:#bdb0b0;padding:6px;'></i>
							<h6 class='pt-1'>Mute</h6>
						</div>
					</div>
				</div>
				<div class='div1 p-2 px-4'>
					<div class='div2 d-flex px-2 my-2' style='justify-content:space-between;'>
					   <h6 class='pt-1'>Theme</h6>
						<div class='icon text-center'>
							 <i id='back' class='fa fa-arrow-left pt-1' style='font-size:20px;'></i>
						</div>
					</div>

					<div class='div2 d-flex px-2 my-2' style='justify-content:space-between;'>
					   <h6 class='pt-1'>Emoji</h6>
						<div class='text-center text-primary'>
							 <i id='back' class='fas fa-thumbs-up pt-2 pr-2' style='font-size:18px;'></i>
						</div>
					</div>

					<div class='div2 p-1 px-2 my-2'>
						<h6 class='m-0'>Nicknames</h6>
					</div>

					<div class='div2 p-1 px-2 my-2'>
					   <span style='font-size: 14px;' class='pt-1'>More Action</span>
					</div>

					<div class='div2 d-flex px-2 my-2' style='justify-content:space-between;'>
					   <h6 class='pt-1'>Search is Conversation</h6>
						<div class='icon text-center'>
							 <i id='back' class='fa fa-search pt-1 pr-2' style='font-size:15px;    margin: 3px 0px -1px 5px;'></i>
						</div>
					</div>

					<div class='div2 d-flex px-2 my-2' style='justify-content:space-between;'>
					   <h6 class='pt-1'>Go to Secret Conversation</h6>
						<div class='icon text-center'>
							 <i id='back' class='fa fa-lock pt-1' style='font-size:15px;margin-top: 3px;'></i>
						</div>
					</div>

					<div class='div2 d-flex px-2 my-2' style='justify-content:space-between;'>
					   <h6 class='pt-1'>Create group with $name</h6>
						<div class='icon text-center'>
							 <i id='back' class='fas fa-user-friends mt-2' style='font-size:15px;'></i>
						</div>
					</div>

					<div class='div2 p-1 px-2 my-2'>
					   <span style='font-size: 14px;' class='pt-1'>Privacy</span>
					</div>
					<div class='div2 p-1 px-2 my-2'>
					   <h6 class='pt-1 mb-0'>Notifications</h6>
					   <span style='font-size: 14px;' class='pt-1'>On</span>
					</div>

					<div class='div2 d-flex px-2 my-2' style='justify-content:space-between;'>
					   <h6 class='pt-1'>Ignore Message</h6>
						<div class='icon text-center'>
							 <i id='back' class='fas fa-bell-slash pt-1' style='font-size:15px;margin-top: 3px;'></i>
						</div>
					</div>

					<div class='div2 p-1 px-2 my-2'>
						<h6 class='pt-1'>Block</h6>
					</div>

					<div class='div2 p-1 px-2 my-2'>
					   <h6 class='pt-1 mb-0'>Somethings Wrong</h6>
					   <span style='font-size: 14px;' class='pt-1'>Give Feedback and Report Conversation</span>
					</div>

				</div>
			</div>
				";

		echo $output;
	}
?>