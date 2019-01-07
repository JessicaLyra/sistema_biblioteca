<?php
	//conexao
	require_once 'conection.php';
	
	//sessão
	session_start();
	
	//dados
	$id = $_SESSION['id_usuario'];
	$sql = "SELECT * FROM usuarios WHERE id ='$id'";
	$resultado = mysqli_query($conecta, $sql);
	$dados = mysqli_fetch_array ($resultado);
	
	
	
?>
<!DOCTYPE html>
<html lang ="pt-br">
	<head>
		<meta charset="utf-8">
		<Title>Home</title>
		<link rel="stylesheet" href="CSS/style.css">
		<link rel="stylesheet" href="CSS/bootstrap.min.css">
		
		
		
	</head>
	<body class="body-home">
		<header>
			<div class="container home">
				<div class="row">
					<div class="col-6 p-5">
						<img src="imagens/logo.jpg">
					</div>
					<div class="col-6">
						
					</div>
				</div>
				<div>
					<h1 class="text-center p-5 text-light text-home">Bem Vindo(a) à sua área <?php echo $dados['nome'];?>! </h1>
				</div>
			</div>
		</header>
		<section class="dados container">
			<div class="">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
				  <li class="nav-item">
					<a class="nav-link active" id="home-tab" data-toggle="tab" href="#geral" role="tab" aria-controls="home" aria-selected="true">Visão Geral</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" id="profile-tab" data-toggle="tab" href="#livros" role="tab" aria-controls="profile" aria-selected="false">Livros</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" id="contact-tab" data-toggle="tab" href="#clientes" role="tab" aria-controls="contact" aria-selected="false">Clientes</a>
				  </li>
				</ul>
				<div class="tab-content" id="conteudo">
				  <div class="tab-pane fade show active" id="geral" role="tabpanel" aria-labelledby="home-tab">
					<table class="table">
					  <thead>
						<tr>
						  <th scope="col">#</th>
						  <th scope="col">Primeiro</th>
						  <th scope="col">Último</th>
						  <th scope="col">Nickname</th>
						</tr>
					  </thead>
					  <tbody>
						<tr>
							<th scope="row">1</th>
							<td>Mark</td>
							<td>Otto</td>
							<td>@mdo</td>
						</tr>
					  </tbody>
					</table>
					<a type="button" class="btn btn-success float-right" href="novo_agendamento.php">Novo Agendamento</a>
				  </div>
				  <div class="tab-pane fade" id="livros" role="tabpanel" aria-labelledby="profile-tab">
					<?php
					//conectando ao banco de dados biblioteca
						$conecta = new mysqli ($servername, $username, $password,$dbbiblioteca);
						
						$table_livro = "SELECT * FROM livros";
						$consulta = mysqli_query ($conecta,$table_livro);
					?>
					<table class="table">
					  <thead>
						<tr>
						  <th scope="col">Código</th>
						  <th scope="col">Titulo</th>
						  <th scope="col">Autor</th>
						  <th scope="col">Editora</th>
						  <th scope="col">Data de Lançamento</th>
						  <th scope="col">Assunto</th>
						  <th scope="col">Resumo</th>
						  <th scope="col">Imagem</th>
						</tr>
					  </thead>
					  <tbody>
						<?php while ($dados = mysqli_fetch_array($consulta)) { ?>
						<tr>
							<th scope="row"><?php echo $dados['codigo']; ?></th>
							<td><?php echo $dados['titulo']; ?></td>
							<td><?php echo $dados['autor']; ?></td>
							<td><?php echo $dados['editora']; ?></td>
							<td><?php echo $dados['data_lancamento']; ?></td>
							<td><?php echo $dados['assunto']; ?></td>
							<td><?php echo $dados['resumo']; ?></td>
							<td><img src= "upload/<?php echo $dados ['imagem'];?>"></td>
						</tr>
						<?php } ?>
					  </tbody>
					 </table> 
					<a type="button" class="btn btn-success float-right" href="cadastrar_livros.php">Cadastrar Livros</a>
				  </div>
	
				  <div class="tab-pane fade" id="clientes" role="tabpanel" aria-labelledby="contact-tab">
					<?php
					
						//selecionar dados 
						$sql = "SELECT * FROM cliente";
						$resultado = mysqli_query($conecta,  $sql);
						
					?>
					
					<table class="table">
					  <thead>
						<tr>
						  <th scope="col">#</th>
						  <th scope="col">Nome</th>
						  <th scope="col">Endereço</th>
						  <th scope="col">Telefone</th>
						  <th scope="col">Email</th>
						</tr>
					  </thead>
					
					  <tbody>
						<?php while ($dados = mysqli_fetch_array ($resultado)) {	
 ?>
						<tr>
						  <th scope="row"><?php echo $dados ['id'];?></th>
						  <td><?php echo $dados ['nome'];?></td>
						  <td><?php echo $dados ['endereco'];?></td>
						  <td><?php echo $dados ['telefone'];?></td>
						  <td><?php echo $dados ['email'];?></td>
						</tr>
						<?php } ?>
					   </tbody>
					 </table>	
					<a type="button" class="btn btn-success float-right" href="cadastrar_clientes.php">Cadastrar Clientes</a>
				  </div>
				</div>
			</div>	
		</section>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


	</body>
</html>	