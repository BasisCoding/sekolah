   <!-- Page content -->
   <div class="container-fluid mt--6">
    <div class="row">
      <div class="col-md-5">
        <div class="card">
          <!-- Card header -->
          <div class="card-header">
            <div class="row">
              <div class="col-6">
                <h3 class="mb-0">Roles</h3>
              </div>

              <div class="col-6 text-right">
                <button class="btn btn-sm btn-neutral btn-round btn-icon" data-toggle="modal" data-target="#modal-addRole">
                  <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                </button>
              </div>
            </div>
          </div>

          <!-- Card body -->
          <div class="card-body">
            <!-- List group -->
            <ul class="list-group list-group-flush list my--4" id="daftar_roles">
            </ul>
          </div>
        </div>
      </div>

      <div class="col-md">
        <div class="card">
          <div class="card-header">
            <h5 class="h3 mb-0">Role Menu <span id="role-name"></span></h5>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush list my--4" id="daftar_menus">
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal-addRole" tabindex="-1" role="dialog" aria-labelledby="modal-addRole" aria-hidden="true">
      <div class="modal-dialog modal-dialog-top modal-md" role="document">
        <div class="modal-content">

          <div class="modal-body">
            <form class="form" id="form-addRole" method="POST" enctype="multipart/form-data">

              <div class="row">
                <div class="col-md">
                  <div class="form-group">
                    <label class="h5">Role Name</label>
                    <input type="text" name="role_name" class="form-control">
                  </div>
                </div>
                <div class="col-md">
                  <div class="form-group">
                    <label class="h5">Role Slug</label>
                    <input type="text" name="role_slug" class="form-control">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md text-right">
                  <button type="submit" class="btn btn-success btn-outline-success">Tambah</button>
                </div>
              </div>
            </form> 
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal-deleteRole" tabindex="-1" role="dialog" aria-labelledby="modal-deleteRole" aria-hidden="true">
      <div class="modal-dialog modal-dialog-top modal-md" role="document">
        <div class="modal-content">

          <div class="modal-body">
            <form class="form" id="form-deleteRole" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="id_delete">
              <p>Apakah anda yakin ingin menghapus role <span id="role-name"></span></p>

              <div class="row">
                <div class="col-md text-right">
                  <button type="submit" class="btn btn-success btn-outline-success">Tambah</button>
                </div>
              </div>
            </form> 
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal-updateRole" tabindex="-1" role="dialog" aria-labelledby="modal-updateRole" aria-hidden="true">
      <div class="modal-dialog modal-dialog-top modal-md" role="document">
        <div class="modal-content">

          <div class="modal-body">
            <form class="form" id="form-updateRole" method="POST" enctype="multipart/form-data">

              <div class="row">
                <div class="col-md">
                  <input type="hidden" name="id_update">
                  <div class="form-group">
                    <label class="h5">Role Name</label>
                    <input type="text" name="role_name_update" class="form-control">
                  </div>
                </div>
                <div class="col-md">
                  <div class="form-group">
                    <label class="h5">Role Slug</label>
                    <input type="text" name="role_slug_update" class="form-control">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md text-right">
                  <button type="submit" class="btn btn-success btn-outline-success">Ubah</button>
                </div>
              </div>
            </form> 
          </div>
        </div>
      </div>
    </div>