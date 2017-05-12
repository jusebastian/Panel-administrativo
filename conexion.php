<?php
$db = new mysqli("localhost","root","","login");

if($db->connect_errno()){
    echo 'Conexion Fallida:',$mysql->connect_errno();
    exit();
}

?>


