<div class="row border-bottom">
    <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>

        <ul class="nav navbar-top-links navbar-right">
            <li>
                <a href="login.html">
                    <i class="fa fa-sign-out"></i> Sair
                </a>
            </li>
        </ul>
    </nav>
</div>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2> <?php echo isset($iconeDoFormulario) ? '<i class="fa ' . $iconeDoFormulario . ' fa-4"> </i> &nbsp;' : "" ?> <?php echo isset($tituloDoFormulario) ? $tituloDoFormulario : "" ?> </h2>
        
        <ol class="breadcrumb">
            <li>
                <p> Lava jato </p>
            </li>

            <?php
                $url = explode("/", $_REQUEST["url"]);

                foreach ($url as $path) {
                    if(!next($url)) {
                        echo "<li class='active'> <strong> $path </strong> </li>";
                    }
                    else {
                        echo "<li> $path </li>";
                    }
                }
            ?>
        </ol>
    </div>
</div>