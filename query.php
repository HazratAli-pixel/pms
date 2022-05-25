<?php

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
			
					$sql2="INSERT INTO sellingproduct(InvoiceId, CustomerID, ProductId, BatchId, Qty, Price, NetPrice,SellerId) 
					VALUES(:lastInsertId, :customerid,:ItemId,:Batch,:SellQty,:Price,:PursingPrice,:userid)";
					$i= count($_SESSION['items']);
					
						for($count = 0; $count<$i; $count++)
						{
							$result.=$count;
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
					echo $result;

						// $query2 = $dbh->prepare($sql2);
						// $query2->bindParam(':lastInsertId',$lastInsertId,PDO::PARAM_STR);
						// $query2->bindParam(':customerid',$customerid,PDO::PARAM_STR);
						// $query2->bindParam(':ItemId',$ItemId,PDO::PARAM_STR);
						// $query2->bindParam(':Batch',$Batch,PDO::PARAM_STR);
						// $query2->bindParam(':SellQty',$SellQty,PDO::PARAM_STR);
						// $query2->bindParam(':Price',$Price,PDO::PARAM_STR);
						// $query2->bindParam(':PursingPrice',$PursingPrice,PDO::PARAM_STR);


				}
			else {
				
			}
		}
?>