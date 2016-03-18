<?php 
    include("../connection.php");
    include("../models/inmueble.php");
    $v = Inmueble::obtDetalle($_GET['id']);
    $img = array();
    $img = Inmueble::obtImagenes($v->id);
?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <h2><li class="active"><?php print $v->nombre;?></li></h2>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-8">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                    <?php
                        $i = 0;
                        foreach($img as $im)
                        {
                            if($i == 0)
                                print "<li data-target='#carousel-example-generic' data-slide-to='0' class='active'></li>";
                            else
                                print "<li data-target='#carousel-example-generic' data-slide-to='".$i."' class='active'></li>";
                            $i += 1;
                        } 
                    ?>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <?php
                            $i = 0;
                            foreach($img as $im)
                            {
                                if($i == 0)
                                {
                                    print "<div class='item active'>";
                                        print "<img class='img-responsive' src='../assets/img/inmuebles/" . $im['foto'] . "' />";
                                    print "</div>";    
                                }
                                else
                                {
                                    print "<div class='item'>";
                                        print "<img class='img-responsive' src='../assets/img/inmuebles/" . $im['foto'] . "' />";
                                    print "</div>";
                                }
                                $i += 1;
                            } 
                        ?>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
                <br>
                
            <div class="btndetalle">    
                
                <a href="index.php?pag=vendedores"><input type="submit" class="btn btn-lg btn-success" value="Contactar con  Nuestros Asesores"></a>
                <a href="index.php"><input type="submit" class="btn btn-lg btn-danger" value="regresar"></a>
                
            </div>    
            </div>

            <div class="col-md-4">
                <h2><?php print $v->nombre;?></h2>
                <p class="text-justify"><?php print $v->descripcion;?></p>
                <h3>Caracteristicas</h3>
                <ul>
                    <li>Habitaciones: <?php print $v->habitaciones; ?></li>
                    <li>Baños: <?php print $v->baños; ?></li>
                    <li>Puestos de Estacionamiento: <?php print $v->estacionamiento; ?></li>
                </ul>
                    <h2>Precio: <strong><?php print $v->precio; ?></strong></h2>

            </div>

        </div>
        <!-- /.row -->

        <!-- Related Projects Row
        <div class="row">

            <div class="col-lg-12">
                <h3 class="page-header">Related Projects</h3>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive img-hover img-related" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive img-hover img-related" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive img-hover img-related" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive img-hover img-related" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>