
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Profile Settings</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= site_url('personel/setting') ?>">Home</a></li>
                                <li class="breadcrumb-item active">Settings</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="card">
                  <?= $this->session->flashdata('msg') ?>
                    <div class="card-body">
                        <div class="form-group">
                          <?= form_open_multipart('personel/setting') ?>
                            <label for="">NIP</label>
                            <input type="text" class="form-control" name="nip" readonly id="nip" value="<?= $data_personil->nip ?>">
                          </div>
                          <div class="form-group">
                            <label for="">ID Pegawai</label>
                            <input type="text" class="form-control" name="id_pegawai" id="id_pegawai" value="<?= $data_personil->id_pegawai ?>">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" value="<?= $data_personil->nama ?>">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Jabatan</label>
                            <input type="text" class="form-control" name="jabatan" readonly id="jabatan"  value="<?= $data_personil->jabatan ?>">
                          </div>
                          <div class="form-group">
                            <label for="">Unit</label>
                            <input type="text" class="form-control" name="unit" id="unit" value="<?= $data_personil->unit ?>" >
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">No.HP</label>
                            <input type="text" class="form-control" name="no" id="no" value="<?= $data_personil->no ?>" >
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="<?= $data_personil->email ?>">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Attachment Sertifikat</label>
                          <img src="#" id="blah" style="display: none">
                          <div class="form-group">
                              <div class="custom-file">
                                  <input type="file" class="custom-file-input" name="gambar" id="foto_bukti">
                                  <label class="custom-file-label" for="foto_bukti">Foto bukti</label>
                              </div>
                          </div>
                          </div>
                          <div class="modal-footer justify-content-between">
                                 <input type="submit" class="btn btn-primary" value="Simpan Perubahan" name="simpan">
                          </div>
                    <?= form_close() ?>
                </div>
            </section>
