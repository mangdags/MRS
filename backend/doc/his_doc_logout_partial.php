<?php
    session_start();
    unset($_SESSION['doc_id']);
    session_destroy();

    header("Location: his_doc_logout.php");
    exit;
?>