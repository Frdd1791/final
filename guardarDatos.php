<?php
	require_once 'conexion.php';

	$nombre  = $_POST['nombre'];
	$modcel  = $_POST['modCel'];
	$version = $_POST['verApp'];
	$acceso  = $_POST['acceso'];
	$token   = $_POST['tokenId'];

	$query = "INSERT INTO tokensession(userID, modelCel, versionApp, ultimoAcceso, token) 
                    VALUES('$nombre', '$modcel', '$version', '$acceso', '$token')";

    if(consultarSQL($query)){
    	echo "Datos Guardados!";
    }else{
    	echo "Ocurrio un Error!";
    }
?>