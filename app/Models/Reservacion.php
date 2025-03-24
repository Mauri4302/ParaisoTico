<?php
// app/models/Reservacion.php
require_once 'config/Database.php';

class Reservacion
{
    private static $conn;

    public $id_reservacion;
    public $id_usuario;
    public $id_canton;
    public $id_categoria;
    public $fecha_inicio;
    public $fecha_fin;
    public $numero_personas;
    public $total;
    public $estado;

    public function __construct()
    {
        self::init();
    }

    public static function init()
    {
        if (self::$conn === null) {
            $database = new Database();
            self::$conn = $database->getConnection();
        }
    }

    public static function all()
    {
        self::init();

        $query = "SELECT * FROM Reservacion;";
        $stmt = self::$conn->prepare($query);
        $stmt->execute();

        $data = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $item = new self();
            $item->id_reservacion = $row['id_reservacion'];
            $item->id_usuario = $row['id_usuario'];
            $item->id_canton = $row['id_canton'];
            $item->id_categoria = $row['id_categoria'];
            $item->fecha_inicio = $row['fecha_inicio'];
            $item->fecha_fin = $row['fecha_fin'];
            $item->numero_personas = $row['numero_personas'];
            $item->total = $row['total'];
            $item->estado = $row['estado'];

            $data[] = $item;
        }

        return $data;
    }

    public static function find($id)
    {
        self::init();

        $query = "SELECT * FROM Reservacion WHERE id_reservacion = :id;";
        $stmt = self::$conn->prepare($query);
        $stmt->execute([':id' => $id]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $item = new self();
            $item->id_reservacion = $row['id_reservacion'];
            $item->id_usuario = $row['id_usuario'];
            $item->id_canton = $row['id_canton'];
            $item->id_categoria = $row['id_categoria'];
            $item->fecha_inicio = $row['fecha_inicio'];
            $item->fecha_fin = $row['fecha_fin'];
            $item->numero_personas = $row['numero_personas'];
            $item->total = $row['total'];
            $item->estado = $row['estado'];

            return $item;
        }

        return null;
    }

    public function save()
    {
        self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "INSERT INTO Reservacion (id_usuario, id_canton, id_categoria, fecha_inicio, fecha_fin, numero_personas, total, estado) 
                  VALUES (:id_usuario, :id_canton, :id_categoria, :fecha_inicio, :fecha_fin, :numero_personas, :total, :estado);";
        $stmt = self::$conn->prepare($query);

        return $stmt->execute([
            ':id_usuario' => $this->id_usuario,
            ':id_canton' => $this->id_canton,
            ':id_categoria' => $this->id_categoria,
            ':fecha_inicio' => $this->fecha_inicio,
            ':fecha_fin' => $this->fecha_fin,
            ':numero_personas' => $this->numero_personas,
            ':total' => $this->total,
            ':estado' => $this->estado,
        ]);
    }

    public function update()
    {
        $query = "UPDATE Reservacion SET 
                  id_usuario = :id_usuario,
                  id_canton = :id_canton,
                  id_categoria = :id_categoria,
                  fecha_inicio = :fecha_inicio,
                  fecha_fin = :fecha_fin,
                  numero_personas = :numero_personas,
                  total = :total,
                  estado = :estado
                  WHERE id_reservacion = :id;";
        $stmt = self::$conn->prepare($query);

        return $stmt->execute([
            ':id' => $this->id_reservacion,
            ':id_usuario' => $this->id_usuario,
            ':id_canton' => $this->id_canton,
            ':id_categoria' => $this->id_categoria,
            ':fecha_inicio' => $this->fecha_inicio,
            ':fecha_fin' => $this->fecha_fin,
            ':numero_personas' => $this->numero_personas,
            ':total' => $this->total,
            ':estado' => $this->estado,
        ]);
    }

    public function delete()
    {
        $query = "DELETE FROM Reservacion WHERE id_reservacion = :id;";
        $stmt = self::$conn->prepare($query);

        return $stmt->execute([':id' => $this->id_reservacion]);
    }

    public static function makeReservation($data)
    {
        self::init();
        $query = "INSERT INTO Reservacion (id_usuario, id_canton, id_categoria, fecha_inicio, fecha_fin, numero_personas, total, estado) 
                  VALUES (:id_usuario, :id_canton, :id_categoria, :fecha_inicio, :fecha_fin, :numero_personas, :total, 'pendiente');";
        $stmt = self::$conn->prepare($query);
        return $stmt->execute([
            ':id_usuario' => $data['id_usuario'],
            ':id_canton' => $data['id_canton'],
            ':id_categoria' => $data['id_categoria'],
            ':fecha_inicio' => $data['fecha_inicio'],
            ':fecha_fin' => $data['fecha_fin'],
            ':numero_personas' => $data['numero_personas'],
            ':total' => $data['total'],
        ]);
    }
}