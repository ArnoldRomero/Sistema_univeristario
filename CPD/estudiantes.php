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
		<title> FINOR | ESTUDIANTES </title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/fontello.css">
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<?php 
		include_once('clsEstudiante.php');
		include_once('clsCarrera.php');
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

									<h2 id="content">REGISTRO NUEVO ESTUDIANTE</h2>

									<!-- Elements -->
										<div class="row 200%">

										<div class="12u 12u$(medium)">      
												<!-- Form -->
													<form method="POST" action="estudiantes.php" class="formularios" >
														<div class="row uniform">
															<div class="12u$">
																<input type="text" name="txtregistro" id="demo-email" value="<?php  echo $_SESSION['s_registro']; ?>" placeholder="Nro Registro" />
															</div>
															<div class="12u$">
																<input type="text" name="txtnombres" id="demo-email" value="<?php  echo $_SESSION['s_nombre']; ?>" placeholder="Nombre Completo" />
															</div>
															<div class="6u 12u$(xsmall)">
																<input type="text" name="txtpaterno" id="demo-name" value="<?php  echo $_SESSION['s_paterno']; ?>" placeholder="Apellido Paterno" />
															</div>
															<div class="6u$ 12u$(xsmall)">
																<input type="text" name="txtmaterno" id="demo-email" value="<?php  echo $_SESSION['s_materno']; ?>" placeholder="Apellido Materno" />
															</div>
															<div class="12u$">
																<input type="email" name="txtemail" id="demo-email" value="<?php  echo $_SESSION['s_email']; ?>" placeholder="Correo Electronico" />
															</div>

															<!-- Break Radio Buttons -->
															<div class="4u 12u$(small)">
																<input type="radio" id="radiom" name="sexo" value="1" checked>
																<label for="radiom">Masculino</label>
															</div>
															<div class="4u 12u$(small)">
																<input type="radio" id="radiof" name="sexo" value="2" <?php if (($_SESSION['s_sexo'])=='F') echo "checked";?>> 
																<label for="radiof">Femenino</label>
															</div>

															<div class="12u$">
																<div class="select-wrapper">
																	<?php     
										                                $obj=new Carrera();
										                                $reg=$obj->Buscar();
										                             
										                                    echo "<select name='cboIdCarrera' id='demo-category' value='$cod_carrera'/>";
										                                while ($fila=mysqli_fetch_array($reg))
										                                {
										                                ?>
										                                <option 
										                                <?php  if($_SESSION['s_codcarrera']==$fila['cod_carrera']) 
										                                    echo "selected";  else ?>  
										                                    value="<?php  echo $fila['cod_carrera']; ?>">
										                                <?php  echo $fila['nombre_c'];  
										                                echo "</option>";       
										                              }
										                              echo "</select>"; 
										                              ?>
																</div>
															</div>

															<!-- Botones -->

															<div class="6u 12u$(xsmall)" align="right">
																<ul class='actions'>
																	<li><input type='submit' name='botones' value='Guardar' class='special' /></li>
																	<li><input type='submit' name='botones' value='Nuevo' /></li>
																</ul>
															</div>
															<?php
															if ($_SESSION['s_registro']!="") 
															{
																echo "<div class='6u 12u$(xsmall)' align='left'>
																		<ul class='actions'>
																			<li><input type='submit' name='botones' value='Modificar' class='special' /></li>
																			<li><input type='submit' name='botones' value='Eliminar' /></li>
																		</ul>
																	</div>";
															}
															?>
															
															
														</div>
													</form>
										</div>    
										</div>
<?php 
function Guardar()
{
	if ($_POST['txtregistro']) {
		$new = new Estudiante();
        $new->setRegEstudiante($_POST['txtregistro']);
        $new->setNombre($_POST['txtnombres']);
        $new->setPaterno($_POST['txtpaterno']);
        $new->setMaterno($_POST['txtmaterno']);
        $new->setEmail($_POST['txtemail']);
        $new->setCarrera($_POST['cboIdCarrera']);

        if ($_POST['sexo']==1) {
            $new->setSexo('M');
        }
        else
            $new->setSexo('F');

        if ($new->Guardar()) {
            echo "<script type='text/javascript'>alert('Se Registro Correctamente');</script>";
        }
        else
            echo "<script type='text/javascript'>alert('Ya Existe este Numero de Registro');</script>";
  	}
  	else

  		echo "<script type='text/javascript'>alert('Se necesita Obligatoriamente un Registro');</script>";
 
}

function Modificar()
{
	if ($_POST['txtregistro']) {
		$update = new Estudiante();
        $update->setRegEstudiante($_POST['txtregistro']);
        $update->setNombre($_POST['txtnombres']);
        $update->setPaterno($_POST['txtpaterno']);
        $update->setMaterno($_POST['txtmaterno']);
        $update->setEmail($_POST['txtemail']);
        $update->setCarrera($_POST['cboIdCarrera']);

        if ($_POST['sexo']==1) {
            $update->setSexo('M');
        }
        else
            $update->setSexo('F');

        if ($update->Modificar()) {
            echo "<script type='text/javascript'>alert('Se Modifico Correctamente');</script>";
        }
        else
            echo "<script type='text/javascript'>alert('Ya Existe este Numero de Registro');</script>";
  	}
  	else

  		echo "<script type='text/javascript'>alert('Se necesita Obligatoriamente un Registro');</script>";
 
}

function Eliminar()
{
	if ($_POST['txtregistro']) {
		$new = new Estudiante();
        $new->setRegEstudiante($_POST['txtregistro']);


        if ($new->Eliminar()) {
            echo "<script type='text/javascript'>alert('Se Elimino Correctamente');</script>";
        }
        else
            echo "<script type='text/javascript'>alert('No existe el Registro');</script>";
  	}
  	else

  		echo "<script type='text/javascript'>alert('Se necesita Obligatoriamente un Registro');</script>";
 
}



switch ($_POST['botones']) {
    case 'Guardar':
        Guardar();
       break;
    case 'Eliminar':
        Eliminar();
       break;
    case 'Modificar':
        Modificar();
       break;

    case 'Nuevo':

    		 $_SESSION["s_registro"]="";
			 $_SESSION["s_nombre"]="";
			 $_SESSION["s_paterno"]="";
			 $_SESSION["s_materno"]="";
			 $_SESSION["s_sexo"]="";
			 $_SESSION["s_email"]="";
			 $_SESSION["s_codcarrera"]="";
			 header("location: estudiantes.php");
       
       break;

}
?>
								</section>
						</div> <!--Fin  class inner-->
					</div> <!--Fin  class inner-->

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

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

<!--********************************************** Codigo PHP ********************************************-->




<!--********************************************** ************* ********************************************-->


	</body>
</html>