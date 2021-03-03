<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['manager_id'];
$fname=$_SESSION['first_name'];
$lname=$_SESSION['last_name'];
$sid=$_SESSION['staff_id'];
$user=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $user;?> -Sistema de farmacia</title>
	<link rel="stylesheet" type="text/css" href="style/mystyle.css">
	<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="style/dashboard_styles.css"  media="screen" />
	<script src="js/function.js" type="text/javascript"></script>
	<style>
	</style>
</head>
<body>
	<div id="content">
		<div id="header">
			<h1><a href="#"><img src="images/hd_logo.jpg"></a> Sistema de farmacia</h1>
		</div>
		<div id="container_lm">
			<div id="left_column">
				<div id="button">
					<ul>
						<li><a href="admin.php">Dashboard</a></li>
						<li><a href="admin_pharmacist.php">Farmacéutico</a></li>
						<li><a href="admin_manager.php">Gerente</a></li>
						<li><a href="admin_cashier.php">Cajero</a></li>
						<li><a href="logout.php">Salir</a></li>
					</ul>
				</div>
			</div>
			<div id="main">
			<!-- Dashboard icons -->
				<div class="grid_7">
					<!--
					<a href="manager.php" class="dashboard-module">
						<img src="images/manager_icon.png" width="100" height="100" alt="edit" />
						<span>Dashboard</span>
					</a>-->
						<a href="view.php" class="dashboard-module">
						<img src="images/patients_1.png"  width="100" height="100" alt="edit" />
						<span>Ver usuarios</span>
					</a>
					<a href="#" class="dashboard-module">
						<img src="images/Invoice.png"  width="100" height="100" alt="edit" />
						<span>Ver facturas</span>
					</a>
					<!--<a href="view_prescription.php" class="dashboard-module">
						<img src="images/prescri.jpg" width="100" height="100" alt="edit" />
						<span>Ver receta</span>
					</a>-->
					<a href="stock.php" class="dashboard-module">
						<img src="images/stock_icon.jpg" width="100" height="100" alt="edit" />
						<span>Administrar Stock</span>
					</a>
					</a>
						<a href="kardex.php" class="dashboard-module">
						<img src="images/kardex.png" width="100" height="100" alt="edit" />
						<span>Kardex</span>
					</a>
				</div>
			</div>
		</div>
		<div id="footer" align="Center">  Sistema de farmacia <a href="http://www.stipro.org/">@stipro</a>. derechos reservados</div>
	</div>
</body>
</html>
