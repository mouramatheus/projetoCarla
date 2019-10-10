	<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!--Calcula a largura da tela pelo tamanho do device-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastra Paciente</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<?php require('..'.DIRECTORY_SEPARATOR.'config.php');?>
</head>
<body>
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
	<div class="container"><!--container -->
		<form method="post">

			<?php 
				$sql = $pdo->prepare("SELECT * FROM proc");
				$sql->execute();  
				$info = $sql->fetchAll(PDO::FETCH_ASSOC);
			?>

			<!-- Nome do Paciente-->
		  	<div class="form-group"><!--form-group-->
		    	<label for="i1">Nome do paciente</label>
		    	<input type="text" name='nomePac' class="form-control" id="i1" placeholder="Nome do paciente">
		  	</div><!--form-group-->

		  	<!-- Data de Nascimento-->
		  	<div class="form-group">
 				<label for="example-month-input" class="col-2 col-form-label">Data Nascimento</label>
    			<input name="dtNasc" class="form-control" type="date" value="2011-08" id="example-month-input">
			</div>

			<!-- Cartão do Sus -->
		  	<div class="form-group"><!--form-group-->
		    	<label for="i1">N° Cartão do SUS</label>
		    	<input name="cartaoSus" type="number" class="form-control" id="i1" placeholder="Numero do cartão do SUS">
		  	</div><!--form-group-->

			<!-- Procedimento-->
		  	<div class="form-group"><!--form-group-->
		    	<label>Procedimento</label>
		    	<select id="proced" name="procedimento" class="form-control">
		    		<?php 
			
		    			foreach ($info as $key => $value) {?>
		    				<option value=<?php echo $value['PROC_ID'];?>><?php echo $value['PROC_DESC'];?></option>	
		    				<?php
		    		}?>
		    	</select>
		  	</div><!--form-group-->

		  	<!-- Tipo de Pendências-->
		    <div class="form-group"><!--form-group-->
		    	<label>Tipo de Pendência</label>
		    	<select name="pendencias" class="form-control">
		    		<?php 
		    			$sql = $pdo->prepare("SELECT * FROM pend");
						$sql->execute();  
						$info = $sql->fetchAll(PDO::FETCH_ASSOC);

						foreach ($info as $key => $value) {?>
							<option value=<?php echo $value['ID'];?>><?php echo $value['PEND_DESC'];?></option>		
						<?php }
		    		?>
		    		</select><!--Concluido Pendencias-->
		  	</div><!--form-group-->

		  	<!-- Cardiologista Solicitante-->
		    <div class="form-group"><!--form-group-->
		    	<label>Cardiologista Solicitante</label>
		    	<select name="medico" class="form-control">
		    		<?php 
		    			$sql = $pdo->prepare("SELECT * FROM med");
						$sql->execute();  
						$info = $sql->fetchAll(PDO::FETCH_ASSOC);

						foreach ($info as $key => $value) {?>
							<option value= <?php echo $value['MED_ID']?>><?php echo $value['MED_NOME'];?></option>		
						<?php }
		    		?>
		    		</select><!--Concluido Pendencias-->
		  	</div><!--form-group-->

		  	<!-- Observação-->
		  	<div class="form-group"><!--form-group-->
		  		<label>Observação</label>
		  		<input type="text" name="obsPac" class="form-control">
		    	<!-- <textarea class="form-control" rows="3"></textarea>-->
		  	</div><!--form-group-->

		  	<!-- Data do Procedimento-->
			<div class="form-group">
	 			<label for="example-month-input" class="col-2 col-form-label">Data Pedido</label>
    			<input name="dtProcedimento" class="form-control" type="date" value="2011-08" id="example-month-input">
			</div>
		

			<input type="submit" name='acao' value="Cadastrar" class="btn btn-primary">
			<input type="submit" name="buscar" value="Buscar" class="btn btn-primary">
			<input type="submit" name="atualizar" value="Atualizar" class="btn btn-primary">
	</form>
	
</div><!--container -->
		<?php
			if(isset($_POST['acao'])){
			
				//Capturando valores para o input no banco
				$nomePac = $_POST['nomePac'];
				$dtNasc = $_POST['dtNasc'];
				$cartaoSus = $_POST['cartaoSus'];
				$obsPac = $_POST['obsPac'];
				$procedimentoId = $_POST['procedimento'];
				$pendenciaId = $_POST['pendencias'];
				$medicoId = $_POST['medico'];
				$dtProcedimento = $_POST['dtProcedimento'];
				$sql = $pdo->prepare("INSERT INTO pac VALUES (null,?,?,?,?,?,?,?,?)");
				$sql->execute(array($nomePac,$dtNasc,$cartaoSus,$procedimentoId,$pendenciaId,$medicoId,$dtProcedimento,$obsPac));
			}

			if(isset($_POST['buscar'])){
				
			}
		
			
		?>

		<?php 
		?>

</body>
</html>