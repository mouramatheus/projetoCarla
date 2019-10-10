<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
  <meta charset="utf-8">
  <!--Calcula a largura da tela pelo tamanho do device-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <?php require("config.php");?>
</head>
<body>
	<form method="post" class="container">
  		<div class="form-group">
    		<label for="login">Login</label>
    		<input type="text" class="form-control" name="login" id="login" placeholder="Seu login" required>
  		</div>
  
  		<div class="form-group">
    		<label for="senha">Senha</label>
    		<input type="password" class="form-control" name="senha" id="senha" placeholder="Senha">
  		</div>

  		<input id="enviar" type="submit" name="acao" value="Entrar" class="btn btn-primary">
	</form>

    <?php
      if(isset($_POST['acao'])){
        $sql = $pdo->prepare("SELECT * FROM usr WHERE USR_LOGIN = :login and USR_SENHA = :senha");
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $sql->bindParam(":login",$login);
        $sql->bindParam(":senha",$senha);

        if($sql->execute() === false){
          print_r($sql->errorInfo());
        }

        else{
          if($sql->fetchAll(PDO::FETCH_ASSOC) == Array()){
            echo "Login e/ou senha incorretos";
            header("location:index.php");
          }
          else{
            $_SESSION['login'] = $login;
            $_SESSION['senha'] = $senha;
            header("location:".DIRECTORY_SEPARATOR."cirurgias/pages/busca.php");
          }
        }
       
       }    

       /*
          - Falta criar:
            - Tela de busca paciente individual (update)
              - Buscar pelo nome do paciente
            - Criar status de inativo.


       */ 
                
        
    ?>

</body>
</html>