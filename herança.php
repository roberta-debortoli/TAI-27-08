<?php 
    class bd{
        public static function select($tabela){
            return array("1" => "Maria",
                "2" => "Carlos",
                "3" => "João");
        }
    }

    class modeloAluno extends bd {

        public static function loadAlunos(){
            return parent :: select("tb_aluno");
        }
    }

    $dados = modeloAluno :: loadAlunos ();

    ?>
