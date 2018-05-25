<?php

if(!isset($_SESSION)) 
{ 
	session_start(); 
} 
require ('../conexao.php');

$id_exercicio = $_POST['exercicio'];

$query =  mysqli_query($conexao, "SELECT  * FROM exercicio WHERE id_exercicio = '$id_exercicio'  LIMIT 1");

$resultado = mysqli_fetch_assoc($query);

$descricao = $resultado['descricao'];
$categoria = $resultado['categoria'];
$series  = $resultado['series'];
$repeticoes = $resultado['repeticoes'];
$dia = $resultado['dia'];
$peso = $resultado['peso'];
$status = "Feito";

//$exercicio = "UPDATE exercicio SET status='$status' WHERE id_exercicio ='$id_exercicio' ";

$exercicio = "UPDATE exercicio SET descricao='$descricao', categoria='$categoria', series='$series', repeticoes='$repeticoes', dia='$dia', peso='$peso',  status='$status' WHERE id_exercicio = '$id_exercicio' ";

$inserir = mysqli_query($conexao, $exercicio);

if ($inserir) {
	echo"<script>alert('Exercício atualizado com sucesso'); history.back();</script>";
}else{
	mysql_error();
}



$conexao -> close(); 

?>