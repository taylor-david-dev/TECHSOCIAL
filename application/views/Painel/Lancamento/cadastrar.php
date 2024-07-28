<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb text-xs">
            <li><a href="<?php echo base_url(); ?>home">Home</a>
            </li>
            <li><a href="#">Lançamento</a>
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
                    <i class="fa fa-th fa-fw"></i> Cadastro da Lançamento
                </h4>
                <!-- <p class="margin-none text-xs text-muted">Default bootstrap form
                        elements</p> -->
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" method="post" action="<?php echo base_url(); ?>lancamento/doCadastrar" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Selecione o Gênero :</label> 
                                <input class="form-control cur" readonly="readonly" data-toggle="modal" data-target="#myModal" id="genero_id_1" name="genero_id_1" placeholder="Abrir janela de genero">
                                <input type="hidden" id="genero_id" class="form-control" name="genero_id">
                            </div>
                            
                            <div class="form-group">
                                <label>Obs :</label> <input class="form-control" name="nome" placeholder="Obs">
                            </div>
                            
                            <div class="form-group">
                                <label>Valor :</label> <input class="form-control" name="valor" placeholder="R$" onKeyPress="tamanhoTeste(this, event)" onKeyDown="backspace(this, event)" >
                            </div>
                            
                            <div class="form-group">
                                <label>Data Vencimento :</label> <input class="form-control date" name="dataHora_mensalidade" maxlength="10" value="<?php echo date('d/m/Y') ?>" id="datetimepicker_mask" placeholder="Data / Hora">
                            </div>
<!--                            <div class="form-group">
                                <label>Adicionar Musica :</label> <button type="button" class="btn btn-info btn-circle addMusica"><i class="fa fa-check"></i></button>
                            </div>
                            <div id="lista_musica">
                            </div>-->
                            
                            
                            <div class="possition-btn-form">
                                <button type="submit" class="btn btn-danger">Enviar</button>
                                <button type="reset" class="btn btn-default">Resetar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>


<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">Busca - Tipos de Gêneros</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Informe o Nome do Gênero :</label> <input class="form-control" id="cod_genero2" name="cod_genero" placeholder="Cod. Gênero">
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
                                <th>Tipo</th>
                            </tr>
                        </thead>
                        <tbody id="result_genero">

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


<div id="myModal1" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">Busca - Bancos</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Informe o Nome do Banco :</label> <input class="form-control" id="cod_banco2" name="cod_banco" placeholder="Cod. Banco">
                </div>
                <hr>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover"
                           id="dataTables-example">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                            </tr>
                        </thead>
                        <tbody id="result_banco">

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

