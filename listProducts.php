<!DOCTYPE html>
<?php require 'classes/classProduct.php'; ?>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
                    <!-- Nav bar -->
                    <nav class="nav">
                        <a class="nav-link" href="index.php">Cadastro</a>
                        <a class="nav-link" href="listProducts.php">Lista de Produtos</a>
                    </nav>
                    <!-- Fim da Nav bar -->
        <h1>Lista de Produtos</h1>
            <?php  
            $list = [] ;
            $list = listProducts();
            ?>
            <ul class="list-group">
                <?php foreach ($list as $item): ?>
                <li class="list-group-item"><?php echo $item->name;?><br>
                <a class="btn btn-primary" href="product.php?id=<?php echo $item->id;?>">Exibir</a></li>
            </ul>
            <?php 
                endforeach; 
                    if(array_key_exists('deleteSucess', $_SESSION)){
                        echo '<div class="alert alert-danger" role="alert">'.$_SESSION['deleteSucess']."</div>";
                        unset($_SESSION['deleteSucess']);
                    }elseif(array_key_exists('deleteError', $_SESSION)){
                        '<div class="alert alert-danger" role="alert">'.$_SESSION['deleteError']."</div>";
                        unset($_SESSION['deleteerrors']);
                    }   
            
            ?>

    </div>

</body>
</html>
