    <?php

    use Julian\Notas\models\Note;

    $currentDate = date('D j \d\e M');
    $updated = false;

    if (count($_POST) > 0) {
        $title = isset($_POST['title']) ? $_POST['title'] : '';
        $content = isset($_POST['content']) ? $_POST['content'] : '';
        $note = new Note($title, $content);
        $note->save();
        $updated = true;
    }

    ?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="src/resources/create.css" />
        <link rel="stylesheet" href="src/resources/main.css" />
        <title>Crear tarea</title>
    </head>

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

    <body>
        <main class="main">
            <div class="note">
                <form class="note__form" action="?view=create" method="POST">
                    <div class="note__wrapper">
                        <input class="note__text-input" type="text" name="title" placeholder="Titulo">
                        <svg class="note__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M5 4v3h5.5v12h3V7H19V4z" />
                        </svg>
                    </div>
                    <textarea class="note__text-area" name="content" cols="30" rows="10" placeholder="Detalle las tareas por hacer"></textarea>
                    <div class="note__actions">
                        <a class="note__return" href="/?view=home">volver</a>
                        <input class="note__create" type="submit" value="Crear">
                    </div>
                    <?php if ($updated) {
                    ?> <div class="note__updated">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z" />
                            </svg>
                            <p>Tarea creada</p>
                        </div>
                    <?php } ?>
                </form>
            </div>
        </main>
    </body>

    </html>