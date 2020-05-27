<?php
    //========================================
    // INDEX PRINCIPAL DA APLICAÇÃO WEB
    //========================================    
    
    // CONTROLO DE SESSÃO
    session_start();
    if(!isset($_SESSION['a'])){
        $_SESSION['a'] = 'inicio';
    }

    // INCLUI AS FUNCOES NECESSÁRIAS DO SISTEMA 
    include_once('inc/funcoes.php');

    include_once('inc/cl_datas.php');

    include_once('inc/emails.php');

    include_once('inc/gestorBD.php');    

    include_once('_cabecalho.php');    

    include_once('routes.php');

    include_once('_rodape.php');
?>