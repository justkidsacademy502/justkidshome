<?php

$id_usuario = $_GET['id'];

include("../../app/config.php");
include("../../admin/layout/parte1.php");
include("../../app/controllers/usuarios/datos_del_usuario.php");
include("../../app/controllers/roles/listado_de_roles.php");
?>

       <!-- TOPBAR -->

<div class="custom-main custom-sidebar-active">
    <div class="row">
       <h1>Modificar Usuario: <?=$email;?></h1> 
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Actualize los datos</h3>
                </div>
                <div class="card-body">
                <form action="<?=APP_URL;?>/app/controllers/usuarios/update.php" method="post">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nombre del Rol</label>
                                <input type="text" name="id_usuario" value="<?=$id_usuario;?>" hidden>
                                <div class="form-inline">
                                <select name="rol_id" id="" class="form-control">
                                <?php
                                foreach ($roles as $role) { 
                                    $nombre_rol_tabla = $role['nombre_rol'];?>
                                    <option value="<?=$role['id_rol'];?>" <?php if($nombre_rol==$nombre_rol_tabla) {?> selected="selected" <?php } ?> ><?=$role['nombre_rol'];?></option>
                                <?php
                                }
                                ?>
                                </select>
                                <a href="<?=APP_URL;?>/admin/roles/create.php" style="margin-left: 5px;" class="btn btn-success"><i class="bi bi-file-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" value="<?=$email;?>" class="form-control" require>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                         </div>
                         <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Confirmar Password</label>
                                <input type="password" name="password_repeat" class="form-control">
                            </div>
                         </div>
                        </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Actualizar</button>
                                <a href="<?=APP_URL;?>/admin/usuarios" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>  
    </div>
</div>

<?php
include('../../layout/mensajes.php');
include("../layout/parte2.php");
?>
