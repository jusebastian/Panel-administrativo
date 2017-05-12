<?php
    require('conexion.php');
    session_start();

    if(!empty($_POST)){
        $usuario = mysqli_real_escape_string($mysqli,$_POST['usuario']);
        $password = mysqli_real_escape_string($mysqli,$_POST['password']);
        $error = '';
        
        //incriptando Password
        $sha1_pass=sha1($password);
        //realizando la consulta del usuario si existe allí
        $sql = "SELECT id,id_tipo FROM usuarios WHERE usuario = '$usuario' AND password = '$sha1_pass'";
        $result=$mysqli->query($sql);
        $rows = $result->num_rows;
        
        if($rows>0){
            $row = $result->fetch_assoc();
            $_SESSION['id_usuario']=$row['id'];
            $_SESSION['tipo_usuario']=$row['id_tipo'];
            
            //Redirecionando la pagina web
            header("location:inicio.html");
            
        }else{
            $error="El nombre o contraseña son incorrectos";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="css/">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link href="https://fonts.googleapis.com/css?family=Courgette|Lato" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<title class="fa fa-folder-open">Panel logeo</title>
</head>
<body>

	<div class="boxLogin">
	
		<h1 class="title">Iniciar Sesión</h1>

		<form method="POST" action="<?php $_SERVER['PHP_SELFT']?>" name="fLogin" class="fLogin">
			<labe>Tipo de documento:</labe>
			<select name="documento" class="form-control select " placeholder="Seleciona una opción" autofocus>
				<option value="Selecciona" placeholder="Selecciona">Selecciona</option>
				<option value="Cédula de ciudadania">Cédula de ciudadania</option>
				<option value="Tarjeta de identidad">Tarjeta de identidad</option>
				<option value="Cédula de Extranjería">Cédula de Extranjería</option>
				<option value="Registro civil">Registro civil</option>
				<option value="Pasaporte">Pasaporte</option>
			</select>
			<labe>Número de documento:</labe>
			<input type="namber" name="userName" class="form-control"   placeholder="Documento o Correo electronico" required maxlength="8">
			<labe>Contraseña:</labe>
			<input type="password" name="password" class="form-control"  placeholder="contraseña" required >
			<input type="submit" value="Ingresar" class="btn btn-success">
			
				<p><a href="#" >Olvide mi contraseña</a></p>
				<p><a href="fomulario.html">Registrate</a></p>
		
			
		</form>
	</div>
   <!---Mensaje error--->
    <div style="font-size:16px; color:#cc0000;">
        <?php 
        echo isset($error) ? utf8_decode($error) : ' ' ; ?>
        ?>
    </div>
</body>
</html>