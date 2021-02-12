<?php

session_destroy();
echo($_SESSION['id']);
return;
unset($_SESSION["id"]);
unset($_SESSION["firstName"]);
unset($_SESSION['email']);
header('Location:./index.php');

?>