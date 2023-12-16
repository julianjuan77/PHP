<?php

use Julian\Notas\models\Note;

if (count($_GET) > 0 && isset($_GET['id'])) {
    $note = Note::get($_GET['id']);
    $note->delete();
}

$notes = Note::getAll();

$currentDate = date('D j \d\e M');


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="src/resources/main.css" />
    <link rel="stylesheet" href="src/resources/home.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet" />
</head>

<body>
    <header class="header">
        <div class="header__logo-container">
            <p class="header__logo">TO-DO LIST
            </p>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M0 0h24v24H0z" fill="none" />
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
            </svg>
            <div class="header__date-container">
                <p><?php echo $currentDate ?></p>
            </div>
        </div>
        <nav class="navbar">
            <a href="/?view=home">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M0 0h24v24H0z" fill="none" />
                    <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z" />
                </svg>
            </a>
            <a href="/?view=create">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M0 0h24v24H0z" fill="none" />
                    <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z" />
                </svg>
            </a>
        </nav>
    </header>
    <main class="main">

        <!-- NO NOTES -->

        <?php

        if (count($notes) == 0) {
        ?>
            <div class="no-notes">
                <p> no hay tareas por hacer 🙌🏼 </p>
            </div>
        <? }
        ?>

        <!-- NOTES -->
        <div class="note-container">
            <?php
            foreach ($notes as $note) {
                $uuid = $note->getUUID();
            ?>
                <div class="note-container__note">
                    <h4 class="note-container__title"> <?php echo $note->getTitle(); ?> </h4>
                    <p class="note-container__content"> <?php echo $note->getContent(); ?> </p>
                    <div class="note-container__actions-note">
                        <a href="/?view=edit&id=<?php echo $uuid ?>">
                            <svg class="note-container__edit" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                                <rect fill="none" height="24" width="24" />
                                <path d="M3,10h11v2H3V10z M3,8h11V6H3V8z M3,16h7v-2H3V16z M18.01,12.87l0.71-0.71c0.39-0.39,1.02-0.39,1.41,0l0.71,0.71 c0.39,0.39,0.39,1.02,0,1.41l-0.71,0.71L18.01,12.87z M17.3,13.58l-5.3,5.3V21h2.12l5.3-5.3L17.3,13.58z" />
                            </svg>
                        </a>
                        <a href="/?view=home&id=<?php echo $uuid ?>">
                            <svg class="note-container__completed" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                            </svg>
                        </a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </main>

</body>

</html>