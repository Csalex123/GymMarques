<?php 

if(!isset($_SESSION)) 
{ 
	session_start(); 
} 
// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['id_professor'])) {
// Destrói a sessão por segurança
	session_destroy();

// Redireciona o visitante de volta pro login
	header("Location: ../index.php"); exit;
	
}
include('../conexao.php');
$codigo = $_SESSION["codigo_professor"];
$consulta = "SELECT * FROM aluno where codigo_professor = '$codigo' ";
$con = mysqli_query($conexao,$consulta) or die (mysql_erro());


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php include("menu.php") ?>

	<h1 align="center" class="fonte" style="font-size: 3em">Lista de todos meus alunos</h1><br>

	<table class="table table-hover">
		<thead>
			<tr>
				
				<th class="fonte">Matrícula</th>
				<th class="fonte">Nome</th>
				<th class="fonte">Sexo</th>
				<th class="fonte">Data de nascimento</th>
				
				
			</tr>
		</thead>

		<?php while($dado = $con->fetch_array()){ ?>
			<tbody>
				<tr>
					
					<td class="fonte2"><?php echo utf8_encode($dado["matricula"]); ?></td>
					<td class="fonte2"><?php  echo utf8_encode($dado["nome"]); ?></td>
					<td class="fonte2"><?php if($dado["sexo"] == "M"){
						echo "MASCULINO";
					}else{
						echo "FEMININO";
					}  ?></td>


					<td class="fonte2"><?php echo $dado["data_nascimento"]; ?></td>
					
					<td class="fonte2" >

						<a href="javascript: if(confirm('Tem certeza que deseja deletar o usuário 
						<?php echo $dado["nome"].' ?'; ?>')) 
						location.href='deletarusuario.php?p=excluir&aluno=<?php echo $dado['id_aluno']; ?>';"><button class="btn btn-danger">Excluir</button></a> 
						
						
					</td>
					<td><form action="editaraluno.php"  method="POST">
						<input type="hidden" name="id_aluno" value="<?php  echo $dado["id_aluno"] ?>">
						<input class="btn btn-primary"  type="submit" value="Editar" >
					</form></td>
					<td><form action="cadastrarAtividade.php"  method="GET">
						<input type="hidden" name="id_aluno" value="<?php  echo $dado["id_aluno"] ?>">
						<input class="btn btn-success"  type="submit" value="Cadastrar exércicio" >
					</form></td>
				</tr>
			</tbody>
		<?php } ?>
	</table>

</body>
</html>