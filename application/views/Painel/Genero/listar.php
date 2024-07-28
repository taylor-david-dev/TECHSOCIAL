<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb text-xs">
			<li><a href="<?php echo base_url();?>home">Home</a>
			</li>
			<li><a href="#">Generos</a>
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
					<i class="fa fa-table fa-fw"></i> Lista de Generos
				</h4>
				<!--<p class="margin-none text-xs text-muted">Advanced Tables</p>-->
			</div>

			<?php if($valida == 'true') { ?>
                  <div class="alert alert-success alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Cadastro realizado com sucesso.
                  </div>
            <?php }else if($valida == 'false'){ ?>                   
                  <div class="alert alert-danger alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       		Ocorreu um erro, favor tente novamente.
                  </div>
             <?php }else if($valida == 'trueExcluir'){ ?>  
	             <div class="alert alert-success alert-dismissable">
	             	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	              	Exclussão realizada com sucesso.
	             </div>
              <?php }else if($valida == 'trueAlterado') { ?>
                  <div class="alert alert-success alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Alteração realizada com sucesso.
                  </div>
            <?php } ?>     
		 
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover"
						id="dataTables-example">
						<thead>
							<tr>
								<th>Cod</th>
								<th>Nome</th>
								<th>Tipo</th>
								<th>Opções</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$cor = 'odd';
								foreach ($vLista as $lista) { 
								if($cor == 'odd'){
									$cor = 'even';
								}else{
									$cor ='odd';
								}
								?>
								<tr class="<?php echo $cor; ?>">
									<td><?php echo $lista->cod ?></td>
									<td><?php echo $lista->nome ?></td>
									<td><?php 
                                                                            if($lista->tipo){ ?>
                                                                                Custo
                                                                            <?php }else{ ?>
                                                                                Lucro
                                                                            <?php } ?>
                                                                        
                                                                        </td>
									<td>
										<a href="<?php echo base_url();?>genero/alterar/<?php echo $lista->id ?>" class="btn btn-info btn-circle"><i class="fa fa-list"></i></a>
                                		<a href="javascript:confirma('<?php echo base_url();?>genero/excluir/<?php echo $lista->id ?>');" target="_self" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>
                                	</td>
								</tr>
							<?php } ?>
						</tbody>
						<thead>
							<tr>
								<td colspan="5"><center><strong>Registros Encontrados : <?php echo count($vLista); ?></strong></center></td>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script language="javascript">
	function confirma(url){
		if(confirm("Confirma Operação?")){
			document.location.href = url;
		}
	}
</script>