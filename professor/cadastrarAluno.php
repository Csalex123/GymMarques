<!DOCTYPE html>
<html>
<head>

	<title>Área do professor</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<style type="text/css">
	h1{
		text-align: center;
		font-family: 'Roboto Slab', serif;
	}	
</style>

<script type="text/javascript">
	function mascaraData(campo, e){
		var kC = (document.all) ? event.keyCode : e.keyCode;
		var data = campo.value;

		if( kC!=8 && kC!=46 )
		{
			if( data.length==2 )
			{
				campo.value = data += '/';
			}
			else if( data.length==5 )
			{
				campo.value = data += '/';
			}
			else
				campo.value = data;
		}
	}


	

</script>



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
						<label for="outra_data">Data de nascimento</label>
						<input type="text" class="form-control" id="outra_data" maxlength="10" onkeypress="mascaraData(this, event)" name="data_nascimento" required=""  />
					</div>

					<div class="form-group">
						<label for="sexo">Sexo:</label><br>
						<input type="radio" id="M" name="sexo" value="M" checked="">
						<label for="M" style="color: blue;"> Masculino</label> 
						<input type="radio" id="F" name="sexo" value="F">
						<label for="F" style="color: #FF1493;"> Feminino</label> <br>
					</div>

					

					<div class="form-group">
						<label for="senha">Senha do aluno:</label>
						<input type="password" class="form-control" id="senha" name="senha" required=""  maxlength="15"  minlength="6"/>
					</div>

					<button type="reset" class="btn btn-danger">Limpar</button>
					<button type="submit" class="btn btn-primary" id="inserir">Inserir</button>
					<br><br>
					
				</form>
			</div>
		</div>	
		<br>
	</div>
</div>



<!-- Modal para cadastrar exercício -->
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
				<form method="POST" action="inserirExercicio.php" name="formulario">
					<div class="form-group">
						<label for="descricao">Descrição do exercício:</label>
						<input type="text" class="form-control" name="descricao" id="descricao" required=""  maxlength="60"  minlength="3">
					</div>

					<label class="fonte" >Categoria do exercício</label>
					<select required="" name="categoria" class="form-control" style="width: 130px;">
						<option value="Peito" class=" fonte">Peito</option>
						<option value="ombro" class=" fonte">Ombro</option>
						<option value="perna" class=" fonte">Perna</option>
						<option value="triceps" class=" fonte">Tríceps</option>
						<option value="biceps" class=" fonte">Bíceps</option>
						<option value="abdomen" class=" fonte">Abdomen</option>
						<option value="costa" class=" fonte">Costa</option>
						<option value="antebraco" class=" fonte">Antebraço</option>
					</select>

					<div class="form-group"  >
						<label for="series">Quantidade de séries:</label>
						<input style="width: 130px;" type="number" class="form-control" id="series"  name="series" required=""   maxlength="60"  minlength="5" />
					</div>

					<div class="form-group">
						<label for="repeticoes">Quantidade de repetições</label>
						<input type="number"  style="width: 130px;" class="form-control" name="repeticoes" id="repeticoes" maxlength="10"  name="repeticoes" required=""  />
					</div>
					<input  type="hidden" name="aluno" value="<?php echo $_SESSION['id_aluno'] ?>">
					<input  type="hidden" name="professor" value="<?php echo $_SESSION['id_professor'] ?>">

					<div align="right">
						<a href="listarAlunos.php"><button type="button" class="btn btn-danger">Cancelar</button></a>
						<button type="submit" class="btn btn-primary" onclick="cadastrar();" >Cadastrar</button>
					</div>
					<br>

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