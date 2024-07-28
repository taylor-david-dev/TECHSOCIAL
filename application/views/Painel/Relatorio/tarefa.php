<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb text-xs">
            <li><a href="<?php echo base_url(); ?>home">Home</a>
            </li>
            <li><a href="#">Relatorio</a>
            </li>
            <li class="active">Tarefa</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="margin-none">
                    <i class="fa fa-th fa-fw"></i> Gerar relatório em PDF das Tarefas
                </h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" method="post" action="<?php echo base_url(); ?>relatorio/doTarefa" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Cliente :</label> 
                                <input class="form-control cur" readonly="readonly" data-toggle="modal" data-target="#myModalCliente" id="nome_cliente"name="nome_cliente" placeholder="Nome do Cliente">
                                <input type="hidden" id="cliente_id" class="form-control" name="cliente_id">
                            </div>
                            <div class="form-group">
                                <label>Data Inicial :</label> <input class="form-control date adatetimepicker_mask" name="dataInicial" id="datepicker_mask" placeholder="Data Inicial">
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Data Final :</label> <input class="form-control date adatetimepicker_mask" name="dataFinal" id="datepicker_mask" placeholder="Data Final">
                                </div>
                                <div class="form-group">
                                    <label>Descrição :</label> <textarea class="form-control" name="descricao" placeholder="Descrição"></textarea>
                                </div>
                                <div class="possition-btn-form">
                                    <button type="submit" class="btn btn-danger">Gerar Relatório</button>
                                    <button type="reset" class="btn btn-default">Resetar</button>
                                </div>
                        </form>
                    </div>
                </div>
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
