<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Sistema de farmacia</title>
    <link rel="stylesheet" type="text/css" href="style/mystyle.css">
    <link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="style/table.css" type="text/css" media="screen" />
    <style>
        #btn_atras, #btn_adelante{
            width: 1rem;
            height: 1rem;
        }
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
                        <li> <a href="manager.php"> Dashboard </a> </li>
                        <li> <a href="view.php"> Ver usuarios </a> </li>
                        <li> <a href="view_prescription.php"> Ver recetas </a> </li>
                        <li> <a href="stock.php"> Gestionar stock </a> </li>
                        <li> <a href="logout.php"> Cerrar sesión </a> </li>
                    </ul>
                </div>
            </div>
            <div id="main">
                <div id="tabbed_box" class="tabbed_box">
                    <h4>Consultar Kardex</h4>
					<hr/>
					<div class="tabbed_area">
						<ul class="tabs">
							<li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">Kardex</a></li>
							<li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Agregar medicina</a></li>
						</ul>
						<div id="content_1" class="content">
                            <form>
                                <fieldset>
                                    <legend>Periodo</legend>
                                    <div class='head'>
                                        <div id='title-main'>
                                            <label for="uname">Producto: </label>
                                        </div>
                                        <div>
                                            <p><label for="uname">Codigo: </label></p>
                                            <input type="text" id="uname" name="name" placeholder="Codigo">
                                        </div>
                                        <div>
                                            <p><label for="uname">Nombre: </label></p>
                                            <input type="text" id="uname" name="name" placeholder="Nombre">
                                        </div>
                                        <div>
                                            <button>
                                                <img id="btn_atras" src="images/atras.png" width="100" height="100" alt="edit" />
                                            </button>
                                            <select name="select">
                                                <option value="value1">2022</option>
                                                <option value="value2" selected>2021</option>
                                                <option value="value3">2020</option>
                                            </select>
                                            <button>
                                                <img  id="btn_adelante"src="images/adelante.png" width="100" height="100" alt="edit" />
                                            </button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                            <div>
                                <table border='1' cellpadding='3'>
                                    <tbody>
                                        <colgroup>
                                        <colgroup>
                                        <colgroup span="1" style="background: rgba(128, 255, 0, 0.3); border: 1px solid rgba(100, 200, 0, 0.3);">
                                        <colgroup span="1" style="background: rgba(128, 255, 0, 0.3); border: 1px solid rgba(100, 200, 0, 0.3);">
                                        <colgroup span="1" style="background: rgba(128, 255, 0, 0.3); border: 1px solid rgba(100, 200, 0, 0.3);">
                                        <tr>
                                            <th>ID</th>
                                            <th>Cliente/Proveedor</th>
                                            <th>Ingresos</th>
                                            <th>Salidas</th>
                                            <th>Saldo</th>
                                            <th>Lote</th>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Cliente</td>
                                            <td>1</td>
                                            <td>0</td>
                                            <td>1</td>
                                            <td>100801032021</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Cliente3</td>
                                            <td>0</td>
                                            <td>1</td>
                                            <td>0</td>
                                            <td>100801042021</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        <th>Balance</th>
                                        <td colspan="1">$20,00</td>
                                        <td colspan="1">$10,00</td>
                                        <td colspan="1">$20,00</td>
                                        <td colspan="1">$20,00</td>
                                        <td colspan="2">$10,00</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <fieldset>
                                <legend>Total</legend>
                                <div>
                                    <input type="text" id="uname" name="name" placeholder="Codigo">
                                    <input type="text" id="uname" name="name" placeholder="Nombre">
                                    <input type="text" id="uname" name="name" placeholder="Nombre"> 
                                </div>                                 
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer" align="Center">  Sistema de farmacia tusolutionweb <a href="http://www.tusolutionweb.org/">tusolutionweb tutos</a>. derechos reservados</div>
    </div>
</body>
</html>