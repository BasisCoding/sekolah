    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-md">
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <div class="row">
                <div class="col-6">
                  <h3 class="mb-0">Data Pribadi</h3>
                </div>

                <div class="col-6 text-right">
                  <button class="btn btn-sm btn-icon" type="button" data-toggle="collapse" data-target="#card-datapribadi" aria-expanded="false" aria-controls="card-datapribadi">
                    <span class="btn-inner--icon"><i class="icofont-simple-down"></i></span>
                  </button>
                </div>
              </div>
            </div>
            <div class="card-body collapse" id="card-datapribadi">
              <form id="form-addDataPribadi">

                <div class="row">

                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">NIS</label>
                      <input type="number" name="nis" class="form-control">
                    </div>
                  </div>

                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">NISN</label>
                      <input type="number" name="nisn" class="form-control">
                    </div>
                  </div>

                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">NIK</label>
                      <input type="number" name="nik" class="form-control">
                    </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Jenis Kelamin</label>
                      <select class="form-control select2" name="jenis_kelamin">
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Tempat Lahir</label>
                      <input type="text" name="tempat_lahir" class="form-control">
                    </div>
                  </div>

                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Tanggal Lahir</label>
                      <input type="date" name="tanggal_lahir" class="form-control">
                    </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">HP</label>
                      <input type="number" name="hp" class="form-control">
                    </div>
                  </div>

                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Agama</label>
                      <select class="form-control select2" name="agama">
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katholik">Katholik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Khonghucu">Khonghucu</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Kewarganegaraan</label>
                      <input type="text" name="kewarganegaraan" class="form-control">
                    </div>
                  </div>

                </div>

                <div class="row">
                  <div class="col-md text-right">
                    <button type="submit" form="form-addDataPriodik" class="btn btn-primary btn-outline-primary"><i class="icofont-save"></i> Save</button>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md">
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <div class="row">
                <div class="col-6">
                  <h3 class="mb-0">Data Priodik</h3>
                </div>

                <div class="col-6 text-right">
                  <button class="btn btn-sm btn-icon" type="button" data-toggle="collapse" data-target="#card-datapriodik" aria-expanded="false" aria-controls="card-datapriodik">
                    <span class="btn-inner--icon"><i class="icofont-simple-down"></i></span>
                  </button>
                </div>
              </div>
            </div>
            <div class="card-body collapse" id="card-datapriodik">
              <form id="form-addDataPriodik">

                <div class="row">

                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Tinggi Badan</label>
                      <input type="number" name="tinggi_badan" class="form-control">
                    </div>
                  </div>

                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Berat Badan</label>
                      <input type="number" name="berat_badan" class="form-control">
                    </div>
                  </div>

                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Anak Keberapa</label>
                      <input type="number" name="anak_ke" class="form-control">
                    </div>
                  </div>

                </div>

                <div class="row">
                  
                   <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Tempat Tinggal</label>
                      <select class="form-control select2" name="tinggal_bersama">
                        <option value="Bersama Orang Tua">Bersama Orang Tua</option>
                        <option value="Wali">Wali</option>
                        <option value="Kos">Kos</option>
                        <option value="Panti Asuhan">Panti Asuhan</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Moda Transportasi</label>
                      <select class="form-control select2" name="moda_transportasi">
                        <option value="Jalan Kaki">Jalan Kaki</option>
                        <option value="Kendaraan Pribadi">Kendaraan Pribadi</option>
                        <option value="Kendaraan Umum">Kendaraan Umum</option>
                        <option value="Jemputan Sekolah">Jemputan Sekolah</option>
                        <option value="Kereta Api">Kereta Api</option>
                        <option value="Ojek">Ojek</option>
                      </select>
                    </div>
                  </div>

                </div>

                <div class="row">
                  
                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Jarak Tempuh</label>
                      <input type="number" name="jarak_tempuh" class="form-control" readonly="">
                    </div>
                  </div>

                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Waktu Tempuh</label>
                      <input type="number" name="waktu_tempuh" class="form-control" placeholder="Input Menit">
                    </div>
                  </div>

                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Lattitude</label>
                      <input type="text" name="lattitude" class="form-control" readonly="">
                    </div>
                  </div>

                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Logitude</label>
                      <input type="text" name="longitude" class="form-control" readonly="">
                    </div>
                  </div>

                </div>

                <div class="row">
                  <div class="col-md">
                    <div id="googleMap" style="width: auto;height:400px;"></div>
                  </div>
                </div>

                <input type="button" id="get_location" value="Get Location"/>

                <div class="row">
                  <div class="col-md text-right">
                    <button type="submit" form="form-addDataPriodik" class="btn btn-primary btn-outline-primary"><i class="icofont-save"></i> Save</button>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md">
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <div class="row">
                <div class="col-6">
                  <h3 class="mb-0">Data Alamat</h3>
                </div>

                <div class="col-6 text-right">
                  <button class="btn btn-sm btn-icon" type="button" data-toggle="collapse" data-target="#card-dataalamat" aria-expanded="false" aria-controls="card-dataalamat">
                    <span class="btn-inner--icon"><i class="icofont-simple-down"></i></span>
                  </button>
                </div>
              </div>
            </div>
            <div class="card-body collapse" id="card-dataalamat">
              <form id="form-addDataAlamat">

                <div class="row">

                  <div class="col-md">
                    <div class="row">
                      <div class="col-md">
                        <div class="form-group">
                          <label class="h5">RT</label>
                          <input type="number" name="rt" class="form-control">
                        </div>
                      </div>

                      <div class="col-md">
                        <div class="form-group">
                          <label class="h5">RW</label>
                          <input type="number" name="rw" class="form-control">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Nama Dusun</label>
                      <input type="text" name="dusun" class="form-control">
                    </div>
                  </div>

                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Kode POS</label>
                      <input type="number" name="kode_pos" class="form-control">
                    </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Provinsi</label>
                      <select class="form-control select2 select-provinces"></select>
                    </div>
                  </div>

                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Kabupaten</label>
                      <select class="form-control select2 select-regencies"></select>
                    </div>
                  </div>

                </div>

                <div class="row">
                  
                   <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Kecamatan</label>
                      <select class="form-control select2 select-districts"></select>
                    </div>
                  </div>

                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Kelurahan</label>
                      <select class="form-control select2 select-villages"></select>
                    </div>
                  </div>

                </div>

                <div class="row">
                  <div class="col-md text-right">
                    <button type="submit" form="form-addDataPriodik" class="btn btn-primary btn-outline-primary"><i class="icofont-save"></i> Save</button>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
      