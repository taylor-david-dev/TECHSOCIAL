<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb text-xs">
            <li><a href="<?php echo base_url(); ?>home">Home</a>
            </li>
            <li><a href="#">Turmas</a>
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
                    <i class="fa fa-th fa-fw"></i> Cadastro de Turma
                </h4>
                <!-- <p class="margin-none text-xs text-muted">Default bootstrap form
                        elements</p> -->
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" method="post" action="<?php echo base_url(); ?>turma/doCadastrar" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nome :</label> <input class="form-control" name="nome" placeholder="Nome">
                            </div>
                            <div class="form-group">
                                <label>Inicio :</label> <input class="form-control date" name="inicio" value="<?php echo date('d/m/Y') ?> 10:00" id="datetimepicker_mask" placeholder="Data / Hora">
                            </div>
                            <div class="form-group">
                                <label>Adicionar Gênero :</label> <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-info btn-circle"><i class="fa fa-check"></i></button>
                            </div>
                            <div id="lista_genero">
                            </div>
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
                    <label>Informe o Código do Gênero :</label> <input class="form-control" id="cod_genero" name="cod_genero" placeholder="Cod. Gênero">
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

