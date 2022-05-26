
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
		
		<title>PMS| Message</title>
	
	<!-- Font awesome -->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
		<!-- Sandstone Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<!-- Bootstrap Datatables -->
		<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
		
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<style>
.footer {
   position: fixed;
   margin: 0 auto;
   bottom: 0;
   width: 85%;
   background-color: white ;
   color: black;
   z-index: 3;
}
.dataTables_filter {
display: none;
}



</style>


	</head>
	
	<body>

		<?php include('includes/header.php');?>
		<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
			<div class="content-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div  class="col-md-12">	
							<div class="row">
								
								<div class="col-md-12 m-1 p-0">
									<div class="card" style="width: 100%; margin-top:-10px">
										<div class="card-header d-flex justify-content-between align-items-center h-100px">
		  									<div style="font-size: 20px; " class="bg-primary;">
												Sells table
											</div>
											<div >
												<a id="ClearCard" href="#"><button type="button" class="btn btn-info"><i style='color: red;' class='far fa-trash-alt me-2' aria-hidden='true'></i> Clear Card</button></a>
												
											</div>
										</div>
										<div class="card-body m-1 p-1" >
											<div class="col-12 d-flex flex-column flex-sm-column flex-md-column flex-lg-row flex-xl-row">
												<!-- button -->
												<?php $sql = "SELECT * from  medicine_category ";
												$query = $dbh -> prepare($sql);
												$query->execute();
												$results=$query->fetchAll(PDO::FETCH_OBJ);
												$cnt=1;
												?>

												<div class="" style="width: 10%;">
													<div class="d-flex flex-row flex-wrap flex-sm-row flex-md-column flex-lg-column px-1 py-1">
														<button class="btn btn-md btn-success" style="margin: 5px;">All</button>
														<?php 
														if($query->rowCount() > 0)
														{
														foreach($results as $result)
														{
															if($result->MedicineCategoryStatus ==1)
															{?>
																<button class="btn btn-md btn-success" style="margin: 5px;"><?php echo $result->MedicineCategory?></button>
															<?php }
														}
														}?>
													</div>
												</div>
												
												
												<!-- button -->

												<!-- Medicine display -->
												<div class="" style="width: 30%;" >
													<div class="row p-2">
														<div class="col-12">
															<div class="row px-2 d-flex flex-column flex-sm-row flex-md-row justify-content-between">
																<div class="col-md-5 ">
																<input class="form-control" onkeyup="myCompany()" id="company" type="search" placeholder="Search Company">
																</div>
																<div class="col-md-5 ">
																	<?php 
																	$companyname ="SELECT * from medicine_list";
																	$cquery = $dbh -> prepare($companyname);
																	$cquery->bindParam(':barcode',$id,PDO::PARAM_STR);
																	$cquery->execute();
																	$results=$cquery->fetchAll(PDO::FETCH_OBJ);							   
																	?>
																	<input name="companyname" class="form-control" list="datalistOptions" onkeyup="myFunction()" id="myInput" placeholder="Search Medicine">
																	<datalist id="datalistOptions" required>
																		<?php foreach($results as $result){
																			if($result->status==1){
																			?>																
																			<option value="<?php echo htmlentities($result->medicine_name);?>">
																		<?php } 
																		}?>
																	</datalist>
																</div>
															</div>
															<div class="row  p-2">
																<div class="col-12">
																	<table id="zctb" class="display ali table table-striped table-bordered table-hover" cellspacing="0" width="100%">
																	<thead>
																	<tr>
																		<th style="width: 10%;" class = "text-center">SL</th>
																		<th style="width: 40%;" >Medicine Name</th>
																		<th style="width: 25%;" class = "text-center">Company</th>			
																		<th style="width: 15%;" class = "text-center" style="text-align: center;" >action </th>
																	</tr>
																</thead>
																
																<tbody id="myTable">

																	<?php $sql = "SELECT * from  medicine_list ORDER BY medicine_name ASC ";
																	$query = $dbh -> prepare($sql);
																	$query->execute();
																	$results=$query->fetchAll(PDO::FETCH_OBJ);
																	$cnt=1;
																	if($query->rowCount() > 0)
																	{
																	foreach($results as $result)
																	{ if($result->status ==1){			?>	
																	<tr class="header">
																		<td class="text-center"><?php echo htmlentities($cnt);?></td>
																		<td><?php echo htmlentities($result->medicine_name);?>  
																		<input type="hidden" name= "MedicineName" value="<?php echo htmlentities($result->medicine_name);?>">
																		</td>
																		<td class="text-center"><?php echo htmlentities($result->menufacturer);?>  
																		<input type="hidden" name= "MedicineName" value="<?php echo htmlentities($result->menufacturer);?>">
																		</td>
																			
																		<td style="text-align: center; ">
																			<input style="width: 40px;" id="<?php echo htmlentities($result->item_code);?>" onClick="reply_click(this.id)" class="btn btn-sm btn-primary" value="add">
																			<input id="BtnNo" class="btn btn-sm btn-primary" type="hidden" value="<?php echo htmlentities($cnt);?>">
																		</td>
																	</tr>
																	<?php $cnt=$cnt+1; }
																	}
																} ?>
																	
																</tbody>
															</table>

																</div>
															</div>
														</div>
													</div>
												</div>
												<!-- Medicine display end -->
												
												<!-- Invoice Card -->
												<div  class="" style="width: 60%;">
													<div class="p-2">
														<div class="col-md-12">
															<div class="row d-flex justify-content-between">
																<div class="col-md-5 ">
																<input class="form-control" id="AddItemById" type="search" placeholder="Bar Code / Item Code">
																</div>
																<div class="col-md-5 ">
																	<?php 
																	$cname="SELECT * from customertable";
																	$cquery = $dbh -> prepare($cname);
																	$cquery->bindParam(':barcode',$id,PDO::PARAM_STR);
																	$cquery->execute();
																	$results=$cquery->fetchAll(PDO::FETCH_OBJ);							   
																	?>
																	<input name="companyname" class="form-control" list="datalistOptionss" id="exampleDataListf"  placeholder="Walking customer">
																	<datalist id="datalistOptionss" required>
																		<option value="Walking Customer">
																		<?php foreach($results as $result){
																			
																			if($result->Status==1){
																			?>																
																			<option value="<?php echo htmlentities($result->Name);?>">
																		<?php } 
																		}?>
																	</datalist>
																</div>
															</div>
															<div class="row p-2">
																<table id="" class="col-12 col-md-12 display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
																	<thead>
																		<tr>						
																			<th style="text-align: center; width:20%">Name </th>
																			<th style="text-align: center;width:13%" >Batch </th>
																			<th style="text-align: center; width:14%" >Ex-Date </th>
																			<th style="text-align: center; width:10%" >Quantity </th>
																			<th style="text-align: center; width:10%" >price </th>
																			<th style="text-align: center; width:10%" >Total </th>
																			<th style="text-align: center; width:13%" >Action</th>
																			
																		</tr>
																	</thead>
																		
																	<tbody id="DisplayData">
																		<?php
																		if(isset($_SESSION['items']))
																		{
																			foreach($_SESSION['items'] as $key => $value){
																				$Itotal = $value['SellQty']*$value['Price'];
																				echo "<tr>						
																						<td class='text-center'>$value[ProductName]</td>
																						<td class='text-center'>$value[Batch] </td>
																						<td class='text-center'>$value[Exdate]</td>
																						<td class='text-center'><input type='number' class='qty' id='$value[ItemId]' onChange='changeQty(this.id,this.value)' value='$value[SellQty]' min='1' max='120'>
																																												
																						</td>
																						<td class='iprice text-center'>$value[Price] <input type='hidden'  id='$value[Price]'  min='1' max='120'></td>
																						<td class='itotal text-center'>$Itotal</td>
																						<td class='text-center'>
																						<button class='btn btn-outline-none tprice' onClick='remove_item(this.id)' id='$value[ItemId]'><i style='color: red;' class='far fa-trash-alt' aria-hidden='true'></i></button>
																						<button class='btn btn-outline-none'  data-toggle='modal' data-target='#exampleModal' onClick='show_item(this.id)' id='$value[ItemId]'><i style='color: red;' class='far fa-eye' aria-hidden='true'></i></button>
																						</td>
																					</tr>";
																			}
																		}
																		?>
																	<!-- <tr>						
																			<td style="text-align: center; width:30%" >Name </td>
																			<td style="text-align: center; width:13%" >Batch </td>
																			<td style="text-align: center; width:14%" >Ex-Date </td>
																			<td style="text-align: center; width:10%" >Quantity </td>
																			<td style="text-align: center; width:10%" >price </td>
																			<td style="text-align: center; width:10%" >Total </td>
																			<td style="text-align: center; width:13%" >Action</td>
																			
																		</tr> -->
																	</tbody>
																</table>
															
																<div class="row">
																	<div class="col-12">
																		<div class="row mb-2">
																			<label  for="" style="font-weight: bold;" class="col-8 col-form-label text-end text-sm-end">Inoice Discount %: </label>
																			<div class="col-3">
																			<input id="ivoicediscount" onblur="InvoiceDiscount()" type="text" class="form-control text-end" value="" placeholder="0.00">
																			</div>
																		</div>
																		<div class="row mb-2">
																			<label for="" style="font-weight: bold;" class="col-8 col-form-label text-end text-sm-end">Total Discount : </label>
																			<div class="col-3">
																			<input id="totaldiscount" name="totaldiscount" type="text" disabled class="form-control text-end" value="" placeholder="0.00">
																			</div>
																		</div>
																		<div class="row mb-2">
																			<label for="" style="font-weight: bold;" class="col-8 col-form-label text-end text-sm-end">Total Vat : </label>
																			<div class="col-3">
																			<input type="text" id="vat" disabled class="form-control text-end" name="" value="" placeholder="0.00">
																			</div>
																		</div>
																		<div class="row mb-2">
																			<label for="" style="font-weight: bold;" class="col-8 col-form-label text-end text-sm-end">Grand Total : </label>
																			<div class="col-3">
																			<input name="grandtotal" id="Total" type="text" style="font-weight: bold; font-size:15px" disabled class="form-control text-end" name="mobile" value="" placeholder="0.00">
																			</div>
																		</div>
																		<div class="row mb-2">
																			<label for="" style="font-weight: bold;" class="col-8 col-form-label text-end text-sm-end">Privious Due : </label>
																			<div class="col-3">
																			<input onchange="FullPayment()" type="text" name="previousdue" id="previousdue" class="form-control text-end"  value="" placeholder="0.00">
																			</div>
																		</div>
																		<div class="row mb-2">
																			<label for="" style="font-weight: bold;" class="col-8 col-form-label text-end text-sm-end">Change Amount : </label>
																			<div class="col-3">
																			<input id="changeamount" type="text" disabled class="form-control text-end" name="" value="" placeholder="0.00">
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<!-- Invoice Card end -->
											</div>
											<!-- footer  -->
											<div class="footer">
												<div class="d-flex flex-wrap justify-content-between p-2">
														
													<div class="">
														<label class="ms-2" style="font-size: 18px;" for="">Paid Amount</label>
														<input onchange="PaidAmount()" id="paidamount" name="paidamount" class="ms-2 outline-primary text-end" style="font-size: 18px;width: 80px;"type="float" placeholder="0.00">
														<label  class="ms-2" style="font-size: 18px;" for="">Due Amount</label>
														<!-- <input onblur="PaidAmount()" id="paidamount" class="ms-2 outline-primary text-end" style="font-size: 18px;width: 80px;"type="float" placeholder="0.00"> -->
														<label id="duelbl" name="dueamount" class="ms-2" style="font-size: 18px;" for="">0.00</label>
													</div>
													<div>
														<button id="fullPaidbtn" onclick="FullPayment()" class="me-2 btn btn-md btn-warning align-items-center" >Full Paid</button>
														<button onclick="OrderConfirm()" class="me-2 btn btn-md btn-primary align-items-center" for="">Cash Payment</button> <!-- onclick="OrderConfirm()" -->
														<label class="me-3 btn btn-md btn-info align-items-center" for="">Bank Payment</label>
													</div>
													
												</div>

											</div>
											
											<!-- footer part end -->
										</div>
										<!-- body end -->
									</div>
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>

			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Medicne Information</h5>
					<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					Napa
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
				</div>
			</div>
			</div>



		<script>
		let Iprice = document.getElementsByClassName('iprice');
		let Iquantity = document.getElementsByClassName('qty');
		
		
		function subTotal(){
			let Itotal = document.getElementsByClassName('itotal');
			let gtotal = document.getElementById('Total');
			var Gtotal=0;
			for (i=0; i<Itotal.length; i++){
				Gtotal= Gtotal+Number(Itotal[i].innerText);

			}
			gtotal.value=Gtotal;
		
		} 

		function InvoiceDiscount() {
			let getdis =document.getElementById('ivoicediscount').value;
			let totaldis = document.getElementById('totaldiscount');
			let gtotal = document.getElementById('Total');
			subTotal();
			if(getdis.length<=0){
				//PaidAmount();
				totaldis.value="0.00";
			}else{
			Totaldiscount =((Number(getdis)*Number(gtotal.value))/100);
			totaldis.value=Totaldiscount.toFixed(2);
			gtotal.value=Number((gtotal.value)-Totaldiscount).toFixed(2);
			FullPayment();
			}
		}
		function PaidAmount() {
			let gtotal = Number(document.getElementById('Total').value);
			let changeamount = document.getElementById('changeamount');
			let paidamount = document.getElementById('paidamount');
			let Duelabel = document.getElementById('duelbl');
			let predue = Number(document.getElementById('previousdue').value);
			if(Number(paidamount.value)<=0){
				InvoiceDiscount()
				changeamount.value="0.00";
			}
			else{
				gtotal = Number((gtotal+predue)-Number(paidamount.value)).toFixed(2);
				if(Number(gtotal)<=0){
					changeamount.value=gtotal;
					Duelabel.innerHTML="0.00";
				}
				else{
					Duelabel.innerHTML=gtotal;
					changeamount.value="0.00";
				}
			
			}
		}
		function FullPayment() {
			var gtotal = Number(document.getElementById('Total').value);
			var due_amount = Number(document.getElementById('previousdue').value);
			gtotal = gtotal + due_amount;
			let paidamount = document.getElementById('paidamount');
			// PaidAmount() ;
			// console.log(gtotal);
			// let fullPaidbtn = document.getElementById('fullPaidbtn');
			// if(gtotal.length<=0){
			// 	fullPaidbtn.attr("disabled",true);
			// }else{
			// fullPaidbtn.attr("disabled",true);
			paidamount.value=gtotal;
			PaidAmount();
			//}
		}

		$(document).ready(() =>{
		$("#AddItemById").blur(() =>{
			var InputValue = $("#AddItemById").val();
			if (InputValue.length >= 1) {
				reply_click(InputValue);
			} 
			
			});
		});
		// FullPayment();
		subTotal();

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