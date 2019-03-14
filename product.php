<!DOCTYPE html>
<html>
<?php require 'classes/classProduct.php'; ?>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
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
        <div class="form-group">
            <?php
                //instanciando produto.
                $product = new Product('','','','');
                if(array_key_exists('id', $_GET)):
                $product->showProduct($_GET['id']);
            ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Valor</th>
                                <th>Quantidade</th>
                            </tr>
                        </thead>
                            <tbody>
                                <tr>
                                <td><?php echo $product->name; ?></td>
                                <td><?php echo $product->description; ?></td>
                                <td><?php echo $product->value; ?></td>
                                <td><?php echo $product->quantity; ?></td>
                                </tr>                   
                    </table>
                    <?php endif;?>
        </div>

        <a class="btn btn-primary"href="editProduct.php?id=<?php echo $product->id;?>">Editar Produto</a>
        <a class="btn btn-danger"href="editProduct.php?idex=<?php echo $product->id;?>">Excluir</a>
    </div>

</body>
</html>