<?php 
	ob_start();
	session_start();

if (isset($_SESSION['s_idusuario']) && $_SESSION['s_privilegio']==1) {
    $id_admin=$_SESSION['s_idusuario'];
    $nombre_usuario=$_SESSION['s_usuario'];
}
else
    header("location: ../index.php");


   
include_once('clsSemestre.php');
include_once('clsDocente.php');
?>

<!DOCTYPE HTML>

<html>
	<head>
		<title> FINOR | GRUPOS </title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/fontello.css">
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<script> 

	    var miPopup 
	    function abreBuscarSemestre(){ 
	        miPopup = window.open("buscarSemestres.php","miwin","width=410,height=350,scrollbars=yes")
	         miPopup.focus() 
	    }

	    var miPopup2
	    function abreBuscarDocentes(){
	        miPopup = window.open("buscarDocentes.php","miwin","width=410,height=350,scrollbars=yes")
	         miPopup.focus() 
	    }

	    </script>
	</head>
	<body>
<?php
include_once('clsGrupo.php');
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

									<h2 id="content">REGISTRO NUEVO GRUPO</h2>

									<!-- Elements -->
										<div class="row 200%">

										<div class="12u 12u$(medium)">      
												<!-- Form -->
													<form method="post" action="grupos.php" class="formularios" >
														<div class="row uniform">
<!--*********************** INICIO FORMULARIO **************************-->
							
															<div class="6u 12u$(xsmall)">
																<input type="hidden" name="txtnrogrupo" value="<?php echo $_SESSION["s_nrogrupo"]; ?>">

<!--** txtnombrecarrera **-->																	
																<input type="hidden" name="txtcodcarrera" value="<?php echo $_SESSION["s_idcar"]; ?>">
																<input type="text" name="txtnombrecarrera" id="demo-name" value="<?php echo $_SESSION["s_nombrec"]; ?>" placeholder="Carrera" />
															</div>
<!--** txtnombremateria **-->								
															<div class="6u$ 12u$(xsmall)">
																<input type="hidden" name="txtcodmateria" value="<?php echo $_SESSION["s_idmat"]; ?>">
																<input type="text" name="txtnombremateria" id="demo-email" value="<?php echo $_SESSION["s_nombrem"]; ?>" placeholder="Materia" />
															</div>
<!--** Boton buscar Semestre **-->
															<div class="12u$" align="center">
																<ul class="actions">
																	<li><a href="#" class="button special icon fa-search" onClick="abreBuscarSemestre()">Buscar Materia Semestralizada</a></li>
																</ul>
															</div>
<!--** txtnomdocente **-->
															<div class="12u$" align="center">
																<hr class="major" />
																<input type="hidden" name="txtcoddocente" value="<?php echo $_SESSION["s_idoc"]; ?>">
																<input type="text" name="txtnomdocente" id="demo-email" value="<?php echo $_SESSION["s_nombred"]." ".$_SESSION['s_paternod']; ?>" placeholder="Nombre y Apellido" />
															</div>
<!--** Buscar Docente **-->
															<div class="12u$" align="center">
																<ul class="actions">
																	<li><a href="#" class="button special icon fa-search" onClick="abreBuscarDocentes()">Buscar Docente</a></li>
																</ul>
															</div>
<!--** txt gestion **-->
															<div class="12u$" align="center">
																<input type="text" name="txtgestion" id="demo-email" value="<?php echo $_SESSION["s_gestion"]; ?>" placeholder="Gestion" />
															</div>
<!--** txt f inicio **-->
															<div class="6u 12u$(xsmall)">
																Fecha Inicio: <input type="date" name="txtfinicio" id="demo-name" value="<?php echo $_SESSION["s_finicio"]; ?>" placeholder="Fecha Inicio" />
															</div>
<!--** txt f final **-->
															<div class="6u 12u$(xsmall)">
																Fecha Final: <input type="date" name="txtffinal" id="demo-email" value="<?php echo $_SESSION["s_ffinal"]; ?>" placeholder="Fecha Final" />
															</div>

					<!-- Botones -->
															<div class="6u 12u$(xsmall)" align="right">
																<ul class="actions">
																	<li><input type="submit" name="botones" value="Guardar" class="special" /></li>
																	<li><input type="submit" name="botones" value="Nuevo" /></li>
																</ul>
															</div>
															<?php
															if ($_SESSION['s_nrogrupo']!="") 
															{
																echo "<div class='6u$ 12u$(xsmall)' align='left'>
																		<ul class='actions'>
																			<li><input type='submit' name='botones' value='Modificar' class='special' /></li>
																			<li><input type='submit' name='botones' value='Eliminar' /></li>
																		</ul>
																	</div>";
															}
															?>

<!--*********************** FIN FORMULARIO **************************-->
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

    if ($_POST['txtcodmateria'] && $_POST['txtcodcarrera'] && $_POST['txtcoddocente']) 
    {
        $new = new Grupo();
        $new->setfechaini($_POST['txtfinicio']);
        $new->setfechafin($_POST['txtffinal']);
        $new->setGestion($_POST['txtgestion']);
        $new->setRegDocente($_POST['txtcoddocente']);
        $new->setCodCarrera($_POST['txtcodcarrera']);
        $new->setSigla($_POST['txtcodmateria']);
        
        if ($new->Guardar()) 
            echo "<script type='text/javascript'>alert('Se Registro Correctamente');</script>";
        
        else
            echo "<script type='text/javascript'>alert('¡Error al registrar!');</script>";        

    }
    else
        echo "<script type='text/javascript'>alert('Error! son obligatorios algunos campos');</script>";;
}

function Modificar()
{
	if ($_POST['txtnrogrupo']) {
		$update = new Grupo();
		$update->setNroGrupo($_POST['txtnrogrupo']);
        $update->setGestion($_POST['txtgestion']);
        $update->setfechaini($_POST['txtfinicio']);
        $update->setfechafin($_POST['txtffinal']);

        if ($update->Modificar()) {
            echo "<script type='text/javascript'>alert('Se Modifico Correctamente');</script>";
        }
        else
            echo "<script type='text/javascript'>alert('No existe el numero de Grupo en la Base de Datos');</script>";
  	}
  	else

  		echo "<script type='text/javascript'>alert('Se necesita Obligatoriamente un Nro de Grupo');</script>";
 
}

function Eliminar()
{
	if ($_POST['txtnrogrupo']) {
		$del = new Grupo();
        $del->setNroGrupo($_POST['txtnrogrupo']);


        if ($del->Eliminar()) {
            echo "<script type='text/javascript'>alert('Se Elimino Correctamente');</script>";
        }
        else
            echo "<script type='text/javascript'>alert('No existe el Registro');</script>";
  	}
  	else

  		echo "<script type='text/javascript'>alert('Se necesita Obligatoriamente un Registro');</script>";
 
}




switch ($_POST['botones']) {

    case 'Nuevo':
    		$_SESSION["s_nrogrupo"]="";
			$_SESSION["s_nombrem"]="";
			$_SESSION["s_nombrec"]="";
			$_SESSION["s_nombred"]="";
			$_SESSION["s_paternod"]="";
			$_SESSION["s_ffinal"]="";
			$_SESSION["s_finicio"]="";
			$_SESSION["s_gestion"]="";

			header("location: grupos.php");

        break;
    case 'Guardar':
        Guardar();
       break;

    case 'Modificar':
       	Modificar();
       break;

    case 'Eliminar':
       	Eliminar();
       break;



}

?>

	</body>
</html>