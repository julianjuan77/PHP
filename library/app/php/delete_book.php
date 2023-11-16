<?php

$code = (isset($_GET['code'])) ? intval($_GET['code']) : null;

//Elimina el libro de la base exite un método get 
if ($code !== null) {
    require("utils/connection.php");
    $queryDelete = "DELETE FROM books WHERE code = $code";
    $result = $connection->query($queryDelete);

    if ($result) {
        $success = true;
    } else {
        $error = true;
    }

    $connection->close();
}
