<?php

require_once('./func/functions.php');
require_once('./config/database.php');

if(!isset($_SESSION)){
    session_start();
} 

if(isNOTLogged()){
    if(isset($_POST['usuario'])){
        
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM usuarios WHERE usr_usuario = :usuario"; // 
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();

        $retorno = $stmt->fetch();
        if ($retorno) {
            if (password_verify($senha, $retorno['usr_senha'])) { // login realizado
                $_SESSION['id'] = $retorno['id_usuario'];
                header("location: index.php");
            } else {
                echo "Usuário ou senha incorretos";
            }
        } else {
            echo "Usuário não encontrado";
        }
        

    }

}
?>

<div class="my-5 d-flex align-items-center justify-content-center">

    <div class="border border-dark rounded p-5">

        <form action="" method="POST">
    
            <div class="form-group">
    
                <label>Usuário</label>
                <input type="text" class="form-control" name="usuario" required placeholder="Digite seu usuário.">
    
            </div>
            
            <div class="form-group">
             
                <label>Senha</label>
                <input type="password" class="form-control" name="senha" required placeholder=" Digite sua senha.">
    
            </div>
    
            <div class="float-end">
                <button type="submit" class="btn btn-dark mt-4">Entrar</button>
            </div>
            
        </form>

    </div>

</div>




