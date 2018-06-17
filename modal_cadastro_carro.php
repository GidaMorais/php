<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cadastrar Especialidade</h4>
            </div>
            <div class="modal-body">                   
                    <form class="center col" action="formularios/var_cadastro_cliente.php" method="POST">
                        <div class="input-group input-group-lg">                            
                            <input class="form-control" name="nome" placeholder="Nome" id="nome" type="text" size="30" onkeyup="maiuscula(this)">                                    
                            <span class="input-group-addon">
                                <i class="fa fa-user-o"></i>
                            </span>                  
                        </div>
                        <div class="input-group input-group-lg">
                            <input class="form-control" type="text" placeholder="Telefone" id="tel" name="tel" onkeypress='return SomenteNumero(event)'>
                            <span class="input-group-addon">
                                <i class="fa fa-volume-control-phone"></i>
                            </span>                                    
                        </div>
                        <div class="input-group input-group-lg">
                            <input class="form-control" type="text" placeholder="CPF" id="cpf" name="cpf" onkeyup="maiuscula(this)">
                            <span class="input-group-addon">
                                <i class="fa fa-vcard-o"></i>
                            </span>                                    
                        </div>
                        <div class="input-group input-group-lg">                            
                            <input class="form-control form-inline" type="text" placeholder="Rua" id="rua" name="rua" onkeyup="maiuscula(this)">
                            <span class="input-group-addon">
                                <i class="fa fa-home"></i>
                            </span>
                        </div>
                        <div class="input-group form-inline input-group-lg ">    
                            <input class="form-control" type="text" placeholder="Bairro" id="bairro" name="bairro" onkeyup="maiuscula(this)"> 
                            <span class="input-group-addon">
                                <i class="fa fa-home"></i>
                            </span>                      

                            <input class="form-control" type="text" placeholder="Numero" id="numero" name="numero" onkeypress='return SomenteNumero(event)'>
                            <span class="input-group-addon">
                                <i class="fa fa-home"></i>
                            </span>                                    
                        </div>
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
                
                <br>   
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>

        </div>
    </div>
</div>

