<div class="modal fade" id="form_us"> 
        <div class="modal-dialog"> 
                <div class="modal-content"> 
                        <div class="modal-header"> 
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
                               <h4 class="modal-title">Formulario de registro</h4> 
                        </div>
                        <div class="modal-body"> 
                            <form class="form-horizontal" method="post" action="">
                                <div class="panel panel-default">
                                    <div class="panel-heading text-center">
                                        <br>
                                        <p class="lead">Usuarios</p>
                                    </div>
                                    <div class="panel-body text-center">
                                        <div class="form-group">
                                            <label for="nomb" class="col-md-3 control-label">Nombre</label>
                                            <div class="col-md-9">
                                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" required>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="nomb" class="col-md-3 control-label">Usuario</label>
                                            <div class="col-md-9">
                                                <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario" required>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="nomb" class="col-md-3 control-label">Correo</label>
                                            <div class="col-md-9">
                                                <input type="text" name="correo" id="correo" class="form-control" placeholder="Correo" required>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="nomb" class="col-md-3 control-label">Contraseña</label>
                                            <div class="col-md-9">
                                                <input type="password" name="pass" id="pass" class="form-control" placeholder="Contraseña" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="nomb" class="col-md-3 control-label">Telefono</label>
                                            <div class="col-md-9">
                                                <input type="text" name="tlf" id="tlf" class="form-control" placeholder="Telefono" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer"> 
                                    <input type="submit" class="btn btn-success" value="Registrar"> 
                                    <button type="button" class="btn btn-success" data-dismiss="modal">Salir</button> 
                                 </div> 
                            </form>


                         </div> 
                         
                </div> 
        </div>
 </div>





