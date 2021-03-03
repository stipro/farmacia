<?php
session_start();
include_once('connect_db.php');
global $message;
global $message1;
if(isset($_SESSION['username'])){
	$id=$_SESSION['manager_id'];
	$user=$_SESSION['username'];
}else{
	header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."index.php");
	exit();
}
if(isset($_POST['submit'])){
	$sname=$_POST['drug_name'];
	$cat=$_POST['category'];
	$des=$_POST['description'];
	$com=$_POST['company'];
	$sup=$_POST['supplier'];
	$qua=$_POST['quantity'];
	$cost=$_POST['cost'];
	$sta="Disponible";

	$sql = $mbd->prepare("INSERT INTO stock(drug_name,category,description,company,supplier,quantity,cost,status,date_supplied)
	VALUES(:sname,:cat, :des, :com, :sup, :qua, :cost, :sta,NOW())");
	$sql->bindParam(':sname', $sname, PDO::PARAM_STR);
	$sql->bindParam(':cat', $cat, PDO::PARAM_STR);
	$sql->bindParam(':des', $des, PDO::PARAM_STR);
	$sql->bindParam(':com', $com, PDO::PARAM_STR);
	$sql->bindParam(':sup', $sup, PDO::PARAM_STR);
	$sql->bindParam(':qua', $qua, PDO::PARAM_STR);
	$sql->bindParam(':cost', $cost, PDO::PARAM_STR);
	$sql->bindParam(':sta', $sta, PDO::PARAM_STR);
	$ejecutar = $sql->execute();
	//$ejecutar = $sql -> execute();
	/*
	$sql=mysql_query("INSERT INTO stock(drug_name,category,description,company,supplier,quantity,cost,status,date_supplied)
	VALUES('$sname','$cat','$des','$com','$sup','$qua','$cost','$sta',NOW())");*/
	if($sql>0) {
		header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/stock.php");
	}else{
		$message1="<font color=red>Registro fallido, inténtelo de nuevo</font>";
	}
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Font Awesome -->
	<link
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
	rel="stylesheet"
	/>
	<!-- Google Fonts -->
	<link
	href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
	rel="stylesheet"
	/>
	<!-- MDB -->
	<link
	href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css"
	rel="stylesheet"
	/>
	<title><?php echo $user;?> -Sistema de farmacia</title>
	<!---->
	<link rel="stylesheet" type="text/css" href="style/mystyle.css">
	<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="style/table.css" type="text/css" media="screen" />
	<script src="js/function.js" type="text/javascript"></script>
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<style>#left-column {height: 477px;}
	#main {height: 477px;}</style>
</head>
<body>
	<div id="content">
		<div id="header">
			<h1><a href="#"><img src="images/hd_logo.jpg"></a> Pharmacy System</h1>
		</div>
		<div id="container_lm">
			<div id="left_column">
				<div id="button">
					<ul>
						<li><a href="manager.php">Dashboard</a></li>
						<li><a href="view.php">Ver usuarios</a></li>
						<li><a href="view_prescription.php">Ver Recetas</a></li>
						<li><a href="stock.php">Gestionar stock</a></li>
						<li><a href="logout.php">Cerrar sesión</a></li>
					</ul>
				</div>
			</div>
			<div id="main">
				<div id="tabbed_box" class="tabbed_box">
					<h4>Gestionar stock</h4>
					<hr/>
					<div class="tabbed_area">
						<ul class="tabs">
							<li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">Ver Stock</a></li>
							<li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Agregar medicina</a></li>
						</ul>
						<div id="content_1" class="content">
							<?php echo $message;
							echo $message1;
							?>

							<?php
							/*
							View
							Displays all data from 'Stock' table
							*/

							// connect to the database
							include_once('connect_db.php');

							// get results from database
							$result = $mbd->prepare("SELECT * FROM stock");
							$result->execute();
							// display data in table
							echo "<table border='1' cellpadding='3'>";
							echo "<tr><th>ID</th><th>Nombre</th><th>Categoría</th><th>Descripción</th><th>Estado</th><th>Fecha</th><th>Borrar</th></tr>";

							// loop through results of database query, displaying them in the table
							while($row = $result->fetch(PDO::FETCH_ASSOC)) {

									// echo out the contents of each row into a table
									echo "<tr>";
									echo '<td>' . $row['stock_id'] . '</td>';
									echo '<td>' . $row['drug_name'] . '</td>';
									echo '<td>' . $row['category'] . '</td>';
									echo '<td>' . $row['description'] . '</td>';
									echo '<td>' . $row['status'] . '</td>';
									echo '<td>' . $row['date_supplied'] . '</td>';?>
									<td><a href="delete_stock.php?stock_id=<?php echo $row['stock_id']?>"><img src="images/delete-icon.jpg" width="24" height="24" border="0" /></a></td>
									<?php
							}
							// close table>
							echo "</table>";
							?>
						</div>
						<div id="content_2" class="content">
							<!--Add Drug-->
							<?php echo $message;
								echo $message1;
							?>
							<form name="myform" onsubmit="return validateForm(this);" action="stock.php" method="post" >
								<input name="drug_name" type="text" style="width:170px" placeholder="Nombre de la medicina" required="required" id="drug_name"/>
								<input name="category" type="text" style="width:170px" placeholder="Categoría" required="required" id="category"/>
								<input name="description" type="text" style="width:170px" placeholder="Descripción" required="required" id="description"/>
								<input name="company" type="text" style="width:170px" placeholder="Empresa de fabricación"  required="required" id="company"/>
								<input name="supplier" type="text" style="width:170px" placeholder="Proveedor" required="required" id="supplier"/>
								<input name="quantity" type="text" style="width:170px" placeholder="Cantidad" required="required" id="quantity"/>
								<input name="cost" type="text" style="width:170px" placeholder="Costo unitario" required="required" id="cost"/>
								<input class="btn btn-primary" name="submit"  type="submit" value="Enviar" id="submit"/>
								<!--
								<table width="420" height="106" border="0" >
									<tr><td align="center"><input name="drug_name" type="text" style="width:170px" placeholder="Nombre de la medicina" required="required" id="drug_name" /></td></tr>
									<tr><td align="center"><input name="category" type="text" style="width:170px" placeholder="Categoría" required="required" id="category"/></td></tr>
									<tr><td align="center"><input name="description" type="text" style="width:170px" placeholder="Descripción" required="required" id="description" /></td></tr>
									<tr><td align="center"><input name="company" type="text" style="width:170px" placeholder="Empresa de fabricación"  required="required" id="company" /></td></tr>
									<tr><td align="center"><input name="supplier" type="text" style="width:170px" placeholder="Proveedor" required="required" id="supplier" /></td></tr>
									<tr><td align="center"><input name="quantity" type="text" style="width:170px" placeholder="Cantidad" required="required" id="quantity" /></td></tr>
									<tr><td align="center"><input name="cost" type="text" style="width:170px" placeholder="Costo unitario" required="required" id="cost" /></td></tr>
									<tr>
										<td>
											<div class="col-sm-7">
												<div class="form-outline">
													<input type="email" id="typeEmail" class="form-control" />
													<label class="form-label" for="typeEmail">Nombre de la medicina</label>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>
										<div class="form-outline">
											<input type="email" id="typeEmail" class="form-control" />
											<label class="form-label" for="typeEmail">Categoría</label>
										</div>
										</td>
									</tr>
									<tr>
										<td>
										<div class="form-outline">
											<input type="email" id="typeEmail" class="form-control" />
											<label class="form-label" for="typeEmail">Descripción</label>
										</div>
										</td>
									</tr>
									<tr>
										<td>
										<div class="form-outline">
											<input type="email" id="typeEmail" class="form-control" />
											<label class="form-label" for="typeEmail">Empresa de fabricación</label>
										</div>
										</td>
									</tr>
									<tr>
										<td>
										<div class="form-outline">
											<input type="email" id="typeEmail" class="form-control" />
											<label class="form-label" for="typeEmail">Proveedor</label>
										</div>
										</td>
									</tr>
									<tr>
										<td>
										<div class="form-outline">
											<input type="email" id="typeEmail" class="form-control" />
											<label class="form-label" for="typeEmail">Cantidad</label>
										</div>
										</td>
									</tr>
									<tr>
										<td>
										<div class="form-outline">
											<input type="email" id="typeEmail" class="form-control" />
											<label class="form-label" for="typeEmail">Costo unitario</label>
										</div>
										</td>
									</tr>
									<tr>
										<td align="center">
											<input class="btn btn-primary" name="submit"  type="submit" value="Enviar" id="submit"/>
										</td>
									</tr>
								</table>-->
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="footer" align="Center">  Sistema de farmacia <a href="http://www.stipro.org/">@stipro</a>. derechos reservados</div>
	</div>
	<!-- MDB -->
	<script
	type="text/javascript"
	src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"
	></script>
</body>
</html>
