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
		<title> FINOR | ADMINISTRADOR </title>
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
		include_once('clsDocente.php');
		include_once('clsCarrera.php');
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
									<header class="major" >
										<h2 align="center">PANEL PRINCIPAL DE ADMINISTRACION</h2>
									</header>
									<div class="features">
										<article>
											<span class="icon fa-users"></span>
											<div class="content">
												<h3>Estudiantes</h3>
												<div class="12u$">      
											
													<div class="table-wrapper">
															<table>
																<?php
																$sex=new Estudiante();
																$var=$sex->estudiantesvarones();
																$muj=$sex->estudiantesmujeres();
																$x=mysqli_num_rows($var);
																$y=mysqli_num_rows($muj);

																?>

																	<tr>
																		<td><b>Estudiantes Varones: </b></td>
																		<td><?php echo $x;?></td>
																	</tr>

																	<tr>
																		<td><b>Estudiantes Mujeres: </b></td>
																		<td><?php echo $y;?></td>
																	</tr>
																	<tr>
																		<td><b>Total Estudiantes: </b></td>
																		<td><?php echo $y+$x;?></td>
																	</tr>

														
															</table>
													</div>
												</div>
											</div>
										</article>
										<article>
											<span class="icon fa-user"></span>
											<div class="content">
												<h3>Docentes</h3>
												<div class="12u$">      
											
													<div class="table-wrapper">
															<table>
																<?php
																$doc=new Docente();
																$varones=$doc->docentesvarones();
																$mujeres=$doc->docentesmujeres();
																$xd=mysqli_num_rows($varones);
																$yd=mysqli_num_rows($mujeres);

																?>

																	<tr>
																		<td><b>Docentes Varones: </b></td>
																		<td><?php echo $xd;?></td>
																	</tr>

																	<tr>
																		<td><b>Docentes Mujeres: </b></td>
																		<td><?php echo $yd;?></td>
																	</tr>
																	<tr>
																		<td><b>Total Docentes: </b></td>
																		<td><?php echo $yd+$xd;?></td>
																	</tr>

														
															</table>
													</div>
												</div>
											</div>
										</article>
										<article>
											<span class="icon fa-flag"></span>
											<div class="content">
												<h3>Carrerras</h3>
												<div class="12u$">      
											
													<div class="table-wrapper">
													<?php
													$per= new Carrera();
													$registros=$per->Buscar();
	            									mostrarSiglas($registros);

															function mostrarSiglas($registros){
														    echo "<table align='center'>";

														    echo "<tbody>";
														    while($fila=mysqli_fetch_object($registros))
														    {
														        echo "<tr>";

														        echo        "<td>$fila->nombre_c</td>";
														        
														        echo "</tr>";
														    }
														    echo "</tbody>";
														    echo "</table>";
														  }
													?>
													</div>
												</div>
											</div>
										</article>
										<article>
											<span class="icon fa-book"></span>
											<div class="content">
												<h3>Materias</h3>
												<div class="12u$"> 

													<?php
													$mat=new Materia();
													$m=$doc->buscar();
													$total=mysqli_num_rows($m);

													?>     
											
													<div class="table-wrapper">
															<table>
																<thead>
																	<tr>
																		<td><b> Total de Materias Registradas </b></td>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td><b> <?php echo $total;?></b></td>
																	</tr>
																</tbody>
															</table>
													</div>
												</div>
											</div>
										</article>
									</div>
								</section>

			<!--************************* Section Multimedia INFO ***********************-->
								<section>
									<header class="major">
										<h2>Info Sistema U-FINOR</h2>
									</header>
									<div class="posts">
										<article>
											<a href="#" class="image"><img src="images/pic01.jpg" alt="" /></a>
											<h3>¿Que es esto?</h3>
											<p>Video .</p>
											<ul class="actions">
												<li><a href="#" class="button">Saber Mas</a></li>
											</ul>
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic02.jpg" alt="" /></a>
											<h3>¿Como Registrar?</h3>
											<p>Video tutorial para el uso del Sistema Universitario.</p>
										</article>
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

<!--********************************************* Section  Pagina Informativa*****************************************-->
								<section>
									<header class="major">
										<h2>Pagina Informativa</h2>
									</header>
									<div class="mini-posts">
										<article>
											<a href="#" class="image"><img src="images/pagina.png" alt="" /></a>
											<p>Paguina informativa de la Facultad Integral del Norte.</p>
										</article>
									</div>
									<ul class="actions">
										<li><a href="#" class="button">Visitar</a></li>
									</ul>
								</section>

<!--************************************** Section Mi info *********************************************-->


								<section>
									<header class="major">
										<h2>Mi Info</h2>
									</header>
									<ul class="contact">
										<li class="fa-lock">Id de Administrador: <?php echo $id_admin; ?></li>
										<li class="fa-user"><?php echo $nombre_usuario; ?></li>

									</ul>
								</section>
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