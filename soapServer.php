<?php
class ProductoService {
    public function consultarProductos($busqueda = "") {
        $productos = [
            ['id' => 1, 'nombre' => 'Sofá Elegante', 'categoria' => 'Sala', 'precio' => 1200],
            ['id' => 2, 'nombre' => 'Mesa de Mármol', 'categoria' => 'Comedor', 'precio' => 800],
            ['id' => 3, 'nombre' => 'Lámpara Vintage', 'categoria' => 'Decoración', 'precio' => 150]
        ];
        if ($busqueda) {
            // Filtra productos por nombre
            return array_filter($productos, function($p) use ($busqueda) {
                return stripos($p['nombre'], $busqueda) !== false;
            });
        }
        return $productos;
    }
}

$options = ['uri' => 'http://localhost/soap_server'];
$server = new SoapServer(null, $options);
$server->setClass('ProductoService');
$server->handle();
?>