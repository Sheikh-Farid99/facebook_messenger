<!DOCTYPE html>
<?php
	session_start();
	include("include/connection.php");
	if(!isset($_SESSION['email'])){
	   header("location:login.php");
  }
else{ ?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="font/css/all.min.css">
	
	<style>
		.owl-carousel .owl-nav{
			display: none;
        }
		.owl-carousel .owl-nav button.owl-prev span{
			display: none;
		}
		.owl-carousel .owl-dots{
			display: none;
        }
		.modal-backdrop{
			display: none;
		}
	
	</style>
</head>
<body>
	<?php
		$user_email = $_SESSION['email'];
		
		$select_user = "select * from test where email='$user_email'";
		$quary_user = mysqli_query($con,$select_user);
		$get_data_user = mysqli_fetch_array($quary_user);
		
		$name = $get_data_user['username'];
		$pic = $get_data_user['pic'];
		$get_story = $get_data_user['story'];
		$act_status = $get_data_user['active'];
	
	?>
	<div class="row justify-content-center m-0">
		<div class="min p-0" id="col">
			<div class="s">
				<div class="header" style="">
					<div class="name-pic d-flex">
						<div id="about" class="img">
							<img onclick="about()" src="img/<?php echo $pic ?>" alt="">
						</div>
						<h5 class="ml-2 mb-0 pt-1"><?php echo $name ?></h5>
					</div>
					<div class="setting d-flex text-center align-items-center" style="font-size:14px;">
						<div class="icon mr-2" style="cursor: pointer;">
							<i class="fa fa-camera mt-2"></i>
						</div>

						 <div class="icon" style="cursor: pointer;">
							<i class="fas fa-pen mt-2 pl-1"></i>
						</div>
					</div>
				</div>
				<div class="main-section">
					<div class="s px-2">
						<div class="src-section p-2 pt-3 pb-3">
							<div class="search">
								<i class="fa fa-search pl-2"></i>
								<input onclick="search()" type="text" name="src" placeholder="Search" class="src-src">
							</div>
						</div>
						<div class="owl-carousel owl-theme">
							<div class="item pb-2">
									<div class="icon" style="width:40px;height:40px;border-radius:50%;overflow:hidden;cursor: pointer;background:#4b4f5324;">
										<label for='add_story'><i class="fas fa-plus" style="font-size:20px;padding:11px;cursor: pointer"></i></label>
									</div>
								<h6 class="" style="font-size:9px;">Your Story</h6>
								<input type="file" id="add_story" style="display:none;" name="story_pic">
							</div>
							<?php
								
								if($get_story !=''){
									echo"

										<div class='item pb-2'>
											<div data-toggle='modal' data-target='#show_story_me' class='online' style='width:40px;height:40px;border-radius:50%;overflow:hidden;cursor: pointer;border:2px solid blue;'>
												<img style='width:100%;height:100%;object-fit: cover;' src='story_img/$get_story'>
											</div>
											<h6 class='mb-0' style='font-size:10px;'>Your Story</h6>
										</div>
									";
								}
							?>
							
						
						<?php
	
							$select_data = "select * from test";
							$quary  = mysqli_query($con,$select_data);

							if($quary){
								
								while($row=mysqli_fetch_array($quary)){
									$user_name = $row['username'];
									$picture = $row['pic'];
									$eml =  $row['email'];
									$id = $row['idnt_id'];
									$online_status = $row['active'];
									$story = $row['story'];
									if($user_email !=$eml){
										if($story !=''){
											if($online_status== 'active'){
												echo"

												<div data-toggle='modal' data-target='#pic_$id' class='item pb-2'>
													<div class='online' style='width:40px;height:40px;border-radius:50%;overflow:hidden;cursor: pointer;border:2px solid blue;'>
														<img style='width:100%;height:100%;object-fit: cover;' src='story_img/$story'>
													</div>
													<h6 class='mb-0' style='font-size:10px;'>$user_name</h6>
												</div>";
										       }
											
												else{
													echo"

													<div class='item pb-2'>
														<div data-toggle='modal' data-target='#pic_$id' class='ofline' style='width:40px;height:40px;border-radius:50%;overflow:hidden;cursor: pointer;border: 2px solid blue;;'>
															<img style='width:100%;height:100%;object-fit: cover;' src='story_img/$story''>
														</div>
														<h6 class='mb-0' style='font-size:10px;'>$user_name</h6>
													</div>";
									          }
										}
										
										else{
											
											if($online_status=='active'){
												echo"

												<div class='item pb-2'>
													<div class='online' style='width:40px;height:40px;border-radius:50%;overflow:hidden;cursor: pointer;border:2px solid blue;'>
														<img style='width:100%;height:100%;object-fit: cover;'  onclick='message($id)' src='img/$picture'>
													</div>
													<h6 class='mb-0' style='font-size:10px;'>$user_name</h6>
												</div>";
										       }
											
												else{
													echo"

													<div class='item pb-2'>
														<div class='ofline' style='width:40px;height:40px;border-radius:50%;overflow:hidden;cursor: pointer;border:2px solid #fff;'>
															<img onclick='message($id)' style='width:100%;height:100%;object-fit: cover;' src='img/$picture'>
														</div>
														<h6 class='mb-0' style='font-size:10px;'>$user_name</h6>
													</div>";
									          }
											
											
										}
										
									}
								}
								
							}
						?>
						</div>
						<!-- **********************story show*********************-->
						<?php
							$select_data = "select * from test";
							$quary  = mysqli_query($con,$select_data);

							if($quary){
								
								while($row=mysqli_fetch_array($quary)){
									$user_name = $row['username'];
									$picture = $row['pic'];
									$eml =  $row['email'];
									$id = $row['idnt_id'];
									$story = $row['story'];
									if($user_email !=$eml){
										if($story !=''){
										echo"<div class='modal' id='pic_$id'>
											<div class='modal-dialog' style='max-width:400px;margin:auto;'>
												  <div class='modal-content' style='height:644px;background:#e0dfec'>
													<div class='modal-header'>
														<div class='' style='width:40px;height:40px;overflow:hidden;border-radius: 50%;'>
															<img src = 'img/$picture' style='width: 100%;height: 100%;object-fit: cover;'>
														</div>
														<h4 class='mb-0 pl-4 pt-1'>$user_name</h4>
														<button class='close' data-dismiss='modal'>&times;</button>
													</div>
													<div class='modal-body'>
														<div class='story_pic' style='width: 350px;height: 350px;margin: 60px auto 0 auto;'>
															<img src = 'story_img/$story' style='width: 100%;height: 100%;object-fit: contain;'>
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
									   </div>";
										}
									}
								}
							}
						?>
						
						<div class="modal" id="show_story_me">
							<div class="modal-dialog" style="max-width:400px;margin:auto;">
								<div class="modal-content" style="height:644px;background:#e0dfec">
									<div class="modal-header">
										<div class="" style="width:40px;height:40px;overflow:hidden;border-radius: 50%;">
											<img src = "img/<?php echo $pic?>" style="width: 100%;height: 100%;object-fit: cover;">
										</div>
										<button class="close" data-dismiss="modal">&times;</button>
									</div>
									<div class="modal-body">
										<div class="story_pic" style="width: 350px;height: 350px;margin: 60px auto 0 auto;">
											<img src = "story_img/<?php echo $get_story?>" style="width: 100%;height: 100%;object-fit: contain;">
										</div>
									</div>
									<div class="modal-footer">
										<button onclick="delete_story()" class="btn btn-outline-warning btn-block  text-primary ml-1" name="btn" type="button">Delete Story</button>
									</div>
								</div>
						   </div>
					   </div>

						<div class="s-src">
						<?php
	
							$select_data = "select * from test";
							$quary  = mysqli_query($con,$select_data);

							if($quary){
								while($row=mysqli_fetch_array($quary)){
									$user_name = $row['username'];
									$picture = $row['pic'];
									$eml =  $row['email'];
									$id = $row['idnt_id'];
									$online_status = $row['active'];
									if($user_email !=$eml){
										if($online_status=='active'){
											echo"
										<div id='msg' onclick='message($id)' class='main'>
											<div class='friends d-flex p-1 my-1 pl-2'>
												<div class='img'>
													<img src='img/$picture'>
												</div>
												<h5 id='fnd' class='pl-3 pt-2'>$user_name</h5>
											</div>
										</div>
									     ";
										}
										else{
											echo"
										<div id='msg' onclick='message($id)' class='main'>
											<div class='friends d-flex p-1 my-1 pl-2'>
												<div class='imgs'>
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
			
						?>

				  </div>
				</div>
				</div>
				<div class="header text-center p-0 " style="font-size:20px;">
					<div class="col-md-6" style="cursor: pointer;">
						<i class="fas fa-comment active chat"style="padding-top: 9px;"></i>
						<h6 class="chats" style="font-size:14px;">Chat</h6>
					</div>

					 <div class="col-md-6" onclick="people()" style="cursor: pointer;color:gray">
						<i  class="fas fa-user-friends user" style="padding-top: 9px;" ></i>
						<h6 class="user" style="font-size:14px;">People</h6>
					</div>
		        </div>
			</div>
		</div>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	
	<script>
		$('.owl-carousel').owlCarousel({
			//loop:true,
			margin:10,
			nav:true,
			responsive:{
				400:{
					items:5
				},

			}
		})
	</script>
	<!--*******************Request servar about page******************-->
	<script type="text/javascript">
			function about(){
				$.ajax({
					url: "include/about.php",
					type : "POST",
					success : function(result){
						$('#col').html(result);
					}
				});
			}
	    
	</script>
	<!--*******************Request servarmessage page******************-->
	<script type="text/javascript">
		function message(id){
			var name = id;
				$.ajax({
					url: "include/message.php",
					type : "POST",
					data : {id:id},
					success : function(result){
						$('#col').html(result);
					}
				});
			}
	    
	</script>
	<!--*******************Request servar logout page******************-->
	<script>
		function logout(){
			$.ajax({
				url: "logout.php",
				success : function(result){
					
					if(result == 'logout'){
						window.location = 'login.php';
					}
					else{
						window.location = 'index.php';
					}
				}
			});
		}
		
	</script>
	<!--*******************Request servar send message******************-->
	<script>
		function send_msg(id){
			var get_msg = $(".form-control").val();
			var name = id;
			$.ajax({
				
				url: "include/send_message.php",
				type : "POST",
				data : {id:id, msg:get_msg},
				success : function(result){
					message(id);
				}
			});
		}
	</script>
	<!--*******************Request servar friend information page******************-->
	<script>
		function info(id){
			var get_id = id;
			$.ajax({
				
				url: "include/fnd_info.php",
				type : "POST",
				data : {id:get_id},
				success : function(result){
					$('#col').html(result);
				}
			});
		}
	</script>
	
	<!--*******************message seen unseen ******************-->
	<script>
			
		function seen(){
			$(".msg-seen").slideToggle(1000);
		}
		
	</script>
	
	<!--******************* profile Pic upload***************-->
	<script>
		$(document).on("change","#file",function(){
			var name = document.getElementById("file").files[0].name;
            var form_data = new FormData();
			form_data.append("file", document.getElementById('file').files[0]);
			
			$.ajax({
				url:"include/upload_pic.php",
				method:"POST",
				data: form_data,
				contentType: false,
				cache: false,
				processData: false,
				success:function(data)
				{
					if(data=='yes'){
						 about();
					}
				}
				
			});
		});
	</script>
	
	<!--******************* People page ***************-->
	<script>
		function people(){
			$(".user").css("color","dark");
			$(".chats").css("color","gray");
			$.ajax({
				url: "include/people.php",
				type : "POST",
				success : function(result){
					$('#col').html(result);
				}
			});
		}
	</script>
	<!--******************* Storis and active fage  ***************-->
	<script>
		function active(){
			
			$(".stories").css("background","none");
			$(".active").css("background","#9b919142 ");
			
			$.ajax({
				url: "include/active_friend.php",
				type : "POST",
				success : function(result){
					$('.main-section .s').html(result);
				}
			});
		}
		function storise(){
			
			$(".stories").css("background","#9b919142 ");
			$(".active").css("background","none");
			
			$.ajax({
				url: "include/people.php",
				type : "POST",
				success : function(result){
					$('#col').html(result);
				}
			});
		}
	</script>
	<!--*******************back Button******************-->
	<script>
		function farid(){
			$.ajax({
				url :"index.php",
				success : function(result){
					$('body').html(result);
				}
			});
		}
	</script>
	<!--******************* message send Button Change ***************-->
	<script>
		function button_change(){
			$.ajax({
				url :"include/btn_change.php",
				success : function(result){
					$('.btn').html(result);
				}
			});
		}
	</script>
	<!--******************* Creat search Page ***************-->
	<script>
		function search(){
			$.ajax({
				url : "include/search.php",
				type : "POST",
				success: function(result){
					$("#col").html(result);
				}
				
			});
		}
	</script>
	
	<!--******************* search Friend ***************-->
	
	<script>
		
		function searchFd(){
			let filter = document.getElementById('src_fd').value.toUpperCase();
			let table = document.getElementById('src_tbl');
			let tr = table.getElementsByTagName('tr');
			let td = table.getElementsByTagName('td');
			let h = table.getElementsByTagName('h5');
			for(var i=0; i<h.length; i++){
				let text_value = h[i].textContent || h[1].innerHTML;
				if(text_value.toUpperCase().indexOf(filter) > -1){
					tr[i].style.display = "block";
				}
				else{
					tr[i].style.display = "none";
				}
			}

		}
	</script>
	<!--******************* send picture message ***************-->
	<script>
		function get_pic(id){
			var get_id = id;
			$.ajax({
				
				url: "include/get_pic.php",
				type : "POST",
				data : {id:get_id},
				success : function(result){
					$('#col').html(result);
				}
			});
		}
	</script>
	<!--******************* Add Story ***************-->
	<script>
		
			$(document).on("change","#add_story",function(){
			var name = document.getElementById("add_story").files[0].name;
            var form_data = new FormData();
			form_data.append("story_pic", document.getElementById('add_story').files[0]);
			$.ajax({
				
				url:"include/add_story.php",
				method:"POST",
				data:form_data,
				contentType: false,
				cache: false,
				processData: false,
				success:function(data)
				{
				  farid();
				}
			});
		});
	</script>
	<!--******************* delete story database***************-->
	<script>
		function delete_story(){
			$.ajax({
				
				url:"include/delete_story.php",
				type:"POST",
				success:function(data)
				{
				  farid();
				}
				
			});
		}
	</script>
	<!--*******************Create add another account page ***************-->
	<script>
		
		function switch_account(){
			$.ajax({
				url :"include/switch_account.php",
				type: "POST",
				success : function(result){
					$("#col").html(result);
				}
			});
		}
	
	</script>
	<!--******************* Add another account ***************-->
	<script>
		function add_account(id){
			var get_id = id;
			var email = $("#log_email").val();
			var pass = $("#log_pass").val();
			$.ajax({
				url : "include/add_another_account.php",
				type : "POST",
				data :{uemail:email,upass:pass,id:get_id},
				success: function(result){
					if(result=='success'){
						window.alert("Login Successfull...");
						window.location = 'index.php';
					}
					else{
						window.alert(result);
					}
			    }
			});
		}
	</script>
	<!--******************* Change current Password ***************-->
	<script>
		function change_pass(){
			var old_email =  $("#old_email").val();
			var old_pass =  $("#old_pass").val();
			var new_pass =  $("#new_pass").val();
			var con_pass =  $("#con_pass").val();
			
			$.ajax({
				url : "include/change_pass.php",
				type : "POST",
				data :{email:old_email,opass:old_pass,npass:new_pass,cpass:con_pass},
				success: function(result){
					if(result=='success'){
						window.alert("Password Change Successful");
						window.location = 'index.php';
					}
					else{
						window.alert(result);
					}
			    }
			});
		}
	</script>
	
</body>
</html>
<?php } ?>