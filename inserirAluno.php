<?php 
include_once('../conexao.php');

$matricula = utf8_decode(addslashes (strip_tags( $_POST["matricula"])));
$nome = utf8_decode(addslashes (strip_tags( $_POST["nome"])));
$data_nascimento =  addslashes (strip_tags( $_POST["data_nascimento"]));
$sexo = utf8_decode(addslashes (strip_tags( $_POST["senha"])));
$codigo_professor = utf8_decode(addslashes (strip_tags( $_POST["codigo"])));
$senha =  addslashes (strip_tags( $_POST["senha"])); 

$senha_criptografada = base64_encode($senha);

$sql = mysqli_query($conexao, "SELECT * FROM aluno WHERE matricula = '{$matricula}'") or print mysql_error();

if(mysqli_num_rows($sql)>0) {

	echo "<script>alert('Aluno já cadastrado'); history.back();</script>";


}else{
	$usuario = "INSERT INTO aluno (matricula, nome,sexo,senha,data_nascimento, codigo_professor) VALUES ('$matricula','$nome','$sexo','$senha_criptografada','$data_nascimento', '$codigo_professor' )";

	echo "<script>alert('Cadastro realizado com sucesso'); history.back();</script>";

	$inserir = mysqli_query($conexao, $usuario);

	$conexao -> close();
}


?> 