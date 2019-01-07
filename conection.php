<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "cadastro";
	$dbbiblioteca = "biblioteca";

	// Create connection
	$conecta = new mysqli ($servername, $username, $password,$dbname);
	
	//check connection
	if ($conecta->connect_error) {
		die("Conexão falhada: ". $conecta->connect_error);
	}
	
	/*$bd = "create database cadastro";
	
	if ($conecta->query($bd) === true) {
		echo "Banco de dados criado com sucesso";
	} else {
		echo "Erro ao criar bando de dados ". $conecta->error;
	}
	$conecta->close();*/
?>	