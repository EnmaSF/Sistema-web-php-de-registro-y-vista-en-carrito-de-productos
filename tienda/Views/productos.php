<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>
    <h1>Tienda</h1>
    <a href="carrito">Ver carrito</a>

    <form id="formProducto" enctype="multipart/form-data">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="number" name="precio" placeholder="Precio" required>
        <input type="file" name="imagen" required>
        <button>Guardar</button>
    </form>

    <div id="listarProductos"></div>

    <script src="assets/js/app.js"></script>
</body>
</html>
