<?php
require_once("conecta.php");
require_once("autoload.php");

class CategoriaDAO{

    private $conexao;

    public function __construct($conexao){
        $this->conexao = $conexao;
    }

    public function listaCategorias() {
        $categorias = array();
        $query = "select * from categorias";
        if($resultado == mysqli_query($this->conexao, $query)){
            while($categoria_atual = mysqli_fetch_assoc($resultado,MYSQLI_ASSOC)) {
                $categoria = new Categoria;
                $categoria->setId($categoria_atual["id"]);
                $categoria->setNome($categoria_atual["nome"]);
                array_push($categorias, $categoria);
            }
            var_dump($categorias);
            die();
            //return $categorias;
        } else {
            echo "erro: select invalido";
            die();
        }

    }
}