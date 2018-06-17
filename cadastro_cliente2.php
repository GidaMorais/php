<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Oficina Mecânica | Inicio</title>
<link rel="stylesheet" href="css/menucss.css">
<!-- Bootstrap -->
<link rel="stylesheet" href="css/cssbootstrap.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!-------------C  A  B  E  Ç  A  L  H  O ------->


<div id="tr02">
	<a href="index.php"><img src="imagens/logo.png" width="400" height="64" alt="" id="img"/></a>

	<h3 id="cabecalho"> Cadastrar Cliente </h3>
	
	<form id="menuSair">

	


	</div>
	   </form>

	</div>
	
	
<!-----MENU AREA PRINCIPAL FINANCEIRO ------->

	<div id="DivMenuFinanceiro">

	<ul class="ul">
	<li><a href="index.php"><i class="fa fa-home" style="font-size:18px;color:white"></i>&nbsp;INICIO</a></li>
	<li><a href=""><i class="	" style="font-size:15px;color:white"></i>&nbsp; </a></li>
	<li><a href=""><i class="	" style="font-size:15px;color:white"></i>&nbsp; </a></li>
	<li><a href=""><i class="   " style="font-size:15px;color:white"></i>&nbsp; </a></li>
	</ul>


	</div>
	
	<form action="formularios/var_cadastro_cliente.php" method="POST" >



	<!-- DADOS PESSOAIS-->

	<div id="cadastroCliente">




	 <table cellspacing="10">
	 <label>Nome:</label><br>
	 <input type="text" name="nome" id="caixa" ><br><br> 
	 <label>Telefone:</label><br>
	 <input type="text" name="tel" id="caixa" ><br><br>   
	 <label>CPF/CNPJ:</label><br>
	  <input type="text" name="cpf" id="caixa" ><br><br>  
	 <label for="rua">Rua:</label><br> 
     <input type="text" name="rua" id="caixa"><br><br> 


	</div>


	<!-- ENDEREÇO -->

	<div id="cadastroCliente2">



		

		<label for="numero">Numero:</label><br> 

		<input type="text" name="numero" id="caixa2"><br><br>  

		<label for="bairro">Bairro: </label><br> 

		<input type="text" name="bairro" id="caixa"><br><br> 

		<label>Estado:</label><br> 


		<select name="estado" id="caixa">  
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
	   </select><br><br>  

		<label for="cidade">Cidade: </label><br> 

		<input type="text" name="cidade" id="caixa"><br><br>  

		
		<input id="SaLi" type="submit" name="salvar" value="Cadastrar">

	</div>





	</form>




	 </body>
	</html>
