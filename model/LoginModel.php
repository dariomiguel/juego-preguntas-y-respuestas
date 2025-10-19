<?php

class LoginModel
{

    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function getUserWith($mail, $contrasenia)
    {
        $sql = "SELECT * FROM usuario WHERE mail = '$mail' AND contrasenia = '$contrasenia'";
        $result = $this->conexion->query($sql);
        return $result ?? [];
    }
}
