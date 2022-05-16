<?php
require '../Config/Config.php';
require_once __DIR__ . ("/../Controller/Select_Clients.php");
require_once __DIR__ . ("/../Controller/Select.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php include_once __DIR__ . "/../public/Head/head.php"; ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Selecione Cliente</title>
    </head>
    <body >
        <?php include_once __DIR__ . "/../public/Siderbar/Sidebar.php"; ?>
        <!-- Inicio Modal Editar-->


        <div class="container-fluid m-auto" style="top: 10%; width: 90%; ">
            <div class="badge-light">
                <div class="row">
                    <div class="form-group col-5 m-3">
                        <form action="../Controller/Select_Clients.php" method="POST">
                            <label for="recipient-name" class="control-label">Código do Cliente:</label>
                            <input name="ID_CLIENT" type="text" style="width: 20%" id="ID_client">
                            <button type="submit" class="btn btn-success">&#10142;</button>
                        </form>
                    </div>
                    <div class="form-group col-5 m-3" >
                        <input id="filtro-nome" style="width: 35%" placeholder="Buscar..."/></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">  
                    <div  class="table-overflow">
                        <table class="Table" id="Tableprodutos">
                            <thead>
                                <tr>
                                    <th>IDº</th>
                                    <th>Nome do Clinte</th>
                                    <th>Apelido</th>
                                </tr>                                    
                            </thead>
                            <tbody> 
                                <?php
                                $SL_clientes = SELECT('clientes', '', '');
                                foreach ($SL_clientes as $row_cliente) {
                                    ?>
                                    <tr>
                                        <td><div class="search"><?php echo $row_cliente['CODIGO']; ?></div></td>
                                        <td><div class="search"><?php echo $row_cliente['NOME']; ?></div></td>
                                        <td><div class="search"><?php echo $row_cliente['FANTASIA']; ?></div></td>
                                    </tr>
                                <?php } ?>
                            </tbody>          
                        </table> 
                    </div>  
                </div>
            </div>	
        </div>	
        <style type="text/css">

            .table-overflow {
                width: 100%;
                max-height:400px;
                overflow-y:auto;
            }
        </style>

        <!-- End of Main Content -->
        <?php include_once __DIR__ . "/../public/Footer/Footer.php"; ?>
        <script src="<?php echo DIRJS?>BuscaJS.js"></script>
    </body>
</html>


