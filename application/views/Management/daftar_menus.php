    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">

        <div class="col-md-5">
          <div class="card">
            <div class="card-body">

              <button class="btn btn-outline-primary btn-round col mb-2" data-toggle="modal" data-target="#modal-addMenu">
                <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span> Tambah
              </button>

              <div class="form-group">
                <select class="form-control role_akses" name="select-role-menu"></select>
              </div>

              <ul id="daftar-menu" class="list-group"></ul>
            </div>
          </div>
        </div>

          <div class="col-md-7">
            <div class="card">
              <div class="card-body">
                <div class="dd" id="nestable">
                  Loading...
                </div>
                <button class="btn btn-primary btn-outline-primary mt-2 pull-right btn-save">Save</button>
              </div>
            </div> 
          </div>

        </div>

        <div class="modal fade" id="modal-addMenu" tabindex="-1" role="dialog" aria-labelledby="modal-addMenu" aria-hidden="true">
          <div class="modal-dialog modal-dialog-top modal-md" role="document">
            <div class="modal-content">

              <div class="modal-body">
                <form class="form" id="form-addMenu" method="POST" enctype="multipart/form-data">

                  <div class="row">
                    <div class="col-md">
                      <div class="form-group">
                        <label class="h5">Nama Menu</label>
                        <input type="text" name="nama_menu" class="form-control">
                      </div>
                    </div>
                    <div class="col-md">
                      <div class="form-group">
                        <label class="h5">Link Menu</label>
                        <input type="text" name="link" class="form-control">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md">
                      <div class="form-group">
                        <label class="h5">Icon Menu</label>
                        <input type="text" name="icon" class="form-control">
                      </div>
                    </div>

                    <div class="col-md">
                      <div class="form-group">
                        <label class="h5">Warna Menu</label>
                        <select class="form-control" name="color">
                          <option value="text-warning">Text Warning</option>
                          <option value="text-primary">Text Primary</option>
                          <option value="text-success">Text Success</option>
                          <option value="text-info">Text Info</option>
                          <option value="text-danger">Text Danger</option>
                          <option value="text-muted">Text Muted</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md">
                      <label class="h5">Role Akses</label>
                      <select class="form-control role_akses" name="role_id">
                      </select>
                    </div>
                  </div>

                  <div class="row mt-3">
                    <div class="col-md text-right">
                      <button type="submit" class="btn btn-success btn-outline-success">Tambah</button>
                    </div>
                  </div>
                </form> 
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="modal-updateMenuById" tabindex="-1" role="dialog" aria-labelledby="modal-updateMenuById" aria-hidden="true">
          <div class="modal-dialog modal-dialog-top modal-md" role="document">
            <div class="modal-content">

              <div class="modal-body">
                <form class="form" id="form-updateMenuById" method="POST" enctype="multipart/form-data">

                  <div class="row">

                    <input type="hidden" name="id_update" class="form-control">
                    <div class="col-md">
                      <div class="form-group">
                        <label class="h5">Nama Menu</label>
                        <input type="text" name="nama_menu_update" class="form-control">
                      </div>
                    </div>
                    <div class="col-md">
                      <div class="form-group">
                        <label class="h5">Link Menu</label>
                        <input type="text" name="link_update" class="form-control">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md">
                      <div class="form-group">
                        <label class="h5">Icon Menu</label>
                        <input type="text" name="icon_update" class="form-control">
                      </div>
                    </div>

                    <div class="col-md">
                      <div class="form-group">
                        <label class="h5">Warna Menu</label>
                        <select class="form-control" name="color_update">
                          <option value="text-warning">Text Warning</option>
                          <option value="text-primary">Text Primary</option>
                          <option value="text-success">Text Success</option>
                          <option value="text-info">Text Info</option>
                          <option value="text-danger">Text Danger</option>
                          <option value="text-muted">Text Muted</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md">
                      <label class="h5">Role Akses</label>
                      <select class="form-control role_akses" name="role_id_update">
                      </select>
                    </div>
                  </div>

                  <div class="row mt-2">
                    <div class="col-md text-right">
                      <button type="submit" class="btn btn-success btn-outline-success">Update</button>
                    </div>
                  </div>
                </form> 
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="modal-deleteMenuById" tabindex="-1" role="dialog" aria-labelledby="modal-deleteMenuById" aria-hidden="true">
          <div class="modal-dialog modal-dialog-top modal-md" role="document">
            <div class="modal-content">

              <div class="modal-body">
                <form class="form" id="form-deleteMenuById" method="POST" enctype="multipart/form-data">

                  <input type="hidden" name="id_delete" class="form-control">
                  <p>Apakah anda yakin ingin menghapus menu ini ?</p>
                  <div class="row">
                    <div class="col-md text-right">
                      <button type="submit" class="btn btn-success btn-outline-success">Hapus</button>
                    </div>
                  </div>
                </form> 
              </div>
            </div>
          </div>
        </div>