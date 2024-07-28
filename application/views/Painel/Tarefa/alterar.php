<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb text-xs">
			<li><a href="<?php echo base_url();?>home">Home</a>
			</li>
			<li><a href="#">Tarefa</a>
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
					<i class="fa fa-th fa-fw"></i> Alterar registro da Tarefa
				</h4>
				<!-- <p class="margin-none text-xs text-muted">Default bootstrap form
					elements</p> -->
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-12">
						<form role="form" method="post" action="<?php echo base_url();?>tarefa/doAlterar" enctype="multipart/form-data">
							<input type="hidden" name="id" value="<?php echo $vTarefa[0]->id; ?>">
							<div class="form-group">
								<label>Cliente :</label> 
								<?php 
									foreach ($vCliente as $cliente) {
										if($cliente->id == $vTarefa[0]->cliente_id){ ?>
										<input class="form-control cur" readonly="readonly" data-toggle="modal" data-target="#myModalCliente" id="nome_cliente"name="nome_cliente" placeholder="Nome do Cliente" value="<?php echo $cliente->nome; ?>">
										<input type="hidden" id="cliente_id" value="<?php echo $cliente->id; ?>" class="form-control" name="cliente_id">
								 <?php }
									}
								?>
								
								
							</div>
							<div class="form-group">
								<label>Tipo de Serviço :</label> 
								<?php 
									foreach ($vServico as $servico) {
										if($servico->id == $vTarefa[0]->servico_id){ ?>
											<input class="form-control cur" readonly="readonly" data-toggle="modal" data-target="#myModal" id=nome_servico name="nome_servico" placeholder="Tipo de Serviço" value="<?php echo $servico->nome; ?>">
											<input type="hidden" id="servico_id" value="<?php echo $servico->id; ?>" class="form-control" name="servico_id">
		
									<?php }
										}
									?>
							</div>
                                                        <div class="form-group input-group">
                                                            <span class="input-group-addon">R$</span>
                                                            <input type="text" class="form-control" name="valor" value="<?php echo number_format($vTarefa[0]->valor, 2, ",", "."); ?>" onKeyPress="tamanhoTeste(this,event)" onKeyDown="backspace(this,event)" >
                                                        </div>
							<div class="form-group">
								<label>Titulo :</label> <input class="form-control" name="titulo" placeholder="Titulo" value="<?php echo $vTarefa[0]->titulo; ?>">
								<!-- <p class="help-block">Example block-level help text here.</p> -->
							</div>
							<div class="form-group">
							<?php 
								$gamb = explode(" ", $vTarefa[0]->dataHora);
								$time = implode("/",array_reverse(explode("-",$gamb[0])));
							    $time = $time .' '.$gamb[1];
							?>
								<label>Data/Hora :</label> <input class="form-control" id="datetimepicker_mask" name="dataHora" placeholder="Data / Hora" value="<?php echo $time ?>">
							</div>
							<div class="form-group">
								<label>Descrição :</label> <textarea class="form-control" name="descricao" placeholder="Descrição"><?php echo utf8_decode($vTarefa[0]->descricao); ?></textarea>
								
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
