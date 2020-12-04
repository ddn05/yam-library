                <!-- Begin Page Content -->
                <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Edit Anggota</h1>
                    <div class="card shadow col-md-6 p-3">
                    <?php
                    if(isset($_GET['pesan'])){
                        if($_GET['pesan'] == "gagal"){
                            echo "<div class='alert alert-success'>Gagal Update Data | isi semua kolom !!</div>";
                        }
                    }
                ?>
                        <?php foreach($anggota as $ang) { ?>
                        <?php echo form_open_multipart('admin/update_anggota');?>
                            <div class="form-group">
                                <label>NIM</label>
                                <input type="hidden" class="form-control" id="id" placeholder="" name="id">
                                <input type="text" class="form-control" id="nim" placeholder="" name="nim" value="<?php echo $ang->nim?>" readonly>
                                <?php echo form_error('nim')?>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" placeholder="" name="nama" value="<?php echo $ang->nama?>">
                                    <?php echo form_error('nama')?>
                                </div>
                                <div class="form-group col-md-4">
                                <label>Jenis Kelamin</label>
                                <select id="jk" class="form-control" name="jk">
                                    <option><?php echo $ang->jk ?></option>
                                    <option><hr></option>
                                    <option>Laki-Laki</option>
                                    <option>Perempuan</option>
                                </select>
                                <?php echo form_error('jk')?>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Alamat</label>
                                <input type="text" class="form-control" id="alamat" placeholder="" name="alamat" value="<?php echo $ang->alamat?>">
                                <?php echo form_error('alamat')?>
                            </div>
                            <a href="<?php echo base_url()?>admin/anggota" class="btn btn-secondary">Tutup</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>

                        <?php echo form_close();?>
                        
                        <?php } ?>
                    </div>
                </div>