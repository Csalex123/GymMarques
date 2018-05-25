<?php if(!isset($_SESSION)) 
{ 
	session_start(); 
} 


if (isset($_SESSION['id_professor'])) {
	header("Location: professor/indexProfessor.php");
}

if (isset($_SESSION['id_aluno'])) {
	header("Location: aluno/indexAluno.php");
}

?>
<html>
<head>
	<title>Sistema de Login Academia</title>

	<!-- Importando bootstrap via CDN -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!-- Importando fonte do Google fonts-->
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">

	<style type="text/css">

	.formatacaoButton{
		display: inline;
		width: 210px;
		height: 50px;

	}

	h1{
		text-align: center;
		margin-bottom: 50px;
		color: white;
		font-size: 4em;
	}

	.tamanhoFonte{
		font-size: 1.6em;
	}

	body{
		background-image: url('img/academia.jpg');
		background-repeat: no-repeat;
		background-size:100%;
		bottom: 0;
		color: black;
		left: 0;
		overflow: auto;
		padding: 3em;
		position: absolute;
		right: 0;
		text-align: center;
		top: 0;
		background-size: cover;
	}

	.fontePadrao{
		font-family: 'Roboto Slab', serif;
	}

	h4{
		text-align: center;
	}

	

</style>
</head>
<body  class="img-reponsive">

	<h1 class="fontePadrao">Gym Marek</h1>
	<center>
		<div class="container">
			<button class="btn btn-primary tamanhoFonte fontePadrao formatacaoButton" data-toggle="modal" data-target="#modalAluno">Sou Aluno <span class="glyphicon glyphicon-education"></span></button>
		</div><br>
		<div class="container">
			<button class="btn btn-primary tamanhoFonte fontePadrao formatacaoButton" data-toggle="modal" data-target="#modalProfessor">Sou Professor <span class="glyphicon glyphicon-user"></span> </button>
		</div>
	</center>
	

	<!-- Modal aluno -->
	<div class="modal fade" id="modalAluno" role="dialog" data-backdrop="static" >
		<div class="modal-dialog modal-sm">

			<!-- Conteúdo da modal-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title fontePadrao">Faça seu login</h4>
				</div>
				<div class="modal-body" >
					<!-- Formulário do aluno-->	
					<form method="post" action="aluno/loginaluno.php" >
						<div class="form-group ">
							<label for="matricula" class="fontePadrao">Matrícula:</label>
							<input  type="text" class="form-control fontePadrao" id="matricula" placeholder="Digite sua matrícula" name="matricula">
						</div>

						<div class="form-group">
							<label for="senha" class="fontePadrao">Senha:</label>
							<input name="senha" type="password" class="form-control" id="senha" placeholder="Digite sua senha">
						</div>
						<button type="submit" class="btn btn-success fontePadrao" style="float: right;">Entrar</button>
					</form>
					<br>
					<!-- Fim do Formulário do aluno-->	
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default fontePadrao" data-dismiss="modal">Fechar</button>
				</div>
			</div>

		</div>
	</div>
</div>
<!-- Fim modal do aluno-->	


<!-- Modal do professor -->
<div class="modal fade" id="modalProfessor" role="dialog" data-backdrop="static" >
	<div class="modal-dialog modal-sm">

		<!-- Conteúdo da modal-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title fontePadrao">Faça seu login</h4>
			</div>
			<div class="modal-body" >

				<!-- Formulário do professor-->	
				<form method="post" action="professor/loginProfessor.php" >
					<div class="form-group ">
						<label for="cpf" class="fontePadrao">CPF:</label>
						<input type="text" class="form-control fontePadrao" name="cpf" id="cpf" placeholder="Digite sue CPF" >
					</div>

					<div class="form-group">
						<label for="senha" class="fontePadrao">Senha:</label>
						<input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha">
					</div>
					<button type="submit" class="btn btn-success fontePadrao class="fontePadrao"" style="float: right;">Entrar</button>
				</form>
				<br>
				<!-- Fim do Formulário do professor-->	
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default fontePadrao" data-dismiss="modal">Fechar</button>
			</div>
		</div>

	</div>
</div>
</div>
<!-- Fim modal do professor-->	

</body>

</html>

