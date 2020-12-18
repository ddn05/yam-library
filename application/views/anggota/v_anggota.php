            <!-- Begin Page Content -->
            <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Data Anggota</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">

                <?php
                    if(isset($_GET['pesan'])){
                        if($_GET['pesan'] == "berhasil"){
                            echo "<div class='alert alert-success'>Berhasil Menambahkan Data</div>";
                        }
                        if($_GET['pesan'] == "gagal"){
                            echo "<div class='alert alert-danger'>Gagal Menambahkan Data</div>";
                        }
                        if($_GET['pesan'] == "hapusberhasil"){
                            echo "<div class='alert alert-success'>Berhasil Menghapus Data</div>";
                        }
                        if($_GET['pesan'] == "update"){
                            echo "<div class='alert alert-success'>Berhasil Mengupdate Data</div>";
                        }
                        if($_GET['pesan'] == "gagalupdate"){
                            echo "<div class='alert alert-danger'>Gagal Update Data | isi semua kolom !!</div>";
                        }
                    }
                ?>

                <div class="card-header py-3">
                    <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#anggota"><i class="fas fa-plus mr-2"></i>Tambah Anggota</a>
                    <a href="" class="btn btn-sm btn-warning"><i class="fas fa-print mr-2"></i>Cetak Laporan</a>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach($anggota as $ang) { ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $ang->nim ?></td>
                            <td><?php echo $ang->nama ?></td>
                            <td><?php echo $ang->jk ?></td>
                            <td><?php echo $ang->alamat ?></td>
                            <td>
                                <?php echo anchor('admin/edit_anggota/'.$ang->nim,'<div class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Edit Data"><i class="fas fa-edit"></i></div>')?>
                                <a href="" class="btn btn-sm btn-warning"><i class="fas fa-print" data-placement="top" title="Print Kartu Anggota"></i></a>
                                <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i class="fas fa-trash" data-placement="top" title="Hapus Data" onclick="hapusdata(<?php echo $ang->nim;?>)";></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    </table>
                </div>
                </div>
            </div>

            </div>
            <!-- /.container-fluid -->

            <!-- Modal -->
            <div class="modal fade" id="anggota" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Anggota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <?php echo form_open_multipart('admin/input_anggota');?>
                    <div class="form-group">
                        <label>NIM</label>
                        <input type="text" class="form-control" id="nim" placeholder="" name="nim">
                        <?php echo form_error('nim')?>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="" name="nama">
                            <?php echo form_error('nama')?>
                        </div>
                        <div class="form-group col-md-4">
                        <label>Jenis Kelamin</label>
                        <select id="jk" class="form-control" name="jk">
                            <option>Laki-Laki</option>
                            <option>Perempuan</option>
                        </select>
                        <?php echo form_error('jk')?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" id="alamat" placeholder="" name="alamat">
                        <?php echo form_error('alamat')?>
                    </div>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <?php echo form_close();?>
                </div>
            </div>
            </div>


            <script type="text/javascript">
                var url="<?php echo base_url();?>";
                function hapusdata(nim){
                var r=confirm("Apakah anda yakin akan menghapus data ini ?")
                    if (r==true)
                    window.location = url+"admin/hapus_anggota/"+nim;
                    else
                    return false;
                } 
            </script>