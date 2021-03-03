<?php
session_start();
include_once('connect_db.php');
global $message;
global $message1;
if(isset($_SESSION['username'])){
$id=$_SESSION['pharmacist_id'];
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
$sta="Available";

$sql = $mbd->prepare("INSERT INTO stock(drug_name,category,description,company,supplier,quantity,cost,status,date_supplied)
VALUES(:sname,:cat, :des, :com, :sup, :qua, :cost, :sta, NOW())");
$sql->bindParam(':sname', $sname, PDO::PARAM_STR);
$sql->bindParam(':cat', $cat, PDO::PARAM_STR);
$sql->bindParam(':des', $des, PDO::PARAM_STR);
$sql->bindParam(':com', $com, PDO::PARAM_STR);
$sql->bindParam(':sup', $sup, PDO::PARAM_STR);
$sql->bindParam(':qua', $qua, PDO::PARAM_STR);
$sql->bindParam(':cost', $cost, PDO::PARAM_STR);
$sql->bindParam(':sta', $sta, PDO::PARAM_STR);
$ejecutar = $sql->execute();
/*
$sql=mysql_query("INSERT INTO stock(drug_name,category,description,company,supplier,quantity,cost,status,date_supplied)
VALUES('$sname','$cat','$des','$com','$sup','$qua','$cost','$sta',NOW())");
*/
	if($sql>0) {
		header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/stock_pharmacist.php");
	}else{
		$message1="<font color=red>Registro fallido, inténtelo de nuevo</font>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $user;?> - Sistema de farmacia</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="style/table.css" type="text/css" media="screen" />
<script src="js/function.js" type="text/javascript"></script>
<style>#left-column {height: 477px;}
 #main {height: 477px;}</style>
</head>
<body>
<div id="content">
<div id="header">
<h1><a href="#"><img src="images/hd_logo.jpg"></a> Sistema de farmacia</h1></div>
<div id="left_column">
<div id="button">
<ul>
			<li><a href="pharmacist.php">Dashboard</a></li>
			<li><a href="prescription.php">Recetas</a></li>
			<li><a href="stock_pharmacist.php">Stock</a></li>
			<li><a href="logout.php">Cerrar sesión</a></li>
		</ul>
</div>
		</div>
<div id="main">
<div id="tabbed_box" class="tabbed_box">
    <h4>Gestionar Stock</h4>
<hr/>
    <div class="tabbed_area">

        <ul class="tabs">
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">ver Stock</a></li>
            <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Añadir medicina</a></li>

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
         echo "<tr><th>ID</th><th>Nombre</th><th>Categoría</th><th>Descripción</th><th>Estado </th><th>Fecha </th><th>Borrar</th></tr>";

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
			<form name="myform" onsubmit="return validateForm(this);" action="stock_pharmacist.php" method="post" >
			<table width="420" height="106" border="0" >
				<tr><td align="center"><input name="drug_name" type="text" style="width:170px" placeholder="Nombre de la droga" required="required" id="drug_name" /></td></tr>
				<tr><td align="center"><input name="category" type="text" style="width:170px" placeholder="Categoría" required="required" id="category"/></td></tr>
				<tr><td align="center"><input name="description" type="text" style="width:170px" placeholder="Descripción" required="required" id="description" /></td></tr>
				<tr><td align="center"><input name="company" type="text" style="width:170px" placeholder="Empresa de fabricación"  required="required" id="company" /></td></tr>
				<tr><td align="center"><input name="supplier" type="text" style="width:170px" placeholder="Proveedor" required="required" id="supplier" /></td></tr>
				<tr><td align="center"><input name="quantity" type="text" style="width:170px" placeholder="Cantidad" required="required" id="quantity" /></td></tr>
				<tr><td align="center"><input name="cost" type="text" style="width:170px" placeholder="Costo unitario" required="required" id="cost" /></td></tr>
				<tr><td align="center"><input name="submit" type="submit" value="Enviar" id="submit"/></td></tr>
            </table>
		</form>
        </div>

    </div>

</div>

</div>
<div id="footer" align="Center">  Sistema de farmacia tusolutionweb <a href="http://www.tusolutionweb.org/">tusolutionweb tutos</a>. derechos reservados</div>
</div>
</body>
</html>
