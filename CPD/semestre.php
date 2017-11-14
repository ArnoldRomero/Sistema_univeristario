
<?php 
	ob_start();
	session_start();

if (isset($_SESSION['s_idusuario']) && $_SESSION['s_privilegio']==1) {
    $id_admin=$_SESSION['s_idusuario'];
    $nombre_usuario=$_SESSION['s_usuario'];
}
else
    header("location: ../index.php");



include_once('clsMateria.php');
include_once('clsCarrera.php');
?>


<!DOCTYPE HTML>

<html>
	<head>
		<title> FINOR | SEMESTRES </title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/fontello.css">
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->

    <script> 

    var miPopup 
    function abreBuscarMaterias(){ 
        miPopup = window.open("buscarMaterias.php","miwin","width=410,height=350,scrollbars=yes")
         miPopup.focus() 
    } 

    </script>




	</head>
	<body>

		<?php 
		include_once('clsSemestre.php');

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
								</header>>					

<!--************************************** Section Principal **********************************-->

								<section>

									<h2 id="content">ASIGNAR MATERIAS A CARRERA</h2>

									<!-- Elements -->
										<div class="row 200%">

											<div class="12u 12u$(medium)">      
												<!-- Form -->
													<form method="POST" action="semestre.php" class="formularios" >

														<div class="row uniform">
															<div class="8u 12u$(xsmall)">
																<input type="hidden" name="txtcodigo" id="demo-name" value="<?php echo $_SESSION['id_sigla'];?>" placeholder="Codigo" />

																<input type="text" name="txtmateria" id="demo-name" value="<?php echo $_SESSION['nombre_mat'];?>" placeholder="Materia" />
															</div>

															<div class="4u 12u$">
																<ul class="actions">
																	<li><a href="#" class="button special icon fa-search" onClick="abreBuscarMaterias()" >Buscar</a></li>
																</ul>
															</div>
															<div class="8u 12u$">
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
															<div class="8u 12u$(xsmall)">

																<input type="number" name="txtsemestre" id="demo-name" value="<?php echo $_SESSION['s_semestre'];?>" placeholder="Semestre" />
															</div>

															<!-- Botones -->
															<div class="6u 12u$(xsmall)" align="right">
																<ul class='actions'>
																	<li><input type='submit' name='botones' value='Guardar' class='special' /></li>
																	<li><input type='submit' name='botones' value='Nuevo' /></li>
																</ul>
															</div>
															<?php
															if ($_SESSION['s_semestre']!="") 
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

<?php 

function Guardar()
{

    if ($_POST['txtcodigo'] && $_POST['cboIdCarrera']) 
    {
        $new = new CarreraMateria();
        $new->setSemestre($_POST['txtsemestre']);
        $new->setSigla($_POST['txtcodigo']);
        $new->setCodCarrera($_POST['cboIdCarrera']);
        if ($new->Guardar()) 
            echo "<script type='text/javascript'>alert('Se asignaron correctamente los Datos ');</script>";
        
        else
            echo "<script type='text/javascript'>alert('Error al registrar, compruebe que todos los campos esten rellenos');</script>";
    }
    else
        echo "<script type='text/javascript'>alert('Es obligatorio una Sigla y Codigo de Materia');</script>";
}

function Eliminar()
{
    if ($_POST['txtcodigo']) 
    {

        $sem=new CarreraMateria();

        $sem->setSigla($_POST['txtcodigo']);
        $sem->setCodCarrera($_POST['cboIdCarrera']);

        if ($sem->eliminar())
            echo "<script type='text/javascript'>alert('Se ELIMINARON correctamente los Datos ');</script>";
        else
        	echo "<script type='text/javascript'>alert('Error al Eliminar no Existen los registros en la Base de Datos');</script>";
    }
    else
    	echo "<script type='text/javascript'>alert('Se Necesita obligatoriamente los traer los datos desde Consultas');</script>";
}

function Modificar()
{
    if ($_POST['txtcodigo'])
     {
        $mod=new CarreraMateria();
        $mod->setSemestre($_POST['txtsemestre']);
        $mod->setSigla($_POST['txtcodigo']);
        $mod->setCodCarrera($_POST['cboIdCarrera']);


        if ($mod->Modificar()) 
            echo "<script type='text/javascript'>alert('Se ACTUALIZARON correctamente los Datos ');</script>";
        else
        	echo "<script type='text/javascript'>alert('Error al ACTUALIZAR no Existen los registros en la Base de Datos');</script>";
     }
     else
         echo "<script type='text/javascript'>alert('ERROR se necesita traer los datos desde consultas');</script>";


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

    		 $_SESSION["s_codcarrera"]="";
			 $_SESSION["id_sigla"]="";
			 $_SESSION["nombre_mat"]="";
			 $_SESSION["s_semestre"]="";

			 header("location: semestre.php");
       
       break;

}
?>


<!--********************************************** ************* ********************************************-->


	</body>
</html>