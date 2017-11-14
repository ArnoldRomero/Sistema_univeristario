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
		<title> FINOR | DOCENTES </title>
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
include_once('clsDocente.php');

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

									<h2 id="content">REGISTRO NUEVO DOCENTE</h2>

									<!-- Elements -->
										<div class="row 200%">

										<div class="12u 12u$(medium)">      
												<!-- Form -->
													<form method="post" action="docentes.php" class="formularios" >
														<div class="row uniform">
															<div class="12u$">
																<input type="hidden" name="txtregistro" id="demo-email" value="<?php  echo $_SESSION['s_registrod']; ?>" placeholder="Nro Registro" />
															</div>
															<div class="12u$">
																<input type="text" name="txtnombres" id="demo-email" value="<?php  echo $_SESSION['s_nombred']; ?>" placeholder="Nombre Completo" />
															</div>
															<div class="6u 12u$(xsmall)">
																<input type="text" name="txtpaterno" id="demo-name" value="<?php  echo $_SESSION['s_paternod']; ?>" placeholder="Apellido Paterno" />
															</div>
															<div class="6u$ 12u$(xsmall)">
																<input type="text" name="txtmaterno" id="demo-email" value="<?php  echo $_SESSION['s_maternod']; ?>" placeholder="Apellido Materno" />
															</div>


															<!-- Break Radio Buttons -->
															<div class="4u 12u$(small)">
																<input type="radio" id="radiom" name="sexo" value="1" checked>
																<label for="radiom">Masculino</label>
															</div>
															<div class="4u 12u$(small)">
																<input type="radio" id="radiof" name="sexo" value="2" <?php if (($_SESSION['s_sexod'])=='F') echo "checked";?>> 
																<label for="radiof">Femenino</label>
															</div>

															<div class="12u$">
																<input type="text" name="txttelefono" id="demo-email" value="<?php  echo $_SESSION['s_telefonod']; ?>" placeholder="Telefono" />
															</div>

															<!-- Botones -->
															<div class="6u 12u$(xsmall)" align="right">
																<ul class='actions'>
																	<li><input type='submit' name='botones' value='Guardar' class='special' /></li>
																	<li><input type='submit' name='botones' value='Nuevo' /></li>
																</ul>
															</div>
															<?php
															if ($_SESSION['s_registrod']!="") 
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
	if ($_POST['txtregistro']) {
		$new = new Docente();
        $new->setRegDocente($_POST['txtregistro']);
        $new->setNombre($_POST['txtnombres']);
        $new->setPaterno($_POST['txtpaterno']);
        $new->setMaterno($_POST['txtmaterno']);
        $new->setTelefono($_POST['txttelefono']);
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
		$new = new Docente();
        $new->setRegDocente($_POST['txtregistro']);
        $new->setNombre($_POST['txtnombres']);
        $new->setPaterno($_POST['txtpaterno']);
        $new->setMaterno($_POST['txtmaterno']);
        $new->setTelefono($_POST['txttelefono']);
        if ($_POST['sexo']==1) {
            $new->setSexo('M');
        }
        else
            $new->setSexo('F');

        if ($new->Modificar()) {
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
		$new = new Docente();
        $new->setRegDocente($_POST['txtregistro']);


        if ($new->Eliminar()) {
            echo "<script type='text/javascript'>alert('Se Elimino Correctamente');</script>";
        }
        else
            echo "<script type='text/javascript'>alert('Error Docente inscrito en un grupo o no existe en la base de datos!!');</script>";
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

    		 $_SESSION["s_registrod"]="";
			 $_SESSION["s_nombred"]="";
			 $_SESSION["s_paternod"]="";
			 $_SESSION["s_maternod"]="";
			 $_SESSION["s_sexod"]="";
			 $_SESSION["s_telefonod"]="";

			 header("location: docentes.php");
       
       break;

}
?>

	</body>
</html>