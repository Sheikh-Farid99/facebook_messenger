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

		$get_msg_value = $_POST['msg'];
		$get_id =  $_POST['id'];

		$select_friend = "select * from test where idnt_id='$get_id'";
		$quary_data = mysqli_query($con,$select_friend);
		$get_fd_data = mysqli_fetch_array($quary_data);

		$get_fd_name = $get_fd_data['username'];

		if($get_msg_value !=""){
			$insert = "insert into msg (sender_name,re_name,massage,msg_status,msg_data) values('$get_user_name','$get_fd_name','$get_msg_value','unseen',NOW())";
			$run_insert = mysqli_query($con,$insert);
			if($run_insert){

			}
		}
	}

?>