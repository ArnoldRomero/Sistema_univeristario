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
		<title> FINOR | CONSULTAS DOCENTES </title>
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

									<h2 id="content">CONSULTA DOCENTES</h2>

									<!-- Elements -->
									<div class="row 200%">

										<div class="12u$">      
												<!-- Form -->
													<form method="post" action="consultas-docente.php" class="formularios" >
														<div class="row uniform">
															<div class="4u 12u$(xsmall)">
																<input type="text" name="txtregistro" id="demo-name" value="<?php echo $_POST["txtregistro"];?>" placeholder="Registro Docente" />
															</div>

															<div class="8u 12u$">
																<input type="text" name="txtnombre" id="demo-name" value="<?php echo $_POST["txtnombre"];?>" placeholder="Nombres y apellido" />
															</div>

															<div class="12u$" align="center">
																<ul class="actions">
																	<li><input type="submit" name="botones" value="Buscar" class="special" /></li>
																	<li><input type="reset" name="botones" value="Limpiar" /></li>
																</ul>
															</div>

														</div>
													</form>
										</div>
										<div class="12u$">  

											<article>
												<div class="table-wrapper">

													<?php

													if ($_POST['botones']=='Buscar') {
													    $listax=new Docente();
												    	$registros=$listax->Buscarxregnom($_POST['txtnombre'],$_POST['txtregistro']);
												    	mostrarRegistros($registros);
								    				}
								    				else{

															$bus= new Docente();
															$registros=$bus->Buscar();
			            									mostrarRegistros($registros);
	            										}
															function mostrarRegistros($registros){
														    echo "<table align='center'>";
														    echo "<thead>";
														    echo "<tr> 
														                <td>Nro de Registro</td>
														                <td>Nombres</td>
														                <td>A. Paterno</td>
														                <td>A. Materno</td>
														                <td>Sexo</td>
														                <td>Telefono</td>

														             </thead>  
														          </tr>";
														    echo "</thead>";
														    echo "<tbody>";
														    while($fila=mysqli_fetch_object($registros))
														    {
														        echo "<tr>";

														        echo        "<td>$fila->reg_docente</td>";
														        echo        "<td>$fila->nombres_d</td>";
														        echo        "<td>$fila->paterno_d</td>";
														        echo        "<td>$fila->materno_d</td>";
														        echo        "<td>$fila->sexo</td>";
														        echo        "<td>$fila->telefono</td>";
														        

														        echo        "<td><a href='consultas-docente.php?
														        	x_regd=$fila->reg_docente&
														        	x_nombred=$fila->nombres_d&
														        	x_paternod=$fila->paterno_d&
														        	x_maternod=$fila->materno_d&
														        	x_sexo=$fila->sexo&
														        	x_telefono=$fila->telefono&

														        	'> [Editar] </a></td>";
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

<?php 

	if(isset($_GET["x_regd"]))
	{
	 $_SESSION["s_registrod"]=$_GET["x_regd"];
	 $_SESSION["s_nombred"]=$_GET["x_nombred"];
	 $_SESSION["s_paternod"]=$_GET["x_paternod"];
	 $_SESSION["s_maternod"]=$_GET["x_maternod"];
	 $_SESSION["s_sexod"]=$_GET["x_sexo"];
	 $_SESSION["s_telefonod"]=$_GET["x_telefono"];

	 header("location: docentes.php");
	}

?>


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

	</body>
</html>