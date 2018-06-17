<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Oficina Mecânica | Inicio</title>
        <link rel="stylesheet" href="css/menucss.css">  
        <link href="css/estilo-cadastro.css" rel="stylesheet" media="screen">        
        <link href="css/bootstrap.min.css" rel="stylesheet">        
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
            <?php include("menu_lateral.php"); ?>
            <br>
            <div class="col-md-10"><!--CONTEUDO CENTRAL-->
                <div class="col-md-2"></div>
                <div class="formulario col-md-6">
                    <legend>Cadastro Veiculo</legend>
                    <form class="form-editar center col-md-12" action="formularios/var_cadastro_carro.php" method="POST">
                        <label class="legenda-form">Marca</label>
                        <div class="input-group input-group-lg">                            
                            <input class="form-control" name="marca" placeholder="Marca" id="marca" type="text" size="30" onkeyup="maiuscula(this)">                                    
                            <span class="input-group-addon">
                                <i class="fa fa-car"></i>
                            </span>                  
                        </div>
                        <label class="legenda-form">Modelo</label>
                        <div class="input-group input-group-lg">
                            <input class="form-control" type="text" placeholder="Modelo" id="modelo" name="modelo" onkeyup="maiuscula(this)">
                            <span class="input-group-addon">
                                <i class="fa fa-spinner"></i>
                            </span>                                    
                        </div>
                        <label class="legenda-form">Placa</label>
                        <div class="input-group input-group-lg">
                            <input class="form-control" type="text" placeholder="Placa" id="placa" name="placa" onkeyup="maiuscula(this)">
                            <span class="input-group-addon">
                                <i class="fa fa-list-alt"></i>
                            </span>                                    
                        </div>
                        <label class="legenda-form">Chassi</label>
                        <div class="input-group input-group-lg">
                            <input class="form-control" type="text" placeholder="Chassi" id="chassi" name="chassi" onkeyup="maiuscula(this)">
                            <span class="input-group-addon">
                                <i class="fa fa-cab"></i>
                            </span>                                    
                        </div>
                        <label class="legenda-form">Cor</label>
                        <div class="input-group input-group-lg">
                            <input class="form-control" type="text" placeholder="Cor" id="cor" name="cor" onkeyup="maiuscula(this)">
                            <span class="input-group-addon">
                                <i class="fa fa-eyedropper"></i>
                            </span>                                    
                        </div>
                        <label class="legenda-form">Ano Fabricação</label>
                        <div class="input-group input-group-lg">
                            <input class="form-control" type="text" placeholder="Ano Fabricação" id="fabricacao" name="fabricacao" maxlength="4" onkeypress='return SomenteNumero(event)'>
                            <span class="input-group-addon">
                                <i class="fa fa-location-arrow"></i>
                            </span>                                    
                        </div>
                        <label class="legenda-form">Cliente</label>
                        <div class="input-group input-group-lg">  
                            <select class="form-control" id="id_cliente" name="id_cliente"> 
                                <?php
                                include("formularios/conexao.php");

                                $result = $link->query('SELECT * FROM cadastro_cliente ORDER BY nome_cliente') or die("Erro na busca");
                                while ($valor = mysqli_fetch_assoc($result)) {
                                    $id_cliente = $valor['id_cliente'];
                                    $cliente = $valor['nome_cliente'];
                                    $cpf = $valor['cpf_cliente'];
                                    ?>
                                    <option value="<?php echo $id_cliente ?>" ><?php echo $valor['nome_cliente'] ?>  |  CPF:<?php echo $cpf ?></option>

                                <?php } ?>
                            </select>
                            <span class="input-group-addon">
                                <a data-toggle="modal" data-target="#modalcliente">
                                    <i class="glyphicon glyphicon-plus"></i>
                                </a>
                            </span>
                        </div>
                        <input class="btn" type="submit" value="Cadastrar">
                    </form>
                </div>

            </div><!--FIM CONTEUDO CENTRAL-->
            <!--                <div class="col-md-3">
            
                            </div>-->
        </div>
        <footer class="rodape">Todos Direitos Reservados - Alunos: Alberto, Dennysson e Gideão - 2018</footer>
            <?php include("modal.php"); ?>
</body>
</html>

