<?php

session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['alogin'])==0){	
		//header('location:index.php');
		if(isset($_POST['login']))
		{
			$userid = $email=$_POST['username'];
			$password=md5($_POST['password']);
			$position = $_POST['position'];
			$sql ="SELECT UserName,Password,UserId FROM admin WHERE (UserName=:email and Password=:password and Position=:position) || (UserId=:userid and Password=:password and Position=:position)";
			$query= $dbh -> prepare($sql);
			$query-> bindParam(':email', $email, PDO::PARAM_STR);
			$query-> bindParam(':password', $password, PDO::PARAM_STR);
			$query-> bindParam(':position', $position, PDO::PARAM_STR);
			$query-> bindParam(':userid', $userid, PDO::PARAM_STR);
			$query-> bindParam(':password', $password, PDO::PARAM_STR);
			$query-> bindParam(':position', $position, PDO::PARAM_STR);
			$query-> execute();
			$results=$query->fetch(PDO::FETCH_OBJ);
			switch($position){
				case 'Admin':
					if($query->rowCount() > 0)
					{
					$_SESSION['alogin']=$results->UserId;
					setcookie("Username",$email,time()+60*60*24,'/');
						if(strlen($_SESSION['current_link'])==0){
							header('location:dashboard.php');
						}
						else{
							header("location:".$_SESSION['current_link']);
						}
					//echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
					} 
					else
					{
					echo "<script>alert('Invalid Details');</script>";
					}
				break;
		
				case 'Manager':
					if($query->rowCount() > 0)
					{
					$_SESSION['alogin']=$results->UserId;
					echo  "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
					
					
					} 
					else
					{
					echo "<script>alert('Invalid Details');</script>";
					}
				break;
		
				case 'Pharmacist':
					if($query->rowCount() > 0)
					{
					$_SESSION['alogin']=$results->UserId;
					echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
					} 
					else
					{
					echo "<script>alert('Invalid Details');</script>";
					}
				break;
				case 'Cashier':
					if($query->rowCount() > 0)
					{
					$_SESSION['alogin']=$results->UserId;
					echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
					} 
					else
					{
					echo "<script>alert('Invalid Details');</script>";
					}
				break;
				default:
				echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
			}
		}
		else if ($_POST['reset']){

		}
		}
	else{
		header('location:dashboard.php');
		
	}
?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="hazrat Ali">
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
	.card{
		top: 50%;
		left: 50%;
		transform: translate(-50%,-50%);
		box-shadow: 0px 15px 20px 0px rgb(95, 52, 41,1);
	}
	#ForgetPassModel{
		display: none;
	}
	#showpass, #userresult{
		display: none;
	}
</style>

</head>

<body>
	
	<div  class="login-page bk-img" style="background-image: url(img/pms.jpg);">
		<div style="background-color: rgba(182, 192, 209,0.7);">
		<div class="container " >
			<div class="row">
				<div class="" style="height: 100vh; width:100%" >
					<div id="LoginModel"  class="card col-lg-4 col-md-8 col-sm-10" style="min-width: 250px;" >
						<div class="card-header">
							<h1 class="text-center text-bold  text-black ">Pharmacy Management Software</h1>
						</div>	
						<div class="card-body">
							<form method="post">
								<div class="form-floating mb-3">
									<input type="text" name="username" class="form-control" id="floatingInput" placeholder="name@example.com" required>
									<label for="floatingInput" >User ID / User Email</label>
									
								</div>
								<div>
									<p id="userresult" class="mb-2 ms-1" style="margin-top:-12px"></p>
								</div>
								<div class="form-floating mb-3">
									<input type="password"  name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
									<label for="floatingPassword" >Password</label>
								</div>
									<select name="position" class="form-control mb" required>
										<option selected disabled>Your Positon......</option>
										<option>Admin</option>
										<option>Manager</option>
										<option>Pharmacist</option>
										<option>Cashier</option>
									</select>
								<div class="d-flex justify-content-between align-items-center" >
									<button class="btn btn-info text-black" id="login" name="login" type="submit">LOGIN</button>	
									<a id="ForgetPassBtn" href="#" style="text-decoration: none;" class="text-lg">Forget password?</a>
									
								</div>
							</form>
						</div>
					</div>
					<!-- this is forget password section -->
					<div id="ForgetPassModel" class="card col-lg-4 col-md-8 col-sm-10" style="min-width: 250px;" >
						<div class="card-header">
							<h1 class="text-center text-bold  text-black ">Pharmacy Management Software</h1>
						</div>	
						<div class="card-body">
							<form method="post">
								<div class="form-floating mb-3">
									<input type="text" name="username" class="form-control" id="floatingInput2" placeholder="name@example.com">
									<label for="floatingInput" >Username</label>
								</div>
								<div class="form-floating mb-3">
									<input type="text"  name="PhoneNumber" class="form-control" id="floatingPassword" placeholder="Password">
									<label for="floatingPassword" >Phone Number</label>
								</div>
								<div class="form-floating mb-3">
									<input type="text"  name="userid" class="form-control" id="floatingPassword" placeholder="Password">
									<label for="" >User ID</label>
								</div>
								<select name="positon" class="form-control mb">
									<option selected disabled>Your Positon......</option>
									<option>Admin</option>
									<option>Manager</option>
									<option>Pharmacist</option>
									<option>Cashier</option>
								</select>
								<div class="d-flex justify-content-between align-items-center" >
									<button id="ResetBtn" class="btn btn-info" name="login" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Show Password</button>
									<a id="LoginBtn" href="#" class="pe-3 text-lg" style="text-decoration: none;">Log in</a>
								</div>
								<div class="d-flex justify-content-between align-items-center" >

									<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
										<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
											<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
										</symbol>
									</svg>	
									<div id="showpass" style="width: 100%;" class="alert alert-success mt-2 alert-dismissible fade show" role="alert">
										<svg class="bi flex-shrink-0 me-1" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
										<div>
											<strong>Congrats..</strong> <br>
											<pre>Your pass is : </pre> 
											<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
										</div>
									</div>
								<!-- <p id="showpass">Your PassWord : .... </p> -->
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
	
	<script> 
		$(document).ready(() =>{
			$("#ForgetPassBtn").click(() =>{
				$("#LoginModel").hide();
				$("#ForgetPassModel").show();
				
			});
			$("#LoginBtn").click(() =>{
				$("#LoginModel").show();
				$("#ForgetPassModel").hide();
				
			});
			$("#ResetBtn").click(() =>{
				$("#showpass").show();
				// setTimeout(function(){
				// 	$("#showpass").hide();
				// },3000)
				
			});
			$("#floatingInput").blur(() =>{
				var InputValue = $("#floatingInput").val();
				if (InputValue.length == 0) {
					$("#userresult").text("You can't keep it empty!");
					$("#userresult").css("color", "red");
					$("#userresult").show();
					$("#login").attr("disabled",true);
				} 
				else
				{
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							var result = Number(this.responseText);
							if(result ==0){
								$("#userresult").text("User Name/ID not found!");
								$("#userresult").css("color", "red");
								$("#userresult").show();
								$("#login").attr("disabled",true);
								
							}
							else{
								$("#userresult").hide();
								$("#login").attr("disabled","enabled");
								$("#login").attr("disabled",false);
							}
						}
					}
					xmlhttp.open("GET", "query.php?userid="+InputValue, true);
					xmlhttp.send();
				}
			});
		});
	</script> 

</body>
</html>
