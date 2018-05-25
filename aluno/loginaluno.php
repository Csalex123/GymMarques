<?php 
if(!isset($_SESSION)) 
{ 
  session_start(); 
} 

include_once('../conexao.php');

$matricula = $_POST['matricula'];
$senha = $_POST['senha'];
$senha_criptografia = base64_encode($_POST['senha']);



if (empty($matricula) OR empty($senha)) {
	header("Location: index.php"); exit;
}


$query =  mysqli_query($conexao, "SELECT  *  FROM aluno WHERE matricula = '$matricula' AND senha = '$senha_criptografia' LIMIT 1");

if(mysqli_num_rows($query) != 1){

	echo "<script>alert('Aluno não encontrado'); history.back();</script>";

	
	
}else{

	$resultado = mysqli_fetch_assoc($query);


	
	// Salva os dados encontrados na sessão
	$_SESSION["id_aluno"] = $resultado['id_aluno'];
	$nome = $resultado['nome'];
	$_SESSION["nome_aluno"] = current( str_word_count( $nome , 2 ) );
	

    // Redireciona o visitante
	header("Location: indexAluno.php"); exit;
 
}

?>