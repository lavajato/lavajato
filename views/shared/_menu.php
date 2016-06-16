<?php use\senac\lavajato\AppConfig; ?>

<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
	                <img alt="image" class="img-circle" src="<?php AppConfig::pegarAsset('img/profile_small.jpg') ?>" />
                             </span>
                    <a href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Lucílvio Lima</strong>
                             </span> <span class="text-muted text-xs block"> Administrador </span> </span>
                    </a>
                </div>
                <div class="logo-element">
                    LJ
                </div>
            </li>

            <li>
                <a href="<?php AppConfig::rota('/Principal'); ?>"><i class="fa fa-home"></i> <span class="nav-label"> Principal </span></a>
            </li>

            <li>
                <a href="<?php AppConfig::rota('/Usuarios'); ?>"><i class="fa fa-user"></i> <span class="nav-label"> Usuários </span></a>
            </li>

            <li>
                <a href="#"><i class="fa fa-users"></i> <span class="nav-label"> Clientes </span></a>
            </li>

            <li>
                <a href="#"><i class="fa fa-car"></i> <span class="nav-label"> Veículos </span></a>
            </li>

            <li>
                <a href="#"><i class="fa fa-gears"></i> <span class="nav-label"> Serviços </span></a>
            </li>

            <li>
                <a href="#"><i class="fa fa-list-alt"></i> <span class="nav-label"> Tipos de Veículo </span></a>
            </li>

            <li>
                <a href="#"><i class="fa fa-calendar"></i> <span class="nav-label"> Agenda </span></a>
            </li>
        </ul>

    </div>
</nav>