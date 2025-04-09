<?php
// Crear una nueva conexión a la base de datos usando MySQLi con los parámetros: host, usuario, contraseña y nombre de la base de datos
$conn = new mysqli("localhost", "root", "@Hsant22,12,2002", "prueba");

// Verificar si la conexión falló
if ($conn->connect_error) {
    // Terminar la ejecución y mostrar mensaje de error si la conexión falla
    die("Error de conexión: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<!-- Declaración del tipo de documento HTML5 -->
<html>
<head>
    <!-- Definir el título de la página que aparecerá en la pestaña del navegador -->
    <title>Lista de Usuarios</title>
    <style>
        /* Estilo CSS para la tabla */
        table {
            /* Hacer que los bordes de la tabla se colapsen en una sola línea */
            border-collapse: collapse;
            /* Establecer el ancho de la tabla al 100% del contenedor */
            width: 100%;
        }
        th, td {
            /* Agregar un borde sólido de 1px de color negro a cada celda */
            border: 1px solid black;
            /* Agregar un relleno de 8px dentro de cada celda */
            padding: 8px;
            /* Alinear el texto a la izquierda dentro de las celdas */
            text-align: left;
        }
        th {
            /* Establecer un color de fondo gris claro para las celdas de encabezado */
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <!-- Título principal de la página en formato h2 -->
    <h2>Lista de Usuarios</h2>
    
    <!-- Crear una tabla HTML para mostrar los datos -->
    <table>
        <!-- Fila de encabezado de la tabla -->
        <tr>
            <!-- Columna de encabezado para el ID -->
            <th>ID</th>
            <!-- Columna de encabezado para el Nombre -->
            <th>Nombre</th>
            <!-- Columna de encabezado para el Correo -->
            <th>Correo</th>
            <!-- Comentario indicando que no se muestra la contraseña por razones de seguridad -->
            <!-- No mostramos password por seguridad -->
        </tr>
        
        <?php
        // Definir la consulta SQL para seleccionar id_usuario, nombre y correo de la tabla usuarios
        $sql = "SELECT id_usuario, nombre, correo FROM usuarios";
        // Ejecutar la consulta SQL y almacenar el resultado
        $result = $conn->query($sql);

        // Verificar si la consulta devolvió al menos una fila
        if ($result->num_rows > 0) {
            // Iterar a través de cada fila del resultado mientras haya datos
            while($row = $result->fetch_assoc()) {
                // Iniciar una nueva fila en la tabla HTML
                echo "<tr>";
                // Mostrar el ID del usuario en una celda, escapando caracteres especiales por seguridad
                echo "<td>" . htmlspecialchars($row['id_usuario']) . "</td>";
                // Mostrar el Nombre del usuario en una celda, escapando caracteres especiales por seguridad
                echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
                // Mostrar el Correo del usuario en una celda, escapando caracteres especiales por seguridad
                echo "<td>" . htmlspecialchars($row['correo']) . "</td>";
                // Cerrar la fila de la tabla
                echo "</tr>";
            }
        } else {
            // Mostrar un mensaje en una fila que abarca 3 columnas si no hay resultados
            echo "<tr><td colspan='3'>No hay usuarios registrados</td></tr>";
        }

        // Cerrar la conexión a la base de datos para liberar recursos
        $conn->close();
        ?>
    </table>
</body>
</html>