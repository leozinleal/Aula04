<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/model/Database.php';

class EstudanteModel {
    public string $nome;
    public int $idade;
    private $database;

    public function salvarModel(string $nome, int $idade){
        $sql = "INSERT into estudantes (nome, idade) values ('$nome', '$idade')";
        $this->database->insert($sql);
        echo "O estudante foi salvo corretamente";
    }

    public function __construct(){
        $this->database = new Database();
    }




    public function listar(){

        $dadosArray = $this->database->executeSelect("SELECT * FROM estudantes");

        return $dadosArray;
    }

}