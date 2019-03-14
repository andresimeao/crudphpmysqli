
<!DOCTYPE html>
<html>
<?php require 'classes/classProduct.php';?>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <title>Alterar Produto</title>
</head>
<body>
<?php
     $product = new Product('','','','');
    if(isset($_GET['id'])){
        $_SESSION['id'][]= $_GET['id'];
        $product->showProduct($_GET['id']);  
    }
    if(array_key_exists('alterar', $_POST)){
        
        $product->id =(int)end($_SESSION['id'])[0];
        $product->name =(!empty($_POST['name']))? $_POST['name']: '' ;
        $product->description = (!empty($_POST['description']))? $_POST['description']:'';
        $product->value = (!empty($_POST['value']))?$_POST['value']:'' ;
        $product->quantity = (!empty($_POST['quantity']))?$_POST['quantity']:'';
        $product->changeProduct();
    }
?>
    <div class="container-fluid">
                    <!-- Nav bar -->
                        <nav class="nav">
                        <a class="nav-link" href="index.php">Cadastro</a>
                        <a class="nav-link" href="listProducts.php">Lista de Produtos</a>
                        </nav>
                    <!-- Fim da Nav bar -->
        <center><h1>Alterar Produto</h1></center>
            <form action="editProduct.php" method="POST">
                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text" class="form-control" name="name" required="required" value="<?php echo $product->name ?>">

                    <label for="description">Descrição:</label>
                    <input type="text" class="form-control" name="description" value="<?php echo $product->description ?>">

                    <label for="value">Valor:</label>
                    <input type="number" class="form-control" required="required" name="value"value="<?php echo $product->value?>">

                    <label for="quantity">Quantidade:</label>
                    <input type="number" class="form-control" required="required" name="quantity" value="<?php echo $product->quantity ?>">

                    <button class="btn btn-primary" type="submit" name="alterar">Alterar</button>
                    <button class="btn btn-danger" type="submit" name="excluir">Exluir</button>
                </div>
            </form>
<?php
    if(array_key_exists('changeSucess', $_SESSION)){
        echo '<div class="alert alert-primary" role="alert">'.$_SESSION['changeSucess']."</div>";
        unset($_SESSION['changeSucess']);
    }
    if(array_key_exists('excluir', $_POST)){
        $product->delete(end($_SESSION['id']));     
        header('location:listProducts.php');
    }
    if(array_key_exists('idex', $_GET)){
        $product->delete($_GET['idex']);
        header('location:listProducts.php');
    }
?>

</body>
</html>