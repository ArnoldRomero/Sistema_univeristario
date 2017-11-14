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
		<title> FINOR | CARRERAS </title>
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

									<h2 id="content">REGISTRO NUEVA CARRERA</h2>

									<!-- Elements -->
									<div class="row 200%">

										<div class="6u 12u$(medium)">      
												<!-- Form -->
													<form method="post" action="carreras.php" class="formularios" >
														<div class="row uniform">
															<div class="12u$">
																<input type="text" name="txtcodigo" id="demo-email" value="<?php echo $_GET['x_codigo'];?>" placeholder="Codigo de Carrera" />
															</div>
															<div class="12u$">
																<input type="text" name="txtnombre" id="demo-email" value="<?php echo $_GET['x_nombre'];?>" placeholder="Nombre de Carrera" />
															</div>
															<div class="12u$">
																<textarea name="txtdescripcion" id="demo-message" placeholder="Descripcion" rows="6"><?php echo $_GET['x_desc'];?></textarea>
															</div>

															<!-- Botones -->
															<div class="6u 12u$(xsmall)" align="right">
																<ul class="actions">
																	<li><input type="submit" name="botones" value="Guardar" class="special" /></li>
																	<li><input type="submit" name="botones" value="Nuevo" /></li>
																</ul>
															</div>
															<div class="6u 12u$(xsmall)" align="right">
																<ul class="actions">
																	<li><input type="submit" name="botones" value="Modificar" class="special" /></li>
																	<li><input type="submit" name="botones" value="Eliminar" /></li>
																</ul>
															</div>

														</div>
													</form>
										</div>
										<div class="6u 12u$(medium)">  

											<article>
												<div class="table-wrapper">
													<?php
													$per= new Carrera();
													$registros=$per->Buscar();
	            									mostrarSiglas($registros);

															function mostrarSiglas($registros){
														    echo "<table align='center'>";
														    echo "<thead>";
														    echo "<tr> 
														                <td>Codigo</td>
														                <td>Carrera</td>
														                <td>Descripcion</td>
														             </thead>  
														          </tr>";
														    echo "</thead>";
														    echo "<tbody>";
														    while($fila=mysqli_fetch_object($registros))
														    {
														        echo "<tr>";

														        echo        "<td>$fila->cod_carrera</td>";
														        echo        "<td>$fila->nombre_c</td>";
														        echo        "<td>[Leer]</td>";
														        

														        echo        "<td><a href='carreras.php?x_codigo=$fila->cod_carrera&x_nombre=$fila->nombre_c&x_desc=$fila->descripcion'> [Editar] </a></td>";
														        echo "</tr>";
														    }
														    echo "</tbody>";
														    echo "</table>";
														  }
													?>
												</div>
										
											</article>
													
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
												<li><a href="inscripciones.php">Inscrip|Adicion|Retiros</a></li>
												<li><a href="notas.php">NOTAS</a></li>
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
		$new = new Carrera();
		$new->setCod_carrera($_POST['txtcodigo']);
		$new->setNombre($_POST['txtnombre']);
		$new->setDescripcion($_POST['txtdescripcion']);

		if ($new->Guardar()) 
			echo "<script type='text/javascript'>alert('Se Registro Correctamente');</script>";
		else
			echo "<script type='text/javascript'>alert('El Nro de registro ya se encuentra registrado');</script>";
	}
	else
		echo "<script type='text/javascript'>alert('Es obligatorio un Codigo de Carrera');</script>";
}

function Eliminar()
{
    if ($_POST['txtcodigo']) 
    {

        $delete=new Carrera();
        $delete->setCod_carrera($_POST['txtcodigo']);
        if ($delete->Eliminar())
            echo "<script type='text/javascript'>alert('Se Elimino Correctamente el registro');</script>";
        else
        	echo "<script type='text/javascript'>alert('Error, no se enviaron los datos correctos');</script>";
    }
    else
 		    echo "<script type='text/javascript'>alert('Es obligatorio un Codigo de Carrera');</script>";
}

function Modificar()
{
    if ($_POST['txtcodigo'])
     {
        $mod=new Carrera();
        $mod->setCod_carrera($_POST['txtcodigo']);
        $mod->setNombre($_POST['txtnombre']);
        $mod->setDescripcion($_POST['txtdescripcion']);
        if ($mod->Modificar()) 
            echo "<script type='text/javascript'>alert('Se modificaron correctamente');</script>";
        }
        else
            echo "<script type='text/javascript'>alert('No se editaron los datos verifique e intente nuevamente');</script>";
    }


switch ($_POST['botones']) {

    case 'Nuevo':
        # code...
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