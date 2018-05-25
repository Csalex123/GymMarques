<!DOCTYPE html>
<html>
<head>
	<title>Área do professor</title>

	

	<style type="text/css">
	h1{
		text-align: center;
		font-family: 'Roboto Slab', serif;
	}

	li{
		font-weight: bold;
		font-size: 15px;
		
	}
	
</style>
</head>
<body>

	<?php include("menu.php") ?>

	
	<h1>Cadastro de aluno</h1>

	

	<div class="conteiner ">

		<div class="panel panel-default col-sm-4" style="float: none; margin: 0 auto;">
			<h3>Preencha o formulário</h3><br>
			<div style= "float: none; margin: 0 auto;">

				<form method="POST" action="inserirAluno.php">
					<div class="form-group">
						<label for="codigo">Código do Professor:</label>
						<input type="codigo" class="form-control" id="codigo"  name="codigo"  required="" maxlength="10"  minlength="2">
					</div>
					
					<div class="form-group">
						<label for="matricula">Matricula do Aluno:</label>
						<input type="text" class="form-control" name="matricula" id="matricula" required=""  maxlength="60"  minlength="3">
					</div>

					<div class="form-group">
						<label for="nome">Nome do Aluno:</label>
						<input type="text" class="form-control" id="nome"  name="nome" required=""  maxlength="60"  minlength="5" />
					</div>

					<div class="form-group">
						<label for="data_nascimento">Data de nascimento:</label>
						<input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required="" />
					</div>

					<div class="form-group">
						<label for="sexo">Sexo:</label>
						<label for="M" style="color: blue;">Masculino</label> <input type="radio" id="M" name="sexo" value="M" checked="">
						<label for="F" style="color: #FF1493;">Feminino</label> <input type="radio" id="F" name="sexo" value="F"><br>
					</div>

					

					<div class="form-group">
						<label for="senha">Senha do aluno:</label>
						<input type="password" class="form-control" id="senha" name="senha" required=""  maxlength="15"  minlength="6"/>
					</div>

					<button type="reset" class="btn btn-danger">Limpar</button>
					<button type="submit" class="btn btn-primary">Inserir</button>
					<br><br>
					
				</form>
			</div>
		</div>	
		<br>
	</div>
</div>


</body>
</html>