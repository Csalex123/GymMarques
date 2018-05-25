<?php 
if(!isset($_SESSION)) 
{ 
  session_start(); 
} 

include_once('../conexao.php');

$cpf = $_POST['cpf'];
$senha = $_POST['senha'];

if (empty($cpf) OR empty($senha)) {
	header("Location: index.php"); exit;
}


$query =  mysqli_query($conexao, "SELECT  *  FROM professor WHERE cpf = '$cpf' AND senha = '$senha' LIMIT 1");

if(mysqli_num_rows($query) != 1){

	echo "<script>alert('Usuário não encontrado'); history.back();</script>";

	
	
}else{

	$resultado = mysqli_fetch_assoc($query);


	
	// Salva os dados encontrados na sessão
	$_SESSION["id_professor"] = $resultado['id_professor'];
	$_SESSION["codigo_professor"] = $resultado['codigo_professor'];
	$nome = $resultado['nome'];
	$_SESSION["nome_professor"] = current( str_word_count( $nome , 2 ) );
	

    // Redireciona o visitante
	header("Location: indexProfessor.php"); exit;
 
}
?>