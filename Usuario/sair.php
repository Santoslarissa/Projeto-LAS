<!-- Vai apagar o registro de login e redirecionar-->
<?php
session_start();
unset($_SESSION['id_usuario']);
header("location: index.php");

?>