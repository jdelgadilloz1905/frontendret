<div class="page-wrapper">
  <!-- ============================================================== -->
  <!-- Container fluid  -->
  <!-- ============================================================== -->
  <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
      <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Administrar productos</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Inicio</li>
          <li class="breadcrumb-item active">Administrar productos</li>
        </ol>
      </div>

    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">

      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="col-lg-3 col-md-4">
              <button type="button" class="btn waves-effect waves-light btn-block btn-info" data-toggle="modal" data-target="#modalAgregarProducto">Agregar producto</button>
            </div>
            <div class="table-responsive m-t-40">
              <table class="table table-bordered table-striped dt-responsive tablaProductos">

                <thead>

                <tr>

                  <th style="width:10px">#</th>
                  <th>Imagen</th>
                  <th>Código</th>
                  <th>Descripción</th>
                  <th>Categoría</th>
                  <th>Stock</th>
                  <th>Tipo</th>
                  <th>Agregado</th>
                  <th>Acciones</th>

                </tr>

                </thead>

              </table>

              <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" class="perfilUsuario">
            </div>
          </div>
        </div>

      </div>

    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->

  </div>
  <!-- ================================================================== -->
  <!-- End Container fluid  -->

</div>
<!--=====================================
MODAL AGREGAR PRODUCTO
======================================-->

<div class="modal fade" id="modalAgregarProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#f14e01;">
        <h4 class="modal-title" id="exampleModalLabel1" style="color:white !important;">Agregar producto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-body">

          <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                                                      <span class="input-group-text" id="basic-addon1">
                                                          <i class="fa fa-th"></i>
                                                      </span>
              </div>
              <select class="form-control input-lg custom-select" id="nuevaCategoria" name="nuevaCategoria" required>

                <option value="">Selecionar categoría</option>

                <?php

                $item = null;
                $valor = null;

                $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                foreach ($categorias as $key => $value) {

                  echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
                }

                ?>

              </select>

            </div>
          </div>
          <!-- ENTRADA PARA EL CÓDIGO -->
          <div class="form-group">

            <div class="input-group">
              <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="fa fa-code"></i>
                                                    </span>
              </div>

              <input type="text" class="form-control input-lg" id="nuevoCodigo" name="nuevoCodigo" placeholder="Ingresar código" readonly required>
            </div>
          </div>
          <!-- ENTRADA PARA LA DESCRIPCIÓN -->

          <div class="form-group">

            <div class="input-group">
              <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class=" ti-pin-alt "></i>
                                                    </span>
              </div>


              <input type="text" class="form-control input-lg" name="nuevaDescripcion" placeholder="Ingresar descripción" required>
            </div>
          </div>

          <div class="row">

            <!-- ENTRADA PARA SELECCIONAR TIPOD E INVENTARIO -->
            <div class="col-md-6 col-xs-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            <i class=" ti-tumblr-alt "></i>
                                                        </span>
                  </div>
                  <select class="form-control custom-select" name="nuevoTipo" id="nuevoTipo">

                    <option value="servicio">Servicio</option>

                    <option value="venta">Venta</option>

                  </select>
                </div>
              </div>
            </div>
            <!-- ENTRADA PARA STOCK -->
            <div class="col-md-6 col-xs-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            <i class="fa fa-check"></i>
                                                        </span>
                  </div>


                  <input type="number" class="form-control input-lg" id="nuevoStock" name="nuevoStock" min="1" value="1" placeholder="Stock" readonly>
                </div>
              </div>
            </div>


          </div>

          <div class="row" style="display: none;">
            <!-- ENTRADA PARA PRECIO DE COMPRA -->
            <div class="col-md-6 col-xs-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            <i class="fa fa-arrow-up"></i>
                                                        </span>
                  </div>
                  <input type="number" class="form-control input-lg" id="nuevoPrecioCompra" name="nuevoPrecioCompra" min="0" placeholder="Precio de compra" value="0">
                </div>
              </div>
            </div>

            <!-- ENTRADA PARA PRECIO DE VENTA-->
            <div class="col-md-6 col-xs-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            <i class="fa fa-arrow-down"></i>
                                                        </span>
                  </div>
                  <input type="number" class="form-control input-lg" id="nuevoPrecioVenta" name="nuevoPrecioVenta" min="0" placeholder="Precio de venta" value="0">
                </div>
              </div>
              <div class="demo-checkbox">
                <input type="checkbox" id="md_checkbox_1" class="chk-col-red minimal porcentaje" checked />
                <label for="md_checkbox_1">Utilizar procentaje</label>
              </div>
              <div class="input-group">
                <div class="input-group-prepend">
                                                          <span class="input-group-text" id="basic-addon1">
                                                              <i class="fa fa-percent"></i>
                                                          </span>
                </div>
                <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>
              </div>
            </div>
          </div>

          <!-- ENTRADA PARA SUBIR FOTO -->

            <div class="form-group">

              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupFileAddon01">SUBIR IMAGEN</span>
                </div>
                <div class="custom-file">
                  <input type="file" class="custom-file-input nuevaImagen" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="nuevaImagen">
                  <label class="custom-file-label form-control" for="inputGroupFile01">Seleccionar imagen</label>
                </div>

              </div>
            </div>

            <p class="help-block">Peso máximo de la foto 2MB</p>

            <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

          <?php

          $crearProducto = new ControladorProductos();
          $crearProducto -> ctrCrearProducto();

          ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar producto</button>
        </div>

      </form>

    </div>
  </div>
