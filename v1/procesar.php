<?php 
$nombre = $_POST["nombre"];
$email = $_POST["email"];
$password = $_POST["password"];

$conn = new mysqli("localhost", "root", "@Hsant22,12,2002", "prueba");

if ($conn -> connect_error) {
    die("Error de conexion" .$conn->connect_error);
}

$sql = "insert into usuarios (nombre, correo, password) values ('$nombre', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo 'Registro exitoso';
}else {
    echo "Error: .$conn->error";
}

$conn->close()
?>

