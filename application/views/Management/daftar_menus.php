    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-md">
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <div class="row">
                <div class="col-md">
                  <div class="form-group">
                    <label>Text</label>
                    <input type="text" class="form-control item-menu" name="text" id="text" placeholder="Text">
                  </div>
                </div>

              </div>
            </div>
            <!-- <div class="table-responsive py-4">
              <table class="table table-flush" id="table-users">
                <thead class="thead-light">
                  <tr>
                    <th>Foto</th>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody id="table-data-users">

                </tbody>
              </table>
            </div> -->
            <ul id="myEditor" class="sortableLists list-group">
            </ul>
<!-- 
            <div class="card border-primary mb-3">
              <div class="card-header bg-primary text-white">Edit item</div>
              <div class="card-body">
                <form id="frmEdit" class="form-horizontal">
                  <div class="form-group">
                    <label for="text">Text</label>
                    <div class="input-group">
                      <input type="text" class="form-control item-menu" name="text" id="text" placeholder="Text">
                      <div class="input-group-append">
                        <button type="button" id="myEditor_icon" class="btn btn-outline-secondary"></button>
                      </div>
                    </div>
                    <input type="hidden" name="icon" class="item-menu">
                  </div>
                  <div class="form-group">
                    <label for="href">URL</label>
                    <input type="text" class="form-control item-menu" id="href" name="href" placeholder="URL">
                  </div>
                  <div class="form-group">
                    <label for="target">Target</label>
                    <select name="target" id="target" class="form-control item-menu">
                      <option value="_self">Self</option>
                      <option value="_blank">Blank</option>
                      <option value="_top">Top</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="title">Tooltip</label>
                    <input type="text" name="title" class="form-control item-menu" id="title" placeholder="Tooltip">
                  </div>
                </form>
              </div>
              <div class="card-footer">
                <button type="button" id="btnUpdate" class="btn btn-primary" disabled><i class="fas fa-sync-alt"></i> Update</button>
                <button type="button" id="btnAdd" class="btn btn-success"><i class="fas fa-plus"></i> Add</button>
              </div>
            </div>
          -->
        </div>
      </div>
    </div>
    

     <!--  <div class="modal fade" id="modal-addUsers" tabindex="-1" role="dialog" aria-labelledby="modal-addUsers" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top modal-lg" role="document">
          <div class="modal-content">

            <div class="modal-header">
              <h6 class="modal-title" id="modal-title-default">Tambah Barang</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>

            <div class="modal-body">
              <form class="form" id="form-addUsers" method="POST" enctype="multipart/form-data">

                <div class="row">
                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Username</label>
                      <input type="text" name="username" class="form-control">
                    </div>
                  </div>

                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Nama Lengkap</label>
                      <input type="text" name="nama_lengkap" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Password</label>
                      <input type="password" name="password" class="form-control">
                    </div>
                  </div>

                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Konfirmasi Password</label>
                      <input type="password" name="conf_password" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Email</label>
                      <input type="email" name="email" class="form-control">
                    </div>
                  </div>

                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">HP</label>
                      <input type="number" name="hp" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Jenis Kelamin</label>
                      <select class="form-control" name="jenis_kelamin">
                        <option value="L">L</option>
                        <option value="P">P</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Tempat, Tanggal Lahir</label>
                      <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                          <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" class="form-control" required>
                        </div>
                        <input type="date" name="tanggal_lahir" class="form-control" required>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md">
                    <div class="form-group">

                      <img width="110" height="130" class="foto-preview" src="<?= base_url('assets/assets/img/users/default.png') ?>">

                      <label class="h5" for="foto" class="text-center m-2">
                        <a class="btn btn-warning btn-sm text-white" rel="nofollow" style="cursor: pointer;"><span class="ni ni-album-2"></span> Pilih Foto</a>
                      </label>
                      <input type="file" id="foto" name="foto" style="display: none;">
                    </div> 
                  </div>

                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Role</label>
                      <select class="form-control" name="role_id">
                        <option value="1">SuperAdmin</option>
                        <option value="2">Admin</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Alamat</label>
                      <textarea name="alamat" class="form-control"></textarea>
                    </div>
                  </div>
                </div>
                


              </form> 
            </div>

            <div class="modal-footer mt-0">
              <button type="submit" form="form-addUsers" class="btn btn-primary align-right">Save</button>
            </div>

          </div>
        </div>
      </div>
      
      <div class="modal fade" id="modal-updateUsers" tabindex="-1" role="dialog" aria-labelledby="modal-updateUsers" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top modal-lg" role="document">
          <div class="modal-content">

            <div class="modal-header">
              <h6 class="modal-title" id="modal-title-default">Update Users</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>

            <div class="modal-body">
              <form class="form" id="form-updateUsers" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_update">
                <div class="row">
                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Username</label>
                      <input type="text" name="username_update" class="form-control" readonly="">
                    </div>
                  </div>

                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Nama Lengkap</label>
                      <input type="text" name="nama_lengkap_update" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Password</label>
                      <input type="password" name="password_update" class="form-control">
                    </div>
                  </div>

                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Konfirmasi Password</label>
                      <input type="password" name="conf_password_update" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Email</label>
                      <input type="email" name="email_update" class="form-control">
                    </div>
                  </div>

                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">HP</label>
                      <input type="number" name="hp_update" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Jenis Kelamin</label>
                      <select class="form-control" name="jenis_kelamin_update">
                        <option value="L">L</option>
                        <option value="P">P</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Tempat, Tanggal Lahir</label>
                      <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                          <input type="text" name="tempat_lahir_update" placeholder="Tempat Lahir" class="form-control" required>
                        </div>
                        <input type="date" name="tanggal_lahir_update" class="form-control" required>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md">
                    <div class="form-group">

                      <img width="110" height="130" class="foto-preview" src="<?= base_url('assets/assets/img/users/default.png') ?>">

                      <label class="h5" for="foto_update" class="text-center m-2">
                        <a class="btn btn-warning btn-sm text-white" rel="nofollow" style="cursor: pointer;"><span class="ni ni-album-2"></span> Pilih Foto</a>
                      </label>
                      <input type="file" id="foto_update" name="foto_update" style="display: none;">
                    </div>  
                    <input type="hidden" name="foto_lama">
                  </div>

                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Role</label>
                      <select class="form-control" name="role_id_update">
                        <option value="1">SuperAdmin</option>
                        <option value="2">Admin</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Alamat</label>
                      <textarea name="alamat_update" class="form-control"></textarea>
                    </div>
                  </div>
                </div>
                
              </form> 
            </div>

            <div class="modal-footer mt-0">
              <button type="submit" form="form-updateUsers" class="btn btn-primary align-right">Save</button>
            </div>

          </div>
        </div>
      </div>
      
      <div class="modal fade" id="modal-deleteUsers" tabindex="-1" role="dialog" aria-labelledby="modal-deleteUsers" aria-modal="true">
        <div class="modal-dialog modal-danger modal-dialog-top modal-sm" role="document">
          <div class="modal-content bg-gradient-danger">
            <div class="modal-header">
              <h6 class="modal-title" id="modal-title-notification">Warning !</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="py-3 text-center">
                <i class="ni ni-bell-55 ni-3x"></i>
                <h4 class="heading mt-4">Apakah anda yakin ingin menghapus users <span id="users-delete"></span></h4>
                <form class="form" id="form-deleteUsers" method="POST">
                  <input type="hidden" name="id_users_delete">
                  <input type="hidden" name="foto_delete">
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-white" id="btn-delete-users" form="form-deleteUsers">Ok, Hapus</button>
              <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div> -->