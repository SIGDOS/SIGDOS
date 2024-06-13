<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGDOS</title>
    <link rel="shortcut icon" href="Img/sigdos.ico" type="image/x-icon">
    <link rel="stylesheet" href="CSS/Normalize.css">
    <link rel="stylesheet" href="CSS/login.css">
</head>
<body>
    <section class="contenedor section_content">
        <form action="" method="post">
            <img src="Img/sigdos.ico" alt="Logo">
            <h2>SIGDOS</h2>
            <?php if (isset($error)): ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endif; ?>
            <div class="cont-input">
                <input type="text" name="username" placeholder=" " required>
                <label>Usuario</label>
            </div>
            <div class="cont-input">
                    <input type="password" name="password" placeholder=" " required>
                <label>Contraseña</label>
            </div>
            <div class="captcha">
                <div class="g-recaptcha" data-sitekey="6LdgkfcpAAAAAKNI9CPwh9khLAS7qZX54xxNB305"></div>
            </div>
            <div class="boton">
                <button class="button">Iniciar Sesion</button>
            </div>
            <div class="boton">
                <a class="cont-input_button" href="">¿Olvido su contraseña?</a>
            </div>
        </form>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>