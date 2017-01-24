<?php

/*Соединение с базой данных*/
$mysqli = false;
function connectDB(){
	global $mysqli;
	$mysqli = new MySQLi('localhost', 'root', '', 'remont_DB');
		$mysqli->query("SET NAME 'UTF-8' ");
}
function closeDB(){
	global $mysqli;
	$mysqli->close();
}

/*------------Вывод таблицы--------*/
function getTitle($limit){
	global $mysqli;
	connectDB();
	
	$result = $mysqli->query("SELECT * FROM 'About_dt' ORDER BY 'id' DESC LIMIT $limit");
	
	closeDB();
	return resultToArray($result);
}
	function resultToArray($result){
		$array[] = array();
		while (($row = $result->fetch_assoc ) != false)
			$array[] = $row;
		return $array;
		
	}

?>