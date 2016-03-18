            <?php 
                  include("../connection.php");
                  include("../models/landing.php"); 
                  $v = array();
                  $v = Landing::obtLanding();
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