<div class="modal fade" id="form_in"> 
        <div class="modal-dialog"> 
                <div class="modal-content"> 
                        <div class="modal-header"> 
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
                               <h4 class="modal-title">Formulario de registro</h4> 
                        </div>
                        <div class="modal-body"> 
                            <form class="form-horizontal" method="post" action="">
                                <div class="panel panel-default">
                                    <div class="panel-heading text-center">
                                        <br>
                                        <p class="lead">Inmueble</p>
                                    </div>
                                    <div class="panel-body text-center">
                                    <!-- SELECT -->
                                        <div class="form-group">
                                            <label for="nomb" class="col-md-3 control-label">Estatus</label>
                                            <div class="col-md-9">
                                                <select class="form-control" name="stat" id="stat">
                                                    <option value="-1" selected>Seleccione un elemento</option>
                                                    <?php 
                                                        require_once("models/cortos.php");
                                                        $v = Corto::obtStat();
                                                        foreach($v as $i)
                                                        {
                                                            echo '<option value="'.$i->id.'" >'.$i->name.'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="nomb" class="col-md-3 control-label">Tipo de Inmueble</label>
                                            <div class="col-md-9">
                                                <select class="form-control" name="tipo" id="tipo">
                                                    <option value="-1" selected>Seleccione un elemento</option>
                                                    <?php 
                                                        $v = Corto::obtTipoInmueble();
                                                        foreach($v as $i)
                                                        {
                                                            echo '<option value="'.$i->id.'" >'.$i->name.'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="nomb" class="col-md-3 control-label">Estado</label>
                                            <div class="col-md-9">
                                                <select class="form-control" name="estado" id="estado">
                                                    <option value="-1" selected>Seleccione un elemento</option>
                                                    <?php 
                                                        $v = Corto::obtEstado(); 
                                                        foreach($v as $i)
                                                        {
                                                            echo '<option value="'.$i->id.'" >'.$i->name.'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="nomb" class="col-md-3 control-label">Municipio</label>
                                            <div class="col-md-9">
                                                <select class="form-control" name="municipio" id="municipio">
                                                    <option value="-1" selected>Seleccione un elemento</option>
                                                    <?php 
                                                        $v = Corto::obtMunicipio(); 
                                                        foreach($v as $i)
                                                        {
                                                            echo '<option value="'.$i->id.'" >'.$i->name.'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="nomb" class="col-md-3 control-label">Transaccion</label>
                                            <div class="col-md-9">
                                                <select class="form-control" name="transaccion" id="transaccion">
                                                    <option value="-1" selected>Seleccione un elemento</option>
                                                    <?php 
                                                        $v = Corto::obtTransaccion();
                                                        foreach($v as $i)
                                                        {
                                                            echo '<option value="'.$i->id.'" >'.$i->name.'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="nomb" class="col-md-3 control-label">Direccion</label>
                                            <div class="col-md-9">
                                                <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Direccion" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="nomb" class="col-md-3 control-label">Nombre</label>
                                            <div class="col-md-9">
                                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" required>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="nomb" class="col-md-3 control-label">Precio</label>
                                            <div class="col-md-9">
                                                <input type="number" name="precio" id="precio" class="form-control" required>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="nomb" class="col-md-3 control-label">Baños</label>
                                            <div class="col-md-9">
                                                <input type="number" name="banos" id="banos" class="form-control" required>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="nomb" class="col-md-3 control-label">Habitaciones</label>
                                            <div class="col-md-9">
                                                <input type="number" name="habit" id="habit" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="nomb" class="col-md-3 control-label">Metros</label>
                                            <div class="col-md-9">
                                                <input type="number" name="m" id="m" class="form-control"required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="nomb" class="col-md-3 control-label">Puestos Estacionamiento</label>
                                            <div class="col-md-9">
                                                <input type="number" name="est" id="est" class="form-control"required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="nomb" class="col-md-3 control-label">Telefono</label>
                                            <div class="col-md-9">
                                                <input type="text" name="tlf" id="tlf" class="form-control" placeholder="Telefono" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="nomb" class="col-md-3 control-label">Descripcion</label>
                                            <div class="col-md-9">
                                                <textarea name="desc" id="desc" class="form-control">  </textarea>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer"> 
                                    <input type="submit" class="btn btn-success" value="Registrar"> 
                                    <button type="button" class="btn btn-success" data-dismiss="modal">Salir</button> 
                                </div> 
                            </form>


                         </div> 
                         
                </div> 
        </div>
 </div>
       


<div class="modal fade" id="form_es"> 
        <div class="modal-dialog"> 
                <div class="modal-content"> 
                        <div class="modal-header"> 
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
                               <h4 class="modal-title">Formulario de registro</h4> 
                        </div>
                        <div class="modal-body"> 
                            <form class="form-horizontal" method="post" action="">
                                <div class="panel panel-default">
                                    <div class="panel-heading text-center">
                                        <br>
                                        <p class="lead">Estados</p>
                                    </div>
                                    <div class="panel-body text-center">
                                        <div class="form-group">
                                            <label for="nomb" class="col-md-3 control-label">Nombre</label>
                                            <div class="col-md-9">
                                                <input type="text" name="est" id="est" class="form-control" placeholder="Estado" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer"> 
                                    <input type="submit" class="btn btn-success" value="Registrar"> 
                                    <button type="button" class="btn btn-success" data-dismiss="modal">Salir</button> 
                                </div> 
                            </form>
                         </div> 
                         
                </div> 
        </div>
 </div>


<div class="modal fade" id="form_mu"> 
        <div class="modal-dialog"> 
                <div class="modal-content"> 
                        <div class="modal-header"> 
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
                               <h4 class="modal-title">Formulario de registro</h4> 
                        </div>
                        <div class="modal-body"> 
                            <form class="form-horizontal" method="post" action="">
                                <div class="panel panel-default">
                                    <div class="panel-heading text-center">
                                        <br>
                                        <p class="lead">Municipios</p>
                                    </div>
                                    <div class="panel-body text-center">
                                        <div class="form-group">
                                            <label for="nomb" class="col-md-3 control-label">Nombre</label>
                                            <div class="col-md-9">
                                                <input type="text" name="mun" id="mun" class="form-control" placeholder="Municipio" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer"> 
                                    <input type="submit" class="btn btn-success" value="Registrar"> 
                                    <button type="button" class="btn btn-success" data-dismiss="modal">Salir</button> 
                                </div> 
                            </form>
                         </div> 
                         
                </div> 
        </div>
 </div>
