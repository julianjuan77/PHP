<?php

$title = (isset($_POST['title']) && $_POST['title'] !== "") ? htmlspecialchars($_POST['title']) : null;
$author = (isset($_POST['author']) && $_POST['author'] !== "") ? htmlspecialchars($_POST['author']) : null;
$available = (isset($_POST['available']) && $_POST['available'] !== "") ? intval($_POST['available']) : null;

// Indica si se completaron todos los datos del libro
$verifiedData = $title && $author && isset($available);
