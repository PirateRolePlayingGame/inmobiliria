
                <div class="col-md-4 ">
                    <div class="panel panel-default">
                      <!-- Default panel contents -->
                      <div class="panel-heading">Tipo de Inmueble</div>
                      <!-- List group -->
                      <?php
                        $cas = Landing::contar("idTipoInmueble", 1);
                        $apr = Landing::contar("idTipoInmueble", 2);
                        $ter = Landing::contar("idTipoInmueble", 3);
                        $loc = Landing::contar("idTipoInmueble", 4);
                        $th = Landing::contar("idTipoInmueble", 5); 
                        $ofc = Landing::contar("idTipoInmueble", 6);
                        $gal = Landing::contar("idTipoInmueble", 7);
                      ?>
                      <ul class="list-group">
                        <li class="list-group-item"><a href="index.php?pag=casas">Casas</a><span class="badge"><?php print $cas; ?></span></li>
                        <li class="list-group-item"><a href="index.php?pag=apartamentos">Apartamentos</a><span class="badge"><?php print $apr; ?></span></li>
                        <li class="list-group-item"><a href="index.php?pag=terrenos">Terrenos</a><span class="badge"><?php print $ter; ?></span></li>
                        <li class="list-group-item"><a href="index.php?pag=townhouse">Townhouse</a><span class="badge"><?php print $th; ?></span></li>
                        <li class="list-group-item"><a href="index.php?pag=local">Local</a><span class="badge"><?php print $loc; ?></span></li>
                        <li class="list-group-item"><a href="index.php?pag=oficina">Oficina</a><span class="badge"><?php print $ofc; ?></span></li>
                        <li class="list-group-item"><a href="index.php?pag=galpon">Galpon</a><span class="badge"><?php print $gal; ?></span></li>
                      </ul>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                      <!-- Default panel contents -->
                      <div class="panel-heading">Tipo de Negocio</div>
                      <!-- List group -->
                      <?php
                        $com = Landing::contar("idTransaccion", 2);
                        $ven = Landing::contar("idTransaccion", 3);
                        $alq = Landing::contar("idTransaccion", 4);
                        $nuev = Landing::contar("idTransaccion", 1);
                        $mersec = Landing::contar("idTransaccion", 5);
                      ?>
                      <ul class="list-group">
                        <li class="list-group-item"><a href="index.php?pag=compra">Compra</a><span class="badge"><?php print $com; ?></span></li>
                        <li class="list-group-item"><a href="index.php?pag=venta">Venta</a><span class="badge"><?php print $ven; ?></span></li>
                        <li class="list-group-item"><a href="index.php?pag=alquiler">Alquiler</a><span class="badge"><?php print $alq; ?></span></li>
                        <li class="list-group-item"><a href="index.php?pag=nuevos">Nuevos</a><span class="badge"><?php print $nuev; ?></span></li>
                        <li class="list-group-item"><a href="index.php?pag=mercsec">Mercado Secundario</a><span class="badge"><?php print $mersec; ?></span></li>
                      </ul>
                    </div>
                </div>
            </div>