<?php
require("php/edit_book.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar un libro</title>
    <link rel="stylesheet" href="assets/styles/book_edit.css" />
    <link rel="stylesheet" href="assets/styles/normalize.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@1,300;1,400;1,700&display=swap" rel="stylesheet">
</head>

<body>
    <main class="main">

        <div class="text-container">
            <header class="header">
                <img class="header__logo" src="assets/images/logo.png" alt="libros php crud">
            </header>
            <p> Por favor edite su libro y luego presione guardar.</p>
            <div>
                <a href="index.php">
                    <button class="text-container__upload-book">Volver al inicio</button>
                </a>
                <a href="book_list.php">
                    <button class="text-container__upload-book">Consultar libros</button>
                </a>
            </div>
        </div>

        <div class="form-container">

            <form class="form-container__form" action="book_edit.php" method="post">
                <input style="display: none" type="text" name="code" value="<?php echo (isset($_POST['code'])) ? $_POST['code'] : $code; ?>">
                <label class="form-container__label" for="title">
                    <p>*</p>Titulo
                </label>
                <input class="form-container__input" type="text" name="title" value="<?php echo (isset($_POST['title'])) ? $_POST['title'] : $book[0]['title']; ?>" />
                <?php if (isset($_POST['title']) && $title === null) echo '<p class="required-error">Te falta completar el título</p>'; ?>
                <label class="form-container__label" for="author">
                    <p>*</p>Autor
                </label>
                <?php if (isset($_POST['author']) && $author === null) echo '<p class="required-error">Te falta completar el nombre del autor</p>'; ?>
                <input class="form-container__input" type="text" name="author" value="<?php echo (isset($_POST['author'])) ? $_POST['author'] : $book[0]['author']; ?>">
                <label class="form-container__label">
                    <p>*</p> ¿Disponible?
                </label>
                <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && $available === null) echo '<p class="required-error"> Te falta indicar si el libro esta disponible </p>'  ?>
                <div>
                    <label class="form-container__label" for="available">Si</label>
                    <input type="radio" name="available" value="1" <?php if (isset($book[0]['available']) && $book[0]['available'] == 1 || isset($_POST['available']) && $_POST['available'] == 1) echo 'checked'; ?> />
                </div>
                <div>
                    <label class="form-container__label" for="available">No</label>
                    <input type="radio" name="available" value="0" <?php if (isset($book[0]['available']) && $book[0]['available'] == 0 || isset($_POST['available']) && $_POST['available'] == 0) echo 'checked'; ?> />

                </div>
                <input class="form-container__submit" type="submit" name="submit" value="guardar">

                <!-- Resultado al procesar el libro -->
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($success)) echo  '<p class="success">Los cambios fueron guardados <svg xmlns="http://www.w3.org/2000/svg" width="20" fill="#fff" height="16" viewBox="0 0 16 16">
                            <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z" />
                        </svg></p>';

                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($error)) echo ' <p class="error">Ocurrio un error al guardar los cambios<svg xmlns="http://www.w3.org/2000/svg" width="20" fill="white" viewBox="0 0 16 16">
                        <path d="M6.956 14.534c.065.936.952 1.659 1.908 1.42l.261-.065a1.378 1.378 0 0 0 1.012-.965c.22-.816.533-2.512.062-4.51.136.02.285.037.443.051.713.065 1.669.071 2.516-.211.518-.173.994-.68 1.2-1.272a1.896 1.896 0 0 0-.234-1.734c.058-.118.103-.242.138-.362.077-.27.113-.568.113-.856 0-.29-.036-.586-.113-.857a2.094 2.094 0 0 0-.16-.403c.169-.387.107-.82-.003-1.149a3.162 3.162 0 0 0-.488-.9c.054-.153.076-.313.076-.465a1.86 1.86 0 0 0-.253-.912C13.1.757 12.437.28 11.5.28H8c-.605 0-1.07.08-1.466.217a4.823 4.823 0 0 0-.97.485l-.048.029c-.504.308-.999.61-2.068.723C2.682 1.815 2 2.434 2 3.279v4c0 .851.685 1.433 1.357 1.616.849.232 1.574.787 2.132 1.41.56.626.914 1.28 1.039 1.638.199.575.356 1.54.428 2.591z" />
                    </svg></p>';
                ?>
            </form>

        </div>
    </main>
</body>

</html>