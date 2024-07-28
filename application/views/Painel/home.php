    
<?php 
    //echo "<script>alert(".$user['tipo'].");</script>"; 
?>

<!--<div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb text-xs">
                <li><a href="#">Home</a></li>
                <li class="active">Dashboard</li>
            </ol>

            <div class="panel panel-primary">
                <div class="panel-body">
                     <div class="pull-right">
                            <p class="text-right text-uppercase text-muted text-xs margin-none">Statistics</p>
                            <div id="page-title-statistics"></div>
                    </div> 
                    <h5 class="text-uppercase margin-none">
                        <i class="fa fa-dashboard"></i> Dashboard2
                    </h5>
                </div>
            </div>

            <div class="row">
            </div>

            <div class="row">
            </div>
        </div>
    </div>-->


<div>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb text-xs">
                <li><a href="#">Home</a></li>
                <li class="active">Dashboard</li>
            </ol>

            <div class="panel panel-primary">
                <div class="panel-body">
                    <!-- <div class="pull-right">
                            <p class="text-right text-uppercase text-muted text-xs margin-none">Statistics</p>
                            <div id="page-title-statistics"></div>
                    </div> -->
                    <h5 class="text-uppercase margin-none">
                        <i class="fa fa-dashboard"></i> Dashboard
                    </h5>
                    <p class="text-muted text-xs margin-none">Resumo das Aplicações FINANCEIRAS</p>
                </div>
            </div>

<!--            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="demo-container">
                                <div id="placeholder" class="demo-placeholder"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->

        </div>
    </div>

</div>
<!-- /.social-block -->


<div class="row">
    <div class="col-sm-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="margin-none">
                    <i class="fa fa-money fa-fw"></i> Lucro x Custo Mes Atual
                </h4>
                <p class="margin-none text-xs text-muted">Quantidade Lançamentos</p>
            </div>
            <div class="panel-body">
                <div class="list-group">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $total = 0;
                                
                                //print_r($lucroXcusto);exit;
                                foreach ($lucroXcusto as $lista_v) { ?>
                                    <tr>
                                        <td><?php echo $lista_v[0] ?></td> 
                                        <td>R$ <?php echo $lista_v[1] ?></td>
                                    </tr>
                                <?php 
                                } 
                                
                                $cus = (float)str_replace('.', ',' , $lucroXcusto[0][1]);
                                $luc = (float)str_replace('.', ',' , $lucroXcusto[1][1]);
                                
                                $total = (float)$luc - $cus.'.00';
                                $totalACalcular = (float)$luc - $cus;
                                ?>
                                    
                                    <tr>
                                        <td><strong>TOTAL:</strong></td> 
                                        <td><strong>R$ <?php echo $total; ?></strong></td>
                                    </tr>
                                    
                            </tbody>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-sm-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="margin-none">
                    <i class="fa fa-money fa-fw"></i> Lucro x Custo Proximo Mes
                </h4>
                <p class="margin-none text-xs text-muted">Quantidade Lançamentos</p>
            </div>
            <div class="panel-body">
                <div class="list-group">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $totalx = 0;
                                
                                //print_r($lucroXcusto);exit;
                                foreach ($lucroXcustoNext as $lista_vx) { ?>
                                    <tr>
                                        <td><?php echo $lista_vx[0] ?></td> 
                                        <td>R$ <?php echo $lista_vx[1] ?></td>
                                    </tr>
                                <?php 
                                } 
                                
                                $cus = (float)str_replace('.', ',' , $lucroXcustoNext[0][1]);
                                $luc = (float)str_replace('.', ',' , $lucroXcustoNext[1][1]);
                                
                                $totalx = (float)$luc - $cus.'.00';
                                ?>
                                    
                                    <tr>
                                        <td><strong>TOTAL:</strong></td> 
                                        <td><strong>R$ <?php echo $totalx; ?></strong></td>
                                    </tr>
                                    
                            </tbody>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="margin-none">
                    <i class="fa fa-money fa-fw"></i> Lucro x Custo - Quantidade em Caixa
                </h4>
                <p class="margin-none text-xs text-muted">Lançamentos Pagos/Recebidos</p>
            </div>
            <div class="panel-body">
                <div class="list-group">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>A Pagar</th>
                                    <th>Já Pago</th>
                                    <th>A Receber</th>
                                    <th>Já Recebeu</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                    
                                    <tr>
                                        <td><?= $lucroXcustoMes['aPagar'] ?></td>
                                        <td><?= $lucroXcustoMes['jaPago'] ?></td>
                                        <td><?= $lucroXcustoMes['aReceber'] ?></td>
                                        <td><?= $lucroXcustoMes['jaRebeu'] ?></td>
                                    </tr>
                                    
                                    
                                    
                            </tbody>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div id="piechart" style="height: 500px;"></div>
    </div>
    <div class="col-sm-6">
                <div class="list-group">
                    <div class="table-responsive">
                        <p><center style="font-weight: bold;">Lançamentos do Ano!</center></p>
                        
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $totalAno = 0;
                                foreach ($lancamentosAnuais as $lista_lancamentos) { 
                                    ?>
                                    <tr>
                                        <td><?php echo $lista_lancamentos->nome ?></td> 
                                        <td>R$ <?php 
                                        $totalAno = $totalAno + $lista_lancamentos->valor;
                                        echo $lista_lancamentos->valor; ?></td>
                                    </tr>
                                <?php 
                                } 
                                
                                ?>
                                
                                <tr>
                                    <td>TOTAL : </td>
                                    <td>R$ <?= number_format($totalAno,2,",","."); ?></td>
                                </tr>
                            </tbody>
                            </thead>
                        </table>
                    </div>
                </div>
    </div>
</div>

<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Lucro R$ <?= (float)str_replace('.', ',' , $lucroXcustoYear[1][1]) ?>.00',     <?= (float)str_replace('.', ',' , $lucroXcustoYear[1][1]) ?>],
          ['Custo R$ <?= (float)str_replace('.', ',' , $lucroXcustoYear[0][1]) ?>.00',     <?= (float)str_replace('.', ',' , $lucroXcustoYear[0][1]) ?>],
        ]);

        var options = {
          title: 'Lucro x Custo Ano Atual'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>