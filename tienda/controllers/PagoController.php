<?php
require_once "config/database.php";
require_once "models/Pago.php";

class PagoController{
    private $pago;

    public function __construct(){
        $db = (new Database())->connect();
        $this->pago = new Pago($db);
    }

    public function procesar(){
        $data = json_decode(file_get_contents("php://input"), true);
        $total = floatval($data['total']);

        if($total <= 0){
            echo json_encode(["mensaje"=>"Total inválido"]);
            return;
        }

        $this->pago->procesar($total);

        echo json_encode(["mensaje"=>"Pago procesado correctamente"]);
    }
}