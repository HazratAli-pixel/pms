<?php
session_start();
error_reporting(0);
include('includes/config.php');
	
	if(strlen($_SESSION['alogin'])==0)
		{
		include_once('./includes/address.php');		
		header('location:index.php');
		}
	else{ 
	
		if(isset($_POST['submit']))
	  		{
			$cname=$_POST['cname'];
			$mobile=$_POST['mobile'];
			$email1=$_POST['email1'];
			$email2=$_POST['email2'];
			$phone=$_POST['phone'];
			$contact=$_POST['contact'];
			$address1=$_POST['address1'];
			$address2=$_POST['address2'];
			$fax=$_POST['fax'];
			$city=$_POST['city'];
			$state=$_POST['state'];
			$zipcode=$_POST['zipcode'];
			$country=$_POST['country'];
            $companyid=$_POST['companyid'];            
			$priviousbal=$_POST['priviousbal'];
			$status=$_POST['radio_value'];

			$sql="INSERT INTO company (name, mobile, email1, email2, phono,contact, address1, address2, fax, city, state, zip, country, priviousbal,companyid, status) 
			VALUES(:cname,:mobile,:email1,:email2,:phone,:contact,:address1,:address2,:fax,:city,:state,:zipcode,:country,:priviousbal,:companyid,:radio_value)";
			$query = $dbh->prepare($sql);
			$query->bindParam(':cname',$cname,PDO::PARAM_STR);
			$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
			$query->bindParam(':email1',$email1,PDO::PARAM_STR);
			$query->bindParam(':email2',$email2,PDO::PARAM_STR);
			$query->bindParam(':phone',$phone,PDO::PARAM_STR);
			$query->bindParam(':contact',$contact,PDO::PARAM_STR);
			$query->bindParam(':address1',$address1,PDO::PARAM_STR);
			$query->bindParam(':address2',$address2,PDO::PARAM_STR);
			$query->bindParam(':fax',$fax,PDO::PARAM_STR);
			$query->bindParam(':city',$city,PDO::PARAM_STR);
			$query->bindParam(':state',$state,PDO::PARAM_STR);
			$query->bindParam(':zipcode',$zipcode,PDO::PARAM_STR);
			$query->bindParam(':country',$country,PDO::PARAM_STR);
            $query->bindParam(':priviousbal',$priviousbal,PDO::PARAM_STR);
            $query->bindParam(':companyid',$companyid,PDO::PARAM_STR);
			$query->bindParam(':radio_value',$status,PDO::PARAM_STR);


			$query->execute();
			$lastInsertId = $dbh->lastInsertId();
		if($lastInsertId)
			{
			$msg=" Your info submitted successfully";
			header("refresh:3;company_list.php"); 
			}
		else 
			{
			$error=" Something went wrong. Please try again";
			header("refresh:3;company_add.php"); 
			}
	
		}
	}
	?>
	<!doctype html>
	<html lang="en" class="no-js">
	
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
		<meta name="description" content="">
		<meta name="author" content="Hazrat Ali">
		<meta name="theme-color" content="#3e454c">
		
		<title>CKAMS| Admin Add Teacher</title>
	
		<!-- Font awesome -->
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
		<!-- Sandstone Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<!-- Bootstrap Datatables -->
		<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
		<!-- Bootstrap social button library -->
		<link rel="stylesheet" href="css/bootstrap-social.css">
		<!-- Bootstrap select -->
		<link rel="stylesheet" href="css/bootstrap-select.css">
		<!-- Bootstrap file input -->
		<link rel="stylesheet" href="css/fileinput.min.css">
		<!-- Awesome Bootstrap checkbox -->
		<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
		<!-- Admin Stye -->
		<link rel="stylesheet" href="css/style.css">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.1.2/typicons.min.css" rel="stylesheet">
	<style>
		.errorWrap {
			padding: 10px;
			margin: 0 0 20px 0;
			background: #fff;
			border-left: 4px solid #dd3d36;
			-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
			box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
	}
		.succWrap{
			padding: 10px;
			margin: 0 0 20px 0;
			background: #fff;
			border-left: 4px solid #5cb85c;
			-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
			box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
			
	}
			</style>
		<script language="javascript">
			function isNumberKey(evt)
			{
				
				var charCode = (evt.which) ? evt.which : event.keyCode
						
				if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode!=46)
				return false;
		
				return true;
			}
		  </script>
	</head>
	
	<body>
		<?php include('includes/header.php');?>
		<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
			<div class="content-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							
							<?php if($error){?><div class="errorWrap"><strong>ERROR </strong>: <?php echo htmlentities($error); ?> </div><?php } 
					else if($msg){?><div class="succWrap"><strong>SUCCESS </strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
							<div class="row">
								<div class="col-md-12">
									<div class="card" style="width: 100%;">
										<div class="card-header d-flex justify-content-between align-items-center h-100px">
		  									<div style="font-size: 20px; " class="bg-primary;">
												Company Information
											</div>
											<div >
												<a href="company_list.php"><button type="button" class="btn btn-info"><i class="fas fa-align-justify mr-2" style="margin-right: 10px;"></i> Company List</button></a>
												
											</div>
										</div>
										<div class="card-body">
											<form method="post" class="row" enctype="multipart/form-data" >
                                                <div class="col-md-6">
													<div class="row mb-3">
														<label for="" class="col-sm-4 col-form-label text-start text-sm-end">Company Id : </label>
														<div class="col-sm-8">
														<input type="text" class="form-control" name="companyid" placeholder="Company Unique ID">
														</div>
													</div>
												</div>
                                                <div class="col-md-6">
													<div class="row mb-3">
														<label for="" class="col-sm-4 col-form-label text-start text-sm-end">Company Name : </label>
														<div class="col-sm-8">
														<input type="text" class="form-control" name="cname" placeholder="Company Name">
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="row mb-3">
														<label for="" class="col-sm-4 col-form-label text-start text-sm-end">Mobile No <i class="text-danger">* </i>:</label>
														<div class="col-sm-8">
														<input type="text" class="form-control" name="mobile" placeholder="Mobile No">
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="row mb-3">
														<label for="" class="col-sm-4 col-form-label text-start text-sm-end">Email-1 : </label>
														<div class="col-sm-8">
														<input type="text" class="form-control" name="email1" placeholder="Email address 1">
														</div>
													</div>
												</div>
                                                
												<div class="col-md-6">
													<div class="row mb-3">
														<label for="" class="col-sm-4 col-form-label text-start text-sm-end">Email-2 :</label>
														<div class="col-sm-8">
														<input type="text" class="form-control" name="email2" placeholder="Email Address 2">
														</div>
													</div>
												</div>
                                                <div class="col-md-6">
													<div class="row mb-3">
														<label for="" class="col-sm-4 col-form-label text-start text-sm-end">phone :</label>
														<div class="col-sm-8">
														<input type="text" class="form-control" name="phone" placeholder="Phone Number">
														</div>
													</div>
												</div>
                                                <div class="col-md-6">
													<div class="row mb-3">
														<label for="" class="col-sm-4 col-form-label text-start text-sm-end">Contact :</label>
														<div class="col-sm-8">
														<input type="text" class="form-control" name="contact" placeholder="Contact">
														</div>
													</div>
												</div>
                                                <div class="col-md-6">
													<div class="row mb-3">
														<label for="" class="col-sm-4 col-form-label text-start text-sm-end"> Address 1:</label>
														<div class="col-sm-8">
														<input type="text" class="form-control" name="address1" placeholder="Enter Address 1">
														</div>
													</div>
												</div>
                                                <div class="col-md-6">
													<div class="row mb-3">
														<label for="" class="col-sm-4 col-form-label text-start text-sm-end">Address 2 :</label>
														<div class="col-sm-8">
														<input type="text" class="form-control" name="address2" placeholder="Enter Address 2">
														</div>
													</div>
												</div>
                                                <div class="col-md-6">
													<div class="row mb-3">
														<label for="" class="col-sm-4 col-form-label text-start text-sm-end">Fax :</label>
														<div class="col-sm-8">
														<input type="text" class="form-control" name="fax" placeholder="Fax">
														</div>
													</div>
												</div>
                                                <div class="col-md-6">
													<div class="row mb-3">
														<label for="" class="col-sm-4 col-form-label text-start text-sm-end">City :</label>
														<div class="col-sm-8">
														<input type="text" class="form-control" name="city" placeholder="City">
														</div>
													</div>
												</div>
                                                <div class="col-md-6">
													<div class="row mb-3">
														<label for="" class="col-sm-4 col-form-label text-start text-sm-end">State :</label>
														<div class="col-sm-8">
														<input type="text" class="form-control" name="state" placeholder="State">
														</div>
													</div>
												</div>
                                                <div class="col-md-6">
													<div class="row mb-3">
														<label for="" class="col-sm-4 col-form-label text-start text-sm-end">Zip Code :</label>
														<div class="col-sm-8">
														<input type="text" class="form-control" name="zipcode" placeholder="Zip/postal Code">
														</div>
													</div>
												</div>
                                                <div class="col-md-6">
													<div class="row mb-3">
														<label for="" class="col-sm-4 col-form-label text-start text-sm-end">Country :</label>
														<div class="col-sm-8">
														<input type="text" class="form-control" name="country" placeholder="Enter Country">
														</div>
													</div>
												</div>
                                                <div class="col-md-6">
													<div class="row mb-3">
														<label for="" class="col-sm-4 col-form-label text-start text-sm-end">Privous Balance :</label>
														<div class="col-sm-8">
														<input type="float" class="form-control text-end" name="priviousbal" placeholder="00.0">
														</div>
													</div>
												</div>                                                
												<div class="col-md-6">
													<div class="row mb-3">
														<label for="" class="col-sm-4 col-form-label text-start text-sm-end">Status :</label>
														<div class="col-sm-8 d-flex align-items-center">
															<div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" value="1" name="radio_value" id="inlineRadio1" value="option1">
																<label class="form-check-label" for="inlineRadio1">Active</label>
															</div>
															<div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" value="0" name="radio_value" id="inlineRadio2" value="option2">
																<label class="form-check-label" for="inlineRadio2">Inactive</label>
															</div>
														</div>
													</div>
												</div>												
																
												<div class="hr-dashed"></div>

													<div class="col-md-12">
														<div class="d-grid gap-2 d-md-flex d-sm-flex justify-content-md-end justify-content-sm-end justify-content-lg-end">
															<button style="min-width: 150px;" class="btn btn-danger me-md-2" type="reset">Reset</button>
															<button style="min-width: 150px;" class="btn btn-success" type="submit" name="submit" >Submit</button>
														</div>
												</div>						
											</form>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
		<!-- Loading Scripts -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap-select.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<script src="js/dataTables.bootstrap.min.js"></script>
		<script src="js/Chart.min.js"></script>
		<script src="js/fileinput.js"></script>
		<script src="js/chartData.js"></script>
		<script src="js/main.js"></script>
	</body>
	</html>
