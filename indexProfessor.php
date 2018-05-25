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

?>

<!DOCTYPE html>
<html>
<head>
	<title>Área de professor</title>
	<style type="text/css">
	h1{
		text-align: center;
		font-family: 'Roboto Slab', serif;
	}
</style>
</head>

<body>

	<?php include("menu.php") ?>

	<h1>Área do Professor</h1>
</body>
</html>