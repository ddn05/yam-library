                <!-- Begin Page Content -->
                <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Edit Anggota</h1>
                    <div class="card shadow col-md-6 p-3">
                        <?php foreach($anggota as $ang) { ?>

                            <form action="<?php echo base_url().'admin/update_anggota'?>" method="post">
                                <div class="form-group">
                                    <label>NIM</label>
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

                                <a href="<?php echo base_url()?>admin/anggota" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>


                        
                        <?php } ?>
                    </div>
                </div>