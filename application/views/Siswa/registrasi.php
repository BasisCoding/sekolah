    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-md">
          <div class="card">

            <div class="card-body" id="card-registrasi">
              <form id="form-registrasi">

                <div class="row">

                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Jurusan</label>
                      <select class="form-control select2 select-jurusan" name="jurusan_id">
                        
                      </select>
                    </div>
                  </div>

                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Jenis Pendaftaran</label>
                      <select class="form-control select2" name="jenis_pendaftaran">
                        <option value="Siswa Baru">Siswa Baru</option>
                        <option value="Pindahan">Pindahan</option>
                        <option value="Kembali Bersekolah">Kembali Bersekolah</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Asal Sekolah</label>
                      <input type="text" name="asal_sekolah" class="form-control">
                    </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">Nomor Peserta Ujian</label>
                      <input type="text" name="no_peserta_ujian" class="form-control">
                    </div>
                  </div>

                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">No Seri Ijazah</label>
                      <input type="text" name="no_seri_ijazah" class="form-control">
                    </div>
                  </div>

                  <div class="col-md">
                    <div class="form-group">
                      <label class="h5">No Seri SKHUN</label>
                      <input type="text" name="no_seri_skhun" class="form-control">
                    </div>
                  </div>

                </div>

                <div class="row">
                  <div class="col-md text-right">
                    <button type="submit" form="form-registrasi" class="btn btn-primary btn-outline-primary"><i class="icofont-save"></i> Save</button>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
