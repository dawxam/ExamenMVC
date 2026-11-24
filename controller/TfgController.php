<?php
require_once __DIR__ . "/../model/TfgModel.php";

class TfgController
{
    private $modelo;

    public function __construct() {
        $this->modelo = new TfgModel();
    }

    public function index() {

        $estudiantes = $this->modelo->obtenerTodos();

        require_once __DIR__ . "/../vista/listado.php";
    }
}
