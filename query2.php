<?php

use Dflydev\DotAccessData\Data;

use function PHPUnit\Framework\isEmpty;
use function Symfony\Component\VarDumper\Dumper\esc;

	session_start();
	error_reporting(0);

	include('includes/config.php');

if(isset($_GET['invodetails'])){
	$invoId = $_GET['invodetails'];
	$sql = "SELECT purchaseslist.BatchId,purchaseslist.Qty,purchaseslist.Mprice,purchaseslist.MRP,purchaseslist.date,
	medicine_list.medicine_name from purchaseslist LEFT JOIN medicine_list ON purchaseslist.ProductId = medicine_list.item_code 
	WHERE purchaseslist.InvoiceId =:id";
	$query = $dbh -> prepare($sql);
	$query->bindParam(':id',$invoId,PDO::PARAM_STR);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	if($query->rowCount() > 0)
	{ $cnt=1;
		foreach($results as $result){
			$total = $result->Qty*$result->Mprice;
			$Data.="<tr>						
				<td class='text-center'>$cnt</td>
				<td class='text-center'>$result->medicine_name</td>
				<td class='text-center'>$result->BatchId</td>
				<td class='text-center'>$result->Qty</td>
				<td class='text-center'>$result->Mprice</td>
				<td class='text-center'>$total</td>
			</tr>";
			$cnt++;
		}
	}
	echo $Data;
}
if(isset($_GET['StockManagment'])){
	$batchNumber = $_GET['StockManagment'];
	$sql = "SELECT * FROM stocktable WHERE BatchNumber=:batchNumber";
	$query = $dbh -> prepare($sql);
	$query->bindParam(':batchNumber',$batchNumber,PDO::PARAM_STR);
	$query->execute();
	$result=$query->fetch(PDO::FETCH_OBJ);
	$date = $_GET['date'];
	$PQty = $_GET['Qty'];
	$PQty = $PQty + $result->InQty;
	$productid = $_GET['productid'];
	$Mprice = $_GET['Mprice'];
	$MRP = $_GET['MRP'];
	// echo "ok this line";
	if($query->rowCount() > 0)
	{
		$sts = 1;
		$sql = "update stocktable SET InQty=:PQty WHERE BatchNumber=:batchNumber";
		$query = $dbh -> prepare($sql);
		$query->bindParam(':PQty',$PQty,PDO::PARAM_STR);
		$query->bindParam(':batchNumber',$batchNumber,PDO::PARAM_STR);
		$query->execute();
		$sql = "update purchaseslist SET Status=:sts WHERE BatchId=:batchNumber";
		$query = $dbh -> prepare($sql);
		$query->bindParam(':sts',$sts,PDO::PARAM_STR);
		$query->bindParam(':batchNumber',$batchNumber,PDO::PARAM_STR);
		$query->execute();
		echo "Product updated";
	}
	else{
		$sts = 1;
		$sql = "INSERT INTO stocktable (Item_code, BatchNumber,InQty,PurPrice,SellPrice,Date,Status) 
		VALUES(:productid,:batchNumber,:PQty,:Mprice,:MRP,:date,:sts)";
		$query = $dbh -> prepare($sql);
		$query->bindParam(':productid',$productid,PDO::PARAM_STR);
		$query->bindParam(':batchNumber',$batchNumber,PDO::PARAM_STR);
		$query->bindParam(':PQty',$PQty,PDO::PARAM_STR);
		$query->bindParam(':Mprice',$Mprice,PDO::PARAM_STR);
		$query->bindParam(':MRP',$MRP,PDO::PARAM_STR);
		$query->bindParam(':date',$date,PDO::PARAM_STR);
		$query->bindParam(':sts',$sts,PDO::PARAM_STR);
		$query->execute();
		$sql = "UPDATE purchaseslist SET Status=:sts WHERE BatchId=:batchNumber";
		$query = $dbh -> prepare($sql);
		$query->bindParam(':sts',$sts,PDO::PARAM_STR);
		$query->bindParam(':batchNumber',$batchNumber,PDO::PARAM_STR);
		$query->execute();
		echo "Product Newly Inserted";
	}
}


?>