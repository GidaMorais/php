<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table class="table table-striped table-hover ">
            <tr>
                <th class="col-md-1 text-center">Quantidade</th>
                <th class="col-md-2 text-center">Descrição</th>
                 <th class="col-md-1 text-center">Valor Unit.</th>
                <th class="col-md-2 text-center">Valor Total</th>                                           
            </tr>
            <?php
            $selectItens = "SELECT * FROM  item_os INNER JOIN cadastro_especialidade ON 
			item_os.especialidade=cadastro_especialidade.id_especialidade WHERE id_ordem='$numOS'ORDER BY id_item_os DESC limit 5";		
	
           
			$resultado = mysqli_query($link, $selectItens) or die("Nao foi possivel executar o selectItens");
           
			$cont = mysqli_num_rows($resultado);
			
            if ($cont == 0) {
                echo "<tr><td colspan='6'>Nenhum registro encontrado!</td></tr>";
            } else {
                $num_item = 0;
				
                while ($linha = mysqli_fetch_array($resultado)) {
                    $id_item_os = $linha['id_item_os'];
					$descricao = $linha['descricao'];
                    $quantidade = $linha['quantidade'];
					
					$valor = $linha['valor'];
					$quantidade= $linha['quantidade'];
				    $status = $linha['status'];
					
                    $num_item++;

                    
                    ?>
                    
                   <?PHP $total =  $valor *  $quantidade  ?>
                    
                    
                    
                    <tr>
                        <td class="text-center"><?php echo $quantidade  ?></td>
                        <td class="text-center"><?php echo $descricao  ?></td>
                        
                        <td class="text-center"><?php echo $valor ?></td>
                        <td class="text-center"><?php echo $total  ?></td>
                        
                    </tr>
                <?php }
            }
            ?>
        </table>

    </body>
</html>
