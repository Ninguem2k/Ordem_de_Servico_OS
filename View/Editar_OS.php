<?php
session_start();
require '../Config/Config.php';
require_once __DIR__ . ("/../Controller/Select.php");
$GUET = filter_input_array(INPUT_GET, FILTER_DEFAULT);
$ID_OS = $GUET['ID_OS'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro de OS</title>
        <link href="<?PHP echo DIRCSS; ?>Cadastro_OS.css" rel="stylesheet" type="text/css"/>
        <link href="<?PHP echo DIRCSS; ?>Tables.css" rel="stylesheet" type="text/css"/>
    </head>
    <body >
        <form action="../Controller/CadastroOS.php" name="formulario" method="POST">
            <div class="os">
                <h1 style="text-align: center; margin: 2.5%;">ORDEM DE SERVIÇO (OS)</h1>
                <div class="row header">  
                    <div class="col-2">
                        <div class="logo"> <img src="<?PHP echo DIRIMG; ?>/logo_empresa.jpg" alt=""/></div>                    
                    </div>
                    <div class="col-3">
                        <div class="aling tp">
                            <h3>Mastercell</h3>
                            <h3>CNPJ: <label>12364368650</label>  </h3>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="aling datn">  
                            <?PHP $SL_os = SELECT('os', 'ID_OS', $ID_OS); ?>
                            <?php foreach ($SL_os as $row_os) { ?>
                                <h3>O.S. Nº: <label id="ID_OS"><?php echo $row_os['ID_OS']; ?></label></h3>  
                                <?php
                                $ID_Client = $row_os['ID_client'];
                                ?>
                                <h3>Data de abertura: <input name="Date_OS" type="date" value="<?php echo $row_os['Date_OS']; ?> " > </h3>
                            </div>
                        </div>
                    </div>
                    <div class="retagulos"> 
                        <h2 style="text-align: center; margin: 1%;">DADOS DO CLIENTE</h2>
                        <?PHP
                        $SL_cliente = SELECT('clientes', 'CODIGO', $ID_Client);
                        foreach ($SL_cliente as $row_client) {
                            ?>   
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
                            <input name="Nome_client" type="hidden"  value="<?php echo $row_client['NOME']; ?>"/>
                        <?php } ?>
                    </div>

                    <div class="retagulos" style="height: auto">
                        <h2 style="text-align: center;"> Serviços e Peças Ultilizados</h2>       
                        <div class="row">                   
                            <div class="col-3">
                                <button type="button" class="btn btn-success my-2 my-sm-0" data-toggle="modal" data-target="#modalProd"  id="REMOVER">Remover</button>
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-success my-2 my-sm-0" data-toggle="modal" data-target="#modalProd"  id="ADD">Adicionar</button>
                            </div>
                            <div class="col-3">
                                <input id="filtro-nome" class="btn btn-success my-2 my-sm-0 " placeholder="   Buscar..."/></div>                                                  

                            <div class = "col-6" style="display: block">
                                <div class = "table-overflow">
                                    <table  id = "TableprodutosAUX" class = "Table">                                     
                                        <thead>
                                            <tr style="text-align: center">
                                                <th>ID</th>
                                                <th>Produto</th>
                                                <th>Quantidade</th>
                                                <th>Valor</th>
                                            </tr>
                                        </thead>
                                        <tbody id="TableAUX"> 
                                            <?php
                                            $SL_pdos = SELECT('os_itens', 'ID_OS', $ID_OS);
                                            foreach ($SL_pdos as $row_produt_os) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row_produt_os['Codigo']; ?></td>
                                                    <td><?php echo $row_produt_os['Nome']; ?></td>
                                                    <td><?php echo $row_produt_os['Quantidade']; ?></td>
                                                    <td><?php echo $row_produt_os['Valor']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div> 

                            <div class = "col-6" >
                                <div  class = "table-overflow">
                                    <table  id = "Tableprodutos" class = "Table">
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
                                            $SL_prod = SELECT('produtos', '', '');
                                            foreach ($SL_prod as $row_produt) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row_produt['CODIGO']; ?></td>
                                                    <td><?php echo $row_produt['DESCRICAO']; ?></td>
                                                    <td>1</td>
                                                    <td><?php echo $row_produt['P_VENDA']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>                            
                                    </table>   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="retagulos">
                        <h2 style="text-align: center;">INFORMAÇÕES DO PRODUTO</h2>
                        <div class="aling">
                            <h4>Modelo: <input type="text" name="Modelo" value="<?php echo $row_os['Modelo']; ?>" /> </h4>                        
                            <h4>Detalhe: <textarea style="resize: vertical; width: 100%;"  trim="true" name="Detalhe" >
                                    <?php echo $row_os['Detalhe']; ?>
                                </textarea> </h4>                        
                        </div>
                    </div>

                    <div class="retagulos">
                        <h2 style="text-align: center;">RECLAMAÇÃO DO CLIENTE</h2>
                        <h4>Reclamação: <textarea style="resize: vertical; width: 100%;"  name="Reclamacao" >
                                <?php echo $row_os['Reclamacao']; ?>
                            </textarea> 
                    </div>

                    <div class="retagulos">
                        <h2 style="text-align: center;">Observações</h2>
                        Desconto: <select name="Desconto" id="Desconto" value="<?php echo $row_os['Desconto']; ?>" onchange="Calc_VTotal()" name="Desconto">
                            <option>0</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>5</option>
                            <option>10</option>
                            <option>15</option>
                            <option>20</option>
                            <option>25</option>
                            <option>30</option>
                        </select>
                        Atendente: <input type="text" name="Atendente" value=" <?php echo $row_os['Atendente']; ?>" />
                        <h4>Observação: <textarea style="resize: vertical; width: 100%;"  name="Obs" >
                                <?php echo $row_os['Obs']; ?>
                            </textarea> </h4> 
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
                                        <h5 id="Vprodutos">R$ </h5>   
                                        <h5 id="Vdesconto">R$ </h5>   
                                        <h5 id="Vtotal">R$ </h5>   
                                    </div>
                            </div>
                        </div>
                    <?php } ?>
                    <button type="button" class="myBtn" title="Salvar" onclick="Salvar()">Salvar</button>
                    <a href="Listar_OS.php" style="">
                        <button type="button" class="myBtn" title="Sair" style="bottom: 100%; left: 20px;position: relative">Sair</button>
                    </a>
                </div>
            </div>
            <input name="ID_OS" type="hidden"  value="<?php echo $_SESSION['ID_OS'] ?>"/>
            <input name="ID_Client" type="hidden"  value="<?php echo $ID_Client ?>"/>
            <input name="Valor_total" type="hidden"  value="" id="Valor_total"/>
        </form>
        <style type="text/css">

            .table-overflow {
                max-height:400px;
                overflow-y:auto;
            }

            .myBtn {
                display: block;
                position: fixed;
                bottom: 20px;
                right: 30px;
                z-index: 9999;
                border: none;
                outline: none;
                background-color: red;
                color: white;
                cursor: pointer;
                padding: 15px;
                border-radius: 10px;
            }

            .myBtn:hover {
                background-color: chartreuse;
            }

            .btn{
                align-items: center;
                background-color: white;
                border: 1px solid black;
                width:90%;
                margin: 10px auto;
                padding:10px 0;
                display: block;
                color: black;
            }
        </style>
        <script src="<?PHP echo DIRJS; ?>Editar_OS.js"></script>
        <script src="<?PHP echo DIRJS; ?>BuscaJS.js"></script>
    </body>
</html>
<html>

