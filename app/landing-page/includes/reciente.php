            <?php 
                  include_once("../connection.php");
                  include("../models/landing.php"); 
                  $v = array();
                if(isset($_POST['busqueda']))
                {
                  $titulo = "Busqueda por Código";
                  $v = Landing::busqueda($_POST['busqueda']);
                  if($v == "Error")
                  {
                    $titulo = "Código inexistente";
                    $v = Landing::obtLanding();
                  }
                }
                else
                {
                  if(!isset($_GET['pag']))
                  {
                    $v = Landing::obtLanding();
                    $titulo = "Últimas Adiciones";
                  }
                  else
                  {
                    switch($_GET['pag'])
                    {

                      case "casas":
                        $v = Landing::landingFiltro(1, 1);
                        $titulo = "Filtrado por Casas";
                      break;

                      case "apartamentos":
                        $v = Landing::landingFiltro(2, 1);
                        $titulo = "Filtrado por Apartamentos";
                      break;

                      case "terrenos":
                        $v = Landing::landingFiltro(3, 1);
                        $titulo = "Filtrado por Terrenos";
                      break;

                      case "townhouse":
                        $v = Landing::landingFiltro(5, 1);
                        $titulo = "Filtrado por Townhouses";
                      break;

                      case "local":
                        $v = Landing::landingFiltro(4, 1);
                        $titulo = "Filtrado por Locales";
                      break;

                      case "oficina":
                        $v = Landing::landingFiltro(6, 1);
                        $titulo = "Filtrado por Oficinas";
                      break;

                      case "galpon":
                        $v = Landing::landingFiltro(7, 1);
                        $titulo = "Filtrado por Galpones";
                      break;

                      case "compra":
                        $v = Landing::landingFiltro(2, 2);
                        $titulo = "Compra";
                      break;

                      case "venta":
                        $v = Landing::landingFiltro(3, 2);
                        $titulo = "Venta";
                      break;

                      case "alquiler":
                        $v = Landing::landingFiltro(4, 2);
                        $titulo = "Alquiler";
                      break;

                      case "mercsec":
                        $v = Landing::landingFiltro(5, 2);
                        $titulo = "Mercado Secundario";
                      break;

                      case "nuevos":
                        $v = Landing::landingFiltro(1, 2);
                        $titulo = "Nuevos";
                      break;
                    }
                  }
                }
            ?>
            <div class="col-lg-12">
                <h2 class="page-header"><?php print $titulo; ?></h2>
            </div>
            <?php foreach($v as $itm){ ?>
            <div class="col-md-4 col-sm-6">
                <a href="index.php?pag=detalle&<?php print "id=" . $itm->id;?>">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <img class="img-responsive img-portfolio img-hover" width="250" height="100" src="../assets/img/inmuebles/<?php print $itm->img; ?> " alt="../assets/img/inmuebles/<?php print $itm->img; ?>">
                      </div>
                      <div class="panel-footer"><?php print $itm->nombre;?></div>
                    </div>

                    
                </a>
            </div>
            <?php } ?>