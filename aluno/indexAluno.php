<?php 
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 

 // Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['id_aluno'])) {
      // Destrói a sessão por segurança
	session_destroy();

      // Redireciona o visitante de volta pro login
	header("Location: ../index.php"); exit;

}
include('../conexao.php');
$id_aluno = $_SESSION['id_aluno'];


?>
<!DOCTYPE html>
<html>
<head>
	<title>Área do Aluno</title>
	<style type="text/css">
	h1{
		text-align: center;
		font-family: 'Roboto Slab', serif;
	}

	.tamanhobutton{
		width: 200px;
		height: 50px;
	}

	body{

		
		height: 100vh;

		background-image: url("../img/fundoaluno.jpg");
		
		background-attachment: fixed;

		background-size: cover;
	}

}



</style>

</head>

<body>
	<?php include("menualuno.php") ?>

	<h1 >Área do Aluno</h1>

	<h2 align="center" >Dias da Semana</h2>

	<!-- Domingo -->
	<div class="container">
		<button type="button" class="btn btn-info tamanhobutton" data-toggle="collapse" data-target="#domingo">Domingo</button>
		<div id="domingo" class="collapse">

			<div  class="col-sm-10">
				<br>
				<div class="panel panel-default" >
					
					<table class="table table-hover">
						<thead>
							<tr>

								<th class="fonte">Descrição Exercício</th>
								<th class="fonte">Categoria</th>	
								<th class="fonte">Séries</th>
								<th class="fonte">Repetições</th>
								<th class="fonte">Peso</th>
								<th class="fonte">Status</th>
							</tr>
						</thead>
						<?php 

						$query2 =  mysqli_query($conexao, "SELECT  * FROM exercicio WHERE id_aluno = '$id_aluno' and  dia = 'domingo'");

						?>

						<?php while($dado = $query2->fetch_array()){ ?>
							<tbody>
								<tr>
									<td class="fonte2"><?php echo utf8_encode($dado['descricao']); ?></td>
									<td class="fonte2"><?php echo utf8_encode($dado['categoria']); ?></td>
									<td class="fonte2"><?php  echo utf8_encode($dado['series']) ?></td>
									<td class="fonte2"><?php  echo utf8_encode($dado['repeticoes']); ?></td>
									<td class="fonte2"><?php  echo utf8_encode($dado['peso']); ?></td>
									<td class="fonte2"><?php $status = $dado['status']; 
									if ($status == "A fazer") {
										echo "<b style='color: red;'>A fazer</b>";
									}else{
										echo "<b style='color: green'>Feito</b>";
									}	
									?></td>
									<td class="fonte2" >

										<form action="atualizarStatus.php"  method="POST">
											<input type="hidden" name="exercicio" value="<?php echo $dado['id_exercicio']; ?>">
											<button type="submit" class="btn btn-success">Concluído</button></a> 
										</form>

										
									</td>
									
								</tbody>

								
							<?php } ?>
							


						</table>

					</div>
				</div>
			</div>
		</div>
		<div><br>


			<div class="container">
				<button type="button" class="btn btn-primary tamanhobutton" data-toggle="collapse" data-target="#segunda">Segunda-feira</button>
				<div id="segunda" class="collapse">


					<div  class="col-sm-10">
						<br>
						<div class="panel panel-default" >

							<table class="table table-hover">
								<thead>
									<tr>

										<th class="fonte">Descrição Exercício</th>
										<th class="fonte">Categoria</th>	
										<th class="fonte">Séries</th>
										<th class="fonte">Repetições</th>
										<th class="fonte">Peso</th>
										<th class="fonte">Status</th>
									</tr>
								</thead>
								<?php 

								$query3 =  mysqli_query($conexao, "SELECT  * FROM exercicio WHERE id_aluno = '$id_aluno' and  dia = 'segunda'");

								?>

								<?php while($dado = $query3->fetch_array()){ ?>
									<tbody>
										<tr>
											<td class="fonte2"><?php echo utf8_encode($dado['descricao']); ?></td>
											<td class="fonte2"><?php echo utf8_encode($dado['categoria']); ?></td>
											<td class="fonte2"><?php  echo utf8_encode($dado['series']) ?></td>
											<td class="fonte2"><?php  echo utf8_encode($dado['repeticoes']); ?></td>
											<td class="fonte2"><?php  echo utf8_encode($dado['peso']); ?></td>
											<td class="fonte2"><?php $status = $dado['status']; 
											if ($status == "A fazer") {
												echo "<b style='color: red;'>A fazer</b>";
											}else{
												echo "<b style='color: green'>Feito</b>";
											}	
											?></td>
											<td class="fonte2" >

												<form action="atualizarStatus.php"  method="POST">
													<input type="hidden" name="exercicio" value="<?php echo $dado['id_exercicio']; ?>">
													<button type="submit" class="btn btn-success">Concluído</button></a> 
												</form>


											</td>
											<tbody>
											<?php } ?>


										</table>

									</div>
								</div>
							</div>
						</div>
					</div><br>

					<div class="container">
						<button style="background-color: #606060;" type="button" class="btn btn-default tamanhobutton" data-toggle="collapse" data-target="#terca">Terça-feira</button>
						<div id="terca" class="collapse">

							<div  class="col-sm-10">
								<br>
								<div class="panel panel-default" >

									<table class="table table-hover">
										<thead>
											<tr>

												<th class="fonte">Descrição Exercício</th>
												<th class="fonte">Categoria</th>	
												<th class="fonte">Séries</th>
												<th class="fonte">Repetições</th>
												<th class="fonte">Peso</th>
												<th class="fonte">Status</th>
											</tr>
										</thead>
										<?php 

										$query8 =  mysqli_query($conexao, "SELECT  * FROM exercicio WHERE id_aluno = '$id_aluno' and  dia = 'terca'");

										?>

										<?php while($dado = $query8->fetch_array()){ ?>
											<tbody>
												<tr>
													<td class="fonte2"><?php echo utf8_encode($dado['descricao']); ?></td>
													<td class="fonte2"><?php echo utf8_encode($dado['categoria']); ?></td>
													<td class="fonte2"><?php  echo utf8_encode($dado['series']) ?></td>
													<td class="fonte2"><?php  echo utf8_encode($dado['repeticoes']); ?></td>
													<td class="fonte2"><?php  echo utf8_encode($dado['peso']); ?></td>
													<td class="fonte2"><?php $status = $dado['status']; 
													if ($status == "A fazer") {
														echo "<b style='color: red;'>A fazer</b>";
													}else{
														echo "<b style='color: green'>Feito</b>";
													}	
													?></td>
													<td class="fonte2" >

														<form action="atualizarStatus.php"  method="POST">
															<input type="hidden" name="exercicio" value="<?php echo $dado['id_exercicio']; ?>">
															<button type="submit" class="btn btn-success">Concluído</button></a> 
														</form>


													</td>


													<tbody>
													<?php } ?>
													<td>


													</table>

												</div>
											</div>
										</div>
									</div>
									<div><br>

	<div class="container">
	<button type="button" class="btn btn-danger tamanhobutton" data-toggle="collapse" data-target="#quarta">Quarta-feira</button>
	<div id="quarta" class="collapse">

		<div  class="col-sm-10">
			<br>
			<div class="panel panel-default" >

				<table class="table table-hover">
					<thead>
						<tr>

							<th class="fonte">Descrição Exercício</th>
							<th class="fonte">Categoria</th>	
							<th class="fonte">Séries</th>
							<th class="fonte">Repetições</th>
							<th class="fonte">Peso</th>
							<th class="fonte">Status</th>
						</tr>
					</thead>
					<?php 

					$query4 =  mysqli_query($conexao, "SELECT  * FROM exercicio WHERE id_aluno = '$id_aluno' and  dia = 'quarta'");

					?>

					<?php while($dado = $query4->fetch_array()){ ?>
						<tbody>
							<tr>
								<td class="fonte2"><?php echo utf8_encode($dado['descricao']); ?></td>
								<td class="fonte2"><?php echo utf8_encode($dado['categoria']); ?></td>
								<td class="fonte2"><?php  echo utf8_encode($dado['series']) ?></td>
								<td class="fonte2"><?php  echo utf8_encode($dado['repeticoes']); ?></td>
								<td class="fonte2"><?php  echo utf8_encode($dado['peso']); ?></td>
								<td class="fonte2"><?php $status = $dado['status']; 
								if ($status == "A fazer") {
									echo "<b style='color: red;'>A fazer</b>";
								}else{
									echo "<b style='color: green'>Feito</b>";
								}	
								?></td>
								<td class="fonte2" >

									<form action="atualizarStatus.php"  method="POST">
										<input type="hidden" name="exercicio" value="<?php echo $dado['id_exercicio']; ?>">
										<button type="submit" class="btn btn-success">Concluído</button></a> 
									</form>


								</td>

								<tbody>
								<?php } ?>


							</table>

						</div>
					</div>
				</div>
			</div>
			<div><br>

				<div class="container">
	<button style="background-color: #8968CD; type="button" class="btn btn-default tamanhobutton" data-toggle="collapse" data-target="#quinta">Quinta-feira</button>
	<div id="quinta" class="collapse">

		<div  class="col-sm-10">
			<br>
			<div class="panel panel-default" >

				<table class="table table-hover">
					<thead>
						<tr>

							<th class="fonte">Descrição Exercício</th>
							<th class="fonte">Categoria</th>	
							<th class="fonte">Séries</th>
							<th class="fonte">Repetições</th>
							<th class="fonte">Peso</th>
							<th class="fonte">Status</th>
						</tr>
					</thead>
					<?php 

					$query4 =  mysqli_query($conexao, "SELECT  * FROM exercicio WHERE id_aluno = '$id_aluno' and  dia = 'quinta'");

					?>

					<?php while($dado = $query4->fetch_array()){ ?>
						<tbody>
							<tr>
								<td class="fonte2"><?php echo utf8_encode($dado['descricao']); ?></td>
								<td class="fonte2"><?php echo utf8_encode($dado['categoria']); ?></td>
								<td class="fonte2"><?php  echo utf8_encode($dado['series']) ?></td>
								<td class="fonte2"><?php  echo utf8_encode($dado['repeticoes']); ?></td>
								<td class="fonte2"><?php  echo utf8_encode($dado['peso']); ?></td>
								<td class="fonte2"><?php $status = $dado['status']; 
								if ($status == "A fazer") {
									echo "<b style='color: red;'>A fazer</b>";
								}else{
									echo "<b style='color: green'>Feito</b>";
								}	
								?></td>
								<td class="fonte2" >

									<form action="atualizarStatus.php"  method="POST">
										<input type="hidden" name="exercicio" value="<?php echo $dado['id_exercicio']; ?>">
										<button type="submit" class="btn btn-success">Concluído</button></a> 
									</form>


								</td>

								<tbody>
								<?php } ?>

							</table>

						</div>
					</div>
				</div>
			</div>
			<div><br>

