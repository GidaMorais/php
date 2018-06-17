<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Oficina Mecânica | Inicio</title>
        <link rel="stylesheet" href="css/menucss.css">  
        <link href="css/estilo-cadastro.css" rel="stylesheet" media="screen">        
        <link href="css/bootstrap.min.css" rel="stylesheet">        
        <link href="css/style-icon.css" rel="stylesheet">        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>




        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


        <!-- Custom Theme Style -->


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->

        <script>
            function MascaraMoeda(objTextBox, SeparadorMilesimo, SeparadorDecimal, e) {
                var sep = 0;
                var key = '';
                var i = j = 0;
                var len = len2 = 0;
                var strCheck = '0123456789';
                var aux = aux2 = '';
                var whichCode = (window.Event) ? e.which : e.keyCode;
                if (whichCode == 13 || whichCode == 8)
                    return true;
                key = String.fromCharCode(whichCode); // Valor para o código da Chave
                if (strCheck.indexOf(key) == -1)
                    return false; // Chave inválida
                len = objTextBox.value.length;
                for (i = 0; i < len; i++)
                    if ((objTextBox.value.charAt(i) != '0') && (objTextBox.value.charAt(i) != SeparadorDecimal))
                        break;
                aux = '';
                for (; i < len; i++)
                    if (strCheck.indexOf(objTextBox.value.charAt(i)) != -1)
                        aux += objTextBox.value.charAt(i);
                aux += key;
                len = aux.length;
                if (len == 0)
                    objTextBox.value = '';
                if (len == 1)
                    objTextBox.value = '0' + SeparadorDecimal + '0' + aux;
                if (len == 2)
                    objTextBox.value = '0' + SeparadorDecimal + aux;
                if (len > 2) {
                    aux2 = '';
                    for (j = 0, i = len - 3; i >= 0; i--) {
                        if (j == 3) {
                            aux2 += SeparadorMilesimo;
                            j = 0;
                        }
                        aux2 += aux.charAt(i);
                        j++;
                    }
                    objTextBox.value = '';
                    len2 = aux2.length;
                    for (i = len2 - 1; i >= 0; i--)
                        objTextBox.value += aux2.charAt(i);
                    objTextBox.value += SeparadorDecimal + aux.substr(len - 2, len);
                }
                return false;
            }
            function maiuscula(z) {
                v = z.value.toUpperCase();
                z.value = v;
            }

            function mascara(scr, mask)
            {

                var i = scr.value.length;
                var saida = mask.substring(1, 2);
                var texto = mask.substring(i);
                if (texto.substring(0, 1) !== saida)
                {
                    scr.value += texto.substring(0, 1);
                }

            }
            function SomenteNumero(e) {
                var tecla = (window.event) ? event.keyCode : e.which;
                if ((tecla > 47 && tecla < 58 || tecla === 46))
                    return true;
                else {
                    if (tecla === 8 || tecla === 0)
                        return true;
                    else
                        return false;
                }
            }


        </script>
    </head>
    <body>
        <!-------------C  A  B  E  Ç  A  L  H  O ------->
        <div id="tr02">
            <a href="index.php"><img src="imagens/logo.png" width="400" height="64" alt="" id="img"/></a>                    
        </div>        
        <div class="row"> 
            <!--MENU LATERAL-->
            <?php include("menu_lateral.php"); 
            include("formularios/conexao.php");
            $buscaOS = $link->query("SELECT * FROM ordem_servico") or die("Erro na busca Cliente");
            $numOS = 0;
            $numOS = mysqli_num_rows($buscaOS)+1;
            
            ?>
            <br>
            <div class="col-md-10"><!--CONTEUDO CENTRAL-->
                <div class="col-md-2"></div>
                <div class="formulario col-md-6">
                    <legend>Ordem de Serviço</legend>
                    <form class="form-editar center col-md-12" action="ordem_servico1.php" method="POST">
                        <div class="input-group input-group-lg">
                            <input type="hidden" value="<?php echo $numOS ?>" name="numOS">
                        </div>
                        <label class="legenda-form">Cliente</label>
                        <div class="input-group input-group-lg">  
                            <select class="form-control" id="id_cliente" name="cliente"> 
                                <?php
                                
                                $busca = $link->query("SELECT * FROM cadastro_cliente") or die("Erro na busca Cliente");
								   
								   
                                if (mysqli_num_rows($busca) > 0) {
                                    $result = $link->query('SELECT * FROM cadastro_cliente ORDER BY nome_cliente') or die("Erro na busca");
									
                                    while ($valor = mysqli_fetch_assoc($result)) {
										
                                        $id_cliente = $valor['id_cliente'];
                                        $cliente = $valor['nome_cliente'];
                                        $cpf = $valor['cpf_cliente'];
                                        $tel = $valor['tel_cliente'];
                                        ?>
                                        
                                        <option value="<?php echo $cliente ?>" ><?php echo $valor['nome_cliente'] ?>  |  CPF:<?php echo $cpf ?></option>

                                        <?php
                                    }                                    
                                } else {
                                    ?>                                        
                                    <option value="">Nenhum Cliente Encontrado</option>
                                <?php }
                                ?>
                            </select>
                            
                            <span class="input-group-addon">
                                <i class="fa fa-users"></i>
                            </span>
                        </div>
                        <label class="text-left">Veiculo</label>
                        <div class="input-group input-group-lg">
                            <select class="form-control" id="carro" name="carro"> 
                                <?php
                                include("formularios/conexao.php");
                                $busca = $link->query("SELECT * FROM cadastro_carro")or die("Carro não encontrado");                                
                                if (mysqli_num_rows($busca) > 0) {

                                    $result = $link->query("SELECT * FROM cadastro_carro") or die("Erro na busca");

                                    while ($valor = mysqli_fetch_assoc($result)) {
                                        $idcarro = $valor['idcarro'];
                                        $modelo = $valor['modelo'];
                                        $placa = $valor['placa'];
                                        $marca = $valor['marca'];
                                        $cliente_carro = $valor['id_cliente'];

                                        $busca_cliente = $link->query("SELECT * FROM cadastro_cliente WHERE id_cliente='$cliente_carro'") or die("Erro na busca");
                                        $valor1 = mysqli_fetch_assoc($busca_cliente);
                                        $nome_cliente = $valor1['nome_cliente'];
                                        ?>
                                        <option id="resultado" value="<?php echo $modelo?>" ><?php echo "Cliente: {$nome_cliente}<br> | Modelo: {$modelo}  |  Placa: {$placa}" ?></option>
                                        <?php
                                    }
                                } else {
                                    ?>                                        
                                    <option value="">Nenhum Veiculo Encontrado</option>
                                <?php }
                                ?>


                            </select> 
                            <span class="input-group-addon">
                                <i class="fa fa-car"></i>
                            </span>
                            <input type="hidden" value="<?php echo $cliente ?>" name="nomecliente">
                            <input type="hidden" value="<?php echo $tel ?>" name="telcliente">
                            <input type="hidden" value="<?php echo $modelo ?>" name="modelocarro">
                            <input type="hidden" value="<?php echo $placa ?>" name="placacarro">
                        </div>
                                                
                        <input class="btn" type="submit" value="Cadastrar">
                    </form>
                </div>

            </div><!--FIM CONTEUDO CENTRAL-->           
        </div>
        <footer class="rodape">Todos Direitos Reservador - Alunos: Alberto, Dennysson e Gideão - 2018</footer>
            <?php include("modal.php"); ?>
    </body>
</html>







