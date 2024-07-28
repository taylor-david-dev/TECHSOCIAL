<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb text-xs">
            <li><a href="<?php echo base_url(); ?>home">Home</a>
            </li>
            <li><a href="#">Conta</a>
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
                    <i class="fa fa-th fa-fw"></i> Alterar registro de Usuário
                </h4>
                <!-- <p class="margin-none text-xs text-muted">Default bootstrap form
                        elements</p> -->
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" method="post" action="<?php echo base_url(); ?>user/doAlter" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $vUser->id; ?>">
                            <div class="form-group">
                                <label>Primeiro nome :</label> <input class="form-control" name="first_name" placeholder="Primeiro nome" value="<?php echo $vUser->first_name; ?>">
                                <!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>
                            <div class="form-group">
                                <label>Sobrenome :</label> <input class="form-control" name="last_name" placeholder="Sobrenome" value="<?php echo $vUser->last_name; ?>">
                                <!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>
                            <div class="form-group">
                                <label>CPF/RG :</label> <input class="form-control" name="document" placeholder="CPF/RG" value="<?php echo $vUser->document; ?>">
                                <!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>
                            <div class="form-group">
                                <label>Email :</label> <input disabled class="form-control" name="email" placeholder="Email" value="<?php echo $vUser->email; ?>">
                            </div>
                            <div class="form-group">
                                <label>Numero Telefone :</label> <input disabled class="form-control" name="phone_number" placeholder="(xx) xxxx-xxxx" value="<?php echo $vUser->phone_number; ?>">
                            </div>
                            <div class="form-group">
                                <label>Data Nascimento :</label> <input disabled class="form-control" name="birth_date" placeholder="Data Nascimento" value="<?php echo $vUser->birth_date; ?>">
                            </div>
                            
                            <div class="form-group">
                                <label>Nova Senha :</label> <input class="form-control" type="password" name="password" placeholder="Password" value="">
                                <!-- <p class="help-block">Example block-level help text here.</p> -->
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
