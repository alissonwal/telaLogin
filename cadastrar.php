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
        <h1>Cadastrar</h1>
        <form method="POST">
          <input type="text" name="nome" placeholder="Nome Completo" maxlength="30"/>
          <input type="text" name="telefone" placeholder="Telefone" maxlength="30"/>
          <input type="email" name="email" placeholder="Usuário" maxlength="40"/>
          <input type="password" name="senha" placeholder="Senha" maxlength="15"/>
          <input type="password" name="confSenha" placeholder="Confirmar Senha" maxlength="15"/>
          <button class="submit">Cadastrar</button>
          

          

        </form>
      </div>
    
    <?php
       if(isset($_POST['nome']))
       {
         $nome = addslashes($_POST['nome']);
         $telefone = addslashes($_POST['telefone']);
         $email = addslashes($_POST['email']);
         $senha = addslashes($_POST['senha']);
         $confirmarSenha = addslashes($_POST['confSenha']);

         if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
         {
              $u->conectar("projeto_login","localhost","root","");
              if($u->msgErro == "")
              {
                if($senha == $confirmarSenha) 
                {
                  if($u->cadastrar($nome,$telefone,$email,$senha))
                  {
                    ?>  
                      <div id="msg-sucesso">
                        Cadastrado com sucesso! Acesse para entrar!
                        <br>
                        <a href="index.php">Voltar a area de login</a>

                      </div>
                    
                    <?php
                  }
                  else
                  {
                    ?>
                      <div class="msg-erro">
                        Email já cadastrado!
                      </div>
                    <?php
                  }
                }
                else
                {
                  ?>
                      <div class="msg-erro">
                      Senha e confirmar senha nao correspondem!
                      </div>
                    <?php
                    

                }
              }
              else{

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
      </main>
  </body>
</html>
