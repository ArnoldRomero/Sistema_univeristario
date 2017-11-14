<?php 
	ob_start();
	session_start();

if (isset($_SESSION['s_idusuario']) && $_SESSION['s_privilegio']==1) {
    $id_admin=$_SESSION['s_idusuario'];
    $nombre_usuario=$_SESSION['s_usuario'];
}
else
    header("location: ../index.php");
?>


<!DOCTYPE HTML>

<html>
	<head>
		<title> FINOR | INSCRIPCIONES </title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/fontello.css">

		<script> 

	    var miPopup 
	    function abreBuscarEstudiante(){ 
	        miPopup = window.open("buscarEstudiantes.php","miwin","width=410,height=350,scrollbars=yes")
	         miPopup.focus() 
	    } 
	    var miPopup2 
	    function abreBuscarGrupos(){ 
	        miPopup2 = window.open("buscarGrupos.php","miwin","width=510,height=350,scrollbars=yes")
	         miPopup.focus() 
	    } 

	    </script>

	</head>
	<body>
<?php 
	include_once('clsGrupoEstudiante.php');
?>
<!--********** Wrapper (Envoltura o Contenedor) **********-->
			<div id="wrapper">

<!--************************** Main ***************************-->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
									<a href="index.php" class="logo"><strong>FACULTAD INTEGRAL DEL NORTE |</strong> SISTEMA </a>
									<ul class="icons">
										<li class="icon-usuario"><span class="label">Usuario: </span></li>
										<li><span class="label"> <?php echo $nombre_usuario;?> </span></li>
										
										<li><a href="logout.php" class="icon-logout"><span class="label"></span></a></li>
									</ul>
								</header>					

<!--************************************** Section Principal **********************************-->

								<section>

									<h2 id="content">INSCRIBIR A MATERIA</h2>

									<!-- Elements -->
									<div class="row 200%">

										<div class="6u 12u$(medium)">      
												<!-- Form -->
													<form method="post" action="inscripciones.php" class="formularios" >
														<div class="row uniform">
															<div class="8u 12u$(xsmall)">
																<input type="text" name="txtregistro" id="demo-name" value="<?php echo $_SESSION["s_registro"];?>" placeholder="Registro Estudiante" />
															</div>

															<div class="4u 12u$">
																<ul class="actions">
																	<li><a href="#" class="button special icon fa-search" onClick="abreBuscarEstudiante()" >Buscar</a></li>
																</ul>
															</div>

															<div class="12u$">
																<input type="text" name="txtnombreap" id="demo-name" value="<?php echo $_SESSION["s_nombre"]." ".$_SESSION["s_paterno"];?>" placeholder="Nombre de Estudiante" />
															</div>
															<div class="8u 12u$(xsmall)">
																<input type="hidden" name="txtcodigo" id="demo-name" value="<?php echo $_SESSION["s_nrogrupo"];?>" placeholder="Materia" />
																<input type="text" name="txtmateria" id="demo-name" value="<?php echo $_SESSION["s_materia"];?>" placeholder="Materia" />
															</div>

															<div class="4u 12u$">
																<ul class="actions">
																	<li><a href="#" class="button special icon fa-search" onClick="abreBuscarGrupos()">Buscar</a></li>
																</ul>
															</div>

															

																	<div class='12u$''>
																			<input type='text' name='txtnota' id='demo-name' value="<?php echo $_SESSION['s_nota'];?>" placeholder='Nota de Estudiante'  
																			<?php
																			if (isset($_SESSION['s_nota']) && $_SESSION['s_nota']!="") {
																					echo "readonly";
																				}
																			?>
																			 />
																			</div>
																
																	
															

															<!-- Botones -->

															<div class="12u 12u$(xsmall)" align="center">
																<ul class="actions">
																	<li><input type="submit" name="botones" value="Guardar" class="special" /></li>
																	<li><input type="submit" name="botones" value="Nuevo" /></li>
																</ul>
															</div>
															

															<?php
															if ($_SESSION['s_botones']=1) 
															{
																echo "<div class='12u 12u$(xsmall)' align='center'>
																		<ul class='actions'>
																			<li><input type='submit' name='botones' value='Retirar' class='special' /></li>";
																if ( $_SESSION['s_nota']==""){
																		echo "<li><input type='submit' name='botones' value='Calificar' /></li>";
																}


																echo	"	</ul>
																	</div>";
															}
															?>
															<div class="12u$">
																 <hr class="major" />
																 <br>
															</div>

														</div>
													</form>
										</div>
										<div class="6u 12u$(medium)">      
											
												<div class="table-wrapper">
														<table>
															<thead>
																<tr>
																	<th colspan="2">INFORMACION DE GRUPO [ <?php echo $_SESSION["s_materia"];?> ]</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td><b>Grupo: </b></td>
																	<td><?php echo $_SESSION["s_nrogrupo"];?></td>
																</tr>
																<tr>
																	<td><b>Carrera: </b></td>
																	<td><?php echo $_SESSION["s_carrera"];?></td>
																</tr>
																<tr>
																	<td><b>Semestre: </b></td>
																	<td><?php echo $_SESSION["s_semestre"];?></td>
																</tr>
																<tr>
																	<td><b>Materia: </b></td>
																	<td><?php echo $_SESSION["s_materia"];?></td>
																</tr>
																<tr>
																	<td><b>Docente: </b></td>
																	<td><?php echo $_SESSION["s_docente"]." ".$_SESSION["s_paternod"];?></td>
																</tr>
																<tr>
																	<td><b>Inicio de Actividades: </b></td>
																	<td><?php echo $_SESSION["s_inicio"];?></td>
																</tr>
																<tr>
																	<td><b>Fin de Actividades: </b></td>
																	<td><?php echo $_SESSION["s_final"];?></td>
																</tr>
																
															</tbody>
														</table>
												</div>
											</div>
									

								</section>
						</div> <!--Fin  class inner-->
					</div> <!--Fin  class inner-->

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

