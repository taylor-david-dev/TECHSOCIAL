<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb text-xs">
            <li><a href="<?php echo base_url(); ?>home">Home</a>
            </li>
            <li><a href="#">Usuário</a>
            </li>
            <li class="active">Cadastro</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="margin-none">
                    <i class="fa fa-th fa-fw"></i> Cadastro de Usuário
                </h4>
                <!-- <p class="margin-none text-xs text-muted">Default bootstrap form
                        elements</p> -->
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" method="post" action="<?php echo base_url(); ?>user/doRegister" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Primeiro nome :</label> <input class="form-control" name="first_name" placeholder="Primeiro nome" value="">
                                <!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>
                            <div class="form-group">
                                <label>Sobrenome :</label> <input class="form-control" name="last_name" placeholder="Sobrenome" value="">
                                <!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>
                            <div class="form-group">
                                <label>CPF/RG :</label> <input class="form-control" name="document" placeholder="CPF/RG" value="">
                                <!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>
                            <div class="form-group">
                                <label>Email :</label> <input class="form-control" name="email" placeholder="Email" type="email" value="">
                            </div>
                            <div class="form-group">
                                <label>Numero Telefone :</label> <input class="form-control" name="phone_number" placeholder="(xx) xxxx-xxxx" value="">
                            </div>
                            <div class="form-group">
                                <label>Data Nascimento :</label> <input class="form-control" name="birth_date" type="date" placeholder="Data Nascimento" value="">
                            </div>
                            
                            <div class="form-group">
                                <label>Senha :</label> <input class="form-control" type="password" name="password" placeholder="Password" value="">
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
