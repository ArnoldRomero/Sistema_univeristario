<?php  
ob_start();
session_start();

	ob_start();
	session_start();

if (isset($_SESSION['s_idusuario']) && $_SESSION['s_privilegio']==1) {
    $id_admin=$_SESSION['s_idusuario'];
    $nombre_usuario=$_SESSION['s_usuario'];
}
else
    header("location: ../index.php");


include_once('clsSemestre.php');
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


<meta name="viewport" content="width=device-width, initial-scale=0.8, user-scalable=no" />
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
					<form id="form1" method="post" action="buscarSemestres.php">
						<fieldset id="form">
						<legend><h4>BUSQUEDA DE CARRERAS Y MATERIAS POR SEMESTRE</h4></legend>
						<table width="342" border="0">
							<tr>
								<td>
									<input name="txtcarrera" type="text" size="20" value="" id="txtcarrera" placeholder="Carrera" />
								</td>
							</tr>
							<tr>
								<td>
									<input name="txtsemestre" type="text" size="20" value="" id="txtsemestre" placeholder="Semestre" />
								</td>
							</tr>
							<tr>
								<td>
									<input name="txtmateria" type="text" size="20" value="" id="txtmateria" placeholder="Materia" />
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

								    	$listax=new CarreraMateria();
								    	
								    	$registros=$listax->Buscar2($_POST['txtcarrera'],$_POST['txtsemestre'],$_POST['txtmateria']);
								    	mostrar($registros);
								    }

								    else{

								    	$todos=new CarreraMateria();
										$registros=$todos->Buscar();
								    		mostrar($registros);
								    }
								  	  		

								  	  	function mostrar($registros)
								  	  	{							  
											echo "<table border='1' align='center'>";
											echo "<tr bgcolor='black' align='left'>
											<td><font color='black'><b>Carrera</b></font></td>
										   <td><font color='black'><b> Semestre</b></font></td>
										   <td><font color='black'><b> Materia </b></font></td>
										   <td><font color='black'><b>*</b></font></td></tr>";
											while($f=mysqli_fetch_object($registros))
											{
												echo "<td>$f->nombre_c</td>";
												echo "<td>$f->semestre</td>";
												echo "<td>$f->nombre_m</td>";

												echo "<td><a href='buscarSemestres.php?
												b_nombrec=$f->nombre_c&
												b_idcar=$f->cod_carrera&
												b_nombrem=$f->nombre_m&
												b_idmat=$f->sigla


												'> >> </a> </td>";
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
	if($_GET["b_idcar"])
	{
	 $_SESSION["s_nombrec"]=$_GET["b_nombrec"];
	 $_SESSION["s_idcar"]=$_GET["b_idcar"];
	 $_SESSION["s_nombrem"]=$_GET["b_nombrem"];
	 $_SESSION["s_idmat"]=$_GET["b_idmat"];

	echo "<script> 
	     opener.document.location.reload() 
	     window.close() 
	     </script>";
	}

	?>
</body>
</html>