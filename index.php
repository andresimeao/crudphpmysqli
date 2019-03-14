<!DOCTYPE html>
<?php
    require 'classes/classProduct.php';
?>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Página Inicial</title>
</head>
<body> 
        <div class="container-fluid">
                    <!-- Nav bar -->
                    <nav class="nav">
                        <a class="nav-link" href="index.php">Cadastro</a>
                        <a class="nav-link" href="listProducts.php">Lista de Produtos</a>
                    </nav>
                    <!-- Fim da Nav bar -->
        <center><h1>Criar Produto</h1></center>
        
            <form action="index.php" method="POST">
                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text" class="form-control" name="name" required="required"><br>

                    <label for="description">Descrição:</label>
                    <input type="text" class="form-control" name="description"><br>

                    <label for="value">Valor:</label>
                    <input type="number" class="form-control" required="required" name="value"><br>

                    <label for="quantity">Quantidade:</label>
                    <input type="number" class="form-control" required="required" name="quantity"><br>

                    <button class="btn btn-primary" type="submit"name="cadastrar">Cadastrar</button>
                </div>
            </form>
                <?php
                if(array_key_exists('cadastrar', $_POST)){
                    $product = new Product($_POST['name'], $_POST['description'], $_POST['quantity'], $_POST['value']);
                    $product->insertProduct();

                    if(array_key_exists('insertSucess',$_SESSION)){
                        echo '<div class="alert alert-primary" role="alert">'.$_SESSION['insertSucess']."</div>";
                        unset($_SESSION['insertSucess']);
                    } elseif(array_key_exists('insertError', $_SESSION)){
                        echo '<div class="alert alert-danger" role="alert">'.$_SESSION['insertError']."</div>";
                        unset($_SESSION['insertError']);
                    }     
                }
               
                ?>
        </div>
      
</body>
</html>
