<?php 

if(!isset($_SESSION)) 
{ 
	session_start(); 
} 
include('../conexao.php');

  // Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['id_professor'])) {
      // Destrói a sessão por segurança
	session_destroy();

      // Redireciona o visitante de volta pro login
	header("Location: ../index.php"); exit;

}

$id_aluno = intval($_GET['id_aluno']);


$_SESSION['id_aluno '] = $id_aluno;

$query =  mysqli_query($conexao, "SELECT  * FROM aluno WHERE id_aluno = '$id_aluno'  LIMIT 1");// Seleciona todos dados do usuário que está registrado no banco de dados

$resultado = mysqli_fetch_assoc($query);// Array que guarda todos dados do usuário

$_SESSION['nome_aluno'] = $resultado['nome'];  //Guarda título da publicação
$_SESSION['id_aluno'] = $resultado['id_aluno'];
$_SESSION['matricula'] = $resultado['matricula']; 





//

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	h1{
		text-align: center;
		font-family: 'Roboto Slab', serif;

	}



	.tamanhobutton{
		width: 200px;
		height: 50px;
	}
</style>
<script type="text/javascript">
	
	function cadastrar(){
		if (!confirm('Tem certeza que deseja cadastrar este exercício para <?php echo $_SESSION['nome']; ?> ?')){ 
			return false;
		}else{

			document.formulario.submit();
		}
	}
