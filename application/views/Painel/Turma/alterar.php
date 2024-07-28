<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb text-xs">
			<li><a href="<?php echo base_url();?>home">Home</a>
			</li>
			<li><a href="#">Turmas</a>
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
					<i class="fa fa-th fa-fw"></i> Alterar registro da Turma
				</h4>
				<!-- <p class="margin-none text-xs text-muted">Default bootstrap form
					elements</p> -->
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-12">
						<form role="form" method="post" action="<?php echo base_url();?>turma/doAlterar" enctype="multipart/form-data">
							<input type="hidden" name="id" value="<?php echo $vCliente[0]->id; ?>">
							<div class="form-group">
								<label>Nome :</label> <input class="form-control" name="nome" placeholder="Nome" value="<?php echo $vCliente[0]->nome; ?>">
								<!-- <p class="help-block">Example block-level help text here.</p> -->
							</div>
                                                        <div class="form-group">
                                                            <?php
                                                                    $gamb = explode(" ", $vCliente[0]->inicio);
                                                                    $inicio = implode("/", array_reverse(explode("-", $gamb[0])));

                                                                    $clock = explode(":", $gamb[1]);
                                                                    $inicio = $inicio . ' ' . $clock[0] . ':' . $clock[1] . ':' . $clock[2];
                                                            ?>
                                                            <label>Inicio :</label> <input class="form-control date" name="inicio" value="<?php echo $inicio ?>" id="datetimepicker_mask" placeholder="Data / Hora">
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
