<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>home">
                                <span class="sidebar-item-icon fa-stack">
                                    <i class="fa fa-square fa-stack-2x text-primary"></i>
                                    <i class="fa fa-dashboard fa-stack-1x fa-inverse"></i>
                                </span>
                                <span class="sidebar-item-title">Dashboard - ADM</span>
                                <span class="sidebar-item-subtitle">Resumo das Aplicações</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="sidebar-item-icon fa-stack">
                                    <i class="fa fa-square fa-stack-2x text-primary"></i>
                                    <i class="fa fa-user fa-stack-1x fa-inverse"></i>
                                </span>
                                <span class="sidebar-item-arrow fa arrow"></span>
                                <span class="sidebar-item-title">Usuários</span>
                                <span class="sidebar-item-subtitle">Cadastrar/Listar/Alterar</span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url(); ?>user/register">Cadastrar</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>user/listing">Listar</a>
                                </li>
                            </ul>
                        </li>
                        
                        <li>
                            <a href="#">
                                <span class="sidebar-item-icon fa-stack ">
                                    <i class="fa fa-square fa-stack-2x text-primary"></i>
                                    <i class="fa fa-dollar fa-stack-1x fa-inverse"></i>
                                </span>
                                <span class="sidebar-item-arrow fa arrow"></span>
                                <span class="sidebar-item-title">Pedidos</span>
                                <span class="sidebar-item-subtitle">Cadastrar/Listar/Alterar</span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url(); ?>order/register">Cadastrar</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>order/listing">Listar</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
        </ul>
    </div>
</div>