<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/aula04/model/EstudanteModel.php';

class EstudanteController {
    public function listar() {
        $estudanteModel = new EstudanteModel();
        $listaEstudantes = $estudanteModel->listar();

        $_REQUEST['estudantes'] = $listaEstudantes;

        require_once $_SERVER['DOCUMENT_ROOT'] . '/aula04/view/EstudanteView.php';
    }

    public function salvar(){
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            require_once $_SERVER['DOCUMENT_ROOT'] . '/aula04/view/EstudanteForm.php';
        }
        else if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $nome = $_POST['nome'];
            $idade = $_POST['idade'];
    
            $estudanteModel = new EstudanteModel();
            $estudanteModel->salvarModel($nome, $idade);

            header('Location: http://localhost/aula04/?controller=Estudante&acao=listar');
            exit();
        }
    }
}

