<?php
    session_start();
    require 'conexao.php';
    class Product{
        public $id;
        public $name;
        public $description;
        public $value;
        public $quantity;

            //Construtor
            function __construct($name, $description, $value, $quantity){
                $this->name = $name;
                $this->description = $description;
                $this->value = $value;
                $this->quantity = $quantity;
            }
            //método inserir usuário
            public function insertProduct(){
                //query para inserir o objeto produto na tabela produtos 
                $sql= "INSERT INTO produtos (nome,descricao,valor,quantidade)
                VALUES('$this->name','$this->description', $this->value, $this->quantity)";
                
                    if($request = $GLOBALS['mysqli']->query($sql)){
                        $_SESSION['insertSucess']='Cadastrado com sucesso.';
                    }else{
                        $_SESSION['insertError'] = $GLOBALS['mysqli']->error;
                    }
                $GLOBALS['mysqli']->close();
            }
            //método para recuperar produto
            public function showProduct($id){
                $sql = "SELECT * FROM produtos WHERE id = '$id'";
                $objeto;
                    if(!$result = $GLOBALS['mysqli']->query($sql)){
                        $_SESSION['showError']=$GLOBALS['mysqli']->error;
                    }
                    else{
                        $objeto = $result->fetch_assoc();
                        $this->id = $id;
                        $this->name = $objeto['nome'];  
                        $this->description = $objeto['descricao'];  
                        $this->value = $objeto['valor'];  
                        $this->quantity = $objeto['quantidade']; 
                    }
                $GLOBALS['mysqli']->close();
            } 
            //Método para alterar os dados do produto
            public function changeProduct(){
                $sql= "UPDATE produtos SET 
                nome = '$this->name', 
                descricao = '$this->description', 
                valor = $this->value,
                quantidade = $this->quantity
                WHERE id = $this->id";
                    if(!$result = $GLOBALS['mysqli']->query($sql)){
                        $_SESSION['changeError'] = $GLOBALS['mysqli']->error;
                    }else{
                        $_SESSION['changeSucess']='alterado com sucesso.';
                    }
                $GLOBALS['mysqli']->close();
            }
            //método para deletar o produto.
        public function delete($id){
            $sql = "DELETE FROM produtos WHERE id = $id";

                if($result = $GLOBALS['mysqli']->query($sql)){
                    $_SESSION['deleteSucess']='deletado com sucesso.';
                }
                else{
                    $_SESSION['deleteError'] = $GLOBALS['mysqli']->error;
                }
            $GLOBALS['mysqli']->close();
        }   
    }
    //Função para listar todos produtos
    function listProducts(){
        //query para buscar no banco todos itens da tabela produtos
        $sql = "SELECT * FROM produtos";
        $result = $GLOBALS['mysqli']->query($sql);
        $list=[];
            //estrututa de repetição para atribuir as linhas ao array list e retornar
            while($row = $result->fetch_assoc()){
                $object = new Product($row['nome'],$row['descricao'], $row['valor'],$row['quantidade']);
                $object->id = $row['id'];
                $list[] = $object;
            }
        $GLOBALS['mysqli']->close();
        return $list;
    }
?>