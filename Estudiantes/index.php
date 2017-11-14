<?php
	ob_start();
	session_start();

if (isset($_SESSION['s_idusuario']) && $_SESSION['s_privilegio']==3) {
    $id_admine=$_SESSION['s_idusuario'];
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
	
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/fontello.css">

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
									<header class="major" >
										<h2 align="center">PANEL PRINCIPAL ESTUDIANTES</h2>
									</header>
									<div class="features">
										<article>
											<div class="table-wrapper">
														<table>
															<thead>
																<tr>
																	<th colspan="2">INFORMACION</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td><b>Nombre: </b></td>
																	<td>Ante turpis integer aliquet porttitor.</td>
																</tr>
																<tr>
																	<td><b>Apellido Paterno: </b></td>
																	<td>Vis ac commodo adipiscing arcu aliquet.</td>
																</tr>
																<tr>
																	<td><b>Apellido Materno: </b></td>
																	<td> Morbi faucibus arcu accumsan lorem.</td>
																</tr>
																<tr>
																	<td><b>Correo: </b></td>
																	<td>Vitae integer tempus condimentum.</td>
																</tr>
																<tr>
																	<td><b>Total Estudiantes: </b></td>
																	<td>Vitae integer tempus condimentum.</td>
																</tr>
																
															</tbody>
														</table>
											</div>
										
										</article>
										<article>
											<blockquote>La enseñanza es más que impartir conocimiento, es inspirar el cambio. El 	aprendizaje es más que absorber hechos, es adquirir entendimiento.
											<p>William Arthur Ward</p>
											</blockquote>
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
											<h3>¿Que es este Sistema?</h3>
											<p>Video  .</p>
											<ul class="actions">
												<li><a href="#" class="button">Saber Mas</a></li>
											</ul>
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic02.jpg" alt="" /></a>
											<h3>¿Como Utilizarlo?</h3>
											<p>Video tutorial dirigido a Docentes para su uso adecuado.</p>
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
												<li><a href="#">Registros de Notas</a></li>
									
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
										<li class="fa-envelope-o"><a href="#">information@untitled.tld</a></li>
										<li class="fa-phone">(000) 000-0000</li>
										<li class="fa-home">1234 Somewhere Road #8254<br />
										Nashville, TN 00000-0000</li>
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