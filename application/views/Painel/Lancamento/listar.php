<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb text-xs">
            <li><a href="<?php echo base_url(); ?>home">Home</a>
            </li>
            <li><a href="#">Lançamento</a>
            </li>
            <li class="active">Listar</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="margin-none">
                    <i class="fa fa-table fa-fw"></i> Lista de Lançamento
                </h4>
                <!--<p class="margin-none text-xs text-muted">Advanced Tables</p>-->
            </div>

            <?php if ($valida == 'true') { ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Cadastro realizado com sucesso.
                </div>
            <?php } else if ($valida == 'false') { ?>                   
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Ocorreu um erro, favor tente novamente.
                </div>
            <?php } else if ($valida == 'trueExcluir') { ?>  
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Exclussão realizada com sucesso.
                </div>
            <?php } else if ($valida == 'trueAlterado') { ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Alteração realizada com sucesso.
                </div>
            <?php } ?>     

            <div class="row">
                <div class="col-lg-6" style="margin: 0 auto;    display: flex;    padding: 15px;    float: left;    margin-left: 16px;">
                    <form role="form" method="post" action="<?php echo base_url(); ?>lancamento/doPesquisar" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Data Inicial :</label> <input class="form-control" type="date" name="dataInicial" placeholder="Data Inicial">
                            <label>Data Final :</label> <input class="form-control" type="date" name="DataFinal" placeholder="Data Final">
                        </div>
                        <div class="possition-btn-form">
                            <a href="<?php echo base_url(); ?>lancamento/listar" class="btn btn-default">Resetar Busca</a>
                            <button type="submit" class="btn btn-danger">Filtrar</button>
                        </div>
                    </form>
                </div>
            </div>


            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover"
                           id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Genero</th>
                                <th>Obs</th>
                                <th>Valor</th>
                                <th>Data Vencimento</th>
                                <th>Tipo Lançamento</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            $cor = 'odd';
                            $validPayment = '';
                            foreach ($vLista as $lista) {
                                //print_r($lista);exit;
                                if ($cor == 'odd') {
                                    $cor = 'even';
                                } else {
                                    $cor = 'odd';
                                }


                                if ($lista->lan_status) {
                                    $validPayment = '#3192e6';
                                } else {
                                    $validPayment = '';
                                }
                                ?>
                                <tr class="<?php echo $cor; ?>" style="color: <?php echo $validPayment ?>;">
                                    <td><?php echo $lista->genero ?></td>
                                    <td><?php echo $lista->nome ?></td>
                                    <td><?php
                                        $total = $total + $lista->valor;
                                        echo $lista->valor
                                        ?></td>
                                    <td><?php echo implode("/", array_reverse(explode("-", $lista->data_vencimento))) ?></td>
                                    <td><?php echo ($lista->tipo == 1 ? "Custo" : "Lucro" ); ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>lancamento/alterar/<?php echo $lista->id ?>" class="btn btn-info btn-circle"><i class="fa fa-list"></i></a>
                                        <?php if (!$lista->lan_status) { ?>
                                            <a href="javascript:confirmaPayment('<?php echo base_url(); ?>lancamento/pagamento/<?php echo $lista->id ?>');" target="_self" class="btn btn-default btn-circle"><i class="fa fa-arrow-up"></i></a>
    <?php } ?>
                                        <a href="javascript:confirma('<?php echo base_url(); ?>lancamento/excluir/<?php echo $lista->id ?>');" target="_self" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
<?php } ?>
                        </tbody>
                        <thead>
                            <tr>
                                <td colspan="5"><center><strong>Registros Encontrados : <?php echo count($vLista); ?></center></td>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script language="javascript">
    function confirma(url) {
        if (confirm("Confirma Operação?")) {
            document.location.href = url;
        }
    }

    function confirmaPayment(url) {
        if (confirm("Confirma Pagamento?")) {
            document.location.href = url;
        }
    }
</script>