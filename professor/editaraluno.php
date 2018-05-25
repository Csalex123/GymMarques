<?php 

if(!isset($_SESSION)) 
{ 
	session_start(); 
} 
include('../conexao.php');

  // Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['id_professor'])) {
      // Destrói a sessão por segurança
	session_destroy();

      // Redireciona o visitante de volta pro login
	header("Location: ../index.php"); exit;

}

$id_aluno = intval($_POST['id_aluno']);


$_SESSION['id_aluno '] = $id_aluno;

$query =  mysqli_query($conexao, "SELECT  * FROM aluno WHERE id_aluno = '$id_aluno'  LIMIT 1");// Seleciona todos dados do usuário que está registrado no banco de dados

$resultado = mysqli_fetch_assoc($query);// Array que guarda todos dados do usuário

$_SESSION['nome'] = $resultado['nome'];  //Guarda título da publicação
$_SESSION['matricula'] = $resultado['matricula'];  //Guarda o conteúdo da publicação
$_SESSION['sexo'] = $resultado['sexo'];
$_SESSION['data_nascimento'] = $resultado['data_nascimento'];
$_SESSION['senha'] = $resultado['senha'];
$_SESSION['codigo_professor'] = $resultado['codigo_professor'];


//
?>

<!DOCTYPE html>
<html>
<head>
	<title>Editar aluno</title>
	<style type="text/css">
	h1{
		text-align: center;
		font-family: 'Roboto Slab', serif;
	}
</style>

<script type="text/javascript">
	function mascaraData( campo, e )
	{
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


	function editar(){
		if (!confirm('Tem certeza que deseja editar este aluno?')){ 
			return false;
		}else{

			document.formulario.submit();
		}
	}
</script>
</head>
<body>
	<?php include("menu.php") ?>

	<h1>Edite cadastro de aluno</h1>

	<div class="conteiner ">

		<div class="panel panel-default col-sm-4" style="float: none; margin: 0 auto; background: #CFCFCF;">
			<h3>Preencha o formulário</h3><br>
			<div style= "float: none; margin: 0 auto;">

				<form method="POST" action="inserirAluno.php" name="formulario">
					<div class="form-group">
						<label for="matricula">Matricula do Aluno:</label>
						<input type="text" class="form-control" name="matricula" value="<?php echo strtoupper ($_SESSION['matricula']); ?>" id="matricula" required=""  maxlength="60"  minlength="3">
					</div>

					<div class="form-group">
						<label for="nome">Nome do Aluno:</label>
						<input type="text" class="form-control" id="nome"  name="nome" required="" value="<?php echo utf8_encode(ucwords($_SESSION['nome'])); ?>"  maxlength="60"  minlength="5" />
					</div>

					<div class="form-group">
						<label for="outra_data">Data de nascimento</label>
						<input type="text" value="<?php  $data = $_SESSION['data_nascimento'];  $novaData = str_replace( '-', '/', $data); 
						echo $novaData; ?>" class="form-control" id="outra_data" maxlength="10" onkeypress="mascaraData( this, event )" name="data_nascimento" required=""  />
					</div>
<!--
					<div class="form-group">
						<label for="sexo">Sexo:</label>
						<label for="M" style="color: blue;">Masculino</label> <input type="radio" id="M" name="sexo" value="M" checked="">
						<label for="F" style="color: #FF1493;">Feminino</label> <input type="radio" id="F" name="sexo" value="F"><br>
					</div>
				-->
				<div class="form-group">
					<label for="codigo">Código do Professor:</label>
					<input type="codigo" class="form-control" id="codigo" value="<?php echo strtoupper ($_SESSION['codigo_professor']); ?>"  name="codigo"  required="" maxlength="10"  minlength="2">
				</div>

				<div class="form-group">
					<label for="senha">Senha do aluno:</label>
					<input type="text" class="form-control" id="senha" name="senha" required="" value="<?php echo base64_decode($_SESSION['senha']); ?>"  maxlength="15"  minlength="6"/>
				</div>
				<div align="right">
					<a href="listarAlunos.php"><button type="button" class="btn btn-danger">Cancelar</button></a>
					<button type="button" class="btn btn-primary" onclick="editar();">Editar</button>
				</div>
				<br>

			</form>
		</div>
	</div>	
	<br>
</div>
</div>

</body>
</html>

