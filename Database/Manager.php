<?php

class Manager {
    public $databases_list;
    public $conn;

    function __construct() {
        $this->conn = connect();
        $this->databases_list = [];
    }
}


?>