<div class="container">
					<button style="background-color: #EEAD0E; type="button" class="btn btn-default tamanhobutton" data-toggle="collapse" data-target="#sexta">Sexta-feira</button>
					<div id="sexta" class="collapse">

						<div  class="col-sm-10">
							<br>
							<div class="panel panel-default" >

								<table class="table table-hover">
									<thead>
										<tr>

											<th class="fonte">Descrição Exercício</th>
											<th class="fonte">Categoria</th>	
											<th class="fonte">Séries</th>
											<th class="fonte">Repetições</th>
											<th class="fonte">Peso</th>
											<th class="fonte">Status</th>
										</tr>
									</thead>
									<?php 

									$query5 =  mysqli_query($conexao, "SELECT  * FROM exercicio WHERE id_aluno = '$id_aluno' and  dia = 'sexta'");

									?>

									<?php while($dado = $query5->fetch_array()){ ?>
										<tbody>
											<tr>
												<td class="fonte2"><?php echo utf8_encode($dado['descricao']); ?></td>
												<td class="fonte2"><?php echo utf8_encode($dado['categoria']); ?></td>
												<td class="fonte2"><?php  echo utf8_encode($dado['series']) ?></td>
												<td class="fonte2"><?php  echo utf8_encode($dado['repeticoes']); ?></td>
												<td class="fonte2"><?php  echo utf8_encode($dado['peso']); ?></td>
												<td class="fonte2"><?php $status = $dado['status']; 
												if ($status == "A fazer") {
													echo "<b style='color: red;'>A fazer</b>";
												}else{
													echo "<b style='color: green'>Feito</b>";
												}	
												?></td>
												<td class="fonte2" >

													<form action="atualizarStatus.php"  method="POST">
														<input type="hidden" name="exercicio" value="<?php echo $dado['id_exercicio']; ?>">
														<button type="submit" class="btn btn-success">Concluído</button></a> 
													</form>

													
												</td>

												<tbody>
												<?php } ?>

											</table>

										</div>
									</div>
								</div>
							</div>
						</div>
						<div><br>
		<div class="container">
	<button style="background-color: #FFFF00; " type="button" class="btn btn-default tamanhobutton" data-toggle="collapse" data-target="#sabado">Sábado</button>
	<div id="sabado" class="collapse">

		<div  class="col-sm-10">
			<br>
			<div class="panel panel-default" >

				<table class="table table-hover">
					<thead>
						<tr>

							<th class="fonte">Descrição Exercício</th>
							<th class="fonte">Categoria</th>	
							<th class="fonte">Séries</th>
							<th class="fonte">Repetições</th>
							<th class="fonte">Peso</th>
							<th class="fonte">Status</th>
						</tr>
					</thead>
					<?php 

					$query6 =  mysqli_query($conexao, "SELECT  * FROM exercicio WHERE id_aluno = '$id_aluno' and  dia = 'sabado'");

					?>

					<?php while($dado = $query6->fetch_array()){ ?>
						<tbody>
							<tr>
								<td class="fonte2"><?php echo utf8_encode($dado['descricao']); ?></td>
								<td class="fonte2"><?php echo utf8_encode($dado['categoria']); ?></td>
								<td class="fonte2"><?php  echo utf8_encode($dado['series']) ?></td>
								<td class="fonte2"><?php  echo utf8_encode($dado['repeticoes']); ?></td>
								<td class="fonte2"><?php  echo utf8_encode($dado['peso']); ?></td>
								<td class="fonte2"><?php $status = $dado['status']; 
									if ($status == "A fazer") {
													echo "<b style='color: red;'>A fazer</b>";
									}else{
													echo "<b style='color: green'>Feito</b>";
												}	
									?></td>
												<td class="fonte2" >

													<form action="atualizarStatus.php"  method="POST">
														<input type="hidden" name="exercicio" value="<?php echo $dado['id_exercicio']; ?>">
														<button type="submit" class="btn btn-success">Concluído</button></a> 
													</form>

													
												</td>

								<tbody>
								<?php } ?>

							</table>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div><br>



	</body>
</html>

							