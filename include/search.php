<?php

	session_start();
	include('connection.php');
	if(!isset($_SESSION['email'])){
	   header("location:../login.php");
    }
	else{
		
		$user_email = $_SESSION['email'];

		$select_data = "select * from test";
		$quary  = mysqli_query($con,$select_data);
		echo "<nav class='navbar p-3' style='justify-content: flex-start;box-shadow: 0 1px 2px;'>
				 <i id='back' onclick='farid()' class='fa fa-arrow-left' style='font-size:20px; cursor: pointer;'></i>
				 <input onkeyup='searchFd()' type='text' id='src_fd' placeholder='Search'  style='border: none;background: #ebedee00;margin-left: 10px;padding:5px;'>
			</nav>
			<div class='main-section' style='margin-top:50px;height: 594px;'>
			<div class='s p-4'>
			<table id='src_tbl'>";
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
					<tr>
					  <td>
						<div id='msg' onclick='message($id)' class='main'>
							<div class='friends d-flex p-1 my-1'>
								<div class='img'>
									<img src='img/$picture'>
								</div>
								<h5 id='fnd' class='pl-3 pt-2'>$user_name</h5>
							</div>
						</div>
						</td>
						</tr>
						 ";
					}
					else{
						echo "<tr><td><div id='msg' onclick='message($id)' class='main'>
							<div class='friends d-flex p-1 my-1'>
								<div class='imgs'>
									<img src='img/$picture'>
								</div>
								<h5 id='fnd' class='pl-3 pt-2'>$user_name</h5>
							</div>
						</div></tr></td>
						 ";
					}

				}
			}
		 }
		 echo "</table></div>
				</div>";
	}

?>