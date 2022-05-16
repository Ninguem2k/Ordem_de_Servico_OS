
<?php
session_start();
require '../Config/Config.php';
require_once __DIR__ . ("/../Controller/Select.php");
$GUET = filter_input_array(INPUT_GET, FILTER_DEFAULT);
$ID_OS = $GUET['ID_OS'];
?>
    <head>
        <meta charset="UTF-8">
        <title>Imprimir OS</title>
        <link href="<?php echo DIRCSS; ?>Visualizar_Imprimir_OS.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo DIRCSS; ?>Tables.css" rel="stylesheet" type="text/css"/>
    </head>
    <body >
        <div class="os">
            <h1 style="text-align: center; margin: 2.5%;">ORDEM DE SERVIÇO (OS)</h1>
            <div class="row header">  
                <div class="col-2">
                    <div class="logo"> <img src="<?php echo DIRIMG; ?>logo_empresa.jpg" alt=""/></div>                    
                </div>
                <div class="col-4">
                    <div class="aling tp">
                        <h3>Mastercell</h3>
                        <h3>CNPJ: <label>12364368650</label>  </h3>
                    </div>
                </div>
                <div class="col-4">
                    <div class="aling datn">
                        <?PHP $SL_os = SELECT('os', 'ID_OS', $ID_OS); ?>
                        <?php foreach ($SL_os as $row_os) { ?>
                            <h3>O.S. Nº: <label><?php echo $row_os['ID_OS']; ?></label></h3>                       
                            <h3>Data de abertura: <?php echo $row_os['Date_OS']; ?></h3>
                        </div>
                    </div>
                </div>
                <div class="retagulos"> 
                    <h2 style="text-align: center; margin: 1%;">DADOS DO CLIENTE</h2>

                    <?PHP $SL_client = SELECT('clientes', 'CODIGO', $row_os['ID_client']); ?>
                    <?php foreach ($SL_client as $row_client) { ?>
                        <div class="row"> 
                            <div class="col-6">
                                <div class="aling">
                                    <h4>Nome: <label><?php echo $row_client['NOME']; ?></label>  </h4>                       
                                    <h4>Apelido: <label><?php echo $row_client['FANTASIA']; ?></label>  </h4>                       
                                    <h4>Endereço:<label><?php echo $row_client['ENDERECO']; ?></label>  </h4>                        
                                    <h4>Cidade:<label><?php echo $row_client['CEP']; ?></label></h4>                       

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="aling">
                                    <h4>Telefone:<label><?php echo $row_client['TELEFONE']; ?></label></h4>
                                    <h4>CPF/CNPJ:<label><?php echo $row_client['CPF_CNPJ']; ?></label> </h4>
                                    <h4>Bairro:<label><?php echo $row_client['BAIRRO']; ?></label>  </h4>
                                    <h4>Email:<label><?php echo $row_client['EMAIL']; ?></label>  </h4>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <div class="retagulos">
                    <h2 style="text-align: center;">INFORMAÇÕES DO PRODUTO</h2>
                    <div class="row"> 
                        <div class = "col-4" >
                            <div class="aling">
                                <h4>Modelo: <label><?php echo $row_os['Modelo']; ?></label> </h4>
                                <h4>Detalhe: <label><?php echo $row_os['Detalhe']; ?></label>   </h4>
                            </div>                    
                        </div>
                        <div class = "col-6" >
                                <table>
                                    <thead>
                                        <tr>
                                            <th>IDº</th>
                                            <th>Nome</th>
                                            <th>Quantidade</th>
                                            <th>Valor</th>
                                        </tr> 
                                    </thead>

                                    <tbody>
                                        <?php
                                        $SL_prod = SELECT('os_itens', 'ID_OS', $ID_OS);
                                        foreach ($SL_prod as $row_produt) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row_produt['Codigo']; ?></td>   
                                                <td><?php echo $row_produt['Nome']; ?></td>   
                                                <td><?php echo $row_produt['Quantidade']; ?></td>
                                                <td><?php echo $row_produt['Valor']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>                            
                                </table>   
                        </div>
                    </div>
                </div>

                <div class="retagulos">
                    <h2 style="text-align: center;">RECLAMAÇÃO DO CLIENTE</h2>
                    <div class="row"> 
                        <h4><?php echo $row_os['Reclamacao']; ?></h4>
                    </div>
                </div>
                <div class="retagulos">
                    <h2 style="text-align: center;">Laudo tecnico</h2>
                    <h4><?php echo $row_os['Obs']; ?></h4>
                </div>    

                <div class="retagulos">
                    <h2 style="text-align: center;">Garantia</h2>
                    <h5 style="text-align: center;">3 meses de garatia do serviço e peças contados da data de entrada desta OS</h5>
                </div>
                <div class="retagulos">
                    <h2 style="text-align: center;">ORÇAMENTO</h2>
                    <div class="row">
                        <div class="col-6">
                            <div class="aling">          
                                <h4>Valor de peças/serviços:</h4>                
                                <h4>Desconto:</h4>                
                                <h4>Valor total:</h4>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="aling">
                                <h5>R$ <?php echo $row_os['Valor_Total'] + ($row_os['Valor_Total'] * ($row_os['Desconto'] / 100)); ?></h5>   
                                <h5>R$ <?php echo $row_os['Desconto']; ?></h5>   
                                <h5>R$ <?php echo $row_os['Valor_Total']; ?></h5>  
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="row">
                    <div class="col-6">                       
                        <div class="ass">        
                            <hr size="2" width="100%" align="center" >                        
                            <h5>Assinatura do Cliente</h5>
                        </div>
                    </div>
                    <div class="col-6">                          
                        <div class="ass"> 
                            <hr size="2" width="100%" align="center" style="background-color: #000" >                                                    
                            <h5>Assinatura do Responsável Técnico</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
