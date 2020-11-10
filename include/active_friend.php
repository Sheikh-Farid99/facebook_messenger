<?php

	session_start();
	include("connection.php");
	if(!isset($_SESSION['email'])){
	   header("location:../login.php");
    }
	else{
		$user_email = $_SESSION['email'];

		$select_data = "select * from test";
		$quary  = mysqli_query($con,$select_data);
		echo "<div class='p-3'>";
		if($quary){
		while($row=mysqli_fetch_array($quary)){
			$user_name = $row['username'];
			$picture = $row['pic'];
			$eml =  $row['email'];
			$id = $row['idnt_id'];
			$online_status = $row['active'];
			if($user_email !=$eml){

				if($online_status== 'active'){
					echo"
						<div id='msg' onclick='message($id)' class='main'>
							<div class='friends d-flex p-1 my-1'>
								<div class='img'>
									<img src='img/$picture'>
								</div>
								<h5 id='fnd' class='pl-3 pt-2'>$user_name</h5>
							</div>
						</div>
						 ";

				   }

				}
			}
		}
		echo "</div>";
	}
?>