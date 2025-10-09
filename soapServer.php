<?php
class ProductoService {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "roalca");
        if ($this->conn->connect_error) {
            die("Conexión fallida: " . $this->conn->connect_error);
        }
    }

    public function consultarProductos($busqueda = "") {
        $sql = "SELECT id, nombre, categoria, precio FROM productos";
        if ($busqueda) {
            $busqueda = $this->conn->real_escape_string($busqueda);
            $sql .= " WHERE nombre LIKE '%$busqueda%'";
        }
        $result = $this->conn->query($sql);
        $productos = [];
        while ($row = $result->fetch_assoc()) {
            $productos[] = $row;
        }
        return $productos;
    }
}

$options = ['uri' => 'http://localhost/soap_server'];
$server = new SoapServer(null, $options);
$server->setClass('ProductoService');
$server->handle();
?>