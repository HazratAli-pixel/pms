
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
	
	if(isset($_POST['custldinfo']))
	  	{
			$id = $_GET['custId'];
	
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
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>PMS | Company List  </title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.1.2/typicons.min.css" rel="stylesheet">
	<!-- Sandstone Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		
	<!-- Bootstrap Datatables -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">

	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">

</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						
						<!-- Zero Configuration Table -->
						<?php
						$id = $_GET['custId'];
						$sql = "SELECT Name,Address, Phone FROM customertable WHERE ID=:id"; 
						$query = $dbh -> prepare($sql);
						$query->bindParam(':id',$id,PDO::PARAM_STR);
						$query->execute();
						$result2=$query->fetch(PDO::FETCH_OBJ);
						
						?>
						<div class="card">
							<div  class="card-header">
                                <div class="d-flex justify-content-between align-items-center h-100px">
		  							<div style="font-size: 20px; " class="bg-primary;">
										Individual Ledger Information
									</div>
									<div >
                                    <a href="customer_ledger.php" class="btn btn-primary mr-3"><i class="fas fa-list mr-2" style="margin-right: 10px;"></i>ledger list</a>    
									<button type="button" class="btn btn-success mr-3"><i class="fas fa-plus mr-2" style="margin-right: 10px;"></i>Customer ledger</button>                                              
									</div>
								</div>
                            </div>
							<div class="card-body">
                                <a href="#" style="color:red; font-size:16px;">Download ledger info</a>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0">
								<?php
									$id = $_GET['custId'];
									$sql = "SELECT Name,Address, Phone FROM customertable WHERE ID=:id"; 
									$query = $dbh -> prepare($sql);
									$query->bindParam(':id',$id,PDO::PARAM_STR);
									$query->execute();
									$result2=$query->fetch(PDO::FETCH_OBJ);
									
									?>
									<div class="row">
										<div class="col-12  d-flex">
											<div class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-1">
												<h5 class="">Name : </h5> 
												<h5 class="">Phone : </h5> 
												<h5 class="">Address : </h5> 
											</div>
											<div class="col-6">
												<h5 class=""><?php echo htmlentities($result2->Name);?></h5> 
												<h5 class=""><?php echo htmlentities($result2->Phone);?></h5> 
												<h5 class=""><?php echo htmlentities($result2->Address);?></h5> 
											</div>											
										</div>
									</div>
									<thead class="bg-info">
										<tr class="text-end">
										    <th>#</th>
                                            <th>Date</th>
											<th>Debit</th>
											<th>Pre Due</th>
											<th>Total</th>
											<th>Credit</th>
											<th>New Due</th>
											<th class="text-center">Invoice ID</th>
										</tr>
									</thead>
									
									<tbody>

                                        <?php 
                                        $cnt=1;
										$id = $_GET['custId'];
										$sql = "SELECT * from customerledger WHERE CustomerID=:id";
										$query = $dbh -> prepare($sql);
										$query->bindParam(':id',$id,PDO::PARAM_STR);
										$query->execute(); 
										$results=$query->fetchAll(PDO::FETCH_OBJ);
                                        if($query->rowCount() > 0)
                                        {
											foreach($results as $result)
											{				?>	
											<tr class="text-end">
												<td class="bg-info"><?php echo htmlentities($cnt);?></td>
												<td style="background-color: rgb(189, 242, 237);"><?php echo $result->Date;?></td>
												<td style="background-color: rgb(189, 242, 237);"><?php echo htmlentities($result->Debit);?></td>
												<td style="background-color: rgb(189, 242, 237);"><?php echo htmlentities($result->PreDue);?></td>
												<td style="background-color: rgb(189, 242, 237);"><?php echo htmlentities($result->Total);?></td>
												<td style="background-color: rgb(189, 242, 212);"><?php echo htmlentities($result->Credit);?></td>
												<td style="background-color: rgb(242, 189, 236);"><?php echo htmlentities($result->NewDue);?></td>
												<td style="background-color: rgb(189, 242, 237);" class="text-center"><p class="btn" id="invoice-<?php echo htmlentities($result->InvoiceId);?>"><i class="fa fa-info-circle" aria-hidden="true"></i></p></td>
												
											</tr>
										<?php $cnt=$cnt+1; }?>
										<tr>
											
											<!-- <td class="text-end text-lg bg-black text-white fw-bold" ><br></td> -->
											<td class="text-end text-lg bg-black text-white fw-bold" colspan='6'>Total Due Amount :</td>
											<td class="text-end text-lg bg-black text-white fw-bold"><?php echo htmlentities($result->NewDue);?></td>
											<!-- <td><?php echo htmlentities($result->InvoiceId);?></td>
											<td><?php echo $result->Date;?></td> -->
										</tr>
										<?php
									} ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>		
	</div>
	<!-- Modal -->
	<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">																				
		<div class="modal-dialog modal-dialog-centered modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Customer Information</h5>
					<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body" id="mbody2">
					<div class="card-body">
						<form method="post" class="row">
						<div class="">
							<div class="row mb-3">
								<label for="" class="col-sm-3 col-form-label text-start text-sm-end">Name : </label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="c_name" placeholder="customer name">
								</div>
							</div>
							<div class="row mb-3">
								<label for="" class="col-sm-3 col-form-label text-start text-sm-end">Phone : </label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="c_phone" placeholder="phone number">
								</div>
							</div>
							<div class="row mb-3">
								<label for="" class="col-sm-3 col-form-label text-start text-sm-end">Address : </label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="c_address" placeholder="address">
								</div>
							</div>
							
						</div>																
						<div class="">
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
								<button style="min-width: 150px;" class="btn btn-success" onclick="customer_add()" name="submit" >Submit</button>
							</div>
						</div>					
						</form>	
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


	<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap-select.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
		<script src="js/Chart.min.js"></script>
		<script src="js/fileinput.js"></script>
		<script src="js/chartData.js"></script>
		<script src="js/main.js"></script>
    
</body>
</html>

