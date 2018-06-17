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

            <?php
            include("menu_lateral.php");
            include("formularios/conexao.php");
            if (!empty($_POST['numOS']) && !empty($_POST['nomecliente']) && !empty($_POST['telcliente']) && !empty($_POST['modelocarro']) && !empty($_POST['placacarro'])) {
                $cliente = $_POST["cliente"];
                $tel = $_POST["telcliente"];
                $modelo = $_POST["carro"];
                $placa = $_POST["placacarro"];
                $numOS = $_POST["numOS"];

                //Coloca numero do orçamento na Seção
                $_SESSION['numOS'] = $numOS;
            } else {
                echo "<script> alert ('TODOS OS CAMPOS DEVEM SER PREENCHIDOS!'); javascript:history.back(-1)</script>";
            }
            ?>
            <br>
            <div class="col-md-10"><!--CONTEUDO CENTRAL-->
                <div class="formulario col-md-6"><!--Cabeçalho OS--> 
                    <legend class="col-md-10">Ordem de Serviço</legend>
                    <legend class="block-left col-md-2">Nº.<?php echo $numOS; ?></legend>
                    <div>                        
                        <div class="block">
                            <table class="table">
                                <tr id="desc-titulo">
                                    <th  id="desc-titulo" class="col text-center bg-info" colspan="4">INFORMAÇÕES CLIENTE</th>                                    
                                </tr>
                                <tr>
                                    <th class="col-md-1">NOME: </th>
                                    <td class="col"> <?php echo $cliente; ?></td>
                                    <th class="col-md-1">TELEFONE: </th>
                                    <td class="col" > <?php echo $tel; ?></td>
                                </tr> 
                                <tr id="desc-titulo">
                                    <th id="desc-titulo" class="col text-center bg-info" colspan="4">INFORMAÇÕES VEICULO</th>                                    
                                </tr>
                                <tr>
                                    <th>MODELO: </th>
                                    <td> <?php echo $modelo; ?></td>
                                    <th>PLACA: </th>
                                    <td> <?php echo $placa; ?></td>
                                </tr>  
                            </table>
                        </div>
                    </div>
                    <div id="table-itens" class="col">
                        <?php include ("./iframe_itens_os.php"); ?>                   
                    </div>
                </div><!--FIM Cabeçalho OS--> 

                <div  class="formulario col-md-5"><!--Itens OS-->
                    <!--                <form class="form-editar center col-md-12" action="formularios/var_ordem_servico.php" method="POST">
                                            <label class="text-left">Especialidades</label>
                                            <div class="input-group input-group-lg">
                                                <select class="form-control" id="especialidade" name="id_especialidade"> 
                    <?php
                    include("formularios/conexao.php");
                    $busca = $link->query("SELECT * FROM cadastro_especialidade")or die("Cliente não encontrado");

                    if (mysqli_num_rows($busca) == 0) {
                        ?>                                        
                                                            <option value="">Nenhuma Especialidade Cadastrada</option>
                        <?php
                    } else {

                        $result = $link->query('SELECT * FROM cadastro_especialidade') or die("Erro na busca");
                        while ($valor = mysqli_fetch_assoc($result)) {
                            $especialidade = $valor['descricao_esp'];
                            ?>
                                                                    <option value="<?php echo $especialidade ?>" ><?php echo $especialidade ?></option>
                            <?php
                        }
                    }
                    ?>
                    
                                                </select>                            
                                                <span class="input-group-addon">
                                                    <a data-toggle="modal" data-target="#modalespecialidade">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                    </a>
                                                </span>                           
                                            </div>
                                            <input class="btn col-md-12" type="submit" value="Cadastrar">
                                    </form>-->
                    <legend class="col">Ordem de Serviço</legend>
                    <div id="form-itens" class="col-md-12">

                        <?php include ("formularios/iframe_servico.php"); ?>                   
                    </div>

                </div>
            </div><!--FIM CONTEUDO CENTRAL-->
        </div>
        <footer class="rodape">Todos Direitos Reservador - Alunos: Alberto, Dennysson e Gideão - 2018</footer>
            <?php include("modal.php"); ?>
    </body>
</html>







