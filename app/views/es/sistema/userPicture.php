<!DOCTYPE html>
<html>
<head>
    <!-- Base Samuel! -->
    <!-- <base href="/Git/inmobiliaria/app/"> -->

    <!-- Base Victor! -->
    <base href="/git/GitHub/inmobiliaria/app/"> 

    <meta charset="UTF-8">
    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/userPicture.css">
</head>
<body>
    
    <?php
        require_once('../../../connection.php');
        require('../../../controllers/GlobalController.php');
        require('../../../models/usuario.php');

        $user = Usuario::obtUsuario($_GET['id']);
    ?>

    <div class="row">
        <div class="col-lg-5">
            <div class="media">
                <a class="pull-left" href="#">
                    
                    <img class="media-object dp img-circle" src="assets/img/users/<?php print $user->foto; ?>" style="width: 100px;height:100px;">

                </a>
                <div class="media-body">
                    <h4 class="media-heading"><?php print $user->nombre; ?></h4>
                    <h5><?php print $user->tipo; ?> en <a href="#">LH Grupo Inmobiliario</a></h5>
                    <hr style="margin:8px auto">

                    <form action="admin/cambiarImagenUsuario" class="form-inline" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>
                        <span class="input-group">
                            <span class="btn btn-primary btn-file">
                                Browse&hellip; <input name="uploadedfile" type="file" required>
                            </span>

                        </span>
                        <input class="btn btn-info" type="submit" name="submit" value="Subir Imagen">
                        <!-- <input type="text" name="uploadedfile" class="form-control" readonly> -->

                        
                    </form>
                    <!-- <span class="label label-default">HTML5/CSS3</span> -->
                    <!-- <span class="label label-default">jQuery</span> -->
                    <!-- <span class="label label-info">CakePHP</span> -->
                    <!-- <span class="label label-default">Android</span> -->
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>
