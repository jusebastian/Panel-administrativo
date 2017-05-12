<?php
$usuario=$_POST['usuario'];
$password=$_POST['password'];

//conectar a la base de datos
$conexion=mysqli_connect("localhost","root","","login");
$consulta="SELECT * FROM usuarios WHERE usuario='$usuario' and password='$password'";

//ejecuto la consulta
$resultado=mysqli_query($conexion,$consulta);
//considir datos
$filas=mysqli_num_rows($resultado);

if($filas>0){
    header("location:inicio.html");
}else{
    echo "Error en la autentificación";
}
//liberar los resultados espacio de memoria
mysqli_free_result($resultado);//me libere de los resultados 
mysqli_close($conexion);
?>


