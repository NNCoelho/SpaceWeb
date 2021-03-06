<?php
//========================================
// GESTÃO DE UTILIZADORES
//========================================

// VERIFICA A SESSÃO
if (!isset($_SESSION['a'])) {
    exit();
}

// VERIFICA PERMISSÃO DE ADMINISTRADOR
$erro_permissao = false;
if (!funcoes::Permissao(0)) {
    $erro_permissao = true;
}
?>
<!-- ERRO DE PERMISSÃO -->
<?php if ($erro_permissao) : ?>
    <?php include('../inc/sem_permissao.php') ?>
<?php else : ?>

    <div class="container">
        <div class="row mt-2 mb-5 justify-content-center">
            <div class="col card mt-4 mb-5 p-3">
                <h4 class="text-center mt-2 mb-4"><i class="fa fa-cogs" aria-hidden="true"></i> Gestão de utilizadores</h4>

                <div class="text-center mb-4">
                    <a href="?a=inicio" class="btn btn-primary btn-size-150">Voltar</a>&nbsp;&nbsp;&nbsp;
                    <a href="?a=utilizadores_adicionar" class="btn btn-success btn-size-150">Novo utilizador</a>
                </div>

                <?php // TABELA DOS UTILIZADORES REGISTADOS NA BASE DE DADOS 
                ?>
                <table class="table">

                    <thead class="thead-dark">
                        <th></th>
                        <th>Utilizador</th>
                        <th>Nome completo</th>
                        <th>E-mail</th>
                        <th class="text-center">Ação</th>
                    </thead>

                    <?php
                    $gestor = new Gestor();
                    $dados_utilizadores = $gestor->EXE_QUERY(
                        'SELECT * FROM utilizadores'
                    );
                    ?>

                    <?php foreach ($dados_utilizadores as $utilizador) : ?>
                        <tr>
                            <!-- DIFERENCIAÇÃO DO ICON DE ADMINISTRADOR -->
                            <?php if (substr($utilizador['permissoes'], 0, 1) == 1) : ?>
                                <td><i class="fa fa-user"></i></td>
                            <?php else : ?>
                                <td><i class="fa fa-user-o"></i></td>
                            <?php endif; ?>

                            <td><?php echo $utilizador['utilizador'] ?></td>
                            <td><?php echo $utilizador['nome'] ?></td>
                            <td><?php echo $utilizador['email'] ?></td>

                            <td>
                                <!-- MENU DO DROPDOWN -->
                                <?php
                                $id = $utilizador['id_utilizador'];

                                // DEFINE A RELAÇÃO ENTRE O(S) ADMIN(S) E O DROPDOWN
                                $drop = true;
                                if ($id == 1 || $id == $_SESSION['id_utilizador']) {
                                    $drop = false;
                                }
                                ?>

                                <?php if ($drop) : ?>
                                    <div class="dropdown text-center">
                                        <i class="fa fa-cog" id="d1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                        <div class="dropdown-menu" aria-labelledby="d1">
                                            <a class="dropdown-item" href="?a=editar_utilizador&id=<?php echo $id ?>"><i class="fa fa-edit"></i> Editar utilizador</a>
                                            <a class="dropdown-item" href="?a=editar_permissoes&id=<?php echo $id ?>"><i class="fa fa-list"></i> Editar permissões</a>
                                            <a class="dropdown-item" href="?a=eliminar_utilizador&id=<?php echo $id ?>"><i class="fa fa-trash"></i> Eliminar utilizador</a>
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <div class="text-center">
                                        <i class="fa fa-cog text-muted"></i>
                                    </div>
                                <?php endif; ?>
                            </td>

                        </tr>
                    <?php endforeach; ?>

                </table>
            </div>
        </div>
    </div>

<?php endif; ?>