<!--********************************************** Buscar Deshabilitado ********************************************
								<section id="search" class="alt">
									<form method="post" action="#">
										<input type="text" name="query" id="query" placeholder="Search" />
									</form>
								</section> -->

<!--************************************************* Menu Priniciál ********************************************-->
								<nav id="menu">
									<header class="major">
										<h2>Menu</h2>
									</header>
									<ul>
										<li><a href="index.php">Principal</a></li>
										<li>
											<span class="opener">CPD</span>
											<ul>
												<li><a href="inscripciones.php">Inscrip | Adicion | Retiros</a></li>
												<li><a href="consultas-cpd.php">Consultas</a></li>
											</ul>
										</li>
										<li>
											<span class="opener">Estudiantes</span>
											<ul>
												<li><a href="estudiantes.php">Nuevo</a></li>
												<li><a href="consultas-estudiante.php">Consultas</a></li>
											</ul>
										</li>
										<li>
											<span class="opener">Docentes</span>
											<ul>
												<li><a href="docentes.php">Nuevo</a></li>
												<li><a href="consultas-docente.php">Consultas</a></li>
									
											</ul>
										</li>
										<li>
											<span class="opener">Carreras</span>
											<ul>
												<li><a href="carreras.php">Nuevo</a></li>
												<li><a href="semestre.php">Asignar Materias</a></li>
												<li><a href="consultas-semestre.php">Consultas</a></li>
											</ul>

										</li>
										<li>
											<span class="opener">Materias</span>
											<ul>
												<li><a href="materias.php">Nuevo</a></li>
												<li><a href="consultas-materia.php">Estadisticas</a></li>
											</ul>
											
										</li>
										<li>
											<span class="opener">Grupos</span>
											<ul>
												<li><a href="grupos.php">Nuevo</a></li>
												<li><a href="consultas-grupo.php">Estadisticas</a></li>
											</ul>
											
										</li>
									</ul>
								</nav>


<!--****************************** Footer (Pie de Pagina)********************************************-->
								<footer id="footer">
									<p class="copyright">&copy; Sistema Universitario. FACULTAD INTEGRAL DEL NORTE
									</p>
									<p class="copyright"> Design: <a href="https://html5up.net">LaberintoTECH</a>.</p>
								</footer>

						</div>
					</div>

			</div> <!--Fin Wrapper (contenedor)-->


			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>


<?php 

function Guardar()
{

	if ($_POST['txtregistro']) 
    {
		$new = new GrupoEstudiante();

		$new->setRegEstudiante($_POST['txtregistro']);
		$new->setNroGrupo($_POST['txtcodigo']);

		if ($new->Guardar()) 
			echo "<script type='text/javascript'>alert('Se Registro Correctamente');</script>";
		else
			echo "<script type='text/javascript'>alert('El Nro de registro ya se encuentra registrado');</script>";
	}
	else
		echo "<script type='text/javascript'>alert('Es obligatorio el Nro de Grupo y Registro de Estudiante');</script>";
}

function Eliminar()
{
    if ($_POST['txtcodigo']) 
    {

        $delete = new GrupoEstudiante();

		$delete->setRegEstudiante($_POST['txtregistro']);
		$delete->setNroGrupo($_POST['txtcodigo']);

        if ($delete->Eliminar())
            echo "<script type='text/javascript'>alert('Se Elimino Correctamente el registro');</script>";
        else
        	echo "<script type='text/javascript'>alert('Error, no se enviaron los datos correctos');</script>";
    }
    else
 		    echo "<script type='text/javascript'>alert('Es obligatorio el Nro de Grupo y Registro de Estudiante');</script>";
}

function Modificar()
{
    if ($_POST['txtcodigo'])
     {
        $new = new GrupoEstudiante();

		$new->setRegEstudiante($_POST['txtregistro']);
		$new->setNroGrupo($_POST['txtcodigo']);
		$new->setNota($_POST['txtnota']);
		if ($new->GuardarNota()) 
		{
			echo "<script type='text/javascript'>alert('Se Registro la Nota Correctamente');</script>";
		}

		else
			echo "<script type='text/javascript'>alert('Error, no se registraron los datos');</script>";

	}
	else
		echo "<script type='text/javascript'>alert('Es obligatorio el Nro de Grupo y Registro de Estudiante');</script>";

}


switch ($_POST['botones']) {

    case 'Nuevo':
         $_SESSION["s_nrogrupo"]="";
		 $_SESSION["s_registro"]="";
		 $_SESSION["s_nombre"]="";
		 $_SESSION["s_paterno"]="";
		 $_SESSION["s_materia"]="";
		 $_SESSION["s_nota"]="";
		 $_SESSION["s_semestre"]="";
		 $_SESSION["s_carrera"]="";
		 $_SESSION["s_inicio"]="";
		 $_SESSION["s_final"]="";
		 $_SESSION["s_docente"]="";
		 $_SESSION["s_paternod"]="";
		 $_SESSION["botones"]=0;
		 header("location: inscripciones.php");
        break;
    case 'Guardar':
        Guardar();
       break;
    case 'Calificar':
        Modificar();
       break;
    case 'Retirar':
        Eliminar();
       break;

}

?>

	</body>
</html>