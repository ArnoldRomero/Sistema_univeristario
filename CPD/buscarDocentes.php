<?php
	ob_start();
	session_start();

if (isset($_SESSION['s_idusuario']) && $_SESSION['s_privilegio']==1) {
    $id_admin=$_SESSION['s_idusuario'];
    $nombre_usuario=$_SESSION['s_usuario'];
}
else
    header("location: ../index.php");



include_once('clsDocente.php');
?>
<html>
<head>


<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<link rel="stylesheet" href="assets/css/main.css" />
<link rel="stylesheet" href="assets/css/fontello.css">



<title></title>
<script> 
function Insertar(){ 
    opener.document.location.reload() 
    window.close() 
} 
</script> 
<style type="text/css">
</style>
</head>
<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">
							<!-- Content -->
								<section>
									<form id="form1" method="post" action="buscarDocentes.php">
									<fieldset id="form">
									<legend><h4>BUSQUEDA DE DOCENTES</h4></legend>

										<table width="342" border="0">
											<tr>
												<td>
													<input name="txtBuscar" type="text" size="20" value="" id="txtBuscar" placeholder="Nombre de Docente" />
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

												    	$listax=new Docente();
												    	$registros=$listax->BuscarPorNombreApellido($_POST['txtBuscar']);
												    	mostrar($registros);
												    }

												    else{
												    	$todos=new Docente();
														$registros=$todos->Buscar();
												    		mostrar($registros);
												    }
												  	  		

												  	  	function mostrar($registros)
												  	  	{							  
															echo "<table border='1' align='center'>";
															echo "<tr align='left'>
															<td><font color='black'>Codigo</font></td>
														   <td><font color='black'> Nombres</font></td>
														   <td><font color='black'> Apellido Paterno </font></td>
														   <td><font color='black'>*</font></td></tr>";
															while($f=mysqli_fetch_object($registros))
															{
																echo "<tr >";
																echo "<td>$f->reg_docente</td>";
																echo "<td>$f->nombres_d</td>";
																echo "<td>$f->paterno_d</td>";

																echo "<td><a href='buscarDocentes.php? b_regdoc=$f->reg_docente&b_nondoc=$f->nombres_d&x_paternod=$f->paterno_d'> >> </a> </td>";
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

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
		<?php
			if($_GET["b_regdoc"])
			{
			 $_SESSION["s_nombred"]=$_GET["b_nondoc"];
			 $_SESSION["s_paternod"]=$_GET["x_paternod"];
			 $_SESSION["s_idoc"]=$_GET["b_regdoc"];

			echo "<script> 
			     opener.document.location.reload() 
			     window.close() 
			     </script>";
		}
		?>

	</body>
</html>