<?php
//=========================================
// BARRA DOS CLIENTES
//=========================================

// VERIFICA A SESSÃO
if (!isset($_SESSION['a'])) {
    exit();
}
?>

<!-- BARRA DO CLIENTE -->
<div class="container-fluid barra-cliente">
    <div class="text-right">

        <!-- CLIENTE LOGADO -->
        <?php if (funcoes::VerificarLoginCliente()) : ?>

            <i class="fa fa-user mr-2"></i><?php echo $_SESSION['nome_cliente'] ?>

            <!-- DROPDOWN MENU -->
            <div class="dropdown d-inline">
                <a class="btn btn-secondary ml-2 mr-2 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Definições <i class="fa fa-cog"></i></a>
                <div class="dropdown-menu mr-4" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="?a=perfil"><i class="fa fa-id-card"></i> Acesso ao perfil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="?a=logout"><i class="fa fa-sign-out"></i> Logout</a>
                </div>
            </div>

        <?php else : ?>

            <!-- CLIENTE NÃO LOGADO -->
            <div class="dropdown d-inline">

                <!-- INTERRUPTOR -->
                <a href="?a=login" class="mr-2" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sign-in"></i> Login</a>|

                <!-- DROPDOWN FORM -->
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <div class="p-3">
                        <form action="?a=login" method="post">
                            <input type="text" class="form-control" name="text_utilizador" placeholder="Utilizador" required patter=".{3,20}" , title="Entre 3 e 20 caracteres.">
                            <input type="password" class="form-control mt-3" name="text_senha" placeholder="Password" required patter=".{3,20}" , title="Entre 3 e 20 caracteres.">
                            <div class="text-center mt-2">
                                <a href="#">Esqueceu a sua password?</a>
                            </div>

                            <div class="text-center">
                                <button class="btn btn-primary btn-size-100 mt-3">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="d-inline">
                <a href="?a=signup" class="ml-2"><i class="fa fa-user-plus"></i> Signup</a>
            </div>

        <?php endif; ?>
    </div>
</div>