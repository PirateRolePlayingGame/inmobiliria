<?php 
// include("../connection.php");
include("../models/inmueble.php");
// include("../models/landing.php");
$v = array();
$v = Inmueble::visto();
$img = Landing::vistoImg($v->id);
?>
<div class="col-lg-12">
                <h2 class="page-header">¡Mira esto!</h2>
            </div>
            <div class="col-md-6">
                <h3><p><a href="../detalle.php"><?php print $v->nombre; ?></a></p></h3>
                <ul>
                    <li><strong>Codigo: <?php print $v->codigo; ?> </strong></li>
                    <!-- <li>3 Habitaciones</li>  -->
                    <li><?php print $v->habitaciones; ?> Habitaciones</li>
                    <li>2 Baños</li>
                    <li><?php print $v->baños; ?> Baños</li>
                    <li><?php print $v->estacionamiento; ?> Puestos de estacionamiento</li>
                    <li><h1> <?php print $img; ?> </h1></li>
                </ul>
                <p><?php print $v->descripcion; ?></p>
            </div>
            <div class="col-md-6">
                <img class="img-responsive" src="../assets/img/inmuebles/<?php print $img; ?>" alt="<?php print $img; ?>">
            </div>