<?php


session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_GET['ordersubmit'])){
	if(isset($_SESSION['items'])){
		$userid = $_SESSION['alogin'];
		
		$customerid =rand(50,500000);      //$_GET['customerid'];
		$totaldiscount = $_REQUEST['totaldiscount'];
		$grandtotal = $_REQUEST['grandtotal'];
		$paidamount = $_REQUEST['paidamount'];
		$due = $_REQUEST['due'];
		$vat = $_REQUEST['vat'];
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
		$total_count= count($_SESSION['items']);
		$i = 0;
		$userid	=	$_SESSION['alogin'];

		while($i<$total_count)
		{
			$ItemId	=	$_SESSION['items'][$i]['ItemId'];
			$Batch	=	$_SESSION['items'][$i]['Batch'];
			$SellQty	=	$_SESSION['items'][$i]['SellQty'];
			$Price	=	$_SESSION['items'][$i]['Price'];
			$PursingPrice	=	$_SESSION['items'][$i]['PursingPrice'];
			$sql2="INSERT INTO sellingproduct(InvoiceId, CustomerID, ProductId, BatchId, Qty, Price, NetPrice,SellerId) 
			VALUES('$lastInsertId','$customerid','$ItemId','$Batch','$SellQty','$Price','$PursingPrice','$userid')";
			mysqli_query($con,$sql2);	
		}
		echo $i;
	}
}



//if(isset($_GET['ordersubmit'])){
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
			echo $count .":------";
			?> <pre><?= print_r($data); ?></pre>
			<?php
			$statement = $dbh->prepare($sql2);
			$statement->execute($data);
		}
		//unset ($_SESSION['items']);
		echo $count."  is the last Number";
		// $query2 = $dbh->prepare($sql2);
		// $query2->bindParam(':lastInsertId',$lastInsertId,PDO::PARAM_STR);
		// $query2->bindParam(':customerid',$customerid,PDO::PARAM_STR);
		// $query2->bindParam(':ItemId',$ItemId,PDO::PARAM_STR);
		// $query2->bindParam(':Batch',$Batch,PDO::PARAM_STR);
		// $query2->bindParam(':SellQty',$SellQty,PDO::PARAM_STR);
		// $query2->bindParam(':Price',$Price,PDO::PARAM_STR);
		// $query2->bindParam(':PursingPrice',$PursingPrice,PDO::PARAM_STR);
		}
//}

















?>