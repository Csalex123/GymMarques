<?php 
include_once('../conexao.php');

$descricao =  $_POST["descricao"];
$series =  $_POST["series"];
$repeticoes =  $_POST["repeticoes"];
$categoria =  $_POST["categoria"];
$peso = $_POST["peso"];
$dia = $_POST["dia"];
$aluno = $_POST["aluno"];
$professor = $_POST["professor"];
$status = "A fazer";


$usuario = "INSERT INTO exercicio (descricao, categoria,series,repeticoes, peso, dia, status, id_professor, id_aluno) VALUES ('$descricao','$categoria','$series','$repeticoes', '$peso', '$dia', '$status', '$professor', '$aluno')";

if ($usuario) {
	echo "<script>alert('Exercício cadastrado com sucesso!'); window.location.href='listarAlunos.php' </script>";
}else{
	echo "<script>alert('Erro!'); history.back(); </script>";
}



$inserir = mysqli_query($conexao, $usuario);



?> 