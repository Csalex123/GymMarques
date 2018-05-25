<?php 


include('../conexao.php');

$id_exercicio = intval($_GET['exercicio']);

$sql_code ="DELETE FROM exercicio WHERE id_exercicio = '$id_exercicio' ";
$sql_query = mysqli_query($conexao, $sql_code) or die(mysql_error());





if ($sql_query) {	
	echo "<script>alert('Exercício deletado com sucesso!'); location.href='listarAlunos.php';</script>";
}else{
	echo "<script>
	alert('Não foi possível deletar o exercício'); history.go(-1);
	</script>";
}


$conexao -> close();
?>



