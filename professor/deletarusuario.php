<?php 

if(!isset($_SESSION)) 
{ 
	session_start(); 
} 

if (!isset($_SESSION['id_professor'])) {

	session_destroy();

	header("Location: ../index.php"); exit;
}

include('../conexao.php');

$id_aluno = intval($_GET['aluno']);

$sql_code2 ="DELETE FROM exercicio WHERE id_aluno = '$id_aluno' ";
$sql_query2 = mysqli_query($conexao, $sql_code2) or die(mysql_error());

$sql_code ="DELETE FROM aluno WHERE id_aluno = '$id_aluno' ";
$sql_query = mysqli_query($conexao, $sql_code) or die(mysql_error());

if ($sql_query) {	
	echo "<script>alert('Aluno deletado com sucesso!'); history.back(); </script>";
}else{
	echo "<script>
	alert('Não foi possível deletar o aluno'); history.back();
	</script>";
}

?>



