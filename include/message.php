<?php
	
    session_start();
	if(!isset($_SESSION['email'])){
	   header("location:../login.php");
    }
	else{
		$user = $_SESSION['email'];
		include('connection.php');

		$select_user = "select * from test where email='$user'";
		$quary_user_data = mysqli_query($con,$select_user);
		$get_user_data = mysqli_fetch_array($quary_user_data);

		$get_user_name = $get_user_data['username'];
		$get_user_pic = $get_user_data['pic'];

		$idnt_id = $_POST['id'];
		$select_data = "select * from test where idnt_id = '$idnt_id'";
		$quary  = mysqli_query($con,$select_data);

		$output = "";
		if($quary){
			$get_data = mysqli_fetch_array($quary);
			$get_uname = $get_data['username'];
			$get_id = $get_data['idnt_id'];
			$get_pic = $get_data['pic'];


			$update_msg = mysqli_query($con,"UPDATE msg SET msg_status='seen' WHERE sender_name='$get_uname' AND re_name='$get_user_name'");

			$output = "
				<div class='header'style='box-shadow: 0 0px 2px #444;'>
						<div class='name-pic d-flex'>
							<i id='back' onclick='farid()' class='fa fa-arrow-left p-2 text-primary' style='font-size:21px; cursor: pointer;'></i>
							<div id='about' class='img'>
								<img onclick='info($get_id)' src='img/$get_pic'>
							</div>
							<h5 class='ml-2 mb-0 pt-1'>{$get_uname}</h5>
						</div>
						<div class='setting d-flex text-center align-items-center text-primary' style='font-size:18px;'>
							<div class='icon mr-2' style='background:none;cursor: pointer;'cursor: pointer;>
								<i class='fa fa-phone mt-2'></i>
							</div>

							 <div style='background:none;cursor: pointer;' class='icon mr-2 bg-none'>
								<i class='fa fa-video mt-2 pl-1'></i>
							</div>
							<div style='background:none;cursor: pointer;' class='icon mr-2'>
								<i onclick='info($get_id)' class='fa fa-info mt-2'></i>
							</div>

						</div>
					</div>
					<div class='main-section' style='height:525px;'>";
					echo $output;
					$sel_msg = "select * from msg where (sender_name='$get_user_name' AND re_name='$get_uname') OR (re_name='$get_user_name' AND sender_name='$get_uname') ORDER by 1 ASC";
					$run_msg = mysqli_query($con,$sel_msg);
					while($rows = mysqli_fetch_array($run_msg)){
								   $sender_username = $rows['sender_name'];
								   $receiver_username = $rows['re_name'];
								   $msg_content = $rows['massage'];
								   $msg_date = $rows['msg_data'];
								   $msg_status = $rows['msg_status'];

						if($get_user_name== $sender_username AND $get_uname == $receiver_username){
							echo"

							<div class='col-9 float-right my-2'>
								<div class='right-side'>
								   <span style='display:none;' class='msg-seen'>$msg_date</span>
								   <div onclick='seen()' class='msg-con' style='background: #81bed7; padding: 5px; border-top-left-radius: 10px;border-top-right-radius: 1px;border-bottom-right-radius: 13px;border-bottom-left-radius: 1px;'>
									  <p class='m-0'>$msg_content</p>
								   </div>
								   <span style='display:none;' class='float-right pr-3 msg-seen'>$msg_status</span>
								</div>
							</div>";
						}

						else if($get_user_name==$receiver_username AND $get_uname==$sender_username){

							   echo "
								<div class='col-9  float-left my-2'>
									<div class='left-side'>
									   <span style='display:none;' class='pl-2 msg-seen'>$msg_date</span>
									   <div class='d-flex p-1'>
										   <div>
											   <div class='m-auto' style='width:30px;height:30px;overflow:hidden;border-radius:50%;align-items: center;'>
													<img onclick='info($idnt_id)' style='width:100%;height:100%;object-fit: cover;cursor: pointer;' src='img/$get_pic'>
											   </div>
										   </div>
										   <div class='msg-con ml-2' style='background: #4cca7e; padding: 5px; border-top-left-radius: 1px;border-top-right-radius: 13px;border-bottom-right-radius: 1px;border-bottom-left-radius: 13px;'>
											  <p class='m-0'>							   $msg_content</p>
										   </div>
									   </div>
									</div>
								</div>";
						}
					}
					$out="</div>
					<div class='fottor d-flex py-2' style='box-shadow: 0 0px 2px #444;'>
						<div class='col-3 pr-0 d-flex align-items-center text-primary' style='font-size:20px;cursor: pointer;'>
								<i class='fa fa-camera'></i>
								<i onclick='get_pic({$get_id})' class='fas fa-image pl-3'></i>
								<i class='fa fa-microphone pl-3'></i>
						</div>
						<div class='col-7 p-0 ml-3'>
							<input id='send' onkeyup='button_change()'  class='form-control mt-1' type='text' name='msg' placeholder='message' style='border-radius: 50px;border: none;height: 33px;background:#4b4f5324;padding-bottom: 9px;'>
						</div>

						 <div class='col-2 pl-0' >
							<button onclick ='send_msg({$get_id})' class='btn  text-primary ml-1' name='btn' type='button'><i style='font-size:20px' class='fas fa-thumbs-up'></i></button>
						</div>
					</div
			";

			echo $out;


		}
	}
?>