
    
<div class="container">
    <div>
    
    <h3>Nuestros asesores están a su disposición para lo que necesite.</h3>
    <br>
    <br>
    <br>
    
    </div>
    
    
    <?php
        require("../connection.php");
        require("../models/landuser.php");
        $v = array();
        $v = landUser::landingUsers();
        $par = 0;
        foreach($v as $it)
        {
            if($par%2 == 0)
            {
                print "<div class='row'>";
            }
    ?>
        <!--asesor 1-->
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src="../assets/img/users/<?php print $it->foto; ?>" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4><?php print $it->nombre; ?></h4>
                        
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i><?php print $it->correo; ?>
                            <br />
                            <i class="glyphicon glyphicon-phone"></i><?php print $it->telefono; ?>
                            <br />
                        </p>  
                    </div>
                </div>
            </div>
        </div>   
    <?php 
            if($par%2 == 1)
            {
                print "</div>";
            }
            $par += 1;
        } 
    ?>            
</div>            
            
            
            
</body>            
            
</html>            