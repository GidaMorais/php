<!--Menu Lateral-->
<div id="nav-menu" class="panel-group col-md-2 ">
    <div class="panel panel-default ">
        <div class="panel-heading"><!--Inicio-->
            <ul class="nav panel-title">
                <li><a href="index.php">Inicio<i id="icon-menu" class="fa fa-home"></i></a></li>
            </ul>
        </div>
        <div class="panel-heading"><!--ORDEM DE SERVIÇO-->
            <ul class="nav panel-title">
                <li><a data-toggle="collapse" href="#OS">Ordem de Serviço<i id="icon-menu" class="fa fa-user-circle"></i></a></li>
            </ul>
        </div>
        <ul id="OS" class="nav panel-collapse collapse">
            <li><a href="ordem_servico.php">Cadastar</a></li>
            <li><a href="alter_cadastro_carro.php">Alterar</a></li>                                
        </ul>
        <!--FIM ORDEM DE SERVIÇO-->
        <div class="panel-heading"><!--Carros-->
            <ul class="nav panel-title">
                <li><a data-toggle="collapse" href="#carros">Carros<i id="icon-menu" class="fa fa-car"></i></a></li>
            </ul>
        </div>
        <ul id="carros" class="nav panel-collapse collapse">
            <li><a href="cadastro_carro.php">Cadastar</a></li>
            <li><a href="alterar_carro.php">Alterar</a></li>                                
        </ul><!--FIM Carros-->

        <div class="panel-heading"><!--CLIENTES-->
            <ul class="nav panel-title">
                <li><a data-toggle="collapse" href="#clientes">Clientes<i id="icon-menu" class="fa fa-users"></i></a></li>
            </ul>
        </div>
        <ul id="clientes" class="nav panel-collapse collapse">
            <li><a href="cadastro_cliente.php">Cadastrar</a></li>
            <li><a href="#">Alterar</a></li>                                
        </ul><!--FIM CLIENTES-->

        <div class="panel-heading"><!--FUNCIONARIOS-->
            <ul class="nav panel-title">
                <li><a data-toggle="collapse" href="#funcionarios">Funcionários<i id="icon-menu" class="fa fa-user-circle"></i></a></li>
            </ul>
        </div>
        <ul id="funcionarios" class="nav panel-collapse collapse">
            <li><a href="cadastro_funcionario.php">Cadastrar</a></li>
            <li><a href="#">Alterar</a></li>                                
        </ul><!--FIM FUNCIONARIOS-->
    </div>
</div>
<!--FIM Menu Lateral-->
