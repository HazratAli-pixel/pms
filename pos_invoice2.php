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

		<style>
		 tfoot input {
			width: 100%;
			padding: 3px;
			box-sizing: border-box;
    	}
		</style>
		
	</head>
	
	<body>
		<?php include('includes/header.php');?>
		<div class="ts-main-content">
			<?php include('includes/leftbar.php');?>
			<div class="content-wrapper">
				<div class="container-fluid">
					<div class="row d-flex flex-wrap flex-column flex-sm-row flex-md-row flex-lg-row">
						<div class="col-1">
							
								
							<!-- button -->
							<?php $sql = "SELECT * from  medicine_category ";
								$query = $dbh -> prepare($sql);
								$query->execute();
								$results=$query->fetchAll(PDO::FETCH_OBJ);
								$cnt=1;
								if($query->rowCount() > 0)
								{?>			
								<div class="col-12" >
									<div class="d-flex flex-row flex-sm-row flex-md-column flex-lg-column px-1 py-1">
										<button class="btn btn-md btn-success" style="margin: 5px;">All</button>
											<?php 
											foreach($results as $result)
											{
											if($result->MedicineCategoryStatus ==1)
											{?>
											<button class="btn btn-md btn-success" style="margin: 5px;"><?php echo $result->MedicineCategory?></button>
											<?php }
											}?>
									</div>
								</div>
							<?php }?>
							
						</div>
						<div class="col-4">
							second					
						</div>
						<div class="col-7">
							third
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>
			function reply_click(clicked_id)
				{
					//alert(clicked_id);
					//console.log(clicked_id);
					var element = document.querySelectorAll('#ItemNo');
					var id = clicked_id-1;
					var val = element[id].value;
					//console.log(val);
					alert("Button Id is:"+clicked_id+ "Item Id is : "+ val)
				}
		</script>


		<!-- Loading Scripts -->
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
<?php }?>