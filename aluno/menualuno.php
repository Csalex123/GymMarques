<?php 

if(!isset($_SESSION)) 
{ 
  session_start(); 
} 

  // Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['id_aluno'])) {
      // Destrói a sessão por segurança
  session_destroy();

      // Redireciona o visitante de volta pro login
  header("Location: ../index.php"); exit;

}

?>


<!DOCTYPE html>
<html>
<head>

	<title>Menu</title>
	<!-- Importando bootstrap via CDN -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!-- Importando fonte do Google fonts-->
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/areaprofessor.css">
</head>
<body>

	<nav class="navbar navbar-inverse" style="background: #4F4F4F; border: none;">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				</button>
				<a class="navbar-brand" href="indexAluno.php" style="color: #4682B4;">Sistema Acadêmico</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">		
					<li  ><a href="indexAluno.php" style="color: white;"><span class="glyphicon glyphicon-home"></span> Home</a>
					</li> 
					
					
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a style="color: white;">Seja bem-vindo, <?php  echo $_SESSION["nome_aluno"]; ?> <span class="glyphicon glyphicon-user"></span></a></li>
					<li><a href="../sair.php" style="color: white;"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
				</ul>


			</div>
		</div>
	</nav>
</body>
</html>