<?php
	ob_start();
	session_start();

if (isset($_SESSION['s_idusuario']) && $_SESSION['s_privilegio']==2) {
    $id_admind=$_SESSION['s_idusuario'];
    $nombre_usuario=$_SESSION['s_usuario'];
}
else
    header("location: ../index.php");

?>


<!DOCTYPE HTML>

<html>
	<head>
		<title> FINOR | ACTAS DE NOTAS </title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/fontello.css">
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

<!--********** Wrapper (Envoltura o Contenedor) **********-->
			<div id="wrapper">

<!--************************** Main ***************************-->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
									<a href="panel.php" class="logo"><strong>FACULTAD INTEGRAL DEL NORTE |</strong> SISTEMA </a>
									<ul class="icons">
										<li class="icon-usuario"><span class="label">Usuario: </span></li>
										<li><span class="label"> Arnold </span></li>
										
										<li><a href="logout.php" class="icon-logout"><span class="label"></span></a></li>
									</ul>
								</header>					

<!--************************************** Section Principal **********************************-->

								<section>

									<h2 id="content">INFORMACION DE LA MATERIA <?php ?></h2>

									<!-- Elements -->
										<div class="row 200%">

										<div class="12u 12u$(medium)">      
												<!-- Form -->
													<form method="post" action="#" class="formularios" >
														<div class="row uniform">
															<div class="12u$">
																<div class="table-wrapper">
																	<table>
																		<thead>
																			<tr>
																				<th colspan="2">DETALLES</th>

																			</tr>
																		</thead>
																		<tbody>
																			<tr >
																				<td width="150">Nro Grupo:</td>
																				<td>Ante turpis integer aliquet porttitor.</td>

																			</tr>
																			<tr>
																				<td width="150">Carrera:</td>
																				<td>Vis ac commodo adipiscing arcu aliquet.</td>

																			</tr>
																			<tr>
																				<td width="150">Materia:</td>
																				<td> Morbi faucibus arcu accumsan lorem.</td>

																			</tr>
																			<tr>
																				<td width="150">Docente:</td>
																				<td>Vitae integer tempus condimentum.</td>

																			</tr>
																			<tr>
																				<td width="150">Fecha de Inicio</td>
																				<td>Ante turpis integer aliquet porttitor.</td>

																			</tr>
																			<tr>
																				<td width="150">Fecha de Final</td>
																				<td>Ante turpis integer aliquet porttitor.</td>

																			</tr>
																		</tbody>

																	</table>
																</div>
															</div>	

															<!-- Botones -->
															<div class="12u$">
																<ul class="actions">
																	<li><input type="submit" value="Imprimir" class="special" /></li>
																	<li><input type="reset" value="Volver" /></li>
																</ul>
															</div>


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
										<li><a href="panel.php">Principal</a></li>
									
										<li>
											<span class="opener">Materias Dictando</span>
											<ul>
												<li><a href="#">Nuevo</a></li>
											</ul>
										</li>
										<li>
											<span class="opener">Notas</span>
											<ul>
												<li><a href="#">Asignar Notas</a></li>

									
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