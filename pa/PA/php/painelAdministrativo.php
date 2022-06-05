<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>Aydy - Painel Administrativo de Vagas</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../css/app.css">
	<link rel="stylesheet" href="../css/header.css">
	<link rel="stylesheet" href="../css/hero.css">
	<link rel="stylesheet" href="../css/home.css">
	<link rel="stylesheet" href="../css/footer.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/responsive.css">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/vagas.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="//code.tidio.co/ntdiz2zalejasvjrwzsjfcdj8vegtcgl.js" async></script>
</head>

<?php $con = new PDO("mysql:host=localhost;dbname=aydy", "root", "");
$sql = 'SELECT VAG_ID, VAG_NOME, VAG_AREA, VAG_SITUACAO, VAG_REGIME, VAG_DATAINICIO, VAG_DATAFIM, VAG_REMUNERACAO, VAG_DESCRICAO FROM TB_VAGA';
?>

<body>
	<my-header></my-header>
	<section class="about_section layout_paddingMenor">
		<center>
			<br><br><br><br><br>
			<div class="container-sm ContainarAjustes">
				<h2><i>PAINEL ADMINISTRATIVO</i></h2>
				<div class="row">
					<div class="col-6">
						<a href="painelAdministrativo.php" class="btnCadastrar">Atualizar</a>
					</div>
					<div class="col-6">
						<a href="index.html" class="btnCadastrar">Sair</a>
					</div>
				</div>
				<div class="conatiner theme-showcase" role="main">
					<div class="row">
						<table class="table">

							<h1>VAGAS</h1>

							<thead>
								<tr>
									<th>ID</th>
									<th>Nome</th>
									<th>Área</th>
									<th>Regime</th>
									<th>Situação</th>
									<th>Início</th>
									<th>Fim</th>
									<th>Remuneração</th>
									<th>Descrição</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach ($con->query($sql) as $linha) {
									echo "<tr>";
									echo "<td>" . $linha['VAG_ID'] . "</td>";
									echo "<td>" . $linha['VAG_NOME'] . "</td>";
									echo "<td>" . $linha['VAG_AREA'] . "</td>";
									echo "<td>" . $linha['VAG_REGIME'] . "</td>";
									echo "<td>" . $linha['VAG_SITUACAO'] . "</td>";
									echo "<td>" . $linha['VAG_DATAINICIO'] . "</td>";
									echo "<td>" . $linha['VAG_DATAFIM'] . "</td>";
									echo "<td>" . $linha['VAG_REMUNERACAO'] . "</td>";
									echo "<td>" . $linha['VAG_DESCRICAO'] . "</td>";
								?>
									<td>
										<a href="vaga-aprovar.php?id=<?php echo $linha['VAG_ID'] ?>" class="btn btn-sm btn-success">APROVAR</a>

										<a href="vaga-negar.php?id=<?php echo $linha['VAG_ID'] ?>" class="btn btn-sm btn-warning">NEGAR</a>

										<a href="vaga-excluir.php?id=<?php echo $linha['VAG_ID'] ?>" class="btn btn-sm btn-danger">EXCLUIR</a>

									</td>

									</form>
									</tr>
									<br><br><br><br>
								<?php }	?>

							</tbody>
						</table>
					</div>
				</div>
		</center>
	</section>
	<my-footer></my-footer>

	<script src="../js/myHeader.js" defer></script>
	<script src="../js/myFooter.js" defer></script>

</body>

</html>