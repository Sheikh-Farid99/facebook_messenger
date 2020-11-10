<?php
	session_start();
	$id = $_POST['id'];

	if(!isset($_SESSION['email'])){
	   header("location:../login.php");
    }
	else{
		   echo "<div class='header'style='box-shadow: 0 0px 2px #444;'>
				<div class='name-pic d-flex'>
					<i id='back' onclick='message({$id})' class='fa fa-arrow-left p-2 text-primary' style='font-size:21px; cursor: pointer;'></i>
					<h5 class='ml-2 mb-0 pt-1 text-center'>Send pic</h5>
				</div>

			</div>
			<div class='main-section' style='height:570px;'>
				<div class ='card m-2'>
				   <div class='card-header'>
						<input class='form-control' name='msg_pic' id = 'send_pic' type='file'>
				   </div>
				   <div class='card-body'>
						<div class='show-pic' id = 'show-pic' style ='height:390px;width:250px;margin:auto;'>

						</div>
				   </div>
				   <div class='card-footer'>
						<button onclick='send_pic_msg({$id})' class='form-control' name='' id = 'send_msg_pic' type='button'>Send Pic</button>
				   </div>
				</div>
			</div>";
	}
?>