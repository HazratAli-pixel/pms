<?php 
	$userId= $_SESSION['alogin'];
	$sql = "SELECT user_info.Name, user_info.Photo, admin.UserName,admin.Position, admin.ActiveStatus FROM user_info
	INNER JOIN admin ON admin.UserId = user_info.UserId WHERE admin.UserId=:userid";
	$query = $dbh -> prepare($sql);
	$query->bindParam(':userid',$userId,PDO::PARAM_STR);
	$query->execute();
	$result=$query->fetch(PDO::FETCH_OBJ);	
?>




<div class="brand d-flex justify-content-between align-items-center">
	<div class="">
		<img class="brand-logo" src="./img/pms.jpg" alt="">
		<a href="dashboard.php" style=" font-size:large;" class="title" >Pharmacy Management Sotfware </a>  
		</div>
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		<ul class="ts-profile-nav">
			
			<li class="ts-account">
				<a href="#"><img src="./UserPhoto/<?php echo $result->Photo ?>" class="ts-avatar hidden-side" alt=""> <?php echo $result->Name?> <i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
					<li><a href="change-password.php"><i class="fas fa-user me-2"></i> Profile</a></li>
					<li><a href="change-password.php"><i class="fas fa-user-edit me-2"></i> Edit Profile</a></li>
					<li><a href="change-password.php"><i class="fas fa-history me-2"></i>Sells History</a></li>
					<li><a href="change-password.php"><i class="fas fa-users-cog me-2"></i>Change Password</a></li>
					<li><a href="logout.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
				</ul>
			</li>
		</ul>

	</div>


