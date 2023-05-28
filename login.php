<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $ip_address = $_SERVER['REMOTE_ADDR'];

    $sql = "SELECT COUNT(*) AS failed_login_attempts FROM login_attempts WHERE ip_address = ? AND attempt_time > DATE_SUB(NOW(), INTERVAL 1 HOUR)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $ip_address);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if ($row['failed_login_attempts'] > 3) {
        echo "Has excedido el número permitido de intentos de inicio de sesión. Por favor, inténtalo de nuevo más tarde.";
    } else {
        $sql = "SELECT * FROM users WHERE username=? AND password=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt,'ss', $username, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            $sql = "DELETE FROM login_attempts WHERE ip_address = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, 's', $ip_address);
            mysqli_stmt_execute($stmt);

            echo "Inicio de sesión exitoso";
            echo "<table><tr><th>Usuario</th><th>Contraseña</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row["username"] . "</td><td>" . $row["password"] . "</td></tr>";
            }
            echo "</table>";
        } else {
            $sql = "INSERT INTO login_attempts (ip_address, attempt_time) VALUES (?, NOW())";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, 's', $ip_address);
            mysqli_stmt_execute($stmt);

            echo "Inicio de sesión fallido";
        }
    }
}
?>
