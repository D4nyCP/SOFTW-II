        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
  
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="title">
              <div class="col-12">
                <h3>Visualizar Usuarios</small></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel ">
                  <div class="x_title">
                    <a href="form_validation.php" class="btn btn-success">Registrar Usuario</a>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">

                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Nombre</th>
                          <th>Nombre Usuario</th>
                          <th>Teléfono/Celular</th>
                          <th>Perfil</th>
                          <th>DNI</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php  foreach ( $Resultado as $key => $value ):
                          if ($value["estadoperfil"] == 1 && $value["estadousuario"] == 1) {
                          ?>
                        <tr>  
                        <td> <?= $value[ "idusuario" ]   ?>  </td>
                        <td> <?= $value[ "nombre" ] ?> </td>
                        <td> <?= $value[ "nombreusuario" ] ?> </td>
                        <td> <?= $value[ "telefono" ] ?> </td>
                        <td> <?= $value[ "nombreperfil" ] ?> </td>
                        <td> <?= $value[ "dni" ] ?> </td>
                        <td>
                          <div class="col-12 mx-auto px-0"> 
                            <div class="col-12 mx-auto text-align px-0">
                            <a href="<?= base_url()."/index.php/visualizarusuario/update/".$value["idusuario"];?>" class="btn btn-info btn-sm mx-auto col-12" ><i class="fa fa-pencil"></i>Modificar</a></div>
                            <div class="col-12 mx-auto text-align px-0" >
                            <a href="<?= base_url()."/index.php/visualizarusuario/delete/".$value['idusuario'];?>"  onclick="return confirm('¿Está seguro que desea eliminar este usuario?');" class="btn btn-danger btn-sm mx-auto col-12"><i class="fa fa-trash-o"></i>Eliminar</a>
                            </div>
                            </div></td> 
                        </tr>  
                      <?php   } endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                  </div>
              </div>
            </div>
                </div>
              </div>


        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>