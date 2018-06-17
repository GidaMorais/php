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
            <?php
            include("menu_lateral.php");
            include("formularios/conexao.php");
            $selectCarros = "SELECT * from cadastro_carro";
            $resultado = mysqli_query($link, $selectCarros) or die("Nao foi possivel executar o selectCarros");
            $cont = mysqli_num_rows($resultado);
            ?>            
            <br>
            <div class="col-md-10"><!--CONTEUDO CENTRAL-->                
                <div class="col-md-12 center-block">
                    <legend>Cadastro Veiculo</legend>
                    
                        <table class="table table-striped table-hover">
                            <tr>
                                <th class="col-md-2">Placa</th>
                                <th class="col-md-2">Modelo</th>
                                <th class="col-md-2">Marca</th>
                                <th class="col-md-2">Fabricação</th>
                                <th class="col-md-3">Cliente</th>                        
                                <th class="col-md-1"></th>                        
                            </tr>
                            <?php
                            if ($cont == 0) {
                                echo "<tr><td>Nenhum registro encontrado!</td></tr>";
                            } else {
                                while ($linha = mysqli_fetch_array($resultado)) {
                                    $id_carro = $linha['idcarro'];
                                    $marca = $linha['marca'];
                                    $modelo = $linha['modelo'];
                                    $placa = $linha['placa'];
                                    $fabricacao = $linha['fabricacao'];
                                    $id_cliente = $linha['id_cliente'];
                                    
                                    $busca1= "SELECT nome_cliente FROM oficina.cadastro_cliente WHERE id_cliente='$id_cliente'";
                                    $busca= mysqli_query($link, $busca1);
                                    $nome_cliente= mysqli_fetch_array($busca)['nome_cliente'];
                                    ?>
                                    <tr>
                                        <td><?php echo $placa ?></td>
                                        <td><?php echo $modelo ?></td>
                                        <td><?php echo $marca ?></td>
                                        <td><?php echo $fabricacao ?></td>
                                        <td><?php echo $nome_cliente ?></td>
                                        <td>
                                            <form method='POST' action='formularios/var_alterar_carro.php'>
                                                <input name='idcarro' id='' type='hidden' value="<?php echo $id_carro ?>">
                                                <button type="submit" class="button_alterar"><i id="buton" class="glyphicon glyphicon-edit"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                            <?php }} ?>
                            </table>
                        
                    </div>
                </div><!--FIM CONTEUDO CENTRAL-->           
            </div>
            <footer class="rodape">Todos Direitos Reservados - Alunos: Alberto, Dennysson e Gideão - 2018</footer>
                <?php include("modal_edit.php"); ?>
    </body>
</html>