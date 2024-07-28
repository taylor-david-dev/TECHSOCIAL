<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb text-xs">
			<li><a href="<?php echo base_url();?>home">Home</a>
			</li>
			<li><a href="#">Lancamento</a>
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
					<i class="fa fa-th fa-fw"></i> Alterar registro de Lancamento
				</h4>
				<!-- <p class="margin-none text-xs text-muted">Default bootstrap form
					elements</p> -->
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-12">
						<form role="form" method="post" action="<?php echo base_url();?>lancamento/doAlterar" enctype="multipart/form-data">
							<input type="hidden" name="id" value="<?php echo $vCliente[0]->id; ?>">
							<div class="form-group">
								<label>Obs :</label> <input class="form-control" name="nome" placeholder="Nome" value="<?php echo $vCliente[0]->nome; ?>">
								<!-- <p class="help-block">Example block-level help text here.</p> -->
							</div>
                                                        
							<div class="form-group">
                                                            <label>Valor :</label> <input class="form-control" name="valor" placeholder="R$" onKeyPress="tamanhoTeste(this, event)" onKeyDown="backspace(this, event)" value="<?php echo number_format($vCliente[0]->valor, 2, ",", "."); ?>" >
								<!-- <p class="help-block">Example block-level help text here.</p> -->
							</div>
                                                        <div class="form-group">
                                                            <label>Data Vencimento :</label> <input class="form-control date" name="dataHora_mensalidade" maxlength="10" value="<?php echo implode("/", array_reverse(explode("-", $vCliente[0]->data_vencimento))) ?>" id="datetimepicker_mask" placeholder="Data / Hora">
                                                        </div>
                                                        <div class="form-group">
								<label>Status :</label>
								<select class="form-control" name="lan_status">
									<option value="1" <?php if($vCliente[0]->lan_status == '1'){echo 'selected';}?>>Pago</option>
									<option value="0" <?php if($vCliente[0]->lan_status == '0'){echo 'selected';}?>>Nao Pago</option>
								</select>
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
