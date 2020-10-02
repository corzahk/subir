<?php

class Conexion
{
    private $db_host = "localhost";
    private $db_user = "root";
    private $db_pass = "";
    private $db_name = "prueba_imagenes";
    protected $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);

        if ($this->conn->error) {
            die("Ha ocurrido un error al establecer la conexion: error($this->conn->errno) $this->conn->error");
        }
    }

    public function subir_imagen($nombre)
    {
        $sql = "INSERT INTO imagenes (imagen) VALUES('$nombre')";

        $consulta = $this->conn->query($sql);

        if ($consulta) {
            return true;
        } else {
            die(($this->conn->error));
        }

    }

    public function get_imagenes()
    {
        $sql = "SELECT * FROM imagenes";
        $consulta = $this->conn->query($sql);

        if ($consulta) {
            if ($consulta->num_rows > 0) {
                $productos = array();
                while ($fila = $consulta->fetch_assoc()) {
                    $imagenes[] = $fila;
                }
                return $imagenes;
            } else {
                return false;
            }
        }
    }
}
