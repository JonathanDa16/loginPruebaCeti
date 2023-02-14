<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tonala</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
        include 'connect.php';
    ?>
    <header>
        <div id="title-container">
            <h1>Centro de Enseñanza Tecnica Industrial<br>Plantel Tonalá</h1>
            <h2>Servicios de Red y Computo Nube</h2>
        </div>
        <div id="logo-container">
            <img src="logo.svg" alt="Logo CETI" id="logo"/>
        </div>
    </header>
    <nav>
        <a href="#">Inicio</a>
        <a href="#">Alumnos</a>
        <a href="#">Horarios</a>
        <a href="#">Acerca de</a>
        <a href="#">Carreras</a>
    </nav>
    <div style="height:10px ; background-color:#F26E22;">&nbsp;</div>
    <main>
        <aside>
            <h3>Inicia Sesion</h3>
            <form action="login.php" method="post">
                <label for="">Usuario:</label><br>
                <input type="text" id="username" name="username"><br>
                <label for="">Contraseña:</label><br>
                <input type="password" id="password" name="password">
                <br>
                <button id="submit-login" type="submit">Entrar</button>
            </form>
            <a href="#" id="register">Registrate</a>
        </aside>
        <article>
            <section>
                <h2>Este es el contenido principal</h2>
                <p>Articulo</p>
            </section>
        </article>
    </main> 
</body>
</html>