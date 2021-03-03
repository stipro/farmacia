<?php
include_once "connect_db.php";
$message;
if(isset($_POST['submit'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$position=$_POST['position'];
	echo 'usuario : '.$username.' clave : '.$password.' ';
	switch($position){
		case 'Administracion':
			$result = $mbd->prepare("SELECT admin_id, username FROM admin WHERE username = :username AND password = :password");
			$result->bindParam(':username' ,$username, PDO::PARAM_STR);
			$result->bindParam(':password' ,$password, PDO::PARAM_STR);
			$result->execute();
			$row = $result->fetch(PDO::FETCH_ASSOC);
			if($row>0){	
				session_start();
				$_SESSION['admin_id']=$row['admin_id'];
				$_SESSION['username']=$row['username'];
				header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin.php");
			}
			else{
				$message="<font color=red>Inicio de sesión no válido Inténtelo de nuevo (Administracion)</font>";
			}
			break;
		case 'Farmaceutico':
			$result = $mbd->prepare("SELECT pharmacist_id, first_name, last_name, staff_id, username FROM pharmacist WHERE username = :username AND password = :password");
			$result->bindParam(':username' ,$username, PDO::PARAM_STR);
			$result->bindParam(':password' ,$password, PDO::PARAM_STR);
			$result->execute();
			$row = $result->fetch(PDO::FETCH_ASSOC);
			if($row>0){
				session_start();
				$_SESSION['pharmacist_id']=$row['pharmacist_id'];
				$_SESSION['first_name']=$row['first_name'];
				$_SESSION['last_name']=$row['last_name'];
				$_SESSION['staff_id']=$row['staff_id'];
				$_SESSION['username']=$row['username'];
				header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/pharmacist.php");
			}else{
				$message="<font color=red>Inicio de sesión no válido Inténtelo de nuevo (Farmaceutico)</font>";
			}
		break;
		case 'Cajero':
			$result = $mbd->prepare("SELECT cashier_id, first_name,last_name,staff_id,username FROM cashier WHERE username = :username AND password = :password");
			$result->bindParam(':username' ,$username, PDO::PARAM_STR);
			$result->bindParam(':password' ,$password, PDO::PARAM_STR);
			$result->execute();
			$row = $result->fetch(PDO::FETCH_ASSOC);
			/*$result=mysqli_query($con,"SELECT cashier_id, first_name,last_name,staff_id,username FROM cashier WHERE username=$username AND password=$password");
			$row=mysqli_fetch_array($result);*/
			if($row>0){
				session_start();
				$_SESSION['cashier_id']=$row['cashier_id'];
				$_SESSION['first_name']=$row['first_name'];
				$_SESSION['last_name']=$row['last_name'];
				$_SESSION['staff_id']=$row['staff_id'];
				$_SESSION['username']=$row['username'];
				header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/cashier.php");
			}else{
				$message="<font color=red>Inicio de sesión no válido Inténtelo de nuevo (Cajero)</font>";
			}
		break;
		case 'Adninistrador':
			$result = $mbd->prepare("SELECT manager_id, first_name,last_name,staff_id,username FROM manager WHERE username = :username AND password = :password");
			$result->bindParam(':username' ,$username, PDO::PARAM_STR);
			$result->bindParam(':password' ,$password, PDO::PARAM_STR);
			$result->execute();
			$row = $result->fetch(PDO::FETCH_ASSOC);
			if($row>0){
				session_start();
				$_SESSION['manager_id']=$row['manager_id'];
				$_SESSION['first_name']=$row['first_name'];
				$_SESSION['last_name']=$row['last_name'];
				$_SESSION['staff_id']=$row['staff_id'];
				$_SESSION['username']=$row['username'];
				header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/manager.php");
			}else{
				$message="<font color=red>Inicio de sesión no válido Inténtelo de nuevo (Adninistrador)</font>";
			}
		break;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sistema de farmacia</title>
	<link rel="stylesheet" type="text/css" href="style/mystyle_login.css">
	<style>
	#content {
		height: 100vh;
	}
	#main{
		height: auto;
		width: auto;
		display: flex;
		justify-content: center;
	}
	</style>
</head>
<body>
<div id="content">
<div id="header">
<h1><img src="images/hd_logo.jpg">Sistema de farmacia</h1>
</div>
<div id="main">
  <section class="container">
     <div class="login">
	 <img src="images/hd_logo.jpg">
      <h1>Ingresar aqui</h1>
	  <?php global $message;
	   echo $message ?>
      <form method="post" action="index.php">
		 <p><input type="text" name="username" value="" placeholder="Usuario"></p>
        <p><input type="password" name="password" value="" placeholder="Clave"></p>
		<p><select name="position">
		<option>--Seleccione cargo--</option>
			<option>Administracion</option>
			<option>Farmaceutico</option>
			<option>Cajero</option>
			<option>Administrador</option>
			</select></p>
        <p class="submit"><input type="submit" name="submit" value="Login"></p>
      </form>
    </div>
    </section>
</div>

</div>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	
</body>
</html>