</div>

<!--=====================================
MODAL EDITAR PRODUCTO
======================================-->

<div class="modal fade" id="modalEditarProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#f14e01;">
        <h4 class="modal-title" id="exampleModalLabel1" style="color:white !important;">Editar producto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-body">

          <div class="form-group">
            <label for="">Categoria actual</label>
            <div class="input-group">

              <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class=" fa fa-th "></i>
                                                    </span>
              </div>

              <input type="text" class="form-control input-lg" id="editarCategoriaActual" name="editarCategoriaActual" readonly>

              <input type="hidden" name="editarIdCategoriaActual" id="editarIdCategoriaActual">
            </div>
          </div>

          <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                                                      <span class="input-group-text" id="basic-addon1">
                                                          <i class="fa fa-th"></i>
                                                      </span>
              </div>
              <select class="form-control input-lg custom-select" id="editarCategoria" name="editarCategoria">

                <option value="">Selecionar categoría</option>

                <?php

                $item = null;
                $valor = null;

                $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                foreach ($categorias as $key => $value) {

                  echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
                }

                ?>

              </select>

            </div>
          </div>
          <!-- ENTRADA PARA EL CÓDIGO -->
          <div class="form-group">

            <div class="input-group">
              <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="fa fa-code"></i>
                                                    </span>
              </div>

              <input type="text" class="form-control input-lg" id="editarCodigo" name="editarCodigo" placeholder="Ingresar código" readonly required>
            </div>
          </div>
          <!-- ENTRADA PARA LA DESCRIPCIÓN -->

          <div class="form-group">

            <div class="input-group">
              <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class=" ti-pin-alt "></i>
                                                    </span>
              </div>


              <input type="text" class="form-control input-lg" name="editarDescripcion" id="editarDescripcion" placeholder="Ingresar descripción" required>
            </div>
          </div>

          <!-- TIPO  DE PRODUCTO ACTUAL -->

          <div class="form-group">
            <label for="">Tipo actual</label>
            <div class="input-group">

              <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class=" ti-tumblr-alt "></i>
                                                    </span>
              </div>

              <input type="text" class="form-control input-lg" id="editarTipoActual" name="editarTipoActual" readonly>
            </div>
          </div>

          <div class="row">

            <!-- ENTRADA PARA SELECCIONAR TIPOD E INVENTARIO -->
            <div class="col-md-6 col-xs-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            <i class="ti-tumblr-alt"></i>
                                                        </span>
                  </div>
                  <select class="form-control custom-select" name="editarTipo" id="editarTipo">

                    <option value="">Seleccionar tipo</option>

                    <option value="servicio">Servicio</option>

                    <option value="venta">Venta</option>

                  </select>
                </div>
              </div>
            </div>
            <!-- ENTRADA PARA STOCK -->
            <div class="col-md-6 col-xs-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            <i class="fa fa-check"></i>
                                                        </span>
                  </div>


                  <input type="number" class="form-control input-lg" id="editarStock" name="editarStock" min="1" value="1" placeholder="Stock" readonly>
                </div>
              </div>
            </div>


          </div>

          <div class="row" style="display: none;">
            <!-- ENTRADA PARA PRECIO DE COMPRA -->
            <div class="col-md-6 col-xs-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            <i class="fa fa-arrow-up"></i>
                                                        </span>
                  </div>
                  <input type="number" class="form-control input-lg" id="editarPrecioCompra" name="editarPrecioCompra" min="0" placeholder="Precio de compra" value="0">
                </div>
              </div>
            </div>

            <!-- ENTRADA PARA PRECIO DE VENTA-->
            <div class="col-md-6 col-xs-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            <i class="fa fa-arrow-down"></i>
                                                        </span>
                  </div>
                  <input type="number" class="form-control input-lg" id="editarPrecioVenta" name="editarPrecioVenta" min="0" placeholder="Precio de venta" value="0">
                </div>
              </div>
              <div class="demo-checkbox">
                <input type="checkbox" id="md_checkbox_1" class="chk-col-red minimal porcentaje" checked />
                <label for="md_checkbox_1">Utilizar procentaje</label>
              </div>
              <div class="input-group">
                <div class="input-group-prepend">
                                                          <span class="input-group-text" id="basic-addon1">
                                                              <i class="fa fa-percent"></i>
                                                          </span>
                </div>
                <input type="number" class="form-control input-lg editarPorcentaje" min="0" value="40" required>
              </div>
            </div>
          </div>

          <!-- ENTRADA PARA SUBIR FOTO -->

          <div class="form-group">

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">SUBIR IMAGEN</span>
              </div>
              <div class="custom-file">
                <input type="file" class="custom-file-input nuevaImagen" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="editarImagen">
                <label class="custom-file-label form-control" for="inputGroupFile01">Seleccionar imagen</label>
              </div>

            </div>
          </div>

          <p class="help-block">Peso máximo de la foto 2MB</p>

          <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

          <input type="hidden" name="imagenActual" id="imagenActual">

          <?php

          $editarProducto = new ControladorProductos();
          $editarProducto -> ctrEditarProducto();

          ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar producto</button>
        </div>

      </form>

    </div>
  </div>
</div>



<?php

  $eliminarProducto = new ControladorProductos();
  $eliminarProducto -> ctrEliminarProducto();

?>



