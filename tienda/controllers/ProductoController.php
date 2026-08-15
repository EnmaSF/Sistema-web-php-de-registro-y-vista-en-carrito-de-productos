<?php
require_once "config/database.php";
require_once "models/Producto.php";

class ProductoController{
    private $producto;

    public function __construct(){
        $db = (new Database())->connect();
        $this->producto = new Producto($db);
    }

    public function index(){
        require_once "views/productos.php";
    }

    public function listar(){
        header("Content-Type: applications/json");
        echo json_encode($this->producto->listar());
    }

    public function guardar(){

    $nombre = htmlspecialchars($_POST['nombre']);
    $precio = floatval($_POST['precio']);

    if($precio <= 0){
        echo json_encode(["mensaje" => "Precio no valido"]);
        return;
    }

    $imagen = $_FILES['imagen'];
    $ext = pathinfo($imagen['name'], PATHINFO_EXTENSION);
    $permitidos = ['jpg', 'jpeg', 'png'];

    if(!in_array(strtolower($ext), $permitidos)){
        echo json_encode(["mensaje" => "Formato no permitido"]);
        return;
    }

    $nombreImagen = time().".".$ext;
    move_uploaded_file($imagen['tmp_name'], "assets/uploads/".$nombreImagen);

    $this->producto->guardar($nombre, $precio, $nombreImagen);

    echo json_encode(["mensaje"=>"Producto agregado"]);
    }
}