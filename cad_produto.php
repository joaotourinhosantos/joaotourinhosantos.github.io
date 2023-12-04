<?php
	if(isset($_POST['submit'])) 
	{
		include_once('config.php');

		$nome_produto = $_POST['nome_produto'];
		$descricao = $_POST['descricao'];
		$valor = $_POST['valor'];

		$result = mysqli_query($conexao, 
		"INSERT INTO produtos(nome_produto,descricao,valor) VALUES ('$nome_produto','$descricao','$valor')");
	}
?>
<!DOCTYPE html>
<html lang="pt">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, max-scale=1">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="shortcut icon" href="assets/bakery_logo.ico" type="image/x-icon">
		<title>Cinthia's Bakery - Home</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
			integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<main>
			<br>
			<div class="container" id="container-card">
				<div>
					<div class="row justify-content-md-center">
						<div id="logo" class="col-md-auto">
							<img src="assets/bakery_logo.webp" alt="cupcake">
						</div>
					</div>
					<hr>
					<form action="cad_produto.php" method="POST">
						<div id="form-fields">
							<p>
								<label>Nome Do Produto:
								<input type="text" name="nome_produto"/>
								</label>
							</p>
							<p>
								<label>Descrição Do Produto:
								<input type="text" name="descricao"/>
								</label>
							</p>
							<p>
								<label>Valor:
								<input type="number" name="valor"/>
								</label>
							</p>
                            <button type="submit" name="submit">Concluído</button>
							<br>
							<?php
							 $dbHost = 'localhost';
							 $dbUsername = 'root';
							 $dbPassword = '';
							 $dbName = 'mysql';
							$conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

							$sql = "SELECT * FROM `produtos`";
							$result = $conexao->query($sql);
						
							while($row = $result->fetch_assoc()) {
								echo"
								<tr>
								<br>
									<td>id: $row[id] |</td>
									<td>nome do produto: $row[nome_produto] |</td>    
									<td>descrição do produto: $row[descricao] |</td>
									<td>valor: $row[valor] </td>
									<td>
									<a class='btn btn-danger btn-sm' href='delete.php?id=$row[id]'>Delete</a>
									</td>
								</tr>
								<br>
								";
							}
							?>
						</div>
					</form>
					<hr>
					<div id="baseboard">
						<div class="container text-center">
							<div class="row">
								<div class="col-sm">
									<h3>SOBRE NÓS</h3>
									<button class="btn btn-outline-secondary" id="rodape-button" onclick="window.open('sobre_nos.html')">
										<svg xmlns="http://www.w3.org/2000/svg" class="bi bi-telephone" viewBox="0 0 16 16">
											<path
												d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855-.143.268-.276.56-.395.872.705.157 1.472.257 2.282.287V1.077zM4.249 3.539c.142-.384.304-.744.481-1.078a6.7 6.7 0 0 1 .597-.933A7.01 7.01 0 0 0 3.051 3.05c.362.184.763.349 1.198.49zM3.509 7.5c.036-1.07.188-2.087.436-3.008a9.124 9.124 0 0 1-1.565-.667A6.964 6.964 0 0 0 1.018 7.5h2.49zm1.4-2.741a12.344 12.344 0 0 0-.4 2.741H7.5V5.091c-.91-.03-1.783-.145-2.591-.332zM8.5 5.09V7.5h2.99a12.342 12.342 0 0 0-.399-2.741c-.808.187-1.681.301-2.591.332zM4.51 8.5c.035.987.176 1.914.399 2.741A13.612 13.612 0 0 1 7.5 10.91V8.5H4.51zm3.99 0v2.409c.91.03 1.783.145 2.591.332.223-.827.364-1.754.4-2.741H8.5zm-3.282 3.696c.12.312.252.604.395.872.552 1.035 1.218 1.65 1.887 1.855V11.91c-.81.03-1.577.13-2.282.287zm.11 2.276a6.696 6.696 0 0 1-.598-.933 8.853 8.853 0 0 1-.481-1.079 8.38 8.38 0 0 0-1.198.49 7.01 7.01 0 0 0 2.276 1.522zm-1.383-2.964A13.36 13.36 0 0 1 3.508 8.5h-2.49a6.963 6.963 0 0 0 1.362 3.675c.47-.258.995-.482 1.565-.667zm6.728 2.964a7.009 7.009 0 0 0 2.275-1.521 8.376 8.376 0 0 0-1.197-.49 8.853 8.853 0 0 1-.481 1.078 6.688 6.688 0 0 1-.597.933zM8.5 11.909v3.014c.67-.204 1.335-.82 1.887-1.855.143-.268.276-.56.395-.872A12.63 12.63 0 0 0 8.5 11.91zm3.555-.401c.57.185 1.095.409 1.565.667A6.963 6.963 0 0 0 14.982 8.5h-2.49a13.36 13.36 0 0 1-.437 3.008zM14.982 7.5a6.963 6.963 0 0 0-1.362-3.675c-.47.258-.995.482-1.565.667.248.92.4 1.938.437 3.008h2.49zM11.27 2.461c.177.334.339.694.482 1.078a8.368 8.368 0 0 0 1.196-.49 7.01 7.01 0 0 0-2.275-1.52c.218.283.418.597.597.932zm-.488 1.343a7.765 7.765 0 0 0-.395-.872C9.835 1.897 9.17 1.282 8.5 1.077V4.09c.81-.03 1.577-.13 2.282-.287z"  />
										</svg>
									</button>
								</div>
								<div class="col-sm">
									<h3>HOME</h3>
									<button class="btn btn-outline-secondary" id="rodape-button"  onclick="window.open('index.html')">
										<svg xmlns="http://www.w3.org/2000/svg" class="bi bi-house" viewBox="0 0 16 16">
											<path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
										</svg>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<br>
		</main>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
			integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
			crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
			integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
			crossorigin="anonymous"></script>
	</body>
</html>