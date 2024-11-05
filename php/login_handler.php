<?php
session_start();

// Conectar a la base de datos
try {
    $pdo = new PDO('mysql:host=localhost;dbname=baldi_tech;charset=utf8mb4', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consultar el usuario en la base de datos
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE username = ?");
    $stmt->execute([$username]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar si el usuario existe y si la contraseña es correcta
    if ($usuario && password_verify($password, $usuario['password'])) {
        $_SESSION['username'] = $usuario['username'];
        header("Location: ../home.php"); // Redirigir a home.html en el directorio padre
        exit();
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}
?>


