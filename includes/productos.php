<?php
/**
 * Base de datos simulada de productos
 */
function obtenerProductos() {
    return [
        [
            'id' => 1,
            'nombre' => 'Sofá de Diseño Italiano',
            'descripcion' => 'Elegante sofá de tres plazas tapizado en terciopelo, con acabados en dorado y diseño contemporáneo.',
            'precio' => 2499.99,
            'imagen' => 'imágenes/sofa.jpg',
            'categoria' => 'Salón'
        ],
        [
            'id' => 2,
            'nombre' => 'Mesa de Comedor Mármol',
            'descripcion' => 'Mesa de comedor con tablero de mármol blanco y base de acero inoxidable dorado.',
            'precio' => 1899.99,
            'imagen' => 'imágenes/mesa.jpg',
            'categoria' => 'Comedor'
        ],
        [
            'id' => 3,
            'nombre' => 'Lámpara de Techo Cristal',
            'descripcion' => 'Lámpara de araña moderna con cristales y acabados en oro rosa.',
            'precio' => 899.99,
            'imagen' => 'imágenes/lampara.jpg',
            'categoria' => 'Iluminación'
        ],
        [
            'id' => 4,
            'nombre' => 'Cama Tapizada Premium',
            'descripcion' => 'Cama king size tapizada en terciopelo con cabecero acolchado y detalles capitoné.',
            'precio' => 1799.99,
            'imagen' => 'imágenes/cama.jpg',
            'categoria' => 'Dormitorio'
        ],
        [
            'id' => 5,
            'nombre' => 'Sillón Art Déco',
            'descripcion' => 'Sillón individual estilo Art Déco con tapizado geométrico y patas doradas.',
            'precio' => 899.99,
            'imagen' => 'imágenes/sillon.jpg',
            'categoria' => 'Salón'
        ],
        [
            'id' => 6,
            'nombre' => 'Espejo Decorativo Dorado',
            'descripcion' => 'Espejo de pared con marco ornamentado en acabado dorado envejecido.',
            'precio' => 599.99,
            'imagen' => 'imágenes/espejo.jpg',
            'categoria' => 'Decoración'
        ],
        [
            'id' => 7,
            'nombre' => 'Mesa Auxiliar Mármol',
            'descripcion' => 'Mesa auxiliar con tablero de mármol negro y estructura metálica dorada.',
            'precio' => 449.99,
            'imagen' => 'imágenes/mesa-auxiliar.jpg',
            'categoria' => 'Salón'
        ],
        [
            'id' => 8,
            'nombre' => 'Aparador Moderno',
            'descripcion' => 'Aparador de diseño con acabados en madera noble y detalles metálicos.',
            'precio' => 1299.99,
            'imagen' => 'imágenes/aparador.jpg',
            'categoria' => 'Salón'
        ],
        [
            'id' => 9,
            'nombre' => 'Set de Sillas Comedor',
            'descripcion' => 'Conjunto de 4 sillas tapizadas en terciopelo con patas metálicas doradas.',
            'precio' => 999.99,
            'imagen' => 'imágenes/sillas.jpg',
            'categoria' => 'Comedor'
        ],
        [
            'id' => 10,
            'nombre' => 'Consola Entrada Luxury',
            'descripcion' => 'Consola para entrada con espejo, acabado en pan de oro y tablero de mármol.',
            'precio' => 1599.99,
            'imagen' => 'imágenes/consola.jpg',
            'categoria' => 'Recibidor'
        ]
    ];
}

function buscarProductos($busqueda = '') {
    $productos = obtenerProductos();
    if (empty($busqueda)) {
        return $productos;
    }

    return array_filter($productos, function($producto) use ($busqueda) {
        $busqueda = strtolower($busqueda);
        return strpos(strtolower($producto['nombre']), $busqueda) !== false ||
               strpos(strtolower($producto['descripcion']), $busqueda) !== false ||
               strpos(strtolower($producto['categoria']), $busqueda) !== false;
    });
}

function obtenerProductoPorId($id) {
    $productos = obtenerProductos();
    foreach ($productos as $producto) {
        if ($producto['id'] == $id) {
            return $producto;
        }
    }
    return null;
}

function obtenerCategorias() {
    $productos = obtenerProductos();
    $categorias = array_unique(array_column($productos, 'categoria'));
    sort($categorias);
    return $categorias;
}
?>