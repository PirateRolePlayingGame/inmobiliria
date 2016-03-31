            <?php 
                  include("../connection.php");
                  include("../models/landing.php"); 
                  $v = array();
                  if(!isset($_GET['pag']))
                  {
                    $v = Landing::obtLanding();
                  }
                  else
                  {
                    switch($_GET['pag'])
                    {
                      case "casas":
                        $v = Landing::landingFiltro(1, 1);
                      break;

                      case "apartamentos":
                        $v = Landing::landingFiltro(2, 1);
                      break;

                      case "terrenos":
                        $v = Landing::landingFiltro(3, 1);
                      break;

                      case "townhouse":
                        $v = Landing::landingFiltro(5, 1);
                      break;

                      case "local":
                        $v = Landing::landingFiltro(4, 1);
                      break;

                      case "oficina":
                        $v = Landing::landingFiltro(6, 1);
                      break;

                      case "galpon":
                        $v = Landing::landingFiltro(7, 1);
                      break;

                      case "compra":
                        $v = Landing::landingFiltro(2, 2);
                      break;

                      case "venta":
                        $v = Landing::landingFiltro(3, 2);
                      break;

                      case "alquiler":
                        $v = Landing::landingFiltro(4, 2);
                      break;

                      case "mercsec":
                        $v = Landing::landingFiltro(5, 2);
                      break;

                      case "nuevos":
                        $v = Landing::landingFiltro(1, 2);
                      break;
                    }
                  }
                  
            ?>
            <div class="col-lg-12">
                <h2 class="page-header">Últimas Adiciones</h2>
            </div>
            <?php foreach($v as $itm){ ?>
            <div class="col-md-4 col-sm-6">
                <a href="index.php?pag=detalle&<?php print "id=" . $itm->id;?>">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <img class="img-responsive img-portfolio img-hover" src="../assets/img/inmuebles/<?php print $itm->img; ?> " alt="../assets/img/inmuebles/<?php print $itm->img; ?>">
                      </div>
                      <div class="panel-footer"><?php print $itm->nombre;?></div>
                    </div>

                    
                </a>
            </div>
            <?php } ?>