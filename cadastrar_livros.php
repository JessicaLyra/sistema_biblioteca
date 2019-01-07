<!DOCTYPE html>
<html>
	<head>
		<meta charset ="utf-8">
		<title>Cadastrar livros</title>
		<link rel="stylesheet" href="CSS/paginas.css">
		<link rel="stylesheet" href="CSS/bootstrap.min.css">
	</head>
	<body class="body-livros">
	<?php
	include ("conection.php");
	// Create connection
	$conecta = new mysqli ($servername, $username, $password,$dbbiblioteca);
	//check connection
	if ($conecta->connect_error) {
		die("Conexão falhada: ". $conecta->connect_error);
	}
	
	if (isset($_POST['enviar'])) :
		
		$titulo = addslashes ($_POST ['titulo']);
		$autor = addslashes ($_POST['autor']);
		$editora = addslashes ($_POST['editora']);
		$data_lancamento = addslashes ($_POST['data_lancamento']);
		$assunto = addslashes ($_POST['assunto']);
		$resumo = addslashes ($_POST['resumo']);
		
		$formatosPermitidos = array("png","jpg", "jpeg", "gif");
		$extensao = pathinfo ($_FILES['arquivo']['name'], PATHINFO_EXTENSION);
		
			if (in_array($extensao, $formatosPermitidos)):
				$diretorio="upload/";
				$temporario = $_FILES['arquivo']['tmp_name'];
				$novoNome= uniqid().".$extensao";

				(move_uploaded_file($temporario, $diretorio.$novoNome));
				
		
		$sql_code = "INSERT INTO livros (titulo, autor, editora, data_lancamento, assunto, resumo, imagem) VALUES('$titulo', '$autor', '$editora', '$data_lancamento','$assunto', '$resumo', '$novoNome')";
		    if($conecta->query($sql_code))
			  $msg = "Arquivo enviado com sucesso!";
			else
			  $msg = "Falha ao enviar arquivo.";
				endif;
				echo $msg;
			endif;	
			
				
	?>
		<nav class="navbar navbar-expand ">
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
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data" class="row">	
			<div class="col-6 ">
			<h2 class="text-center">Cadastrar <br>novo livro</h2>
			</div>
			<div class="col-6 formulario-coluna">
				<input type="text" name="titulo" placeholder="Título"><br>
				<input type="text" name="autor" placeholder="Autor"><br>
				<input type="text" name="editora" placeholder="Editora"><br>
				<input type="text" name="data_lancamento" placeholder="Data de Lançamento"><br>
				<input type="text" name="assunto" placeholder="Assunto"><br>
				<input type="text" name="resumo" placeholder="Resumo"><br>
				<input type="file" name="arquivo" >
				<input type="submit" value="Salvar" name="enviar">
			</div>
		</form>
	</body>
</html>