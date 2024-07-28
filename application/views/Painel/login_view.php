<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="cache-control" content="no-cache" />
        <meta http-equiv="cache-control" content="no-store" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Taylor David">

        <title>.: TECHSOCIAL - PROCESSO SELETIVO I DESENVOLVEDOR PHP :.</title>
        
        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url(); ?>application/css/bootstrap.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?php echo base_url(); ?>application/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo base_url(); ?>application/css/smartech.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo base_url(); ?>application/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- Animate CSS -->
        <link href="<?php echo base_url(); ?>application/css/animate.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>application/css/application-524678b18250ea0af928b0f8c73d6d99.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>application/css/premium-fcf4bc6c4f870059573d48e9e49fdd02.css" rel="stylesheet">
        <style>#ariesHeadingLink{background: none;}</style>
    </head>

    <body>

        <div style="display:block;width: 380px;margin: 5% auto;height: 280px;background: #29282f;overflow-y: hidden;-webkit-box-shadow: 0px 0px 5px 1px rgba(255,255,255,1);-moz-box-shadow: 0px 0px 5px 1px rgba(255,255,255,1);box-shadow: 0px 0px 5px 1px rgba(255,255,255,1);">
                <div class="panel-heading" style="background: #29282f;border-color: #29282f;color:#fff;">
                    <h3 class="panel-title">Olá, que bom vê-lo aqui! :)</h3>
                </div>
            <span class="espaco_login"></span>
                <div class="panel-body" style="background: #29282f;height: 246px;float: left; width: 100%; border: none!important">
                    <?php echo validation_errors(); ?>
                    <form action="<?php echo base_url(); ?>verifylogin" method="post">
                        <fieldset>
                            <div class="form-group">
                                <label>
                                    Informe o e-mail
                                </label>
                                <input class="form-control" placeholder="Email" name="email" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <label>
                                    Informe a senha
                                </label>
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                            <input type="submit" class="btn btn-lg btn-success" style="float: right;" value="Logar">
                        </fieldset>
                    </form>
                </div>
        </div>
        <!-- jQuery Version 1.11.0 -->
        <script src="<?php echo base_url(); ?>application/js/jquery-1.11.0.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url(); ?>application/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?php echo base_url(); ?>application/js/plugins/metisMenu/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->

    </body>
</html>