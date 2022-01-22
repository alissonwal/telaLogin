<?php
require_once 'CLASSES/usuarios.php';
$u = new Usuario;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Login</title>
  </head>
  <body>
    <main class="login">
      <div class="container">
        <h1>Entrar</h1>
        <form method="POST">
          <input type="email" name="email" placeholder="Usuário" />
          <input type="password" name="senha" placeholder="Senha" />
          <button class="submit">Acessar</button>
         <a class="cadastro" href="cadastrar.php">Ainda não é inscrito?<br><strong>Cadastre-se!</br></strong></a>
        </form>
      </div>
   </main>
    <?php
          if(isset($_POST['email']))
          {
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
   
            if(!empty($email) && !empty($senha))
            {
              $u->conectar("projeto_login","localhost","root","");
              if($u->msgErro == "")
              {
                if($u->logar($email,$senha))
                {
                  header("location: AreaPrivada.php");
                }
                else
                {
                  
                  ?>
                      <div class="msg-erro">
                      Email e/ou senha estão incorretos!
                      </div>
                    <?php
                }
              }else
              {
                ?> 
                 <div class="msg-erro">
                   <?php echo "Erro: ".$u->msgErro;?>
                  </div>
                 <?php
              }
             }else
             {
              ?>
                <div class="msg-erro">
                   Preencha todos os campos!
                </div>
              <?php 
             }
            }
          

      ?>
  </body>
</html>
