<?php
require("php/utils/connection.php");

$allBooksQuery = "SELECT * FROM books";
$result = $connection->query($allBooksQuery);
$errorListingBooks = (!$result) ? true : false;
$connection->close();
