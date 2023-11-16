<?php

require("php/utils/connection.php");
require("php/utils/data_verification.php");

$code = (isset($_GET['code'])) ? $code = $_GET['code'] : intval($_POST['code']);

//Si no hubo un post, consulta los datos del libro 
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $bookQuery = "SELECT * FROM books WHERE code = '$code'";
    $result = $connection->query($bookQuery);

    if ($result === false) {
        die("Error en la consulta: " . $connection->error);
    }

    $book = $result->fetch_all(MYSQLI_ASSOC);
}

//Si hubo un post y los datos fueron validados, se modifican los datos en la base
if ($verifiedData) {
    $update_query = "UPDATE books SET title = '$title', author = '$author', available = $available WHERE code = $code";
    $result = $connection->query($update_query);
    if ($result) {
        $success = true;
    } else {
        $error = true;
    }
}

$connection->close();
