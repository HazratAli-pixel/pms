<?php

	use Dflydev\DotAccessData\Data;

	use function Symfony\Component\VarDumper\Dumper\esc;

	session_start();
	error_reporting(0);
	include('includes/config.php');
	if(isset($_GET['userid']))
		{
        $username = $userid=($_GET['userid']);
		$sql ="SELECT UserName, UserId FROM admin WHERE UserName=:username or UserId=:userid";
		$query= $dbh -> prepare($sql);
		$query-> bindParam(':username', $username, PDO::PARAM_STR);
		$query-> bindParam(':userid', $userid, PDO::PARAM_STR);
		$query-> execute();
		$results = $query -> fetchAll(PDO::FETCH_OBJ);
		if($query -> rowCount() > 0)
			{
                echo 1;
			}
		else {
			echo 0;	
		}
	}
	if(isset($_GET['ItemId'])){
		$ItemId=$_GET['ItemId'];
		$sql = "SELECT medicine_list.medicine_name, medicine_list.status, stocktable.BatchNumber, stocktable.InQty, stocktable.OutQty, stocktable.PurPrice, 
		stocktable.SellPrice, stocktable.SellBoxPrice,stocktable.Date, stocktable.Status  FROM medicine_list INNER JOIN stocktable ON
		medicine_list.item_code = stocktable.Item_code WHERE stocktable.Item_code=:ItemId";
		$query= $dbh -> prepare($sql);
		$query-> bindParam(':ItemId', $ItemId, PDO::PARAM_STR);
		$query-> execute();
		$result = $query -> fetch(PDO::FETCH_OBJ);
	
		if($query -> rowCount() > 0)
			{
                if(isset($_SESSION['items'])){
					$SelectedItems = array_column($_SESSION['items'],'ItemId');
					if(in_array($_GET['ItemId'],$SelectedItems)){
						echo 1;
					}
					else{
						$count = count($_SESSION['items']);
						$qty=1;
						$_SESSION['items'][$count] = array('ItemId'=>$ItemId,'ProductName'=>$result->medicine_name, 'SellQty'=>$qty,'Batch'=>$result->BatchNumber,'Exdate'=>$result->Date, 'InQty'=>$result->InQty,
						'OutQty'=>$result->OutQty, 'Price'=>$result->SellPrice, 'PursingPrice'=>$result->PurPrice,'Mstatus'=>$result->status,'SStatus'=>$result->Status);
					}
					
				}
				else{
					$qty=1;
					$_SESSION['items'][0]=array('ItemId'=>$ItemId,'ProductName'=>$result->medicine_name, 'SellQty'=>$qty,'Batch'=>$result->BatchNumber,'Exdate'=>$result->Date, 'InQty'=>$result->InQty,
					'OutQty'=>$result->OutQty, 'Price'=>$result->SellPrice, 'PursingPrice'=>$result->PurPrice,'Mstatus'=>$result->status,'SStatus'=>$result->Status);
				}
				
			}
			else {
				echo 5;
		}
	}
	if(isset($_GET['DataShow'])){
		if(isset($_SESSION['items'])){
			foreach($_SESSION['items'] as $key => $value){
				$Itotal = $value['SellQty']* $value['Price'];
				$Data.="<tr>						
							<td class='text-center'>$value[ProductName]</td>
							<td class='text-center'>$value[Batch] </td>
							<td class='text-center'>$value[Exdate]</td>
							<td class='text-center'><input type='number' class='qty' id='$value[ItemId]' onChange='changeQty(this.id,this.value)' value='$value[SellQty]' min='1' max='120'>
																													
							</td>
							<td class='iprice text-center'>$value[Price] <input type='hidden'  id='$value[Price]'  min='1' max='120'></td>
							<td class='itotal text-center'>$Itotal</td>
							<td class='text-center'>
							<button class='btn btn-outline-none tprice' onClick='remove_item(this.id)' id='$value[ItemId]'><i style='color: red;' class='far fa-trash-alt' aria-hidden='true'></i></button>
							<button class='btn btn-outline-none' onClick='show_item(this.id)' id='$value[ItemId]'><i style='color: red;' class='far fa-eye' aria-hidden='true'></i></button>
							</td>
							
							
						</tr>";
				}
			echo $Data;
		}
	}
	if(isset($_GET['showinfo'])){
		$value = $_GET['showinfo'];
		$sql = "SELECT medicine_list.medicine_name, medicine_list.status, stocktable.BatchNumber, stocktable.InQty, stocktable.OutQty, stocktable.PurPrice, 
		stocktable.SellPrice, stocktable.SellBoxPrice,stocktable.Date, stocktable.Status  FROM medicine_list INNER JOIN stocktable ON
		medicine_list.item_code = stocktable.Item_code WHERE stocktable.Item_code=:ItemId";
		$query = $dbh -> prepare($sql);
		$query-> bindParam(':ItemId', $value, PDO::PARAM_STR);
		$query->execute();
		$results=$query->fetchAll(PDO::FETCH_OBJ);
		$cnt=1;
			foreach($results as $result){
				$name = $result->medicine_name;
				$inqty = $result->InQty;
				$outqty = $result->OutQty;
				$inStock = $inqty-$outqty;
			}
			$inStock = $inqty-$outqty;
			$Data2="<p style='margin-bottom 0.2px;'>Name : $name</p><p> Product Buy : $inqty</p><p>Product Sale : $outqty</p><p>In Stock : $inStock</p>";
			echo $Data2;

	}


	if(isset($_GET['RemoveItem'])){
		if(isset($_SESSION['items'])){
			foreach($_SESSION['items'] as $key => $value){
				if($value['ItemId'] == $_GET['RemoveItem']){
					unset ($_SESSION['items'][$key]);
					$_SESSION['items']= array_values($_SESSION['items']);
					echo 5;
				}
			}
		}
	}
	if(isset($_GET['UpItem'])){
		if(isset($_SESSION['items'])){
			foreach($_SESSION['items'] as $key => $value){
				if($value['ItemId'] == $_GET['UpItem']){
					$_SESSION['items'][$key]['SellQty'] = $_GET['itemvalue'];
					
				}
			}
		}
	}


	if(isset($_GET['ClearCard'])){
		if(isset($_SESSION['items'])){
			unset ($_SESSION['items']);	
		}
	}


	if(isset($_GET['ordersubmit'])){
		if(isset($_SESSION['items'])){

			$userid = $_SESSION['alogin'];
			
			$customerid =rand(50,500000);      //$_GET['customerid'];
			$totaldiscount = $_GET['totaldiscount'];
			$grandtotal = $_GET['grandtotal'];
			$paidamount = $_GET['paidamount'];
			$due = $_GET['due'];
			$vat = $_GET['vat'];

			$sql="INSERT INTO invoice (CustomerID, SellerID, NetPayment,discount, Tax, PaidAmount, DueAmount) 
			VALUES(:customerid,:userid,:grandtotal,:totaldiscount,:vat,:paidamount,:due)";
			$query = $dbh->prepare($sql);
			$query->bindParam(':customerid',$customerid,PDO::PARAM_STR);
			$query->bindParam(':userid',$userid,PDO::PARAM_STR);
			$query->bindParam(':grandtotal',$grandtotal,PDO::PARAM_STR);
			$query->bindParam(':totaldiscount',$totaldiscount,PDO::PARAM_STR);
			$query->bindParam(':vat',$vat,PDO::PARAM_STR);
			$query->bindParam(':paidamount',$paidamount,PDO::PARAM_STR);			
			$query->bindParam(':due',$due,PDO::PARAM_STR);
			$query->execute();
			$lastInsertId = $dbh->lastInsertId();
			
			$i= count($_SESSION['items']);
			$sql2="INSERT INTO sellingproduct(InvoiceId, CustomerID, ProductId, BatchId, Qty, Price, NetPrice,SellerId) 
			VALUES(:lastInsertId, :customerid,:ItemId,:Batch,:SellQty,:Price,:PursingPrice,:userid)";
			for($count = 0; $count<$i; $count++)
			{
				$data = array(
				':lastInsertId'	=>	$lastInsertId,
				':customerid'	=>	$customerid,
				':ItemId'	=>	$_SESSION['items'][$count]['ItemId'],
				':Batch'	=>	$_SESSION['items'][$count]['Batch'],
				':SellQty'	=>	$_SESSION['items'][$count]['SellQty'],
				':Price'	=>	$_SESSION['items'][$count]['Price'],
				':PursingPrice'	=>	$_SESSION['items'][$count]['PursingPrice'],
				':userid'	=>	$_SESSION['alogin']			
				); 
				$statement = $dbh->prepare($sql2);
				$statement->execute($data);
			}
			unset ($_SESSION['items']);
		}
		else {
				
			}
	}
	if(isset($_GET['edit_unit'])){
		$value = $_GET['edit_unit'];
		$sql = "SELECT * from medicine_unit WHERE ID=:id";;
		$query = $dbh -> prepare($sql);
		$query->bindParam(':id',$value,PDO::PARAM_STR);
		$query->execute();
		$result=$query->fetch(PDO::FETCH_OBJ);
		$name = $result->MedicineUnit;
		$inqty = $result->Status;
		// $Data2="<p style='margin-bottom 0.2px;'>Name : $name</p><p> Status : $inqty</p>";
		if($result->Status==1){
			$Data2="<form method='post' class='row' onsubmit='return' >
			<div class='col-md-12'>
				<div class='row mb-3'>
					<label class='col-sm-4 col-form-label text-start text-sm-end'>Medicine Unit : </label>
					<div class='col-sm-5'>
					<input type='text' class='form-control' name='category' value='$result->MedicineUnit'>
					<input type='hidden' name='id' value='$value'>
					</div>
				</div>
			</div>
														
			<div class='col-md-12'>
				<div class='row mb-3'>
					<label class='col-sm-4 col-form-label text-start text-sm-end'>Status :</label>
					<div class='col-sm-8 d-flex align-items-center'>
						
						<div class='form-check form-check-inline'>
							<input class='form-check-input' checked type='radio' value='$result->Status' name='radio_value' id='inlineRadio1' value='option1'>
							<label class='form-check-label' for='inlineRadio1'>Active</label>
						</div>
						<div class='form-check form-check-inline'>
							<input class='form-check-input' type='radio' value='0' name='radio_value' id='inlineRadio2'>
							<label class='form-check-label' for='inlineRadio2'>Inactive</label>
						</div>
					</div>
				</div>
			</div>											
	
			<div class='hr-dashed'></div>
	
				<div class='col-md-6'>
					<div class='d-grid gap-2 d-md-flex d-sm-flex justify-content-md-end justify-content-sm-end justify-content-lg-end'>
						<button style='min-width: 150px;' class='btn btn-success' type='submit' name='update' >Update</button>
					</div>
			</div>						
		</form>";
		}else{
			$Data2="<form method='post' class='row' onsubmit='return' >
			<div class='col-md-12'>
				<div class='row mb-3'>
					<label class='col-sm-4 col-form-label text-start text-sm-end'>Medicine Unit : </label>
					<div class='col-sm-5'>
					<input type='text' class='form-control' name='category' value='$result->MedicineUnit'>
					<input type='hidden' name='id' value='$value'>
					</div>
				</div>
			</div>
														
			<div class='col-md-12'>
				<div class='row mb-3'>
					<label class='col-sm-4 col-form-label text-start text-sm-end'>Status :</label>
					<div class='col-sm-8 d-flex align-items-center'>
						<div class='form-check form-check-inline'>
							<input class='form-check-input'  type='radio' value='1' name='radio_value' id='inlineRadio1' value='option1'>
							<label class='form-check-label' for='inlineRadio1'>Active</label>
						</div>
						<div class='form-check form-check-inline'>
							<input class='form-check-input' checked type='radio' value='$result->Status' name='radio_value' id='inlineRadio2'>
							<label class='form-check-label' for='inlineRadio2'>Inactive</label>
						</div>
					</div>
				</div>
			</div>											
	
			<div class='hr-dashed'></div>
	
				<div class='col-md-6'>
					<div class='d-grid gap-2 d-md-flex d-sm-flex justify-content-md-end justify-content-sm-end justify-content-lg-end'>
						<button style='min-width: 150px;' class='btn btn-success' type='submit' name='update' >Update</button>
					</div>
			</div>						
		</form>";
		}
		
		echo $Data2;

	}
?>
