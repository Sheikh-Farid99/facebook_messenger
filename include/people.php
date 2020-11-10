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
		$story_pic = $get_data_user['story'];
		
		echo "<div class='header'>
			<div class='name-pic d-flex'>
				<div id='about' class='img'>
					<img onclick='about()' src='img/$pic'>
				</div>
				<h5 class='ml-2 mb-0 pt-1'>People</h5>
			</div>
			<div class='setting d-flex text-center align-items-center' style='font-size:14px;'>
				<div class='icon mr-2' style='cursor: pointer;'>
					<i class='fa fa-address-book mt-2'></i>
				</div>

				 <div class='icon' style='cursor: pointer;'>
					<i class='fa fa-user-plus mt-2 pl-1'></i>
				</div>
			</div>
		</div>
		<div class='p-2'>
			<div class='row m-0 pt-2 text-center'style='flex-wrap: nowrap;'>
				<div class='col-md-6'>
					<div class='stories' onclick='storise()' style='border-radius: 15px;border:none; background:#9b919142;width:100%;cursor: pointer;'>
					   <span class=''>STORIES</span>
					</div>
				</div>
				<div class='col-md-6'>
					<div onclick='active()' class='active'  style='border-radius: 15px;border:none;width:100%;cursor: pointer;'>
					   <span class=''>ACTIVE</span>
					</div>
				</div>
			</div>
		</div>
		<div class='main-section'style='height:475px;'>
			<div class='s'>
				<div class='row m-auto text-center active-fnd'style='width:75%'>";
					if($story_pic !=''){
						echo "<div class='col-md-6 my-2'>
							 <div class='item' data-toggle='modal' data-target='#show_story_me'>
								<div class='overlay'>
									<div class='person'>
										<div class='profile'>
											<img src='img/$pic'>
										</div>
									</div>
									<h4>Your Story</h4>
								</div>
								<div class='story-image'>
									 <img src='story_img/$story_pic' alt=''>
								</div>
							</div>
							<div class='modal' id='show_story_me'>
								<div class='modal-dialog' style='max-width:400px;margin:auto;'>
									  <div class='modal-content' style='height:643px;background:#e0dfec'>
										<div class='modal-header'>
											<div class='' style='width:40px;height:40px;overflow:hidden;border-radius: 50%;'>
												<img src = 'img/$pic' style='width: 100%;height: 100%;object-fit: cover;'>
											</div>
											<button class='close' data-dismiss='modal'>&times;</button>
										</div>
										<div class='modal-body'>
											<div class='story_pic' style='width: 350px;height: 350px;margin: 60px auto 0 auto;'>
												<img src = 'story_img/$story_pic' style='width: 100%;height: 100%;object-fit: contain;'>
											</div>
										</div>
										<div class='modal-footer'>
											<button onclick='delete_story()' class='btn btn-outline-warning btn-block  text-primary ml-1' name='btn' type='button'>Delete Story</i></button>
										</div>
									</div>
								</div>
						   </div>
						</div>";
					}
					else{
						
					
						echo "<div class='col-md-6 my-2'>
							<div class='item'>
								<label for='add_story' style='display:initial;margin:0px;'>
								<div class='overlay'>
									<div class='person'>
										<div class='profile' style='border:none;'>
											<i class='fas fa-plus' style='font-size:20px;padding:7px;'></i>
										</div>
									</div>
									<h4>Add to Story</h4>
								</div>
								<div class='story-image'>
									<img src='img/$pic' alt=''>
								</div>
								</label>
								<input type='file' name='story_pic' id='add_story' style='display:none;'>
							</div>
						</div>";
					}
					
							$select_data = "select * from test";
							$quary  = mysqli_query($con,$select_data);

							if($quary){
								while($row=mysqli_fetch_array($quary)){
									$user_name = $row['username'];
									$picture = $row['pic'];
									$eml =  $row['email'];
									$id = $row['idnt_id'];
									$online_status = $row['active'];
									$story_img = $row['story'];
									
									if($user_email !=$eml){
										if($story_img !=''){
										echo "<div class='col-md-6 my-2'>
											 <div class='item' data-toggle='modal' data-target='#pic_$id'>
												<div class='overlay'>
													<div class='person'>
														<div class='profile'>
															<img src='img/$picture'>
														</div>
													</div>
													<h4>$user_name</h4>
												</div>
												 <div class='story-image'>
													 <img src='story_img/$story_img' alt=''>
												 </div>
											   </div>
											   <div class='modal' id='pic_$id'>
											   		<div class='modal-dialog' style='max-width:400px;margin:auto;'>
														<div class='modal-content' style='height:643px;background:#e0dfec''>
															<div class='modal-header'>
																<div class='' style='width:40px;height:40px;overflow:hidden;border-radius: 50%;'>
																	<img src = 'img/$picture' style='width: 100%;height: 100%;object-fit: cover;'>
																</div>
																<h4 class='mb-0 pl-4 pt-1'>$user_name</h4>
																<button class='close' data-dismiss='modal'>&times;</button>
															</div>
															<div class='modal-body'>
																<div class='story_pic' style='width: 350px;height: 350px;margin: 60px auto 0 auto;'>
																	<img src = 'story_img/$story_img' style='width: 100%;height: 100%;object-fit: contain;'>
																</div>
															</div>
															<div class='modal-footer' style='display:initial'>
																<div class='row m-0'>
																	<div class='col-md-10'>
																		<input id='send' onkeyup='button_change()'  class='form-control mt-1' type='text' name='msg' placeholder='message' style='border-radius: 50px;border: none;height: 33px;background:#4b4f5324;padding-bottom: 9px;'>
																	</div>

																	 <div class='col-md-2 pl-0' >
																		<button onclick ='send_msg($id)' class='btn  text-primary ml-1' name='btn' type='button'><i style='font-size:20px' class='fas fa-thumbs-up'></i></button>
																	</div>
																</div>
															</div>
														</div>
													</div>
											   </div>
										   </div>";
										}
										else{
											
										}
									}
								}
								
							}
			echo "</div>
			</div>
		</div>
		<div class='header p-0 text-center' style='font-size:20px;'>
					<div class='col-md-6' style='color: gray;cursor: pointer;' onclick='farid()'>
						<i class='fas fa-comment chat'style='padding-top: 9px;'></i>
						<h6 class='chats' style='font-size:14px;'>Chat</h6>
					</div>

					 <div class='col-md-6' style='cursor: pointer;'>
						<i  class='fas fa-user-friends user' style='padding-top: 9px;' ></i>
						<h6 class='user' style='font-size:14px;'>People</h6>
					</div>
		        </div>";
	}
?>