
<?php
	session_start();
	error_reporting(0);
	include('includes/config.php');
	if(strlen($_SESSION['alogin'])==0)
		{
		include_once('./includes/address.php');	
		header('location:index.php');
		}

	else
	{
		if(isset($_REQUEST['del']))
		{
			$did=intval($_GET['del']);
			$sql = "delete from medicine_list WHERE  item_code=:did";
			$query = $dbh->prepare($sql);
			$query-> bindParam(':did',$did, PDO::PARAM_STR);
			$query -> execute();
			$msg="Record deleted Successfully";
			header("refresh:3;customer_list.php");
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
		if(isset($_GET['close'])){    
			$cmpid=$_GET['close'];
			$sts=0;
			$sql ="update customertable set Status=:status where ID=:cusId";
			$query = $dbh->prepare($sql);
			$query-> bindParam(':status',$sts, PDO::PARAM_STR);
			$query-> bindParam(':cusId',$cmpid, PDO::PARAM_STR);
			$query -> execute();
			echo "<script>window.location.href='customer_list.php'</script>";
			}
		if(isset($_GET['active'])){    
			$cmpid=$_GET['active'];
			$sts=1;
			$sql ="update customertable set Status=:status where ID=:cusId";
			$query = $dbh->prepare($sql);
			$query-> bindParam(':status',$sts, PDO::PARAM_STR);
			$query-> bindParam(':cusId',$cmpid, PDO::PARAM_STR);
			$query -> execute();
			echo "<script>window.location.href='customer_list.php'</script>";
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
	
	<title>PMS-Customer List</title>

	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.1.2/typicons.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
	
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
						<div class="card">
							<div  class="card-header">
                                <div class="d-flex justify-content-between align-items-center h-100px">
		  							<div style="font-size: 20px; " class="bg-primary;">
										Add Purchase Information
									</div>
									<div >
                                        <a href="customer_ledger.php" class="btn btn-warning mr-3"><i class="fa fa-info-circle me-3" aria-hidden="true"></i> Purchase List</a>                                              
                                        <!-- <button type="button" class="btn btn-info mr-3" data-toggle="modal" data-target="#exampleModal2"><i class="fas fa-plus mr-2" style="margin-right: 10px;"></i> Add Customer</button>                                               -->
									</div>
								</div>
                            </div>
							<div class="card-body">
                                <a href="download-records.php" style="color:red; font-size:16px;">Download Customer list</a>
								<form action="" id="purchase_form" enctype="" method="post" accept-charset="utf-8">
									<!-- <input type="hidden" name="app_csrf" value="" />             -->
									<div class="form-group row mb-2">
										<label for="manufacturer" class="col-md-2 text-end col-form-label">Manufacturer <i class="text-danger"> * </i>:</label>
										<div class="col-md-4">
											<div class="">
												<select name="manufacturer_id" class="form-control select2" id="manufacturer_id" tabindex="" >
														<option value="" selected="selected">Select Manufacturer</option>
														<option value="1">Beximco</option>
														<option value="2">Square</option>
														<option value="3">Healthcare</option>
														<option value="4">Opsonin</option>
														<option value="5">Beximco</option>
														<option value="6">Healthcare </option>
														<option value="7">opsonin</option>
														<option value="8">Square</option>
														<option value="9">Reneta</option>
														<option value="11">Aristropharma </option>
														<option value="12">Cosmic</option>
														<option value="13">Novartis </option>
														<option value="14">Radiant</option>
														<option value="15">incepta</option>
														<option value="16">Nipro </option>
														<option value="17">Novo</option>
														<option value="18">Jayson</option>
														<option value="19">Gaco</option>
														<option value="20">Eskayef</option>
														<option value="21">ABC</option>
														<option value="22">Searle</option>
												</select>
                        					</div>
                    					</div>
                     						<label for="date" class="col-md-2 text-end col-form-label">Date <i class="text-danger"> * </i>:</label>
                    						<div class="col-md-4">
                        						<div class="">
													<input type="text" name="date" class="form-control p-2 datepicker" id="purdate" placeholder="Date" value="" tabindex="2" >
												</div>
                       
                    						</div>
                					</div>
										<div class="form-group row mb-2">
											<label for="invoice_no" class="col-md-2 text-end col-form-label">Invoice No<i class="text-danger"> * </i>:</label>
											<div class="col-md-4">
												<div class=""> 
													<input type="text" class="form-control p-2 valid_number" name="invoice_no" id="invoice_no" placeholder="Invoice No" value="" tabindex="3">
												</div>
											</div>
											<label for="details" class="col-md-2 text-end col-form-label">Details:</label>
											<div class="col-md-4">
												<div class="">
												
													<input type="text" class="form-control p-2" name="details" id="details" placeholder="Details" value="" tabindex="4">
												</div>
											</div>
										</div>
										<div class="form-group row mb-2">
											<label for="payment_type" class="col-md-2 text-end col-form-label">Payment Type<i class="text-danger"> * </i>:</label>
											<div class="col-md-4">
												<div class="">	
													<select name="payment_type" id="payment_type" onchange="bank_payment(this.value)" class="form-control p-2 select2" tabindex="5" >
														<option value="1" selected="selected">Cash Payment</option>
														<option value="2">Bank Payment</option>
													</select>
												</div>
											</div>
											<label for="bank" class="col-md-2 text-end bank_div col-form-label">Bank:</label>
											<div class="col-md-4 bank_div" id="bank_div">
												<div class="">
													<select name="bank_id" class="form-control p-2 select2" id="bank_id">
														<option value="" selected="selected">Select Bank</option>
														<option value="1">City Bank </option>
														<option value="2">UCB </option>
														<option value="3">DBBL</option>
														<option value="4">Prime Asia</option>
													</select>
												</div>
											</div>
										</div>
                 						<div class="table-responsive pt-2">
                            				<table class="table table-bordered border-muted table-hover" id="purchaseTable">
                                				<thead>
													<tr class="">
														<th class="text-center"><nobr>Medicine Information<i class="text-danger">*</i></nobr></th> 
														<th class="text-center"><nobr>Batch Id<i class="text-danger"></i></nobr></th>
														<th class="text-center"><nobr>Expiry Date<i class="text-danger">*</i></nobr></th>
														<th class="text-center"><nobr>Stock Qty</nobr></th>
														<th class="text-center"><nobr>Box Qty<i class="text-danger">*</i></nobr></th>
														<th class="text-center"><nobr>Quantity <i class="text-danger">*</i></nobr></th>
														<th class="text-center"><nobr>Manufacturer Price<i class="text-danger">*</i></nobr></th>
														<th class="text-center"><nobr>Box MRP <i class="text-danger">*</i></nobr></th>
														<th class="text-center"><nobr>Total Purchase Price</nobr></th>
														<th class="text-center"><nobr>Action</nobr></th>
                                        			</tr>
                                				</thead>
												<tbody id="addPurchaseItem">
													<tr>
														<td class="span3 manufacturer">
															<input type="text" name="product_name" required class="form-control product_name productSelection" onkeypress="product_list_purchase(1);" placeholder="Medicine Name" id="product_name_1" tabindex="6" >
															<input type="hidden" class="autocomplete_hidden_value product_id_1" name="product_id[]" id="SchoolHiddenId"/>
															<input type="hidden" class="sl" value="1">
														</td>
														<td>
															<input type="text" name="batch_id[]" id="batch_id_1" class="form-control text-end"  tabindex="7" placeholder="Batch Id" />
														</td>
														<td>
															<input type="text" name="expeire_date[]" id="expeire_date_1" class="form-control uidatepicker " tabindex="8"    placeholder="Expiry Date" onchange="checkExpiredate(1)" required/>
														</td>
														<td class="wt">
															<input type="text" id="available_quantity_1" class="form-control text-end stock_ctn_1" placeholder="0.00" readonly/>
														</td>
														<td class="text-end">
															<input type="text" name="box_quantity[]" id="box_quantity_1" class="form-control text-end store_cal_1 valid_number" onkeyup="purchase_calculation(1),checkqty(1);" onchange="purchase_calculation(1);" placeholder="0.00" value="" min="0" tabindex="10" required="required"/>
														</td>
													
														<td class="text-end">
															<input type="text" name="product_quantity[]" id="quantity_1" class="form-control text-end store_cal_1" onkeyup="purchase_calculation(1),checkqty(1);" onchange="purchase_calculation(1);" placeholder="0.00" value="" min="0" required="required" readonly="" />
															<input type="hidden" name="unit_qty[]" id="unit_qty_1">
														</td>
														<td class="test">
															<input type="text" name="product_rate[]" onkeyup="purchase_calculation(1),checkqty(1);" onchange="purchase_calculation(1);" id="product_rate_1" class="form-control product_rate_1 text-end valid_number" placeholder="0.00" value="" min="0" tabindex="11" required="required" />
														</td>
														<td>
															<input type="text" class="form-control valid_number" name="mrp[]" id="mrp_1" required tabindex="12" >
														</td>

														<td class="text-end">
															<input class="form-control total_price text-end" type="text" name="total_price[]" id="total_price_1" value="0.00" readonly="readonly" />
														</td>
														<td>
															
														</td>
													</tr>
												</tbody>
												<tfoot>
													<tr>
														<td class="text-end" colspan="8"><b>Sub Total:</b></td>
														<td class="text-end">
															<input type="text" id="sub_total"  class="text-end form-control" name="sub_total" placeholder="0.00" readonly="" />
														</td>
														<td>
															<button id="add_invoice_item" type="button" class="btn btn-info" name="add-invoice-item" onClick="add_purchaseRow('addPurchaseItem')" tabindex="14"><i class="fa fa-plus"></i></button>
														</td>
													</tr>
													<tr>
														<td class="text-end" colspan="8"><b>Vat:</b></td>
														<td class="text-end">
															<input type="text" id="vat" onkeyup="purchase_vatcalculation()" class="text-end form-control valid_number" name="vat" placeholder="0.00" tabindex="15" />
														</td>
														<td>

														</td>
													</tr>
													<tr>
														<td class="text-end" colspan="8"><b>Discount:</b></td>
														<td class="text-end">
															<input type="text" id="discount" onkeyup="disoucnt_calculation()" class="text-end form-control valid_number" name="discount" placeholder="0.00" tabindex="16" />
														</td>
														<td>
															
														</td>
													</tr>
													<tr>
														
														<td class="text-end" colspan="8"><b>Grand Total:</b></td>
														<td class="text-end">
															<input type="text" id="grandTotal" class="text-end form-control" name="grand_total_price" value="0.00" readonly="readonly" />
														</td>
														<td>
													
														</td>
													</tr>
													<tr>
														<td class="text-end" colspan="8"><b>Paid Amount:</b></td>
														<td class="text-end">
															<input type="text" id="paid_amount" class="text-end form-control valid_number" name="paid_amount" onkeyup="paid_calculation()" placeholder="0.00" tabindex="18" />
														</td>
														<td>
													
														</td>
													</tr>
													<tr>
														<td class="text-end" colspan="8"><b>Due Amount:</b></td>
														<td class="text-end">
															<input type="text" id="due_amount" class="text-end form-control" name="due_amount" placeholder="0.00" readonly="readonly" />
														</td>
														<td>
													
														</td>
													</tr>
												</tfoot>
                            				</table>
                        				</div>
               
									<div class="form-group row">
										<div class="col-md-6 text-end">
										</div>
										<div class="col-md-6 text-end">
											<div class="">
												<input type="button" id="full_paid_purchase_tab" class="btn btn-warning" value="Full Paid" tabindex="17" onClick="full_paid_purchase()"/>
												<button type="submit"  class="btn btn-success" tabindex="19" id="save_purchase">
												Save</button>
											</div>
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
	<!-- Modal -->
	<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">																				
		<div class="modal-dialog">
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
	var count = 0;
function add_purchaseRow(click){
				// var id = click
				count = count + 1;
				output = '<tr id="row_'+count+'">';

				output += '<td class="span3 manufacturer">';
				output+='<input type="text" name="product_name" required class="form-control product_name productSelection" onkeypress="product_list_purchase(1);" placeholder="Medicine Name" id="product_name_1" tabindex="6" >';
				output+='<input type="hidden" class="autocomplete_hidden_value product_id_1" name="product_id[]" id="SchoolHiddenId"/>';
				output+='<input type="hidden" class="sl" value="1">';
				output+='</td>';
				output+='<td>    <input type="text" name="batch_id[]" id="batch_id_1" class="form-control text-end"  tabindex="7" placeholder="Batch Id" /></td>';
				output += '<td>  <input type="text" name="expeire_date[]" id="expeire_date_1" class="form-control uidatepicker " tabindex="8"    placeholder="Expiry Date" onchange="checkExpiredate(1)" required/></td>';
				output += '<td class="wt">  <input type="text" id="available_quantity_1" class="form-control text-end stock_ctn_1" placeholder="0.00" readonly/></td>';
				output += '<td class="text-end">';
				output+='<input type="text" name="box_quantity[]" id="box_quantity_1" class="form-control text-end store_cal_1 valid_number" onkeyup="purchase_calculation(1),checkqty(1);" onchange="purchase_calculation(1);" placeholder="0.00" value="" min="0" tabindex="10" required="required"/></td>';
				output += '<td class="text-end">   <input type="text" name="product_quantity[]" id="quantity_1" class="form-control text-end store_cal_1" onkeyup="purchase_calculation(1),checkqty(1);" onchange="purchase_calculation(1);" placeholder="0.00" value="" min="0" required="required" readonly="" />';
				output+='<input type="hidden" name="unit_qty[]" id="unit_qty_1"></td>';
				output += '<td class="test">    <input type="text" name="product_rate[]" onkeyup="purchase_calculation(1),checkqty(1);" onchange="purchase_calculation(1);" id="product_rate_1" class="form-control product_rate_1 text-end valid_number" placeholder="0.00" value="" min="0" tabindex="11" required="required" /></td>';
				output += '<td>    <input type="text" class="form-control valid_number" name="mrp[]" id="mrp_1" required tabindex="12" ></td>';
				output += '<td class="text-end">    <input class="form-control total_price text-end" type="text" name="total_price[]" id="total_price_1" value="0.00" readonly="readonly" /></td>';
				output += '<td>    <button type="button" class="btn btn-danger" tabindex="13" id="'+count+'" onclick="deleteRow(this.id)"><i class="far fa-trash-alt"></i></button></td>';
				output += '</tr>';
				$('#'+click).append(output);
}
function deleteRow(click_id){
	$('#row_'+click_id+'').remove();
}
</script>



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
		<script src="js/query.js"></script>
    
</body>
</html>
<?php } ?>

