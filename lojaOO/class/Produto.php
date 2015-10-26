<?php
class Produto
{
    private $id;
    private $nome;
    private $preco;
    private $descricao;
    private $categoria;
    private $usado = false;
    public $tipoProduto = "";

    function __construct($nome, $preco)
    {
        $this->setNome($nome);
        $this->setPreco($preco);
    }

    function __destruct()
    {
        //echo "Destruindo o produto ".$this->getNome();
    }

    function __toString()
    {
        return "Nome: ".$this->getNome()."</p>";
    }

    function temIsbn()
    {
        return $this instanceof Livro;
    }


    public function isLivro()
    {
        return strcasecmp($this->tipoProduto, "livro") == 0;
    }

    public function valorComDesconto($valor = 0.1)
    {
        if ($valor > 0 && $valor < 1) {
            $this->preco -= $this->preco * $valor;
        }
        return $this->preco;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setPreco($preco)
    {
        if($preco > 0){
            $this->preco = $preco;
        }
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getUsado()
    {
        return $this->usado;
    }

    public function setUsado($usado)
    {
        $this->usado = $usado;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }
}