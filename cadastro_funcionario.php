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
                    <legend>Cadastro Funcionários</legend>
                    <form class="form-editar center col-md-12" action="formularios/var_cadastro_funcionario.php" method="POST">
                        <label class="text-left">Nome</label>
                        <div class="input-group input-group-lg">                            
                            <input class="form-control" name="nome" placeholder="Nome" id="nome" type="text" size="30" onkeyup="maiuscula(this)">                                    
                            <span class="input-group-addon">
                                <i class="fa fa-user-o"></i>
                            </span>                  
                        </div>
                        <label class="text-left">Telefone</label>
                        <div class="input-group input-group-lg">
                            <input class="form-control" type="text" placeholder="Telefone" id="tel" name="tel" onkeypress='return SomenteNumero(event)'>
                            <span class="input-group-addon">
                                <i class="fa fa-volume-control-phone"></i>
                            </span>                                    
                        </div>
                        <label class="legenda-form col-md-6">CPF</label>
                        <label class="legenda-form col-md-6">RG</label>
                        <div class="input-group form-inline input-group-lg ">    
                            <input class="form-control" type="text" placeholder="CPF" id="cpf" name="cpf" onkeypress='return SomenteNumero(event)'>
                            <span class="input-group-addon">
                                <i class="fa fa-vcard"></i>
                            </span>  
                            <input class="form-control" type="text" placeholder="RG" id="cpf" name="rg" onkeypress='return SomenteNumero(event)'>
                            <span class="input-group-addon">
                                <i class="fa fa-vcard"></i>
                            </span>                                    
                        </div>                        
                        <label class="text-left">Especialidade</label>
                        <div class="input-group input-group-lg">
                            <select class="form-control" id="especialidade" name="especialidade"> 
                                <?php
                                include("formularios/conexao.php");
                                $busca = $link->query("SELECT * FROM cadastro_especialidade")or die("Cliente não encontrado");
                                if (mysqli_num_rows($busca) > 0) {
                                    $result = $link->query('SELECT * FROM cadastro_especialidade ORDER BY descricao') or die("Erro na busca");
                                    while ($valor = mysqli_fetch_assoc($result)) {
                                        $id_esp = $valor['id_especialidade'];
                                        $especialidade = $valor['descricao'];
                                        ?>
                                        <option value="<?php echo $id_esp ?>" ><?php echo $especialidade ?></option>
                                        <?php
                                    }
                                } else {
                                    ?>                                        
                                    <option value="">Nenhuma Especialidade Cadastrada</option>
                                <?php } ?>
                            </select>                            
                            <span class="input-group-addon">
                                <a data-toggle="modal" data-target="#modalespecialidade">
                                    <i class="glyphicon glyphicon-plus"></i>
                                </a>
                            </span>
                        </div>
                        <label id="label">Rua</label>
                        <div class="input-group input-group-lg">                            
                            <input class="form-control form-inline" type="text" placeholder="Rua" id="rua" name="rua" onkeyup="maiuscula(this)">
                            <span class="input-group-addon">
                                <i class="fa fa-home"></i>
                            </span>
                        </div>
                        <label class="legenda-form col-md-6">Numero</label>
                        <label class="legenda-form col-md-6">Bairro</label>
                        <div class="input-group form-inline input-group-lg ">    
                            <input class="form-control" type="text" placeholder="Numero" id="numero" name="numero" onkeypress='return SomenteNumero(event)'>
                            <span class="input-group-addon">
                                <i class="fa fa-home"></i>
                            </span> 
                            <input class="form-control" type="text" placeholder="Bairro" id="bairro" name="bairro" onkeyup="maiuscula(this)"> 
                            <span class="input-group-addon">
                                <i class="fa fa-home"></i>
                            </span>                            
                        </div>
                        <label class="legenda-form col-md-6">Cidade</label>
                        <label class="legenda-form col-md-6">Estado</label>
                        <div class="input-group input-group-lg">
                            <input class="form-control" type="text" placeholder="Cidade" id="cidade" name="cidade" onkeyup="maiuscula(this)">
                            <span class="input-group-addon">
                                <i class="fa fa-home"></i>
                            </span> 

                            <select class="form-control" id="estado" name="estado"> 
                                <option selected>Selecione o Estado</option> 
                                <option value="AC">Acre</option> 
                                <option value="AL">Alagoas</option> 
                                <option value="AM">Amazonas</option> 
                                <option value="AP">Amapá</option> 
                                <option value="BA">Bahia</option> 
                                <option value="CE">Ceará</option> 
                                <option value="DF">Distrito Federal</option> 
                                <option value="ES">Espírito Santo</option> 
                                <option value="GO">Goiás</option> 
                                <option value="MA">Maranhão</option> 
                                <option value="MT">Mato Grosso</option> 
                                <option value="MS">Mato Grosso do Sul</option> 
                                <option value="MG">Minas Gerais</option> 
                                <option value="PA">Pará</option> 
                                <option value="PB">Paraíba</option> 
                                <option value="PR">Paraná</option> 
                                <option value="PE">Pernambuco</option> 
                                <option value="PI">Piauí</option> 
                                <option value="RJ">Rio de Janeiro</option> 
                                <option value="RN">Rio Grande do Norte</option> 
                                <option value="RO">Rondônia</option> 
                                <option value="RS">Rio Grande do Sul</option> 
                                <option value="RR">Roraima</option> 
                                <option value="SC">Santa Catarina</option> 
                                <option value="SE">Sergipe</option> 
                                <option value="SP">São Paulo</option> 
                                <option value="TO">Tocantins</option>
                            </select>
                            <span class="input-group-addon">
                                <i class="fa fa-home"></i>
                            </span>  

                        </div>
                        <div class="input-group input-group-lg">

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
