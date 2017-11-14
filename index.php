<?php
ob_start();
  session_start();

if (isset($_SESSION['s_idusuario']) && $_SESSION['s_privilegio']==1) {
    header("location: CPD/index.php");
}
elseif (isset($_SESSION['s_idusuario']) && $_SESSION['s_privilegio']==2) {
    header("location: Docente/index.php");
}

elseif (isset($_SESSION['s_idusuario']) && $_SESSION['s_privilegio']==3) {
    header("location: Estudiantes/index.php");
}

?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=0.8, user-scalable=no"/>
  <title>FINOR | Login</title>
  

  <link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
  <link rel="stylesheet" type="text/css" href="css/index.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/fontello.css">


</head>

<body>

<?php
include_once('clsSesion.php');
?>
  <div class="wrapper" style="margin-top: 160px;">
    <form class="form-signin" action="index.php" method="POST"> 

      <h2 class="form-signin-heading">Bienvenido</h2>
      <input type="text" class="form-control" name="user" placeholder="Usuario" required="" autofocus="" />
      <input type="password" class="form-control" name="password" placeholder="Contraseña" required=""/>      
      
      <button class="btn btn-lg btn-primary btn-block" name="boton" type="submit" value="Enviar">INGRESAR</button>   
    </form>
  </div>

  <?php
  if ($_POST['boton']) {
    $new = new Session();
    $new->setUsuario($_POST['user']);
    $new->setPassword($_POST['password']);

    $registros=$new->Verificar();
    if (mysqli_num_rows($registros)!=0)
    {
      $privilegio=mysqli_fetch_object($registros);
      if ($privilegio->tipo==1) {

          $_SESSION['s_idusuario']=$privilegio->id;
          $_SESSION['s_privilegio']=1;
          $_SESSION['s_usuario']=$privilegio->usuario;
          header("location: CPD/index.php");



         //echo "<script type='text/javascript'>alert('Eres Administrador');</script>";
      }
      else if ($privilegio->tipo==2){

          $_SESSION['s_idusuario']=$privilegio->id;
          $_SESSION['s_privilegio']=2;
          $_SESSION['s_usuario']=$privilegio->usuario;
          header("location: Docentes/index.php");

        //echo "<script type='text/javascript'>alert('Eres Docente');</script>";
      }
      else if ($privilegio->tipo==3) {

          $_SESSION['s_idusuario']=$privilegio->id;
          $_SESSION['s_privilegio']=3;
          $_SESSION['s_usuario']=$privilegio->usuario;
          header("location: Estudiantes/index.php");


        //echo "<script type='text/javascript'>alert('Eres Estudiante');</script>";
      }

    }
    else
      echo "<script type='text/javascript'>alert('No existe este usuario');</script>";



   
  }
  else



  ?>
  
</body>
</html>