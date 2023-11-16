    <?php
    require "php/register_book.php";
    ?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Biblioteca</title>
        <link rel="stylesheet" href="assets/styles/normalize.css" />
        <link rel="stylesheet" href="assets/styles/index.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@1,300;1,400;1,700&display=swap" rel="stylesheet">
    </head>

    <body>
        <main class="main">

            <div class="text-container">
                <header class="text-container__header">
                    <img class="text-container__logo" src="assets/images/logo.png" alt="libros php crud">
                    <h1>Cargar un nuevo libro</h1>
                    <p>
                        En esta entrada puede cargar un nuevo libro a la base de datos.
                    </p>
                    <a href="book_list.php">
                        <button class="text-container__button">Consultar listado de libros</button>
                    </a>
                </header>
            </div>

            <div class="form-container">
                <form class="form-container__form" action="index.php" method="post">
                    <label for="title">
                        <p>*</p> Titulo
                    </label>

                    <?php if (isset($_POST['title']) && $title === null) echo '<p class="required-error">Te falta completar el título</p>'; ?>
                    <input class="form-container__text-input" type="text" name="title" placeholder="El principito" value="<?php echo $title ?>" />

                    <label for="autor">
                        <p>*</p> Autor
                    </label>
                    <?php if (isset($_POST['author']) && $author === null) echo '<p class="required-error">Te falta completar el nombre del autor</p>'; ?>
                    <input class="form-container__text-input" type="text" name="author" placeholder="Antoine de Saint-Exupéry" value="<?php echo $author ?>" />

                    <label>
                        <p>*</p> ¿Disponible?
                    </label>
                    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && $available === null) echo '<p class="required-error"> Te falta indicar si el libro esta disponible </p>'  ?>
                    <div class="form-container__checkbox">
                        <label for="available">Si</label>
                        <input type="radio" name="available" value="1" <?php if (isset($_POST['available']) && $_POST['available'] == 1) echo 'checked'; ?> />
                    </div>
                    <div class="form-container__checkbox">
                        <label for="available">No</label>
                        <input type="radio" name="available" value="0" <?php if (isset($_POST['available']) && $_POST['available'] == 0) echo 'checked'; ?>>
                    </div>
                    <input class="form-container__submit" type="submit" name="submit" value="Registrar">

                    <!-- Resultado al procesar el libro -->
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($success)) echo  '<p class="success">El libro se registro correctamente <svg xmlns="http://www.w3.org/2000/svg" width="20" fill="#fff" height="16" viewBox="0 0 16 16">
                            <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z" />
                        </svg></p>';

                    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($error)) echo ' <p class="error">Ocurrio un error al registrar el libro <svg xmlns="http://www.w3.org/2000/svg" width="20" fill="white" viewBox="0 0 16 16">
                        <path d="M6.956 14.534c.065.936.952 1.659 1.908 1.42l.261-.065a1.378 1.378 0 0 0 1.012-.965c.22-.816.533-2.512.062-4.51.136.02.285.037.443.051.713.065 1.669.071 2.516-.211.518-.173.994-.68 1.2-1.272a1.896 1.896 0 0 0-.234-1.734c.058-.118.103-.242.138-.362.077-.27.113-.568.113-.856 0-.29-.036-.586-.113-.857a2.094 2.094 0 0 0-.16-.403c.169-.387.107-.82-.003-1.149a3.162 3.162 0 0 0-.488-.9c.054-.153.076-.313.076-.465a1.86 1.86 0 0 0-.253-.912C13.1.757 12.437.28 11.5.28H8c-.605 0-1.07.08-1.466.217a4.823 4.823 0 0 0-.97.485l-.048.029c-.504.308-.999.61-2.068.723C2.682 1.815 2 2.434 2 3.279v4c0 .851.685 1.433 1.357 1.616.849.232 1.574.787 2.132 1.41.56.626.914 1.28 1.039 1.638.199.575.356 1.54.428 2.591z" />
                    </svg></p>';
                    ?>

                    <p> * Todos los campos son obligatorios</p>
                </form>

                <div class="form-container__social">
                    <a href="https://www.linkedin.com/julianjuan77">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 16 16">
                            <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                        </svg>
                    </a>
                    <a href="https://github.com/julianjuan77">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 16 16">
                            <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z" />
                        </svg>
                    </a>
                </div>
            </div>
        </main>
    </body>

    </html>