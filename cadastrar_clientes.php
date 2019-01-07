<?php
	//connection
	include("conection.php");
	
	$conecta = new mysqli ($servername,$username,$password,$dbbiblioteca);
	//verificar se estabeleceu conexão
	if ($conecta->connect_error) {
		die("Conexão falhada: ".$conecta->connect_error);
	}
	if (isset($_POST['enviar'])):
		$nome = addslashes ($_POST['nome']);
		$endereco = addslashes ($_POST['endereco']);
		$telefone = addslashes ($_POST['telefone']);
		$email = addslashes ($_POST['email']);
		
		$dados = "INSERT INTO cliente (nome,endereco,telefone,email) VALUES ('$nome', '$endereco', '$telefone', '$email')";
		
		if ($conecta->query ($dados)) 
			$msg="Dados cadastrados com sucesso";
		else 
			$msg = "Não foi possível cadastrar os dados. <br>Erro: ".$conecta->error;	
		echo $msg;
	endif;
	
?>
<!DOCTYPE>
<hmtl>
	<head>
		<meta charset="utf-8">
		<title>Cadastrar Clientes</title>
		<link rel="stylesheet" href="CSS/paginas.css">
		<link rel="stylesheet" href="CSS/bootstrap.min.css">
	</head>
	<body>
		<nav class="navbar navbar-expand">
			<div class="">
				<ul class="navbar-nav">
					<li class="nav-item active">
						<a class="nav-link" href="conseguiu.php">Página Inicial</a>
					</li>
					<li class="nav-item">				
						<a class="nav-link" href="novo_agendamento.php">Criar Agendamento</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="cadastrar_clientes.php">Cadastrar Cliente</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="cadastrar_livros.php">Cadastrar Livro</a>
					</li>
				</ul>
			</div>	
		</nav>
		<form action ="<?php $_SERVER['PHP_SELF'];?>" method ="POST" class="row"> 
			<div class="col-6">
				<h2 class="text-center">Cadastrar<br>Cliente</h2>
			</div>
			<div class="col-6 formulario-coluna">
				<input type="text" name="nome" placeholder="Nome Completo"><br>
				<label><input type="text" name="endereco"placeholder="Endereço"><br>
				<label><input type="text" name="telefone"placeholder="Contato"><br>
				<label><input type="text" name="email"placeholder="Email"><br>
				<input type="submit" value="Cadastrar" name="enviar"> 
			</div>
		</form>
	</body>
</html>