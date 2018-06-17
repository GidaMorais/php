<!-- Modal ALTERAR -->
<div class="modal fade" id="modal_alt_carro" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cadastrar Especialidade</h4>
            </div>
            <div class="modal-body">       
                <form class="form-editar center col" action="formularios/var_cadastro_especialidade.php" method="POST">                                                     
                    <label class="legenda-form">Descrição</label>
                    <div class="input-group input-group-lg">                            
                        <input class="form-control" name="descricao_esp" id="descricao_esp" type="text" size="30" onkeyup="maiuscula(this)" value="<?php $car = $_POST["idcarro"]; echo $car; ?>">                                    
                        <span class="input-group-addon">
                            <i class="fa fa-car"></i>
                        </span>                  
                    </div>   
                    <input class="btn" type="submit" value="Cadastrar">
                </form>
                <br>   
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FIM Modal ALTERAR -->  
