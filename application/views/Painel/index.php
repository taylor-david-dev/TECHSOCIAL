<!DOCTYPE html>
<?php
header('Access-Control-Allow-Origin: http://thinkdev.com.br'); 
?>
<html lang="en">
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Taylor David">

        <meta http-equiv="cache-control" content="no-cache" />
        <meta http-equiv="pragma" content="no-cache" />
        <meta http-equiv="cache-control"   content="no-store" />

        <title>.: Sistema Gestão Financeira :.</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url(); ?>application/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>application/css/plugins/social-buttons.css" rel="stylesheet">


        <!-- MetisMenu CSS -->
        <link href="<?php echo base_url(); ?>application/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="<?php echo base_url(); ?>application/css/plugins/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo base_url(); ?>application/css/smartech.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="<?php echo base_url(); ?>application/css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo base_url(); ?>application/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- Animate CSS -->
        <link href="<?php echo base_url(); ?>application/css/animate.css" rel="stylesheet">

        <!-- Customizado CSS -->
        <link href="<?php echo base_url(); ?>application/css/style.css" rel="stylesheet">

        <!-- Date Time Picker CSS -->
        <link href="<?php echo base_url(); ?>application/css/jquery.datetimepicker.css" rel="stylesheet">

        <style>
            #post-social-1{
                background-image: url('<?php echo base_url(); ?>application/img/image-8.jpg');
            }
            #post-social-2{
                background-image: url('<?php echo base_url(); ?>application/img/image-1.jpg');
            }
            #post-social-3{
                background-image: url('<?php echo base_url(); ?>application/img/image-3.jpg');
            }
            #post-social-4{
                background-image: url('<?php echo base_url(); ?>application/img/image-4.jpg');
            }
            #post-social-5{
                background-image: url('<?php echo base_url(); ?>application/img/image-5.jpg');
            }
            #post-social-6{
                background-image: url('<?php echo base_url(); ?>application/img/image-6.jpg');
            }
            #post-social-7{
                background-image: url('<?php echo base_url(); ?>application/img/image-7.jpg');
            }
            #post-social-8{
                background-image: url('<?php echo base_url(); ?>application/img/image-2.jpg');
            }

        </style>
        
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!--<a class="navbar-brand" href="<?php echo base_url(); ?>home" style="margin-left: 0px;"><i class="fa fa-empire" alt="Imperium System"></i> IMPERIUM SYSTEM</a> -->
<!--                    <a class="navbar-brand" href="<?php echo base_url(); ?>home" style="margin-left: 0px;"><img alt="" src="<?php echo base_url(); ?>application/img/logo-2014-png.png" style="height: 50px;"></a>-->
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="<?php echo base_url(); ?>user/alter"><i class="fa fa-user fa-fw"></i> Perfil Usuário</a>
                            </li>
<!--                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Configuração</a>
                            </li>-->
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url(); ?>home/logout" class="dropdown-button"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->

                </ul>
                <!-- /.navbar-top-links -->

                <?php
                $this->load->view('/Painel/menu.php');
                ?>


                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">
                <?php
                if (!isset($view_data))
                    $view_data = null;
                $this->load->view($view, $view_data);
                ?>
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <footer>
            <span>© 2018 Todos os direitos Reservados. <a href="http://taylordavid.com.br" target="_blank">TAYLOR DAVID</a></span>
        </footer>

        <!-- jQuery Version 1.11.0 -->
        <script src="<?php echo base_url(); ?>application/js/jquery-1.11.0.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url(); ?>application/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?php echo base_url(); ?>application/js/plugins/metisMenu/metisMenu.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="<?php echo base_url(); ?>application/js/plugins/morris/raphael.min.js"></script>
        <script src="<?php echo base_url(); ?>application/js/plugins/morris/morris.min.js"></script>
        <script src="<?php echo base_url(); ?>application/js/demo/dashboard.js"></script>

        <!-- Masonry JavaScript -->
        <script src="<?php echo base_url(); ?>application/js/plugins/masonry/masonry.js"></script>

        <!-- Sparkline JavaScript -->
        <script src="<?php echo base_url(); ?>application/js/plugins/sparkline/sparkline.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="<?php echo base_url(); ?>application/js/smartech.js"></script>

        <script src="<?php echo base_url(); ?>application/js/demo/index.js"></script>
        <script src="<?php echo base_url(); ?>application/js/jquery.datetimepicker.js"></script>
        <script src="<?php echo base_url(); ?>application/js/yui.js"></script>
        <script src="<?php echo base_url(); ?>application/js/cropbox.js"></script>
        <script src="<?php echo base_url(); ?>application/js/main.js"></script>

    </body>

</html>