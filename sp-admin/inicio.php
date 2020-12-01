<?php
//=========================================
// BACKEND DA APLICAÇÂO WEB
//=========================================

// VERIFICA A SESSÃO
if (!isset($_SESSION['a'])) {
    exit();
}

// LIMPA OS FILTROS DAS PESQUISAS DA TABELA DOS CLIENTES
if (isset($_SESSION['texto_pesquisa'])) {
    unset($_SESSION['texto_pesquisa']);
}
?>

<div class="container pad-20">
    <div class="row mt-5 p-3">
        <div class="col-md-8 offset-md-2 card">
            <?php if (funcoes::Permissao(0)) : ?>

                <!-- SETUP DA BASE DE DADOS -->
                <div class="text-center mt-5">
                    <h3><i class="fa fa-database"></i> Área dos Administradores</h3>
                    <a href="?a=setup" class="btn btn-outline-primary btn-lg btn-size-300 mt-4">Setup da Base de Dados</a><br>
                    <!-- TABELA DE CLIENTES -->
                    <a href="?a=clientes_lista" class="btn btn-outline-success btn-lg btn-size-300 mt-4">Tabela de Clientes</a>
                </div>
                <div class="text-center">
                    <a href="../index.php?a=backend" class="btn btn-secondary btn-size-150 mb-5 mt-5">Voltar</a>
                </div>

            <?php else : ?>

                <div class="text-center mt-5">
                    <h3><i class="fa fa-database"></i> Área dos Utilizadores</h3>
                    <!-- SEM PERMISSÂO -->
                    <button href="#" class="btn btn-outline-warning btn-lg btn-size-300 mt-4" disabled>
                        <i class="fa fa-ban"></i> Sem Permissão
                    </button><br>
                    <!-- TABELA DE CLIENTES -->
                    <a href="?a=clientes_lista" class="btn btn-outline-success btn-lg btn-size-300 mt-4">Tabela de Clientes</a>
                </div>
                <div class="text-center">
                    <a href="../index.php?a=backend" class="btn btn-secondary btn-size-150 mb-5 mt-5">Voltar</a>
                </div>

            <?php endif; ?>
        </div>
    </div>
</div>