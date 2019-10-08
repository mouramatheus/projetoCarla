<!DOCTYPE html>
<html>
<head>
	<title>Busca Pacientes</title>
	<meta charset="utf-8">
	<!--Calcula a largura da tela pelo tamanho do device-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastra Paciente</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php 
		require('..'.DIRECTORY_SEPARATOR.'config.php');

		$sql = $pdo->prepare('SELECT pac.PAC_DATA_PEDIDO, pac.PAC_NOME, pac.PAC_NASC, proc.PROC_COD, proc.PROC_DESC, pac.PAC_CART_SUS, pend.PEND_DESC, med.MED_NOME, pac.PAC_OBS FROM pac,pend,proc,med WHERE pac.PAC_PEND = pend.ID AND PAC_MED = med.MED_ID AND pac.PAC_PROC = proc.PROC_ID ');

		$sql->execute();

		$info = $sql->fetchAll(PDO::FETCH_ASSOC);


		
	?>
	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  		<a class="navbar-brand" href="#">Cirurcor</a>
	  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
	    	<span class="navbar-toggler-icon"></span>
	  		</button>
		  	<div class="collapse navbar-collapse" id="navbarNav">
		    	<ul class="navbar-nav">
			    	<li class="nav-item active">
			       		<a class="nav-link" href="busca.php">Busca pacientes	 <span class="sr-only">(Página atual)</span></a>
			    	</li>
			      	
			      	<li class="nav-item">
			        	<a class="nav-link" href="cadastraMedico.php">Cadastra Médico</a>
			      	</li>
			      		
			      	<li class="nav-item">
			        	<a class="nav-link" href="cadastraPaciente.php">Cadastra Paciente</a>
			      	</li>

			      	<li class="nav-item">
			        	<a class="nav-link" href="cadastraPendencias.php">Cadastra Pendencias</a>
			      	</li>

			      	<li class="nav-item">
			        	<a class="nav-link" href="cadastraProcedimento.php">Cadastra Procedimentos</a>
			      	</li>
			      		
			      	<!-- Item inativo
			      	<li class="nav-item">
			        	<a class="nav-link disabled" href="#">Desativado</a>
			      	</li>-->
			    </ul>
		  	</div>
		</nav>
	</header>
	<div class="container">
		<table class="table table-striped">
		  	<thead><!-- Cabeçalho-->
		    	<tr>
		      		<th scope="col">Data do Pedido</th>
		      		<th scope="col">Nome</th>
		      		<th scope="col">Data Nasc</th>
		      		<th scope="col">Procedimento</th>
		      		<th scope="col">Cód Procedimento</th>
		      		<th scope="col">N° Cartão SUS</th>
		      		<th scope="col">Tipo de Pendência</th>
		      		<th scope="col">Cardiologista Solicitante</th>
		      		<th scope="col">Observação</th>
		    	</tr>
		  	</thead><!-- Cabeçalho-->
		  	
		  	<tbody><!-- Corpo da tabela-->
		    

		    	<?php 
		    		foreach ($info as $key => $value) {
		    			?>
		    			<tr>
		    				<td><?php echo $value['PAC_DATA_PEDIDO']; ?></td>
		    				<td><?php echo $value['PAC_NOME']; ?></td>
		    				<td><?php echo $value['PAC_NASC']; ?></td>
		    				<td><?php echo $value['PROC_COD']; ?></td>
		    				<td><?php echo $value['PROC_DESC']; ?></td>
		    				<td><?php echo $value['PAC_CART_SUS']; ?></td>
		    				<td><?php echo $value['PEND_DESC']; ?></td>
		    				<td><?php echo $value['MED_NOME']; ?></td>
		    				<td><?php echo $value['PAC_OBS']; ?></td>
		    			</tr>
		    		<?php } ?>

		    		<?php 
		    			if(!isset($_SESSION['login']) and !isset($_SESSION['senha'])){
							echo "não logado";
							header("location:"."..".DIRECTORY_SEPARATOR."index.php");
						}
		    		?>


		  	</tbody><!-- Corpo da tabela-->

		</table>
		<form method="post">
			<input type="submit" name="sair" value="Sair">
		</form>

		<?php 
			if(isset($_POST['sair'])){
				session_destroy();
				header("location:"."..".DIRECTORY_SEPARATOR."index.php");
			}
		?>
	</div>

</body>
</html>