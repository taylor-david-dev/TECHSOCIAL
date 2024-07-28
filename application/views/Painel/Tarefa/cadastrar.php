<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb text-xs">
            <li><a href="<?php echo base_url(); ?>home">Home</a>
            </li>
            <li><a href="#">Tarefa</a>
            </li>
            <li class="active">Cadastrar</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="margin-none">
                    <i class="fa fa-th fa-fw"></i> Cadastro de Tarefa
                </h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" method="post" action="<?php echo base_url(); ?>tarefa/doCadastrar" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Cliente :</label> 
                                <input class="form-control cur" readonly="readonly" data-toggle="modal" data-target="#myModalCliente" id="nome_cliente"name="nome_cliente" placeholder="Nome do Cliente">
                                <input type="hidden" id="cliente_id" class="form-control" name="cliente_id">
                            </div>
                            <div class="form-group">
                                <label>Tipo de Serviço :</label> 
                                <input class="form-control cur" readonly="readonly" data-toggle="modal" data-target="#myModal" id=nome_servico name="nome_servico" placeholder="Tipo de Serviço">
                                <input type="hidden" id="servico_id" class="form-control" name="servico_id">
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon">R$</span>
                                <input type="text" class="form-control" name="valor" onKeyPress="tamanhoTeste(this,event)" onKeyDown="backspace(this,event)" >
                            </div>
                            <div class="form-group">
                                <label>Titulo :</label> <input class="form-control" name="titulo" placeholder="Titulo">
                                <!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>
                            <div class="form-group">
                                <label>Data/Hora :</label> <input class="form-control date" name="dataHora" id="datetimepicker_mask" placeholder="Data / Hora">
                            </div>
                            <div class="form-group">
                                <label>Descrição :</label>
                                <textarea class="form-control" name="descricao">
									
                                </textarea>
                            </div>
                            <div class="possition-btn-form">
                                <button type="submit" class="btn btn-danger">Enviar</button>
                                <button type="reset" class="btn btn-default">Resetar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">Busca - Tipos de serviços</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Informe o Código do Serviço :</label> <input class="form-control" id="cod_servico" name="cod_servico" placeholder="Cod. Serviço">
                </div>
                <hr>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover"
                           id="dataTables-example">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Cod</th>
                                <th>Nome</th>
                            </tr>
                        </thead>
                        <tbody id="result_service">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            </div>
        </div>

    </div>
</div>


<div id="myModalCliente" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">Busca - Lista de Clientes</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Informe o Nome do Cliente :</label> <input class="form-control" id="nome_cliente_busca" name="nome_cliente_busca" placeholder="Nome Cliente">
                </div>
                <hr>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover"
                           id="dataTables-example">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Cpf / Cnpj</th>
                                <th>Telefone</th>
                            </tr>
                        </thead>
                        <tbody id="result_client">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            </div>
        </div>

    </div>
</div>
