<?php
// Conexión a la base de datos (igual que la tuya)
$conn = new mysqli("localhost", "root", "@Hsant22,12,2002", "prueba");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Usuarios</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Lista de Usuarios</h2>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <!-- No mostramos password por seguridad -->
        </tr>
        
        <?php
        // Consulta para obtener todos los usuarios
        $sql = "SELECT id_usuario, nombre, correo FROM usuarios";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Mostrar cada fila
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id_usuario']) . "</td>";
                echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
                echo "<td>" . htmlspecialchars($row['correo']) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No hay usuarios registrados</td></tr>";
        }

        // Cerrar la conexión
        $conn->close();
        ?>
    </table>
</body>
</html>