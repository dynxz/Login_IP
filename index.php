<!DOCTYPE html>
<html>
<head>
  <title>Inicio de Sesión</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="login-container">
    <h1>Iniciar Sesión</h1>
    <form action="login.php" method="post">
      <label for="usuario">Nombre de Usuario:</label>
      <input type="text" id="usuario" name="usuario" required>
      <label for="password">Contraseña:</label>
      <input type="password" id="password" name="password" required>
      <input type="submit" value="Iniciar Sesión">
    </form>
  </div>
</body>
</html>
