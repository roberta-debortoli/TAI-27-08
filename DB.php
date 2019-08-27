<?php

class bd{
    private $DB_NOME= "db_tai";
    private $DB_USUARIO= "root";
    private $DB_SENHA= "";
    private $DB_CHARSET= "utf8";


    public function connection ()
    {
        $str_conn = "mysql:host=localhost; dbname=" .$this->DB_NOME;

        return new PDO ($str_conn, $this->DB_USUARIO, $this->DB_SENHA,
         array(PDO::MYSQL_ATTR_INIT_COMMAND=>"set names ".$this->DB_CHARSET));
    }

    public function select()
    {
        $conn=$this->connection();
        $stmt=$conn->prepare("SELECT * FROM tb_alunos LIMIT 3");
    }

    public function insert ($dados){
        $sql="INSERT INTO tb_alunos (nome, curso, turma) VALUES (";

        $flag=0;
        $arrayValue=[];

        foreach($dados as $valor){
            if($flag ==0){
                $sql.="?";
                $flag=1;
            }
            else{
                $sql.=", ?";
            }

            $arrayValue[]= $valor;
        }

        $sql .= ");";
        $conn = $this->connection();
        $stmt=$conn->prepare ($sql);
        $stmt->execute($arrayValue);
        return $stmt;
    }

}

$dados= array("nome" => "Marcos",
"curso" => "Informática - EMI",
"turma" => "Info14");

$obj= new BD();

$aluno = $obj -> insert($dados);

echo "INSERIDO COM SUCESSO!";

?>

