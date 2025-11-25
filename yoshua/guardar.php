<?php
// Conexión a MySQL
$servername = "localhost";
$username = "root"; // usuario por defecto de XAMPP
$password = ""; // sin contraseña por defecto
$dbname = "carti_fans";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

// Verificar que se haya enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre = $_POST['nombre'];
  $correo = $_POST['correo'];
  $mensaje = $_POST['mensaje'];

  // Evitar inyección SQL
  $nombre = $conn->real_escape_string($nombre);
  $correo = $conn->real_escape_string($correo);
  $mensaje = $conn->real_escape_string($mensaje);

  // Insertar en la base de datos
  $sql = "INSERT INTO mensajes (nombre, correo, mensaje) VALUES ('$nombre', '$correo', '$mensaje')";

  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('✅ ¡Mensaje enviado con éxito!'); window.location.href='index.html';</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>