<?php
	function consultarSQL($query){
		$mysqli = new mysqli("localhost","root","Frdd1791@","test");
		if(mysqli_connect_error()){
			echo "Este sitio esta presentando problemas";
		}
		$mysqli->set_charset("utf8");
		$mysqli->autocommit(FALSE);
		$mysqli->begin_transaction(MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT);

		if($consulta=$mysqli->query($query)){
			if($mysqli->commit()){
			}else{
				echo "Error, datos no guardados!";
			}
		}else{
			$mysqli->rollback();
		}

		return $consulta;
		
	}
?>


