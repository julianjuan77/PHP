<?php

require("php/utils/data_verification.php");

$bookData = "INSERT INTO books (title, author, available) VALUES ('$title', '$author', $available)";

// Se conecta a la base de datos y registra el libro
if ($verifiedData) {
    require 'php/utils/connection.php';
    if ($connection->query($bookData) === true) {
        $success = true;
    } else {
        $error = true;
    }
    $connection->close();
}
