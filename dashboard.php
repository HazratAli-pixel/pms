<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
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
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>PMS | Admin Dashboard</title>

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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.1.2/typicons.min.css" rel="stylesheet">
	<style>
		.panel{
			border-radius: 10px;
		}
	</style>

</head>

<body>
		<?php include('includes/header.php');?>
		<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
			<div class="content-wrapper">
				<div class="container-fluid">
					<div class="col-12 text-center">
						<h2 class="page-title">Dashboard</h2>
					</div>	
					<div class="row">
						<div class="col-12">
							<div class="row">
								<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3 mb-2">
									<div class="panel panel-default">
										<div class=" p-2 panel-body bk-white text-black">
											<div class="stat-panel text-center">
												<?php 
													$sql6 ="SELECT id from tblcontactusquery ";
													$query6 = $dbh -> prepare($sql6);;
													$query6->execute();
													$results6=$query6->fetchAll(PDO::FETCH_OBJ);
													$query=$query6->rowCount();
												?>
													<p  style="margin:0%; font-weight: bold;" class="card-text"> Total Customer </p>
													<h3 style="margin-bottom: 0px; display:inline" class="">102</h3>
													<p style="display:inline;font-size:12px;margin:0%;" class="text-muted">Person</p>
											</div>
											<a href="#" class="block-anchor panel-footer text-center text-decoration-none">Full Detail <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
								</div>
								<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3 mb-2">
									<div class="panel panel-default">
										<div class=" p-2 panel-body bk-white text-black">
											<div class="stat-panel text-center">
												<?php 
													$sql6 ="SELECT id from tblcontactusquery ";
													$query6 = $dbh -> prepare($sql6);;
													$query6->execute();
													$results6=$query6->fetchAll(PDO::FETCH_OBJ);
													$query=$query6->rowCount();
												?>
													<p  style="margin:0%; font-weight: bold;" class="card-text"> Total Medicine </p>
													<h3 style="margin-bottom: 0px; display:inline" class="">102</h3>
													<p style="display:inline;font-size:12px;margin:0%;" class="text-muted">items</p>
											</div>
											<a href="#" class="block-anchor panel-footer text-center text-decoration-none">Full Detail <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
								</div>
								<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3 mb-2">
									<div class="panel panel-default">
										<div class=" p-2 panel-body bk-white text-black">
											<div class="stat-panel text-center">
												<?php 
													$sql6 ="SELECT id from tblcontactusquery ";
													$query6 = $dbh -> prepare($sql6);;
													$query6->execute();
													$results6=$query6->fetchAll(PDO::FETCH_OBJ);
													$query=$query6->rowCount();
												?>
													<p  style="margin:0%; font-weight: bold;" class="card-text"> Out Of Stock </p>
													<h3 style="margin-bottom: 0px; display:inline" class="">102</h3>
													<p style="display:inline;font-size:12px;margin:0%;" class="text-muted">items</p>
											</div>
											<a href="#" class="block-anchor panel-footer text-center text-decoration-none">Full Detail <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
								</div>
								<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3 mb-2">
									<div class="panel panel-default">
										<div class=" p-2 panel-body bk-white text-black">
											<div class="stat-panel text-center">
												<?php 
													$sql6 ="SELECT id from tblcontactusquery ";
													$query6 = $dbh -> prepare($sql6);;
													$query6->execute();
													$results6=$query6->fetchAll(PDO::FETCH_OBJ);
													$query=$query6->rowCount();
												?>
													<p  style="margin:0%; font-weight: bold;" class="card-text"> Experied Medicine </p>
													<h3 style="margin-bottom: 0px; display:inline" class="">102</h3>
													<p style="display:inline;font-size:12px;margin:0%;" class="text-muted">items</p>
											</div>
											<a href="#" class="block-anchor panel-footer text-center text-decoration-none">Full Detail <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 mb-2">
									<div class="panel panel-default">
										<div class="panel-body bk-white text-black">
											<div class="stat-panel text-center" style="padding-left: 15px;">
											<?php 
													$sql6 ="SELECT medicine_list.medicine_name, sum(sellingproduct.Qty) AS Qty
													FROM (sellingproduct RIGHT JOIN medicine_list ON sellingproduct.ProductId = medicine_list.item_code)
													GROUP BY ProductId ORDER BY COUNT(ProductId) DESC limit 10";
													$query6 = $dbh -> prepare($sql6);;
													$query6->execute();
													$results6=$query6->fetchAll(PDO::FETCH_OBJ);
													
													foreach($results6 as $result){
														$names[] = $result->medicine_name;
														$price[] = $result->Qty;
													}
												?>



													<div style="overflow: hidden;" >
														<canvas id="myChart"  style="width:100%;max-width:780px"></canvas>
													</div>
											</div>
											
										</div>
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6 col-xl-3 col-xxl-3 mb-2">
									<div class="panel panel-default">
										<div class="panel-body bk-primary text-light">
											<div class="stat-panel text-center">
												<div style="overflow: hidden;" id="myChart2" style="width:100%; max-width:770px; height:390px; "></div>
											</div>
											
										</div>
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6 col-xl-3 col-xxl-3 mb-2">
									<div class="panel panel-default">
										<div class="panel-body bk-white text-black">
											<div class="stat-panel text-center">
												<?php 
													$sql6 ="SELECT id from tblcontactusquery ";
													$query6 = $dbh -> prepare($sql6);;
													$query6->execute();
													$results6=$query6->fetchAll(PDO::FETCH_OBJ);
													$query=$query6->rowCount();
												?>
													<h1  style="margin:0%; " class="card-text pt-2"> Todays Report </h1>
													<div class="p-4">
													<table class="table table-bordered table-hover" style="width:100%; min-width:300px;">
														<thead  class="table-success">
															<tr>
																<th>Todays Report</th>
																<th>Amount</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>Total Sales</td>
																<td>120</td>
															</tr>
															<tr>
																<td>Total Purchase</td>
																<td>120</td>
															</tr>
															<tr>
																<td>Cash Received</td>
																<td>120</td>
															</tr>
															<tr>
																<td>Bank Receive</td>
																<td>120</td>
															</tr>
															<tr>
																<td>Total Service</td>
																<td>120</td>
															</tr>
														</tbody>
													</table>
											</div>
													</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row mt-4">
								<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3 mb-2">
									<div class="panel panel-default">
										<div class=" p-2 panel-body bk-white text-black">
										<!-- <img src="UserPhoto/avatar.jpg" width="80px" alt=""> -->
											<div class="stat-panel text-center">
												<?php 
													$sql6 ="SELECT id from tblcontactusquery ";
													$query6 = $dbh -> prepare($sql6);;
													$query6->execute();
													$results6=$query6->fetchAll(PDO::FETCH_OBJ);
													$query=$query6->rowCount();
												?>
													<p  style="margin:0%; font-weight: bold;" class="card-text"> Total Due Customer </p>
													<h3 style="margin-bottom: 0px; display:inline" class="">102</h3>
													<p style="display:inline;font-size:12px;margin:0%;" class="text-muted">Person</p>
											</div>
											<a href="#" class="block-anchor panel-footer text-center text-decoration-none">Full Detail <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
								</div>
								<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3 mb-2">
									<div class="panel panel-default">
										<div class=" p-2 panel-body bk-white text-black">
											<div class="stat-panel text-center">
												<?php 
													$sql6 ="SELECT id from tblcontactusquery ";
													$query6 = $dbh -> prepare($sql6);;
													$query6->execute();
													$results6=$query6->fetchAll(PDO::FETCH_OBJ);
													$query=$query6->rowCount();
												?>
													<p  style="margin:0%; font-weight: bold;" class="card-text"> Total Due Amount </p>
													<h3 style="margin-bottom: 0px; display:inline" class="">542154.54</h3>
													<p style="display:inline;font-size:12px;margin:0%;" class="text-muted">Tk</p>
											</div>
											<a href="#" class="block-anchor panel-footer text-center text-decoration-none">Full Detail <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
								</div>
								<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3 mb-2">
									<div class="panel panel-default">
										<div class=" p-2 panel-body bk-white text-black">
											<div class="stat-panel text-center">
												<?php 
													$sql6 ="SELECT id from tblcontactusquery ";
													$query6 = $dbh -> prepare($sql6);;
													$query6->execute();
													$results6=$query6->fetchAll(PDO::FETCH_OBJ);
													$query=$query6->rowCount();
												?>
													<p  style="margin:0%; font-weight: bold;" class="card-text"> Max Due Person (50) </p>
													<h3 style="margin-bottom: 0px; display:inline" class="">50</h3>
													<p style="display:inline;font-size:12px;margin:0%;" class="text-muted">Person</p>
											</div>
											<a href="#" class="block-anchor panel-footer text-center text-decoration-none">Full Detail <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
								</div>
								<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3 mb-2">
									<div class="panel panel-default">
										<div class=" p-2 panel-body bk-white text-black">
											<div class="stat-panel text-center">
												<?php 
													$sql6 ="SELECT id from tblcontactusquery ";
													$query6 = $dbh -> prepare($sql6);;
													$query6->execute();
													$results6=$query6->fetchAll(PDO::FETCH_OBJ);
													$query=$query6->rowCount();
												?>
													<p  style="margin:0%; font-weight: bold;" class="card-text"> Max Due Time </p>
													<h3 style="margin-bottom: 0px; display:inline" class="">50</h3>
													<p style="display:inline;font-size:12px;margin:0%;" class="text-muted">Person</p>
											</div>
											<a href="#" class="block-anchor panel-footer text-center text-decoration-none">Full Detail <i class="fa fa-arrow-right"></i></a>
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
	<script>
	var xValues = <?php echo json_encode($names);  ?>;
	var yValues = <?php echo json_encode($price);  ?>;
	var barColors = ["red", "green","blue","orange","black","red", "green","blue","orange","black"];

	new Chart("myChart", {
	type: "bar",
	data: {
		labels: xValues,
		datasets: [{
		backgroundColor: barColors,
		data: yValues
		}]
	},
	options: {
		legend: {display: false},
		title: {
		display: true,
		text: "Best Sales of the month (Products)"
		}
	}
	});
	</script>


	<script>
	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {
	var data = google.visualization.arrayToDataTable([
	['Contry', 'Mhl'],
	['Total Sale',54],
	['Total Service',48],
	['Total Salary',44],
	['Total Income',23]
	]);

	var options = {
	title:'Income Expense Statement',
	is3D:true
	};

	var chart = new google.visualization.PieChart(document.getElementById('myChart2'));
	chart.draw(data, options);
	}
	</script>
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap-select.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap.min.js"></script>
		<script src="js/Chart.min.js"></script>
		<script src="js/fileinput.js"></script>
		<script src="js/chartData.js"></script>
		<script src="js/main.js"></script>
</body>
</html>
<?php } ?>