<?php

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);


$conn = new mysqli("localhost", "root", "@Hsant22,12,2002", "prueba");

if ($conn->connect_error) {
    die ("Error de conexion" . $conn->connect_error);
}

$sql = "insert into usuarios (nombre, correo, password) values (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $nombre, $email, $password);

if ($stmt->execute()) {
    echo "Registro exitoso";
}else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close()

?>