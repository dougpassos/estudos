<?php
require_once("conecta.php");
require_once("autoload.php");

class CategoriaDAO{

    private $conexao;

    function __construct($conexao){
        $this->conexao = $conexao;
    }

    public function buscaCategoria($id) {
        $categorias = array();
        $query = "select * from categorias where id = $id";
        $resultado = mysqli_query($conexao, $query);
        while($categoria = mysqli_fetch_assoc($resultado)) {
            array_push($categorias, $categoria);
        }
        return $categorias;
    }

    public function listaCategorias() {
        $categorias = array();
        $query = "select * from categorias";
        if($resultado = mysqli_query($this->conexao, $query)){
            while($categoria_atual = mysqli_fetch_assoc($resultado)) {
                $categoria = new Categoria;
                $categoria->setId($categoria_atual["id"]);
                $categoria->setNome($categoria_atual["nome"]);
                array_push($categorias, $categoria);
            }
            return $categorias;

        } else {
            echo "erro: select invalido em categoria";
            die();
        }

    }
}