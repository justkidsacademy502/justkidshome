<?php

include("../../config.php");

$id_grado = $_POST['id_grado'];
$nivel_id = $_POST['nivel_id'];
$bloque = $_POST['bloque'];
$paralelo = $_POST['paralelo'];
$horario = $_POST['horario'];

$sentencia = $pdo->prepare('UPDATE grados
SET     nivel_id=:nivel_id,
        bloque=:bloque,
        paralelo=:paralelo,
        horario=:horario,
        fyh_actualizacion=:fyh_actualizacion
WHERE   id_grado=:id_grado');

$sentencia->bindParam(':nivel_id',$nivel_id);
$sentencia->bindParam(':bloque',$bloque);
$sentencia->bindParam(':paralelo',$paralelo);
$sentencia->bindParam(':horario',$horario);
$sentencia->bindParam('fyh_actualizacion',$fechahora);
$sentencia->bindParam('id_grado',$id_grado);

if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Se actualizo el Curso";
    $_SESSION['icono'] = "success";
    header('location:'.APP_URL."/admin/cursos");
}else{
    session_start();
    $_SESSION['mensaje'] = "No se actualizo el Curso";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}



?>