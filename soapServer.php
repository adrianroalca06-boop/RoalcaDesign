<?php
class Database {
    private static $instance = null;
    private $conn;
    
    private function __construct() {
        $config = [
            'host' => 'localhost',
            'user' => 'root',
            'pass' => '',
            'dbname' => 'roalca'
        ];
        
        try {
            $this->conn = new mysqli(
                $config['host'],
                $config['user'],
                $config['pass'],
                $config['dbname']
            );
            
            if ($this->conn->connect_error) {
                throw new Exception("Error de conexión: " . $this->conn->connect_error);
            }
            
            $this->conn->set_charset("utf8mb4");
        } catch (Exception $e) {
            error_log($e->getMessage());
            die("Error en el servidor. Por favor, intente más tarde.");
        }
    }
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function getConnection() {
        return $this->conn;
    }
}

class ProductoService {
    private $db;
    
    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }
    
    public function consultarProductos($busqueda = '') {
        try {
            $sql = "SELECT id, nombre, descripcion, precio, imagen, categoria 
                    FROM productos 
                    WHERE (nombre LIKE ? OR descripcion LIKE ? OR categoria LIKE ?)
                    AND activo = 1 
                    ORDER BY nombre ASC";
            
            $busqueda = "%{$busqueda}%";
            $stmt = $this->db->prepare($sql);
            
            if (!$stmt) {
                throw new Exception("Error en la preparación de la consulta");
            }
            
            $stmt->bind_param("sss", $busqueda, $busqueda, $busqueda);
            
            if (!$stmt->execute()) {
                throw new Exception("Error al ejecutar la consulta");
            }
            
            $result = $stmt->get_result();
            $productos = [];
            
            while ($row = $result->fetch_assoc()) {
                $productos[] = [
                    'id' => $row['id'],
                    'nombre' => $row['nombre'],
                    'descripcion' => $row['descripcion'],
                    'precio' => $row['precio'],
                    'imagen' => $row['imagen'],
                    'categoria' => $row['categoria']
                ];
            }
            
            return $productos;
        } catch (Exception $e) {
            error_log("Error en consultarProductos: " . $e->getMessage());
            throw new SoapFault("Server", "Error al consultar productos");
        }
    }
    
    public function consultarProductos($busqueda = "") {
        try {
            $sql = "SELECT id, nombre, categoria, precio, descripcion, metros, imagen 
                    FROM productos WHERE 1=1";
            
            if (!empty($busqueda)) {
                $busqueda = $this->db->real_escape_string($busqueda);
                $sql .= " AND (nombre LIKE ? OR categoria LIKE ?)";
            }
            
            $stmt = $this->db->prepare($sql);
            
            if (!empty($busqueda)) {
                $param = "%{$busqueda}%";
                $stmt->bind_param("ss", $param, $param);
            }
            
            $stmt->execute();
            $result = $stmt->get_result();
            $productos = [];
            
            while ($row = $result->fetch_assoc()) {
                $row['precio'] = number_format($row['precio'], 2, ',', '.');
                $productos[] = $row;
            }
            
            return $productos;
        } catch (Exception $e) {
            error_log($e->getMessage());
            throw new SoapFault('Server', 'Error al consultar productos');
        }
    }
    
    public function obtenerProducto($id) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM productos WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($producto = $result->fetch_assoc()) {
                $producto['precio'] = number_format($producto['precio'], 2, ',', '.');
                return $producto;
            }
            
            return null;
        } catch (Exception $e) {
            error_log($e->getMessage());
            throw new SoapFault('Server', 'Error al obtener el producto');
        }
    }
}

// Configuración del servidor SOAP
$options = [
    'uri' => 'http://localhost/soap_server',
    'encoding' => 'UTF-8'
];

try {
    $server = new SoapServer(null, $options);
    $server->setClass('ProductoService');
    $server->handle();
} catch (Exception $e) {
    error_log($e->getMessage());
    header('HTTP/1.1 500 Internal Server Error');
    die("Error en el servidor SOAP");
}
?>