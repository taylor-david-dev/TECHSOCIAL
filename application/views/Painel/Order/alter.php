<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb text-xs">
            <li><a href="<?php echo base_url(); ?>home">Home</a>
            </li>
            <li><a href="#">Pedidos</a>
            </li>
            <li class="active">Alterar</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="margin-none">
                    <i class="fa fa-th fa-fw"></i> Alteração de Pedido
                </h4>
                <!-- <p class="margin-none text-xs text-muted">Default bootstrap form
                        elements</p> -->
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" method="post" action="<?php echo base_url(); ?>order/doAlter" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $vList->id; ?>">
                            <div class="form-group">
                                <label>Selecione o Usuário :</label> 
                                <input class="form-control cur" readonly="readonly" data-toggle="modal" data-target="#myModal" id="user_id_1" name="user_id_1" placeholder="Abrir janela de usuários" value="<?php echo $vList->first_name . ' ' . $vList->last_name; ?>">
                                <input type="hidden" id="user_id" class="form-control" name="user_id" value="<?php echo $vList->user_id; ?>">
                            </div>
                            
                            <div class="form-group">
                                <label>Quantidade :</label> <input class="form-control" name="quantity" placeholder="0" type="number" value="<?php echo $vList->quantity; ?>" >
                            </div>
                            
                            <div class="form-group">
                                <label>Valor :</label> <input class="form-control" name="price" placeholder="R$" onKeyPress="tamanhoTeste(this, event)" onKeyDown="backspace(this, event)" value="<?php echo $vList->price; ?>" >
                            </div>
                            
                            <div class="form-group">
                                <label>Descrição :</label> <input class="form-control" name="description" placeholder="Desc" value="<?php echo $vList->description; ?>">
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
                <h4 class="modal-title text-center">Busca - Usuários</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Informe o Nome do usuário :</label> <input class="form-control" id="user_name" name="user_name" placeholder="">
                </div>
                <hr>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover"
                           id="dataTables-example">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Sobrenome</th>
                            </tr>
                        </thead>
                        <tbody id="result_user">

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

