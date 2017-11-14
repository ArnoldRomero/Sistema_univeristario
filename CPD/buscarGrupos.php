<?php 
	ob_start();
	session_start();

if (isset($_SESSION['s_idusuario']) && $_SESSION['s_privilegio']==1) {
    $id_admin=$_SESSION['s_idusuario'];
    $nombre_usuario=$_SESSION['s_usuario'];
}
else
    header("location: ../index.php");




include_once('clsGrupo.php');
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
					<form id="form1" method="post" action="buscarGrupos.php">
						<fieldset id="form">
						<legend><h4>BUSQUEDA DE GRUPOS REGISTRADOS</h4></legend>
						<table width="342" border="0">
							<tr>
								<td>
									<input name="txtCarrera" type="text" size="20" value="" id="txtCarrera" placeholder="Carrera" />
								</td>
							</tr>
							<tr>
								<td>
									<input name="txtSemestre" type="text" size="20" value="" id="txtSemestre" placeholder="Semestre" />
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

								    	$listax=new Grupo();
								    	$registros=$listax->buscarxcarrerasemestre($_POST['txtCarrera'],$_POST['txtSemestre']);
								    	mostrar($registros);
								    }

								    else{
								    	$todos=new Grupo();
										$registros=$todos->Buscar();
								    		mostrar($registros);
								    }
								  	  		

								  	  	function mostrar($registros)
								  	  	{							  
											echo "<table border='1' align='center'>";
											echo "<tr bgcolor='black' align='left'>
											<td><font color='black'><b>Nro Grupo</b></font></td>
										   <td><font color='black'><b> Carrera</b></font></td>
										   <td><font color='black'><b> Semestre</b></font></td>
										   <td><font color='black'><b> Materia</b></font></td>
										   <td><font color='black'><b> Docente</b></font></td>
										   <td><font color='black'><b>*</b></font></td></tr>";

											while($f=mysqli_fetch_object($registros))
											{
												echo "<tr >";
												echo "<td>$f->nro_grupo</td>";
												echo "<td>$f->nombre_c</td>";
												echo "<td>$f->semestre</td>";
												echo "<td>$f->nombre_m</td>";
												echo "<td>$f->nombres_d</td>";


												echo "<td><a href='buscarGrupos.php?
													x_nrogrupo=$f->nro_grupo&
													x_ncarrera=$f->nombre_c&
													x_semestre=$f->semestre&
													x_materia=$f->nombre_m&
													x_docente=$f->nombres_d&
													x_paternod=$f->paterno_d&
													x_fi=$f->fecha_inicio&
													x_fn=$f->fecha_final
												' > << </a> </td>";
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
	if($_GET["x_nrogrupo"])
	{
	 $_SESSION["s_nrogrupo"]=$_GET["x_nrogrupo"];
	 $_SESSION["s_carrera"]=$_GET["x_ncarrera"];
	 $_SESSION["s_semestre"]=$_GET["x_semestre"];
	 $_SESSION["s_materia"]=$_GET["x_materia"];
	 $_SESSION["s_docente"]=$_GET["x_docente"];
	 $_SESSION["s_paternod"]=$_GET["x_paternod"];
	 $_SESSION["s_inicio"]=$_GET["x_fi"];
	 $_SESSION["s_final"]=$_GET["x_fn"];


	echo "<script> 
	     opener.document.location.reload() 
	     window.close() 
	     </script>";
	}

?>
</body>
</html>