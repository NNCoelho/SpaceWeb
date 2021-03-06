<?php
//=========================================
// SETUP DA BASE DE DADOS
//=========================================

// VERIFICA A SESSÃO
if (!isset($_SESSION['a'])) {
    exit();
}

// VERIFICA PERMISSÃO DE ADMINISTRADOR
$erro_permissao = false;
if (!funcoes::Permissao(0)) {
    $erro_permissao = true;
}

// VERIFICA SE A VARIÁVEL 'A' ESTÁ DEFINIDA NA URL
$a = '';
if (isset($_GET['a'])) {
    $a = $_GET['a'];
}

// ROUTE DO SETUP
switch ($a) {

        // EXECUTA OS PROCEDIMENTOS PARA A CRIAÇÃO DA BASE DE DADOS
    case 'setup_criar_bd':
        include('setup_criar_bd.php');
        break;

        // INSERIR UTILIZADORES
    case 'setup_inserir_utilizadores':
        include('setup_inserir_utilizadores.php');
        break;

        // INSERIR CLIENTES
    case 'setup_inserir_clientes':
        include('setup_inserir_clientes.php');
        break;
}
?>

<!-- ERRO DE PERMISSÃO -->
<?php if ($erro_permissao) : ?>
    <?php include('../inc/sem_permissao.php') ?>
<?php else : ?>

    <div class="container-fluid p-3">
        <h2 class="text-center mt-4 mb-5"><i class="fa fa-wrench"></i> Manutenção da base de dados</h2>

        <div class="text-center">
            <!-- LIMPA E CONTRÓI A BASE DE DADOS -->
            <p><a href="?a=setup_criar_bd" class="btn btn-warning btn-size-300 mb-1">
                    <i class="fa fa-table fa-lg"></i>&nbsp;&nbsp;Limpa e constrói a base de dados</a>
            </p>
            <!-- INSERIR UTILIZADORES -->
            <p><a href="?a=setup_inserir_utilizadores" class="btn btn-primary btn-size-300 mt-1">
                    <i class="fa fa-user-plus fa-lg"></i>&nbsp;&nbsp;Inserir utilizadores</a>
            </p>
            <!-- INSERIR CLIENTES -->
            <p><a href="?a=setup_inserir_clientes" class="btn btn-success btn-size-300 mt-1">
                    <i class="fa fa-user-plus fa-lg"></i>&nbsp;&nbsp;Inserir clientes</a>
            </p>
            <hr class="mt-5 mb-4">
            <p><a href="../sp-admin/index.php" class="btn btn-secondary mt-3 btn-size-150">Voltar</a></p>
        </div>
    </div>

<?php endif; ?>