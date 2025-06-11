<?php
if (isset($_GET['confirm']) && $_GET['confirm'] === 'yes') {
    session_start();
    session_unset();
    session_destroy();
    header("Location: /jr_web/index.php");
    exit();
} else {
    echo "<a href='log-out.php?confirm=yes'>¿Seguro que quieres cerrar sesión?</a>";
}