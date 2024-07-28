<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb text-xs">
			<li><a href="<?php echo base_url();?>home">Home</a>
			</li>
			<li><a href="#">Serviços</a>
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
					<i class="fa fa-th fa-fw"></i> Cadastro de Serviço
				</h4>
				<!-- <p class="margin-none text-xs text-muted">Default bootstrap form
					elements</p> -->
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-12">
						<form role="form" method="post" action="<?php echo base_url();?>servico/doCadastrar" enctype="multipart/form-data">
							<div class="form-group">
								<label>Cod. :</label> <input class="form-control" name="cod" placeholder="Cod">
							</div>
							<div class="form-group">
								<label>Nome :</label> <input class="form-control" name="nome" placeholder="Nome">
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

