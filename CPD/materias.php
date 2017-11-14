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
	
?>


<!DOCTYPE HTML>

<html>
	<head>
		<title> FINOR | MATERIAS </title>
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
include_once('clsMateria.php');
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

									<h2 id="content">REGISTRO NUEVA MATERIA</h2>

									<!-- Elements -->
										<div class="row 200%">

											<div class="12u 12u$(medium)">      
												<!-- Form -->
													<form method="post" action="materias.php" class="formularios" >
														<div class="row uniform">
															<div class="12u$">
																<input type="text" name="txtcodigo" id="demo-email" value="<?php  echo $_SESSION['s_siglam']; ?>" placeholder="Sigla" />
															</div>
															<div class="12u$">
																<input type="text" name="txtnombre" id="demo-email" value="<?php  echo $_SESSION['s_nombrem']; ?>" placeholder="Nombre de Materia" />
															</div>
															<div class="6u$">
																<input type="number" name="txtcreditos" id="demo-email" value="<?php  echo $_SESSION['s_creditos']; ?>" placeholder="Creditos" />
															</div>


															<!-- Botones -->
															<div class="6u 12u$(xsmall)" align="right">
																<ul class="actions">
																	<li><input type="submit" name="botones" value="Guardar" class="special" /></li>
																	<li><input type="submit" name="botones" value="Nuevo" /></li>
																</ul>
															</div>
															<?php
															if ($_SESSION['s_siglam']!="") 
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

	if ($_POST['txtcodigo']) 
    {
		$new = new Materia();
		$new->setSigla($_POST['txtcodigo']);
		$new->setNombre($_POST['txtnombre']);
		$new->setCreditos($_POST['txtcreditos']);
		

		if ($new->Guardar()) 
			echo "<script type='text/javascript'>alert('Se Registro Correctamente');</script>";
		else
			echo "<script type='text/javascript'>alert('La sigla ya se encuentra registrada');</script>";
	}
	else
		echo "<script type='text/javascript'>alert('Es obligatorio una Sigla');</script>";

}

function Eliminar()
{
    if ($_POST['txtcodigo']) 
    {

        $delete=new Materia();
        $delete->setSigla($_POST['txtcodigo']);
        if ($delete->Eliminar())
            echo "<script type='text/javascript'>alert('Se Elimino Correctamente el registro');</script>";
        else
        	echo "<script type='text/javascript'>alert('Error, No existen los registros en la Base de Datos');</script>";
    }
    else
 		    echo "<script type='text/javascript'>alert('Es obligatorio una Sigla de Materia');</script>";

}

function Modificar()
{
    if ($_POST['txtcodigo'])
     {
        $mod=new Materia();
        $mod->setSigla($_POST['txtcodigo']);
        $mod->setNombre($_POST['txtnombre']);
        $mod->setCreditos($_POST['txtcreditos']);
        if ($mod->Modificar()) 
            echo "<script type='text/javascript'>alert('Se modificaron correctamente');</script>";
        }
        else
            echo "<script type='text/javascript'>alert('No se editaron los datos verifique e intente nuevamente');</script>";
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

    		 $_SESSION["s_siglam"]="";
			 $_SESSION["s_nombrem"]="";
			 $_SESSION["s_creditos"]="";


			 header("location: materias.php");
       
       break;

}
?>

	</body>
</html>