<?php
require '../Config/Config.php';
require_once __DIR__ . ("/../Controller/Select.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php include_once __DIR__ . "/../public/Head/head.php"; ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ordem de serviço</title>
    </head>
    <body>
        <?php include_once __DIR__ . "/../public/Siderbar/Sidebar.php"; ?>
        <div class="container theme-showcase" role="main">
            <div class="page-header" style="margin: 2%; color: white">
                <h1>Ordem de serviço</h1>
            </div>
            <div class="pull-right">
                <a href="../View/Selecionar_Client.php"><button type="button" class="btn btn-xs btn-success" data-toggle="modal"  >Cadastrar</button></a>
            </div>

            <div class="row">
                <div  class = "table-overflow">
                    <div class="col-md-12">
                        <table class="Table">
                            <thead>
                                <tr>
                                    <th>O.S Nº</th>
                                    <th>Nome do Clinte</th>
                                    <th>Valor total da Nota</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?PHP $SL_os = SELECT('os', '', ''); ?>
                                <?php foreach ($SL_os as $row_os) { ?>
                                    <tr>
                                        <td><?php echo $row_os['ID_OS']; ?></td>
                                        <?PHP $SL_cliente = SELECT('clientes', 'CODIGO', $row_os['ID_client']) ?>
                                        <td><?php echo $row_os['Nome_client']; ?></td>
                                        <td><?php echo $row_os['Valor_Total']; ?></td>
                                        <td>
                                            <a href="<?PHP echo DIRView; ?>/Visualizar_OS.php?ID_OS=<?php echo $row_os['ID_OS']; ?>"><button type="button" class="btn btn-xs btn-primary"><i class='bx bxs-file-find'></i>Visualizar</button></a>
                                            <a href="<?PHP echo DIRView; ?>/Editar_OS.php?ID_OS=<?php echo $row_os['ID_OS']; ?>"><button type="button" class="btn btn-xs btn-warning"><i class='bx bx-edit'></i>Editar</button></a>                             
                                            <a href="../../Controller/Delete.php?table=os&cols=ID_OS&posit=<?php echo $row_os['ID_OS']; ?>"><bu"processa_apagar.php?id=tton type="button" class="btn btn-xs btn-danger"><i class='bx bxs-trash-alt'></i>Apagar</button></a>
                                            <a href="<?PHP echo DIRView; ?>/Imprimir_OS.php?ID_OS=<?php echo $row_os['ID_OS']; ?>"><button type="button" class="btn btn-xs btn-primary"><i class='bx bx-printer'  target="_self"></i>Imprimir</button></a>
                                            <a href="" target="_self"></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>		
                </div>
            </div>
        </div>
        <style type="text/css">
            .table-overflow{
                width: 100%;
                max-height:400px;
                overflow-y:auto;
            }
            .Table{
                /*color: blue;*/
            }
        </style>
        <?php include_once __DIR__ . "/../public/Footer/Footer.php"; ?>
    </body>
</html>