<?php

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido']; //variable post array asociativo
$numero = $_POST['numero'];
$fecha = $_POST['fecha'];
$password = $_POST['password'];
$newpass = $_POST['newpass'];
$email = $_POST['email'];

require_once'conexion.php';

if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        
    if($password==$newpass){
        
       $hash = password_hash($password,PASSWORD_DEFAULT);
            
       $query = "INSERT INTO usuarios(password,nombre,apellido,numero,fecha,newpass,email) VALUES($hash,$nombre,$apellido,$numero,$fecha,$newpass,$email)";
        
        if($db->query($query)){
            echo "El usuario se registro correctamente";
        }
        else{
            echo "Error a registrar Usuario";
        }
  
    }else{
        echo "password no coinciden";
    }
}else{
    echo "los datos no son validos";
}

?>