</script>
</head>
<body>

	<?php include("menu.php") ?>

	<h1>Cadastro de exercício</h1>
	<a href="listarAlunos.php"><button class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Voltar </button></a>


	<div class="container">

		<div  class="col-lg-12">
			<br>
			<div class="panel panel-default" style="background: rgba(255, 255, 255, 0.2);">
				<h3 style="color: white;">Cadastrando exercício para o aluno: <?php $nome =  $_SESSION['nome_aluno'];  echo "<b style='color: blue;'>".$nome."</b>" ?></h3>

				<h1 align="center" style="color: white;">Dias da Semana</h1>

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

													<a href="javascript: if(confirm('Tem certeza que deseja apagar o exercício?')); 
													location.href='apagarexercicio.php?p=excluir&exercicio=<?php echo $dado['id_exercicio']; ?>';"><button class="btn btn-danger">Excluir</button></a> 


												</td>
												<td><form action="editaraluno.php"  method="POST">
													<input type="hidden" name="id_aluno" value="<?php  echo $dado["id_aluno"] ?>">
													<input class="btn btn-primary"  type="submit" value="Editar" >
												</form></td>

											</tr>
										</tbody>
										<tbody>
										<?php } ?>
										<td>
											<button  class="btn btn-info" data-toggle="modal" data-target="#exercicio">Cadastrar novo exercício</button>
										</td>
									</tbody>

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

														<a href="javascript: if(confirm('Tem certeza que deseja apagar o exercício?')); 
														location.href='apagarexercicio.php?p=excluir&exercicio=<?php echo $dado['id_exercicio']; ?>';"><button class="btn btn-danger">Excluir</button></a> 


													</td>
													<td><form action="editaraluno.php"  method="POST">
														<input type="hidden" name="id_aluno" value="<?php  echo $dado["id_aluno"] ?>">
														<input class="btn btn-primary"  type="submit" value="Editar" >
													</form></td>

												</tr>
											</tbody>
											<tbody>
											<?php } ?>
											<td>
												<button  class="btn btn-info" data-toggle="modal" data-target="#exercicio">Cadastrar novo exercício</button>
											</td>
										</tbody>

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

													<a href="javascript: if(confirm('Tem certeza que deseja apagar o exercício?')); 
													location.href='apagarexercicio.php?p=excluir&exercicio=<?php echo $dado['id_exercicio']; ?>';"><button class="btn btn-danger">Excluir</button></a> 


												</td>
												<td><form action="editaraluno.php"  method="POST">
													<input type="hidden" name="id_aluno" value="<?php  echo $dado["id_aluno"] ?>">
													<input class="btn btn-primary"  type="submit" value="Editar" >
												</form></td>

											</tr>
										</tbody>
										<tbody>
										<?php } ?>
										<td>
											<button  class="btn btn-info" data-toggle="modal" data-target="#exercicio">Cadastrar novo exercício</button>
										</td>
									</tbody>

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

														<a href="javascript: if(confirm('Tem certeza que deseja apagar o exercício?')); 
														location.href='apagarexercicio.php?p=excluir&exercicio=<?php echo $dado['id_exercicio']; ?>';"><button class="btn btn-danger">Excluir</button></a> 


													</td>
													<td><form action="editaraluno.php"  method="POST">
														<input type="hidden" name="id_aluno" value="<?php  echo $dado["id_aluno"] ?>">
														<input class="btn btn-primary"  type="submit" value="Editar" >
													</form></td>

												</tr>
											</tbody>
											<tbody>
											<?php } ?>
											<td>
												<button  class="btn btn-info" data-toggle="modal" data-target="#exercicio">Cadastrar novo exercício</button>
											</td>
										</tbody>

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

															<a href="javascript: if(confirm('Tem certeza que deseja apagar o exercício?')); 
															location.href='apagarexercicio.php?p=excluir&exercicio=<?php echo $dado['id_exercicio']; ?>';"><button class="btn btn-danger">Excluir</button></a> 


														</td>
														<td><form action="editaraluno.php"  method="POST">
															<input type="hidden" name="id_aluno" value="<?php  echo $dado["id_aluno"] ?>">
															<input class="btn btn-primary"  type="submit" value="Editar" >
														</form></td>

													</tr>
												</tbody>
												<tbody>
												<?php } ?>
												<td>
													<button  class="btn btn-info" data-toggle="modal" data-target="#exercicio">Cadastrar novo exercício</button>
												</td>
											</tbody>

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

																<a href="javascript: if(confirm('Tem certeza que deseja apagar o exercício?')); 
																location.href='apagarexercicio.php?p=excluir&exercicio=<?php echo $dado['id_exercicio']; ?>';"><button class="btn btn-danger">Excluir</button></a> 


															</td>
															<td><form action="editaraluno.php"  method="POST">
																<input type="hidden" name="id_aluno" value="<?php  echo $dado["id_aluno"] ?>">
																<input class="btn btn-primary"  type="submit" value="Editar" >
															</form></td>

														</tr>
													</tbody>
													<tbody>
													<?php } ?>
													<td>
														<button  class="btn btn-info" data-toggle="modal" data-target="#exercicio">Cadastrar novo exercício</button>
													</td>
												</tbody>

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

																<a href="javascript: if(confirm('Tem certeza que deseja apagar o exercício?')); 
																location.href='apagarexercicio.php?p=excluir&exercicio=<?php echo $dado['id_exercicio']; ?>';"><button class="btn btn-danger">Excluir</button></a> 


															</td>
															<td><form action="editaraluno.php"  method="POST">
																<input type="hidden" name="id_aluno" value="<?php  echo $dado["id_aluno"] ?>">
																<input class="btn btn-primary"  type="submit" value="Editar" >
															</form></td>

														</tr>
													</tbody>
													<tbody>
													<?php } ?>
													<td>
														<button  class="btn btn-info" data-toggle="modal" data-target="#exercicio">Cadastrar novo exercício</button>
													</td>
												</tbody>

											</table>

										</div>
									</div>
								</div>
							</div>
						</div>
						<div><br>






















							<!-- Modal para cadastrar exercício -->
							<div class="modal fade" id="exercicio" role="dialog" data-backdrop="static" >
								<div class="modal-dialog modal-md">

									<!-- Conteúdo da modal-->
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title fontePadrao" align="center">Cadastro de exercício</h4>
										</div>
										<div class="modal-body" >

											<!-- Formulário do professor-->	
											<form method="POST" action="inserirExercicio.php" name="formulario">
												<div class="form-group">
													<label for="descricao">Descrição do exercício:</label>
													<input type="text" class="form-control" name="descricao" id="descricao" required=""  maxlength="60"  minlength="3">
												</div>

												<label class="fonte" >Categoria do exercício</label>
												<select required="" name="categoria" class="form-control" style="width: 130px;">
													<option value="Peito" class=" fonte">Peito</option>
													<option value="ombro" class=" fonte">Ombro</option>
													<option value="perna" class=" fonte">Perna</option>
													<option value="triceps" class=" fonte">Tríceps</option>
													<option value="biceps" class=" fonte">Bíceps</option>
													<option value="abdomen" class=" fonte">Abdomen</option>
													<option value="costa" class=" fonte">Costa</option>
													<option value="antebraco" class=" fonte">Antebraço</option>
												</select>




												<div class="form-group"  >
													<label for="series">Quantidade de séries:</label>
													<input style="width: 130px;" type="text" class="form-control" id="series"  name="series" required=""   minlength="1" />
												</div>

												<div class="form-group">
													<label for="repeticoes">Quantidade de repetições</label>
													<input type="text"  style="width: 130px;" class="form-control" name="repeticoes" id="repeticoes" maxlength="10" minlength="1" name="repeticoes" required=""  />
												</div>

												<div class="form-group">
													<label for="kg">Quantidade de peso</label>
													<input type="text"  style="width: 130px;" class="form-control"  id="kg" maxlength="20"  name="peso" required=""  />
												</div>


												<label class="fonte" >Selecione o dia</label>
												<select required="" name="dia" class="form-control" style="width: 130px;">
													<option value="domingo" class=" fonte">Domingo</option>
													<option value="segunda" class=" fonte">Segunda-feira</option>
													<option value="terca" class=" fonte">Terça-feira</option>
													<option value="quarta" class=" fonte">Quarta-feira</option>
													<option value="quinta" class=" fonte">Quinta-feira</option>
													<option value="sexta" class=" fonte">Sexta-feira</option>
													<option value="sabado" class=" fonte">Sábado</option>		
												</select>




												<input  type="hidden" name="aluno" value="<?php echo $_SESSION['id_aluno'] ?>">
												<input  type="hidden" name="professor" value="<?php echo $_SESSION['id_professor'] ?>">

												<div align="right">
													<a href="listarAlunos.php"><button type="button" class="btn btn-danger">Cancelar</button></a>
													<button type="submit" class="btn btn-primary" onclick="cadastrar();" >Cadastrar</button>
												</div>
												<br>

											</form>
											<br>
											<!-- Fim do Formulário de cadastro de exercício-->	
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default fontePadrao" data-dismiss="modal">Fechar</button>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Fim modal de adastro de exercício-->	


		</body>
		</html>