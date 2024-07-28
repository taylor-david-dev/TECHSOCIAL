<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb text-xs">
            <li><a href="<?php echo base_url(); ?>home">Home</a>
            </li>
            <li><a href="#">Usuário</a>
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
                    <i class="fa fa-table fa-fw"></i> Lista de Usuários
                </h4>
                <!--<p class="margin-none text-xs text-muted">Advanced Tables</p>-->
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover"
                           id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Primeiro Nome</th>
                                <th>Sobrenome</th>
                                <th>Documento</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>Data Nascimento</th>
                                <th>Criado em</th>
                                <th>Atualizado em</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $cor = 'odd';
                            foreach ($vList as $list) {
                                //print_r($lista);exit;
                                if ($cor == 'odd') {
                                    $cor = 'even';
                                } else {
                                    $cor = 'odd';
                                }
                                ?>
                                <tr class="<?php echo $cor; ?>">
                                    <td><?php echo $list->first_name ?></td>
                                    <td><?php echo $list->last_name ?></td>
                                    <td><?php echo $list->document ?></td>
                                    <td><?php echo $list->email ?></td>
                                    <td><?php echo $list->phone_number ?></td>
                                    <td><?php echo implode("/", array_reverse(explode("-", $list->birth_date))) ?></td>
                                    <td><?php 
                                            // Cria um objeto DateTime a partir da data e hora MySQL
                                            $dataHora = new DateTime($list->created_at);
                                            // Formata a data e hora para o formato PT-BR
                                            $dataHoraPTBR = $dataHora->format('d/m/Y H:i:s');
                                            echo $dataHoraPTBR;
                                    ?></td>
                                    <td><?php 
                                        if($list->updated_at != '0000-00-00 00:00:00'){
                                            // Cria um objeto DateTime a partir da data e hora MySQL
                                            $dataHora = new DateTime($list->updated_at);
                                            // Formata a data e hora para o formato PT-BR
                                            $dataHoraPTBR = $dataHora->format('d/m/Y H:i:s');
                                            echo $dataHoraPTBR;
                                        }
                                    ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>user/alterId/<?php echo $list->id ?>" class="btn btn-info btn-circle"><i class="fa fa-list"></i></a>
                                        <a href="javascript:confirma('<?php echo base_url(); ?>user/delete/<?php echo $list->id ?>');" target="_self" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <thead>
                            <tr>
                                <td colspan="9"><center><strong>Registros Encontrados : <?php echo count($vList); ?></center></td>
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