<?php
class Pago{

    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    public function procesar($total){
        $stmt = $this->conn->prepare("INSERT INTO pagos(total, metodo) VALUES(:total, 'Paypal simulado')");

        $stmt->binParam(":total", $total);
        return $stmt->execute();
    }
}