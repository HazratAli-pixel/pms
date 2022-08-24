
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
	if(isset($_REQUEST['del']))
	{
		$did=intval($_GET['del']);
		$sql = "delete from medicine_list WHERE  item_code=:did";
		$query = $dbh->prepare($sql);
		$query-> bindParam(':did',$did, PDO::PARAM_STR);
		$query -> execute();
		$msg="Record deleted Successfully";
        header("refresh:3;medicine_list.php");
	}
	if(isset($_POST['submit']))
	{
			
			$c_name=$_POST['c_name'];
			$c_phone=$_POST['c_phone'];
			$c_address=$_POST['c_address'];
			$status=$_POST['radio_value'];
			
			$sql="INSERT INTO customertable (Name, Phone,Address,Status) 
			VALUES(:c_name,:c_phone,:c_address,:radio_value)";
			$query = $dbh->prepare($sql);
			$query->bindParam(':c_name',$c_name,PDO::PARAM_STR);
			$query->bindParam(':c_phone',$c_phone,PDO::PARAM_STR);
			$query->bindParam(':c_address',$c_address,PDO::PARAM_STR);
			$query->bindParam(':radio_value',$status,PDO::PARAM_STR);
			$query->execute();
			$lastInsertId = $dbh->lastInsertId();
			
		}
		if(isset($_POST['paydue']))
		{
			
			$cusId=$_POST['cusID2'];
			$cusName=$_POST['cusName2'];
			$preDue=$_POST['preDue'];
			$newDue=$_POST['newDue'];
			$paidAmount=$_POST['paidAmount'];
			$comments=$_POST['comments'];
			$switch=$_POST['switch'];
			$cusPhone2=$_POST['cusPhone2'];
			$userid = $_SESSION['alogin'];
			$sql="INSERT INTO customerledger (AdminID,CustomerID,PreDue,Credit,Comments) 
			VALUES(:userid,:cusId,:preDue,:paidAmount,:comments)";

			$query = $dbh->prepare($sql);
			$query->bindParam(':userid',$userid,PDO::PARAM_STR);
			$query->bindParam(':cusId',$cusId,PDO::PARAM_STR);
			$query->bindParam(':preDue',$preDue,PDO::PARAM_STR);
			$query->bindParam(':paidAmount',$paidAmount,PDO::PARAM_STR);
			$query->bindParam(':comments',$comments,PDO::PARAM_STR);
			$query->execute();
			$lastInsertId = $dbh->lastInsertId();
			date_default_timezone_set('Asia/Dhaka');
			$date = date('d/m/Y H:i');
			
			// $mssg = "Money recived. Amount tk:".urlencode($paidAmount)." TrxID: ".urlencode($lastInsertId)." Due amount : ".urlencode($newDue)."tk ".date('y/m/d')."-".date("h:i:s A").". Raha Phamacy";
			$mssg = "Money recived. Amount tk:".$paidAmount." TrxID: ".$lastInsertId." Due amount : ".$newDue."tk ".$date.". Raha Phamacy";

			if($switch==1){
				// $mssg = $_POST["message"];
				$url = "http://gsms.putulhost.com/smsapi";
				$data = [
				"api_key" => "C200114562795a9fbdc4e5.87112767",
				"type" => "text",
				"contacts" => "$cusPhone2",
				"senderid" => "8809601001536",
				"msg" => "$mssg"
			];
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			$response = curl_exec($ch);
			curl_close($ch);
			//return $response;
			echo "<script>window.location.href='customer_ledger.php'</script>";
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
	
	<title>PMS-Purchase invoice List </title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.1.2/typicons.min.css" rel="stylesheet">
	<!-- Sandstone Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
	<link rel="stylesheet" href="css/style.css">

	<script src="https://kit.fontawesome.com/b6e439dc17.js" crossorigin="anonymous"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.1.2/typicons.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		

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
						<div class="card">
							<div  class="card-header">
                                <div class="d-flex justify-content-between align-items-center h-100px">
		  							<div style="font-size: 20px; " class="bg-primary;">
										Purchase Invoice Information
									</div>
									<div >
										<a href="add_purchase.php" class="btn btn-info"> <i class="fas fa-align-justify mr-2"></i> Add Purchase List</a>
										<a href="#" class="btn btn-info"> <i class="fa fa-credit-card" aria-hidden="true"></i> Pay Dues</a>
                                        <!-- <button type="button" class="btn btn-info mr-3" data-toggle="modal" data-target="#exampleModal2"><i class="fa fa-credit-card" aria-hidden="true"></i> Pay Due</button> -->
                                        
									</div>
								</div>
                            </div>
							<div class="card-body">
                                <a href="download-records.php" style="color:red; font-size:16px;">Download Purchase list</a>
								<div class="row ">
									<div class="col-12 col-md-12 col-lg-12 col-xl-12 d-flex row flex-sm-column table-responsive">
								
										<table id="zctb" class="display table table-striped table-bordered table-hover" >
											<thead class="bg-style">
												<tr>
													<th>#</th>
													<th>Name</th>
													<th class="">PID</th>
													<th class="">Batch</th>
													<th class="">Eday</th>
													<th class="">Qty</th>
													<th class="">MPrice</th>
													<th class="">MRP</th>
													<th class="text-center">Action</th>
												</tr>
											</thead>
											<tbody>

												<?php 
												$sql = "SELECT purchaseslist.BatchId,purchaseslist.ProductId,purchaseslist.Qty,purchaseslist.Mprice,purchaseslist.MRP,purchaseslist.date,purchaseslist.Status,
												medicine_list.medicine_name from purchaseslist LEFT JOIN medicine_list ON purchaseslist.ProductId = medicine_list.item_code 
												ORDER BY purchaseslist.Status ASC";
												$query = $dbh -> prepare($sql);
												$query->execute();
												$results=$query->fetchAll(PDO::FETCH_OBJ);
												$cnt=1;
												if($query->rowCount() > 0)
												{
												foreach($results as $result)
												{				?>	
												<tr id="row-<?php echo $cnt;?>">
													<td><?php echo htmlentities($cnt);?></td>
													<td id="name-<?php echo htmlentities($result->BatchId);?>" ><?php echo htmlentities($result->medicine_name);?>
														<p hidden><?php echo htmlentities($result->BatchId);?></p>
													</td>
													<td class="text-end" id="productID-<?php echo htmlentities($result->BatchId);?>" ><?php echo $result->ProductId;?></td>													
													<td class="text-end" id="Batch-<?php echo htmlentities($result->BatchId);?>" ><?php echo $result->BatchId;?></td>
													<td class="text-end" id="date-<?php echo htmlentities($result->BatchId);?>" ><?php echo $result->date;?></td>
													<td class="text-end" id="Qty-<?php echo htmlentities($result->BatchId);?>" ><?php echo $result->Qty;?></td>
													<td class="text-end" id="Mprice-<?php echo htmlentities($result->BatchId);?>" ><?php echo $result->Mprice;?></td>
													<td class="text-center" id="MRP-<?php echo htmlentities($result->BatchId);?>" ><?php echo $result->MRP;?></td>
													<td class="text-center">
													<?php 
														if($result->Status==1){
															?>
															<button disabled type="button" class="btn btn-success">Added</button>
															<?php
														}
														else { ?>
															<button id="<?php echo htmlentities($result->BatchId);?>" type="button" onclick="StatusCng(event)" class="btn btn-warning">add</button>
															<?php
														}
														
														?>
													</td>
												</tr>
												<?php $cnt=$cnt+1; }} ?>
											</tbody>
										</table>
									</div>
									<!-- <div class="col-12 col-md-4 col-lg-4 col-xl-3 right-side rounded p-2 h-75">
											<div class="info text-center pt-2">
												<h4 >Indivisual Invoice Details </h4>
												<h4 name="cusName" id="cusName">Name</h4>
												<div class="d-flex justify-content-center">
													<p id="date">D: </p>
													<p id="invoids" class="ps-3"> Invoice ID</p>
												</div>
												
											</div>
											<hr>
											
											<div class="col-12 d-flex flex-column justify-content-end">
												<table class="display table table-striped table-bordered border border-dark table-hover">
													<thead class="bg-style">
														<tr>
															<th>SN</th>
															<th>Name</th>
															<th>Batch</th>
															<th>Qty</th>
															<th>Price</th>
															<th>Sell</th>
														</tr>
													</thead>
													<tbody id="invoice_details">
													</tbody>
													<tfoot>
														<tr>
															<td class="text-end" colspan="5">Total</td>
															<td id="invo1" class="text-end" >0.00</td>
														</tr>
														<tr>
															<td class="text-end" colspan="5">Vat</td>
															<td id="invo2" class="text-end" >0.00</td>
														</tr>
														<tr>
															<td class="text-end" colspan="5">Discount</td>
															<td id="invo3" class="text-end" >0.00</td>
														</tr>
														<tr>
															<td class="text-end" colspan="5">Grand Total</td>
															<td id="invo4" class="text-end" >0.00</td>
														</tr>
														<tr>
															<td class="text-end" colspan="5">Paid Amount</td>
															<td id="invo5" class="text-end" >0.00</td>
														</tr>
														<tr>
															<td class="text-end bg-info" colspan="5">Due Amount</td>
															<td id="invo6" class="text-end" >0.00</td>
														</tr>
													</tfoot>
												</table>
											</div>
									</div> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>		
	</div>
	<!-- Modal -->
	<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">																				
		<!-- <div class="modal-dialog modal-dialog-centered modal-xl"> -->
		<div class="modal-dialog modal-dialog-centered">
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
	<script>
		const StatusCng = (event)=>{
			let clickedId = event.target.id
			// event.target.classList.add('bg-success');
			// event.target.setAttribute('disabled', true);
			// event.target.innerText="Added";
			let ProductId2 = document.getElementById("productID-"+clickedId).innerHTML;
			let Pdate = document.getElementById("date-"+clickedId).innerHTML
			let PQty = document.getElementById("Qty-"+clickedId).innerHTML
			let PMprice = document.getElementById("Mprice-"+clickedId).innerHTML
			let PMRP = document.getElementById("MRP-"+clickedId).innerHTML
			const xmlhttp = new XMLHttpRequest();
			// alert(ProductId);
			xmlhttp.onreadystatechange = function () {
				if (this.readyState == 4 && this.status == 200) {
					event.target.classList.add('bg-success');
					event.target.setAttribute('disabled', true);
					event.target.innerText="Added";
					swal({
						title: 'Stock Medicine',
						text: this.responseText,
						icon: 'success',
						dangerMode: true,
					});
				}
			};
			xmlhttp.open('GET', `query2.php?StockManagment=${clickedId}&date=${Pdate}&Qty=${PQty}&Mprice=${PMprice}&MRP=${PMRP}&productid=${ProductId2}`, true);
			xmlhttp.send();

		}
	</script>


	<!-- Loading Scripts -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

		<script src="./js/sweetalert.js"></script>
		<script src="./js/query.js"></script>
		<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
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

<?php } ?>