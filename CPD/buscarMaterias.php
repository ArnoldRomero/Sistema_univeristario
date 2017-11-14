<?php 
	
	ob_start();
	session_start();

if (isset($_SESSION['s_idusuario']) && $_SESSION['s_privilegio']==1) {
    $id_admin=$_SESSION['s_idusuario'];
    $nombre_usuario=$_SESSION['s_usuario'];
}
else
    header("location: ../index.php");



include_once('clsMateria.php');
?>





<html>
<head>
<title></title>

<script> 
function Insertar(){ 
    opener.document.location.reload() 
    window.close() 
} 
</script> 

<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<link rel="stylesheet" href="assets/css/main.css" />
<link rel="stylesheet" href="assets/css/fontello.css">

</head>

<body>
<!-- Wrapper -->
	<div id="wrapper">

		<!-- Main -->
		<div id="main">
			<div class="inner">
				<!-- Content -->
				<section>
					<form id="form1" method="post" action="buscarMaterias.php">
						<fieldset id="form">
						<legend><h4>BUSQUEDA DE MATERIAS</h4></legend>
						<table width="342" border="0">
							<tr>
								<td>
									<input name="txtBuscar" type="text" size="20" value="" id="txtBuscar" placeholder="Nombre de Materia" />
								</td>
							</tr>
							<tr>
								<td colspan="2">
								<center><input type="submit" name="botones" class="btn" value="Buscar" />    
									<input type="submit" class="btn" name="botones"  value="Volver" /></center>
								</td>
							</tr>
							<tr>
								<td colspan="2">
								</td>
							</tr>
							<tr>
								<td colspan="2">
								 <?php      
									

								    if ($_POST['botones']=='Buscar') {

								    	$listax=new Materia();
								    	$registros=$listax->buscarPorNombre($_POST['txtBuscar']);
								    	mostrar($registros);
								    }

								    else{
								    	$todos=new Materia();
										$registros=$todos->Buscar();
								    		mostrar($registros);
								    }
								  	  		

								  	  	function mostrar($registros)
								  	  	{							  
											echo "<table border='1' align='center'>";
											echo "<tr bgcolor='black' align='left'>
											<td><font color='black'><b>Sigla</b></font></td>
										   <td><font color='black'><b> Nombre</b></font></td>
										   <td><font color='black'><b>*</b></font></td></tr>";
											while($f=mysqli_fetch_object($registros))
											{
												echo "<tr >";
												echo "<td>$f->sigla</td>";
												echo "<td>$f->nombre_m</td>";

												echo "<td><a href='buscarMaterias.php? psigla=$f->sigla&pnombre=$f->nombre_m' > >> </a> </td>";
												echo "</tr>";
											}
											echo "</table>";
										}
								  
								  if($_POST['botones']=="Volver")
								  {
								  	echo "<script>window.close()</script>";
								  }
							 	?>
								</td>
							</tr>
						</table>
					</form>
				</section>
			</div>
		</div>
	</div>

			<?php 
	if($_GET["pnombre"])
	{
		 $_SESSION["nombre_mat"]=$_GET["pnombre"];
		 $_SESSION["id_sigla"]=$_GET["psigla"];

		echo "<script> 
	     opener.document.location.reload() 
	     window.close() 
	    </script>";
	}

	?>
</body>
</html>